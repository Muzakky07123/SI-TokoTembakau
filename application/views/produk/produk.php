<!-- Begin Page Content -->
	<div class="container-fluid">
    <!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800 "><?=$title?></h1>
			<div>
				<div class="row">
					<?php foreach($produk as $row) : ?>
					<div class="col-3">
					<div class="card" style="width: 18rem;">
						<img src="<?=base_url('assets/img/produk/').$row['image']?>" class="card-img-top">
						<div class="card-body">
							<h5 class="card-title font-weight-bold fs-3 text-capitalize text-dark"><?=$row['nama']?></h5>
							<h5 class="text-danger mb-3">Rp.<?=$row['harga']?></h5>
							<a href="" data-toggle="modal" data-title="<?=$title?>" data-id="<?=$row['id']?>" data-target="#staticBackdrop"  
							 data-nama="<?=$row['nama']?>" data-harga="<?=$row['harga']?>" data-stok="<?=$row['stok']?>"
							 data-deskripsi="<?=$row['deskripsi']?>" class="btn btn-primary buy">Buy</a>
						</div>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
            </div>
		</div>
	<!-- /.container-fluid -->
<!-- End of Main Content -->
				
	<!-- Modal -->
				
	<div  class="modal fade " id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
						<div class="modal-dialog ">
							<div class="modal-content" style="width: 750px;">
							<form action="<?=base_url('user/tambahkeranjang')?>" action="POST">
							<input type="hidden" name="idproduk" id="id">
							<input type="hidden" name="title" id="title">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
							<div class="container ">
								<div class="row d-flex">
									<div class="col-4">
												<!-- <img src="" style="width: 13rem;"> -->
									</div>
									<div class="col-8">
												<h2 id="nama" class=" text-capitalize text-dark font-weight-bold"><?=$row['nama']?></h2>
												<p><?=$row['deskripsi']?></p>
												<h5 id="harga" class="text-danger">Rp.<?=$row['harga']?></h5>
												<div class="row">
													<div class="col">
														<input id="total" class=" text-center" type="number" name="jumlah" value="1" style="width: 60px;" >
													</div>
													<div class="col">
														<h6 >Stok : <span class="text-danger" id="stok"></span> buah</h6>
													</div>

												</div>	
									</div>
								</div>
							</div>
							</div>
							<div class="modal-footer">
								<button type="submit" name="submit"  class="btn btn-primary">Keranjang</button>
							</div>
							</form>
							</div>
						</div>
						</div>
					</div>
						<!-- end of modal -->
