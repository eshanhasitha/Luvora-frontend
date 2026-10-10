<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformationPageController extends Controller
{
    public function show(string $key)
    {
        $page = $this->pages()[$key] ?? abort(404);

        if (($page['requires_account'] ?? false) && ! session('access_token')) {
            return redirect()->route('login.show');
        }

        $page['sections'] = $this->sections($key, $page);

        return view('information.show', compact('page'));
    }

    public function submitContact(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:40'],
            'subject' => ['required', 'string', 'max:120'],
            'message' => ['required', 'string', 'max:3000'],
            'preferred_channel' => ['required', 'in:email,phone,whatsapp'],
        ]);

        return back()->with('form_notice', 'Your message was not sent because the customer support service is not connected yet. Please use the published support channels when they become available.');
    }

    public function submitIssue(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'order_number' => ['nullable', 'string', 'max:100'],
            'category' => ['required', 'string', 'max:100'],
            'details' => ['required', 'string', 'max:3000'],
        ]);

        return back()->with('form_notice', 'Your issue report was not sent because the support ticket service is not connected yet.');
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'consent' => ['accepted'],
        ]);

        return redirect()->route('newsletter.confirmation')->with(
            'newsletter_notice',
            'Your subscription was not recorded because the newsletter service is not connected yet.'
        );
    }

    public function checkGiftCard(Request $request)
    {
        $request->validate([
            'gift_card_code' => ['required', 'string', 'max:100'],
        ]);

        return back()->with('form_notice', 'Gift card balance lookup is not available until the gift card service is connected.');
    }

    private function pages(): array
    {
        $support = [
            'customer-care.contact' => ['Contact Us', 'Send a message to the Luvora customer care team.', 'contact'],
            'customer-care.concierge' => ['Customer Concierge', 'Get help with shopping, orders, delivery, and product questions.', 'concierge'],
            'help' => ['Help Center', 'Find guidance for shopping, payments, delivery, returns, and your account.', 'help'],
            'faq' => ['Frequently Asked Questions', 'Answers to common questions about shopping with Luvora.', 'faq'],
            'customer-care.shipping' => ['Shipping Information', 'Learn about delivery options and order dispatch.', 'shipping-info'],
            'customer-care.returns' => ['Returns and Exchanges', 'Review the current return and exchange information.', 'returns-info'],
            'customer-care.delivery' => ['Delivery Information', 'Find delivery guidance for Luvora orders.', 'delivery-info'],
            'customer-care.colombo-express' => ['Colombo Express Hub', 'Information about express delivery in Colombo.', 'colombo-express'],
            'customer-care.payment' => ['Payment Information', 'Learn about payment options and payment support.', 'payment-info'],
            'customer-care.orders' => ['Order Help', 'Find help with order status, tracking, invoices, and changes.', 'order-help'],
            'customer-care.report-issue' => ['Report a Problem', 'Tell customer care about a problem with your Luvora experience.', 'report-issue'],
        ];

        $about = [
            'about' => ['About Luvora', 'A Sri Lankan marketplace celebrating thoughtful design, local makers, and island craft.', 'about'],
            'heritage' => ['Our Heritage', 'Explore the traditions and places that shape Luvora’s Sri Lankan point of view.', 'about'],
            'artisans' => ['Artisan Guild', 'Meet the makers and independent ateliers behind the pieces featured on Luvora.', 'about'],
            'craftsmanship' => ['Our Craftsmanship', 'Learn about the materials, techniques, and care behind handcrafted work.', 'about'],
            'sustainability' => ['Sustainability', 'Our approach to thoughtful sourcing, durable design, and responsible craft.', 'about'],
            'collections-story' => ['Our Collections Story', 'Discover the ideas and inspirations behind Luvora’s curated collections.', 'about'],
            'authenticity' => ['Authenticity and Certificates', 'Information about product provenance and documentation provided by makers.', 'about'],
        ];

        $policies = [
            'privacy' => ['Privacy Policy', 'How personal information is intended to be handled when you use Luvora.', 'legal'],
            'terms' => ['Terms and Conditions', 'Terms for using the Luvora storefront and related services.', 'legal'],
            'cookies' => ['Cookie Policy', 'Information about cookies and similar technologies used by the storefront.', 'legal'],
            'shipping-policy' => ['Shipping Policy', 'The policy details that apply to delivery and order dispatch.', 'legal'],
            'returns-policy' => ['Returns Policy', 'The policy details that apply to returns and exchanges.', 'legal'],
            'payment-policy' => ['Payment Policy', 'The policy details that apply to payments and refunds.', 'legal'],
            'authenticity-policy' => ['Authenticity Policy', 'The policy details that apply to product provenance and authenticity.', 'legal'],
            'warranty-policy' => ['Warranty Policy', 'The warranty coverage and conditions for eligible products.', 'legal'],
        ];

        $pages = [];
        foreach ($support as $key => [$title, $intro, $type]) {
            $pages[$key] = ['title' => $title, 'intro' => $intro, 'type' => $type, 'eyebrow' => 'Customer care'];
        }
        foreach ($about as $key => [$title, $intro, $type]) {
            $pages[$key] = ['title' => $title, 'intro' => $intro, 'type' => $type, 'eyebrow' => 'About Luvora'];
        }
        foreach ($policies as $key => [$title, $intro, $type]) {
            $pages[$key] = ['title' => $title, 'intro' => $intro, 'type' => $type, 'eyebrow' => 'Legal & policies'];
        }

        return $pages + [
            'newsletter' => ['title' => 'Newsletter Subscription', 'intro' => 'Hear about new collections, makers, and news from Luvora.', 'type' => 'newsletter', 'eyebrow' => 'The Luvora letter'],
            'newsletter-confirmation' => ['title' => 'Newsletter Confirmation', 'intro' => session('newsletter_notice', 'Newsletter subscription status will appear here.'), 'type' => 'confirmation', 'eyebrow' => 'Subscription status'],
            'offers' => ['title' => 'Promotions', 'intro' => 'Explore current Luvora promotions and selected offers.', 'type' => 'offers', 'eyebrow' => 'Offers & events'],
            'gift-cards' => ['title' => 'Luvora Gift Cards', 'intro' => 'A thoughtful way to share a Luvora shopping experience.', 'type' => 'gift-cards', 'eyebrow' => 'A considered gift'],
            'gift-card-balance' => ['title' => 'Gift Card Balance', 'intro' => 'Check the remaining value on your Luvora gift card.', 'type' => 'gift-card-balance', 'eyebrow' => 'Gift cards'],
            'loyalty' => ['title' => 'Luvora Loyalty', 'intro' => 'Information about member benefits and the Luvora loyalty programme.', 'type' => 'loyalty', 'eyebrow' => 'Membership'],
            'rewards' => ['title' => 'Your Rewards', 'intro' => 'Review rewards and member benefits associated with your Luvora account.', 'type' => 'rewards', 'eyebrow' => 'Your account', 'requires_account' => true],
            'referrals' => ['title' => 'Refer a Friend', 'intro' => 'Share Luvora with someone who appreciates considered design and island craft.', 'type' => 'referrals', 'eyebrow' => 'Share Luvora'],
        ];
    }

    private function sections(string $key, array $page): array
    {
        return match ($key) {
            'faq' => [
                ['title' => 'Where can I find my orders?', 'body' => 'Sign in and open Account → Orders to view the order information available to your account. Tracking details appear when they are supplied by the order service.'],
                ['title' => 'Which payment methods can I use?', 'body' => 'Available payment methods are shown during checkout. Payment processing is not enabled in this storefront yet.'],
                ['title' => 'How do I check delivery progress?', 'body' => 'Open the tracking page from your order history. Live location updates appear only when a delivery tracking service provides them.'],
                ['title' => 'How do I request a return or exchange?', 'body' => 'Open the relevant order details page. Return requests are not submitted until the returns service is connected.'],
                ['title' => 'Where do product provenance details come from?', 'body' => 'Product descriptions may include maker and material information. Certificates are shown only when supplied for that product.'],
            ],
            'about' => [
                ['title' => 'A Sri Lankan point of view', 'body' => 'Luvora brings together fashion, accessories, and craft with a focus on Sri Lankan makers and contemporary island style.'],
                ['title' => 'A considered selection', 'body' => 'The storefront organizes products into collections and categories so customers can explore by style and craft.'],
                ['title' => 'Our approach', 'body' => 'We aim to present product information clearly and to credit makers and materials when those details are available.'],
            ],
            'heritage' => [
                ['title' => 'Rooted in place', 'body' => 'Sri Lanka’s regional textiles, techniques, and visual traditions continue to inspire the pieces featured across Luvora.'],
                ['title' => 'Living traditions', 'body' => 'Craft heritage evolves through the people who practice it. Product pages should identify specific origins only when that information has been verified.'],
            ],
            'artisans' => [
                ['title' => 'Makers and ateliers', 'body' => 'Luvora’s collections are intended to highlight independent makers and craft communities. Verified maker details are shown with the relevant products when available.'],
                ['title' => 'Credit and provenance', 'body' => 'We aim to identify the maker, material, and technique for each product where those details have been provided and checked.'],
            ],
            'craftsmanship' => [
                ['title' => 'Made with care', 'body' => 'Handloom, embroidery, natural materials, and other craft traditions may be represented in the Luvora collection. Check each product listing for its specific materials and care instructions.'],
                ['title' => 'Product care', 'body' => 'Care requirements vary by material and construction. Follow the instructions supplied with the product or contact customer care before cleaning a delicate piece.'],
            ],
            'sustainability' => [
                ['title' => 'Thoughtful choices', 'body' => 'We aim to provide clear information about materials and makers so customers can make informed choices.'],
                ['title' => 'Specific claims', 'body' => 'Environmental and sourcing claims should be evaluated product by product and are published only when supporting information is available.'],
            ],
            'collections-story' => [
                ['title' => 'Collections with a point of view', 'body' => 'Explore new arrivals, featured pieces, best sellers, and category edits through the shop.'],
                ['title' => 'Explore the archive', 'body' => 'Collection pages bring related products together. Availability and product details may change as the catalogue is updated.'],
            ],
            'authenticity' => [
                ['title' => 'Product details', 'body' => 'Review each listing for maker, material, and origin information. Documentation is provided only for products that include it.'],
                ['title' => 'Certificates', 'body' => 'Certificate availability and verification details depend on the individual product. Contact customer care with the product name if you need clarification.'],
            ],
            'contact' => [
                ['title' => 'Contact channels', 'body' => 'A support ticket service is not connected to this storefront yet. The message form will not send or store your personal information.'],
                ['title' => 'Order questions', 'body' => 'For current order details, sign in and open your order history.'],
            ],
            'concierge' => [
                ['title' => 'How the concierge can help', 'body' => 'Use customer care for questions about products, account access, delivery information, and order details.'],
                ['title' => 'Contact the team', 'body' => 'The contact form is available as a preview; message delivery will be enabled when the support service is connected.'],
            ],
            'help' => [
                ['title' => 'Find help by topic', 'body' => 'Choose a topic below to find the related information page.'],
                ['title' => 'Need a specific answer?', 'body' => 'Search the frequently asked questions or open the contact page. Support ticket submission is not connected yet.'],
            ],
            'shipping-info', 'shipping-policy' => [
                ['title' => 'Delivery options', 'body' => 'Available delivery methods and estimated charges are shown during checkout when the delivery service is available.'],
                ['title' => 'Dispatch estimates', 'body' => 'Delivery time depends on the destination, stock status, and carrier. This storefront does not yet provide live carrier estimates.'],
                ['title' => 'Policy status', 'body' => 'Final shipping terms have not been configured in this application. Please confirm delivery terms with customer care before placing an order.'],
            ],
            'returns-info', 'returns-policy' => [
                ['title' => 'Before requesting a return', 'body' => 'Keep your order reference and product details available. Eligibility can depend on product type and condition.'],
                ['title' => 'Request status', 'body' => 'The return request form is a preview until a returns service is connected. No request, pickup, or refund is created from it.'],
                ['title' => 'Policy status', 'body' => 'Final return and exchange terms have not been configured in this application. Confirm eligibility with customer care.'],
            ],
            'delivery-info', 'colombo-express' => [
                ['title' => 'Service availability', 'body' => 'Delivery options depend on the destination and current courier availability. Checkout does not yet validate service coverage.'],
                ['title' => 'Tracking', 'body' => 'Order tracking displays order status when provided by the order service. Live courier location is not connected.'],
            ],
            'payment-info', 'payment-policy' => [
                ['title' => 'Payment options', 'body' => 'Checkout displays the payment options currently configured for the storefront.'],
                ['title' => 'Payment processing', 'body' => 'A payment provider is not connected, so this frontend cannot collect payment or confirm a charge.'],
                ['title' => 'Policy status', 'body' => 'Final payment and refund terms have not been configured. Do not treat this page as a completed payment policy.'],
            ],
            'order-help' => [
                ['title' => 'View order history', 'body' => 'Sign in and open Account → Orders to view orders returned by the order service.'],
                ['title' => 'Changes and cancellations', 'body' => 'Self-service cancellation and order modification are unavailable until the order service supports those actions.'],
                ['title' => 'Receipts and tracking', 'body' => 'The storefront can show a printable receipt preview and order status when those details are present in the order response.'],
            ],
            'report-issue' => [
                ['title' => 'Before you submit', 'body' => 'The report form validates your details but does not send or store them because no support ticket service is connected.'],
                ['title' => 'Account or order issue', 'body' => 'Include the order reference when contacting support through an approved Luvora support channel.'],
            ],
            'privacy', 'terms', 'cookies', 'authenticity-policy', 'warranty-policy' => [
                ['title' => 'Policy content', 'body' => 'The final policy text has not been supplied or approved for this storefront. This page is a navigation placeholder and is not legal advice or a binding policy.'],
                ['title' => 'Questions', 'body' => 'Please contact Luvora customer care for current information before relying on a privacy, legal, authenticity, or warranty term.'],
            ],
            'gift-cards' => [
                ['title' => 'Gift cards', 'body' => 'Gift card issuance, delivery, redemption, and expiration terms are not configured in this storefront.'],
                ['title' => 'Balance lookup', 'body' => 'Balance checks are unavailable until a gift card service is connected.'],
            ],
            'gift-card-balance' => [
                ['title' => 'Balance lookup', 'body' => 'The balance form is a preview. Gift card codes are not stored or checked because the gift card service is not connected.'],
            ],
            'offers' => [
                ['title' => 'Current offers', 'body' => 'No live promotion feed is connected, so there are no verified offers to display right now.'],
            ],
            'loyalty', 'rewards' => [
                ['title' => 'Membership status', 'body' => 'Membership tiers, points, and reward balances are not available from the current account API.'],
                ['title' => 'Rewards programme', 'body' => 'Programme terms and earning rules have not been configured. No reward balance is being estimated on this page.'],
            ],
            'referrals' => [
                ['title' => 'Referral programme', 'body' => 'Referral links, rewards, and attribution are not connected yet. This page does not create or track referrals.'],
            ],
            'newsletter' => [
                ['title' => 'Email updates', 'body' => 'The subscription form is ready for a newsletter integration, but it will not record your address until that service is connected.'],
            ],
            'newsletter-confirmation' => [
                ['title' => 'Subscription status', 'body' => 'This page confirms the status message only. No subscription is recorded until the newsletter service is available.'],
            ],
            default => [
                ['title' => 'More information', 'body' => $page['intro']],
            ],
        };
    }
}
