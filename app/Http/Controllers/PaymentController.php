<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Institution;

class PaymentController extends Controller
{
    public function showPaymentForm()
    {
        return view('payment');
    }

    public function processPayment(Request $request)
    {
        $paymentSuccess = true;

        if ($paymentSuccess) {
            try {
                $institutionName = Session::get('institution_name');
                $institution = Institution::where('name', $institutionName)->first();

                if ($institution) {
                    $institution->update(['payment' => 7000.00]);
                }

                return redirect()->route('registerAdmin')->with('status', 'Pago realizado y registro completado.');
            } catch (\Exception $e) {
                return redirect()->route('payment.show')->withErrors('Error al guardar el pago: ' . $e->getMessage());
            }
        } else {
            return redirect()->route('payment.show')->withErrors('Error en el pago. Inténtalo de nuevo.');
        }
    }
}
