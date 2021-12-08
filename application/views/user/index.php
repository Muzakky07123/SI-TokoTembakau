					<!-- Begin Page Content -->
					<div class="container-fluid">
						<!-- Page Heading -->
						<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
						
							<div class="row">
								<div class="col-lg-6">
									<?= $this->session->flashdata('pesan');?>
								</div>
							</div>

						<div class="card mb-3 col-lg-8" style="max-width: 540px;">
  							<div class="row g-0">
    							<div class="col-md-4">
      							<img src="<?= base_url('assets/img/profile/').$login['image']?>" class="img-fluid rounded-start">
    						</div>
    					<div class="col-md-8">
      						<div class="card-body">
        						<h5 class="card-title"><?= $login['nama']?></h5>
        						<p class="card-text"><?= $login['email']?></p>
        						<p class="card-text"><small class="text-muted">Member Sejak <?= date('d F Y',$login['date_created']);?> </small></p>
      						</div>
    					</div>
  							</div>
						</div>

						</a>
					</li>
					
					</div>
					<!-- /.container-fluid -->
				</div>
				<!-- End of Main Content -->
				