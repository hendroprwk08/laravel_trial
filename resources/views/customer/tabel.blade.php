@include('../template/header')
<p><a href ="{{ url ( '/customer/form' ) }}">+ Tambah</a></p>

<form action="{{ url( 'customer/cari' ) }}" method="get"/>
    <input type="text" name="cari" value="{{ session()->get( 'cari' ) }}" placeholder="Pencarian..."/>    
    <input type="submit" value="Cari"/>    
</form></br>

<table border ="1"style="border-collapse: collapse">
    <tr>
        <td>ID</td>
        <td>Nama</td>
        <td>Telepon</td>
        <td>&nbsp;</td>
    </tr>

    @foreach( $data as $row )

    <tr>
        <td>{{ $row->idcustomer }}</td>
        <td>{{ $row->namacustomer }}</td>
        <td>{{ $row->telpcustomer }}</td>
        <td>
            <a href="{{ url( 'customer/pilih/'. $row->idcustomer ) }}">Ubah</a>
            <a href="{{ url( 'customer/hapus/'. $row->idcustomer ) }}">Hapus</a>
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
