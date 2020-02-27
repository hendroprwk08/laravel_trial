@include('../template/header')

Faktur: {{ session()->get( 'faktur' ) }} <br/>
Tanggal: {{ session()->get( 'tanggal' ) }} <br/>
#Customer: {{ session()->get( 'customer' ) }} <br/>

<p><a href="" onclick="window.open('{{ url( 'penjualan/tabel_barang' ) }}', '_blank', 'width=350,height=300,scrollbars=yes,menubar=no,status=yes,resizable=yes,screenx=500,screeny=200'); return false;">Tambah Barang</a></p>

<table border="1" style="border-collapse: collapse">
    <tr>
        <td>ID</td>
        <td>Nama</td>
        <td>Harga</td>
        <td>Qty</td>
        <td>Diskon</td>
        <td>Jumlah</td>
        <td>&nbsp;</td>
    </tr>
    
    <form action="{{ url ( '/penjualan/pilih' ) }}" method="post">
        <input type="hidden" name="_token" value="<?= csrf_token(); ?>"/>
        <tr>
            <td><input type="text" name="id" size="3" readonly /></td>
            <td><input type="text" name="nama" readonly /></td>
            <td><input type="text" name="harga" size="5" readonly /></td>
            <td><input type="text" name="qty" size="3" /></td>
            <td><input type="text" name="diskon" size="5" /></td>
            <td><input type="text" name="jumlah" size="5" /></td>
            <td><input type="submit" name="submit" value="Pilih"></td>
        </tr>
</form>    
</table>

@include('../template/footer')