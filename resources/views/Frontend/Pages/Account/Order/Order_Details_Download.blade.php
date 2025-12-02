<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Receipt - Roots & Wings</title>
    <style>
        /* Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }
        
        body {
            background-color: #f5f5f5;
            color: #333333;
            padding: 20px;
            line-height: 1.5;
        }
        
        /* Receipt Container */
        .receipt-wrapper {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border-top: 5px solid #28a745;
        }
        
        /* Header Section */
        .receipt-header {
            padding: 10px 15px 10px;
            text-align: center;
            border-bottom: 2px solid #f0f0f0;
            background-color: #f9fff9;
        }
        
        .company-name {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 5px;
            letter-spacing: 0.5px;
        }
        
        .company-name span:first-child {
            color: #e6b400;
        }
        
        .company-name span:last-child {
            color: #28a745;
        }
        
        .receipt-title {
            font-size: 22px;
            color: #444444;
            margin: 15px 0 5px;
            position: relative;
            display: inline-block;
        }
        
        .receipt-title:after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #28a745;
        }
        
        .order-number {
            font-size: 16px;
            font-weight: bold;
            color: #28a745;
            background-color: #e9f7ef;
            padding: 8px 15px;
            border-radius: 4px;
            display: inline-block;
            margin-top: 10px;
        }
        
        /* Order Info Section - UPDATED FOR 2 ITEMS PER ROW */
        .order-info {
            padding: 15px 30px;
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            border-bottom: 2px solid #f0f0f0;
        }
        
        .info-section {
            flex: 1;
            min-width: 300px;
        }
        
        .section-title {
            color: #28a745;
            font-size: 18px;
            margin-bottom: 5px;
            padding-bottom: 2px;
            border-bottom: 1px dashed #ddd;
            display: flex;
            align-items: center;
        }
        
        .section-title:before {
            content: '#';
            margin-right: 8px;
            font-size: 12px;
        }
        
        /* NEW: 2 ITEMS PER ROW USING FLEXBOX */
        .info-items-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }
        
        .info-item {
            flex: 1 1 calc(50% - 15px);
            box-sizing: border-box;
        }
        
        .info-label {
            font-weight: bold;
            color: #555555;
            margin-bottom: 3px;
            font-size: 14px;
        }
        
        .info-value {
            color: #333333;
            font-size: 15px;
            padding: 3px 0;
        }
        
        .payment-status {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 3px;
            font-size: 14px;
            font-weight: bold;
        }
        
        .status-paid {
            background-color: #d4edda;
            color: #155724;
        }
        
        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }
        
        /* Products Table */
        .products-section {
            padding: 25px 30px 15px;
        }
        
        .products-table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0 25px;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            overflow: hidden;
        }
        
        .products-table thead {
            background-color: #28a745;
            color: white;
        }
        
        .products-table th {
            padding: 15px 12px;
            text-align: left;
            font-weight: bold;
            font-size: 15px;
        }
        
        .products-table tbody tr {
            border-bottom: 1px solid #f0f0f0;
        }
        
        .products-table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        .products-table tbody tr:hover {
            background-color: #f0f9f0;
        }
        
        .products-table td {
            padding: 12px;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 0 15px;
            border-radius: 5px;
            overflow: hidden;
        }

        .info-table th {
            padding: 4px 2px;
            text-align: left;
            font-weight: bold;
            font-size: 13px;
        }

        .info-table td {
            padding: 4px 2px;
            text-align: left;
            font-size: 13px;
        }
        
        .text-center {
            text-align: center;
        }
        
        .text-right {
            text-align: right;
        }
        
        .total-row {
            background-color: #f0f9f0;
            font-weight: bold;
            font-size: 16px;
            border-top: 2px solid #ddd;
        }
        
        .total-row td {
            padding: 15px 12px;
        }
        
        /* Footer Section */
        .receipt-footer {
            padding: 25px 30px;
            background-color: #f9fff9;
            border-top: 2px solid #f0f0f0;
            text-align: center;
        }
        
        .thank-you {
            font-size: 18px;
            color: #28a745;
            margin-bottom: 10px;
            font-weight: bold;
        }
        
        .help-text {
            margin-bottom: 20px;
            color: #555555;
        }
        
        .help-text a {
            color: #28a745;
            text-decoration: none;
            font-weight: bold;
        }
        
        .help-text a:hover {
            text-decoration: underline;
        }
        
        .contact-info {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
            margin: 15px 0 25px;
            color: #666666;
            font-size: 14px;
        }
        
        .contact-item {
            display: flex;
            align-items: center;
        }
        
        .contact-icon {
            display: inline-block;
            width: 18px;
            height: 18px;
            margin-right: 6px;
            background-color: #28a745;
            border-radius: 50%;
            position: relative;
        }
        
        .contact-icon:after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 9px;
            font-weight: bold;
        }
        
        .phone-icon:after {
            content: 'P';
        }
        
        .email-icon:after {
            content: '@';
        }
        
        .web-icon:after {
            content: 'W';
        }
        
        .print-button {
            display: inline-block;
            background-color: #28a745;
            color: white;
            padding: 12px 25px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: bold;
            border: none;
            cursor: pointer;
            font-size: 15px;
            transition: background-color 0.3s;
            margin-top: 10px;
        }
        
        .print-button:hover {
            background-color: #218838;
        }
        
        /* Print Styles */
        @media print {
            body {
                background-color: white;
                padding: 0;
            }
            
            .receipt-wrapper {
                box-shadow: none;
                border: 1px solid #ddd;
                max-width: 100%;
            }
            
            .print-button {
                display: none;
            }
        }
        
        /* Mobile Responsive */
        @media (max-width: 768px) {
            body {
                padding: 10px;
            }
            
            .receipt-header {
                padding: 10px 5px;
            }
            
            .company-name {
                font-size: 28px;
            }
            
            .order-info {
                padding: 20px 15px;
                flex-direction: column;
                gap: 20px;
            }
            
            .info-section {
                min-width: 100%;
            }
            
            /* Stack items vertically on mobile */
            .info-item {
                flex: 1 1 100%; /* Full width on mobile */
            }
            
            .products-section {
                padding: 20px 15px 10px;
                overflow-x: auto;
            }
            
            .products-table {
                font-size: 14px;
            }
            
            .products-table th,
            .products-table td {
                padding: 10px 8px;
            }
            
            .receipt-footer {
                padding: 20px 15px;
            }
            
            .contact-info {
                flex-direction: column;
                gap: 10px;
                align-items: center;
            }
        }
    </style>
</head>
<body>
    <div class="receipt-wrapper">
        <!-- Header -->
        <div class="receipt-header">
            <div class="company-name">
                <span>ROOTS &</span>
                <span> WINGS</span>
            </div>
            <h2 class="receipt-title">PURCHASE RECEIPT</h2>
            <div class="order-number">Order No: OS - {{ $order->id }}</div>
        </div>
        
        <!-- Order Information - FIXED 2 ITEMS PER ROW -->
        <div class="order-info">
            <div class="info-section">
                <h3 class="section-title">Customer Details</h3>
                <div class="info-items-container">
                    <div class="info-item">
                        <table class="info-table">
                            <tbody>
                                <tr>
                                    <th>Name:</th>
                                    <td>{{ $order->name }}</td>
                                    <th>Phone Number:</th>
                                    <td>{{ $order->phone }}</td>
                                </tr>
                                <tr>
                                    <th>E-mail:</th>
                                    <td>{{ $order->email }}</td>
                                    <th>Order Date:</th>
                                    <td>{{ $order->created_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>            
            <div class="info-section">
                <h3 class="section-title">Shipping & Payment</h3>
                <div class="info-items-container">
                    <div class="info-item">
                        <table class="info-table">
                            <tbody>
                                <tr>
                                    <th>Address:</th>
                                    <td>{{ $order->address }}</td>
                                    <th>State/Country:</th>
                                    <td>Dhaka, Bangladesh</td>
                                </tr>
                                <tr>
                                    <th>Payment Method:</th>
                                    <td>{{ $order->payment_method === 1 ? 'COD' : 'ePay' }}</td>
                                    <th>Payment Status:</th>
                                    <td>{{ $order->payment_status === 0 ? 'Pending' : 'Completed' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Products Table -->
        <div class="products-section">
            <h3 class="section-title">Order Details</h3>
            <table class="products-table">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Product Name</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-right">Price</th>
                    </tr>
                </thead>
                <tbody>
                    @php $Qty = 0; @endphp
                    @foreach ($order_details as $key => $item)
                    @php $Qty += $item->quantity; @endphp
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->product->name }}</td>
                        <td class="text-center">{{ $item->quantity }} pcs</td>
                        <td class="text-right">{{ number_format($item->subtotal, 2) }}/-</td>
                    </tr>
                    @endforeach
                    
                    <tr class="total-row">
                        <td colspan="2">Total</td>
                        <td class="text-center">{{ $Qty }} pcs</td>
                        <td class="text-right">{{ number_format($order->amount, 2) }}/-</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <!-- Footer -->
        <div class="receipt-footer">
            <p class="thank-you">Thank you for your purchase!</p>
            <p class="help-text">Want any help? <a href="#!">Please contact us</a></p>
            
            <div class="contact-info">
                <div class="contact-item">
                    <span class="contact-icon phone-icon"></span>
                    <span>+880 ****-*****</span>
                </div>
                <div class="contact-item">
                    <span class="contact-icon email-icon"></span>
                    <span>contact@abeedgloballlc.com</span>
                </div>
                <div class="contact-item">
                    <span class="contact-icon web-icon"></span>
                    <span>https://shop.abeedgloballlc.com/</span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>