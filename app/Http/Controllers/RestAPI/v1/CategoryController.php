<?php

namespace App\Http\Controllers\RestAPI\v1;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Utils\CategoryManager;
use App\Utils\Helpers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function get_categories(Request $request): JsonResponse
    {
        $sellerId = $request->seller_id ?? null;
        $cacheKey = 'api_v1_categories_seller_' . ($sellerId ?? 'all') . '_lang_' . app()->getLocale();

        $categories = \Illuminate\Support\Facades\Cache::remember($cacheKey, 60*60*4, function () use ($sellerId) {
            $categoriesID = [];
            if ($sellerId != null) {
                $categoriesID = Product::active()
                    ->when($sellerId != null && $sellerId != 0, function ($query) use ($sellerId) {
                        return $query->where(['added_by' => 'seller'])
                            ->where('user_id', $sellerId);
                    })->when($sellerId != null && $sellerId == 0, function ($query) {
                        return $query->where(['added_by' => 'admin']);
                    })->pluck('category_id');
            }

            $categories = Category::when($sellerId != null, function ($query) use ($categoriesID) {
                return $query->whereIn('id', $categoriesID);
            })
                ->with(['product' => function ($query) {
                    return $query->select('id', 'category_id', 'added_by', 'user_id')->active()->withCount(['orderDetails']);
                }])
                ->withCount(['product' => function ($query) use ($sellerId) {
                    return $query->active()->when(!empty($sellerId), function ($query) use ($sellerId) {
                        return $query->where(['added_by' => 'seller', 'user_id' => $sellerId, 'status' => '1']);
                    });
                }])->with(['childes' => function ($query) {
                    return $query->with(['childes' => function ($query) {
                        return $query->withCount(['subSubCategoryProduct' => function ($query) {
                            return $query->active();
                        }])->where('position', 2);
                    }])->withCount(['subCategoryProduct' => function ($query) {
                        return $query->active();
                    }])->where('position', 1);
                }, 'childes.childes'])
                ->where(['position' => 0])->get();

            $categories = CategoryManager::getPriorityWiseCategorySortQuery(query: $categories);

            $categories->map(function ($category) {
                $category->setRelation('product', collect());
                return $category;
            });

            return $categories;
        });

        return response()->json($categories->values());
    }

    public function get_products(Request $request, $id): JsonResponse
    {
        // CRITICAL FIX: Never allow 'all' — enforce hard-default pagination to prevent 122MB payloads
        $limit  = (int) ($request['limit']  ?? 10);
        if ($limit < 1) {
            $limit = 10; // Failsafe for (int) 'all' preventing limit=0 crashing pagination
        }
        if ($limit > 50) {
            $limit = 50; // Cap to prevent artificial crashes
        }
        $offset = (int) ($request['offset'] ?? 1);

        $products = CategoryManager::products($id, $request, $limit);
        $productFinal = Helpers::product_data_formatting($products->items(), true);
        
        // STRICT PAYLOAD SCRUBBING: Preserve structural JSON keys to prevent Mobile App crashes
        $productFinal = Helpers::product_payload_scrub($productFinal);

        // ISSUE 2 FIX: Mock the legacy 'all' structural response if no limit was explicitly requested, 
        // to prevent the mobile app from crashing by feeding it a raw Array instead of a nested Object.
        $requestedLimit = $request['limit'] ?? 'all';
        if ($requestedLimit === 'all') {
            return response()->json(array_values($productFinal), 200);
        }

        return response()->json([
            'total_size' => $products->total(),
            'limit'      => $limit,
            'offset'     => $offset,
            'products'   => array_values($productFinal),
        ], 200);
    }

    public function find_what_you_need(Request $request)
    {
        $limit = $request->get('limit', 10);
        $offset = $request->get('offset', 1);

        $find_what_you_need_categories = Category::where('parent_id', 0)
            ->whereHas('childes')
            ->with(['childes' => function ($query) {
                $query->withCount(['subCategoryProduct' => function ($query) {
                    return $query->active();
                }]);
            }])
            ->withCount(['product' => function ($query) {
                return $query->active();
            }])
            ->paginate($limit, ['*'], 'page', $offset);

        $get_categories = [];
        foreach ($find_what_you_need_categories->items() as $category) {
            $categoryArray = $category->toArray();
            $categoryArray['childes'] = array_slice($categoryArray['childes'], 0, 4);
            $get_categories[] = $categoryArray;
        }

        return response()->json(['find_what_you_need' => $get_categories], 200);
    }

}
