@extends('templates.dashboard')
@section('content')
@if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Approve Data Barang Masuk
                </h4>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>No Transaksi</th>
                    <th>Tanggal Masuk</th>
                    <th>Supplier</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Masuk</th>
                    <th>User</th>
                    <th>Approve</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if ($barangmasuk) :
                    foreach ($barangmasuk as $bm) :
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $bm->id_barang_masuk; ?></td>
                            <td><?= $bm->tanggal_masuk; ?></td>
                            <td><?= $bm->nama_supplier; ?></td>
                            <td><?= $bm->nama_barang; ?></td>
                            <td><?= $bm->jumlah_masuk; ?> <?= $bm->nama_satuan; ?></td>
                            <td><?= $bm->nama; ?></td>
                            <td>
                                <a  href="<?=URL::to('/');?>/barangmasuk/approve/<?= $bm->id_barang_masuk; ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-check"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="8" class="text-center">
                            Data Kosong
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
@stop