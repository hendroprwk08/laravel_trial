@include('../template/header')

@foreach( $data as $row )
<form action="{{ url ( '/customer/perbarui' ) }}" method="post">
    {{ csrf_field() }}
    ID: <input type="text" maxlength="5" name="id" value="{{ $row->idcustomer }}" readonly="readonly"/></br>
    Nama: <input type="text" name="nama" value="{{ $row->namacustomer }}"/></br>
    Telepon: <input type="text" name="telepon" value="{{ $row->telpcustomer }}"/></br>
    <input type="submit" name="submit" value="Simpan">
</form>
@endforeach

@include('../template/footer')