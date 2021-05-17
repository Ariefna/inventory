@extends('templates.dashboard')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Detail Barang Masuk
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?=URL::to('/');?>/barangmasuk" class="btn btn-sm btn-secondary btn-icon-split">
                            <span class="icon">
                                <i class="fa fa-arrow-left"></i>
                            </span>
                            <span class="text">
                                Kembali
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
            @if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif
<form method = "POST" action="/barangmasuk/approve/update" enctype="multipart/form-data">
            {{ csrf_field() }}
               <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="id_barang_masuk">ID Transaksi Barang Masuk</label>
                    <div class="col-md-4">
                        <input disabled="disabled" value="{{ $barang_masuk[0]->id_barang_masuk }}" type="text"  class="form-control">
                        <input value="{{ $barang_masuk[0]->id_barang_masuk }}" name="id" type="hidden"  class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="tanggal_masuk">Tanggal Masuk</label>
                    <div class="col-md-4">
                        <input disabled="disabled" value="{{date('ymd')}}" name="tanggal_masuk" id="tanggal_masuk" type="text" class="form-control date" placeholder="Tanggal Masuk...">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="supplier_id">Supplier</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <select disabled="disabled" name="supplier_id" id="supplier_id" class="custom-select">
                                <option value="" selected disabled>Pilih Supplier</option>
                                <?php foreach ($supplier as $s) : ?>
                                    <option  value="<?= $s->id_supplier; ?>" <?= $s->id_supplier == $barang_masuk[0]->supplier_id ? 'selected' : ''; ?>><?= $s->nama_supplier; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="input-group-append">
                                <a disabled="disabled" class="btn btn-primary" href="#"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="barang_id">Barang</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <select disabled="disabled" name="barang_id" id="barang_id" class="custom-select">
                                <option value="" selected disabled>Pilih Barang</option>
                                <?php foreach ($barang as $b) : ?>
                                    <option  value="<?= $b->id_barang; ?>" <?= ($barang_masuk[0]->barang_id == $b->id_barang) ? 'selected '.$stok = $b->stok : ''; ?>><?= $b->id_barang; ?> | <?= $b->nama_barang; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="input-group-append">
                                <a disabled="disabled" class="btn btn-primary" href="#"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="stok">Stok</label>
                    <div class="col-md-5">
                        <input readonly="readonly" id="stok" value="<?= $stok?>" type="number" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="jumlah_masuk">Jumlah Masuk</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <input disabled="disabled" value="<?= $barang_masuk[0]->jumlah_masuk; ?>" name="jumlah_masuk" id="jumlah_masuk" type="number" class="form-control" placeholder="Jumlah Masuk...">
                            <div class="input-group-append">
                                <span class="input-group-text" id="satuan">Satuan</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="total_stok">Total Stok</label>
                    <div class="col-md-5">
                        <input disabled="disabled" id="total_stok" value="<?= $stok+$barang_masuk[0]->jumlah_masuk; ?>" type="number" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="total_stok">Upload Gambar</label>
                    <div class="col-md-5">
                    <input type="file" name="filenames" class="form-control">
                     </div>
                </div>
                
                <div class="row form-group">
                    <div class="col offset-md-4">
                        <button type="submit" class="btn btn-primary">Approve</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop