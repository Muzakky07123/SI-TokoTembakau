    <!-- Begin Page Content -->
	<div class="container-fluid">
	<!-- Page Heading -->
		    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
		
            <div class="row">
                <?php 
                foreach($produk as $row) :?>
                <div class="col-3">
                    <div class="card" style="width: 18rem;">
                    <img src="<?=base_url('assets/img/produk/').$row['image']?>" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold fs-3 text-capitalize text-primary"><?=$row['nama']?></h5>
                            <h5 class="text-primary">Jumlah : <span class="text-secondary"><?=$row['jumlah']?></span></h5>
                            <h5 class="text-danger mb-3">Rp.<?=$row['total']?></h5>
                            <?php if($row['status'] == 1) { ?>
                              <?php $btn = 'Checkout' ?>
                              <?php $warna = 'primary' ?>
                              <?php $modal = 'modal' ?>
                            <?php }else if($row['status'] == 2){ ?>
                              <?php $btn = 'Silahkan Diambil' ?>
                              <?php $warna = 'warning' ?>
                              <?php $modal = '' ?>
                            <?php } ?>
                            <button  data-toggle="<?=$modal?>" data-id="<?=$row['id_keranjang']?>" data-target="#staticBackdrop"  class="btn btn-<?=$warna?> checkout"><?=$btn?></button>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
		</div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->

    <!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="<?=base_url('User/checkoutkeranjang')?>" method="post">
      <input type="hidden" id="id" name="id">
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
				