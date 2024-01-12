<!DOCTYPE html>
<html lang="en">
<head>
    <title>Order PDF</title>
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    
    <h2>Order Details</h2>
    <p>Order Number: {{ $order->id }}</p>
    <p>Address: {{ $order->address }}</p>
    <p>Post Code: {{ $order->post_code }}</p>
    <p>City: {{ $order->city }}</p>
    <p>Country: {{ $order->country }}</p>
    
    <h3>Product Names:</h3>
    <ul>
        @foreach (json_decode($order->productnames, true) as $productName)
            <li>{{ $productName }}</li>
        @endforeach
    </ul>
    
    <p>Quantity: {{ $order->quantity }}</p>
    <p>Total: {{ $order->total }}€</p>
</body>
</html>
