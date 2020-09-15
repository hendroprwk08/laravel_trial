@include('../template/header')

<p><a href ="{{ url ( '/penjualan/form' ) }}">+ Tambah</a></p>

<form action="{{ url( 'penjualan/cari' ) }}" method="get"/>
    <input type="text" name="cari" value="{{ session()->get('cari') }}" placeholder="Pencarian..."/>    
    <input type="submit" value="Cari"/>    
</form></br>

<table border ="1">
    <tr>
        <td>Faktur</td>
        <td>Tanggal</td>
        <td>Customer</td>
        <td>Total</td>
        <td>&nbsp;</td>
    </tr>

    @foreach( $data as $row )

    <tr>
        <td>{{ $row->faktur }}</td>
        <td>{{ $row->tanggal }}</td>
        <td>{{ $row->idcustomer }} - {{ $row->namacustomer }}</td>
        <td>{{ number_format( $row->total ) }}</td>
        <td>
            <a href="{{ url( 'penjualan/pilih/'. $row->faktur ) }}">Ubah</a>
            <a href="{{ url( 'penjualan/hapus/'. $row->faktur ) }}">Hapus</a>
        </td>
    </tr>

    @endforeach
</table>

<p>
Halaman : {{ $data->currentPage() }} <br/>  
Jumlah Data : {{ $data->total() }} <br/>  
Per Halaman : Maksimal {{ $data->perPage() }} Baris <br/> 
<p>

{{ $data->links() }}

@include('../template/footer')
