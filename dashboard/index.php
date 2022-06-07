<?php include_once('header.php');
require_once "../config/config.php";
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex justify-content-center  mb-4">
        <h2 class="text-light mb-0 text-gray-800 ">Selamat Datang Di Halaman Utama Sistem Prediksi</h2>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div> -->
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xl font-weight-bold text-success text-uppercase mb-1">
                                Jumlah Provinsi :</div>
                            <?php
                            $query = mysqli_query($con, "SELECT * FROM provinsi ");
                            $n = mysqli_num_rows($query);
                            ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $n ?></div>
                        </div>
                        <div class="col-auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <script>
            var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {

                    labels: [
                        <?PHP
                        $SqlQuery = mysqli_query($con, "SELECT bulan from dt_aktual");
                        $no = 1;
                        while ($row = mysqli_fetch_array($SqlQuery)) {
                        ?> "<?= $row['bulan'] ?>",
                        <?php
                        }
                        ?>
                    ],

                    datasets: [{
                        label: '',
                        data: [
                            <?php
                            $jumlah_aktual = mysqli_query($con, "SELECT kebutuhan_air from dt_aktual");

                            while ($row = mysqli_fetch_array($jumlah_aktual)) {
                            ?> "<?= $row['kebutuhan_air'] ?>",
                            <?php
                            }
                            ?>
                        ],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>



    </div>
    <?php include_once('footer.php');
    ?>