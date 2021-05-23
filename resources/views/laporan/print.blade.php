<!DOCTYPE html>
<html lang="en" >
<head>
	<meta charset="UTF-8">
	<title>Document Pengajuan Barang</title>
	<link rel="stylesheet" href="<?=URL::to('/');?>/document/css/style.css">
</head>
<body onload="window.print()">
		<div id="page-wrap">
			<textarea id="header">Document Pengajuan Barang</textarea>
			
			<div style="clear:both"></div>
			
			<table id="items" >

				<tr>
					<th>No.</th>
					<th>No Transaksi</th>
					<th>Tanggal Masuk</th>
					<th>Supplier</th>
					<th>Nama Barang</th>
					<th>Jumlah Masuk</th>
					<th>User</th>
				</tr>
                <?php
                $no = 1;
                    foreach ($barangmasuk as $bm) :
                        ?>
				<tr class="item-row">
					<td class="item-name"><?= $no++; ?></td>
					<td class="item-name"><?= $bm->id_barang_masuk; ?></td>
					<td class="description"><?= $bm->tanggal_masuk; ?></td>
					<td><?= $bm->nama_supplier; ?></td>
					<td><?= $bm->nama_barang; ?></td>
					<td><?= $bm->jumlah_masuk; ?> <?= $bm->nama_satuan; ?></td>
					<td><?= $bm->nama; ?></td>
				</tr>
                <?php endforeach; ?>
				     

				<tr id="hiderow">
					<td colspan="7"><a id="addrow" href="javascript:;" title="Add a row">Add a row</a></td>
				</tr>

				<tr>
					<td colspan="4" class="blank"> </td>
					<td colspan="3" class="total-line">Ketua Kelurahaan</td>
				</tr>
				<tr height="100px">
					<td colspan="4"  class="blank"> </td>
					<td colspan="3"  class="total-line"></td>
				</tr>
				<tr>
					<td colspan="4" class="blank"> </td>
					<td colspan="3" class="total-line balance">(Erwin Sulistyanto S.T)</td>
				</tr>
			</table>
			<br><br><br><br>
		</div>
	</body>
	</html>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script  src="<?=URL::to('/');?>/document/js/index.js"></script>
</body>
</html>
