@include('../template/header')

<form action="{{ url ( '/penjualan/tambah_barang' ) }}" method="post">
    <input type="hidden" name="_token" value="<?= csrf_token(); ?>"/>
    Faktur: <input type="text" maxlength="5" name="faktur"/></br>
    Tanggal: <input type="text" name="tanggal"/></br>
    Customer: <select name="supplier">
         @foreach( $data as $row )
         <option value="{{ $row->idcustomer }}">{{ $row->namacustomer }}</option>
         @endforeach
    </select><br/>
    <input type="submit" name="submit" value="Simpan">
</form>

@include('../template/footer')