# Clickit Comprehensive API Documentation

This document provides a full overview of all available API endpoints in the project. It details the HTTP methods, URI, mapping controllers, required middleware (for authentication/guest limits), and route parameters.

### Global Rules:
- Endpoints requiring `auth:api` must be supplied with a valid Bearer token (`Authorization: Bearer <token>`).
- Endpoints utilizing `apiGuestCheck` require either a valid `Authorization` token OR a `guest_id` in the Request (Header/Body/URL).


## V1 - Add-to-fund API

| HTTP Method | Endpoint URI | Middleware (Auth) | Controller Context | Route Params |
|-------------|--------------|-------------------|--------------------|--------------|
| `POST` | `/api/v1/add-to-fund` | `api, api_lang, auth:api` | `PaymentController@customer_add_to_fund_request` | `None` |

## V1 - Attributes API

| HTTP Method | Endpoint URI | Middleware (Auth) | Controller Context | Route Params |
|-------------|--------------|-------------------|--------------------|--------------|
| `GET` | `/api/v1/attributes` | `api, api_lang` | `AttributeController@get_attributes` | `None` |

## V1 - Auth API

| HTTP Method | Endpoint URI | Middleware (Auth) | Controller Context | Route Params |
|-------------|--------------|-------------------|--------------------|--------------|
| `POST` | `/api/v1/auth/check-email` | `api, api_lang` | `CustomerAPIAuthController@checkEmail` | `None` |
| `POST` | `/api/v1/auth/check-phone` | `api, api_lang` | `CustomerAPIAuthController@checkPhone` | `None` |
| `POST` | `/api/v1/auth/existing-account-check` | `api, api_lang` | `SocialAuthController@existingAccountCheck` | `None` |
| `POST` | `/api/v1/auth/firebase-auth-token-store` | `api, api_lang` | `CustomerAPIAuthController@firebaseAuthTokenStore` | `None` |
| `POST` | `/api/v1/auth/firebase-auth-verify` | `api, api_lang` | `CustomerAPIAuthController@firebaseAuthVerify` | `None` |
| `POST` | `/api/v1/auth/forgot-password` | `api, api_lang` | `CustomerAPIAuthController@passwordResetRequest` | `None` |
| `POST` | `/api/v1/auth/login` | `api, api_lang` | `CustomerAPIAuthController@login` | `None` |
| `GET` | `/api/v1/auth/logout` | `api, api_lang, auth:api` | `PassportAuthController@logout` | `None` |
| `POST` | `/api/v1/auth/register` | `api, api_lang` | `CustomerAPIAuthController@register` | `None` |
| `POST` | `/api/v1/auth/registration-with-otp` | `api, api_lang` | `CustomerAPIAuthController@registrationWithOTP` | `None` |
| `POST` | `/api/v1/auth/registration-with-social-media` | `api, api_lang` | `SocialAuthController@registrationWithSocialMedia` | `None` |
| `POST` | `/api/v1/auth/resend-otp-check-email` | `api, api_lang` | `EmailVerificationController@resend_otp_check_email` | `None` |
| `POST` | `/api/v1/auth/resend-otp-check-phone` | `api, api_lang` | `PhoneVerificationController@resend_otp_check_phone` | `None` |
| `PUT` | `/api/v1/auth/reset-password` | `api, api_lang` | `ForgotPasswordController@reset_password_submit` | `None` |
| `POST` | `/api/v1/auth/social-customer-login` | `api, api_lang` | `SocialAuthController@customerSocialLogin` | `None` |
| `POST` | `/api/v1/auth/social-login` | `api, api_lang` | `SocialAuthController@social_login` | `None` |
| `POST` | `/api/v1/auth/update-phone` | `api, api_lang` | `SocialAuthController@update_phone` | `None` |
| `POST` | `/api/v1/auth/verify-email` | `api, api_lang` | `CustomerAPIAuthController@verifyEmail` | `None` |
| `POST` | `/api/v1/auth/verify-otp` | `api, api_lang` | `CustomerAPIAuthController@verifyOTP` | `None` |
| `POST` | `/api/v1/auth/verify-phone` | `api, api_lang` | `CustomerAPIAuthController@verifyPhone` | `None` |
| `POST` | `/api/v1/auth/verify-profile-info` | `api, api_lang, apiGuestCheck` | `CustomerAPIAuthController@verifyProfileInfo` | `None` |
| `POST` | `/api/v1/auth/verify-token` | `api, api_lang` | `ForgotPasswordController@tokenVerificationSubmit` | `None` |

## V1 - Banners API

| HTTP Method | Endpoint URI | Middleware (Auth) | Controller Context | Route Params |
|-------------|--------------|-------------------|--------------------|--------------|
| `GET` | `/api/v1/banners` | `api, api_lang` | `BannerController@getBannerList` | `None` |

## V1 - Brands API

| HTTP Method | Endpoint URI | Middleware (Auth) | Controller Context | Route Params |
|-------------|--------------|-------------------|--------------------|--------------|
| `GET` | `/api/v1/brands` | `api, api_lang, apiGuestCheck` | `BrandController@get_brands` | `None` |
| `GET` | `/api/v1/brands/products/{brand_id}` | `api, api_lang, apiGuestCheck` | `BrandController@get_products` | `{brand_id}` |

## V1 - Business-pages API

| HTTP Method | Endpoint URI | Middleware (Auth) | Controller Context | Route Params |
|-------------|--------------|-------------------|--------------------|--------------|
| `GET` | `/api/v1/business-pages` | `api, api_lang` | `ConfigController@getBusinessPagesList` | `None` |

## V1 - Cart API

| HTTP Method | Endpoint URI | Middleware (Auth) | Controller Context | Route Params |
|-------------|--------------|-------------------|--------------------|--------------|
| `GET` | `/api/v1/cart` | `api, api_lang, apiGuestCheck` | `CartController@getCartList` | `None` |
| `POST` | `/api/v1/cart/add` | `api, api_lang, apiGuestCheck` | `CartController@addToCart` | `None` |
| `POST` | `/api/v1/cart/get-referral-discount-redeem` | `api, api_lang, apiGuestCheck` | `CartController@getReferralDiscountRedeem` | `None` |
| `POST` | `/api/v1/cart/product-restock-request` | `api, api_lang, apiGuestCheck` | `CartController@addProductRestockRequest` | `None` |
| `DELETE` | `/api/v1/cart/remove` | `api, api_lang, apiGuestCheck` | `CartController@remove_from_cart` | `None` |
| `DELETE` | `/api/v1/cart/remove-all` | `api, api_lang, apiGuestCheck` | `CartController@remove_all_from_cart` | `None` |
| `POST` | `/api/v1/cart/select-cart-items` | `api, api_lang, apiGuestCheck` | `CartController@updateCheckedCartItems` | `None` |
| `PUT` | `/api/v1/cart/update` | `api, api_lang, apiGuestCheck` | `CartController@update_cart` | `None` |

## V1 - Categories API

| HTTP Method | Endpoint URI | Middleware (Auth) | Controller Context | Route Params |
|-------------|--------------|-------------------|--------------------|--------------|
| `GET` | `/api/v1/categories` | `api, api_lang, apiGuestCheck` | `CategoryController@get_categories` | `None` |
| `GET` | `/api/v1/categories/find-what-you-need` | `api, api_lang, apiGuestCheck` | `CategoryController@find_what_you_need` | `None` |
| `GET` | `/api/v1/categories/products/{category_id}` | `api, api_lang, apiGuestCheck` | `CategoryController@get_products` | `{id}` |

## V1 - Config API

| HTTP Method | Endpoint URI | Middleware (Auth) | Controller Context | Route Params |
|-------------|--------------|-------------------|--------------------|--------------|
| `GET` | `/api/v1/config` | `api, api_lang` | `ConfigController@configuration` | `None` |

## V1 - Contact-us API

| HTTP Method | Endpoint URI | Middleware (Auth) | Controller Context | Route Params |
|-------------|--------------|-------------------|--------------------|--------------|
| `POST` | `/api/v1/contact-us` | `api, api_lang` | `GeneralController@contact_store` | `None` |

## V1 - Coupon API

| HTTP Method | Endpoint URI | Middleware (Auth) | Controller Context | Route Params |
|-------------|--------------|-------------------|--------------------|--------------|
| `GET` | `/api/v1/coupon/applicable-list` | `api, api_lang, auth:api` | `CouponController@applicable_list` | `None` |
| `GET` | `/api/v1/coupon/apply` | `api, api_lang, auth:api` | `CouponController@apply` | `None` |
| `GET` | `/api/v1/coupon/list` | `api, api_lang, auth:api` | `CouponController@list` | `None` |

## V1 - Coupons API

| HTTP Method | Endpoint URI | Middleware (Auth) | Controller Context | Route Params |
|-------------|--------------|-------------------|--------------------|--------------|
| `GET` | `/api/v1/coupons/{seller_id}/seller-wise-coupons` | `api, api_lang` | `CouponController@getSellerWiseCoupon` | `{seller_id}` |

## V1 - Customer API

| HTTP Method | Endpoint URI | Middleware (Auth) | Controller Context | Route Params |
|-------------|--------------|-------------------|--------------------|--------------|
| `GET` | `/api/v1/customer/account-delete/{id}` | `api, api_lang, auth:api` | `CustomerController@account_delete` | `{id}` |
| `DELETE` | `/api/v1/customer/address` | `api, api_lang, apiGuestCheck` | `CustomerController@delete_address` | `None` |
| `POST` | `/api/v1/customer/address/add` | `api, api_lang, apiGuestCheck` | `CustomerController@add_new_address` | `None` |
| `GET` | `/api/v1/customer/address/get/{id}` | `api, api_lang, auth:api` | `CustomerController@get_address` | `` |
| `GET` | `/api/v1/customer/address/list` | `api, api_lang, apiGuestCheck` | `CustomerController@address_list` | `None` |
| `POST` | `/api/v1/customer/address/update` | `api, api_lang, apiGuestCheck` | `CustomerController@update_address` | `None` |
| `GET` | `/api/v1/customer/chat/get-messages/{type}/{id}` | `api, api_lang, auth:api` | `ChatController@get_message` | `{type}, {id}` |
| `GET` | `/api/v1/customer/chat/list/{type}` | `api, api_lang, auth:api` | `ChatController@list` | `{type}` |
| `GET` | `/api/v1/customer/chat/search/{type}` | `api, api_lang, auth:api` | `ChatController@search` | `{type}` |
| `POST` | `/api/v1/customer/chat/seen-message/{type}` | `api, api_lang, auth:api` | `ChatController@seen_message` | `{type}` |
| `POST` | `/api/v1/customer/chat/send-message/{type}` | `api, api_lang, auth:api` | `ChatController@send_message` | `{type}` |
| `PUT` | `/api/v1/customer/cm-firebase-token` | `api, api_lang, apiGuestCheck` | `CustomerController@update_cm_firebase_token` | `None` |
| `DELETE` | `/api/v1/customer/compare/clear-all` | `api, api_lang, auth:api` | `CompareController@clear_all` | `None` |
| `GET` | `/api/v1/customer/compare/list` | `api, api_lang, auth:api` | `CompareController@list` | `None` |
| `GET` | `/api/v1/customer/compare/product-replace` | `api, api_lang, auth:api` | `CompareController@compare_product_replace` | `None` |
| `POST` | `/api/v1/customer/compare/product-store` | `api, api_lang, auth:api` | `CompareController@compare_product_store` | `None` |
| `GET` | `/api/v1/customer/get-restricted-country-list` | `api, api_lang, apiGuestCheck` | `CustomerController@get_restricted_country_list` | `None` |
| `GET` | `/api/v1/customer/get-restricted-zip-list` | `api, api_lang, apiGuestCheck` | `CustomerController@get_restricted_zip_list` | `None` |
| `GET` | `/api/v1/customer/info` | `api, api_lang, auth:api` | `CustomerController@info` | `None` |
| `PUT` | `/api/v1/customer/language-change` | `api, api_lang, apiGuestCheck` | `CustomerController@language_change` | `None` |
| `GET` | `/api/v1/customer/loyalty/list` | `api, api_lang, auth:api` | `UserLoyaltyController@list` | `None` |
| `POST` | `/api/v1/customer/loyalty/loyalty-exchange-currency` | `api, api_lang, auth:api` | `UserLoyaltyController@loyalty_exchange_currency` | `None` |
| `POST` | `/api/v1/customer/order/again` | `api, api_lang, auth:api` | `OrderController@order_again` | `None` |
| `GET` | `/api/v1/customer/order/deliveryman-review` | `api, api_lang, apiGuestCheck` | `ReviewController@getReview` | `None` |
| `POST` | `/api/v1/customer/order/deliveryman-review/update` | `api, api_lang, apiGuestCheck` | `ReviewController@updateDeliveryManReview` | `None` |
| `POST` | `/api/v1/customer/order/deliveryman-reviews/submit` | `api, api_lang, auth:api, auth:api` | `ProductController@submit_deliveryman_review` | `None` |
| `GET` | `/api/v1/customer/order/details` | `api, api_lang, apiGuestCheck` | `CustomerController@get_order_details` | `None` |
| `POST` | `/api/v1/customer/order/digital-product-download-otp-resend` | `api, api_lang, apiGuestCheck` | `OrderController@digital_product_download_otp_resend` | `None` |
| `GET` | `/api/v1/customer/order/digital-product-download-otp-verify` | `api, api_lang, apiGuestCheck` | `OrderController@digital_product_download_otp_verify` | `None` |
| `GET` | `/api/v1/customer/order/digital-product-download/{id}` | `api, api_lang, apiGuestCheck` | `OrderController@digital_product_download` | `{id}` |
| `GET` | `/api/v1/customer/order/generate-invoice` | `api, api_lang, apiGuestCheck` | `CustomerController@getOrderInvoice` | `None` |
| `GET` | `/api/v1/customer/order/get-order-by-id` | `api, api_lang, apiGuestCheck` | `CustomerController@getOrderById` | `None` |
| `GET` | `/api/v1/customer/order/list` | `api, api_lang, auth:api` | `CustomerController@get_order_list` | `None` |
| `GET` | `/api/v1/customer/order/offline-payment-method-list` | `api, api_lang, apiGuestCheck` | `OrderController@offline_payment_method_list` | `None` |
| `GET` | `/api/v1/customer/order/place` | `api, api_lang, apiGuestCheck` | `OrderController@place_order` | `None` |
| `POST` | `/api/v1/customer/order/place-by-offline-payment` | `api, api_lang, apiGuestCheck` | `OrderController@placeOrderByOfflinePayment` | `None` |
| `GET` | `/api/v1/customer/order/place-by-wallet` | `api, api_lang, auth:api` | `OrderController@placeOrderByWallet` | `None` |
| `GET` | `/api/v1/customer/order/refund` | `api, api_lang, auth:api` | `OrderController@refund_request` | `None` |
| `GET` | `/api/v1/customer/order/refund-details` | `api, api_lang, auth:api` | `OrderController@refund_details` | `None` |
| `POST` | `/api/v1/customer/order/refund-store` | `api, api_lang, auth:api` | `OrderController@store_refund` | `None` |
| `POST` | `/api/v1/customer/restock-requests/delete` | `api, api_lang, auth:api` | `CustomerRestockRequestController@deleteRestockRequests` | `None` |
| `GET` | `/api/v1/customer/restock-requests/list` | `api, api_lang, auth:api` | `CustomerRestockRequestController@restockRequestsList` | `None` |
| `GET` | `/api/v1/customer/support-ticket/close/{id}` | `api, api_lang, auth:api` | `CustomerController@support_ticket_close` | `{id}` |
| `GET` | `/api/v1/customer/support-ticket/conv/{ticket_id}` | `api, api_lang, auth:api` | `CustomerController@get_support_ticket_conv` | `{ticket_id}` |
| `POST` | `/api/v1/customer/support-ticket/create` | `api, api_lang, auth:api` | `CustomerController@create_support_ticket` | `None` |
| `GET` | `/api/v1/customer/support-ticket/get` | `api, api_lang, auth:api` | `CustomerController@get_support_tickets` | `None` |
| `POST` | `/api/v1/customer/support-ticket/reply/{ticket_id}` | `api, api_lang, auth:api` | `CustomerController@reply_support_ticket` | `{ticket_id}` |
| `PUT` | `/api/v1/customer/update-profile` | `api, api_lang, auth:api` | `CustomerController@update_profile` | `None` |
| `GET` | `/api/v1/customer/wallet/bonus-list` | `api, api_lang, auth:api` | `UserWalletController@bonus_list` | `None` |
| `GET` | `/api/v1/customer/wallet/list` | `api, api_lang, auth:api` | `UserWalletController@list` | `None` |
| `GET` | `/api/v1/customer/wish-list` | `api, api_lang, auth:api` | `CustomerController@wish_list` | `None` |
| `POST` | `/api/v1/customer/wish-list/add` | `api, api_lang, auth:api` | `CustomerController@add_to_wishlist` | `None` |
| `DELETE` | `/api/v1/customer/wish-list/remove` | `api, api_lang, auth:api` | `CustomerController@remove_from_wishlist` | `None` |

## V1 - Deals API

| HTTP Method | Endpoint URI | Middleware (Auth) | Controller Context | Route Params |
|-------------|--------------|-------------------|--------------------|--------------|
| `GET` | `/api/v1/deals/featured` | `api, api_lang` | `DealController@getFeaturedDealProducts` | `None` |

## V1 - Dealsoftheday API

| HTTP Method | Endpoint URI | Middleware (Auth) | Controller Context | Route Params |
|-------------|--------------|-------------------|--------------------|--------------|
| `GET` | `/api/v1/dealsoftheday/deal-of-the-day` | `api, api_lang` | `DealOfTheDayController@getDealOfTheDayProduct` | `None` |

## V1 - Digital-payment API

| HTTP Method | Endpoint URI | Middleware (Auth) | Controller Context | Route Params |
|-------------|--------------|-------------------|--------------------|--------------|
| `POST` | `/api/v1/digital-payment` | `api, api_lang, apiGuestCheck` | `PaymentController@payment` | `None` |

## V1 - Faq API

| HTTP Method | Endpoint URI | Middleware (Auth) | Controller Context | Route Params |
|-------------|--------------|-------------------|--------------------|--------------|
| `GET` | `/api/v1/faq` | `api, api_lang` | `GeneralController@faq` | `None` |

## V1 - Flash-deals API

| HTTP Method | Endpoint URI | Middleware (Auth) | Controller Context | Route Params |
|-------------|--------------|-------------------|--------------------|--------------|
| `GET` | `/api/v1/flash-deals` | `api, api_lang` | `FlashDealController@getFlashDeal` | `None` |
| `GET` | `/api/v1/flash-deals/products/{deal_id}` | `api, api_lang` | `FlashDealController@getFlashDealProducts` | `{deal_id}` |

## V1 - Get-guest-id API

| HTTP Method | Endpoint URI | Middleware (Auth) | Controller Context | Route Params |
|-------------|--------------|-------------------|--------------------|--------------|
| `GET` | `/api/v1/get-guest-id` | `api, api_lang` | `GeneralController@get_guest_id` | `None` |

## V1 - Mapapi API

| HTTP Method | Endpoint URI | Middleware (Auth) | Controller Context | Route Params |
|-------------|--------------|-------------------|--------------------|--------------|
| `GET` | `/api/v1/mapapi/distance-api` | `api, api_lang` | `MapApiController@distanceApi` | `None` |
| `GET` | `/api/v1/mapapi/geocode-api` | `api, api_lang` | `MapApiController@geocode_api` | `None` |
| `GET` | `/api/v1/mapapi/place-api-autocomplete` | `api, api_lang` | `MapApiController@placeApiAutocomplete` | `None` |
| `GET` | `/api/v1/mapapi/place-api-details` | `api, api_lang` | `MapApiController@placeApiDetails` | `None` |

## V1 - Notifications API

| HTTP Method | Endpoint URI | Middleware (Auth) | Controller Context | Route Params |
|-------------|--------------|-------------------|--------------------|--------------|
| `GET` | `/api/v1/notifications` | `api, api_lang` | `NotificationController@list` | `None` |
| `GET` | `/api/v1/notifications/seen` | `api, api_lang, auth:api` | `NotificationController@notification_seen` | `None` |

## V1 - Order API

| HTTP Method | Endpoint URI | Middleware (Auth) | Controller Context | Route Params |
|-------------|--------------|-------------------|--------------------|--------------|
| `GET` | `/api/v1/order/cancel-order` | `api, api_lang` | `OrderController@order_cancel` | `None` |
| `GET` | `/api/v1/order/track` | `api, api_lang` | `OrderController@track_by_order_id` | `None` |
| `POST` | `/api/v1/order/track-order` | `api, api_lang` | `OrderController@track_order` | `None` |

## V1 - Products API

| HTTP Method | Endpoint URI | Middleware (Auth) | Controller Context | Route Params |
|-------------|--------------|-------------------|--------------------|--------------|
| `GET` | `/api/v1/products/best-sellings` | `api, api_lang, apiGuestCheck` | `ProductController@getBestSellingProducts` | `None` |
| `GET` | `/api/v1/products/clearance-sale` | `api, api_lang, apiGuestCheck` | `ProductController@getClearanceSale` | `None` |
| `GET` | `/api/v1/products/counter/{product_id}` | `api, api_lang` | `ProductController@counter` | `{product_id}` |
| `GET` | `/api/v1/products/details/{slug}` | `api, api_lang, apiGuestCheck` | `ProductController@getProductDetails` | `{slug}` |
| `GET` | `/api/v1/products/digital-author-list` | `api, api_lang, apiGuestCheck` | `ProductController@getDigitalProductsAuthorList` | `None` |
| `GET` | `/api/v1/products/digital-publishing-house-list` | `api, api_lang, apiGuestCheck` | `ProductController@getDigitalPublishingHouseList` | `None` |
| `GET` | `/api/v1/products/discounted-product` | `api, api_lang, apiGuestCheck` | `ProductController@get_discounted_product` | `None` |
| `GET` | `/api/v1/products/featured` | `api, api_lang, apiGuestCheck` | `ProductController@getFeaturedProductsList` | `None` |
| `POST` | `/api/v1/products/filter` | `api, api_lang, apiGuestCheck` | `ProductController@getProductsFilter` | `None` |
| `GET` | `/api/v1/products/home-categories` | `api, api_lang, apiGuestCheck` | `ProductController@get_home_categories` | `None` |
| `GET` | `/api/v1/products/just-for-you` | `api, api_lang, apiGuestCheck` | `ProductController@just_for_you` | `None` |
| `GET` | `/api/v1/products/latest` | `api, api_lang, apiGuestCheck` | `ProductController@get_latest_products` | `None` |
| `GET` | `/api/v1/products/most-demanded-product` | `api, api_lang, apiGuestCheck` | `ProductController@get_most_demanded_product` | `None` |
| `GET` | `/api/v1/products/most-searching` | `api, api_lang, apiGuestCheck` | `ProductController@getMostSearchingProductsList` | `None` |
| `GET` | `/api/v1/products/new-arrival` | `api, api_lang, apiGuestCheck` | `ProductController@getNewArrivalProducts` | `None` |
| `GET` | `/api/v1/products/rating/{product_id}` | `api, api_lang` | `ProductController@get_product_rating` | `{id}` |
| `GET` | `/api/v1/products/related-products/{product_id}` | `api, api_lang, apiGuestCheck` | `ProductController@get_related_products` | `{id}` |
| `DELETE` | `/api/v1/products/review/delete-image` | `api, api_lang, auth:api` | `ProductController@deleteReviewImage` | `None` |
| `PUT` | `/api/v1/products/review/update` | `api, api_lang, auth:api` | `ProductController@updateProductReview` | `None` |
| `GET` | `/api/v1/products/review/{product_id}/{order_id}` | `api, api_lang, auth:api` | `ProductController@getProductReviewByOrder` | `{productId}, {orderId}` |
| `POST` | `/api/v1/products/reviews/submit` | `api, api_lang, auth:api` | `ProductController@submit_product_review` | `None` |
| `GET` | `/api/v1/products/reviews/{product_id}` | `api, api_lang` | `ProductController@get_product_reviews` | `{id}` |
| `GET|POST|PUT|PATCH|DELETE|OPTIONS` | `/api/v1/products/search` | `api, api_lang, apiGuestCheck` | `ProductController@get_searched_products` | `None` |
| `GET` | `/api/v1/products/shipping-methods` | `api, api_lang` | `ProductController@get_shipping_methods` | `None` |
| `GET` | `/api/v1/products/shop-again-product` | `api, api_lang, apiGuestCheck, auth:api` | `ProductController@getShopAgainProduct` | `None` |
| `GET` | `/api/v1/products/social-share-link/{product_id}` | `api, api_lang` | `ProductController@socialShareLink` | `{product_id}` |
| `GET|POST|PUT|PATCH|DELETE|OPTIONS` | `/api/v1/products/suggestion-product` | `api, api_lang, apiGuestCheck` | `ProductController@get_suggestion_product` | `None` |
| `GET` | `/api/v1/products/top-rated` | `api, api_lang, apiGuestCheck` | `ProductController@getTopRatedProducts` | `None` |

## V1 - Seller API

| HTTP Method | Endpoint URI | Middleware (Auth) | Controller Context | Route Params |
|-------------|--------------|-------------------|--------------------|--------------|
| `GET` | `/api/v1/seller` | `api, api_lang` | `SellerController@get_seller_info` | `None` |
| `GET` | `/api/v1/seller/list/{type}` | `api, api_lang` | `SellerController@getSellerList` | `{type}` |
| `GET` | `/api/v1/seller/more` | `api, api_lang` | `SellerController@more_sellers` | `None` |
| `GET` | `/api/v1/seller/{seller_id}/products` | `api, api_lang, apiGuestCheck` | `SellerController@getVendorProducts` | `{seller_id}` |
| `GET` | `/api/v1/seller/{seller_id}/seller-best-selling-products` | `api, api_lang, apiGuestCheck` | `SellerController@get_seller_best_selling_products` | `{seller_id}` |
| `GET` | `/api/v1/seller/{seller_id}/seller-featured-product` | `api, api_lang, apiGuestCheck` | `SellerController@get_sellers_featured_product` | `{seller_id}` |
| `GET` | `/api/v1/seller/{seller_id}/seller-recommended-products` | `api, api_lang, apiGuestCheck` | `SellerController@get_sellers_recommended_products` | `{seller_id}` |

## V1 - Shipping-method API

| HTTP Method | Endpoint URI | Middleware (Auth) | Controller Context | Route Params |
|-------------|--------------|-------------------|--------------------|--------------|
| `GET` | `/api/v1/shipping-method/by-seller/{id}/{seller_is}` | `api, api_lang, apiGuestCheck` | `ShippingMethodController@shipping_methods_by_seller` | `{id}, {seller_is}` |
| `GET` | `/api/v1/shipping-method/check-shipping-type` | `api, api_lang, apiGuestCheck` | `ShippingMethodController@check_shipping_type` | `None` |
| `POST` | `/api/v1/shipping-method/choose-for-order` | `api, api_lang, apiGuestCheck` | `ShippingMethodController@choose_for_order` | `None` |
| `GET` | `/api/v1/shipping-method/chosen` | `api, api_lang, apiGuestCheck` | `ShippingMethodController@chosen_shipping_methods` | `None` |
| `GET` | `/api/v1/shipping-method/detail/{id}` | `api, api_lang, apiGuestCheck` | `ShippingMethodController@get_shipping_method_info` | `{id}` |

## V2 - Delivery-man API

| HTTP Method | Endpoint URI | Middleware (Auth) | Controller Context | Route Params |
|-------------|--------------|-------------------|--------------------|--------------|
| `GET` | `/api/v2/delivery-man/all-orders` | `api, api_lang, delivery_man_auth` | `DeliveryManController@get_all_orders` | `None` |
| `POST` | `/api/v2/delivery-man/auth/forgot-password` | `api, api_lang` | `LoginController@reset_password_request` | `None` |
| `POST` | `/api/v2/delivery-man/auth/login` | `api, api_lang` | `LoginController@login` | `None` |
| `POST` | `/api/v2/delivery-man/auth/reset-password` | `api, api_lang` | `LoginController@reset_password_submit` | `None` |
| `POST` | `/api/v2/delivery-man/auth/verify-otp` | `api, api_lang` | `LoginController@otp_verification_submit` | `None` |
| `PUT` | `/api/v2/delivery-man/bank-info` | `api, api_lang, delivery_man_auth` | `DeliveryManController@bank_info` | `None` |
| `POST` | `/api/v2/delivery-man/change-status` | `api, api_lang, delivery_man_auth` | `DeliveryManController@change_status` | `None` |
| `GET` | `/api/v2/delivery-man/collected_cash_history` | `api, api_lang, delivery_man_auth` | `DeliveryManController@collected_cash_history` | `None` |
| `GET` | `/api/v2/delivery-man/current-orders` | `api, api_lang, delivery_man_auth` | `DeliveryManController@get_current_orders` | `None` |
| `GET` | `/api/v2/delivery-man/delivery-wise-earned` | `api, api_lang, delivery_man_auth` | `DeliveryManController@delivery_wise_earned` | `None` |
| `POST` | `/api/v2/delivery-man/distance-api` | `api, api_lang, delivery_man_auth` | `DeliveryManController@distance_api` | `None` |
| `GET` | `/api/v2/delivery-man/emergency-contact-list` | `api, api_lang, delivery_man_auth` | `DeliveryManController@emergency_contact_list` | `None` |
| `GET` | `/api/v2/delivery-man/info` | `api, api_lang, delivery_man_auth` | `DeliveryManController@info` | `None` |
| `PUT` | `/api/v2/delivery-man/is-online` | `api, api_lang, delivery_man_auth` | `DeliveryManController@is_online` | `None` |
| `PUT` | `/api/v2/delivery-man/language-change` | `api, api_lang, delivery_man_auth` | `DeliveryManController@language_change` | `None` |
| `GET` | `/api/v2/delivery-man/last-location` | `api, api_lang, delivery_man_auth` | `DeliveryManController@get_last_location` | `None` |
| `GET` | `/api/v2/delivery-man/messages/get-message/{type}/{id}` | `api, api_lang, delivery_man_auth` | `ChatController@get_message` | `{type}, {id}` |
| `GET` | `/api/v2/delivery-man/messages/list/{type}` | `api, api_lang, delivery_man_auth` | `ChatController@list` | `{type}` |
| `GET` | `/api/v2/delivery-man/messages/search/{type}` | `api, api_lang, delivery_man_auth` | `ChatController@search` | `{type}` |
| `POST` | `/api/v2/delivery-man/messages/send-message/{type}` | `api, api_lang, delivery_man_auth` | `ChatController@send_message` | `{type}` |
| `GET` | `/api/v2/delivery-man/notifications` | `api, api_lang, delivery_man_auth` | `DeliveryManController@get_all_notification` | `None` |
| `GET` | `/api/v2/delivery-man/order-delivery-history` | `api, api_lang, delivery_man_auth` | `DeliveryManController@get_order_history` | `None` |
| `POST` | `/api/v2/delivery-man/order-delivery-verification` | `api, api_lang, delivery_man_auth` | `DeliveryManController@order_delivery_verification` | `None` |
| `GET` | `/api/v2/delivery-man/order-details` | `api, api_lang, delivery_man_auth` | `DeliveryManController@get_order_details` | `None` |
| `GET` | `/api/v2/delivery-man/order-item` | `api, api_lang, delivery_man_auth` | `DeliveryManController@getOrderItem` | `None` |
| `GET` | `/api/v2/delivery-man/order-list-by-date` | `api, api_lang, delivery_man_auth` | `DeliveryManController@order_list_date_filter` | `` |
| `PUT` | `/api/v2/delivery-man/order-update-is-pause` | `api, api_lang, delivery_man_auth` | `DeliveryManController@order_update_is_pause` | `None` |
| `GET` | `/api/v2/delivery-man/profile-dashboard-counts` | `api, api_lang, delivery_man_auth` | `DeliveryManController@profile_dashboard_counts` | `None` |
| `POST` | `/api/v2/delivery-man/record-location-data` | `api, api_lang, delivery_man_auth` | `DeliveryManController@record_location_data` | `None` |
| `POST` | `/api/v2/delivery-man/resend-verification-code` | `api, api_lang, delivery_man_auth` | `DeliveryManController@resend_verification_code` | `None` |
| `GET` | `/api/v2/delivery-man/review-list` | `api, api_lang, delivery_man_auth` | `DeliveryManController@review_list` | `None` |
| `PUT` | `/api/v2/delivery-man/save-review` | `api, api_lang, delivery_man_auth` | `DeliveryManController@is_saved` | `None` |
| `GET` | `/api/v2/delivery-man/search` | `api, api_lang, delivery_man_auth` | `DeliveryManController@search` | `None` |
| `PUT` | `/api/v2/delivery-man/update-expected-delivery` | `api, api_lang, delivery_man_auth` | `DeliveryManController@update_expected_delivery` | `None` |
| `PUT` | `/api/v2/delivery-man/update-fcm-token` | `api, api_lang, delivery_man_auth` | `DeliveryManController@update_fcm_token` | `None` |
| `PUT` | `/api/v2/delivery-man/update-info` | `api, api_lang, delivery_man_auth` | `DeliveryManController@update_info` | `None` |
| `PUT` | `/api/v2/delivery-man/update-order-status` | `api, api_lang, delivery_man_auth` | `DeliveryManController@update_order_status` | `None` |
| `PUT` | `/api/v2/delivery-man/update-payment-status` | `api, api_lang, delivery_man_auth` | `DeliveryManController@order_payment_status_update` | `None` |
| `POST` | `/api/v2/delivery-man/verify-order-delivery-otp` | `api, api_lang, delivery_man_auth` | `DeliveryManController@verify_order_delivery_otp` | `None` |
| `GET` | `/api/v2/delivery-man/withdraw-list-by-approved` | `api, api_lang, delivery_man_auth` | `WithdrawController@getWithdrawListByApproved` | `None` |
| `POST` | `/api/v2/delivery-man/withdraw-request` | `api, api_lang, delivery_man_auth` | `WithdrawController@sendWithdrawRequest` | `None` |

## V2 - Ls-lib-update API

| HTTP Method | Endpoint URI | Middleware (Auth) | Controller Context | Route Params |
|-------------|--------------|-------------------|--------------------|--------------|
| `POST` | `/api/v2/ls-lib-update` | `api, api_lang` | `LsLibController@lib_update` | `None` |

## V2 - Seller API

| HTTP Method | Endpoint URI | Middleware (Auth) | Controller Context | Route Params |
|-------------|--------------|-------------------|--------------------|--------------|
| `GET` | `/api/v2/seller/account-delete` | `api, api_lang` | `SellerController@account_delete` | `None` |
| `POST` | `/api/v2/seller/auth/forgot-password` | `api, api_lang` | `ForgotPasswordController@reset_password_request` | `None` |
| `POST` | `/api/v2/seller/auth/login` | `api, api_lang` | `LoginController@login` | `None` |
| `PUT` | `/api/v2/seller/auth/reset-password` | `api, api_lang` | `ForgotPasswordController@reset_password_submit` | `None` |
| `POST` | `/api/v2/seller/auth/verify-otp` | `api, api_lang` | `ForgotPasswordController@otp_verification_submit` | `None` |
| `POST` | `/api/v2/seller/balance-withdraw` | `api, api_lang` | `SellerController@withdraw_request` | `None` |
| `GET` | `/api/v2/seller/brands` | `api, api_lang` | `BrandController@getBrands` | `None` |
| `DELETE` | `/api/v2/seller/close-withdraw-request` | `api, api_lang` | `SellerController@close_withdraw_request` | `None` |
| `PUT` | `/api/v2/seller/cm-firebase-token` | `api, api_lang` | `SellerController@update_cm_firebase_token` | `None` |
| `GET` | `/api/v2/seller/messages/get-message/{type}/{id}` | `api, api_lang` | `ChatController@get_message` | `` |
| `GET` | `/api/v2/seller/messages/list/{type}` | `api, api_lang` | `ChatController@list` | `` |
| `GET` | `/api/v2/seller/messages/search/{type}` | `api, api_lang` | `ChatController@search` | `` |
| `POST` | `/api/v2/seller/messages/send/{type}` | `api, api_lang` | `ChatController@send_message` | `` |
| `GET` | `/api/v2/seller/monthly-commission-given` | `api, api_lang` | `SellerController@monthly_commission_given` | `None` |
| `GET` | `/api/v2/seller/monthly-earning` | `api, api_lang` | `SellerController@monthly_earning` | `None` |
| `PUT` | `/api/v2/seller/orders/assign-delivery-man` | `api, api_lang` | `OrderController@assign_delivery_man` | `None` |
| `POST` | `/api/v2/seller/orders/assign-third-party-delivery` | `api, api_lang` | `OrderController@assign_third_party_delivery` | `None` |
| `PUT` | `/api/v2/seller/orders/delivery-charge-date-update` | `api, api_lang` | `OrderController@amount_date_update` | `None` |
| `GET` | `/api/v2/seller/orders/list` | `api, api_lang` | `OrderController@list` | `None` |
| `PUT` | `/api/v2/seller/orders/order-detail-status/{id}` | `api, api_lang` | `OrderController@order_detail_status` | `None` |
| `PUT` | `/api/v2/seller/orders/order-wise-product-upload` | `api, api_lang` | `OrderController@digital_file_upload_after_sell` | `None` |
| `POST` | `/api/v2/seller/orders/update-payment-status` | `api, api_lang` | `OrderController@update_payment_status` | `None` |
| `GET` | `/api/v2/seller/orders/{id}` | `api, api_lang` | `OrderController@details` | `{id}` |
| `POST` | `/api/v2/seller/products/add` | `api, api_lang` | `ProductController@add_new` | `None` |
| `GET` | `/api/v2/seller/products/barcode/generate` | `api, api_lang` | `ProductController@barcode_generate` | `None` |
| `DELETE` | `/api/v2/seller/products/delete/{id}` | `api, api_lang` | `ProductController@delete` | `{id}` |
| `GET` | `/api/v2/seller/products/edit/{id}` | `api, api_lang` | `ProductController@edit` | `{id}` |
| `GET` | `/api/v2/seller/products/list` | `api, api_lang` | `ProductController@list` | `None` |
| `GET` | `/api/v2/seller/products/status-update` | `api, api_lang` | `ProductController@status_update` | `None` |
| `GET` | `/api/v2/seller/products/stock-out-list` | `api, api_lang` | `ProductController@stock_out_list` | `None` |
| `PUT` | `/api/v2/seller/products/update/{id}` | `api, api_lang` | `ProductController@update` | `{id}` |
| `POST` | `/api/v2/seller/products/upload-digital-product` | `api, api_lang` | `ProductController@upload_digital_product` | `None` |
| `POST` | `/api/v2/seller/products/upload-images` | `api, api_lang` | `ProductController@upload_images` | `None` |
| `GET` | `/api/v2/seller/refund/list` | `api, api_lang` | `RefundController@list` | `None` |
| `GET` | `/api/v2/seller/refund/refund-details` | `api, api_lang` | `RefundController@refund_details` | `None` |
| `POST` | `/api/v2/seller/refund/refund-status-update` | `api, api_lang` | `RefundController@refund_status_update` | `None` |
| `POST` | `/api/v2/seller/registration` | `api, api_lang` | `RegisterController@store` | `None` |
| `GET` | `/api/v2/seller/seller-delivery-man` | `api, api_lang` | `SellerController@seller_delivery_man` | `None` |
| `GET` | `/api/v2/seller/seller-info` | `api, api_lang` | `SellerController@seller_info` | `None` |
| `PUT` | `/api/v2/seller/seller-update` | `api, api_lang` | `SellerController@seller_info_update` | `None` |
| `POST` | `/api/v2/seller/shipping-method/add` | `api, api_lang` | `ShippingMethodController@store` | `None` |
| `DELETE` | `/api/v2/seller/shipping-method/delete/{id}` | `api, api_lang` | `ShippingMethodController@delete` | `None` |
| `GET` | `/api/v2/seller/shipping-method/edit/{id}` | `api, api_lang` | `ShippingMethodController@edit` | `{id}` |
| `GET` | `/api/v2/seller/shipping-method/list` | `api, api_lang` | `ShippingMethodController@list` | `None` |
| `PUT` | `/api/v2/seller/shipping-method/status` | `api, api_lang` | `ShippingMethodController@status_update` | `None` |
| `PUT` | `/api/v2/seller/shipping-method/update/{id}` | `api, api_lang` | `ShippingMethodController@update` | `{id}` |
| `GET` | `/api/v2/seller/shipping/all-category-cost` | `api, api_lang` | `shippingController@all_category_cost` | `None` |
| `GET` | `/api/v2/seller/shipping/get-shipping-method` | `api, api_lang` | `shippingController@get_shipping_type` | `None` |
| `GET` | `/api/v2/seller/shipping/selected-shipping-method` | `api, api_lang` | `shippingController@selected_shipping_type` | `None` |
| `POST` | `/api/v2/seller/shipping/set-category-cost` | `api, api_lang` | `shippingController@set_category_cost` | `None` |
| `GET` | `/api/v2/seller/shop-info` | `api, api_lang` | `SellerController@shop_info` | `None` |
| `GET` | `/api/v2/seller/shop-product-reviews` | `api, api_lang` | `SellerController@shop_product_reviews` | `None` |
| `GET` | `/api/v2/seller/shop-product-reviews-status` | `api, api_lang` | `SellerController@shop_product_reviews_status` | `None` |
| `PUT` | `/api/v2/seller/shop-update` | `api, api_lang` | `SellerController@shop_info_update` | `None` |
| `GET` | `/api/v2/seller/transactions` | `api, api_lang` | `SellerController@transaction` | `None` |

## V3 - Seller API

| HTTP Method | Endpoint URI | Middleware (Auth) | Controller Context | Route Params |
|-------------|--------------|-------------------|--------------------|--------------|
| `GET` | `/api/v3/seller/account-delete` | `api, api_lang, seller_api_auth` | `SellerController@account_delete` | `None` |
| `POST` | `/api/v3/seller/auth/forgot-password` | `api, api_lang` | `ForgotPasswordController@reset_password_request` | `None` |
| `POST` | `/api/v3/seller/auth/login` | `api, api_lang` | `LoginController@login` | `None` |
| `PUT` | `/api/v3/seller/auth/reset-password` | `api, api_lang` | `ForgotPasswordController@reset_password_submit` | `None` |
| `POST` | `/api/v3/seller/auth/verify-otp` | `api, api_lang` | `ForgotPasswordController@otp_verification_submit` | `None` |
| `POST` | `/api/v3/seller/balance-withdraw` | `api, api_lang, seller_api_auth` | `SellerController@withdraw_request` | `None` |
| `GET` | `/api/v3/seller/brands` | `api, api_lang, seller_api_auth` | `BrandController@getBrands` | `None` |
| `GET` | `/api/v3/seller/categories` | `api, api_lang, seller_api_auth` | `ProductController@get_categories` | `None` |
| `POST` | `/api/v3/seller/clearance-sale/all-product-delete` | `api, api_lang, seller_api_auth` | `ClearanceSaleController@deleteAllClearanceProduct` | `None` |
| `GET` | `/api/v3/seller/clearance-sale/config-data` | `api, api_lang, seller_api_auth` | `ClearanceSaleController@getConfigData` | `None` |
| `POST` | `/api/v3/seller/clearance-sale/config-data-update` | `api, api_lang, seller_api_auth` | `ClearanceSaleController@updateConfigData` | `None` |
| `POST` | `/api/v3/seller/clearance-sale/config-status-update` | `api, api_lang, seller_api_auth` | `ClearanceSaleController@updateClearanceConfigStatus` | `None` |
| `POST` | `/api/v3/seller/clearance-sale/product-add` | `api, api_lang, seller_api_auth` | `ClearanceSaleController@addClearanceProduct` | `None` |
| `POST` | `/api/v3/seller/clearance-sale/product-delete` | `api, api_lang, seller_api_auth` | `ClearanceSaleController@deleteClearanceProduct` | `None` |
| `POST` | `/api/v3/seller/clearance-sale/product-discount-update` | `api, api_lang, seller_api_auth` | `ClearanceSaleController@updateClearanceProductDiscount` | `None` |
| `GET` | `/api/v3/seller/clearance-sale/product-list` | `api, api_lang, seller_api_auth` | `ClearanceSaleController@list` | `None` |
| `POST` | `/api/v3/seller/clearance-sale/product-status-update` | `api, api_lang, seller_api_auth` | `ClearanceSaleController@updateClearanceProductStatus` | `None` |
| `DELETE` | `/api/v3/seller/close-withdraw-request` | `api, api_lang, seller_api_auth` | `SellerController@close_withdraw_request` | `None` |
| `PUT` | `/api/v3/seller/cm-firebase-token` | `api, api_lang, seller_api_auth` | `SellerController@update_cm_firebase_token` | `None` |
| `POST` | `/api/v3/seller/coupon/check-coupon` | `api, api_lang, seller_api_auth` | `CouponController@check_coupon` | `None` |
| `GET` | `/api/v3/seller/coupon/customers` | `api, api_lang, seller_api_auth` | `CouponController@customers` | `None` |
| `DELETE` | `/api/v3/seller/coupon/delete/{id}` | `api, api_lang, seller_api_auth` | `CouponController@delete` | `{id}` |
| `GET` | `/api/v3/seller/coupon/list` | `api, api_lang, seller_api_auth` | `CouponController@list` | `None` |
| `PUT` | `/api/v3/seller/coupon/status-update/{id}` | `api, api_lang, seller_api_auth` | `CouponController@status_update` | `None` |
| `POST` | `/api/v3/seller/coupon/store` | `api, api_lang, seller_api_auth` | `CouponController@store` | `None` |
| `PUT` | `/api/v3/seller/coupon/update/{id}` | `api, api_lang, seller_api_auth` | `CouponController@update` | `{id}` |
| `POST` | `/api/v3/seller/delivery-man/cash-receive` | `api, api_lang, seller_api_auth` | `DeliveryManCashCollectController@cash_receive` | `None` |
| `GET` | `/api/v3/seller/delivery-man/collect-cash-list/{id}` | `api, api_lang, seller_api_auth` | `DeliveryManCashCollectController@list` | `{id}` |
| `GET` | `/api/v3/seller/delivery-man/delete/{id}` | `api, api_lang, seller_api_auth` | `DeliveryManController@delete` | `{id}` |
| `GET` | `/api/v3/seller/delivery-man/details/{id}` | `api, api_lang, seller_api_auth` | `DeliveryManController@details` | `{id}` |
| `GET` | `/api/v3/seller/delivery-man/earning/{id}` | `api, api_lang, seller_api_auth` | `DeliveryManController@earning` | `{id}` |
| `DELETE` | `/api/v3/seller/delivery-man/emergency-contact/delete` | `api, api_lang, seller_api_auth` | `EmergencyContactController@destroy` | `None` |
| `GET` | `/api/v3/seller/delivery-man/emergency-contact/list` | `api, api_lang, seller_api_auth` | `EmergencyContactController@list` | `None` |
| `PUT` | `/api/v3/seller/delivery-man/emergency-contact/status-update` | `api, api_lang, seller_api_auth` | `EmergencyContactController@status_update` | `None` |
| `POST` | `/api/v3/seller/delivery-man/emergency-contact/store` | `api, api_lang, seller_api_auth` | `EmergencyContactController@store` | `None` |
| `PUT` | `/api/v3/seller/delivery-man/emergency-contact/update` | `api, api_lang, seller_api_auth` | `EmergencyContactController@update` | `None` |
| `GET` | `/api/v3/seller/delivery-man/list` | `api, api_lang, seller_api_auth` | `DeliveryManController@list` | `None` |
| `GET` | `/api/v3/seller/delivery-man/order-list/{id}` | `api, api_lang, seller_api_auth` | `DeliveryManController@order_list` | `{id}` |
| `GET` | `/api/v3/seller/delivery-man/order-status-history/{id}` | `api, api_lang, seller_api_auth` | `DeliveryManController@order_status_history` | `{id}` |
| `GET` | `/api/v3/seller/delivery-man/reviews/{id}` | `api, api_lang, seller_api_auth` | `DeliveryManController@reviews` | `{id}` |
| `POST` | `/api/v3/seller/delivery-man/status-update` | `api, api_lang, seller_api_auth` | `DeliveryManController@status` | `None` |
| `POST` | `/api/v3/seller/delivery-man/store` | `api, api_lang, seller_api_auth` | `DeliveryManController@store` | `None` |
| `PUT` | `/api/v3/seller/delivery-man/update/{id}` | `api, api_lang, seller_api_auth` | `DeliveryManController@update` | `{id}` |
| `GET` | `/api/v3/seller/delivery-man/withdraw/details/{id}` | `api, api_lang, seller_api_auth` | `DeliverymanWithdrawController@details` | `{id}` |
| `GET` | `/api/v3/seller/delivery-man/withdraw/list` | `api, api_lang, seller_api_auth` | `DeliverymanWithdrawController@list` | `None` |
| `PUT` | `/api/v3/seller/delivery-man/withdraw/status-update` | `api, api_lang, seller_api_auth` | `DeliverymanWithdrawController@status_update` | `None` |
| `GET` | `/api/v3/seller/get-earning-statitics` | `api, api_lang, seller_api_auth` | `SellerController@getEarningStatics` | `None` |
| `PUT` | `/api/v3/seller/language-change` | `api, api_lang, seller_api_auth` | `SellerController@language_change` | `None` |
| `POST` | `/api/v3/seller/ls-lib-update` | `api, api_lang` | `LsLibController@lib_update` | `` |
| `GET` | `/api/v3/seller/messages/get-message/{type}/{id}` | `api, api_lang, seller_api_auth` | `ChatController@get_message` | `{type}, {id}` |
| `GET` | `/api/v3/seller/messages/list/{type}` | `api, api_lang, seller_api_auth` | `ChatController@list` | `{type}` |
| `GET` | `/api/v3/seller/messages/search/{type}` | `api, api_lang, seller_api_auth` | `ChatController@search` | `{type}` |
| `POST` | `/api/v3/seller/messages/seen/{type}` | `api, api_lang, seller_api_auth` | `ChatController@seenMessage` | `{type}` |
| `POST` | `/api/v3/seller/messages/send/{type}` | `api, api_lang, seller_api_auth` | `ChatController@send_message` | `{type}` |
| `GET` | `/api/v3/seller/monthly-commission-given` | `api, api_lang, seller_api_auth` | `SellerController@monthly_commission_given` | `None` |
| `GET` | `/api/v3/seller/monthly-earning` | `api, api_lang, seller_api_auth` | `SellerController@monthly_earning` | `None` |
| `GET` | `/api/v3/seller/notification` | `api, api_lang, seller_api_auth` | `ShopController@notification_index` | `None` |
| `GET` | `/api/v3/seller/notification/view` | `api, api_lang, seller_api_auth` | `ShopController@seller_notification_view` | `None` |
| `GET` | `/api/v3/seller/order-statistics` | `api, api_lang, seller_api_auth` | `SellerController@order_statistics` | `None` |
| `POST` | `/api/v3/seller/orders/address-update` | `api, api_lang, seller_api_auth` | `OrderController@address_update` | `None` |
| `PUT` | `/api/v3/seller/orders/assign-delivery-man` | `api, api_lang, seller_api_auth` | `OrderController@assign_delivery_man` | `None` |
| `POST` | `/api/v3/seller/orders/assign-third-party-delivery` | `api, api_lang, seller_api_auth` | `OrderController@assign_third_party_delivery` | `None` |
| `PUT` | `/api/v3/seller/orders/delivery-charge-date-update` | `api, api_lang, seller_api_auth` | `OrderController@amount_date_update` | `None` |
| `GET` | `/api/v3/seller/orders/list` | `api, api_lang, seller_api_auth` | `OrderController@list` | `None` |
| `POST` | `/api/v3/seller/orders/order-detail-info-update` | `api, api_lang, seller_api_auth` | `OrderController@updateOrderDetails` | `None` |
| `PUT` | `/api/v3/seller/orders/order-detail-status/{id}` | `api, api_lang, seller_api_auth` | `OrderController@order_detail_status` | `None` |
| `PUT` | `/api/v3/seller/orders/order-wise-product-upload` | `api, api_lang, seller_api_auth` | `OrderController@digital_file_upload_after_sell` | `None` |
| `POST` | `/api/v3/seller/orders/update-payment-status` | `api, api_lang, seller_api_auth` | `OrderController@update_payment_status` | `None` |
| `GET` | `/api/v3/seller/orders/{id}` | `api, api_lang, seller_api_auth` | `OrderController@details` | `{id}` |
| `POST` | `/api/v3/seller/payment-information/add` | `api, api_lang, seller_api_auth` | `VendorPaymentInfoController@add` | `None` |
| `POST` | `/api/v3/seller/payment-information/default` | `api, api_lang, seller_api_auth` | `VendorPaymentInfoController@updateDefault` | `None` |
| `GET` | `/api/v3/seller/payment-information/delete` | `api, api_lang, seller_api_auth` | `VendorPaymentInfoController@delete` | `None` |
| `GET` | `/api/v3/seller/payment-information/list` | `api, api_lang, seller_api_auth` | `VendorPaymentInfoController@index` | `None` |
| `POST` | `/api/v3/seller/payment-information/status` | `api, api_lang, seller_api_auth` | `VendorPaymentInfoController@updateStatus` | `None` |
| `POST` | `/api/v3/seller/payment-information/update` | `api, api_lang, seller_api_auth` | `VendorPaymentInfoController@update` | `None` |
| `GET` | `/api/v3/seller/payment-information/withdrawal-method-list` | `api, api_lang, seller_api_auth` | `VendorPaymentInfoController@getWithdrawalMethods` | `None` |
| `POST` | `/api/v3/seller/pos/customer-store` | `api, api_lang, seller_api_auth` | `POSController@customer_store` | `None` |
| `GET` | `/api/v3/seller/pos/customers` | `api, api_lang, seller_api_auth` | `POSController@customers` | `None` |
| `GET` | `/api/v3/seller/pos/get-categories` | `api, api_lang, seller_api_auth` | `POSController@get_categories` | `None` |
| `GET` | `/api/v3/seller/pos/get-invoice` | `api, api_lang, seller_api_auth` | `POSController@get_invoice` | `None` |
| `POST` | `/api/v3/seller/pos/place-order` | `api, api_lang, seller_api_auth` | `POSController@place_order` | `None` |
| `GET` | `/api/v3/seller/pos/product-list` | `api, api_lang, seller_api_auth` | `POSController@product_list` | `None` |
| `GET` | `/api/v3/seller/pos/products` | `api, api_lang, seller_api_auth` | `POSController@get_product_by_barcode` | `None` |
| `POST` | `/api/v3/seller/products/add` | `api, api_lang, seller_api_auth` | `ProductController@add_new` | `None` |
| `GET` | `/api/v3/seller/products/barcode/generate` | `api, api_lang, seller_api_auth` | `ProductController@barcode_generate` | `None` |
| `POST` | `/api/v3/seller/products/delete-digital-product` | `api, api_lang, seller_api_auth` | `ProductController@deleteDigitalProduct` | `None` |
| `GET` | `/api/v3/seller/products/delete-image` | `api, api_lang, seller_api_auth` | `ProductController@deleteImage` | `None` |
| `GET` | `/api/v3/seller/products/delete-preview-file` | `api, api_lang, seller_api_auth` | `ProductController@deletePreviewFile` | `None` |
| `DELETE` | `/api/v3/seller/products/delete/{id}` | `api, api_lang, seller_api_auth` | `ProductController@delete` | `{id}` |
| `GET` | `/api/v3/seller/products/details/{id}` | `api, api_lang, seller_api_auth` | `ProductController@details` | `{id}` |
| `GET` | `/api/v3/seller/products/digital-author-list` | `api, api_lang, seller_api_auth` | `ProductController@getDigitalProductsAuthorList` | `None` |
| `GET` | `/api/v3/seller/products/digital-publishing-house-list` | `api, api_lang, seller_api_auth` | `ProductController@getDigitalPublishingHouseList` | `None` |
| `GET` | `/api/v3/seller/products/edit/{id}` | `api, api_lang, seller_api_auth` | `ProductController@edit` | `{id}` |
| `GET` | `/api/v3/seller/products/get-product-images/{id}` | `api, api_lang, seller_api_auth` | `ProductController@getProductImages` | `{id}` |
| `GET` | `/api/v3/seller/products/list` | `api, api_lang, seller_api_auth` | `ProductController@getProductList` | `None` |
| `GET` | `/api/v3/seller/products/most-popular-product` | `api, api_lang, seller_api_auth` | `ProductController@most_popular_products` | `None` |
| `PUT` | `/api/v3/seller/products/quantity-update` | `api, api_lang, seller_api_auth` | `ProductController@updateProductQuantity` | `None` |
| `GET` | `/api/v3/seller/products/restock-request-brands-list` | `api, api_lang, seller_api_auth` | `ProductController@getRestockRequestBrands` | `None` |
| `GET` | `/api/v3/seller/products/restock-request-delete` | `api, api_lang, seller_api_auth` | `ProductController@deleteRestockRequest` | `None` |
| `POST` | `/api/v3/seller/products/restock-request-list` | `api, api_lang, seller_api_auth` | `ProductController@getRestockRequestList` | `None` |
| `POST` | `/api/v3/seller/products/restock-request-stock-update` | `api, api_lang, seller_api_auth` | `ProductController@updateRestockQuantity` | `None` |
| `GET` | `/api/v3/seller/products/review-list/{id}` | `api, api_lang, seller_api_auth` | `ProductController@review_list` | `{product_id}` |
| `PUT` | `/api/v3/seller/products/status-update` | `api, api_lang, seller_api_auth` | `ProductController@status_update` | `None` |
| `GET` | `/api/v3/seller/products/stock-limit-status` | `api, api_lang, seller_api_auth` | `ProductController@getStockLimitStatus` | `None` |
| `GET` | `/api/v3/seller/products/stock-out-list` | `api, api_lang, seller_api_auth` | `ProductController@stock_out_list` | `None` |
| `GET` | `/api/v3/seller/products/top-selling-product` | `api, api_lang, seller_api_auth` | `ProductController@top_selling_products` | `None` |
| `PUT` | `/api/v3/seller/products/update/{id}` | `api, api_lang, seller_api_auth` | `ProductController@update` | `{id}` |
| `POST` | `/api/v3/seller/products/upload-digital-product` | `api, api_lang, seller_api_auth` | `ProductController@upload_digital_product` | `None` |
| `POST` | `/api/v3/seller/products/upload-images` | `api, api_lang, seller_api_auth` | `ProductController@upload_images` | `None` |
| `GET` | `/api/v3/seller/products/{seller_id}/all-products` | `api, api_lang` | `ProductController@getVendorAllProducts` | `{seller_id}` |
| `GET` | `/api/v3/seller/refund/list` | `api, api_lang, seller_api_auth` | `RefundController@list` | `None` |
| `GET` | `/api/v3/seller/refund/refund-details` | `api, api_lang, seller_api_auth` | `RefundController@refund_details` | `None` |
| `POST` | `/api/v3/seller/refund/refund-status-update` | `api, api_lang, seller_api_auth` | `RefundController@refund_status_update` | `None` |
| `GET` | `/api/v3/seller/refund/single-item` | `api, api_lang, seller_api_auth` | `RefundController@getSingleItem` | `None` |
| `POST` | `/api/v3/seller/registration` | `api, api_lang` | `RegisterController@store` | `None` |
| `GET` | `/api/v3/seller/seller-delivery-man` | `api, api_lang, seller_api_auth` | `SellerController@seller_delivery_man` | `None` |
| `GET` | `/api/v3/seller/seller-info` | `api, api_lang, seller_api_auth` | `SellerController@getSellerInfo` | `None` |
| `PUT` | `/api/v3/seller/seller-update` | `api, api_lang, seller_api_auth` | `SellerController@seller_info_update` | `None` |
| `POST` | `/api/v3/seller/shipping-method/add` | `api, api_lang, seller_api_auth` | `ShippingMethodController@store` | `None` |
| `DELETE` | `/api/v3/seller/shipping-method/delete/{id}` | `api, api_lang, seller_api_auth` | `ShippingMethodController@delete` | `None` |
| `GET` | `/api/v3/seller/shipping-method/edit/{id}` | `api, api_lang, seller_api_auth` | `ShippingMethodController@edit` | `{id}` |
| `GET` | `/api/v3/seller/shipping-method/list` | `api, api_lang, seller_api_auth` | `ShippingMethodController@list` | `None` |
| `PUT` | `/api/v3/seller/shipping-method/status` | `api, api_lang, seller_api_auth` | `ShippingMethodController@status_update` | `None` |
| `PUT` | `/api/v3/seller/shipping-method/update/{id}` | `api, api_lang, seller_api_auth` | `ShippingMethodController@update` | `{id}` |
| `GET` | `/api/v3/seller/shipping/all-category-cost` | `api, api_lang, seller_api_auth` | `shippingController@all_category_cost` | `None` |
| `GET` | `/api/v3/seller/shipping/get-shipping-method` | `api, api_lang, seller_api_auth` | `shippingController@get_shipping_type` | `None` |
| `GET` | `/api/v3/seller/shipping/selected-shipping-method` | `api, api_lang, seller_api_auth` | `shippingController@selected_shipping_type` | `None` |
| `POST` | `/api/v3/seller/shipping/set-category-cost` | `api, api_lang, seller_api_auth` | `shippingController@set_category_cost` | `None` |
| `GET` | `/api/v3/seller/shop-info` | `api, api_lang, seller_api_auth` | `SellerController@shop_info` | `None` |
| `GET` | `/api/v3/seller/shop-product-reviews` | `api, api_lang, seller_api_auth` | `SellerController@shop_product_reviews` | `None` |
| `POST` | `/api/v3/seller/shop-product-reviews-reply` | `api, api_lang, seller_api_auth` | `SellerController@shopProductReviewReply` | `None` |
| `GET` | `/api/v3/seller/shop-product-reviews-status` | `api, api_lang, seller_api_auth` | `SellerController@shop_product_reviews_status` | `None` |
| `PUT` | `/api/v3/seller/shop-update` | `api, api_lang, seller_api_auth` | `SellerController@shop_info_update` | `None` |
| `PUT` | `/api/v3/seller/temporary-close` | `api, api_lang, seller_api_auth` | `ShopController@temporary_close` | `None` |
| `GET` | `/api/v3/seller/top-delivery-man` | `api, api_lang, seller_api_auth` | `ProductController@top_delivery_man` | `None` |
| `GET` | `/api/v3/seller/transactions` | `api, api_lang, seller_api_auth` | `SellerController@transaction` | `None` |
| `POST` | `/api/v3/seller/update-setup-guide-app` | `api, api_lang, seller_api_auth` | `SellerController@updateSetupGuideApp` | `None` |
| `PUT` | `/api/v3/seller/vacation-add` | `api, api_lang, seller_api_auth` | `ShopController@vacation_add` | `None` |
| `GET` | `/api/v3/seller/withdraw-method-list` | `api, api_lang, seller_api_auth` | `SellerController@withdraw_method_list` | `None` |
