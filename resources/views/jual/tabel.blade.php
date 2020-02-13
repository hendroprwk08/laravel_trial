@include('../template/header')
<p><a href ="{{ url ( '/barang/form' ) }}">+ Tambah</a></p>
<table border ="1"style="border-collapse: collapse">
    <tr>
        <td>ID</td>
        <td>Nama</td>
        <td>Harga Beli</td>
        <td>Harga Jual</td>
        <td>Stok</td>
        <td>Expire</td>
        <td>Supplier</td>
        <td>&nbsp;</td>
    </tr>

    @foreach( $data as $row )

    <tr>
        <td>{{ $row->idbarang }}</td>
        <td>{{ $row->namabarang }}</td>
        <td>{{ $row->hargabeli  }}</td>
        <td>{{ $row->hargajual  }}</td>
        <td>{{ $row->stok  }}</td>
        <td>{{ substr( $row->expired, 0, 10 ) }}</td>
        <td>{{ $row->idsupplier }} - {{ $row->namasupplier }} </td>
        <td>
            <a href="{{ url( 'barang/pilih/'. $row->idbarang) }}">Ubah</a>
            <a href="{{ url( 'barang/hapus/'. $row->idbarang ) }}">Hapus</a>
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
