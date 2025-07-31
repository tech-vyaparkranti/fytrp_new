<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
// use App\Http\Controllers\Service;
use App\Models\Service;
use App\Models\PackageMaster;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    // Display the checkout page with the booking details
    public function showCheckoutPage($bookingId)
    {
        // Fetch the booking details from the database
        $booking = Booking::findOrFail($bookingId);
        // $service = Service::where(Service::SERVICE_STATUS, Service::SERVICE_STATUS_LIVE)
        //     ->orderBy(Service::SERVICE_SORTING, 'desc')
        //     ->get();
            $destinations = PackageMaster::distinct()->pluck('package_country')->toArray();

        // Return the checkout view with the booking details
        return view('checkout', compact('booking','destinations'));
    }

    // Initiate payment and redirect to the payment gateway
    public function initiatePayment(Booking $booking)
    {
        Log::info('Initiating payment for booking', ['booking_id' => $booking->id]);

        // Call Cashfree API to initiate payment
        return $this->initiateCashfreePayment($booking);
    }

    // Call the Cashfree API to initiate payment
    private function initiateCashfreePayment(Booking $booking)
    {
        // Your Cashfree API setup
        $cashfreeUrl = 'https://api.cashfree.com/pg/orders';

        // Generate unique customer ID
        $customerId = 'CUSTOMER-' . md5($booking->email . $booking->phone_number);

        // Create order data
        $orderData = [
            'order_id' => 'BOOKING-' . time(),
            'order_amount' => $booking->amount,
            'order_currency' => 'INR',
            'order_note' => 'Booking for ' . $booking->package_name,
            'customer_details' => [
                'customer_id' => $customerId,
                'customer_name' => $booking->full_name,
                'customer_email' => $booking->email,
                'customer_phone' => $booking->phone_number,
            ],
            'redirect_url' => route('payment.callback'),  // Your callback route after payment
        ];

        // Cashfree API headers
        $headers = [
            'Content-Type' => 'application/json',
            'x-api-version' => '2022-01-01',
            'x-client-id' => env('CASHFREE_API_KEY'),
            'x-client-secret' => env('CASHFREE_API_SECRET'),
        ];

        // Make the POST request to Cashfree API
        $response = Http::withHeaders($headers)->post($cashfreeUrl, $orderData);
        $responseData = $response->json();

        Log::info('Cashfree API Response:', ['response' => $responseData]);

        // Check if the response contains the expected payment link
        if (isset($responseData['payment_link'])) {
            $paymentLink = $responseData['payment_link'];

            // Store the Cashfree order ID in the booking for reference
            $booking->order_id = $responseData['order_id'];
            $booking->save();

            // Redirect to the payment link
            return redirect()->to($paymentLink);
        } else {
            Log::error('Error in Cashfree API response', ['response' => $responseData]);
            return redirect()->route('checkout', ['booking' => $booking->id])->with('error', 'Payment initiation failed');
        }
    }
}
