<?php

namespace App\Http\Controllers\Vendor\DeliveryMan;

use App\Contracts\Repositories\DeliveryManRepositoryInterface;
use App\Contracts\Repositories\ReviewRepositoryInterface;
use App\Contracts\Repositories\VendorRepositoryInterface;
use App\Enums\ExportFileNames\Admin\DeliveryMan as DeliveryManExport;
use App\Enums\ViewPaths\Vendor\Dashboard;
use App\Enums\ViewPaths\Vendor\DeliveryMan;
use App\Enums\WebConfigKey;
use App\Exports\DeliveryManListExport;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Vendor\DeliveryManRequest;
use App\Http\Requests\Vendor\DeliveryManUpdateRequest;
use App\Models\Review;
use App\Services\DeliveryManService;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class DeliveryManController extends BaseController
{
    /**
     * @param DeliveryManRepositoryInterface $deliveryManRepo
     * @param ReviewRepositoryInterface $reviewRepo
     * @param DeliveryManService $deliveryManService
     */
    public function __construct(
        private readonly DeliveryManRepositoryInterface $deliveryManRepo,
        private readonly ReviewRepositoryInterface      $reviewRepo,
        private readonly DeliveryManService             $deliveryManService,
        private readonly VendorRepositoryInterface      $vendorRepo,
    )
    {
    }

    /**
     * @param Request|null $request
     * @param string|null $type
     * @return View|Collection|LengthAwarePaginator|callable|RedirectResponse|null
     */
    public function index(?Request $request, string $type = null): View|Collection|LengthAwarePaginator|null|callable|RedirectResponse
    {
        if (!$this->deliveryManService->checkConditions()){
            return redirect()->route(Dashboard::INDEX[ROUTE]);
        }
        return $this->getAddView();
    }

    /**
     * @return View
     * @function index is the starting point of a controller
     */
    public function getAddView(): View
    {
        $telephoneCodes = TELEPHONE_CODES;
        return view(DeliveryMan::INDEX[VIEW], compact('telephoneCodes'));
    }

    /**
     * @param DeliveryManRequest $request
     * @return JsonResponse
     * @function add  is the adding request data to delivery_men table
     */
    public function add(DeliveryManRequest $request):JsonResponse
    {
        $deliveryMan = $this->deliveryManRepo->getFirstWhere(params:['phone' => $request['phone']]);
        if ($deliveryMan) {
            return response()->json(['errors'=>translate('this_phone_number_is_already_taken')]);
        }
        $this->deliveryManRepo->add($this->deliveryManService->getDeliveryManAddData(
            request:$request,
            addedBy:'seller')
        );
        return response()->json(['message'=>translate('delivery_man_added_successfully')]);
    }
    /**
     * @param Request $request
     * @return RedirectResponse|View
     * @function getList ,showing the deliveryMan list
     */
    public function getListView(Request $request):RedirectResponse|View
    {
        if (!$this->deliveryManService->checkConditions()){
            return redirect()->route(Dashboard::INDEX[ROUTE]);
        }
        $vendorId = auth('seller')->id();
        $searchValue = $request['search'];
        $deliveryMen = $this->deliveryManRepo->getListWhere(
            orderBy: ['id'=>'desc'],
            searchValue: $searchValue,
            filters: ['seller_id' => $vendorId],
            dataLimit: getWebConfig(name: 'pagination_limit')
        );
        return view(DeliveryMan::LIST[VIEW],compact('deliveryMen','searchValue'));
    }

    /**
     * @param string|int $id
     * @return RedirectResponse|View
     * @function updateView ,showing the deliveryMan update view
     */
    public function getUpdateView(string|int $id):RedirectResponse|View
    {
        if (!$this->deliveryManService->checkConditions()){
            return redirect()->route(Dashboard::INDEX[ROUTE]);
        }
        $telephoneCodes = TELEPHONE_CODES;
        $deliveryMan = $this->deliveryManRepo->getFirstWhere(params:['seller_id' => auth('seller')->id(), 'id' => $id]);
        return view(DeliveryMan::UPDATE[VIEW],compact('deliveryMan','telephoneCodes'));
    }
    /**
     * @param DeliveryManUpdateRequest $request
     * @param string|int $id
     * @return JsonResponse
     * @function update ,update the deliveryMan data
     */
    public function update(DeliveryManUpdateRequest $request , string|int $id):JsonResponse
    {

        $deliveryMan = $this->deliveryManRepo->getFirstWhere(params:['seller_id' => auth('seller')->id(), 'id' => $id]);
        $deliveryManExists = $this->deliveryManRepo->getFirstWhere(params:['phone' => $request['phone'], 'country_code' => $request['country_code']]);
        if (isset($deliveryManExists) && $deliveryManExists['id'] != $deliveryMan['id']) {
            return response()->json(['errors'=>translate('this_phone_number_is_already_taken')]);
        }
        $this->deliveryManRepo->update($id,$this->deliveryManService->getDeliveryManUpdateData(
            request:$request,
            addedBy:'seller',
            identityImages: $deliveryMan['identity_image'],
            deliveryManImage: $deliveryMan['image'])
        );
        return response()->json(['message'=>translate('delivery_man_updated_successfully')]);
    }
    /**
     * @param Request $request
     * @param string|int $id
     * @return JsonResponse
     * @function updateStatus ,update the deliveryMan status
     */
    public function updateStatus(Request $request , string|int $id) : JsonResponse
    {
        $deliveryMan = $this->deliveryManRepo->getFirstWhere(params:['seller_id' => auth('seller')->id(), 'id' => $id]);
        $this->deliveryManRepo->update($deliveryMan['id'], data: ['is_active'=>$request['status']]);
        return response()->json([],200);
    }

    /**
     * @param string|int $id
     * @return RedirectResponse|View
     * @function delete ,update the deliveryMan data
     */
    public function delete(string|int $id) : RedirectResponse|View
    {
        if (!$this->deliveryManService->checkConditions()){
            return redirect()->route(Dashboard::INDEX[ROUTE]);
        }
        $deliveryMan = $this->deliveryManRepo->getFirstWhere(['seller_id' => auth('seller')->id(), 'id' => $id]);
        $this->deliveryManService->deleteImages(deliveryMan: $deliveryMan);
        $this->deliveryManRepo->delete(params:['id'=>$id]);
        ToastMagic::success(translate('delivery-man_removed').'!');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param string|int $id
     * @return RedirectResponse|View
     */
    public function getRatingView(Request $request , string|int $id): RedirectResponse|view
    {
        $deliveryMan = $this->deliveryManRepo->getFirstWhere(params:['seller_id' => auth('seller')->id(), 'id' => $id]);
        if (!$deliveryMan) {
            ToastMagic::warning(translate('invalid_review').'!');
            return redirect()->route(DeliveryMan::LIST[ROUTE]);
        }
        $searchValue = $request['search'];
        $filters = [
            'delivery_man_id' => $id,
            'from' => $request['from_date'],
            'to' => $request['to_date'],
            'rating' => $request['rating'],
        ];

        // Ensure we only query ratings that match our filters
        $reviewBaseQuery = Review::where('delivery_man_id', $id)
            ->when($searchValue, function ($query) use ($searchValue) {
                $query->whereHas('order', function ($q) use ($searchValue) {
                    $q->where('id', 'like', "%{$searchValue}%");
                });
            })
            ->when($request['from_date'] && $request['to_date'], function ($query) use ($request) {
                $query->whereBetween('created_at', [$request['from_date'] . ' 00:00:00', $request['to_date'] . ' 23:59:59']);
            })
            ->when($request['rating'], function ($query) use ($request) {
                $query->where('rating', $request['rating']);
            });

        // Paginate using DB level
        $reviews = (clone $reviewBaseQuery)
            ->with(['order'])
            ->orderBy('updated_at', 'desc')
            ->paginate(getWebConfig(name: 'pagination_limit'));

        $total = (clone $reviewBaseQuery)->count();
        $averageRatting = (clone $reviewBaseQuery)->avg('rating');

        $ratingCounts = (clone $reviewBaseQuery)
            ->select('rating', \Illuminate\Support\Facades\DB::raw('count(*) as count'))
            ->groupBy('rating')
            ->pluck('count', 'rating');

        $one = $ratingCounts->get(1, 0);
        $two = $ratingCounts->get(2, 0);
        $three = $ratingCounts->get(3, 0);
        $four = $ratingCounts->get(4, 0);
        $five = $ratingCounts->get(5, 0);

        return view(DeliveryMan::RATING[VIEW],compact(
            'deliveryMan',
            'searchValue',
            'filters',
            'reviews',
            'averageRatting',
            'total',
            'one',
            'two',
            'three',
            'four',
            'five'
        ));

    }

    public function exportList(Request $request): BinaryFileResponse
    {
        $vendorId = auth('seller')->id();
        $vendor = $this->vendorRepo->getFirstWhere(params:['id' => $vendorId]);
        $searchValue = $request['search'];
        $deliveryMens = $this->deliveryManRepo->getListWhere(
            orderBy: ['id'=>'desc'],
            searchValue: $searchValue,
            filters: ['seller_id' => $vendorId],
            dataLimit: getWebConfig(name: 'pagination_limit')
        );
        $active = $deliveryMens->where('is_active',1)->count();
        $inactive = $deliveryMens->where('is_active',0)->count();
        return Excel::download(new DeliveryManListExport([
            'data-from' => 'vendor',
            'vendor' => $vendor,
            'delivery_men' => $deliveryMens,
            'search' => $request['search'],
            'active' => $active,
            'inactive' => $inactive,
        ]), DeliveryManExport::EXPORT_XLSX
        );
    }
}
