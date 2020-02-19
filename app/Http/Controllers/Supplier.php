<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Supplier extends Controller
{
    public function index()
    {
        //$customer = DB::table( 'customer' )->get();
        
       //pake pagination
        $data = DB::table( 'supplier' )->paginate(5);
        
        return view( 'supplier/tabel', [ 'title' => 'Data Supplier', 'data' => $data ]); 
    }
    
    public function cari( Request $request )
    {
        $cari = $request->get('cari');
        
        $request->session()->put( 'cari', $cari );
         
        //pake pagination
        $data = DB::table( 'supplier' )
                    ->where( 'namasupplier', 'like', "%". $cari ."%" )
                    ->paginate(5);
        
        return view( 'supplier/tabel', [ 'title' => 'Data Supplier', 'data' => $data ]); 
    }
    
    public function form()
    {
        return view('supplier/form', [ 'title' => 'Input Supplier' ]);
    }
    
    public function simpan(Request $request)
    {
        $data = [ 'idsupplier' => $request->input('id'),
                    'namasupplier' => $request->input('nama'),
                    'alamatsupplier' => $request->input('alamat'),
                    'emailsupplier' => $request->input('email'),
                    'picsupplier' => $request->input('pic'),
                    'telpsupplier' => $request->input('telepon')];
        
        DB::table( 'supplier' )->insert( $data );
        
        return redirect('/supplier');
    }
    
    public function pilih( $id )
    {
        $data = DB::table( 'supplier' )->where( 'idsupplier', $id)->get();
        
        return view( 'supplier/edit', [ 'title' => 'Ubah Supplier', 'data' => $data ] );
    }
    
    public function perbarui(Request $request)
    {
       
        $data = [ 'namasupplier' => $request->input('nama'),
                    'alamatsupplier' => $request->input('alamat'),
                    'emailsupplier' => $request->input('email'),
                    'picsupplier' => $request->input('pic'),
                    'telpsupplier' => $request->input('telepon')];

        DB::table( 'supplier' )->where( 'idsupplier', $request->input('id') )
                                ->update( $data );
        
        return redirect('/supplier');
    }
    
    public function hapus( $id )
    {
        DB::table( 'supplier' )->where( 'idsupplier', $id)->delete();
        
        return redirect('/supplier');
    }
}
?>