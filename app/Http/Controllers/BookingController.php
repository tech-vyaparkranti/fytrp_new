<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{
    // Store booking data and initiate Cashfree payment
    public function storeBooking(Request $request)
{
    // Validate request data
    $validatedData = $request->validate([
        'full-name' => 'required|string',
        'email' => 'required|email',
        'phone-number' => 'required|string',
        'travel-date' => 'required|date',
        'traveller-count' => 'required|integer',
        'packageName' => 'required|string',
        'amount' => 'required|numeric',
    ]);

    // Store the booking data in the database
    $booking = Booking::create([
        'full_name' => $validatedData['full-name'],
        'email' => $validatedData['email'],
        'phone_number' => $validatedData['phone-number'],
        'travel_date' => $validatedData['travel-date'],
        'traveller_count' => $validatedData['traveller-count'],
        'package_name' => $validatedData['packageName'],
        'amount' => $validatedData['amount'],
        'payment_status' => 'PENDING', // Initially set the payment status to PENDING
    ]);

    // Redirect to the checkout page with the booking details
    return redirect()->route('checkout', ['booking' => $booking->id]);
}



    private function initiateCashfreePayment(Booking $booking)
    {
        Log::info('Inside initiateCashfreePayment method', ['booking_id' => $booking->id]);

        $cashfreeUrl = 'https://api.cashfree.com/pg/orders';

        // Generate a unique customer ID
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
            'redirect_url' => route('payment.callback'),  // Local URL for callback
        ];

        // Prepare headers with Cashfree API credentials
        $headers = [
            'Content-Type' => 'application/json',
            'x-api-version'=> '2022-01-01',
            'x-client-id' => env('CASHFREE_API_KEY'),
            'x-client-secret' => env('CASHFREE_API_SECRET'),
        ];

        // Make a POST request to Cashfree API to create the order
        $response = Http::withHeaders($headers)->post($cashfreeUrl, $orderData);
        $responseData = $response->json();

        // Log the raw response for debugging
        Log::info('Raw Cashfree API response', ['response_data' => json_encode($responseData, JSON_PRETTY_PRINT)]);

        // Check if the response contains the expected "payment_link"
        if (isset($responseData['payment_link'])) {
            $paymentLink = $responseData['payment_link'];

            // Store the Cashfree order ID in the database for future reference
            $booking->order_id = $responseData['order_id'];
            $booking->save();

            Log::info('Redirecting to payment link', ['payment_link' => $paymentLink]);

            // Redirect to the payment link
            return redirect()->to($paymentLink);
        } else {
            Log::error('Payment link missing in Cashfree response', ['response' => $responseData]);
            return redirect()->back()->with('error', 'Payment link not found.');
        }
    }

    public function handlePaymentCallback(Request $request)
    {
        // Extract callback parameters
        $orderId = $request->query('order_id');
        $referenceId = $request->query('reference_id');
        $paymentStatus = $request->query('payment_status');
        $paymentAmount = $request->query('payment_amount');
        $signature = $request->query('signature');
    
        Log::info('Received payment callback', [
            'order_id' => $orderId,
            'reference_id' => $referenceId,
            'payment_status' => $paymentStatus,
            'payment_amount' => $paymentAmount,
            'signature' => $signature
        ]);
    
        // Your Cashfree Secret Key
        $secretKey = env('CASHFREE_API_SECRET');
    
        // Check if any required callback parameters are missing
        if (!$orderId || !$referenceId || !$paymentStatus || !$paymentAmount || !$signature) {
            Log::error('Missing callback parameters');
            return redirect()->route('payment.failure')->with('message', 'Invalid callback data');
        }
    
        // Prepare the data to verify the signature
        $dataToVerify = $orderId . $referenceId . $paymentStatus . $paymentAmount;
        $calculatedSignature = hash_hmac('sha256', $dataToVerify, $secretKey);
    
        // Log signature verification for debugging
        Log::info('Calculated signature for verification', ['calculated_signature' => $calculatedSignature]);
    
        // Verify the signature to ensure data integrity
        if ($calculatedSignature === $signature) {
            // Signature matched, check payment status
            $booking = Booking::where('order_id', $orderId)->first();
    
            if ($booking) {
                // Update the payment status in the database
                try {
                    // Log before saving
                    Log::info('Before saving payment status', [
                        'order_id' => $orderId, 
                        'payment_status' => $paymentStatus
                    ]);
    
                    // Update the payment status
                    $booking->payment_status = $paymentStatus;
                    $booking->save();
    
                    // Log after saving
                    Log::info('After saving payment status', [
                        'order_id' => $orderId, 
                        'payment_status' => $booking->payment_status
                    ]);
    
                    // Redirect based on payment status
                    if ($paymentStatus === 'SUCCESS') {
                        Log::info('Payment successful for order_id', ['order_id' => $orderId]);
                        return redirect()->route('payment.success')->with('message', 'Payment successful');
                    } else {
                        Log::info('Payment failed for order_id', ['order_id' => $orderId]);
                        return redirect()->route('payment.failure')->with('message', 'Payment failed');
                    }
                } catch (\Exception $e) {
                    Log::error('Failed to update booking status', ['error' => $e->getMessage()]);
                    return redirect()->route('payment.failure')->with('message', 'Failed to update payment status');
                }
            } else {
                Log::error('Booking not found for order ID', ['order_id' => $orderId]);
                return redirect()->route('payment.failure')->with('message', 'Invalid order ID');
            }
        } else {
            // Signature mismatch
            Log::error('Signature mismatch', [
                'expected_signature' => $calculatedSignature,
                'received_signature' => $signature
            ]);
            return redirect()->route('payment.failure')->with('message', 'Invalid signature');
        }
    }
    
}
