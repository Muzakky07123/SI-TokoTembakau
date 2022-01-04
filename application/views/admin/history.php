    <!-- Begin Page Content -->
	<div class="container-fluid">
	<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Pelanggan</th>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1;
            foreach($history as $row) :?>
            <tr>
                <td><?=$no?></td>
                <td><?=$row['nama_user']?></td>
                <td><?=$row['nama']?></td>
                <td><?=$row['jumlah']?></td>
                <td><?=$row['harga']?></td>
            </tr>
            <?php $no++;
          endforeach; ?>
        </tbody>

    </table>
		</div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->