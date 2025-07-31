@extends('layout.layout')

@section('content')
    <div class="checkout-container">
        <div class="checkout-wrapper">
            <h2 class="checkout-title">Checkout</h2>
            <div class="booking-details">
                <div class="booking-detail">
                    <span class="detail-label"><strong>Package Name:</strong></span>
                    <span class="detail-value">{{ $booking->package_name }}</span>
                </div>
                <div class="booking-detail">
                    <span class="detail-label"><strong>Full Name:</strong></span>
                    <span class="detail-value">{{ $booking->full_name }}</span>
                </div>
                <div class="booking-detail">
                    <span class="detail-label"><strong>Email:</strong></span>
                    <span class="detail-value">{{ $booking->email }}</span>
                </div>
                <div class="booking-detail">
                    <span class="detail-label"><strong>Phone Number:</strong></span>
                    <span class="detail-value">{{ $booking->phone_number }}</span>
                </div>
                <div class="booking-detail">
                    <span class="detail-label"><strong>Travel Date:</strong></span>
                    <span class="detail-value">{{ $booking->travel_date }}</span>
                </div>
                <div class="booking-detail">
                    <span class="detail-label"><strong>Traveller Count:</strong></span>
                    <span class="detail-value">{{ $booking->traveller_count }}</span>
                </div>
                <div class="booking-detail">
                    <span class="detail-label"><strong>Amount:</strong></span>
                    <span class="detail-value">INR {{ number_format($booking->amount, 2) }}</span>
                </div>
            </div>

            <div class="payment-confirmation">
                <form action="{{ route('checkout.paynow', ['booking' => $booking->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="pay-now-btn">Pay Now</button>
                </form>
            </div>
        </div>
    </div>

    <style>

        /* Basic Reset */
* 



/* Centering and Styling the Checkout Section */
.checkout-container {
    background-color: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 600px;
    display: block;
    margin: auto;
    margin-bottom: 30px;
    margin-top: 115px;
}

.checkout-wrapper {
    text-align: center;
}

.checkout-title {
    font-size: 32px;
    font-weight: 600;
    color: #333;
    margin-bottom: 20px;
}

.booking-details {
    margin-bottom: 20px;
    font-size: 16px;
    line-height: 1.6;
    text-align: left;
}

.booking-detail {
    margin-bottom: 10px;
}

.detail-label {
    font-weight: bold;
}

.detail-value {
    color: #555;
    margin-left: 10px;
}

.payment-confirmation {
    margin-top: 20px;
}

.pay-now-btn {
    background-color: #4CAF50;
    color: white;
    padding: 15px 30px;
    font-size: 18px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.pay-now-btn:hover {
    background-color: #45a049;
}

.pay-now-btn:active {
    background-color: #388e3c;
}

    </style>
@endsection

