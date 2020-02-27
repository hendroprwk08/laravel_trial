<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Penjualan extends Controller
{
    public function index()
    {
        //$customer = DB::table( 'customer' )->get();
        
        //pake pagination
        $data = DB::table( 'vjual' )->paginate(5);
        
        return view( 'penjualan/tabel', [ 'title' => 'Data Penjualan', 'data' => $data ]); 
    }
    
    public function gen_faktur()
    { 
        $query = DB::select( DB::raw ( 'SELECT faktur FROM jual WHERE year(tanggal) = "'. date('Y') .'" AND month(tanggal) = "'. date('m') .'" order by faktur desc limit 1' ) );
        $faktur = json_decode(json_encode($query), true); //konversi ke array
        
        $id = $faktur[0]['faktur'];

        if ( empty($id) )
        {
            $newid = 'FJ'. date('y') .''. date( 'm' ) .'001';
        }
        else
        {
            $id = ((int)substr($id, -3) + 1 );
            $newid = 'FJ'. date('y') .''. date( 'm' ) . sprintf( '%03d', $id );
        }
        
        return $newid;
    }
          
    public function cari(Request $request)
    {
        $cari = $request->cari;
        
        $request->session()->put( 'cari', $cari );
        
        //pake pagination
        $data = DB::table( 'vjual' )
                    ->where( 'namacustomer', 'like', "%". $cari ."%" )
                    ->paginate(5);
        
        return view( 'penjualan/tabel', [ 'title' => 'Data Penjualan', 'data' => $data ]); 
    }
    
    public function form()
    {
        $data = DB::table( 'customer' )->get();
       
        return view('penjualan/form', [ 'title'  => 'Tentukan nomer faktur', 
                                        'faktur' => $this->gen_faktur(),
                                        'tgl'   => date('Y-m-d'),
                                        'data'   => $data ]);
    }
    
    public function barang(Request $request)
    {
        //set session
        session( [ 'faktur' => $request->input('faktur'),
                    'tanggal' => $request->input('tanggal'),
                    'customer' => $request->input('customer') ] );
        
        return view('penjualan/barang', [ 'title'  => 'Pilih Barang' ]);
    }
    
    public function tabel_barang()
    {
        $data = DB::table( 'barang' )->paginate(5);
        
        return view('penjualan/barang_tabel', [ 'title' => 'Data Barang', 'data'  => $data ]);
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