@extends('templates.dashboard')
@section('content')
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
<div class="card shadow-sm mb-4 border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Data User
                </h4>
            </div>
            <div class="col-auto">
                <a href="<?= URL::to('/'); ?>/user/add" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-user-plus"></i>
                    </span>
                    <span class="text">
                        Tambah User
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                    <th width="30">No.</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>No. telp</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if ($users) :
                    foreach ($users as $user) :
                ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td>
                                <img width="30" src="<?= URL::to('/'); ?>/img/avatar/<?= $user->foto ?>" alt="<?= $user->nama; ?>" class="img-thumbnail rounded-circle">
                            </td>
                            <td><?= $user->nama; ?></td>
                            <td><?= $user->username; ?></td>
                            <td><?= $user->email; ?></td>
                            <td><?= $user->no_telp; ?></td>
                            <td><?= $user->role; ?></td>
                            <td>
                                <a href="<?= URL::to('/'); ?>/user/toggle/<?= $user->id_user ?>" class="btn btn-circle btn-sm <?= $user->is_active ? 'btn-success' : 'btn-secondary' ?>" title="<?= $user->is_active ? 'Nonaktifkan User' : 'Aktifkan User' ?>"><i class="fa fa-fw fa-power-off"></i></a>
                                <a href="<?= URL::to('/'); ?>/user/edit/<?= $user->id_user ?>" class="btn btn-circle btn-sm btn-warning"><i class="fa fa-fw fa-edit"></i></a>
                                <a onclick="return confirm('Yakin ingin menghapus data?')" href="<?= URL::to('/'); ?>/user/delete/ <?= $user->id_user ?>" class="btn btn-circle btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach;
                else : ?>
                    <tr>
                        <td colspan="8" class="text-center">Silahkan tambahkan user baru</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
@stop