# Frontend persistence gaps and backend data needs

This is a scan of the Laravel frontend applications for values customers or staff can enter, change, or save. It answers which data is not persisted in a shared backend/database today and what the backend would need to support. It is **not** a database schema: backend source, migrations, and API DTOs are not in this workspace, so table names below are proposed logical entities and field names are suggested API names.

## Priority 1: Account profile preferences

**Current behavior:** `AccountController::updateProfile()` accepts the fields below, sends only `firstName`, `lastName`, and `phoneNumber` to `PATCH /api/users/me`, then stores the extra fields in the Laravel session as `account.profile`. The edit form itself tells the customer they are browser/session-only. Logging in from another browser or losing the session loses them. The profile view tries several aliases but cannot retrieve these session-only values from the API.

| UI field | Suggested persisted field | Suggested type / notes |
|---|---|---|
| Date of birth | `dateOfBirth` | SQL `date`, nullable; validate past date. This is the birthday that currently does not persist. |
| Preferred display name | `displayName` | String up to 120, nullable. |
| Wardrobe category | `wardrobeCategory` | Enum/string: `women`, `men`, `unisex`. |
| Standard size | `standardSize` | String up to 30, nullable. |
| Alteration preferences | `alterationPreference` | Text/string up to 500, nullable. |
| Preferred fabrics | `preferredFabrics` | String array / JSON column / related preference rows. |
| Secondary phone | `secondaryPhone` | String up to 40, nullable. |
| Preferred contact channel | `preferredChannel` | Enum: `email`, `phone`, `whatsapp`. |

**Backend work:** extend the authenticated customer profile DTO and persistence model; return these fields from `GET /api/users/me`; accept and persist them in `PATCH /api/users/me` (or a dedicated `PUT /api/users/me/profile-preferences`). Keep existing `firstName`, `lastName`, and `phoneNumber`. Ensure profile updates are scoped to the token user. Frontend change then removes session storage and maps API response fields into the edit form.

Related current profile data that already goes to API: `firstName`, `lastName`, `phoneNumber`. Email is displayed read-only and has no email-change flow. Newsletter checkbox on registration is currently not included in registration request; see Newsletter below.

## Priority 1: Checkout, orders, and customer delivery data

**Current behavior:** checkout accepts and validates recipient/address, shipping method, and payment method but writes them only to session (`checkout.address`, `checkout.shipping`, `checkout.payment`). Checkout does not create an order or initiate payment. The values disappear across sessions and there is no order row for the customer to track.

| Data entered/selected | Suggested entity and fields | Notes |
|---|---|---|
| Checkout address | `OrderAddressSnapshot`: `recipientName`, `phoneNumber`, `addressLine1`, `addressLine2`, `city`, `province`/`region`, `postalCode`, `country` | Snapshot the address used for that order so later address edits do not change old orders. Existing account addresses can be selected/reused. |
| Shipping choice | `shippingMethod` | Current values: `express`, `colombo_same_day`; validate service availability and eligibility server-side. |
| Payment choice | `paymentMethod` | Current UI values: `card`, `cash_on_delivery`; card details must go directly to a payment provider and must not be stored in application DB. |
| Order | `Order`: customer ID, `orderNumber`, `status`, currency, subtotal, discounts, shipping/tax/total amounts, timestamps, address snapshot, shipping method, payment status | Amounts and status must be calculated/owned by backend, never trusted from browser-submitted totals. |
| Order item | `OrderItem`: order ID, product ID, product/SKU/name snapshot, quantity, unit price, line total, selected variant/options | Snapshot name/SKU/price at purchase; enforce inventory and quantity checks. |
| Shipment/delivery | `Shipment`/`Delivery`: order ID, status, tracking number, carrier, shipped/delivered timestamps, tracking URL/events if supported | Current tracking page only displays status, tracking number, delivered date; no real GPS map feed exists. |
| Cancellation reason | `cancellationReason`, `cancelledAt`, `cancelledBy` on order or cancellation record | UI collects reason, but controller currently does not send it to API. |
| Return request | `ReturnRequest`: order/item IDs, reason, details, status, requested/resolved timestamps | UI form is explicitly unavailable and no API call occurs. |

**Backend work:** define an authenticated checkout/order-create API that accepts address ID or address snapshot, shipping method, payment intent/reference, and item/variant quantities; backend loads current prices, applies policy, reserves stock, calculates totals, and atomically creates order and items. Add order lifecycle, cancellation, delivery, and return endpoints with customer ownership checks. Never persist card number/CVV in Luvora tables.

## Priority 2: Address completeness

**Current behavior:** account address fields are sent to `/api/users/me/addresses` except `delivery_instructions`, which is deliberately stored in `account.address_extras` in the Laravel session. It is lost across sessions/devices and not shared with delivery staff.

| UI field | Suggested backend field |
|---|---|
| Delivery instructions | `deliveryInstructions` text, nullable, max 500 |

Add it to the address DTO and address table (or a separately secured delivery note); return it from address GET and accept it on POST/PUT. Consider privacy/retention: instructions may contain sensitive access details. Existing address fields already sent: `label`, `recipientName`, `phoneNumber`, `addressLine1`, `addressLine2`, `city`, `region`, `postalCode`, `country`, `isDefault`.

## Priority 2: Wishlist and saved-for-later items

**Current behavior:** wishlist uses browser `localStorage` key `luvora-wishlist` in home/catalog/search/category/wishlist views. Saved-for-later uses another localStorage key in the saved cart page. These lists are browser-specific, not associated with an account, and can be cleared by browser storage reset. Their stored item snapshot includes product ID, name, price, image, URL (and potentially quantity/variant depending on the writer).

**Suggested entities/API:** customer-owned `Wishlist` and `WishlistItem` (or one saved-item entity) with `userId`, `productId`, `createdAt`; saved-for-later can use a `SavedCartItem` with `productId`, quantity, selected variant, and timestamps. Add authenticated GET/POST/DELETE endpoints. On read, join current product data instead of trusting stale local price/image. Provide migration/sync from localStorage after sign-in if existing wishes should be retained.

## Priority 2: Staff announcement

**Current behavior:** `/staff/announcement` lets staff publish/clear a site-wide message. `SiteAnnouncement` stores a single `site-announcement.json` file on the storefront app's local disk with `message`, `postedBy`, `postedAt`. That file is not shared across app instances, deployments, or the admin app.

**Suggested entity/API:** `StoreAnnouncement`: message, active flag, `createdByStaffId`, `createdAt`, `updatedAt`, optional `startsAt`/`endsAt`. Add staff-authorized publish/list/current/clear API operations and audit history if announcements need governance. Current local file is the only persistence, not a backend DB row.

## Priority 3: Newsletter and marketing consent

**Current behavior:** registration form has a `newsletter` checkbox but `AuthController::register()` does not validate/send it. Newsletter subscribe validates `email` and `consent` but intentionally returns that the address was not recorded because no service is connected.

**Suggested entity/API:** `NewsletterSubscription`: normalized email, consent status, consent timestamp/source, status (pending/confirmed/unsubscribed), confirmation token hash and timestamps, unsubscribe timestamp. Add subscribe, confirm, unsubscribe, and preference endpoints. Do not treat a submitted checkbox as proof of confirmed subscription; store auditable consent. Decide whether consent can exist before account registration and enforce deduplication by normalized email.

## Priority 3: Customer care and support

**Current behavior:** contact and issue-report forms validate fields but intentionally do not transmit/store them. The forms include contact name, email, phone, subject, message, preferred channel; issue report includes email, optional order number, category, details.

**Suggested entity/API:** `SupportTicket` with customer ID nullable, name, email, phone, subject/category, message/details, related order ID/reference nullable, preferred channel, status, priority, assigned staff ID, created/updated timestamps; optionally `SupportTicketMessage` for replies and attachments metadata. Add create/list/detail/reply endpoints with spam/rate limiting and access control. Do not store card/payment credentials in ticket content; redact where applicable.

## Priority 3: Gift cards, loyalty, and referrals

**Current behavior:** gift card balance form does not call a service; gift card issue/redemption is not implemented. Loyalty/rewards and referrals are informational placeholders with no account balances or referral tracking.

**Suggested entities/API if these features are in scope:**

- `GiftCard`: code hash (never plaintext lookup code), initial/current balance, currency, status, issued/redeemed/expiry timestamps, purchaser/recipient/order references. Add create/redeem/balance endpoints; rate-limit code lookup and avoid exposing whether arbitrary codes exist.
- `LoyaltyAccount` and append-only `LoyaltyLedgerEntry`: customer ID, points delta, reason/source order, expiration, created timestamp. Derive balance from ledger or maintain a reconciled balance.
- `Referral`: referrer customer, invite identifier/code, referred customer nullable, status, reward ledger reference, timestamps. Enforce attribution and abuse rules server-side.

## Browser/session state that does not necessarily need database storage

These values are currently transient or deliberately browser-local. Persist them only if product requirements call for cross-device continuity:

| State | Current storage | Possible backend need |
|---|---|---|
| Recently viewed products (up to 12) | Laravel session | Optional customer `RecentlyViewedProduct` records; often keep browser-local for privacy. |
| Compare list (up to 4 slugs) | Laravel session | Usually transient; no DB needed unless cross-device compare is required. |
| Checkout in-progress values | Laravel session | Persist a draft checkout only if users must resume across sessions/devices; final order must be backend persisted. |
| Auth tokens and current user | Laravel session | This is authentication/session infrastructure; it is not a customer-profile field request. Store refresh tokens securely according to backend auth design. |
| Search/filter selections | URL/query/browser state | Usually no database persistence needed. |
| Saved cart count shown in header | Session/UI placeholder | The actual cart API is connected; ensure server cart is the source of truth and remove stale view-only assumptions if found. |

## Admin, delivery, and staff management screens

Many admin delivery, personnel, inventory, categories, products, orders, customers, payments, marketing, support, and reports screens still contain static sample rows and controls. Admin list/detail reads are now connected to the supplied `/api/admin/...` endpoints and exposed in each page's collapsed **Live API data** section; most sample-table controls are not yet connected to writes. The supplied endpoint inventory is not a request/response schema, so do not infer DTOs from the sample rows. Backend/API contract details still needed include:

- Delivery zones: zone name/code, polygon/postal/district coverage, service level, fee, cutoff, active state.
- Delivery assignments: order/shipment, assigned driver/courier, vehicle, status, assigned/accepted/picked-up/delivered timestamps, exception reason.
- Delivery personnel/fleet: staff identity, role, contact, hub, vehicle, capacity, availability, rating (rating should be derived from sourced feedback).
- Inventory: product/variant/location, on-hand/reserved/available quantities, reorder point, movement ledger, reason, actor, timestamp.
- Catalog administration: category/collection hierarchy, slug, description, image, sort order, active/published state; product/variant/SKU/pricing/stock/media fields.
- Payments/refunds: provider reference, order, amount/currency, status, method token/type, idempotency key, refund amount/reason/status/timestamps. Never store PAN/CVV.
- Promotions/coupons/banners/campaigns: code, rules, validity window, usage limits, eligibility, content/assets, channel, active state, attribution.
- Support/reviews/customer management: entities described above plus moderation, assignment, audit trail, and access policy.
- Reports/audit: source records and reproducible aggregation definitions; avoid storing static dashboard numbers as if they were live data.

Before wiring each screen, identify which controls are intended to save, define the API DTO and authorization rules, and show an explicit unavailable state until persistence exists. Do not create columns just to mirror decorative sample text.

## Recommended implementation order

1. Persist profile preferences (`dateOfBirth` first) and delivery instructions through the authenticated customer API.
2. Complete checkout/order creation and server-owned totals/inventory/payment flow; this enables actual order history/tracking.
3. Add wishlist and saved-for-later APIs if signed-in cross-device state is required.
4. Connect support and newsletter with consent/audit handling.
5. Build gift-card, loyalty, referral, and admin/delivery CRUD only when those business workflows are approved.

For each item, the backend owner should confirm database type, requiredness, validation, indexes/unique constraints, retention, authorization, and response shape. Then update the frontend controller to send/read API fields and remove session/local-file persistence for that value.
