@include('../template/header')

<form action="{{ url ( '/penjualan/barang' ) }}" method="post">
    <input type="hidden" name="_token" value="<?= csrf_token(); ?>"/>
    Faktur: <input type="text" maxlength="5" name="faktur" value="{{ $faktur }}" readonly /></br>
    Tanggal: <input type="text" name="tanggal" value="{{ $tgl }}"/></br>
    Customer: <select name="customer">
         @foreach( $data as $row )
         <option value="{{ $row->idcustomer }}">{{ $row->namacustomer }}</option>
         @endforeach
    </select><br/>
    <input type="submit" name="submit" value="Tambah Produk">
    <small
</form>

@include('../template/footer')