@extends('templates.dashboard')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm mb-4 border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form <?= $title; ?>
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?=URL::to('/');?>/user" class="btn btn-sm btn-secondary btn-icon-split">
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
            <div class="card-body pb-2">
            @if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif
<form method = "POST" action="/user/update">
            {{ csrf_field() }}
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="username">Username</label>
                    <div class="col-md-6">
                        <input value="<?= $user[0]->id_user; ?>" type="hidden" id="id_user" name="id_user" class="form-control" placeholder="id_user">
                        <input value="<?= $user[0]->username; ?>" type="text" id="username" name="username" class="form-control" placeholder="Username">
                    </div>
                </div>
                <hr>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="nama">Nama</label>
                    <div class="col-md-6">
                        <input value="<?= $user[0]->nama; ?>" type="text" id="nama" name="nama" class="form-control" placeholder="Nama">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="email">Email</label>
                    <div class="col-md-6">
                        <input value="<?= $user[0]->email; ?>" type="text" id="email" name="email" class="form-control" placeholder="Email">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="no_telp">Nomor Telepon</label>
                    <div class="col-md-6">
                        <input value="<?= $user[0]->no_telp; ?>" type="text" id="no_telp" name="no_telp" class="form-control" placeholder="Nomor Telepon">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="role">Role</label>
                    <div class="col-md-6">
                        <div class="custom-control custom-radio">
                            <input <?= $user[0]->role == 'admin' ? 'checked' : ''; ?> value="admin" type="radio" id="admin" name="role" class="custom-control-input">
                            <label class="custom-control-label" for="admin">Admin</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input <?= $user[0]->role == 'gudang' ? 'checked' : ''; ?>  value="gudang" type="radio" id="gudang" name="role" class="custom-control-input">
                            <label class="custom-control-label" for="gudang">Gudang</label>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row form-group justify-content-end">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-primary btn-icon-split">
                            <span class="icon"><i class="fa fa-save"></i></span>
                            <span class="text">Simpan</span>
                        </button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop