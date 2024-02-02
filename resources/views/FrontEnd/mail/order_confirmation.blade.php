<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
</head>
<body>
    <h2>Order Confirmation</h2>

    <p>Dear {{ $order->customer_name }},</p>

    <p>Your order has been confirmed. Here are the details:</p>

    <ul>
        <li><strong>Order ID:</strong> {{ $order->id }}</li>
        <li><strong>Total Amount:</strong> {{ $order->total_amount }}</li>
        <li><strong>Phone Number:</strong> {{ $order->phone_number }}</li>
        <li><strong>Shipping Address:</strong> {{ $order->shipping_address }}</li>
    </ul>

    <p>Thank you for your order. Please stay connected with us.</p>

    <p>Click <a href="{{ url('/') }}">here</a> to shop more.</p>

    <p>Regards,<br>
    Your Company Name</p>
</body>
</html>
