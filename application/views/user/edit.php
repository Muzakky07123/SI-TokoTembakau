					<!-- Begin Page Content -->
					<div class="container-fluid">
						<!-- Page Heading -->
						<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
					<div>

                <div class="row">
                    <div class="col-lg-8">
                    
                    <?= form_open_multipart('user/edit'); ?>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="email" value="<?= $login['email'];?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">name</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" value="<?= $login['nama'];?>">
                            <?= form_error('name', '<small class="text-danger pl-3">','</small>') ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-2">Picture</div>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('assets/img/profile/'). $login['image'];?>" class="img-thumbnail">
                                </div>                            
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image">Choose File</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-froup row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>


                    </form>
                    </div>
                </div>



                    
</div>

						
					</div>
					<!-- /.container-fluid -->
				</div>
				<!-- End of Main Content -->
				