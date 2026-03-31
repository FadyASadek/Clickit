<?php

namespace App\Http\Controllers\RestAPI\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\RestAPI\v1\CategoryHomeResource;
use App\Http\Resources\RestAPI\v1\ProductHomeResource;
use App\Http\Resources\RestAPI\v1\SellerHomeResource;
use App\Models\Banner;
use App\Models\Category;
use App\Models\FlashDeal;
use App\Models\FlashDealProduct;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    // ─── Legacy aggregated endpoint (kept for backward compatibility) ──────────
    public function getHomeData(Request $request): JsonResponse
    {
        $guestId  = $request->get('guest_id') ?? '0';
        $cacheKey = 'api_v1_home_data_v4_' . app()->getLocale() . '_guest_' . $guestId;

        $data = Cache::remember($cacheKey, 60 * 60, function () use ($guestId) {
            return [
                'banners'               => $this->getBanners(),
                'categories'            => CategoryHomeResource::collection($this->getTopCategories()),
                'flash_deal'            => $this->getActiveFlashDeal($guestId),
                'featured_deal'         => $this->getActiveFeaturedDeal($guestId),
                'top_sellers'           => SellerHomeResource::collection($this->getTopSellers()),
                'brands'                => $this->getBrands(),
                'latest_products'       => ProductHomeResource::collection($this->getLatestProducts($guestId)),
                'best_selling_products' => ProductHomeResource::collection($this->getBestSellingProducts($guestId)),
                'featured_products'     => ProductHomeResource::collection($this->getFeaturedProducts($guestId)),
                'find_what_you_need'    => [],
                'just_for_you'          => [],
                'recommended_products'  => [],
            ];
        });

        return response()->json($data, 200);
    }

    // ─── Endpoint 1: Essential (target <100ms) ─────────────────────────────────
    // Returns: banners, categories, flash_deal
    public function getEssentialData(Request $request): JsonResponse
    {
        $guestId  = $request->get('guest_id') ?? '0';
        $cacheKey = 'api_v1_home_essential_' . app()->getLocale() . '_guest_' . $guestId;

        $data = Cache::remember($cacheKey, 60 * 60, function () use ($guestId) {
            return [
                'banners'    => $this->getBanners(),
                'categories' => CategoryHomeResource::collection($this->getTopCategories()),
                'flash_deal' => $this->getActiveFlashDeal($guestId),
            ];
        });

        return response()->json($data, 200);
    }

    // ─── Endpoint 2: Discovery (target <200ms) ─────────────────────────────────
    // Returns: top_sellers, brands, featured_deal
    public function getDiscoveryData(Request $request): JsonResponse
    {
        $guestId  = $request->get('guest_id') ?? '0';
        $cacheKey = 'api_v1_home_discovery_' . app()->getLocale() . '_guest_' . $guestId;

        $data = Cache::remember($cacheKey, 60 * 60, function () use ($guestId) {
            return [
                'top_sellers'   => SellerHomeResource::collection($this->getTopSellers()),
                'brands'        => $this->getBrands(),
                'featured_deal' => $this->getActiveFeaturedDeal($guestId),
            ];
        });

        return response()->json($data, 200);
    }

    // ─── Endpoint 3: Products (target <400ms) ──────────────────────────────────
    // Returns: latest_products, featured_products, best_selling_products, home_categories
    public function getProductsData(Request $request): JsonResponse
    {
        $guestId  = $request->get('guest_id') ?? '0';
        $cacheKey = 'api_v1_home_products_' . app()->getLocale() . '_guest_' . $guestId;

        $data = Cache::remember($cacheKey, 60 * 60, function () use ($guestId) {
            return [
                'latest_products'       => ProductHomeResource::collection($this->getLatestProducts($guestId)),
                'featured_products'     => ProductHomeResource::collection($this->getFeaturedProducts($guestId)),
                'best_selling_products' => ProductHomeResource::collection($this->getBestSellingProducts($guestId)),
                'home_categories'       => $this->getHomeCategories(),
                'find_what_you_need'    => [],
                'just_for_you'          => [],
                'recommended_products'  => [],
            ];
        });

        return response()->json($data, 200);
    }


    private function getBanners(): array
    {
        return Banner::where('published', 1)
            ->orderByDesc('id')
            ->limit(5)
            ->get(['id', 'banner_type', 'photo', 'url', 'resource_type', 'resource_id'])
            ->map(function ($banner) {
            $photo = (string)$banner->photo;
            $isDefault = ($photo === '' || $photo === 'def.png' || $photo === 'null');
            $banner->photo_url = $isDefault ? null : asset('storage/app/public/banner/' . $photo);
            return $banner;
        })->toArray();
    }

    private function getTopCategories()
    {
        return Category::where('position', 0)
            ->orderByDesc('priority')
            ->limit(20)
            ->withCount(['product as product_count' => fn($q) => $q->active()])
            ->get(['id', 'name', 'slug', 'icon']);
    }

    private function getActiveFlashDeal($guestId = '0'): ?array
    {
        $now = now();
        $deal = FlashDeal::where('status', 1)
            ->where('deal_type', 'flash_deal')
            ->where('start_date', '<=', $now)
            ->where('end_date', '>=', $now)
            ->select(['id', 'title', 'start_date', 'end_date', 'background_color', 'text_color'])
            ->first();

        if (!$deal)
            return null;

        $productIds = FlashDealProduct::where('flash_deal_id', $deal->id)->pluck('product_id');

        $products = Product::active()
            ->whereIn('id', $productIds)
            ->select(['id', 'name', 'thumbnail', 'unit_price', 'discount', 'discount_type', 'user_id'])
            ->with(['seller.shop' => fn($q) => $q->select(['id', 'seller_id', 'name'])])
            ->withCount('reviews')
            ->withAvg('reviews', 'rating')
            ->limit(8)
            ->get();

        $deal_array = $deal->toArray();
        $deal_array['products'] = ProductHomeResource::collection($products);

        return $deal_array;
    }

    private function getActiveFeaturedDeal($guestId = '0'): ?array
    {
        $now = now();
        $deal = FlashDeal::where('status', 1)
            ->where('deal_type', 'feature_deal')
            ->where('start_date', '<=', $now)
            ->where('end_date', '>=', $now)
            ->select(['id', 'title', 'start_date', 'end_date', 'background_color', 'text_color'])
            ->first();

        if (!$deal)
            return null;

        $productIds = FlashDealProduct::where('flash_deal_id', $deal->id)->pluck('product_id');

        $products = Product::active()
            ->whereIn('id', $productIds)
            ->select(['id', 'name', 'thumbnail', 'unit_price', 'discount', 'discount_type', 'user_id'])
            ->with(['seller.shop' => fn($q) => $q->select(['id', 'seller_id', 'name'])])
            ->withCount('reviews')
            ->withAvg('reviews', 'rating')
            ->limit(15)
            ->get();

        $deal_array = $deal->toArray();
        $deal_array['products'] = ProductHomeResource::collection($products);

        return $deal_array;
    }

    private function getTopSellers()
    {
        return Shop::active()
            ->select(['id', 'seller_id', 'name', 'image', 'image_storage_type'])
            ->withCount(['products' => fn($q) => $q->active()])
            ->orderByDesc('products_count')
            ->limit(15)
            ->get();
    }

    private function getLatestProducts($guestId = '0')
    {
        return Product::active()
            ->select(['id', 'name', 'thumbnail', 'unit_price', 'discount', 'discount_type', 'user_id'])
            ->with(['seller.shop' => fn($q) => $q->select(['id', 'seller_id', 'name'])])
            ->withCount('reviews')
            ->withAvg('reviews', 'rating')
            ->orderByDesc('id')
            ->limit(15)
            ->get();
    }

    private function getFeaturedProducts($guestId = '0')
    {
        return Product::active()
            ->where('featured', 1)
            ->select(['id', 'name', 'thumbnail', 'unit_price', 'discount', 'discount_type', 'user_id'])
            ->with(['seller.shop' => fn($q) => $q->select(['id', 'seller_id', 'name'])])
            ->withCount('reviews')
            ->withAvg('reviews', 'rating')
            ->orderByDesc('id')
            ->limit(15)
            ->get();
    }

    private function getBestSellingProducts($guestId = '0')
    {
        $getOrderedProductIds = \App\Models\OrderDetail::whereHas('product', function ($q) {
                $q->active();
            })
            ->select('product_id', \Illuminate\Support\Facades\DB::raw('COUNT(product_id) as count'))
            ->groupBy('product_id')
            ->orderByDesc('count')
            ->limit(15)
            ->pluck('product_id')
            ->toArray();

        $products = Product::active()
            ->whereIn('id', $getOrderedProductIds)
            ->select(['id', 'name', 'thumbnail', 'unit_price', 'discount', 'discount_type', 'user_id'])
            ->with(['seller.shop' => fn($q) => $q->select(['id', 'seller_id', 'name'])])
            ->withCount('reviews')
            ->withAvg('reviews', 'rating')
            ->get();

        return $products->sortBy(function($model) use ($getOrderedProductIds){
            return array_search($model->id, $getOrderedProductIds);
        })->values();
    }

    private function getBrands()
    {
        $brands = \App\Models\Brand::where('status', 1)
            ->orderByDesc('id')
            ->limit(15)
            ->get(['id', 'name', 'image']);

        return \App\Http\Resources\RestAPI\v1\BrandResource::collection($brands);
    }

    private function getHomeCategories(): array
    {
        $homeCategories = Category::where('home_status', true)
            ->orderByDesc('priority')
            ->get(['id', 'name', 'slug', 'icon']);

        return $homeCategories->map(function ($category) {
            $icon = (string)$category->icon;
            $isDefault = ($icon === '' || $icon === 'def.png' || $icon === 'null');

            return [
                'id' => $category->id,
                'name' => $category->name,
                'icon' => $isDefault ? null : asset('storage/app/public/category/' . $icon),
            ];
        })->toArray();
    }
}
