# Flutter API Integration Guide (Complete Reference)

This guide is designed for the Mobile (Flutter/Dart) Developer. It outlines the structure, authentication, and error handling for all available Clickit Endpoints.

> **ملاحظة هامة للمطور (Critical Note for Developer):**
> All endpoints now strictly follow the **Defensive Programming** paradigm. You will no longer encounter random `500 Internal Server Errors`. Instead, you must properly handle `404 Not Found`, `400 Bad Request`, and `401 Unauthorized` HTTP status codes in your Dio/HTTP interceptors.

---

## 🔒 1. Seller API Authentication (CRITICAL)

The Seller & Delivery Man APIs do **not** use the standard Laravel Passport tokens automatically. They rely on a custom token verifier built into the middleware. You **must** pass the exact `auth_token` provided during the login/registration response.

**Requirement:**
- Header Key: `Authorization`
- Header Value: `Bearer <auth_token>`

⚠️ **Common Pitfall**: If you forget the `Bearer ` prefix with the space in between, the token split logic inside the backend will fail, and you will receive a silent `401 Unauthorized`.

---

## 🛠️ 2. All Available API Endpoints

<details>
<summary><b>📂 Category: ADD-TO-FUND (V1) (1 endpoints)</b></summary>

### `[POST]` /api/v1/add-to-fund
- **Headers Required:** 
  `Authorization: Bearer <customer_token>`
- **Middlewares:** `api, api_lang, auth:api`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: ATTRIBUTES (V1) (1 endpoints)</b></summary>

### `[GET]` /api/v1/attributes
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: AUTH (V1) (22 endpoints)</b></summary>

### `[GET]` /api/v1/auth/logout
- **Headers Required:** 
  `Authorization: Bearer <customer_token>`
- **Middlewares:** `api, api_lang, auth:api`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[POST]` /api/v1/auth/register
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v1/auth/login
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v1/auth/check-email
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v1/auth/check-phone
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v1/auth/firebase-auth-verify
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v1/auth/firebase-auth-token-store
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v1/auth/verify-otp
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v1/auth/verify-email
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v1/auth/verify-phone
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v1/auth/registration-with-otp
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v1/auth/existing-account-check
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v1/auth/registration-with-social-media
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v1/auth/forgot-password
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v1/auth/verify-profile-info
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v1/auth/resend-otp-check-phone
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v1/auth/resend-otp-check-email
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v1/auth/verify-token
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[PUT]` /api/v1/auth/reset-password
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v1/auth/social-login
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v1/auth/update-phone
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v1/auth/social-customer-login
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: BANNERS (V1) (1 endpoints)</b></summary>

### `[GET]` /api/v1/banners
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: BRANDS (V1) (2 endpoints)</b></summary>

### `[GET]` /api/v1/brands
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v1/brands/products/{brand_id}
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
- `brand_id`: URL Parameter

</details>

<details>
<summary><b>📂 Category: BUSINESS-PAGES (V1) (1 endpoints)</b></summary>

### `[GET]` /api/v1/business-pages
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: CART (V1) (8 endpoints)</b></summary>

### `[GET]` /api/v1/cart
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[POST]` /api/v1/cart/add
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[PUT]` /api/v1/cart/update
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[DELETE]` /api/v1/cart/remove
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[DELETE]` /api/v1/cart/remove-all
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[POST]` /api/v1/cart/select-cart-items
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v1/cart/product-restock-request
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v1/cart/get-referral-discount-redeem
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: CATEGORIES (V1) (3 endpoints)</b></summary>

### `[GET]` /api/v1/categories
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v1/categories/products/{category_id}
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
- `category_id`: URL Parameter

### `[GET]` /api/v1/categories/find-what-you-need
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: CONFIG (V1) (1 endpoints)</b></summary>

### `[GET]` /api/v1/config
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: CONTACT-US (V1) (1 endpoints)</b></summary>

### `[POST]` /api/v1/contact-us
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: COUPON (V1) (3 endpoints)</b></summary>

### `[GET]` /api/v1/coupon/apply
- **Headers Required:** 
  `Authorization: Bearer <customer_token>`
- **Middlewares:** `api, api_lang, auth:api`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v1/coupon/list
- **Headers Required:** 
  `Authorization: Bearer <customer_token>`
- **Middlewares:** `api, api_lang, auth:api`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v1/coupon/applicable-list
- **Headers Required:** 
  `Authorization: Bearer <customer_token>`
- **Middlewares:** `api, api_lang, auth:api`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: COUPONS (V1) (1 endpoints)</b></summary>

### `[GET]` /api/v1/coupons/{seller_id}/seller-wise-coupons
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- `seller_id`: URL Parameter

</details>

<details>
<summary><b>📂 Category: CUSTOMER (V1) (53 endpoints)</b></summary>

### `[GET]` /api/v1/customer/order/get-order-by-id
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[PUT]` /api/v1/customer/language-change
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[PUT]` /api/v1/customer/cm-firebase-token
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[GET]` /api/v1/customer/get-restricted-country-list
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v1/customer/get-restricted-zip-list
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[POST]` /api/v1/customer/address/add
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[GET]` /api/v1/customer/address/list
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[DELETE]` /api/v1/customer/address
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[POST]` /api/v1/customer/address/update
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[GET]` /api/v1/customer/order/place
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v1/customer/order/offline-payment-method-list
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[POST]` /api/v1/customer/order/place-by-offline-payment
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[GET]` /api/v1/customer/order/details
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v1/customer/order/generate-invoice
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v1/customer/order/deliveryman-review
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[POST]` /api/v1/customer/order/deliveryman-review/update
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[GET]` /api/v1/customer/info
- **Headers Required:** 
  `Authorization: Bearer <customer_token>`
- **Middlewares:** `api, api_lang, auth:api`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[PUT]` /api/v1/customer/update-profile
- **Headers Required:** 
  `Authorization: Bearer <customer_token>`
- **Middlewares:** `api, api_lang, auth:api`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[GET]` /api/v1/customer/account-delete/{id}
- **Headers Required:** 
  `Authorization: Bearer <customer_token>`
- **Middlewares:** `api, api_lang, auth:api`
- **Inputs/Params:** 
- `id`: URL Parameter

### `[GET]` /api/v1/customer/address/get/{id}
- **Headers Required:** 
  `Authorization: Bearer <customer_token>`
- **Middlewares:** `api, api_lang, auth:api`
- **Inputs/Params:** 
- `id`: URL Parameter

### `[POST]` /api/v1/customer/support-ticket/create
- **Headers Required:** 
  `Authorization: Bearer <customer_token>`
- **Middlewares:** `api, api_lang, auth:api`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[GET]` /api/v1/customer/support-ticket/get
- **Headers Required:** 
  `Authorization: Bearer <customer_token>`
- **Middlewares:** `api, api_lang, auth:api`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v1/customer/support-ticket/conv/{ticket_id}
- **Headers Required:** 
  `Authorization: Bearer <customer_token>`
- **Middlewares:** `api, api_lang, auth:api`
- **Inputs/Params:** 
- `ticket_id`: URL Parameter

### `[POST]` /api/v1/customer/support-ticket/reply/{ticket_id}
- **Headers Required:** 
  `Authorization: Bearer <customer_token>`
- **Middlewares:** `api, api_lang, auth:api`
- **Inputs/Params:** 
- `ticket_id`: URL Parameter
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[GET]` /api/v1/customer/support-ticket/close/{id}
- **Headers Required:** 
  `Authorization: Bearer <customer_token>`
- **Middlewares:** `api, api_lang, auth:api`
- **Inputs/Params:** 
- `id`: URL Parameter

### `[GET]` /api/v1/customer/compare/list
- **Headers Required:** 
  `Authorization: Bearer <customer_token>`
- **Middlewares:** `api, api_lang, auth:api`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[POST]` /api/v1/customer/compare/product-store
- **Headers Required:** 
  `Authorization: Bearer <customer_token>`
- **Middlewares:** `api, api_lang, auth:api`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[DELETE]` /api/v1/customer/compare/clear-all
- **Headers Required:** 
  `Authorization: Bearer <customer_token>`
- **Middlewares:** `api, api_lang, auth:api`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v1/customer/compare/product-replace
- **Headers Required:** 
  `Authorization: Bearer <customer_token>`
- **Middlewares:** `api, api_lang, auth:api`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v1/customer/wish-list
- **Headers Required:** 
  `Authorization: Bearer <customer_token>`
- **Middlewares:** `api, api_lang, auth:api`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[POST]` /api/v1/customer/wish-list/add
- **Headers Required:** 
  `Authorization: Bearer <customer_token>`
- **Middlewares:** `api, api_lang, auth:api`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[DELETE]` /api/v1/customer/wish-list/remove
- **Headers Required:** 
  `Authorization: Bearer <customer_token>`
- **Middlewares:** `api, api_lang, auth:api`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v1/customer/restock-requests/list
- **Headers Required:** 
  `Authorization: Bearer <customer_token>`
- **Middlewares:** `api, api_lang, auth:api`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[POST]` /api/v1/customer/restock-requests/delete
- **Headers Required:** 
  `Authorization: Bearer <customer_token>`
- **Middlewares:** `api, api_lang, auth:api`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[GET]` /api/v1/customer/order/place-by-wallet
- **Headers Required:** 
  `Authorization: Bearer <customer_token>`
- **Middlewares:** `api, api_lang, auth:api`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v1/customer/order/refund
- **Headers Required:** 
  `Authorization: Bearer <customer_token>`
- **Middlewares:** `api, api_lang, auth:api`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[POST]` /api/v1/customer/order/refund-store
- **Headers Required:** 
  `Authorization: Bearer <customer_token>`
- **Middlewares:** `api, api_lang, auth:api`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[GET]` /api/v1/customer/order/refund-details
- **Headers Required:** 
  `Authorization: Bearer <customer_token>`
- **Middlewares:** `api, api_lang, auth:api`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[POST]` /api/v1/customer/order/again
- **Headers Required:** 
  `Authorization: Bearer <customer_token>`
- **Middlewares:** `api, api_lang, auth:api`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[GET]` /api/v1/customer/order/list
- **Headers Required:** 
  `Authorization: Bearer <customer_token>`
- **Middlewares:** `api, api_lang, auth:api`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[POST]` /api/v1/customer/order/deliveryman-reviews/submit
- **Headers Required:** 
  `Authorization: Bearer <customer_token>`
- **Middlewares:** `api, api_lang, auth:api`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[GET]` /api/v1/customer/chat/list/{type}
- **Headers Required:** 
  `Authorization: Bearer <customer_token>`
- **Middlewares:** `api, api_lang, auth:api`
- **Inputs/Params:** 
- `type`: URL Parameter

### `[GET]` /api/v1/customer/chat/get-messages/{type}/{id}
- **Headers Required:** 
  `Authorization: Bearer <customer_token>`
- **Middlewares:** `api, api_lang, auth:api`
- **Inputs/Params:** 
- `type`: URL Parameter
- `id`: URL Parameter

### `[POST]` /api/v1/customer/chat/send-message/{type}
- **Headers Required:** 
  `Authorization: Bearer <customer_token>`
- **Middlewares:** `api, api_lang, auth:api`
- **Inputs/Params:** 
- `type`: URL Parameter
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v1/customer/chat/seen-message/{type}
- **Headers Required:** 
  `Authorization: Bearer <customer_token>`
- **Middlewares:** `api, api_lang, auth:api`
- **Inputs/Params:** 
- `type`: URL Parameter
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[GET]` /api/v1/customer/chat/search/{type}
- **Headers Required:** 
  `Authorization: Bearer <customer_token>`
- **Middlewares:** `api, api_lang, auth:api`
- **Inputs/Params:** 
- `type`: URL Parameter

### `[GET]` /api/v1/customer/wallet/list
- **Headers Required:** 
  `Authorization: Bearer <customer_token>`
- **Middlewares:** `api, api_lang, auth:api`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v1/customer/wallet/bonus-list
- **Headers Required:** 
  `Authorization: Bearer <customer_token>`
- **Middlewares:** `api, api_lang, auth:api`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v1/customer/loyalty/list
- **Headers Required:** 
  `Authorization: Bearer <customer_token>`
- **Middlewares:** `api, api_lang, auth:api`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[POST]` /api/v1/customer/loyalty/loyalty-exchange-currency
- **Headers Required:** 
  `Authorization: Bearer <customer_token>`
- **Middlewares:** `api, api_lang, auth:api`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[GET]` /api/v1/customer/order/digital-product-download/{id}
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
- `id`: URL Parameter

### `[GET]` /api/v1/customer/order/digital-product-download-otp-verify
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[POST]` /api/v1/customer/order/digital-product-download-otp-resend
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: DEALS (V1) (1 endpoints)</b></summary>

### `[GET]` /api/v1/deals/featured
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: DEALSOFTHEDAY (V1) (1 endpoints)</b></summary>

### `[GET]` /api/v1/dealsoftheday/deal-of-the-day
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: DELIVERY-MAN - All-orders (V2) (1 endpoints)</b></summary>

### `[GET]` /api/v2/delivery-man/all-orders
- **Headers Required:** 
  `Authorization: Bearer <delivery_man_auth_token>`
- **Middlewares:** `api, api_lang, delivery_man_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: DELIVERY-MAN - Auth (V2) (4 endpoints)</b></summary>

### `[POST]` /api/v2/delivery-man/auth/login
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v2/delivery-man/auth/forgot-password
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v2/delivery-man/auth/verify-otp
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v2/delivery-man/auth/reset-password
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: DELIVERY-MAN - Bank-info (V2) (1 endpoints)</b></summary>

### `[PUT]` /api/v2/delivery-man/bank-info
- **Headers Required:** 
  `Authorization: Bearer <delivery_man_auth_token>`
- **Middlewares:** `api, api_lang, delivery_man_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: DELIVERY-MAN - Change-status (V2) (1 endpoints)</b></summary>

### `[POST]` /api/v2/delivery-man/change-status
- **Headers Required:** 
  `Authorization: Bearer <delivery_man_auth_token>`
- **Middlewares:** `api, api_lang, delivery_man_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: DELIVERY-MAN - Collected_cash_history (V2) (1 endpoints)</b></summary>

### `[GET]` /api/v2/delivery-man/collected_cash_history
- **Headers Required:** 
  `Authorization: Bearer <delivery_man_auth_token>`
- **Middlewares:** `api, api_lang, delivery_man_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: DELIVERY-MAN - Current-orders (V2) (1 endpoints)</b></summary>

### `[GET]` /api/v2/delivery-man/current-orders
- **Headers Required:** 
  `Authorization: Bearer <delivery_man_auth_token>`
- **Middlewares:** `api, api_lang, delivery_man_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: DELIVERY-MAN - Delivery-wise-earned (V2) (1 endpoints)</b></summary>

### `[GET]` /api/v2/delivery-man/delivery-wise-earned
- **Headers Required:** 
  `Authorization: Bearer <delivery_man_auth_token>`
- **Middlewares:** `api, api_lang, delivery_man_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: DELIVERY-MAN - Distance-api (V2) (1 endpoints)</b></summary>

### `[POST]` /api/v2/delivery-man/distance-api
- **Headers Required:** 
  `Authorization: Bearer <delivery_man_auth_token>`
- **Middlewares:** `api, api_lang, delivery_man_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: DELIVERY-MAN - Emergency-contact-list (V2) (1 endpoints)</b></summary>

### `[GET]` /api/v2/delivery-man/emergency-contact-list
- **Headers Required:** 
  `Authorization: Bearer <delivery_man_auth_token>`
- **Middlewares:** `api, api_lang, delivery_man_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: DELIVERY-MAN - Info (V2) (1 endpoints)</b></summary>

### `[GET]` /api/v2/delivery-man/info
- **Headers Required:** 
  `Authorization: Bearer <delivery_man_auth_token>`
- **Middlewares:** `api, api_lang, delivery_man_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: DELIVERY-MAN - Is-online (V2) (1 endpoints)</b></summary>

### `[PUT]` /api/v2/delivery-man/is-online
- **Headers Required:** 
  `Authorization: Bearer <delivery_man_auth_token>`
- **Middlewares:** `api, api_lang, delivery_man_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: DELIVERY-MAN - Language-change (V2) (1 endpoints)</b></summary>

### `[PUT]` /api/v2/delivery-man/language-change
- **Headers Required:** 
  `Authorization: Bearer <delivery_man_auth_token>`
- **Middlewares:** `api, api_lang, delivery_man_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: DELIVERY-MAN - Last-location (V2) (1 endpoints)</b></summary>

### `[GET]` /api/v2/delivery-man/last-location
- **Headers Required:** 
  `Authorization: Bearer <delivery_man_auth_token>`
- **Middlewares:** `api, api_lang, delivery_man_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: DELIVERY-MAN - Messages (V2) (4 endpoints)</b></summary>

### `[GET]` /api/v2/delivery-man/messages/list/{type}
- **Headers Required:** 
  `Authorization: Bearer <delivery_man_auth_token>`
- **Middlewares:** `api, api_lang, delivery_man_auth`
- **Inputs/Params:** 
- `type`: URL Parameter

### `[GET]` /api/v2/delivery-man/messages/get-message/{type}/{id}
- **Headers Required:** 
  `Authorization: Bearer <delivery_man_auth_token>`
- **Middlewares:** `api, api_lang, delivery_man_auth`
- **Inputs/Params:** 
- `type`: URL Parameter
- `id`: URL Parameter

### `[POST]` /api/v2/delivery-man/messages/send-message/{type}
- **Headers Required:** 
  `Authorization: Bearer <delivery_man_auth_token>`
- **Middlewares:** `api, api_lang, delivery_man_auth`
- **Inputs/Params:** 
- `type`: URL Parameter
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[GET]` /api/v2/delivery-man/messages/search/{type}
- **Headers Required:** 
  `Authorization: Bearer <delivery_man_auth_token>`
- **Middlewares:** `api, api_lang, delivery_man_auth`
- **Inputs/Params:** 
- `type`: URL Parameter

</details>

<details>
<summary><b>📂 Category: DELIVERY-MAN - Notifications (V2) (1 endpoints)</b></summary>

### `[GET]` /api/v2/delivery-man/notifications
- **Headers Required:** 
  `Authorization: Bearer <delivery_man_auth_token>`
- **Middlewares:** `api, api_lang, delivery_man_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: DELIVERY-MAN - Order-delivery-history (V2) (1 endpoints)</b></summary>

### `[GET]` /api/v2/delivery-man/order-delivery-history
- **Headers Required:** 
  `Authorization: Bearer <delivery_man_auth_token>`
- **Middlewares:** `api, api_lang, delivery_man_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: DELIVERY-MAN - Order-delivery-verification (V2) (1 endpoints)</b></summary>

### `[POST]` /api/v2/delivery-man/order-delivery-verification
- **Headers Required:** 
  `Authorization: Bearer <delivery_man_auth_token>`
- **Middlewares:** `api, api_lang, delivery_man_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: DELIVERY-MAN - Order-details (V2) (1 endpoints)</b></summary>

### `[GET]` /api/v2/delivery-man/order-details
- **Headers Required:** 
  `Authorization: Bearer <delivery_man_auth_token>`
- **Middlewares:** `api, api_lang, delivery_man_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: DELIVERY-MAN - Order-item (V2) (1 endpoints)</b></summary>

### `[GET]` /api/v2/delivery-man/order-item
- **Headers Required:** 
  `Authorization: Bearer <delivery_man_auth_token>`
- **Middlewares:** `api, api_lang, delivery_man_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: DELIVERY-MAN - Order-list-by-date (V2) (1 endpoints)</b></summary>

### `[GET]` /api/v2/delivery-man/order-list-by-date
- **Headers Required:** 
  `Authorization: Bearer <delivery_man_auth_token>`
- **Middlewares:** `api, api_lang, delivery_man_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: DELIVERY-MAN - Order-update-is-pause (V2) (1 endpoints)</b></summary>

### `[PUT]` /api/v2/delivery-man/order-update-is-pause
- **Headers Required:** 
  `Authorization: Bearer <delivery_man_auth_token>`
- **Middlewares:** `api, api_lang, delivery_man_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: DELIVERY-MAN - Profile-dashboard-counts (V2) (1 endpoints)</b></summary>

### `[GET]` /api/v2/delivery-man/profile-dashboard-counts
- **Headers Required:** 
  `Authorization: Bearer <delivery_man_auth_token>`
- **Middlewares:** `api, api_lang, delivery_man_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: DELIVERY-MAN - Record-location-data (V2) (1 endpoints)</b></summary>

### `[POST]` /api/v2/delivery-man/record-location-data
- **Headers Required:** 
  `Authorization: Bearer <delivery_man_auth_token>`
- **Middlewares:** `api, api_lang, delivery_man_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: DELIVERY-MAN - Resend-verification-code (V2) (1 endpoints)</b></summary>

### `[POST]` /api/v2/delivery-man/resend-verification-code
- **Headers Required:** 
  `Authorization: Bearer <delivery_man_auth_token>`
- **Middlewares:** `api, api_lang, delivery_man_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: DELIVERY-MAN - Review-list (V2) (1 endpoints)</b></summary>

### `[GET]` /api/v2/delivery-man/review-list
- **Headers Required:** 
  `Authorization: Bearer <delivery_man_auth_token>`
- **Middlewares:** `api, api_lang, delivery_man_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: DELIVERY-MAN - Save-review (V2) (1 endpoints)</b></summary>

### `[PUT]` /api/v2/delivery-man/save-review
- **Headers Required:** 
  `Authorization: Bearer <delivery_man_auth_token>`
- **Middlewares:** `api, api_lang, delivery_man_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: DELIVERY-MAN - Search (V2) (1 endpoints)</b></summary>

### `[GET]` /api/v2/delivery-man/search
- **Headers Required:** 
  `Authorization: Bearer <delivery_man_auth_token>`
- **Middlewares:** `api, api_lang, delivery_man_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: DELIVERY-MAN - Update-expected-delivery (V2) (1 endpoints)</b></summary>

### `[PUT]` /api/v2/delivery-man/update-expected-delivery
- **Headers Required:** 
  `Authorization: Bearer <delivery_man_auth_token>`
- **Middlewares:** `api, api_lang, delivery_man_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: DELIVERY-MAN - Update-fcm-token (V2) (1 endpoints)</b></summary>

### `[PUT]` /api/v2/delivery-man/update-fcm-token
- **Headers Required:** 
  `Authorization: Bearer <delivery_man_auth_token>`
- **Middlewares:** `api, api_lang, delivery_man_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: DELIVERY-MAN - Update-info (V2) (1 endpoints)</b></summary>

### `[PUT]` /api/v2/delivery-man/update-info
- **Headers Required:** 
  `Authorization: Bearer <delivery_man_auth_token>`
- **Middlewares:** `api, api_lang, delivery_man_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: DELIVERY-MAN - Update-order-status (V2) (1 endpoints)</b></summary>

### `[PUT]` /api/v2/delivery-man/update-order-status
- **Headers Required:** 
  `Authorization: Bearer <delivery_man_auth_token>`
- **Middlewares:** `api, api_lang, delivery_man_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: DELIVERY-MAN - Update-payment-status (V2) (1 endpoints)</b></summary>

### `[PUT]` /api/v2/delivery-man/update-payment-status
- **Headers Required:** 
  `Authorization: Bearer <delivery_man_auth_token>`
- **Middlewares:** `api, api_lang, delivery_man_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: DELIVERY-MAN - Verify-order-delivery-otp (V2) (1 endpoints)</b></summary>

### `[POST]` /api/v2/delivery-man/verify-order-delivery-otp
- **Headers Required:** 
  `Authorization: Bearer <delivery_man_auth_token>`
- **Middlewares:** `api, api_lang, delivery_man_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: DELIVERY-MAN - Withdraw-list-by-approved (V2) (1 endpoints)</b></summary>

### `[GET]` /api/v2/delivery-man/withdraw-list-by-approved
- **Headers Required:** 
  `Authorization: Bearer <delivery_man_auth_token>`
- **Middlewares:** `api, api_lang, delivery_man_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: DELIVERY-MAN - Withdraw-request (V2) (1 endpoints)</b></summary>

### `[POST]` /api/v2/delivery-man/withdraw-request
- **Headers Required:** 
  `Authorization: Bearer <delivery_man_auth_token>`
- **Middlewares:** `api, api_lang, delivery_man_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: DIGITAL-PAYMENT (V1) (1 endpoints)</b></summary>

### `[POST]` /api/v1/digital-payment
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: FAQ (V1) (1 endpoints)</b></summary>

### `[GET]` /api/v1/faq
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: FLASH-DEALS (V1) (2 endpoints)</b></summary>

### `[GET]` /api/v1/flash-deals
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v1/flash-deals/products/{deal_id}
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- `deal_id`: URL Parameter

</details>

<details>
<summary><b>📂 Category: GET-GUEST-ID (V1) (1 endpoints)</b></summary>

### `[GET]` /api/v1/get-guest-id
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: LS-LIB-UPDATE (V2) (1 endpoints)</b></summary>

### `[POST]` /api/v2/ls-lib-update
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: MAPAPI (V1) (4 endpoints)</b></summary>

### `[GET]` /api/v1/mapapi/place-api-autocomplete
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v1/mapapi/distance-api
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v1/mapapi/place-api-details
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v1/mapapi/geocode-api
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: NOTIFICATIONS (V1) (2 endpoints)</b></summary>

### `[GET]` /api/v1/notifications
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v1/notifications/seen
- **Headers Required:** 
  `Authorization: Bearer <customer_token>`
- **Middlewares:** `api, api_lang, auth:api`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: ORDER (V1) (3 endpoints)</b></summary>

### `[GET]` /api/v1/order/track
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v1/order/cancel-order
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[POST]` /api/v1/order/track-order
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: PRODUCTS (V1) (28 endpoints)</b></summary>

### `[GET]` /api/v1/products/reviews/{product_id}
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- `product_id`: URL Parameter

### `[GET]` /api/v1/products/rating/{product_id}
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- `product_id`: URL Parameter

### `[GET]` /api/v1/products/counter/{product_id}
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- `product_id`: URL Parameter

### `[GET]` /api/v1/products/shipping-methods
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v1/products/social-share-link/{product_id}
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- `product_id`: URL Parameter

### `[POST]` /api/v1/products/reviews/submit
- **Headers Required:** 
  `Authorization: Bearer <customer_token>`
- **Middlewares:** `api, api_lang, auth:api`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[PUT]` /api/v1/products/review/update
- **Headers Required:** 
  `Authorization: Bearer <customer_token>`
- **Middlewares:** `api, api_lang, auth:api`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[GET]` /api/v1/products/review/{product_id}/{order_id}
- **Headers Required:** 
  `Authorization: Bearer <customer_token>`
- **Middlewares:** `api, api_lang, auth:api`
- **Inputs/Params:** 
- `product_id`: URL Parameter
- `order_id`: URL Parameter

### `[DELETE]` /api/v1/products/review/delete-image
- **Headers Required:** 
  `Authorization: Bearer <customer_token>`
- **Middlewares:** `api, api_lang, auth:api`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v1/products/latest
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v1/products/new-arrival
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v1/products/featured
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v1/products/top-rated
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET|POST|PUT|PATCH|DELETE]` /api/v1/products/search
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v1/products/filter
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[GET|POST|PUT|PATCH|DELETE]` /api/v1/products/suggestion-product
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[GET]` /api/v1/products/details/{slug}
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
- `slug`: URL Parameter

### `[GET]` /api/v1/products/related-products/{product_id}
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
- `product_id`: URL Parameter

### `[GET]` /api/v1/products/best-sellings
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v1/products/home-categories
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v1/products/discounted-product
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v1/products/most-demanded-product
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v1/products/shop-again-product
- **Headers Required:** 
  `Authorization: Bearer <customer_token>`
- **Middlewares:** `api, api_lang, apiGuestCheck, auth:api`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v1/products/just-for-you
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v1/products/most-searching
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v1/products/digital-author-list
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v1/products/digital-publishing-house-list
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v1/products/clearance-sale
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: SELLER - Account-delete (V2) (1 endpoints)</b></summary>

### `[GET]` /api/v2/seller/account-delete
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: SELLER - Account-delete (V3) (1 endpoints)</b></summary>

### `[GET]` /api/v3/seller/account-delete
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: SELLER - Auth (V2) (4 endpoints)</b></summary>

### `[POST]` /api/v2/seller/auth/login
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v2/seller/auth/forgot-password
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v2/seller/auth/verify-otp
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[PUT]` /api/v2/seller/auth/reset-password
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: SELLER - Auth (V3) (4 endpoints)</b></summary>

### `[POST]` /api/v3/seller/auth/login
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v3/seller/auth/forgot-password
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v3/seller/auth/verify-otp
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[PUT]` /api/v3/seller/auth/reset-password
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: SELLER - Balance-withdraw (V2) (1 endpoints)</b></summary>

### `[POST]` /api/v2/seller/balance-withdraw
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: SELLER - Balance-withdraw (V3) (1 endpoints)</b></summary>

### `[POST]` /api/v3/seller/balance-withdraw
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: SELLER - Brands (V2) (1 endpoints)</b></summary>

### `[GET]` /api/v2/seller/brands
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: SELLER - Brands (V3) (1 endpoints)</b></summary>

### `[GET]` /api/v3/seller/brands
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: SELLER - Categories (V3) (1 endpoints)</b></summary>

### `[GET]` /api/v3/seller/categories
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: SELLER - Clearance-sale (V3) (9 endpoints)</b></summary>

### `[GET]` /api/v3/seller/clearance-sale/product-list
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[POST]` /api/v3/seller/clearance-sale/product-add
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v3/seller/clearance-sale/product-delete
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v3/seller/clearance-sale/all-product-delete
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v3/seller/clearance-sale/product-status-update
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v3/seller/clearance-sale/product-discount-update
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v3/seller/clearance-sale/config-status-update
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[GET]` /api/v3/seller/clearance-sale/config-data
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[POST]` /api/v3/seller/clearance-sale/config-data-update
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: SELLER - Close-withdraw-request (V2) (1 endpoints)</b></summary>

### `[DELETE]` /api/v2/seller/close-withdraw-request
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: SELLER - Close-withdraw-request (V3) (1 endpoints)</b></summary>

### `[DELETE]` /api/v3/seller/close-withdraw-request
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: SELLER - Cm-firebase-token (V2) (1 endpoints)</b></summary>

### `[PUT]` /api/v2/seller/cm-firebase-token
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: SELLER - Cm-firebase-token (V3) (1 endpoints)</b></summary>

### `[PUT]` /api/v3/seller/cm-firebase-token
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: SELLER - Coupon (V3) (7 endpoints)</b></summary>

### `[GET]` /api/v3/seller/coupon/list
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[POST]` /api/v3/seller/coupon/store
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[PUT]` /api/v3/seller/coupon/update/{id}
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- `id`: URL Parameter
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[PUT]` /api/v3/seller/coupon/status-update/{id}
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- `id`: URL Parameter
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[DELETE]` /api/v3/seller/coupon/delete/{id}
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- `id`: URL Parameter

### `[POST]` /api/v3/seller/coupon/check-coupon
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[GET]` /api/v3/seller/coupon/customers
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: SELLER - Delivery-man (V3) (20 endpoints)</b></summary>

### `[GET]` /api/v3/seller/delivery-man/list
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[POST]` /api/v3/seller/delivery-man/store
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[PUT]` /api/v3/seller/delivery-man/update/{id}
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- `id`: URL Parameter
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[GET]` /api/v3/seller/delivery-man/details/{id}
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- `id`: URL Parameter

### `[POST]` /api/v3/seller/delivery-man/status-update
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[GET]` /api/v3/seller/delivery-man/delete/{id}
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- `id`: URL Parameter

### `[GET]` /api/v3/seller/delivery-man/reviews/{id}
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- `id`: URL Parameter

### `[GET]` /api/v3/seller/delivery-man/order-list/{id}
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- `id`: URL Parameter

### `[GET]` /api/v3/seller/delivery-man/order-status-history/{id}
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- `id`: URL Parameter

### `[GET]` /api/v3/seller/delivery-man/earning/{id}
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- `id`: URL Parameter

### `[POST]` /api/v3/seller/delivery-man/cash-receive
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[GET]` /api/v3/seller/delivery-man/collect-cash-list/{id}
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- `id`: URL Parameter

### `[GET]` /api/v3/seller/delivery-man/withdraw/list
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v3/seller/delivery-man/withdraw/details/{id}
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- `id`: URL Parameter

### `[PUT]` /api/v3/seller/delivery-man/withdraw/status-update
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[GET]` /api/v3/seller/delivery-man/emergency-contact/list
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[POST]` /api/v3/seller/delivery-man/emergency-contact/store
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[PUT]` /api/v3/seller/delivery-man/emergency-contact/update
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[PUT]` /api/v3/seller/delivery-man/emergency-contact/status-update
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[DELETE]` /api/v3/seller/delivery-man/emergency-contact/delete
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: SELLER - General (V1) (1 endpoints)</b></summary>

### `[GET]` /api/v1/seller
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: SELLER - Get-earning-statitics (V3) (1 endpoints)</b></summary>

### `[GET]` /api/v3/seller/get-earning-statitics
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: SELLER - Language-change (V3) (1 endpoints)</b></summary>

### `[PUT]` /api/v3/seller/language-change
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: SELLER - List (V1) (1 endpoints)</b></summary>

### `[GET]` /api/v1/seller/list/{type}
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- `type`: URL Parameter

</details>

<details>
<summary><b>📂 Category: SELLER - Ls-lib-update (V3) (1 endpoints)</b></summary>

### `[POST]` /api/v3/seller/ls-lib-update
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: SELLER - Messages (V2) (4 endpoints)</b></summary>

### `[GET]` /api/v2/seller/messages/list/{type}
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- `type`: URL Parameter

### `[GET]` /api/v2/seller/messages/get-message/{type}/{id}
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- `type`: URL Parameter
- `id`: URL Parameter

### `[POST]` /api/v2/seller/messages/send/{type}
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- `type`: URL Parameter
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[GET]` /api/v2/seller/messages/search/{type}
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- `type`: URL Parameter

</details>

<details>
<summary><b>📂 Category: SELLER - Messages (V3) (5 endpoints)</b></summary>

### `[GET]` /api/v3/seller/messages/list/{type}
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- `type`: URL Parameter

### `[GET]` /api/v3/seller/messages/get-message/{type}/{id}
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- `type`: URL Parameter
- `id`: URL Parameter

### `[POST]` /api/v3/seller/messages/send/{type}
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- `type`: URL Parameter
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v3/seller/messages/seen/{type}
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- `type`: URL Parameter
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[GET]` /api/v3/seller/messages/search/{type}
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- `type`: URL Parameter

</details>

<details>
<summary><b>📂 Category: SELLER - Monthly-commission-given (V2) (1 endpoints)</b></summary>

### `[GET]` /api/v2/seller/monthly-commission-given
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: SELLER - Monthly-commission-given (V3) (1 endpoints)</b></summary>

### `[GET]` /api/v3/seller/monthly-commission-given
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: SELLER - Monthly-earning (V2) (1 endpoints)</b></summary>

### `[GET]` /api/v2/seller/monthly-earning
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: SELLER - Monthly-earning (V3) (1 endpoints)</b></summary>

### `[GET]` /api/v3/seller/monthly-earning
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: SELLER - More (V1) (1 endpoints)</b></summary>

### `[GET]` /api/v1/seller/more
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: SELLER - Notification (V3) (2 endpoints)</b></summary>

### `[GET]` /api/v3/seller/notification
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v3/seller/notification/view
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: SELLER - Order-statistics (V3) (1 endpoints)</b></summary>

### `[GET]` /api/v3/seller/order-statistics
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: SELLER - Orders (V2) (8 endpoints)</b></summary>

### `[GET]` /api/v2/seller/orders/list
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v2/seller/orders/{id}
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- `id`: URL Parameter

### `[PUT]` /api/v2/seller/orders/order-detail-status/{id}
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- `id`: URL Parameter
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[PUT]` /api/v2/seller/orders/assign-delivery-man
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[PUT]` /api/v2/seller/orders/order-wise-product-upload
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[PUT]` /api/v2/seller/orders/delivery-charge-date-update
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v2/seller/orders/assign-third-party-delivery
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v2/seller/orders/update-payment-status
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: SELLER - Orders (V3) (10 endpoints)</b></summary>

### `[GET]` /api/v3/seller/orders/list
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v3/seller/orders/{id}
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- `id`: URL Parameter

### `[PUT]` /api/v3/seller/orders/order-detail-status/{id}
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- `id`: URL Parameter
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[PUT]` /api/v3/seller/orders/assign-delivery-man
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[PUT]` /api/v3/seller/orders/order-wise-product-upload
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[PUT]` /api/v3/seller/orders/delivery-charge-date-update
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v3/seller/orders/assign-third-party-delivery
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v3/seller/orders/update-payment-status
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v3/seller/orders/address-update
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v3/seller/orders/order-detail-info-update
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: SELLER - Payment-information (V3) (7 endpoints)</b></summary>

### `[GET]` /api/v3/seller/payment-information/list
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v3/seller/payment-information/withdrawal-method-list
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[POST]` /api/v3/seller/payment-information/add
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v3/seller/payment-information/update
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v3/seller/payment-information/default
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v3/seller/payment-information/status
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[GET]` /api/v3/seller/payment-information/delete
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: SELLER - Pos (V3) (7 endpoints)</b></summary>

### `[GET]` /api/v3/seller/pos/get-categories
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v3/seller/pos/customers
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[POST]` /api/v3/seller/pos/customer-store
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[GET]` /api/v3/seller/pos/products
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v3/seller/pos/product-list
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[POST]` /api/v3/seller/pos/place-order
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[GET]` /api/v3/seller/pos/get-invoice
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: SELLER - Products (V2) (10 endpoints)</b></summary>

### `[POST]` /api/v2/seller/products/upload-images
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v2/seller/products/upload-digital-product
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v2/seller/products/add
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[GET]` /api/v2/seller/products/list
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v2/seller/products/stock-out-list
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v2/seller/products/status-update
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v2/seller/products/edit/{id}
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- `id`: URL Parameter

### `[PUT]` /api/v2/seller/products/update/{id}
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- `id`: URL Parameter
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[DELETE]` /api/v2/seller/products/delete/{id}
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- `id`: URL Parameter

### `[GET]` /api/v2/seller/products/barcode/generate
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: SELLER - Products (V3) (27 endpoints)</b></summary>

### `[GET]` /api/v3/seller/products/list
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[POST]` /api/v3/seller/products/upload-images
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v3/seller/products/upload-digital-product
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v3/seller/products/delete-digital-product
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[POST]` /api/v3/seller/products/add
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[GET]` /api/v3/seller/products/details/{id}
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- `id`: URL Parameter

### `[GET]` /api/v3/seller/products/stock-out-list
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[PUT]` /api/v3/seller/products/status-update
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[GET]` /api/v3/seller/products/edit/{id}
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- `id`: URL Parameter

### `[PUT]` /api/v3/seller/products/update/{id}
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- `id`: URL Parameter
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[GET]` /api/v3/seller/products/review-list/{id}
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- `id`: URL Parameter

### `[PUT]` /api/v3/seller/products/quantity-update
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[DELETE]` /api/v3/seller/products/delete/{id}
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- `id`: URL Parameter

### `[GET]` /api/v3/seller/products/barcode/generate
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v3/seller/products/top-selling-product
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v3/seller/products/most-popular-product
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v3/seller/products/delete-image
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v3/seller/products/get-product-images/{id}
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- `id`: URL Parameter

### `[GET]` /api/v3/seller/products/stock-limit-status
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v3/seller/products/delete-preview-file
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v3/seller/products/digital-author-list
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v3/seller/products/digital-publishing-house-list
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[POST]` /api/v3/seller/products/restock-request-list
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[GET]` /api/v3/seller/products/restock-request-delete
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[POST]` /api/v3/seller/products/restock-request-stock-update
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[GET]` /api/v3/seller/products/restock-request-brands-list
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v3/seller/products/{seller_id}/all-products
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- `seller_id`: URL Parameter

</details>

<details>
<summary><b>📂 Category: SELLER - Refund (V2) (3 endpoints)</b></summary>

### `[GET]` /api/v2/seller/refund/list
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v2/seller/refund/refund-details
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[POST]` /api/v2/seller/refund/refund-status-update
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: SELLER - Refund (V3) (4 endpoints)</b></summary>

### `[GET]` /api/v3/seller/refund/list
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v3/seller/refund/single-item
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v3/seller/refund/refund-details
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[POST]` /api/v3/seller/refund/refund-status-update
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: SELLER - Registration (V2) (1 endpoints)</b></summary>

### `[POST]` /api/v2/seller/registration
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: SELLER - Registration (V3) (1 endpoints)</b></summary>

### `[POST]` /api/v3/seller/registration
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: SELLER - Seller-delivery-man (V2) (1 endpoints)</b></summary>

### `[GET]` /api/v2/seller/seller-delivery-man
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: SELLER - Seller-delivery-man (V3) (1 endpoints)</b></summary>

### `[GET]` /api/v3/seller/seller-delivery-man
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: SELLER - Seller-info (V2) (1 endpoints)</b></summary>

### `[GET]` /api/v2/seller/seller-info
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: SELLER - Seller-info (V3) (1 endpoints)</b></summary>

### `[GET]` /api/v3/seller/seller-info
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: SELLER - Seller-update (V2) (1 endpoints)</b></summary>

### `[PUT]` /api/v2/seller/seller-update
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: SELLER - Seller-update (V3) (1 endpoints)</b></summary>

### `[PUT]` /api/v3/seller/seller-update
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: SELLER - Shipping (V2) (4 endpoints)</b></summary>

### `[GET]` /api/v2/seller/shipping/get-shipping-method
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v2/seller/shipping/selected-shipping-method
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v2/seller/shipping/all-category-cost
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[POST]` /api/v2/seller/shipping/set-category-cost
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: SELLER - Shipping (V3) (4 endpoints)</b></summary>

### `[GET]` /api/v3/seller/shipping/get-shipping-method
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v3/seller/shipping/selected-shipping-method
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v3/seller/shipping/all-category-cost
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[POST]` /api/v3/seller/shipping/set-category-cost
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: SELLER - Shipping-method (V2) (6 endpoints)</b></summary>

### `[GET]` /api/v2/seller/shipping-method/list
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[POST]` /api/v2/seller/shipping-method/add
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[GET]` /api/v2/seller/shipping-method/edit/{id}
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- `id`: URL Parameter

### `[PUT]` /api/v2/seller/shipping-method/status
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[PUT]` /api/v2/seller/shipping-method/update/{id}
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- `id`: URL Parameter
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[DELETE]` /api/v2/seller/shipping-method/delete/{id}
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- `id`: URL Parameter

</details>

<details>
<summary><b>📂 Category: SELLER - Shipping-method (V3) (6 endpoints)</b></summary>

### `[GET]` /api/v3/seller/shipping-method/list
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[POST]` /api/v3/seller/shipping-method/add
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[GET]` /api/v3/seller/shipping-method/edit/{id}
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- `id`: URL Parameter

### `[PUT]` /api/v3/seller/shipping-method/status
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[PUT]` /api/v3/seller/shipping-method/update/{id}
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- `id`: URL Parameter
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[DELETE]` /api/v3/seller/shipping-method/delete/{id}
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- `id`: URL Parameter

</details>

<details>
<summary><b>📂 Category: SELLER - Shop-info (V2) (1 endpoints)</b></summary>

### `[GET]` /api/v2/seller/shop-info
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: SELLER - Shop-info (V3) (1 endpoints)</b></summary>

### `[GET]` /api/v3/seller/shop-info
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: SELLER - Shop-product-reviews (V2) (1 endpoints)</b></summary>

### `[GET]` /api/v2/seller/shop-product-reviews
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: SELLER - Shop-product-reviews (V3) (1 endpoints)</b></summary>

### `[GET]` /api/v3/seller/shop-product-reviews
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: SELLER - Shop-product-reviews-reply (V3) (1 endpoints)</b></summary>

### `[POST]` /api/v3/seller/shop-product-reviews-reply
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: SELLER - Shop-product-reviews-status (V2) (1 endpoints)</b></summary>

### `[GET]` /api/v2/seller/shop-product-reviews-status
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: SELLER - Shop-product-reviews-status (V3) (1 endpoints)</b></summary>

### `[GET]` /api/v3/seller/shop-product-reviews-status
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: SELLER - Shop-update (V2) (1 endpoints)</b></summary>

### `[PUT]` /api/v2/seller/shop-update
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: SELLER - Shop-update (V3) (1 endpoints)</b></summary>

### `[PUT]` /api/v3/seller/shop-update
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: SELLER - Temporary-close (V3) (1 endpoints)</b></summary>

### `[PUT]` /api/v3/seller/temporary-close
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: SELLER - Top-delivery-man (V3) (1 endpoints)</b></summary>

### `[GET]` /api/v3/seller/top-delivery-man
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: SELLER - Transactions (V2) (1 endpoints)</b></summary>

### `[GET]` /api/v2/seller/transactions
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: SELLER - Transactions (V3) (1 endpoints)</b></summary>

### `[GET]` /api/v3/seller/transactions
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: SELLER - Update-setup-guide-app (V3) (1 endpoints)</b></summary>

### `[POST]` /api/v3/seller/update-setup-guide-app
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: SELLER - Vacation-add (V3) (1 endpoints)</b></summary>

### `[PUT]` /api/v3/seller/vacation-add
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

</details>

<details>
<summary><b>📂 Category: SELLER - Withdraw-method-list (V3) (1 endpoints)</b></summary>

### `[GET]` /api/v3/seller/withdraw-method-list
- **Headers Required:** 
  `Authorization: Bearer <seller_auth_token>`
- **Middlewares:** `api, api_lang, seller_api_auth`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

<details>
<summary><b>📂 Category: SELLER - {seller_id} (V1) (4 endpoints)</b></summary>

### `[GET]` /api/v1/seller/{seller_id}/products
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
- `seller_id`: URL Parameter

### `[GET]` /api/v1/seller/{seller_id}/seller-best-selling-products
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
- `seller_id`: URL Parameter

### `[GET]` /api/v1/seller/{seller_id}/seller-featured-product
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
- `seller_id`: URL Parameter

### `[GET]` /api/v1/seller/{seller_id}/seller-recommended-products
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
- `seller_id`: URL Parameter

</details>

<details>
<summary><b>📂 Category: SHIPPING-METHOD (V1) (5 endpoints)</b></summary>

### `[GET]` /api/v1/shipping-method/detail/{id}
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
- `id`: URL Parameter

### `[GET]` /api/v1/shipping-method/by-seller/{id}/{seller_is}
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
- `id`: URL Parameter
- `seller_is`: URL Parameter

### `[POST]` /api/v1/shipping-method/choose-for-order
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
- *(Depends on endpoint requirements, usually Form URL-Encoded or JSON Body)*

### `[GET]` /api/v1/shipping-method/chosen
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
*No explicit URL parameters*

### `[GET]` /api/v1/shipping-method/check-shipping-type
- **Headers Required:** 
  *None (Public Endpoint)*
- **Middlewares:** `api, api_lang, apiGuestCheck`
- **Inputs/Params:** 
*No explicit URL parameters*

</details>

---

## 📱 3. Handling Responses in Flutter (Best Practices)

1. **Always Evaluate Status Codes:** Use a strict interceptor strategy in `Dio` or `http`.
   - `200`: HTTP Ok. Parse JSON directly via your Dart models (e.g., `Product.fromJson(json)`).
   - `401`: Unauthorized. Immediately clear local `SharedPreferences` user data and auto-redirect to the Login Screen.
   - `404`: Not Found. **Do not crash the view!** Show a delicate UI element (like an empty state vector or a Toast "Item not found") and pop the navigation stack if needed.
   - `400 / 403`: Validation or Business Logic Error. Read the `message` or `errors` array from the JSON response and show it directly to the user (e.g., via SnackBar).
