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
        $totalAmountInCents = $totalprice * 100;

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
    $session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'], // ou outros métodos de pagamento suportados
        'line_items' => $lineItems,
        'metadata' => [
            'voucher_code' => $voucherCode,
        ],
        'mode' => 'payment',
        'success_url' => route('store'),
        'cancel_url' => route('checkout', ['user' => auth()->id()]),
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
        // dd($cart_products);
        return view('checkout.create', compact('cart_products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // // Valide os dados, se necessário
        // $request->validate([
        //     'productname'   => 'required',
        //     'total'         => 'required',
        //     'qty'           => 'required|integer|min:1',
        //     'voucher_code'  => 'nullable|string',
        //     // Adicione outras regras de validação conforme necessário
        // ]);
        // // Recupere detalhes da compra da sessão
        // $lineItems = session('lineItems');
        // $voucherCode = session('voucherCode');

        // // Crie e salve uma nova ordem na base de dados usando o modelo Checkout
        // $order = new Checkout([
        //     'user_id' => auth()->id(), // Supondo que você está usando autenticação
        //     // 'total' => /* Calcule o total com base nos itens no carrinho */,
        //     'voucher_code' => $voucherCode,
        //     // Outros campos necessários
        // ]);

        // $order->save();

        // // Você também pode associar os itens da compra à ordem, dependendo de como sua relação está configurada
        // $order->items()->createMany($lineItems);

        // // Limpe as informações da compra da sessão
        // session()->forget(['lineItems', 'voucherCode']);
        // return back()->with('success', 'Favorito added successfully');

            // Recupere a sessão do Stripe
    $stripe = new \Stripe\StripeClient(config('stripe.sk'));
    $checkout_session = $stripe->checkout->sessions->retrieve($request->input('session_id'));

    // Acesse as informações da compra
    $payment_intent = $checkout_session->payment_intent;
    $line_items = $checkout_session->display_items;

    // Agora você pode percorrer os itens da compra e salvá-los no banco de dados
    foreach ($line_items as $item) {
        $product_name = $item->custom->name; // Nome do produto
        $quantity = $item->quantity; // Quantidade
        $unit_amount = $item->amount->value; // Valor unitário em centavos
        $total_amount = $quantity * $unit_amount; // Valor total em centavos

        // Execute a lógica para salvar essas informações no banco de dados, por exemplo:
        $orderItem = new OrderItem([
            'product_name' => $product_name,
            'quantity' => $quantity,
            'unit_amount' => $unit_amount,
            'total_amount' => $total_amount,
            // Outros campos necessários
        ]);
        $orderItem->save();
    }
    return back()->with('success', 'Favorito added successfully');
    }

    // ... outros métodos

    /**
     * Display the specified resource.
     */
    public function show(Checkout $checkout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Checkout $checkout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Checkout $checkout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Checkout $checkout)
    {
        //
    }
}
