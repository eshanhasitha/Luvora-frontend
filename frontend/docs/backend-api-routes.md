# Backend API routes and frontend integration

API origin: `LUVORA_API_URL`. Authenticated calls use `Authorization: Bearer <access_token>`. The frontend API client refreshes an expired access token through `/api/auth/refresh` and retries the original request once.

For frontend persistence gaps and backend data needs (including profile birthday, checkout/order data, wishlist, newsletter, support, and mock admin screens), see [backend-api-fields.md](backend-api-fields.md). This audit is inferred from frontend code and is not a verified database schema.

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
| `POST` | `/api/auth/verify-email` | Connected to the account verification form. Sends `{ token }` with the signed-in Bearer token; confirms the email and refreshes the displayed verification state. |
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
| `GET` | `/api/cart` | Connected for cart and checkout display. |
| `POST` | `/api/cart/items` | Connected from product detail. Frontend submits `{ productId, quantity, unitPrice }`; backend must verify/recalculate price. |
| `PUT` | `/api/cart/items/{itemId}` | Connected for quantity changes. |
| `DELETE` | `/api/cart/items/{itemId}` | Connected for item removal. |

The backend currently has no auth check on these cart routes; requests include Bearer tokens, but the API should enforce that the route user ID matches the token user.

## Orders, payments, delivery, inventory and notifications

| Method | Endpoint | Frontend status |
|---|---|---|
| `POST` | `/api/orders` | Backend order creation endpoint per route inventory. Checkout currently does not submit an order; selected address/shipping/payment remain session data. |
| `GET` | `/api/users/me/orders` | Connected for customer order history and account order lookup. |
| `GET` | `/api/users/me/orders/{orderId}` and `/items` | Connected after finding the order in the authenticated customer's list. |
| `POST` | `/api/users/me/orders/{orderId}/cancel` | Connected. UI collects a reason, but the controller currently sends no request body. |
| - | - | Return requests have no backend endpoint yet; frontend return form remains unavailable. |
| `POST` / `GET` | `/api/payments`, `/api/payments/{paymentId}`, `/api/payments/order/{orderId}` | Backend routes exist. The current payment implementation is a mock that marks payments completed; checkout does not call it or claim a real payment was taken. |
| `POST` / `GET` / `PUT` | `/api/deliveries`, `/api/deliveries/{deliveryId}`, `/api/deliveries/order/{orderId}`, `/api/deliveries/{deliveryId}/status` | These are listed backend routes. Customer order detail/tracking currently calls `GET /api/users/me/orders/{orderId}/shipment`; delivery creation/status updates are not wired in the storefront. |
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

## Admin API integration

The admin app calls the API server-side through its Laravel session and sends `Authorization: Bearer <admin_access_token>`. The admin API endpoint inventory was supplied by the backend team on 2026-10-16. Admin list/detail reads are wired through `AdminApiPageController`; response collections are surfaced in the collapsible **Live API data** section so the UI can display the actual response fields without assuming a DTO.

| Area | Admin API | Current frontend integration |
|---|---|---|
| Auth/profile | `GET/PATCH /api/admin/auth/me` | Profile is fetched and profile name/email update is wired. Password change endpoint exists but the profile form is not connected to it. Admin login uses `/api/admin/auth/login`; confirm that remains the supported login contract. |
| Customers | `GET /api/admin/customers[/{customerId}]` | List and optional `?customerId=` detail reads wired. Status update not yet wired pending DTO. |
| Staff | `GET /api/admin/staff[/{staffId}]`, `GET /api/admin/staff/{staffId}/roles` | List/detail/roles reads wired. Create, status and role writes are pending DTOs. |
| Products | `GET /api/admin/products[/{productId}]`, `POST /api/admin/products`, `POST /api/admin/products/images` | List/detail and create are wired to ProductService. Create sends `Name`, `CategoryId`, `Description`, `Price`, optional `DiscountPrice`/`Brand`, `SKU`, `Sizes[]`, `Colors[]`, and `ImageUrls[]`; images upload using multipart field `file`. Sizes/colors are product-level option lists, not variant SKUs or per-variant inventory. Status and other writes remain pending frontend integration. |
| Categories | `GET /api/admin/categories[/{categoryId}]` | List/detail reads wired. Create/update/status/delete writes are pending DTOs. |
| Orders | `GET /api/admin/orders[/{orderId}]` | List/detail reads wired. Status update is pending DTO. |
| Inventory | `GET /api/admin/inventory/stock[/{productId}]` | Stock list/detail reads wired. `summary`, `low-stock`, and `out-of-stock` are not in the supplied API list and are no longer requested. Stock update is pending DTO. |
| Payments | `GET /api/admin/payments`, `/summary`, `/transactions`, `/transactions/{transactionId}`, `/orders/{orderId}/transactions` | List, summary, transactions, and optional transaction/order detail reads wired. |
| Delivery | `GET /api/admin/delivery/shipments[/{deliveryId}]` | Shipment list/detail reads wired. The old `/delivery` and `/delivery/summary` requests were removed. Status update is pending DTO. |
| Reviews | `GET /api/admin/reviews[/{reviewId}]` | List/detail reads wired. The old `/reviews/summary` and `/reviews/reported` requests were removed because they are absent from the supplied list. Status/delete writes are pending DTO. |
| Notifications | `GET /api/admin/notifications`, `/unread-count`, `/{notificationId}`; `PATCH /{notificationId}/read`; `POST /read-all` | Navbar and sidebar open the notifications page; list/unread count and read actions are wired. |
| Promotions/coupons/campaigns/banners | Listed GET endpoints | Collection and optional detail reads wired. Create/update/status/delete/image/reorder writes are pending DTOs; banner image needs multipart field details. |
| Support | `/api/admin/support/...` | Ticket/complaint list reads use `/tickets` and `/complaints`; optional detail reads use `/{ticketId}` and `/{complaintId}`. Exact subpaths and methods for messages, assignment, create/update/status were not specified and need confirmation. |
| Reports | `GET /api/admin/reports`, `GET /{reportType}` | List and optional `?reportType=` reads wired. Export create/poll is pending its request DTO and job response fields. |
| Dashboard | `GET /api/admin/dashboard/summary`, `/sales-chart`, `/orders-chart`, `/recent-orders`, `/top-products`, `/revenue-summary` | These six reads use supplied paths. The earlier `/dashboard/low-stock` and `/dashboard/pending-tasks` paths are not in the supplied API inventory and are not called. Stock and orders lists are sourced from their documented admin endpoints; low-stock alerts can only be derived when stock rows include quantity and reorder threshold fields. Summary/chart response DTOs are not documented, so metrics/status breakdowns are displayed only when the response supplies recognized fields. |
| Settings | `/api/admin/settings/...` | Existing section GET remains; exact list/update endpoints and DTOs are needed to wire saves. |
| Audit/system | `/api/admin/audit-logs/...`, `/api/admin/system/...` | Audit list/security events read paths exist; exact audit detail and system service-status endpoint paths need confirmation. |

### Admin API contracts still needed

- Dashboard summary and chart DTOs: revenue, order/customer totals, average order value, pending order count, conversion rate (including its denominator/window), order-status breakdown, point labels and values, currency/time zone, and supported date query parameter names. Current UI sends `startDate`/`endDate` to supplied dashboard reads; confirm those names upstream.
- If dashboard-level low-stock alerts or pending tasks are required, add and document those API routes. The current dashboard derives low stock from the documented inventory list only when reorder thresholds are present; pending orders are derived from the documented orders list only when status values are present.
- Request/response DTOs for all write operations, especially required fields, enum values, validation errors, and response envelopes.
- Exact support ticket and complaint route paths/methods for detail, create/update/status, assign, and ticket messages.
- Admin login and refresh route/response contract, including token lifetime and refresh behavior.
- Settings list/update paths and setting DTOs.
- Exact audit-log detail and system service-status paths.
- Reports export request body, export format values, job ID field, and polling response/status fields.
- Whether categories need pagination/filter query names and whether each list endpoint returns a bare array or a named collection envelope.
