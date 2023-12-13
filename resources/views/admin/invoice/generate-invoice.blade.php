<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>My Invoices</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">

    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/admin/fonts/font-awesome/css/font-awesome.min.css') }}">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{ asset('assets/admin/images/favicon.ico') }}" type="image/x-icon">

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/admin/css/style-invoice.css') }}">
</head>

<body>

    <!-- Invoice 2 start -->
    <div class="invoice-2 invoice-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="invoice-inner clearfix">
                        <div class="invoice-info clearfix" id="invoice_wrapper">
                            <div class="invoice-headar">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- logo started -->
                                        <div class="invoice-2 inv-header-1" style="padding: 40px; background: white">
                                            Fruitables
                                        </div>
                                        <!-- logo ended -->
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="invoice-id">
                                            <div class="info">
                                                <h1 class="inv-header-1">Invoice</h1>
                                                <p class="mb-1">Invoice No: <span>{{ $order->tracking_no }}</span></p>
                                                <p class="mb-0">Invoice Date:
                                                    <span>{{ $order->created_at->format('d-m-Y h:i A') }}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-top">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="invoice-number mb-30">
                                            <h4 class="inv-title-1">Order Details</h4>
                                            <h2 class="name">Fruitables</h2>
                                            <p class="invo-addr-1">
                                                Order ID : {{ $order->id }} <br />
                                                Tracking No: {{ $order->tracking_no }} <br />
                                                Payment: {{ $order->payment_mode }} <br />
                                                Status: {{ $order->status_message }} <br />
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="invoice-number mb-30">
                                            <div class="invoice-number-inner">
                                                <h4 class="inv-title-1">User Details</h4>
                                                <h2 class="name">{{ $order->fullname }}</h2>
                                                <p class="invo-addr-1">
                                                    Address: {{ $order->address }} <br />
                                                    Phone: {{ $order->phone }} <br />
                                                    Email: {{ $order->email }} <br />
                                                    Postcode: {{ $order->postcode }} <br />
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-center">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-striped invoice-table">
                                        <thead class="bg-active">
                                            <tr class="tr">
                                                <th>No.</th>
                                                <th class="pl0 text-start">Item Description</th>
                                                <th class="text-center">Price</th>
                                                <th class="text-center">Quantity</th>
                                                <th class="text-end">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $totalPrice = 0;
                                            @endphp
                                            @foreach ($order->orderItem as $item)
                                                <tr class="tr">
                                                    <td>
                                                        <div class="item-desc-1">
                                                            <span>{{ $item->id }}</span>
                                                        </div>
                                                    </td>
                                                    <td class="pl0">{{ $item->product->name }}</td>
                                                    <td class="text-center">
                                                        ${{ number_format($item->product->selling_price) }}</td>
                                                    <td class="text-center">{{ $item->quantity }}</td>

                                                    <td class="text-end">
                                                        ${{ number_format($item->product->selling_price * $item->quantity) }}
                                                    </td>
                                                </tr>
                                                @php
                                                    $totalPrice += $item->quantity * $item->price;
                                                    $totalPriceVAT = $totalPrice * 1.1;
                                                @endphp
                                            @endforeach
                                            <tr class="tr2">
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-center">SubTotal</td>
                                                <td class="text-end">${{ number_format($totalPrice) }}</td>
                                            </tr>
                                            <tr class="tr2">
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-center">Tax</td>
                                                <td class="text-end">10%</td>
                                            </tr>
                                            <tr class="tr2">
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-center f-w-600 active-color">Grand Total</td>
                                                <td class="f-w-600 text-end active-color">${{ number_format($totalPriceVAT) }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="invoice-bottom">
                                <div class="row">
                                    <div class="col-lg-6 col-md-5 col-sm-5">
                                        <div class="payment-method mb-30">
                                            <h3 class="inv-title-1">Payment Method</h3>
                                            <ul class="payment-method-list-1 text-14">
                                                <li><strong>Payment way:</strong> {{$order->payment_mode}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-contact clearfix">
                                <div class="row g-0">
                                    <div class="col-sm-12">
                                        <div class="contact-info clearfix">
                                            <a href="tel:+55-4XX-634-7071" class="d-flex"><i class="fa fa-phone"></i>
                                                0933 584 722</a>
                                            <a href="tel:info@themevessel.com" class="d-flex"><i
                                                    class="fa fa-envelope"></i> fruitables@gmail.com</a>
                                            <a href="tel:info@themevessel.com" class="mr-0 d-flex d-none-580"><i
                                                    class="fa fa-map-marker"></i> 123/12 Cong Hoa Street, Tan Binh District, HCM City</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-btn-section clearfix d-print-none">
                            <a href="javascript:window.print()" class="btn btn-lg btn-print">
                                <i class="fa fa-print"></i> Print Invoice
                            </a>
                            <a id="invoice_download_btn" class="btn btn-lg btn-download btn-theme">
                                <i class="fa fa-download"></i> Download Invoice
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Invoice 2 end -->

    <script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/jspdf.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/html2canvas.js') }}"></script>
    <script src="{{ asset('assets/admin/js/app.js') }}"></script>
</body>

</html>
