    <!-- Begin Page Content -->
	<div class="container-fluid">
	<!-- Page Heading -->
    <div class="row">
        <div class="col">
        <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    </div>
    <div class="col text-right mr-3">
        <button  data-toggle="modal" data-target="#modal" data-proses="tambah" class="btn btn-primary tambahproduk w-25" >Tambah Produk</button>
        </div>
    </div>
		
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th class="text-center">Image</th>
                <th class="text-center">Name Product</th>
                <th class="text-center">Jenis</th>
                <th class="text-center">Stok</th>
                <th class="text-center">Harga</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1;
            foreach($product as $row) :?>
            <tr>
                <td><?=$no?></td>
                <td class="text-center"><img src="<?=base_url('assets/img/produk/').$row['image']?>" width="70rem%"></td>
                <td class="text-center text-capitalize"><?=$row['nama']?></td>
                <td class="text-center text-capitalize"><?=$row['jenis']?></td>
                <td class="text-center text-capitalize"><?=$row['stok']?></td>
                <td class="text-center text-capitalize"><?=$row['harga']?></td>
                <td class="text-center">
                    <button  data-toggle="modal" data-target="#modal" data-id="<?=$row['id']?>" data-nama="<?=$row['nama']?>" data-jenis="<?=$row['jenis']?>"    
                             data-stok="<?=$row['stok']?>" data-harga="<?=$row['harga']?>" data-deskripsi="<?=$row['deskripsi']?>" 
                             data-proses="edit" class="btn btn-primary editproduk w-25" >
                    Edit</button>
                    <a href="<?=base_url('Admin/hapusProduk/').$row['id']?>" class="btn btn-danger">Hapus</a> 
                </td>
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


<!-- Modal Tambah data -->
<div class="modal fade" id="modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <?php echo form_open_multipart(base_url('Admin/manageProduct'), 'class="form-horizontal"');?>
    <input type="hidden" name="id" id="id">
    <input type="hidden" name="proses" id="proses">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">tambah Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="nama">Nama Produk</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
          </div>
          <div class="form-group">
            <label for="jenis">Jenis Produk</label>
            <select name="jenis" id="jenis" class="form-control">
              <option value="tembakau">Tembakau</option>
              <option value="alatlinting">Alat Linting</option>
              <option value="paper">Paper</option>
              <option value="filter">Filter</option>
              <option value="alatlainnya">Alat Lainnya</option>
            </select>

          </div>
          <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" class="form-control" id="stok" name="stok" required>
          </div>
          <div class="form-group">
            <label for="harga">Harga Produk</label>
            <input type="number" class="form-control" id="harga" name="harga" required>
          </div>
          <div class="form-group">
            <label for="deskripsi">Deskripsi Produk</label>
            <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="2" required></textarea>
          </div>
          <div class="form-group">
            <label for="image">Image Produk</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
            <small class="text-danger">*Wajib diisi <br>*gunakan huruf kecil</small>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <button type="submit" name="submit" class="btn btn-primary" >Yakin</button>
      </div>
      <?php form_close(); ?>
    </div>
  </div>
</div>
<!-- end of modal tambah data --