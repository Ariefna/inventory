@extends('templates.dashboard')
@section('content')
<div class="card p-2 shadow-sm border-bottom-primary">
    <div class="card-header bg-white">
        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
            <?= $user[0]->nama; ?>
        </h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-2 mb-4 mb-md-0">
                <img src="<?=URL::to('/');?>/img/avatar/<?= $user[0]->foto; ?>" alt="" class="img-thumbnail rounded mb-2">
                <a href="<?=URL::to('/');?>/profile/setting" class="btn btn-sm btn-block btn-primary"><i class="fa fa-edit"></i> Edit Profile</a>
                <a href="<?=URL::to('/');?>/profile/ubahpassword" class="btn btn-sm btn-block btn-primary"><i class="fa fa-lock"></i> Ubah Password</a>
            </div>
            <div class="col-md-10">
                <table class="table">
                    <tr>
                        <th width="200">Username</th>
                        <td><?= $user[0]->username; ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?= $user[0]->email; ?></td>
                    </tr>
                    <tr>
                        <th>Nomor Telepon</th>
                        <td><?= $user[0]->no_telp; ?></td>
                    </tr>
                    <tr>
                        <th>Role</th>
                        <td class="text-capitalize"><?= $user[0]->role; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@stop