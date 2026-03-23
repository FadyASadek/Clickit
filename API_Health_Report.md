# Clickit Automated API Health Check

| Scope | Endpoint | HTTP Status | Health Result |
|-------|----------|-------------|---------------|
| Customer/Guest | `/api/v1/config` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/business-pages` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/shipping-method/detail/{id}` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/shipping-method/by-seller/{id}/{seller_is}` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/shipping-method/chosen` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/shipping-method/check-shipping-type` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/cart` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/customer/order/get-order-by-id` | 403 | 🟡 Auth/Perm |
| Customer/Guest | `/api/v1/faq` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/notifications` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/notifications/seen` | 400 | 🟣 400 |
| Customer/Guest | `/api/v1/attributes` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/flash-deals` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/flash-deals/products/{deal_id}` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/deals/featured` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/dealsoftheday/deal-of-the-day` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/products/reviews/{product_id}` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/products/rating/{product_id}` | 403 | 🟡 Auth/Perm |
| Customer/Guest | `/api/v1/products/counter/{product_id}` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/products/shipping-methods` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/products/social-share-link/{product_id}` | 403 | 🟡 Auth/Perm |
| Customer/Guest | `/api/v1/products/latest` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/products/new-arrival` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/products/featured` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/products/top-rated` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/products/search` | 403 | 🟡 Auth/Perm |
| Customer/Guest | `/api/v1/products/suggestion-product` | 403 | 🟡 Auth/Perm |
| Customer/Guest | `/api/v1/products/details/{slug}` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/products/related-products/{product_id}` | 404 | ⚪ Not Found (Mock) |
| Customer/Guest | `/api/v1/products/best-sellings` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/products/home-categories` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/products/discounted-product` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/products/most-demanded-product` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/products/shop-again-product` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/products/just-for-you` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/products/most-searching` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/products/digital-author-list` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/products/digital-publishing-house-list` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/products/clearance-sale` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/seller/{seller_id}/products` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/seller/{seller_id}/seller-best-selling-products` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/seller/{seller_id}/seller-featured-product` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/seller/{seller_id}/seller-recommended-products` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/categories` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/categories/products/{category_id}` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/categories/find-what-you-need` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/brands` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/brands/products/{brand_id}` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/customer/get-restricted-country-list` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/customer/get-restricted-zip-list` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/customer/address/list` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/customer/order/place` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/customer/order/offline-payment-method-list` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/customer/order/details` | 403 | 🟡 Auth/Perm |
| Customer/Guest | `/api/v1/customer/order/generate-invoice` | 404 | ⚪ Not Found (Mock) |
| Customer/Guest | `/api/v1/customer/order/deliveryman-review` | 403 | 🟡 Auth/Perm |
| Customer/Guest | `/api/v1/customer/info` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/customer/address/get/{id}` | 404 | ⚪ Not Found (Mock) |
| Customer/Guest | `/api/v1/customer/support-ticket/get` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/customer/support-ticket/conv/{ticket_id}` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/customer/support-ticket/close/{id}` | 403 | 🟡 Auth/Perm |
| Customer/Guest | `/api/v1/customer/compare/list` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/customer/compare/product-replace` | 500 | 🔴 Error 500 |
| Customer/Guest | `/api/v1/customer/wish-list` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/customer/restock-requests/list` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/customer/order/place-by-wallet` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/customer/order/refund` | 404 | ⚪ Not Found (Mock) |
| Customer/Guest | `/api/v1/customer/order/refund-details` | 404 | ⚪ Not Found (Mock) |
| Customer/Guest | `/api/v1/customer/order/list` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/customer/chat/list/{type}` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/customer/chat/get-messages/{type}/{id}` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/customer/chat/search/{type}` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/customer/wallet/list` | 422 | 🟠 Validation Error |
| Customer/Guest | `/api/v1/customer/wallet/bonus-list` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/customer/loyalty/list` | 422 | 🟠 Validation Error |
| Customer/Guest | `/api/v1/customer/order/digital-product-download/{id}` | 500 | 🔴 Error 500 |
| Customer/Guest | `/api/v1/customer/order/digital-product-download-otp-verify` | 403 | 🟡 Auth/Perm |
| Customer/Guest | `/api/v1/order/track` | 403 | 🟡 Auth/Perm |
| Customer/Guest | `/api/v1/banners` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/seller` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/seller/list/{type}` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/seller/more` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/coupon/apply` | 202 | 🟣 202 |
| Customer/Guest | `/api/v1/coupon/list` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/coupon/applicable-list` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/coupons/{seller_id}/seller-wise-coupons` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/get-guest-id` | 200 | 🟢 OK |
| Customer/Guest | `/api/v1/mapapi/place-api-autocomplete` | 403 | 🟡 Auth/Perm |
| Customer/Guest | `/api/v1/mapapi/distance-api` | 403 | 🟡 Auth/Perm |
| Customer/Guest | `/api/v1/mapapi/place-api-details` | 403 | 🟡 Auth/Perm |
| Customer/Guest | `/api/v1/mapapi/geocode-api` | 403 | 🟡 Auth/Perm |
| Mobile App/Dev | `/api/v2/seller/seller-info` | 401 | 🟡 Auth/Perm |
| Mobile App/Dev | `/api/v2/seller/seller-delivery-man` | 401 | 🟡 Auth/Perm |
| Mobile App/Dev | `/api/v2/seller/shop-product-reviews` | 401 | 🟡 Auth/Perm |
| Mobile App/Dev | `/api/v2/seller/shop-product-reviews-status` | 401 | 🟡 Auth/Perm |
| Mobile App/Dev | `/api/v2/seller/monthly-earning` | 401 | 🟡 Auth/Perm |
| Mobile App/Dev | `/api/v2/seller/monthly-commission-given` | 401 | 🟡 Auth/Perm |
| Mobile App/Dev | `/api/v2/seller/shop-info` | 401 | 🟡 Auth/Perm |
| Mobile App/Dev | `/api/v2/seller/transactions` | 401 | 🟡 Auth/Perm |
| Mobile App/Dev | `/api/v2/seller/brands` | 200 | 🟢 OK |
| Mobile App/Dev | `/api/v2/seller/products/list` | 401 | 🟡 Auth/Perm |
| Mobile App/Dev | `/api/v2/seller/products/stock-out-list` | 401 | 🟡 Auth/Perm |
| Mobile App/Dev | `/api/v2/seller/products/status-update` | 401 | 🟡 Auth/Perm |
| Mobile App/Dev | `/api/v2/seller/products/edit/{id}` | 401 | 🟡 Auth/Perm |
| Mobile App/Dev | `/api/v2/seller/products/barcode/generate` | 422 | 🟠 Validation Error |
| Mobile App/Dev | `/api/v2/seller/orders/list` | 401 | 🟡 Auth/Perm |
| Mobile App/Dev | `/api/v2/seller/orders/{id}` | 401 | 🟡 Auth/Perm |
| Mobile App/Dev | `/api/v2/seller/refund/list` | 401 | 🟡 Auth/Perm |
| Mobile App/Dev | `/api/v2/seller/refund/refund-details` | 401 | 🟡 Auth/Perm |
| Mobile App/Dev | `/api/v2/seller/shipping/get-shipping-method` | 401 | 🟡 Auth/Perm |
| Mobile App/Dev | `/api/v2/seller/shipping/selected-shipping-method` | 401 | 🟡 Auth/Perm |
| Mobile App/Dev | `/api/v2/seller/shipping/all-category-cost` | 401 | 🟡 Auth/Perm |
| Mobile App/Dev | `/api/v2/seller/shipping-method/list` | 401 | 🟡 Auth/Perm |
| Mobile App/Dev | `/api/v2/seller/shipping-method/edit/{id}` | 401 | 🟡 Auth/Perm |
| Mobile App/Dev | `/api/v2/seller/messages/list/{type}` | 401 | 🟡 Auth/Perm |
| Mobile App/Dev | `/api/v2/seller/messages/get-message/{type}/{id}` | 401 | 🟡 Auth/Perm |
| Mobile App/Dev | `/api/v2/seller/messages/search/{type}` | 401 | 🟡 Auth/Perm |
| Mobile App/Dev | `/api/v2/delivery-man/info` | 401 | 🟡 Auth/Perm |
| Mobile App/Dev | `/api/v2/delivery-man/current-orders` | 401 | 🟡 Auth/Perm |
| Mobile App/Dev | `/api/v2/delivery-man/all-orders` | 401 | 🟡 Auth/Perm |
| Mobile App/Dev | `/api/v2/delivery-man/order-delivery-history` | 401 | 🟡 Auth/Perm |
| Mobile App/Dev | `/api/v2/delivery-man/order-item` | 401 | 🟡 Auth/Perm |
| Mobile App/Dev | `/api/v2/delivery-man/order-details` | 401 | 🟡 Auth/Perm |
| Mobile App/Dev | `/api/v2/delivery-man/last-location` | 401 | 🟡 Auth/Perm |
| Mobile App/Dev | `/api/v2/delivery-man/delivery-wise-earned` | 401 | 🟡 Auth/Perm |
| Mobile App/Dev | `/api/v2/delivery-man/order-list-by-date` | 401 | 🟡 Auth/Perm |
| Mobile App/Dev | `/api/v2/delivery-man/search` | 401 | 🟡 Auth/Perm |
| Mobile App/Dev | `/api/v2/delivery-man/profile-dashboard-counts` | 401 | 🟡 Auth/Perm |
| Mobile App/Dev | `/api/v2/delivery-man/review-list` | 401 | 🟡 Auth/Perm |
| Mobile App/Dev | `/api/v2/delivery-man/collected_cash_history` | 401 | 🟡 Auth/Perm |
| Mobile App/Dev | `/api/v2/delivery-man/emergency-contact-list` | 401 | 🟡 Auth/Perm |
| Mobile App/Dev | `/api/v2/delivery-man/notifications` | 401 | 🟡 Auth/Perm |
| Mobile App/Dev | `/api/v2/delivery-man/withdraw-list-by-approved` | 401 | 🟡 Auth/Perm |
| Mobile App/Dev | `/api/v2/delivery-man/messages/list/{type}` | 401 | 🟡 Auth/Perm |
| Mobile App/Dev | `/api/v2/delivery-man/messages/get-message/{type}/{id}` | 401 | 🟡 Auth/Perm |
| Mobile App/Dev | `/api/v2/delivery-man/messages/search/{type}` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/seller-info` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/get-earning-statitics` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/order-statistics` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/seller-delivery-man` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/shop-product-reviews` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/shop-product-reviews-status` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/monthly-earning` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/monthly-commission-given` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/shop-info` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/transactions` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/withdraw-method-list` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/brands` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/top-delivery-man` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/categories` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/products/list` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/products/details/{id}` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/products/stock-out-list` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/products/edit/{id}` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/products/review-list/{id}` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/products/barcode/generate` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/products/top-selling-product` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/products/most-popular-product` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/products/get-product-images/{id}` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/products/stock-limit-status` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/products/digital-author-list` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/products/digital-publishing-house-list` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/products/restock-request-brands-list` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/orders/list` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/orders/{id}` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/clearance-sale/product-list` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/clearance-sale/config-data` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/refund/list` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/refund/single-item` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/refund/refund-details` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/coupon/list` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/coupon/customers` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/shipping/get-shipping-method` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/shipping/selected-shipping-method` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/shipping/all-category-cost` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/shipping-method/list` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/shipping-method/edit/{id}` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/messages/list/{type}` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/messages/get-message/{type}/{id}` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/messages/search/{type}` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/pos/get-categories` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/pos/customers` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/pos/products` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/pos/product-list` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/pos/get-invoice` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/delivery-man/list` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/delivery-man/details/{id}` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/delivery-man/reviews/{id}` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/delivery-man/order-list/{id}` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/delivery-man/order-status-history/{id}` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/delivery-man/earning/{id}` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/delivery-man/collect-cash-list/{id}` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/delivery-man/withdraw/list` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/delivery-man/withdraw/details/{id}` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/delivery-man/emergency-contact/list` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/notification` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/notification/view` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/payment-information/list` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/payment-information/withdrawal-method-list` | 401 | 🟡 Auth/Perm |
| Seller | `/api/v3/seller/products/{seller_id}/all-products` | 200 | 🟢 OK |
