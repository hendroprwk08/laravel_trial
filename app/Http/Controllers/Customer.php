<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Customer extends Controller
{
    public function index()
    {
        //$customer = DB::table( 'customer' )->get();
        
       //pake pagination
        $data = DB::table( 'customer' )->paginate(5);
        
        return view( 'customer/tabel', [ 'title' => 'Data Customer', 'data' => $data ]); 
    }
    
    public function cari( Request $request )
    {
        $cari = $request->get('cari');
     
        $request->session()->put( 'cari', $cari );
         
       //pake pagination
        $data = DB::table( 'customer' )
                    ->where( 'namacustomer', 'like', "%". $cari ."%" )
                    ->paginate(5);
        
        return view( 'customer/tabel', [ 'title' => 'Data Supplier', 'data' => $data ]); 
    }
    
    public function form()
    {
        return view('customer/form', [ 'title' => 'Input Customer' ]);
    }
    
    public function simpan(Request $request)
    {
        $data = [ 'idcustomer' => $request->input('id'),
                    'namacustomer' => $request->input('nama'),
                    'telpcustomer' => $request->input('telepon')];
        
        DB::table( 'customer' )->insert( $data );
        
        return redirect('/customer');
    }
    
    public function pilih( $id )
    {
        //die( $id );
        $data = DB::table( 'customer' )->where( 'idcustomer', $id)->get();
        
        return view( 'customer/edit', [ 'title' => 'Ubah Customer', 'data' => $data ] );
    }
    
    public function perbarui(Request $request)
    {
        $data = [ 'namacustomer' => $request->input('nama'),
                    'telpcustomer' => $request->input('telepon')];
        
        DB::table( 'customer' )->where( 'idcustomer', $request->input('id') )
                                ->update( $data );
        
        return redirect('/customer');
    }
    
    public function hapus( $id )
    {
        DB::table( 'customer' )->where( 'idcustomer', $id)->delete();
        
        return redirect('/customer');
    }
}
?>