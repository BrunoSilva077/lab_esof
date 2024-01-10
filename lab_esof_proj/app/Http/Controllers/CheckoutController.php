<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function session(Request $request)
{
    \Stripe\Stripe::setApiKey(config('stripe.sk'));

    $rowIds = $request->input('rowIds');
    $totals = $request->input('totals');
    $qtys = $request->input('qtys');
    $productnames = $request->input('productnames');
    $voucherCode = $request->input('voucher_code');

    $lineItems = [];

    foreach ($rowIds as $index => $rowId) {
        $productname = $productnames[$index];
        $totalprice = $totals[$index];
        $qty = $qtys[$index];
        $totalprice = $totalprice / $qty;
        $two0 = "00";
        $totalAmountInCents = round($totalprice * 100) ;

        $lineItems[] = [
            'price_data' => [
                'currency'     => 'EUR',
                'product_data' => [
                    "name" => $productname,
                ],
                'unit_amount'  => $totalAmountInCents,
            ],
            'quantity'   => $qty,
        ];
    }

    $user = Auth::user();

    $session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'],
        'line_items' => $lineItems,
        'metadata' => [
            'voucher_code' => $voucherCode,
        ],
        'mode' => 'payment',
        'success_url' => route('home'), //deveria ser store mas nao esta a funcionar por enquanto
        'cancel_url' => route('checkout', ['user' => auth()->id()]),
        'customer_email' => $user->email,
    ]);

    $request->session()->put('checkout_data', [
        'rowIds' => $rowIds,
        'totals' => $totals,
        'qtys' => $qtys,
        'productnames' => $productnames,
        'voucherCode' => $voucherCode,
        'session_id' => $session->id,
    ]);

    return redirect()->away($session->url);
}
    public function success()
    {
        return redirect('home')->with('success', 'Thanks for you order You have just completed your payment. The seeler will reach out to you as soon as possible');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $id_user =Auth::id();
        $cart_products = Cart::instance('shopping')->content();
        return view('checkout.create', compact('cart_products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storecheckout(Request $request)
    {
      $payload = $request->getContent();
      $event = \Stripe\Webhook::constructEvent(
        $payload, $request->header('Stripe-Signature'), config('cashier.webhook_secret')
    );

    $paymentIntentId = $event->data->object->id;
        return $this->successMethod();
    }

    /**
     * Display the specified resource.
     */
    public function show(Checkout $checkout)
    {
        return back();

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Checkout $checkout)
    {
        return back();

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Checkout $checkout)
    {
        return back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Checkout $checkout)
    {
        return back();
    }
}
