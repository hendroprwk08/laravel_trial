@include('../template/header')

<form action="{{ url ( '/customer/simpan' ) }}" method="post">
    <input type="hidden" name="_token" value="<?= csrf_token(); ?>"/>
    ID: <input type="text" maxlength="5" name="id"/></br>
    Nama: <input type="text" name="nama"/></br>
    Telepon: <input type="text" name="telepon"/></br>
    <input type="submit" name="submit" value="Simpan">
</form>

@include('../template/footer')