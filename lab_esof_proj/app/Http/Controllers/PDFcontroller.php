<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use PDF;

class PDFcontroller extends Controller
{
    public function generatePDF(Request $request)
    {
        $orderId = $request->input('order_id');
        $order = Checkout::find($orderId);

        if (!$order) {
            return abort(404); // Ou redirecione para uma página de erro, se preferir
        }

        $data = [
            'order' => $order,
            'title' => 'Order PDF',
            'date' => date('m/d/Y')
        ];

        $pdf = PDF::loadView('pdf.myPDF', $data);
        return $pdf->download('order_invoice_'.$orderId.'.pdf');
    }
}
