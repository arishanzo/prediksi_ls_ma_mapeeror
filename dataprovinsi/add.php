<?php include_once('header.php');
require_once "../config/config.php";
?>


<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex justify-content-center  mb-4">
        <h1 class="text-light mb-0 text-gray-800 ">Tambah Data Provinsi</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div> -->
    </div>
    <div class="card-body  justify-content-center ">
        <?php
        // mengambil data barang dengan kode paling besar
        $query = mysqli_query($con, "SELECT max(id_provinsi) as maxKode FROM provinsi");
        $data = mysqli_fetch_array($query);
        $id = $data['maxKode'];


        $urutan = $id;

        $urutan++;

        $id = sprintf("%03s", $urutan);
        ?>
        <form action="" enctype="multipart/form-data" class=" justify-content-center " method="post">
            <div class="form-group" hidden>
                <div class="section-title mt-0">Id Provinsi</div>
                <div class="input-group mb-2">
                    <input type="text" name="id" class="form-control" value="<?= $id ?>" hidden>
                </div>
            </div>


            <div class="text-center mb-2">
                <label>Nama Provinsi</label>
                <input type="text" name="NAMA_PROVINSI">
            </div>

            <div class="d-sm-flex justify-content-center mb-4">

                <button class="btn btn-success tex-left" type="submit" name="simpan">Simpan</button>
            </div>
        </form>

    </div>
    </section>
</div>

<script>
    $(document).ready(function() {
        $('.admin').DataTable({
            "paging": true,

        });

    });
</script>
<script>
    // swall
    $('.delete-data').on('click', function(e) {
        e.preventDefault();
        var getLink = $(this).attr('href');

        Swal.fire({
            title: 'Apa Anda Yakin?',
            text: "Data akan dihapus permanen",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.value) {
                window.location.href = getLink;
            }
        })
    });
</script>
<div>
</div>
</div>

<?php include_once('footer.php');
?>

<?php
if (isset($_POST['simpan'])) {
    $nama_provinsi = $_POST['NAMA_PROVINSI'];
    $id = $_POST['id'];
    $id_admin = $_SESSION['id_admin'];
    $conn = mysqli_connect("localhost", "root", "", "prediksi");
    $query = "INSERT INTO provinsi VALUES ('$id', $id_admin, '$nama_provinsi')";
    $query_input = mysqli_query($conn, $query);
    if ($query_input) {

        echo "<script type='text/javascript'>
                                setTimeout(function () { 
                                    swal({ 
                                        title: 'Sukssess', 
                                        text: 'Data Berhasil Disimpan', 
                                        type: 'success',
                                         timer: 5000,
                                          showConfirmButton: false });
                                },10);  
                                window.setTimeout(function(){ 
                                  window.location.replace('index.php');
                                } ,3000); 
                                </script>";
    } else {
        echo "<script type='text/javascript'>
                                setTimeout(function () { 
                                    swal({ 
                                        title: 'Gagal', 
                                        text: 'Data Gagal Disimpan', 
                                        type: 'warning',
                                         timer: 3000,
                                          showConfirmButton: false });
                                },10);  
                                window.setTimeout(function(){ 
                                  window.location.replace('add.php');
                                } ,3000); 
                                </script>";
    }
}
?>