@include('../template/header')

@foreach( $data as $row )
<form action="{{ url ( '/barang/perbarui' ) }}" method="post">
    {{ csrf_field() }}
    ID: <input type="text" maxlength="3" name="id" value="{{ $row->idbarang }}" readonly="readonly"/></br>
    Nama: <input type="text" name="nama" value="{{ $row->namabarang }}"/></br>
    Hrg Beli: <input type="text" name="beli" value="{{ $row->hargabeli }}"/></br>
    Hrg Jual: <input type="text" name="jual" value="{{ $row->hargajual }}"/></br>
    Stok: <input type="text" name="stok" size="3" value="{{ $row->stok }}"/></br>
    Expired: <input type="text" name="expired" value="{{ $row->expired }}"/></br>
    
    Supplier: <select name="supplier">
        @foreach( $supplier as $s )
            @if ( $s->idsupplier == $row->idsupplier )
                <option value="{{ $s->idsupplier }}" selected>{{ $s->namasupplier }}</option>
            @else
                <option value="{{ $s->idsupplier }}">{{ $s->namasupplier }}</option>
            @endif
        @endforeach
    </select><br/>
    
    <input type="submit" name="submit" value="Perbarui">
</form>
@endforeach

@include('../template/footer')