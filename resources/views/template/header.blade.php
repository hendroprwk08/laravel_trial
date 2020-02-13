<!doctype html>
<html>
    <title>{{ $title  }}</title>
    <head>
        <style type="text/css">
            body{
                margin: 0px;
                padding: 0px;
            }
            
            .pagination li{
                display: inline-block;
                list-style-type: none;
                margin: 5px;
            }
            
            .footer{
                margin-top: 50px
            }
        </style>
    </head>
    <p style="background-color: #fafafa; padding: 10px; margin-top: 0px">
        <b>Menu :</b>&nbsp;&nbsp;
        <a href="{{ url( 'supplier' )}}" > Supplier</a>&nbsp;&nbsp;
        <a href="{{ url( 'customer' )}}" > Customer</a>&nbsp;&nbsp;
        <a href="{{ url( 'barang' )}}" > Barang</a>&nbsp;&nbsp;
        <a href="{{ url( 'penjualan' )}}" > Penjualan</a>
    </p>
    <body>

