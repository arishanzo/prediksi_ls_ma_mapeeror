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

        <form action="" enctype="multipart/form-data" class=" justify-content-center " method="post">

            <div class="form-group">
                <div class="text-center mb-2">
                    <label>Nama Provinsi</label>

                    <select class="custom-select" style="width: 200px;" id="namaprovinsi" name="nama_provinsi">
                        <option disabled selected> Pilih Provinsi</option>
                        <?php

                        $sql2 = mysqli_query($con, "SELECT * FROM provinsi ");
                        while ($row2 = mysqli_fetch_array($sql2)) {
                        ?>
                            <option value="<?= $row2['id_provinsi'] ?>"><?= $row2['nama_provinsi'] ?></option>
                        <?php

                        }

                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="text-center mb-2">
                    <label>Tahun Provinsi</label>

                    <select class="custom-select" style="width: 200px;" id="tahun" name="tahun">
                        <option disabled selected> Pilih Tahun</option>
                        <?php

                        for ($i = date('Y'); $i >= date('Y') - 32; $i -= 1) {
                        ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                        <?php

                        }

                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="text-center mb-2">
                    <span>Jumlah Panen</span>
                    <input type="number" name="jumlah">
                </div>
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
    $conn = mysqli_connect("localhost", "root", "", "prediksi");
    $provinsi = mysqli_query($conn, "SELECT * FROM provinsi");
    $id_provinsi = $_POST['nama_provinsi'];
    $tahun = $_POST['tahun'];
    $tahun_check = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM hasil where id_provinsi=$id_provinsi AND tahun = '$tahun' "));
    if ($tahun_check > 0) {

        echo "<script type='text/javascript'>
                                setTimeout(function () { 
                                    swal({ 
                                        title: 'Maaf', 
                                        text: 'Data Sudah Ada', 
                                        type: 'warning',
                                         timer: 5000,
                                          showConfirmButton: false });
                                },10);  
                                window.setTimeout(function(){ 
                                  window.location.replace('index.php');
                                } ,3000); 
                                </script>";
    } else {
        $jumlah = $_POST['jumlah'];

        $query = "INSERT INTO hasil VALUES ('', '$id_provinsi', '$tahun', '$jumlah')";
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
}

?>