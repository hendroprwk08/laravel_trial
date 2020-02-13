@include('../template/header')

<form action="{{ url ( '/barang/simpan' ) }}" method="post">
    <input type="hidden" name="_token" value="<?= csrf_token(); ?>"/>
    ID: <input type="text" maxlength="3" name="id"/></br>
    Nama: <input type="text" name="nama"/></br>
    Hrg Beli: <input type="text" name="beli"/></br>
    Hrg Jual: <input type="text" name="jual"/></br>
    Stok: <input type="text" name="stok" size="3"/></br>
    Expired: <input type="text" name="expired" value="{{ date('Y-m-d') }}"/></br>
    
    Supplier: <select name="supplier">
         @foreach( $data as $row )
         <option value="{{ $row->idsupplier }}">{{ $row->namasupplier }}</option>
         @endforeach
    </select><br/>
    
    <input type="submit" name="submit" value="Simpan">
</form>

@include('../template/footer')