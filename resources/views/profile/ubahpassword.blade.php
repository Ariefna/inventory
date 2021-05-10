@extends('templates.dashboard')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Form Ubah Password
                </h4>
            </div>
            <div class="card-body">
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="password_lama">Password Lama</label>
                    <div class="col-md-9">
                        <input value="" name="password_lama" id="password_lama" type="password" class="form-control" placeholder="Password Lama...">
                    </div>
                </div>
                <hr>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="password_baru">Password Baru</label>
                    <div class="col-md-9">
                        <input value="" name="password_baru" id="password_baru" type="password" class="form-control" placeholder="Password Baru...">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="konfirmasi_password">Konfirmasi Password</label>
                    <div class="col-md-9">
                        <input value="" name="konfirmasi_password" id="konfirmasi_password" type="password" class="form-control" placeholder="Konfirmasi Password...">
                      
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-9 offset-md-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop