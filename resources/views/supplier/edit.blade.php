@include('../template/header')

@foreach( $data as $row )
<form action="{{ url ( '/supplier/perbarui' ) }}" method="post">
    {{ csrf_field() }}
    ID: <input type="text" maxlength="5" name="id" value="{{ $row->idsupplier }}" readonly="readonly"/></br>
    Nama: <input type="text" name="nama" value="{{ $row->namasupplier }}" /></br>
    Alamat: <input type="text" name="alamat" value="{{ $row->alamatsupplier }}" /></br>
    Telepon: <input type="text" name="telepon" value="{{ $row->telpsupplier }}" /></br>
    Email: <input type="text" name="email" value="{{ $row->emailsupplier }}" /></br>
    PIC: <input type="text" name="pic" value="{{ $row->picsupplier }}" /></br>
    <input type="submit" name="submit" value="Perbarui">
</form>
@endforeach

@include('../template/footer')