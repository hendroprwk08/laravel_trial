@include('../template/header')

<form action="{{ url ( '/supplier/simpan' ) }}" method="post">
    <input type="hidden" name="_token" value="<?= csrf_token(); ?>"/>
    ID: <input type="text" maxlength="5" name="id"/></br>
    Nama: <input type="text" name="nama"/></br>
    Alamat: <input type="text" name="alamat"/></br>
    Telepon: <input type="text" name="telepon"/></br>
    Email: <input type="text" name="email"/></br>
    PIC: <input type="text" name="pic"/></br>
    <input type="submit" name="submit" value="Simpan">
</form>

@include('../template/footer')