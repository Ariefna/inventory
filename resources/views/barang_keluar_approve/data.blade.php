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
                    Approve Data Barang Keluar
                </h4>
            </div>
        </div>
    </div>
    <div class="table-responsive">
    <form action="/printmultik" method="POST">
    {{ csrf_field() }}
    <button type="submit" name="button" class="btn btn-success"><i class="fa fa-print"></i> Print</button>
        <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                <th><input type="checkbox" name="" id="select-all"></th>
                <th>No Transaksi</th>
                    <th>Tanggal Keluar</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Keluar</th>
                    <th>User</th>
                    <th>Approve</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if ($barangkeluar) :
                    foreach ($barangkeluar as $bk) :
                        ?>
                        <tr>
                        <td><input type="checkbox" name="id[]" value="{{$bk->id_barang_keluar}}"></td>
                        <td><?= $bk->id_barang_keluar; ?></td>
                            <td><?= $bk->tanggal_keluar; ?></td>
                            <td><?= $bk->nama_barang; ?></td>
                            <td><?= $bk->jumlah_keluar?> <?=$bk->nama_satuan; ?></td>
                            <td><?= $bk->nama; ?></td>
                            <td>
                            <a  href="<?=URL::to('/');?>/barangKeluar/approve/<?= $bk->id_barang_keluar; ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-check"></i></a>
                            <a  href="<?=URL::to('/');?>/printk/<?= $bk->id_barang_keluar; ?>" class="btn btn-success btn-circle btn-sm"><i class="fa fa-print"></i></a>
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
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
<script>
    $('#select-all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;                        
        });
    } else {
        $(':checkbox').each(function() {
            this.checked = false;                       
        });
    }
});
</script>
@stop