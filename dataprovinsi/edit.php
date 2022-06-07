<?php include_once('header.php');
require_once "../config/config.php";
?>


<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex justify-content-center  mb-4">
        <h1 class="text-light mb-0 text-gray-800 ">Edit Data Provinsi</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div> -->
    </div>
    <div class="card-body  justify-content-center ">

        <form action="" enctype="multipart/form-data" class=" justify-content-center " method="post">
            <?php
            $id = @$_GET['id'];
            $sql_prov = mysqli_query($con, "SELECT * FROM provinsi WHERE id_provinsi = '$id'") or die(mysqli_error($con));
            $data = mysqli_fetch_array($sql_prov)
            ?>

            <div class="text-center mb-2">
                <label>Nama Provinsi</label>
                <input type="text" name="nama_provinsi" value="<?= $data['nama_provinsi'] ?>">
            </div>

            <div class="d-sm-flex justify-content-center mb-4">

                <button class="btn btn-success tex-left" type="submit" name="simpan">Simpan</button>
            </div>
        </form>

    </div>
    </section>
</div>

<div>
</div>
</div>

<?php include_once('footer.php');
?>

<?php
if (isset($_POST['simpan'])) {
    $nama_provinsi = $_POST['nama_provinsi'];

    $id_admin = $_SESSION['id_admin'];

    $query_input = mysqli_query($con, "UPDATE provinsi set id_admin='$id_admin', nama_provinsi='$nama_provinsi' where id_provinsi='$id'");
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