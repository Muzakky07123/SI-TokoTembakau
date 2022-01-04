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
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1;
            foreach($pesanan as $row) :?>
            <tr>
                <td><?=$no?></td>
                <td><?=$row['nama_user']?></td>
                <td><?=$row['nama']?></td>
                <td><?=$row['jumlah']?></td>
                <td><?=$row['harga']?></td>
                <td class="text-center"> <button  data-toggle="modal" data-idkeranjang="<?=$row['id_keranjang']?>" data-jumlah="<?=$row['jumlah']?>" 
                            data-idproduk="<?=$row['id']?>" data-target="#staticBackdrop"  class="btn btn-primary verifikasi">Verifikasi</button></td>
            </tr>
            <?php $no++;
          endforeach; ?>
        </tbody>

    </table>
		</div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->

    <!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <form action="<?=base_url('Admin/verifikasi')?>" method="post">
          <input type="hidden" name="idkeranjang" id="idkeranjang">
          <input type="hidden" name="idproduk" id="idproduk">
          <input type="hidden" name="jumlah" id="jumlah">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Check Out</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah Anda yakin mau melanjutkan untuk membeli ?<br>
        <small>product akan langsung di proses penjual</small>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <button type="submit" class="btn btn-primary">Yakin</button>
      </div>
      </form>
    </div>
  </div>
</div>
				