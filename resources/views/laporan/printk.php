<!DOCTYPE html>
<html lang="en" >
<head>
	<meta charset="UTF-8">
	<title>Document Pengajuan Barang</title>
	<link rel="stylesheet" href="<?=URL::to('/');?>/document/css/style.css">
</head>
<body onload="window.print()">
		<div id="page-wrap">
			<textarea id="header">Document Barang keluar</textarea>
			
			<div style="clear:both"></div>
			
			<table id="items" >

				<tr>
					<th>No.</th>
                    <th>No Transaksi</th>
                    <th>Tanggal Keluar</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Keluar</th>
                    <th>User</th>
				</tr>
                <?php
                $no = 1;
                    foreach ($barangkeluar as $bk) :
                        ?>
				<tr class="item-row">
					<td class="item-name"><?= $no++; ?></td>
                    <td><?= $bk->id_barang_keluar; ?></td>
                            <td><?= $bk->tanggal_keluar; ?></td>
                            <td><?= $bk->nama_barang; ?></td>
                            <td><?= $bk->jumlah_keluar?> <?=$bk->nama_satuan; ?></td>
                            <td><?= $bk->nama; ?></td>
				</tr>
                <?php endforeach; ?>
				     

				<tr id="hiderow">
					<td colspan="6"><a id="addrow" href="javascript:;" title="Add a row">Add a row</a></td>
				</tr>

				<tr>
					<td colspan="3" class="blank"> </td>
					<td colspan="3" class="total-line">Ketua Kelurahaan</td>
				</tr>
				<tr height="100px">
					<td colspan="3"  class="blank"> </td>
					<td colspan="3"  class="total-line"></td>
				</tr>
				<tr>
					<td colspan="3" class="blank"> </td>
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
