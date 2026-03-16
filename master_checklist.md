# ClickIt Audit — Master Fix Checklist

---

## 🔒 Security

- [x] **SEC-1:** Replace file-upload blacklist with whitelist validation in `ProductAddRequest.php` — re-enable the commented-out `mimes` rule and remove the manual `in_array($extension, …)` check.
- [x] **SEC-2:** Replace file-upload blacklist with whitelist validation in `ProductUpdateRequest.php` (same pattern likely duplicated).
- [x] **SEC-3:** Add proper `authorize()` logic in `ProductAddRequest` (currently returns `true` unconditionally).
- [x] **SEC-4:** Add proper `authorize()` logic in `ProductUpdateRequest`.
- [ ] **SEC-5:** Audit all remaining FormRequest classes for the same `authorize() → true` anti-pattern.

---

## ⚡ Performance

- [x] **PERF-1:** Fix N+1 queries in `ProductController::getProductGalleryView()` — color lookup inside `$products->map()` loop queries DB per iteration.
- [x] **PERF-2:** Fix N+1 / in-memory sorting in `ProductRepository::getTopSellList()` — fetches ALL products then sorts in PHP with `sortByDesc`.
- [x] **PERF-3:** Fix N+1 / in-memory pagination in `ProductRepository::getTopRatedList()` — fetches ALL products then slices in PHP.
- [x] **PERF-4:** Review `ProductService` SKU combination generation (`getCombinations`, [getVariations](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/Admin/Product/ProductController.php#623-633)) for memory efficiency on large catalogs.
- [x] **PERF-5:** Audit View templates for lazy-loaded relationship access that would cause N+1 — `_side-bar.blade.php` was firing 20+ individual count queries on every page load. Colleague cached all sidebar badge counters with 60s `Cache::remember` and a single `GROUP BY` query.
- [x] **PERF-6:** `DashboardController::index()` — Severe memory leak: fetches entire tables into memory just to count them (e.g., `customerRepo->...->count()`). Must use DB-level [count()](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/RestAPI/v1/ProductController.php#430-440).
- [x] **PERF-7:** `DashboardController::index()` — In-memory limits: fetches entire tables to get top records (e.g., `getTopCustomerList(dataLimit: 'all')->take()`). Must use DB [limit()](file:///d:/Freelance/Clickit/Clickit/app/Utils/Helpers.php#764-773).
- [x] **PERF-8:** `DashboardController::getOrderStatusData()` — Replaced 12 redundant per-status queries with a single `GROUP BY order_status` query.
- [x] **PERF-9:** `ProductRepository::getListWhere()` — Fetches full models into memory via `->get()` just to array map IDs (`->get()?->pluck('id')`). Must use DB-level `pluck()`.
- [x] **PERF-10:** `ProductRepository::getListWhereNotIn()` — Ignores `dataLimit` argument entirely and always calls `->get()`, returning potentially un-paginated massive datasets.
- [x] **PERF-11:** `BrandController::index()` & Admin list view — Memory leak on brand list. Loaded all 10,000+ products into memory to sum order details and count products instead of pushing to DB.
- [x] **PERF-12:** `product.php` helper — `getVendorProductsCount()` / `getAdminProductsCount()` replaced `->get()->count()` with `DB::table()->count()` for sidebar product badge counts.
- [x] **PERF-13:** `DashboardController::getRealTimeActivities()` — Replaced full-collection fetch with DB-level [count()](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/RestAPI/v1/ProductController.php#430-440) for new orders.
- [x] **PERF-14:** Fixed 500 error on Dashboard caused by referencing non-existent `avoid_walking_customer` column.
- [ ] **PERF-15:** `CustomerController::getView()` — Fetches ALL orders for a customer via `getListWhere(dataLimit: 'all')` into memory just to count statuses with `->map()`. Should use a single `GROUP BY order_status` query (same pattern we fixed in `DashboardController::getOrderStatusData`).
- [ ] **PERF-16:** `CustomerController::index()` — Calls `getListWhereBetween(dataLimit: 'all')->count()` to get `$totalCustomers`, loading every customer row into memory just for a count. Must use DB-level `->count()`.
- [ ] **PERF-17:** `CustomerController::getSubscriberListView()` — Same fetch-all-then-count anti-pattern: `getListWhere(dataLimit: 'all')->count()` for `$totalSubscribers`.
- [ ] **PERF-18:** `CustomerRepository::getListWhereBetween()` — When `$takeItem` is set, fetches the **entire** result set via `->get()` then slices in PHP. Should use DB-level `->take()` / `->limit()` instead.
- [ ] **PERF-19:** `CustomerRepository::getListWhereNotIn()` — Ignores `$dataLimit` parameter entirely and always calls `->get()`, returning potentially massive unfiltered collections. Same bug pattern as the already-fixed `ProductRepository::getListWhereNotIn()`.
- [ ] **PERF-20:** `DeliveryManController::getRatingView()` — Fetches ALL reviews for a delivery man via `getListWhere(dataLimit: 'all')` into memory, then does in-PHP `->paginate()`, `->count()`, `->avg('rating')`, and per-star `->where('rating', N)->count()`. Should use DB-level `COUNT`, `AVG`, `GROUP BY rating`, and proper paginated query.
- [ ] **PERF-21:** `CustomRoleController::index()` — Fetches all employee roles with `dataLimit: 'all'` without pagination. Low risk now (few roles), but should use paginated query for consistency.
- [ ] **PERF-22:** `OrderController::exportList()` — Fetches ALL orders with `dataLimit: 'all'`, then loops over them using `->map()` calling `$order->orderDetails` without eager loading [orderDetails](file:///d:/Freelance/Clickit/Clickit/app/Models/Product.php#304-309) first, causing a massive N+1 query issue for large exports.
- [ ] **PERF-23:** `OrderController::getView()` — Calculates `$totalDelivered` using `getListWhere(..., dataLimit: 'all')->count()`. This fetches ALL delivered orders into PHP memory just to count them! Should use DB-level `->count()`.
- [ ] **PERF-24:** `ReviewController::index()` & [exportList()](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/Admin/Product/ReviewController.php#137-183) — Fetches all products and customers matching search into memory with `dataLimit: 'all'`, just to `pluck('id')`, causing severe memory leaks on search. Must use DB-level `pluck()`.
- [ ] **PERF-25:** [ProductController](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/Admin/Product/ProductController.php#51-967) — [exportList](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/Admin/Product/ReviewController.php#137-183), [getStockLimitStatus](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/RestAPI/v3/seller/ProductController.php#1430-1448), and [exportRestockList](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/Admin/Product/ProductController.php#924-965) use `dataLimit: 'all'` without chunking, which can exhaust memory on massive datasets.
- [ ] **PERF-26:** `SiteMapController::processGenerateAndDownload()` — Fetches ALL active products and shops into memory with `dataLimit: 'all'` just to `->pluck('slug')` and `->pluck('id')`. Must use DB-level `pluck()`.
- [ ] **PERF-27:** `InhouseShopController::index()` — Fetches ALL in-house products into memory with `dataLimit: 'all'` just to `->pluck('id')->toArray()` for a later `whereIn` query. Must use DB-level pluck or subquery.
- [ ] **PERF-28:** `ShippingMethodController::index()` — N+1 query issue. Iterates through all category IDs and runs a database insert ([add](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/Admin/Shipping/ShippingMethodController.php#90-102)) inside the loop for missing category shipping costs. Should use [insert()](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/Customer/SystemController.php#44-66) or bulk operations.
- [ ] **PERF-29:** `VendorController::exportOrderList()` — Fetches ALL orders into memory (`dataLimit: 'all'`) then uses PHP [map()](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/Admin/Settings/SiteMapController.php#86-110) to count order statuses instead of using a DB-level `GROUP BY order_status` query.
- [ ] **PERF-30:** `VendorController::getView()` — Calculates complex review/rating data (count per star, averages) by iterating over all products and their reviews in PHP memory (`$seller?->product?->map()`). Will cause massive memory spikes for vendors with many reviews. Must use DB-level aggregates.
- [ ] **PERF-31:** [ReportController](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/Admin/ReportController.php#25-1532) — Severe memory leaks. Calculates earnings, metrics, and aggregates by fetching all orders via `->latest('updated_at')->get()` and looping over collections in PHP memory. Must use DB-level aggregates (`SUM`, `GROUP BY`).
- [ ] **PERF-32:** [TransactionReportController](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/Admin/TransactionReportController.php#29-1333) — Severe memory leaks. Similar to [ReportController](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/Admin/ReportController.php#25-1532), it handles transaction aggregations by fetching large datasets into PHP memory (`->get()`) and summing via loops.
- [ ] **PERF-33:** [ChattingController](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/Admin/ChattingController.php#23-296) — Uses `->getListWhereNotNull(..., dataLimit: 'all')` resulting in loading all matching chat records into memory just to pick the last chat user or count messages.
- [ ] **PERF-34:** [OrderReportController](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/Admin/OrderReportController.php#22-446) — Memory leaks in chart/monthly aggregations (e.g. [order_report_same_month](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/Vendor/OrderReportController.php#158-181)) due to `->get()` followed by in-PHP loops to sum metrics.
- [ ] **PERF-35:** [VendorProductSaleReportController](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/Admin/VendorProductSaleReportController.php#22-401) — Memory leaks for vendor chart aggregations (e.g. [seller_report_same_year](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/Admin/VendorProductSaleReportController.php#172-193)) due to `->get()` followed by PHP array loops.
- [ ] **PERF-36:** [ExpenseTransactionReportController](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/Admin/ExpenseTransactionReportController.php#29-425) — Memory leaks in expense chart data processing (`->get()` and loops).
- [ ] **PERF-37:** [ProductReportController](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/Admin/ProductReportController.php#17-386) — Memory leaks in product chart data processing (`->get()` and loops).
- [ ] **PERF-38:** `TransactionController::export()` — Fetches all transactions into memory using `->get()` and iterates over them. Large exports will exhaust memory.
- [x] **PERF-39:** `[API v1] BannerController::getBannerList()` — Severe N+1 query loop. Calls `Product::find()` inside a `foreach` loop when processing banners of type 'product'.
- [ ] **PERF-40:** `[API v1] BrandController::get_brands()` — Memory leak in priority sort. Loads all brands and their products into memory via `->get()->map()` just to sort them with PHP `sortByDesc()`.
- [x] **PERF-41:** `[API v1] CartController::getCartList()` — N+1 query loops. Calls `Product::find()` and `Cart::where()->get()` inside a [map](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/Admin/Settings/SiteMapController.php#86-110) loop for every cart item.
- [ ] **PERF-42:** `[API v1] CategoryController::find_what_you_need()` — Fetches all categories into memory and uses PHP array slicing and filtering loops instead of SQL limits.
- [x] **PERF-43:** `[API v1] ChatController::search()` — Severe N+1 loop. Queries the DB twice inside a `foreach` loop (`first()` and [count()](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/RestAPI/v1/ProductController.php#430-440)) for every unique chat ID found.
- [ ] **PERF-44:** `[API v1] CustomerController::get_order_details()` — N+1 query loop. Inside the Collection [map()](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/Admin/Settings/SiteMapController.php#86-110) loop for order details, it runs a DB query: `Review::where(...)`.
- [ ] **PERF-45:** `[API v1] CustomerRestockRequestController::deleteRestockRequests()` — Memory leak. Fetches ALL restock products into memory with `dataLimit: 'all'` just to check if relations exist, deleting via map loop instead of a DB-level query.
- [x] **PERF-46:** `[API v1] ProductController::getProductsFilter()` — Severe memory leak. Fetches ALL Publishing Houses and Authors with their related products into memory via `->get()` just to assemble ID arrays in PHP foreach loops instead of SQL plucks or subqueries.
- [x] **PERF-47:** `[API v1] ProductController::just_for_you()` — Severe memory leak. Fetches ALL user orders with details into memory via `->get()`, then extensively maps through nested JSON strings in PHP to extract categories.
- [ ] **PERF-48:** `[API v1] SellerController::getSellerList()` — Memory leak. Iterates through all in-house product reviews in PHP memory (`pluck('rating')`) to count positive ratings instead of using a DB-level query (`where('rating', '>=', 4)->count()`).
- [ ] **PERF-49:** `[API v1 Seller] SellerController::more_sellers()` — Memory leak. Fetches ALL active shops with their seller's order counts into memory via `->get()`, then sorts them in PHP using `sortByDesc()` instead of `orderBy()`.
- [ ] **PERF-50:** `[API v1 Auth] CustomerAPIAuthController::login()` — Redundant query. Queries the user twice for failed login attempts (`$this->customerRepo->getByIdentity()`) instead of using the already loaded `$user` model.
- [ ] **PERF-51:** `[API v1 Auth] EmailVerificationController` and [PhoneVerificationController](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/RestAPI/v1/auth/PhoneVerificationController.php#17-193) — Security/Performance. OTP cleanup logic uses expensive `->first()` loops and manual deletions instead of bulk expiration queries, leading to token table bloat.
- [ ] **PERF-52:** `[API v1 Auth] ForgotPasswordController::reset_password_request()` — Memory Leak risk. Uses `->get()` and manual logic if it needs to process OTP requests instead of relying on `->updateOrCreate()`.
- [ ] **PERF-53:** `[API v1 Auth] SocialAuthController::social_login()` — N+1 query. Fetches business settings (`apple_login`) via a direct DB query inside the controller rather than utilizing cached config helpers (`getWebConfig()`).
- [x] **PERF-54:** `[API v2 Delivery] DeliveryManController::info()` — Severe memory leak. Fetches ALL orders into memory via `->get()` just to count their statuses (`'pending'`, `'delivered'`) using PHP `->where()->count()`. Must use DB-level `COUNT` with `GROUP BY`.
- [x] **PERF-55:** `[API v2 Delivery] ChatController::search()` — Severe N+1 loop. Plucks user IDs, queries unique chat IDs, then loops over them running `Chatting::with(...)->where(...)->latest()->first()` for every single chat ID.
- [x] **PERF-56:** `[API v2 Seller] ProductController::list()` — Memory leak. Fetches ALL seller products via `->get()` without pagination. Will overload memory for sellers with large catalogs.
- [x] **PERF-57:** `[API v2 Seller] OrderController::list()` — Severe memory leak. Fetches ALL orders for a seller into memory via `->get()` without pagination, then maps over them to decode JSON.
- [x] **PERF-58:** `[API v2 Seller] SellerController::shop_info()` — Inefficient query. Plucks ALL a seller's product IDs into a massive PHP array just to pass it into a `Review::whereIn()` average rating query.
- [ ] **PERF-59:** `[API v2 Seller] SellerController::monthly_earning()` and [monthly_commission_given()](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/RestAPI/v3/seller/SellerController.php#461-484) — Memory leak. Fetches all order transactions via `->get()->toArray()` then loops 1 to 12 in PHP.
- [x] **PERF-60:** `[API v2 Seller] ChatController::search()` — Severe N+1 loop. Identical to the Delivery Man ChatController search flaw; loops over chat IDs querying the DB for each.
- [ ] **PERF-61:** `[API v2 Seller] RefundController::list()` — Memory leak liability. Fetches the entire refund request list for a seller into memory via `->get()` (without pagination) and then processes images in a PHP map loop.
- [x] **PERF-62:** `[API v3 Seller] ProductController::getVendorAllProducts()` — Memory leak. Fetches ALL [PublishingHouse](file:///d:/Freelance/Clickit/Clickit/app/Models/PublishingHouse.php#19-44) and [Author](file:///d:/Freelance/Clickit/Clickit/app/Models/Author.php#19-44) records along with their nested products into memory just to map IDs in PHP via `each()`.
- [x] **PERF-63:** `[API v3 Seller] POSController::place_order()` — Severe N+1 loop. Queries the DB via `Product::where()->first()` inside a `foreach` loop over cart items, and runs DB inserts for [order_details](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/RestAPI/v1/CustomerController.php#404-453) inside the loop.
- [x] **PERF-64:** `[API v3 Seller] SellerController::shop_info()` — Inefficient query array blob. Plucks ALL a seller's product IDs into a PHP array just to pass it into a `Review::whereIn()` aggregation query.
- [x] **PERF-65:** `[API v3 Seller] SellerController::monthly_earning()` and [monthly_commission_given()](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/RestAPI/v3/seller/SellerController.php#461-484) — Memory leak. Fetches all order transactions via `->get()->toArray()` then iterates 1 to 12 in a PHP loop instead of using GROUP BY.
- [x] **PERF-66:** `[API v3 Seller] ChatController::search()` — Severe N+1 loop. Plucks user IDs, queries unique chat IDs, then loops over them running `Chatting::with(...)->where(...)->latest()->first()` for every single chat ID.
- [ ] **PERF-67:** `[API v3 Seller] RefundController::list()` — Memory leak. Fetches the entire refund request list into memory via `->get()` without pagination.
- [ ] **PERF-68:** `[Web Vendor] TransactionReportController` — Severe memory leak in [order_transaction_summary_pdf](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/Vendor/TransactionReportController.php#283-425) loading all transactions to memory and calculating totals via PHP loops.
- [ ] **PERF-69:** `[Web Vendor] OrderReportController` — Memory leak in [exportOrderReportInPDF](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/Admin/OrderReportController.php#398-445) doing `$orders->sum('order_amount')` after fetching all orders.
- [ ] **PERF-70:** `[Web Vendor] DashboardController` — Heavy in-memory date mapping in [index()](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/Web/ProductDetailsController.php#44-58) after `$orderTransactionRepo->getListWhereBetween()->get()`.
- [ ] **PERF-71:** `[Web Vendor] ProductReportController` — Memory leaks in [all_product](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/Vendor/ProductReportController.php#27-120) fetching all products and order details into memory to calculate sales metrics via PHP loops.
- [ ] **PERF-72:** `[Web Vendor] WithdrawController` — Memory leak in [exportList](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/Admin/Product/ReviewController.php#137-183), fetching all withdraw requests into memory (`dataLimit: 'all'`) instead of using chunking.
- [ ] **PERF-73:** `[Web Front] WebController` — Memory leak in [getAllVendorsView](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/Web/WebController.php#207-310) processing large amounts of data and performing complex calculations on shop and product reviews.
- [ ] **PERF-74:** `[Web Front] ProductListController` — Inefficient data processing in [theme_fashion](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/Web/ProductListController.php#173-251) fetching product data and applying filtering/sorting in PHP.
- [ ] **PERF-75:** `[Web Front] ShopViewController` — N+1 queries in [getShopInfoArray](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/Web/ShopViewController.php#32-70) separately querying for order counts and reviews instead of eager loading.
- [ ] **PERF-76:** `[Web Front] UserProfileController` — Memory leaks fetching large collections of order history/addresses before processing.
- [ ] **PERF-77:** `[Web Front] ProductDetailsController` — Extensive data aggregation in [getThemeFashion](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/Web/ProductDetailsController.php#255-432) which might be unoptimized.
- [ ] **PERF-78:** `[Web Front] HomeController` — Heavy dataset fetching and processing in [default_theme](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/Web/ShopViewController.php#87-123) and [theme_fashion](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/Web/ProductListController.php#173-251).
- [ ] **PERF-79:** `[Web Front] CartController` — N+1 queries in [getVariantPrice](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/Web/CartController.php#45-180) where `Product::find($request->id)` is called inside a loop over choice options.
---

## 🏗️ Code Quality & Refactoring

### God Classes — Break down oversized files
- [x] **REF-1:** Extract image-processing logic from `ProductService` into a dedicated `ProductImageService`.
- [x] **REF-2:** Extract variation/SKU logic from `ProductService` into a dedicated `ProductVariationService`.
- [x] **REF-3:** Extract bulk-import logic from `ProductService` into a dedicated `ProductImportService`.
- [ ] **REF-4:** Extract digital-product variation logic from [ProductController](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/Admin/Product/ProductController.php#51-967) ([getDigitalProductUpdateProcess](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/RestAPI/v3/seller/ProductController.php#1118-1184)) into its Service.

### Monolithic Repository Queries — Use Pipelines / Filter classes
- [ ] **REF-5:** Refactor `ProductRepository::getListWhere()` — replace 100+ line `when()` chain with a Pipeline or Filter pattern.
- [ ] **REF-6:** Refactor `ProductRepository::getListWithScope()` — same treatment.
- [ ] **REF-7:** Refactor `ProductRepository::getWebListWithScope()` — same treatment.

### Missing DTOs
- [ ] **REF-8:** Create a `ProductData` DTO to replace the massive array in `ProductService::getAddProductData()`.
- [ ] **REF-9:** Create / reuse DTO for `ProductService::getUpdateProductData()`.
- [ ] **REF-10:** Create / reuse DTO for `ProductService::getImportBulkProductData()`.

### Tight Coupling to Global State
- [ ] **REF-11:** Remove direct [auth('admin')->id()](file:///d:/Freelance/Clickit/Clickit/app/Models/DigitalProductAuthor.php#40-44) / [auth('seller')->id()](file:///d:/Freelance/Clickit/Clickit/app/Models/DigitalProductAuthor.php#40-44) calls from `ProductService`; pass the user ID from the Controller instead.
- [ ] **REF-12:** Remove direct `currencyConverter()` calls from `ProductService`; inject a CurrencyConverter service or pass converted values.
- [ ] **REF-13:** Remove direct `getWebConfig()` calls from `ProductService`; pass config values from the Controller.

### Naming & Miscellaneous
- [x] **REF-14:** Fix typo model file `ReferrlaCustomer.php` → `ReferralCustomer.php` and update all references.
- [ ] **REF-15:** Implement the empty `ProductRepository::getList()` stub method (currently has `// TODO`).
- [x] **REF-16:** Remove unused imports in `ProductService` (`use function React\Promise\all;`, `use function Aws\map;`, `phpDocumentor\Reflection\Types\Boolean`).
- [ ] **REF-17:** [ProductController](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/Admin/Product/ProductController.php#51-967) constructor has **25 injected dependencies** — reduce by extracting sub-controllers or action classes.
- [ ] **REF-18:** `SubscriptionRepository::getListWhereBetween()` — Duplicates the same in-memory `->get()->slice()` pagination anti-pattern found in `CustomerRepository`. Should share a base class or trait with DB-level limit/offset.
- [ ] **REF-19:** `ReviewRepository` — Has 3 large `getListWhere*` methods (lines 37–158) with heavily duplicated `->when()` filter chains. Should consolidate shared filters into a private `applyFilters()` method or use a Pipeline/Filter pattern.
- [ ] **REF-20:** [OrderController](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/RestAPI/v3/seller/OrderController.php#29-561) — Massive God Class (552 lines) with **16 injected dependencies** in its constructor. It handles listing, exporting, status updating, address updating, assigning delivery men, etc. Extract responsibilities into dedicated Action classes or Services.
- [ ] **REF-21:** [ProductController](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/Admin/Product/ProductController.php#51-967) — Massive God Class (~1000 lines) with **25 injected dependencies**. Needs SRP breakdown (e.g., extract Stock Limit, Restock requests, and complex Digital File logic into dedicated controllers or Action classes).
- [ ] **REF-22:** [VendorController](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/Admin/Vendor/VendorController.php#43-580) — God Class (580 lines) managing vendor lists, individual vendor profiles (orders, products, settings, transactions, reviews), registration, and withdrawals. It injects **15 repositories/services**. It should be broken down into sub-controllers (e.g., `VendorProfileController`, `VendorWithdrawalController`).
- [ ] **REF-23:** [ReportController](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/Admin/ReportController.php#25-1532) — God Class (over 1500 lines). Handles multiple disparate reports (Earning, Admin, Seller, Inhouse, Product, Order). Should be broken down into discrete Controllers or Services.
- [ ] **REF-24:** [TransactionReportController](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/Admin/TransactionReportController.php#29-1333) — God Class (over 1300 lines). Similar issues handling order transactions, expense reports, wallet reports, etc. Needs breakdown.
- [ ] **REF-25:** `[API v1] OrderController` — Massive API God Class (almost 900 lines). Contains complex nested logic for checkout (offline, wallet, normal), OTP sending, refunds, and file downloads. Needs Action classes.
- [ ] **REF-26:** `[API v1] ProductController` — Massive API God Class (800+ lines). Handles complex filtering, recommendations, reviews, and related logic. Highly tangled business logic should move to Services.
- [ ] **REF-27:** `[API v2 Seller] ProductController` — God Class (672 lines). Extremely similar tightly-coupled logic to the web ProductController for adding/updating products. Requires extraction into a shared `ProductService`.
- [ ] **REF-28:** `[API v3 Seller] ProductController` — God Class (1600+ lines). Exact massive duplication of logic from the web and v2 [ProductController](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/Admin/Product/ProductController.php#51-967)s handles filtering, uploading, saving, and variations. Must be refactored into the shared `ProductService`.
- [ ] **REF-29:** `[Web Front] WebController` — God Class (~800 lines). Handles various frontend aspects like product searches, category listings, brand listings, and checkout processes. Needs breakdown.
- [ ] **REF-30:** `[Web Front] UserProfileController` — God Class (~800 lines). Too many responsibilities (account details, addresses, orders, support tickets). Should be extracted into discrete controllers.
- [ ] **REF-31:** `[Web Vendor] TransactionReportController` — God Class (~800 lines). Handles all complex transaction and expense reporting logic calculation inside loops. Needs Action classes.
- [ ] **REF-32:** `[System] InstallController / UpdateController` — Messy Logic. Uses raw shell commands (`shell_exec`, `ln -s`) and raw DB queries (`DB::unprepared`) directly in the controller instead of utilizing proper services or native Laravel storage links securely.
- [ ] **REF-33:** `[Payment] Payment Controllers` — Code Duplication. Controllers like [PaytmController](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/Payment_Methods/PaytmController.php#20-412), [LiqPayController](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/Payment_Methods/LiqPayController.php#280-347), [PaymobController](file:///d:/Freelance/Clickit/Clickit/app/Http/Controllers/Payment_Methods/PaymobController.php#14-284) contain duplicated cURL implementations, encryptions, and hash generations. Should be abstracted into a unified `PaymentGatewayService` or utilize Laravel's Http client.
- [ ] **REF-34:** `[Cart & Order] Deep CartManager/OrderManager Coupling` — The Cart calculations (like `OrderManager::verifyCartListMinimumOrderAmount`) contain highly redundant queries mixed with heavy business-logic conditions affecting the global state. Fixing N+1 at the root of [CartManager](file:///d:/Freelance/Clickit/Clickit/app/Utils/CartManager.php#19-932) needs architectural decouple. 
- [ ] **REF-35:** `[API v2 Seller] ProductController::list() & OrderController::list() — Mobile App Pagination Support` — Both endpoints currently return raw JSON arrays. The API now caps results at 100 via `take(100)` to prevent OOM. The mobile frontend must be updated to support proper paginated responses (`total_size/limit/offset` wrapper) before the API can switch to `->paginate()`.
---

## 🧪 Testing

- [ ] **TEST-1:** Set up a testing framework (Pest PHP or PHPUnit) with a proper test database.
- [ ] **TEST-2:** Write Feature test: Admin can add a product (physical).
- [ ] **TEST-3:** Write Feature test: Admin can add a product (digital).
- [ ] **TEST-4:** Write Feature test: Seller cannot view/modify another Seller's product (multi-vendor isolation).
- [ ] **TEST-5:** Write Feature test: Cart + Checkout with stock-race-condition edge case.
- [ ] **TEST-6:** Write Unit test: SKU combination generation produces unique, correct results.
- [ ] **TEST-7:** Write Unit test: Discount cannot exceed or equal unit/variation price.

---

**Total items: 121**

