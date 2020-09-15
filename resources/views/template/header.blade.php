<!doctype html>
<html>
    <title>{{ $title  }}</title>
    <head>
        <link href="{{ asset('css/my_style.css') }}" rel="stylesheet">
    </head>
    <p style="background-color: #fafafa; padding: 10px; margin-top: 0px">
        <b>Menu :</b>&nbsp;&nbsp;
        <a href="{{ url( 'supplier' )}}" > Supplier</a>&nbsp;&nbsp;
        <a href="{{ url( 'customer' )}}" > Customer</a>&nbsp;&nbsp;
        <a href="{{ url( 'barang' )}}" > Barang</a>&nbsp;&nbsp;
        <a href="{{ url( 'penjualan' )}}" > Penjualan</a>
    </p>
    <body>

