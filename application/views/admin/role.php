					<!-- Begin Page Content -->
					<div class="container-fluid">
						<!-- Page Heading -->
						<h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>
					  <div class="row">
                    
                        <div class="col-md-6 col-md-12">
                        <?= form_error('role', '<div class="alert alert-danger" role="alert">','</div>');?>
                        <?= $this->session->flashdata('pesan');?>
                        
                        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRoleModal">Add New Role</a>


                        <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="col-3" scope="col-3">No</th>
                                <th clas="col-5"scope="col-5">Role</th>
                                <th class="col-4"scope="col-4">Action</th>                      
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach($role as $r) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $r['role'];?></td>
                                <td>
                                    <a href="<?= base_url('admin/roleAkses/') . $r['id'];?>" class="btn bg-warning text-dark">access</a>
                                    <a href="<?= base_url(); ?>admin/updaterole/<?=$r['id'];?>" class="btn bg-success text-dark" data-toggle="modal" data-target="#editRoleModal">edit</a>
                                    <a href="<?= base_url(); ?>admin/deleterole/<?= $r['id']?>" class="btn bg-danger text-dark"onclick="return confirm('yakin?');">delete</a>
                                </td>
                            </tr>
                            <?php $i++;?>
                            <?php endforeach; ?>
                        </tbody>
                        </table>

                        </div>
                    </div>


                    


						
					</div>
					<!-- /.container-fluid -->
			
				<!-- End of Main Content -->

                <!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="newRoleModal" tabindex="-1" aria-labelledby="newRoleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newRoleModalLabel">Add New Role</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('admin/role');?>" method="post">
      <div class="modal-body">
        <div class="mb-3">          
            <input type="text" class="form-control" id="role" name="role" placeholder="Role name">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editRoleModal" tabindex="-1" aria-labelledby="editRoleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editRoleModalLabel">Edit Role</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('admin/updaterole');?>" method="post">
      <div class="modal-body">
        <div class="mb-3">          
            <input type="text" class="form-control" id="role" name="role" placeholder="Edit Role Name" value="<?= $data['role']?>">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Edit</button>
      </div>
      </form>
    </div>
  </div>
</div>
				