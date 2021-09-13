<html>
<head>
    <meta charset="utf-8">
    <title>Invoice</title>

</head>
<body>
<header>
    <h1>Invoice</h1>
    <h4>Shipping Info</h4>
    <address>
        <p>{{ $shipping->full_name }}</p>
        <p>{{ $shipping->address }}</p>
        <p>{{ $shipping->phone_number }}</p>
    </address>
    <h4>Billing Info</h4>
    <address>
        <p>{{ $customer->first_name.' '.$customer->last_name }}</p>
        <p>{{ $customer->address }}</p>
        <p>{{ $customer->phone_number }}</p>
    </address>
</header>
<article>
    <h1>Recipient</h1>
    <address>
        <p>Some Company<br>c/o Some Guy</p>
    </address>
    <table class="meta">
        <tr>
            <th><span>Invoice #</span></th>
            <td><span>0000{{ $order->id }}</span></td>
        </tr>
        <tr>
            <th><span>Date</span></th>
            <td><span>{{ $order->created_at }}</span></td>
        </tr>
        <tr>
            <th><span>Amount Due</span></th>
            <td><span id="prefix" contenteditable>Tk.</span><span>{{ $order->order_total }}</span></td>
        </tr>
    </table>
    <table class="inventory">
        <thead>
        <tr>
            <th><span>Item</span></th>
            <th><span>Description</span></th>
            <th><span>Rate</span></th>
            <th><span>Quantity</span></th>
            <th><span>Price</span></th>
        </tr>
        </thead>
        <tbody>
        @php($sum = 0)
        @foreach($orderDetails as $orderDetail)
            <tr>
                <td><span>{{ $orderDetail->product_name }}</span></td>
                <td><span>Experience Review</span></td>
                <td><span data-prefix>$</span><span>{{$orderDetail->product_price}}</span></td>
                <td><span>{{ $orderDetail->product_quantity }}</span></td>
                <td><span data-prefix>Tk.</span><span>{{$total = $orderDetail->product_price }}</span></td>
            </tr>
            @php($sum = $sum + $total)
        @endforeach
        </tbody>
    </table>
    <table class="balance">
        <tr>
            <th><span>Total</span></th>
            <td><span data-prefix>Tk.</span><span>{{ $sum }}</span></td>
        </tr>
    </table>
</article>
<aside>
    <h1><span>Additional Notes</span></h1>
    <div>
        <p>A finance charge of 1.5% will be made on unpaid balances after 30 days.</p>
    </div>
</aside>
</body>
</html>
