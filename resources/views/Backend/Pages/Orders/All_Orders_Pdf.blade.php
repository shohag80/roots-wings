<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders Pdf</title>
    <style>
        table, tr, th, td {
            border: 1px solid;
            border-collapse: collapse;
            padding: 4px;
            text-align: center;
            border-color: #0aad0a;
        }
        .header{
            text-align: center;
            border-bottom: 1px solid #0aad0a;
        }
    </style>
</head>

<body>
    <section class="mb-2">
        <div class="container bg-body-tertiary p-2">
            <div class="header">
                <h1><span style="color: orange;">Online</span> <span style="color: #0aad0a;">Shoping</span></h1>
            </div>
            <table class="table table-hover text-center">
                <thead style="background-color: #0aad0a; color: #fff;">
                    <tr>
                        <th scope="col">Order ID</th>
                        <th scope="col">Date</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Pay Method</th>
                        <th scope="col">Pay Status</th>
                        <th scope="col">Transaction Id</th>
                        <th id="status" scope="col">Delivery Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->created_at}}</td>
                        <td>{{$item->amount}}/-</td>
                        <td>{{$item->payment_method}}</td>
                        <td>{{$item->payment_status}}</td>
                        <td>{{$item->transaction_id}}</td>
                        <td>
                            @if($item->delivery_status=='pending'){{$item->delivery_status}}@endif
                            @if($item->delivery_status=='confirm')<span class="badge bg-success">{{$item->delivery_status}}</span>@endif
                            @if($item->delivery_status=='cancel')<span class="badge bg-danger">{{$item->delivery_status}}</span>@endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

</body>

</html>