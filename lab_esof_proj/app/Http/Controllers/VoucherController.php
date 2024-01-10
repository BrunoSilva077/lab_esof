<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vouchers = Voucher::all();
        return view('admin.vouchers.index', compact('vouchers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.vouchers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validação dos dados do formulário
         $request->validate([
            'cod_voucher' => 'required',
            'tipo_percentual' => 'required|numeric',
            'valor_desconto' => 'required|numeric',
            // Adicione outras regras de validação conforme necessário
        ]);

        // Criar um novo voucher
        $voucher = new Voucher();
        $voucher->cod_voucher = $request->input('cod_voucher');
        $voucher->tipo_percentual = $request->input('tipo_percentual');
        $voucher->valor_desconto = $request->input('valor_desconto');
        // Adicione outros campos conforme necessário

        // Salvar o voucher na base de dados
        $voucher->save();

        // Redirecionar para a página de exibição do voucher ou outra página desejada
        return redirect()->route('adminvouchers')->with('success', 'Voucher adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Voucher $voucher)
    {
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editvoucher(Voucher $voucher)
    {
        return view('admin.vouchers.edit', ['voucher' => $voucher]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updatevoucher(Request $request, Voucher $voucher)
    {
        $request->validate([
            'cod_voucher' => 'string',
            'tipo_percentual' => 'integer',
            'valor_desconto' => 'integer',
            // Adicione outras regras de validação conforme necessário
        ]);
    
        $voucher->update([
            'cod_voucher' => $request->input('cod_voucher'),
            'tipo_percentual' => $request->input('tipo_percentual'),
            'valor_desconto' => $request->input('valor_desconto'),
        ]);
        return back()->with('success', 'Voucher updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Voucher $voucher)
    {
        return back();
    }
}
