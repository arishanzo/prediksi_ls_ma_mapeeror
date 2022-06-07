<?php include_once('header.php');
require_once "../config/config.php";
?>


<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex justify-content-center  mb-4">
        <h1 class="text-light mb-0 text-gray-800 ">Edit Data Panen</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div> -->
    </div>
    <div class="card-body  justify-content-center ">

        <form action="" enctype="multipart/form-data" class=" justify-content-center " method="post">
            <?php
            $id = @$_GET['id'];
            $sql_prov = mysqli_query($con, "SELECT * FROM hasil join provinsi on hasil.ID_PROVINSI=provinsi.ID_PROVINSI WHERE id_hasil = '$id'") or die(mysqli_error($con));
            $data = mysqli_fetch_array($sql_prov)
            ?>

            <div class="text-center mb-2">
                <label>Nama Provinsi</label>

                <select class="custom-select" style="width: 200px;" id="namaprovinsi" name="nama_provinsi">
                    <option value="<?= $data['nama_provinsi'] ?>" selected> <?= $data['nama_provinsi'] ?></option>
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



            <div class="text-center mb-2">
                <label>Tahun Provinsi</label>

                <select class="custom-select" style="width: 200px;" id="tahun" name="tahun">
                    <option value="<?= $data['tahun'] ?>" selected> <?= $data['tahun'] ?></option>
                    <?php

                    for ($i = date('Y'); $i >= date('Y') - 32; $i -= 1) {
                    ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                    <?php

                    }

                    ?>
                </select>
            </div>

            <div class="text-center mb-2">
                <span>Jumlah Panen</span>
                <input type="number" name="jumlah_panen" value="<?= $data['jumlah'] ?>">
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
    $id = $_GET['id'];
    $jumlah = $_POST['jumlah_panen'];
    $tahun = $_POST['tahun'];
    $query_input = mysqli_query($con, "UPDATE hasil set jumlah='$jumlah', tahun='$tahun' where id_hasil='$id'");
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