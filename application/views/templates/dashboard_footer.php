            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Toko Tembakau Barokah <?= date('Y')?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Logout ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" di bawah jika Anda siap untuk keluar dari web ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="<?= base_url('auth/logout');?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

            

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets') ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    
    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets') ?>/js/sb-admin-2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js" integrity="sha512-tMabqarPtykgDtdtSqCL3uLVM0gS1ZkUAVhRFu1vSEFgvB73niFQWJuvviDyBGBH22Lcau4rHB5p2K2T0Xvr6Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- data tables -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
        $('#example').DataTable();
         } );
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custome-file-label').addClass("selected").html(fileName);
        });

        $('.form-check-input').on('click', function() {
            const menuId = $(this).data('menu');
            const roleId = $(this).data('role');
            
            $.ajax({
                url: "<?= base_url('admin/changeakses'); ?>",
                type: 'post',
                data: {
                    menuId: menuId,
                    roleId: roleId
                },
                success: function(){
                    document.location.href = "<?= base_url('admin/roleAkses/');?>" + roleId;
                }
            });
        });

        $('.buy').on('click',function(){
           let id = $(this).data('id');
           let title = $(this).data('title');
           let nama = $(this).data('nama');
           let harga = $(this).data('harga');
           let stok = $(this).data('stok');
           let deskripsi = $(this).data('desktipsi');

           $('#id').val(id);
           $('#title').val(title);
           $('#deskripsi').text(deskripsi);
           $('#nama').text(nama);
           $('#harga').text('Rp.'+harga);
           $('#stok').text(stok);
            

        });
        $('.checkout').on('click',function(){
            let id = $(this).data('id');
            $('#id').val(id);
        })
        $('.verifikasi').on('click',function(){
            let idkeranjang = $(this).data('idkeranjang');
            let idproduk = $(this).data('idproduk');
            let jumlah = $(this).data('jumlah');
            $('#idkeranjang').val(idkeranjang);
            $('#idproduk').val(idproduk);
            $('#jumlah').val(jumlah);
        });
        // update produk
        $('.editproduk').on('click',function(){
            let id = $(this).data('id');
            let nama = $(this).data('nama');
            let jenis = $(this).data('jenis');
            let stok = $(this).data('stok');
            let harga = $(this).data('harga');
            let deskripsi = $(this).data('deskripsi');
            let proses = $(this).data('proses');

            $('#id').val(id);
            $('#nama').val(nama);
            $('#jenis').val(jenis);
            $('#stok').val(stok);
            $('#harga').val(harga);
            $('#deskripsi').val(deskripsi);
            $('#proses').val(proses);
            $('#image').removeAttr('required');

        });
        $('.tambahproduk').on('click',function(){
            let proses = $(this).data('proses');
            $('#id').val('');
            $('#nama').val('');
            $('#jenis').val('');
            $('#stok').val('');
            $('#harga').val('');
            $('#deskripsi').val('');
            $('#proses').val(proses);
        });
    </script>

    <script>
    const ctx = document.getElementById('myBarChart').getContext('2d');
    var data_nama   =[];
    var data_jumlah =[];
    $.post("<?=base_url('admin/grafik')?>", function(data){
        var obj = JSON.parse(data);
        $.each(obj,function(tes,items,sd){
            data_nama.push(items[0].nama);
            data_jumlah.push(items[0].jumlah);
        });
    
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: data_nama,
            datasets: [{
                label: 'Produk Terjual',
                data: data_jumlah,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
    </script>

</body>

</html>