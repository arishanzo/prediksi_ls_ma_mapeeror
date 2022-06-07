<?php include_once('header.php');
require_once "../config/config.php";
?>


<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex justify-content-center  mb-4">
        <h1 class="text-light mb-0 text-gray-800 ">Prediksi</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div> -->
    </div>
    <div class="card-body  justify-content-center ">

        <form action="perhitunganma.php" enctype="multipart/form-data" class=" justify-content-center " method="GET">

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

            <div class="d-sm-flex justify-content-center mb-4">

                <button class="btn btn-success tex-left" type="submit" name="hitung">HITUNG</button>
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