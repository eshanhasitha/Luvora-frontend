# Backend API routes and frontend integration

API origin: `LUVORA_API_URL`. Authenticated calls use `Authorization: Bearer <access_token>`. The frontend API client refreshes an expired access token through `/api/auth/refresh` and retries the original request once.

## Auth and account

| Method | Endpoint | Frontend status |
|---|---|---|
| `POST` | `/api/auth/register` | Connected. |
| `POST` | `/api/auth/login` | Connected. |
| `POST` | `/api/auth/refresh` | Connected automatically after an authenticated request gets 401. |
| `POST` | `/api/auth/logout` | Connected. |
| `POST` | `/api/auth/forgot-password` | Connected; backend responds generically. |
| `POST` | `/api/auth/reset-password` | Connected using `newPassword`; backend reset tokens are not configured and returns an error until they are. |
| `POST` | `/api/auth/change-password` | Connected with Bearer token. |
| `POST` | `/api/auth/resend-verification` | Connected with Bearer token and empty body; delivery is not configured. |
| `POST` | `/api/auth/verify-email` | Backend route is not implemented; no frontend call. |
| `PUT` | `/api/auth/users/{userId}/role` | Admin operation; no frontend role-management screen/call. |
| `GET` / `PUT` | `/api/account/profile` | Connected; core first/last name and phone are persisted. Extra profile preferences remain browser-session data because the API DTO has no fields for them. |
| `GET` / `POST` | `/api/account/addresses` | Connected. |
| `PUT` / `DELETE` | `/api/account/addresses/{addressId}` | Connected. |
| `GET` / `PUT` | `/api/account/preferences` | Connected for language, currency, theme, and notification preference flags. |
| `DELETE` | `/api/account` | Connected; requires current password and explicit confirmation. |

## Products and images

| Method | Endpoint | Frontend status |
|---|---|---|
| `GET` | `/api/products` | Connected for catalog, categories, search, collections, and gift guide. The storefront requests 100 records per API page, collects the API-reported pages for catalog filtering, then paginates filtered catalog results at 12 products per storefront page. It accepts common `products`/`items` response envelopes and displays counts from the loaded, filtered results. Backend query filters supported: `search`, `categoryId`, `minPrice`, `maxPrice`, `page`, `pageSize`. |
| `GET` | `/api/products/{product-guid}` | Connected for product detail, cart item metadata, availability, compare, and recently viewed. |
| `GET` | `/api/products/{slug}` or `/api/products/slug/{slug}` | Connected for product detail and review lookup by slug. |
| `POST` / `PUT` / `DELETE` | `/api/products` and `/api/products/{product-guid}` | Staff/admin product management endpoints; the storefront currently has no staff product editor calling these routes. |
| `POST` | `/api/products/categories` | Staff/admin category creation; no storefront category-admin screen. |
| `POST` | `/api/products/images` | Staff/admin multipart upload (`file`); no storefront product editor calling it. |
| `GET` | `/api/products/images/{fileName}` | Public images; relative API image paths are prefixed with `LUVORA_API_URL` in product views. |

Product responses use `imageUrls[]`; product views read those URLs. Catalog filters remain intact and are applied to the complete loaded catalog, including category, price, brand/artisan, size, color, material, sustainability, stock, delivery, Koko, rating, and sort selections.

## Reviews

| Method | Endpoint | Frontend status |
|---|---|---|
| `GET` | `/api/products/{slug}/reviews` | Connected. |
| `POST` | `/api/products/{slug}/reviews` | Connected with Bearer token; body `{ rating, title, comment }`. |
| `GET` | `/api/products/{product-guid}/reviews` | Backend GUID alias. |
| `POST` | `/api/products/{product-guid}/reviews` | Backend alias has no auth check; frontend uses the authenticated slug route instead. |
| `GET` | `/api/reviews/{review-guid}` | Backend route; no frontend call. |
| `GET` | `/api/reviews/product/{product-guid}` | Backend route; no frontend call. |
| `POST` / `DELETE` | `/api/reviews` and `/api/reviews/{review-guid}` | Backend routes; no frontend call. Review authorization/order verification should be enforced by backend before public use. |

## Cart

| Method | Endpoint | Frontend status |
|---|---|---|
| `GET` | `/api/cart/{userId}` | Connected for cart and checkout display. |
| `POST` | `/api/cart/{userId}/items` | Connected from product detail. Frontend loads product price from product service and submits `{ productId, quantity, unitPrice }`. |
| `PUT` / `PATCH` | `/api/cart/{userId}/items/{itemId}` | Connected with `PUT` for quantity changes. |
| `DELETE` | `/api/cart/{userId}/items/{itemId}` | Connected for item removal. |

The backend currently has no auth check on these cart routes; requests include Bearer tokens, but the API should enforce that the route user ID matches the token user.

## Orders, payments, delivery, inventory and notifications

| Method | Endpoint | Frontend status |
|---|---|---|
| `POST` | `/api/orders` | Backend order creation endpoint. Checkout currently does not submit an order because its request only accepts user/items and cannot persist the selected delivery address or shipping method. |
| `GET` | `/api/orders/{orderId}` | Backend route exists, but the storefront reads details from the authenticated customer's order list because this route currently has no auth/ownership check. |
| `GET` | `/api/orders/user/{userId}` | Connected for order history and account order lookup. |
| `POST` | `/api/orders/{orderId}/cancel` | Connected. Backend currently accepts no cancellation reason. |
| - | - | Return requests have no backend endpoint yet; frontend return form remains unavailable. |
| `POST` / `GET` | `/api/payments`, `/api/payments/{paymentId}`, `/api/payments/order/{orderId}` | Backend routes exist. The current payment implementation is a mock that marks payments completed; checkout does not call it or claim a real payment was taken. |
| `POST` / `GET` / `PUT` | `/api/deliveries`, `/api/deliveries/{deliveryId}`, `/api/deliveries/order/{orderId}`, `/api/deliveries/{deliveryId}/status` | GET by order is connected on authenticated order detail and tracking pages after the order is verified from the customer order list. Delivery creation/status updates remain staff/service operations. |
| `POST` / `GET` | `/api/inventory`, `/api/inventory/{productId}`, `/api/inventory/reserve`, `/api/inventory/release` | GET by product ID is connected on product detail and availability pages. Inventory creation/reservation/release remain staff/order-service operations. |
| `PUT` | `/api/inventory/{productId}` | Backend route; no storefront inventory editor. |
| `POST` | `/api/notifications` | Backend/internal route; no storefront call. |
| `GET` | `/api/notifications/user/{userId}` | Connected to account notifications. |
| `GET` | `/api/notifications/{notificationId}` | Backend route; no standalone frontend call. |
| `PUT` | `/api/notifications/{notificationId}/read` | Connected to mark a notification read. |
| `GET` | `/api/notifications/user/{userId}/unread-count` | Connected to account unread count. |
| `POST` | `/api/notifications/order-created` | Backend/internal route; no storefront call. |

Order, cart, payment, delivery, inventory and notification APIs listed as having no auth checks should be secured in the backend before production use. The frontend sends Bearer credentials for customer-scoped operations where its API client supports them.

## Other browser-only storefront features

Compare and recently viewed are session-based. Wishlist is browser-local. Contact, newsletter, gift-card balance, store directory, journal, return submissions, and real payment processing have no matching usable backend endpoint wired in this frontend. No fabricated success response is shown for those unavailable integrations.
