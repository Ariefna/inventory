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
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Data Jenis
                </h4>
            </div>
            <div class="col-auto">
                <a href="<?=URL::to('/');?>/jenis/add" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Tambah Jenis Barang
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped" id="dataTable">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Nama Jenis</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if ($jenis) :
                    foreach ($jenis as $j) :
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $j->nama_jenis; ?></td>
                            <td>
                                <a href="<?=URL::to('/');?>/jenis/edit/<?= $j->id_jenis; ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>
                                <a onclick="return confirm('Yakin ingin hapus?')" href="<?=URL::to('/');?>/jenis/delete/<?= $j->id_jenis; ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="3" class="text-center">
                            Data Kosong
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
@stop