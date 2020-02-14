<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Barang extends Controller
{
    public function index()
    {
        //$customer = DB::table( 'customer' )->get();
        
        //pake pagination
        $data = DB::table( 'vbarangsupplier' )->paginate(5);
        
        return view( 'barang/tabel', [ 'title' => 'Data Barang', 'data' => $data ]); 
    }
    
    public function cari(Request $request)
    {
        $cari = $request->get('cari');
                
        //pake pagination
        $data = DB::table( 'vbarangsupplier' )
                    ->where( 'namabarang', 'like', "%". $cari ."%" )
                    ->paginate(5);
        
        return view( 'barang/tabel', [ 'title' => 'Data Barang', 'data' => $data ]); 
    }
    
    public function form()
    {
        $data = DB::table( 'supplier' )->get();
       
        return view('barang/form', [ 'title' => 'Input Barang', 'data' => $data ]);
    }
    
    public function simpan(Request $request)
    {
        $data = [ 'idbarang' => $request->input('id'),
                    'namabarang' => $request->input('nama'),
                    'hargabeli' => $request->input('beli'),
                    'hargajual' => $request->input('jual'),
                    'expired' => $request->input('expired'),
                    'stok' => $request->input('stok'),
                    'idsupplier' => $request->input('supplier')];
        
        DB::table( 'barang' )->insert( $data );
        
        return redirect('/barang');
    }
    
    public function pilih( $id )
    {
        //die( $id );
        $data = DB::table( 'barang' )->where( 'idbarang', $id)->get();
        $supplier = DB::table( 'supplier' )->get();
        
        return view( 'barang/edit', [ 'title' => 'Ubah Barang', 'data' => $data, 'supplier' => $supplier ] );
    }
    
    public function perbarui(Request $request)
    {
        $data = [ 'namabarang' => $request->input('nama'),
                    'hargabeli' => $request->input('beli'),
                    'hargajual' => $request->input('jual'),
                    'expired' => $request->input('expired'),
                    'stok' => $request->input('stok'),
                    'idsupplier' => $request->input('supplier')]; 
        
        DB::table( 'barang' )->where( 'idbarang', $request->input('id') )
                                ->update( $data );
        
        return redirect('/barang');
    }
    
    public function hapus( $id )
    {
        DB::table( 'barang' )->where( 'idbarang', $id)->delete();
        
        return redirect('/barang');
    }
}
?>