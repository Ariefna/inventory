@extends('templates.dashboard')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Edit Satuan
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?=URL::to('/');?>/satuan" class="btn btn-sm btn-secondary btn-icon-split">
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
@if (\Session::has('failed'))
    <div class="alert alert-danger">
        <ul>
            <li>{!! \Session::get('failed') !!}</li>
        </ul>
    </div>
@endif
<form method = "POST" action="/satuan/update">
            {{ csrf_field() }}
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="nama_satuan">Nama Satuan</label>
                    <div class="col-md-9">
                        <input value="<?= $satuan[0]->id_satuan; ?>" name="id_satuan" id="id_satuan" type="hidden" class="form-control" placeholder="id_satuan...">
                        <input value="<?= $satuan[0]->nama_satuan; ?>" name="nama_satuan" id="nama_satuan" type="text" class="form-control" placeholder="Nama Satuan...">
                       
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-9 offset-md-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop