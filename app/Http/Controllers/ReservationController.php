<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Mail\BookingConfirmation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validation d l-data
        $request->validate([
            'paypal_order_id' => 'required|string',
            'service_name'    => 'required|string',
            'price'           => 'required|numeric',
            'pickup_date'     => 'required|date',
            'pickup_time'     => 'required|string',
            'customer_name'   => 'required|string',
            'customer_email'  => 'required|email',
            'customer_phone'  => 'required|string',
        ]);

        $orderID = $request->paypal_order_id;

        // 2. Verification m3a PayPal API (Dynamic URL for Sandbox/Live)
        $baseUrl = env('PAYPAL_MODE') === 'live' 
            ? "https://api-m.paypal.com" 
            : "https://api-m.sandbox.paypal.com";

        $response = Http::withBasicAuth(
            env('PAYPAL_CLIENT_ID'), 
            env('PAYPAL_SECRET')
        )->get("{$baseUrl}/v2/checkout/orders/{$orderID}");

        $paymentDetails = $response->json();

        // 3. Ila daz l-khlass (COMPLETED)
        if ($response->successful() && $paymentDetails['status'] === 'COMPLETED') {
            
            // Creer l-Reservation f DB
            $reservation = Reservation::create([
                'service_name'    => $request->service_name,
                'price'           => $request->price,
                'pickup_date'     => $request->pickup_date,
                'pickup_time'     => $request->pickup_time,
                'customer_name'   => $request->customer_name,
                'customer_email'  => $request->customer_email,
                'customer_phone'  => $request->customer_phone,
                'payment'         => $request->price, 
                'paypal_order_id' => $orderID,
            ]);

            // --- EMAILS ---

            // A. Sift l-Contrat/Confirmation l-Client
            try {
                // Kan-sifto l-$reservation object l-Mailable
                Mail::to($reservation->customer_email)->send(new BookingConfirmation($reservation));
            } catch (\Exception $e) {
                Log::error("Mail Client Error: " . $e->getMessage());
            }

            // B. Notify Admin (Simple Text)
            try {
                Mail::raw(
                    "New Paid Reservation! \n\n" .
                    "Service: {$reservation->service_name}\n" .
                    "Client: {$reservation->customer_name}\n" .
                    "Price: {$reservation->price} USD\n" .
                    "Date: {$reservation->pickup_date} at {$reservation->pickup_time}",
                    function($message) use ($reservation) {
                        $message->to('votre-email@admin.com') // <== Beddel hada b l-mail dyalk
                                ->subject('✅ New Payment Received - ' . $reservation->customer_name);
                    }
                );
            } catch (\Exception $e) {
                Log::error("Mail Admin Error: " . $e->getMessage());
            }

            return response()->json([
                'success' => true, 
                'reservation' => $reservation,
                'message' => 'Payment verified and email sent with contract.'
            ]);
        }

        // Error payment
        return response()->json([
            'success' => false, 
            'message' => 'Payment verification failed.'
        ], 422);
    }

    public function index()
    {
        $reservations = Reservation::orderBy('created_at', 'desc')->get();
        return response()->json($reservations);
    }
}