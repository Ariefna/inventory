<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class singlecontroller extends Controller
{
    public function index(){
    	$title = "User Management";
    	$barang = DB::table('barang')->count();
    	$supplier = DB::table('barang')->count();
    	$stok = DB::table('barang')->count();
    	$user = DB::table('barang')->count();
        $barang_min = DB::table('barang')->get();
        $barang_masuk = DB::table('barang_masuk')->join('barang', 'barang.id_barang', '=', 'barang_masuk.barang_id')->get();
        $barang_keluar = DB::table('barang_keluar')->join('barang', 'barang.id_barang', '=', 'barang_keluar.barang_id')->get();
    	return view('dashboard',['title' => $title, 'barang' => $barang, 'supplier' => $supplier, 'stok' => $stok, 'user' => $user, 'barang_min' => $barang_min, 'barang_masuk' => $barang_masuk, 'barang_keluar' => $barang_keluar]);
    }
    public function supplierview(){
    	$title = "Master Supplier";
    	// $barang = 1;
    	// $supplier = 1;
    	// $stok = 1;
    	// $user = 1;
        // $barang_min = DB::table('barang')->get();
        // $barang_masuk = DB::table('barang_masuk')->join('barang', 'barang.id_barang', '=', 'barang_masuk.barang_id')->get();
        $supplier = DB::table('supplier')->get();
    	return view('supplier/data',['title' => $title,'supplier' => $supplier]);
    }   
	public function barangsatuanview(){
	   $title = "Master Barang Satuan";
	   // $barang = 1;
	   // $supplier = 1;
	   // $stok = 1;
	   // $user = 1;
	   // $barang_min = DB::table('barang')->get();
	   // $barang_masuk = DB::table('barang_masuk')->join('barang', 'barang.id_barang', '=', 'barang_masuk.barang_id')->get();
	   $satuan = DB::table('satuan')->get();
	   return view('satuan/data',['title' => $title,'satuan' => $satuan]);
   }   
   public function barangjenisview(){
	  $title = "Master Barang Jenis";
	  // $barang = 1;
	  // $supplier = 1;
	  // $stok = 1;
	  // $user = 1;
	  // $barang_min = DB::table('barang')->get();
	  // $barang_masuk = DB::table('barang_masuk')->join('barang', 'barang.id_barang', '=', 'barang_masuk.barang_id')->get();
	  $jenis = DB::table('jenis')->get();
	  return view('jenis/data',['title' => $title,'jenis' => $jenis]);
  }
  public function barangbarangview(){
	$title = "Master Barang";
	// $barang = 1;
	// $supplier = 1;
	// $stok = 1;
	// $user = 1;
	// $barang_min = DB::table('barang')->get();
	// $barang_masuk = DB::table('barang_masuk')->join('barang', 'barang.id_barang', '=', 'barang_masuk.barang_id')->get();
	$barang = DB::table('barang')->join('jenis', 'jenis.id_jenis', '=', 'barang.jenis_id')->join('satuan', 'satuan.id_satuan', '=', 'barang.satuan_id')->get();
	return view('barang/data',['title' => $title,'barang' => $barang]);
}

public function barangmasukview(){
	$title = "Master Barang Masuk";
	// $barang = 1;
	// $supplier = 1;
	// $stok = 1;
	// $user = 1;
	// $barang_min = DB::table('barang')->get();
	// $barang_masuk = DB::table('barang_masuk')->join('barang', 'barang.id_barang', '=', 'barang_masuk.barang_id')->get();

	$barangmasuk = DB::table('barang_masuk')
	->join('user', 'barang_masuk.user_id', '=', 'user.id_user')
	->join('supplier', 'barang_masuk.supplier_id', '=', 'supplier.id_supplier')
	->join('barang', 'barang_masuk.barang_id', '=', 'barang.id_barang')
	->join('satuan', 'satuan.id_satuan', '=', 'barang.satuan_id')
	->get();
	return view('barang_masuk/data',['title' => $title,'barangmasuk' => $barangmasuk]);
}
public function barangkeluarview(){
	$title = "Master Barang Keluar";
	// $barang = 1;
	// $supplier = 1;
	// $stok = 1;
	// $user = 1;
	// $barang_min = DB::table('barang')->get();
	// $barang_masuk = DB::table('barang_masuk')->join('barang', 'barang.id_barang', '=', 'barang_masuk.barang_id')->get();
	$barangkeluar = DB::table('barang_keluar')
	->join('user', 'barang_keluar.user_id', '=', 'user.id_user')
	->join('barang', 'barang_keluar.barang_id', '=', 'barang.id_barang')
	->join('satuan', 'satuan.id_satuan', '=', 'barang.satuan_id')
	->get();
	return view('barang_keluar/data',['title' => $title,'barangkeluar' => $barangkeluar]);
}
public function laporanview(){
	$title = "List Laporan";
	// $barang = 1;
	// $supplier = 1;
	// $stok = 1;
	// $user = 1;
	// $barang_min = DB::table('barang')->get();
	// $barang_masuk = DB::table('barang_masuk')->join('barang', 'barang.id_barang', '=', 'barang_masuk.barang_id')->get();
	// $barangkeluar = DB::table('barang_keluar')
	// ->join('user', 'barang_keluar.user_id', '=', 'user.id_user')
	// ->join('barang', 'barang_keluar.barang_id', '=', 'barang.id_barang')
	// ->join('satuan', 'satuan.id_satuan', '=', 'barang.satuan_id')
	// ->get();
	return view('laporan/form',['title' => $title]);
}
}