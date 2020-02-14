@include('../template/header')
<p><a href ="{{ url ( '/supplier/form' ) }}">+ Tambah</a></p>

<form action="{{ url( 'supplier/cari' ) }}" method="get"/>
    <input type="text" name="cari" value="{{ old('cari') }}" placeholder="Pencarian..."/>    
    <input type="submit" value="Cari"/>    
</form></br>

<table border ="1"style="border-collapse: collapse">
    <tr>
        <td>ID</td>
        <td>Nama</td>
        <td>Alamat</td>
        <td>Telepon</td>
        <td>Email</td>
        <td>PIC</td>
        <td>&nbsp;</td>
    </tr>

    @foreach( $data as $row )

    <tr>
        <td>{{ $row->idsupplier  }}</td>
        <td>{{ $row->namasupplier  }}</td>
        <td>{{ $row->alamatsupplier  }}</td>
        <td>{{ $row->telpsupplier  }}</td>
        <td>{{ $row->emailsupplier  }}</td>
        <td>{{ $row->picsupplier }}</td>
        <td>
            <a href="{{ url( 'supplier/pilih/'. $row->idsupplier) }}">Ubah</a>
            <a href="{{ url( 'supplier/hapus/'. $row->idsupplier ) }}">Hapus</a>
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
