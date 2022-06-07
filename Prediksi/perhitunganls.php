<?php
include_once('header.php');
require_once "../config/config.php";
$conn = mysqli_connect("localhost", "root", "", "prediksi");

$data = $_GET['nama_provinsi'];

$del = mysqli_query($con, "DELETE FROM eror WHERE id_provinsi='$data' && prediksi='least square'");

$query = mysqli_query($con, "SELECT * FROM `hasil` INNER JOIN provinsi as e on e.id_provinsi=hasil.id_provinsi WHERE hasil.id_provinsi ='$data' order by tahun");
$array = 0;

// menentukan jumlah
while ($row = mysqli_fetch_array($query)) {
    $array++;
    // array 1
    if ($array == 1) {
        $data1 = $row['jumlah'];
        // array 2
    } else if ($array == 2) {
        $data2 = $row['jumlah'];
        // array 3
    } else if ($array == 3) {
        $data3 = $row['jumlah'];
        // array 4
    } else if ($array == 4) {
        $data4 = $row['jumlah'];
        // array 5
    } else if ($array == 5) {

        $data5 = $row['jumlah'];
        // array 6
    } else if ($array == 6) {

        //total jumlah y
        $y = array(
            $data1, $data2, $data3, $data4, $data5
        );
        //menentukan x
        $x = array();
        if (5 % 2 == 0) {
            //genap
            $tipe = true;
            $temp = - (5 - 1);
            for ($i = 0; $i < 5; $i++) {
                if ($i == 0) {
                    array_push($x, $temp);
                } else {
                    $temp = $temp + 2;
                    array_push($x, $temp);
                }
            }
        } else if (5 % 2 != 0) {
            //ganjil
            $tipe = false;
            $temp = - ((5 - 1) / 2);
            for ($i = 0; $i < 5; $i++) {
                if ($i == 0) {
                    array_push($x, $temp);
                } else {
                    $temp = $temp + 1;
                    array_push($x, $temp);
                }
            }
        }
        //x pangkat 2
        $x2 = array();
        $nX2 = 0;
        for ($i = 0; $i < 5; $i++) {
            $x2[$i] = $x[$i] * $x[$i];
            $nX2 = $nX2 + $x2[$i];
        }
        $xy = array();
        $nXY = 0;
        for ($i = 0; $i < 5; $i++) {
            $xy[$i] = $x[$i] * $y[$i];
            $nXY = $nXY + $xy[$i];
        }
        //nilai a
        $jumlah = $data1 + $data2 + $data3 + $data4 + $data5;
        $a = $jumlah / 5;
        //nilai b
        $b = $nXY / $nX2;
        //b dikali n
        $bn = $b * 3;
        //total prediksi
        $total = $a + $bn;
        $tahun6 = $row['tahun'];
        $data6 = $row['jumlah'];

        $mfe = $data6 - $total;


        $mse = $mfe * $mfe;
        $mae = abs($mfe);
        $mape =  $mae / $data6 * 100;
        $query_input = mysqli_query($con, "INSERT INTO eror VALUES ('', '$data', '$tahun6', 'least square', '$total', '$mfe', '$mae', '$mse', '$mape')");

        // array 7
    } else if ($array == 7) {
        //total jumlah y
        $y = array(
            $data2, $data3, $data4, $data5, $data6
        );
        //menentukan x
        $x = array();
        if (5 % 2 == 0) {
            //genap
            $tipe = true;
            $temp = - (5 - 1);
            for ($i = 0; $i < 5; $i++) {
                if ($i == 0) {
                    array_push($x, $temp);
                } else {
                    $temp = $temp + 2;
                    array_push($x, $temp);
                }
            }
        } else if (5 % 2 != 0) {
            //ganjil
            $tipe = false;
            $temp = - ((5 - 1) / 2);
            for ($i = 0; $i < 5; $i++) {
                if ($i == 0) {
                    array_push($x, $temp);
                } else {
                    $temp = $temp + 1;
                    array_push($x, $temp);
                }
            }
        }
        //x pangkat 2
        $x2 = array();
        $nX2 = 0;
        for ($i = 0; $i < 5; $i++) {
            $x2[$i] = $x[$i] * $x[$i];
            $nX2 = $nX2 + $x2[$i];
        }
        $xy = array();
        $nXY = 0;
        for ($i = 0; $i < 5; $i++) {
            $xy[$i] = $x[$i] * $y[$i];
            $nXY = $nXY + $xy[$i];
        }
        //nilai a
        $jumlah = $data2 + $data3 + $data4 + $data5 + $data6;
        $a = $jumlah / 5;
        //nilai b
        $b = $nXY / $nX2;
        //b dikali n
        $bn = $b * 3;
        //total prediksi
        $total = $a + $bn;
        $tahun7 = $row['tahun'];
        $data7 = $row['jumlah'];

        $mfe = $data7 - $total;


        $mse = $mfe * $mfe;
        $mae = abs($mfe);
        $mape =  $mae / $data7 * 100;
        $query_input = mysqli_query($con, "INSERT INTO eror VALUES ('', '$data', '$tahun7', 'least square', '$total', '$mfe', '$mae', '$mse', '$mape')");
        // array 8
    } else if ($array == 8) {

        //total jumlah y
        $y = array(
            $data3, $data4, $data5, $data6, $data7
        );
        //menentukan x
        $x = array();
        if (5 % 2 == 0) {
            //genap
            $tipe = true;
            $temp = - (5 - 1);
            for ($i = 0; $i < 5; $i++) {
                if ($i == 0) {
                    array_push($x, $temp);
                } else {
                    $temp = $temp + 2;
                    array_push($x, $temp);
                }
            }
        } else if (5 % 2 != 0) {
            //ganjil
            $tipe = false;
            $temp = - ((5 - 1) / 2);
            for ($i = 0; $i < 5; $i++) {
                if ($i == 0) {
                    array_push($x, $temp);
                } else {
                    $temp = $temp + 1;
                    array_push($x, $temp);
                }
            }
        }
        //x pangkat 2
        $x2 = array();
        $nX2 = 0;
        for ($i = 0; $i < 5; $i++) {
            $x2[$i] = $x[$i] * $x[$i];
            $nX2 = $nX2 + $x2[$i];
        }
        $xy = array();
        $nXY = 0;
        for ($i = 0; $i < 5; $i++) {
            $xy[$i] = $x[$i] * $y[$i];
            $nXY = $nXY + $xy[$i];
        }
        //nilai a
        $jumlah = $data3 + $data4 + $data5 + $data6 + $data7;
        $a = $jumlah / 5;
        //nilai b
        $b = $nXY / $nX2;
        //b dikali n
        $bn = $b * 3;
        //total prediksi
        $total = $a + $bn;
        $tahun8 = $row['tahun'];
        $data8 = $row['jumlah'];

        $mfe = $data8 - $total;


        $mse = $mfe * $mfe;
        $mae = abs($mfe);
        $mape =  $mae / $data8 * 100;
        $query_input = mysqli_query($con, "INSERT INTO eror VALUES ('', '$data', '$tahun8', 'least square', '$total', '$mfe', '$mae', '$mse', '$mape')");
        // array 9
    } else if ($array == 9) {

        //total jumlah y
        $y = array(
            $data4, $data5, $data6, $data7, $data8
        );
        //menentukan x
        $x = array();
        if (5 % 2 == 0) {
            //genap
            $tipe = true;
            $temp = - (5 - 1);
            for ($i = 0; $i < 5; $i++) {
                if ($i == 0) {
                    array_push($x, $temp);
                } else {
                    $temp = $temp + 2;
                    array_push($x, $temp);
                }
            }
        } else if (5 % 2 != 0) {
            //ganjil
            $tipe = false;
            $temp = - ((5 - 1) / 2);
            for ($i = 0; $i < 5; $i++) {
                if ($i == 0) {
                    array_push($x, $temp);
                } else {
                    $temp = $temp + 1;
                    array_push($x, $temp);
                }
            }
        }
        //x pangkat 2
        $x2 = array();
        $nX2 = 0;
        for ($i = 0; $i < 5; $i++) {
            $x2[$i] = $x[$i] * $x[$i];
            $nX2 = $nX2 + $x2[$i];
        }
        $xy = array();
        $nXY = 0;
        for ($i = 0; $i < 5; $i++) {
            $xy[$i] = $x[$i] * $y[$i];
            $nXY = $nXY + $xy[$i];
        }
        //nilai a
        $jumlah = $data4 + $data5 + $data6 + $data7 + $data8;
        $a = $jumlah / 5;
        //nilai b
        $b = $nXY / $nX2;
        //b dikali n
        $bn = $b * 3;
        //total prediksi
        $total = $a + $bn;
        $tahun9 = $row['tahun'];
        $data9 = $row['jumlah'];

        $mfe = $data9 - $total;


        $mse = $mfe * $mfe;
        $mae = abs($mfe);
        $mape =  $mae / $data9 * 100;
        $query_input = mysqli_query($con, "INSERT INTO eror VALUES ('', '$data', '$tahun9', 'least square', '$total', '$mfe', '$mae', '$mse', '$mape')");
        // array 10
    } else if ($array == 10) {
        //total jumlah y
        $y = array(
            $data5, $data6, $data7, $data8, $data9
        );
        //menentukan x
        $x = array();
        if (5 % 2 == 0) {
            //genap
            $tipe = true;
            $temp = - (5 - 1);
            for ($i = 0; $i < 5; $i++) {
                if ($i == 0) {
                    array_push($x, $temp);
                } else {
                    $temp = $temp + 2;
                    array_push($x, $temp);
                }
            }
        } else if (5 % 2 != 0) {
            //ganjil
            $tipe = false;
            $temp = - ((5 - 1) / 2);
            for ($i = 0; $i < 5; $i++) {
                if ($i == 0) {
                    array_push($x, $temp);
                } else {
                    $temp = $temp + 1;
                    array_push($x, $temp);
                }
            }
        }
        //x pangkat 2
        $x2 = array();
        $nX2 = 0;
        for ($i = 0; $i < 5; $i++) {
            $x2[$i] = $x[$i] * $x[$i];
            $nX2 = $nX2 + $x2[$i];
        }
        $xy = array();
        $nXY = 0;
        for ($i = 0; $i < 5; $i++) {
            $xy[$i] = $x[$i] * $y[$i];
            $nXY = $nXY + $xy[$i];
        }
        //nilai a
        $jumlah = $data5 + $data6 + $data7 + $data8 + $data9;
        $a = $jumlah / 5;
        //nilai b
        $b = $nXY / $nX2;
        //b dikali n
        $bn = $b * 3;
        //total prediksi
        $total = $a + $bn;
        $tahun10 = $row['tahun'];
        $data10 = $row['jumlah'];

        $mfe = $data10 - $total;


        $mse = $mfe * $mfe;
        $mae = abs($mfe);
        $mape =  $mae / $data10 * 100;
        $query_input = mysqli_query($con, "INSERT INTO eror VALUES ('', '$data', '$tahun10', 'least square', '$total', '$mfe', '$mae', '$mse', '$mape')");
        // menghitung tahun2022

        $y = array(
            $data6, $data7, $data8, $data9, $data10
        );
        //menentukan x
        $x = array();
        if (5 % 2 == 0) {
            //genap
            $tipe = true;
            $temp = - (5 - 1);
            for ($i = 0; $i < 5; $i++) {
                if ($i == 0) {
                    array_push($x, $temp);
                } else {
                    $temp = $temp + 2;
                    array_push($x, $temp);
                }
            }
        } else if (5 % 2 != 0) {
            //ganjil
            $tipe = false;
            $temp = - ((5 - 1) / 2);
            for ($i = 0; $i < 5; $i++) {
                if ($i == 0) {
                    array_push($x, $temp);
                } else {
                    $temp = $temp + 1;
                    array_push($x, $temp);
                }
            }
        }
        //x pangkat 2
        $x2 = array();
        $nX2 = 0;
        for ($i = 0; $i < 5; $i++) {
            $x2[$i] = $x[$i] * $x[$i];
            $nX2 = $nX2 + $x2[$i];
        }
        $xy = array();
        $nXY = 0;
        for ($i = 0; $i < 5; $i++) {
            $xy[$i] = $x[$i] * $y[$i];
            $nXY = $nXY + $xy[$i];
        }
        //nilai a
        $jumlah2022 = $data6 + $data7 + $data8 + $data9 + $data10;
        $a2022 = $jumlah2022 / 5;
        //nilai b
        $b2022 = $nXY / $nX2;
        //b dikali n
        $bn2022 = $b2022 * 3;
        //total prediksi
        $total2022 = $a2022 + $bn2022;


        $mae = mysqli_query($con, "SELECT SUM(mae) FROM `eror` where id_provinsi='$data' && prediksi='least square'");
        $rowmae = mysqli_fetch_array($mae);
        $totalmae = $rowmae['SUM(mae)'];

        $totalmae2022 = $totalmae / 5;

        $mape = mysqli_query($con, "SELECT SUM(mape) FROM `eror` where id_provinsi='$data' && prediksi='least square'");
        $rowmape = mysqli_fetch_array($mape);
        $totalmape = $rowmape['SUM(mape)'];
        $totalmape2022 = $totalmape / 5;


        $mse = mysqli_query($con, "SELECT SUM(mse) FROM `eror` where id_provinsi='$data' && prediksi='least square'");
        $rowmse = mysqli_fetch_array($mse);
        $totalmse = $rowmse['SUM(mse)'];
        $totalmse2022 = $totalmse / 5;

        $query_input = mysqli_query($con, "INSERT INTO eror VALUES ('', '$data', '2022', 'least square', '$total2022', '0', ' $totalmae2022', ' $totalmse2022', ' $totalmape2022')");
    }
}
?>

<div class="container-fluid">
    <div class="d-sm-flex justify-content-center  mb-4">
        <h1 class="text-light mb-0 text-gray-800 ">Prediksi Least Square</h1>

    </div>
    <div class="card-body">

        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"">
                    <thead>
                      
            <div class=" table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tahun Panen</th>
                            <th>MAE</th>
                            <th>MFE</th>
                            <th>MSE</th>
                            <th>MAPE</th>
                        </tr>
                        <tr>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = $_GET['nama_provinsi'];
                        $query = mysqli_query($con, "SELECT * FROM `eror` INNER JOIN hasil AS H on h.id_provinsi = eror.id_provinsi && h.tahun=eror.tahun_eror WHERE h.id_provinsi='$data' && prediksi='least square'");
                        $no = 1;
                        if (mysqli_num_rows($query) > 0) {
                            while ($row = mysqli_fetch_array($query)) {
                        ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $row['tahun_eror'] ?></td>
                                    <td><?= $row['mae'] ?></td>
                                    <td><?= $row['mfe'] ?></td>
                                    <td><?= $row['mse'] ?></td>
                                    <td><?= $row['mape'] ?></td>

                    </tr>
            <?php
                            }
                        } else {
                            echo "<tr><td colspan=\"8\" align=\"center\">data tidak ada</td></tr>";
                        }
            ?>
            
            </tbody>
                </table>

                <div class=" table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                <tr>
                                    <th>No</th>
                                    <th>Tahun</th>
                                    <th>Prediksi</th>
                                    <th>MAE</th>
                                    <th>MSE</th>
                                    <th>MAPE</th>

                                </tr>
                                <tr>

                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>1</td>
                                    <td>2022</td>
                                    <td><?= $total2022 ?></td>
                                    <td><?= $totalmae2022 ?></td>
                                    <td><?= $totalmse2022 ?></td>
                                    <td><?= round($totalmape2022, 2) ?> %</td>
                                </tr>
                                </tr>

                            </tbody>
                        </table>
                        <span class=" font-weight-bold">
                            HASIL PREDIKSI JUMLAH PANEN TAHUN 2022 ADALAH <?= $total2022 ?> TON
                        </span>


                        </section>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $('.admin').DataTable({
                    " paging": true,
                });
            });
        </script>
        <div>
        </div>
    </div>

    <?php include_once('footer.php');
    ?>