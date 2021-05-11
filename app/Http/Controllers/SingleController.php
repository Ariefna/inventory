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
        $supplier = DB::table('supplier')->get();
    	return view('supplier/data',['title' => $title,'supplier' => $supplier]);
    }   
	public function barangsatuanview(){
	   $title = "Master Barang Satuan";
	   $satuan = DB::table('satuan')->get();
	   return view('satuan/data',['title' => $title,'satuan' => $satuan]);
   }   
   public function barangjenisview(){
	  $title = "Master Barang Jenis";
	  $jenis = DB::table('jenis')->get();
	  return view('jenis/data',['title' => $title,'jenis' => $jenis]);
  }
  public function barangbarangview(){
	$title = "Master Barang";
	$barang = DB::table('barang')->join('jenis', 'jenis.id_jenis', '=', 'barang.jenis_id')->join('satuan', 'satuan.id_satuan', '=', 'barang.satuan_id')->get();
	return view('barang/data',['title' => $title,'barang' => $barang]);
}

public function barangmasukview(){
	$title = "Master Barang Masuk";
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
	$barangkeluar = DB::table('barang_keluar')
	->join('user', 'barang_keluar.user_id', '=', 'user.id_user')
	->join('barang', 'barang_keluar.barang_id', '=', 'barang.id_barang')
	->join('satuan', 'satuan.id_satuan', '=', 'barang.satuan_id')
	->get();
	return view('barang_keluar/data',['title' => $title,'barangkeluar' => $barangkeluar]);
}
public function laporanview(){
	$title = "List Laporan";
	return view('laporan/form',['title' => $title]);
}
public function profileview(){
	$title = "Profile";
	$user = DB::table('user')->where('id_user', 1)->get();
	return view('profile/user',['title' => $title,'user' => $user]);
}
public function profilesettingview(){
	$title = "Profile";
	$user = DB::table('user')->where('id_user', 1)->get();
	return view('profile/setting',['title' => $title,'user' => $user]);
}
public function profileubahpasswordview(){
	$title = "Profile";
	$user = DB::table('user')->where('id_user', 1)->get();
	return view('profile/ubahpassword',['title' => $title,'user' => $user]);
}
public function userview(){
	$title = "User";
	$user = DB::table('user')->get();
	return view('user/data',['title' => $title,'users' => $user]);
}
public function usereditview($id){
	$title = "Profile";
	$user = DB::table('user')->where('id_user', $id)->get();
	return view('user/edit',['title' => $title,'user' => $user]);
}

public function useraddview(){
	$title = "Profile";
	return view('user/add',['title' => $title]);
}





// edit view
public function supplieredit($id){
	$title = "Master Supplier Edit";
	$supplier = DB::table('supplier')->where('id_supplier', $id)->get();
	return view('supplier/edit',['title' => $title,'supplier' => $supplier]);
}
public function satuanedit($id){
	$title = "Master Satuan Edit";
	$satuan = DB::table('satuan')->where('id_satuan', $id)->get();
	return view('satuan/edit',['title' => $title,'satuan' => $satuan]);
}
public function jenisedit($id){
	$title = "Master Janis Edit";
	$jenis = DB::table('jenis')->where('id_jenis', $id)->get();
	return view('jenis/edit',['title' => $title,'jenis' => $jenis]);
}
public function barangedit($id){
	$title = "Master Barang Edit";
	$barang = DB::table('barang')->where('id_barang', $id)->get();
	$jenis = DB::table('jenis')->get();
	$satuan = DB::table('satuan')->get();
	return view('barang/edit',['title' => $title,'barang' => $barang,'jenis' => $jenis,'satuan' => $satuan]);
}
// insert
public function supplierinsert(Request $request){
	$nama_supplier = $request->input('nama_supplier');
	$no_telp = $request->input('no_telp');
	$alamat = $request->input('alamat');
	DB::table('supplier')->insert(
		['nama_supplier' => $nama_supplier, 'no_telp' => $no_telp, 'alamat' => $alamat]
	);
	return redirect()->back()->with('success', 'Data Anda Berhasil Dimasukkan'); 
}   
public function barangsatuaninsert(Request $request){
	$nama_satuan = $request->input('nama_satuan');
	DB::table('satuan')->insert(
		['nama_satuan' => $nama_satuan]
	);
	return redirect()->back()->with('success', 'Data Anda Berhasil Dimasukkan'); 
}   
public function barangjenisinsert(Request $request){
	$nama_jenis = $request->input('nama_jenis');
	DB::table('jenis')->insert(
		['nama_jenis' => $nama_jenis]
	);
	return redirect()->back()->with('success', 'Data Anda Berhasil Dimasukkan'); 
}
public function barangbaranginsert(Request $request){
	$id_barang = $request->input('id_barang');
	$nama_barang = $request->input('nama_barang');
	$stok = 0;
	$satuan_id = $request->input('satuan_id');
	$jenis_id = $request->input('jenis_id');
	DB::table('barang')->insert(
		['id_barang' => $id_barang, 
		'nama_barang' => $nama_barang, 
		'stok' => $stok, 
		'satuan_id' => $satuan_id, 
		'jenis_id' => $jenis_id
		]
	);
	return redirect()->back()->with('success', 'Data Anda Berhasil Dimasukkan'); 
}
public function barangmasukinsert(Request $request){
	$id_barang_masuk = $request->input('id_barang_masuk');
	$supplier_id = $request->input('supplier_id');
	$user_id = $request->input('user_id');
	$barang_id = $request->input('barang_id');
	$jumlah_masuk = $request->input('jumlah_masuk');
	$tanggal_masuk = $request->input('tanggal_masuk');
	DB::table('barang_masuk')->insert(
		['id_barang_masuk' => $id_barang_masuk, 
		'supplier_id' => $supplier_id, 
		'user_id' => $user_id, 
		'barang_id' => $barang_id, 
		'jumlah_masuk' => $jumlah_masuk, 
		'tanggal_masuk' => $tanggal_masuk
		]
	);
	return redirect()->back()->with('success', 'Data Anda Berhasil Dimasukkan'); 
}
public function barangkeluarinsert(Request $request){
	$id_barang_keluar = $request->input('id_barang_keluar');
	$user_id = $request->input('user_id');
	$barang_id = $request->input('barang_id');
	$jumlah_keluar = $request->input('jumlah_keluar');
	$tanggal_keluar = $request->input('tanggal_keluar');
	DB::table('barang_keluar')->insert(
		['id_barang_keluar' => $id_barang_keluar, 
		'barang_id' => $barang_id, 
		'jumlah_keluar' => $jumlah_keluar, 
		'tanggal_keluar' => $tanggal_keluar
		]
	);
	return redirect()->back()->with('success', 'Data Anda Berhasil Dimasukkan'); 
}
//update
public function supplierupdate(Request $request){
	$id_supplier = $request->input('id_supplier');
	$nama_supplier = $request->input('nama_supplier');
	$no_telp = $request->input('no_telp');
	$alamat = $request->input('alamat');
	DB::table('supplier')
	->where('id_supplier', $id_supplier)
	->update(
		['nama_supplier' => $nama_supplier, 'no_telp' => $no_telp, 'alamat' => $alamat]
	);
	return redirect()->back()->with('success', 'Data Anda Berhasil Diubah'); 
}   
public function barangsatuanupdate(Request $request){
	$id_satuan = $request->input('id_satuan');
	$nama_satuan = $request->input('nama_satuan');
	DB::table('supplier')
	->where('id_satuan', $id_satuan)
	->update(
		['nama_satuan' => $nama_satuan]
	);
	return redirect()->back()->with('success', 'Data Anda Berhasil Diubah'); 
}   
public function barangjenisupdate(Request $request){
	$id_jenis = $request->input('id_jenis');
	$nama_jenis = $request->input('nama_jenis');
	DB::table('jenis')
	->where('id_jenis', $id_jenis)
	->update(
		['nama_jenis' => $nama_jenis]
	);
	return redirect()->back()->with('success', 'Data Anda Berhasil Diubah'); 
}
public function barangbarangupdate(Request $request){
	$id_barang = $request->input('id_barang');
	$nama_barang = $request->input('nama_barang');
	$stok = $request->input('stok');
	$satuan_id = $request->input('satuan_id');
	$jenis_id = $request->input('jenis_id');
	DB::table('barang')
	->where('id_barang', $id_barang)
	->update(
		[
		'nama_barang' => $nama_barang, 
		'stok' => $stok, 
		'satuan_id' => $satuan_id, 
		'jenis_id' => $jenis_id
		]
	);
	return redirect()->back()->with('success', 'Data Anda Berhasil Diubah'); 
}

// insert view
public function supplierinsertview(){
	$title = "Tambah Data Supplier";
	return view('supplier/add',['title' => $title]);
}   
public function barangsatuaninsertview(){
	$title = "Tambah Data Barang Satuan";
   return view('satuan/add',['title' => $title]);
}   
public function barangjenisinsertview(){
	$title = "Tambah Data Barang Jenis";
  return view('jenis/add',['title' => $title]);
}
public function barangbaranginsertview(){
	$jenis = DB::table('jenis')->get();
	$satuan = DB::table('satuan')->get();

	$kode_terakhir = DB::table('barang')->max('id_barang');
	$kode_tambah = substr($kode_terakhir, -6, 6);
	$kode_tambah++;
	$number = str_pad($kode_tambah, 6, '0', STR_PAD_LEFT);
	$id_barang = 'B' . $number;
	$title = "Tambah Data Barang";
return view('barang/add',['title' => $title,'jenis' => $jenis,'satuan' => $satuan,'id_barang' => $id_barang]);
}
public function barangmasukinsertview(){
	$kode = 'T-BM-' . date('ymd');
            $kode_terakhir = DB::table('barang_masuk')->where('id_barang_masuk', 'like', '"%'.$kode.'%"')->max('id_barang_masuk');
			DB::table('barang')->max('id_barang');
            $kode_tambah = substr($kode_terakhir, -5, 5);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 5, '0', STR_PAD_LEFT);
            $id_barang_masuk = $kode . $number;
	$supplier = DB::table('supplier')->get();
	$barang = DB::table('barang')->get();
	$satuan = DB::table('satuan')->get();
	$title = "Tambah Data Barang Masuk";
return view('barang_masuk/add',['title' => $title, 'supplier' => $supplier, 'barang' => $barang, 'id_barang_masuk' => $id_barang_masuk]);
}

public function barangmasukinsertviewdua($id){
	$kode = 'T-BM-' . date('ymd');
            $kode_terakhir = DB::table('barang_masuk')->where('id_barang_masuk', 'like', '"%'.$kode.'%"')->max('id_barang_masuk');
			DB::table('barang')->max('id_barang');
            $kode_tambah = substr($kode_terakhir, -5, 5);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 5, '0', STR_PAD_LEFT);
            $id_barang_masuk = $kode . $number;
	$supplier = DB::table('supplier')->get();
	$barang = DB::table('barang')->get();
	$satuan = DB::table('satuan')->get();
	$title = "Tambah Data Barang Masuk";
return view('barang_masuk/add2',['title' => $title, 'supplier' => $supplier, 'barang' => $barang, 'id_barang_masuk' => $id_barang_masuk, 'id' => $id]);
}

public function barangkeluarinsertview(){
	$kode = 'T-BK-' . date('ymd');
            $kode_terakhir = DB::table('barang_keluar')->where('id_barang_keluar', 'like', '"%'.$kode.'%"')->max('id_barang_keluar');
			DB::table('barang')->max('id_barang');
            $kode_tambah = substr($kode_terakhir, -5, 5);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 5, '0', STR_PAD_LEFT);
            $id_barang_keluar = $kode . $number;
	$barang = DB::table('barang')->get();
	$title = "Tambah Data Barang Keluar";
return view('barang_keluar/add',['title' => $title, 'barang' => $barang, 'id_barang_keluar' => $id_barang_keluar]);
}

// delete
public function supplierdelete($id){
	$id_supplier = $id;
	DB::table('supplier')->where('id_supplier', '=', $id_supplier)->delete();
	return redirect()->back()->with('success', 'Data Anda Berhasil Dihapus'); 
}   
public function satuandelete($id){
	$id_satuan = $id;
	DB::table('satuan')->where('id_satuan', '=', $id_satuan)->delete();
	return redirect()->back()->with('success', 'Data Anda Berhasil Dihapus'); 
}   
public function jenisdelete($id){
	$nama_jenis = $id;
	DB::table('jenis')->where('id_jenis', '=', $nama_jenis)->delete();
	return redirect()->back()->with('success', 'Data Anda Berhasil Dihapus'); 
}
public function barangbarangdelete($id){
	$id_barang = $id;
	DB::table('barang')->where('id_barang', '=', $id_barang)->delete();
	return redirect()->back()->with('success', 'Data Anda Berhasil Dihapus'); 
}
public function barangmasukdelete($id){
	$id_barang_masuk = $id;
	DB::table('barang_masuk')->where('id_barang', '=', $id_barang)->delete();
	return redirect()->back()->with('success', 'Data Anda Berhasil Dihapus'); 
}
public function barangkeluardelete($id){
	$id_barang_keluar = $id;
	DB::table('barang_keluar')->where('id_barang_keluar', '=', $id_barang_keluar)->delete();
	return redirect()->back()->with('success', 'Data Anda Berhasil Dihapus'); 
}
}