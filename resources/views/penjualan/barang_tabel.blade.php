<html>
    <title>Data Barang</title>
    <head>
        <style type="text/css">
            body{
                margin: 5px;
                padding: 5px;
            }
            
            .pagination li{
                display: inline-block;
                list-style-type: none;
                margin: 5px;
            }
            
            .footer{
                margin-top: 50px
            }
        </style>
    </head>

    <table border="1" style="border-collapse: collapse">
    <tr>
        <td>ID</td>
        <td>Nama</td>
        <td>Harga</td>
        <td>&nbsp;</td>
    </tr>
    
     <?php foreach ( $data as $row ): ?>
        
    <tr>
            <td>{{ $row->idbarang }}</td>
            <td>{{ $row->namabarang }}</td>
            <td>{{ number_format( $row->hargajual ) }}</td>
            <td><a href='' onclick = 'return select_item( "{{ $row->idbarang }}", "{{ $row->namabarang }}", "{{ $row->hargajual }}" )'>Pilih</a></td>
        </tr> 
        
    <?php endforeach; ?>        
        
</table>

{{ $data->links() }}

<script>
    function select_item( id, nama, harga )
    {
        window.opener.document.getElementsByName('id')[0].value = id;
        window.opener.document.getElementsByName('nama')[0].value = nama;
        window.opener.document.getElementsByName('harga')[0].value = harga;
        window.opener.hitung();
        top.close();
        return false;
    }
</script>

</body>
</html>