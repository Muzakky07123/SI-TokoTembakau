    <!-- Begin Page Content -->
	<div class="container-fluid">
	<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Total</th>
                <!-- <th>Action</th> -->
            </tr>
        </thead>
        <tbody>
            <?php $no=1;
            foreach($history as $row) :?>
            <tr>
                <td><?=$no?></td>
                <td class="text-capitalize"><?=$row['nama']?></td>
                <td><?=$row['jumlah']?></td>
                <td><?=$row['total']?></td>
                <!-- <td class="text-center"> <button  data-toggle="modal" data-idkeranjang="<?=$row['id']?>" data-jumlah="<?=$row['jumlah']?>" 
                            data-idproduk="<?=$row['id_produk']?>" data-target="#staticBackdrop"  class="btn btn-primary verifikasi">Verifikasi</button></td> -->
            </tr>
            <?php $no++;
          endforeach; ?>
        </tbody>

    </table>
		</div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
