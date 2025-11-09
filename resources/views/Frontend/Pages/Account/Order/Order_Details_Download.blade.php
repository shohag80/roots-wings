<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online_Shoping</title>
</head>

<body>
    <div style="border: 2px solid green; height: 945px; padding: 15px;">
        <table width="100%">
            <tr style="color: green; padding:5px; text-align: center">
                <td colspan="3">
                    <h1><u>Purchase Reciept</u></h1>
                </td>
            </tr>
            <tr>
                <td width="40%">
                    <p><b>Date:</b> {{ $order->created_at }}</p>
                    <p><b>Payment Method:</b> {{ $order->payment_method }}</p>
                    <p><b>Order No:</b> OS - {{ $order->id }}</p>
                    <p><b>Name:</b> {{ $order->name }}</p>
                    <p><b>Phone Number:</b> {{ $order->phone }}</p>
                </td>
                <td>
                    <p><b>E-mail:</b> {{ $order->email }}</p>
                    <p><b>Address:</b> {{ $order->address }}</p>
                    <p><b>State:</b> Dhaka.</p>
                    <p><b>Country:</b> Bangladesh.</p>
                    <p><b>Payment Status:</b> {{ $order->payment_status }}</p>
                </td>
            </tr>
        </table>
        <table width="100%" border="1px solid green;" style="border-collapse: collapse;">
            <tr style="background-color: green; color: white;">
                <th>Sl</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price (BTD)</th>
            </tr>
            @php $Qty = 0; @endphp
            @foreach ($order_details as $key => $item)
            @php $Qty += $item->quantity; @endphp
            <tr>
                <td style="text-align: center;">{{ $key + 1 }}</td>
                <td style="text-align: center;">{{ $item->product->name }}</td>
                <td style="text-align: center;">{{ $item->quantity }} pcs</td>
                <td style="text-align: right;">{{ $item->subtotal }}/-</td>
            </tr>
            @endforeach
            <tr>
                <td style="text-align: center;" colspan="2">Total</td>
                <td style="text-align: center;">{{ $Qty }} pcs</td>
                <td style="text-align: right;">{{ $order->amount }}/-</td>
            </tr>
        </table>
    </div>
    <p>Want any help? <a href="#!" style="color: green;">Please contact us</a></p>
</body>

</html>