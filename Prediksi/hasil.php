<?php include_once('header.php');
require_once "../config/config.php";
$tahun = $_GET['Tahun'];

$SqlQuery = mysqli_query($con, "SELECT * FROM data where tahun = '$tahun'");

if (mysqli_num_rows($SqlQuery) > 0) {

    $SqlJuli = mysqli_query($con, "SELECT * FROM data where bulan = 'Juli' && tahun='2021' && nama_kategori='$_GET[namakategori]'");
    $rowjuli = mysqli_fetch_array($SqlJuli);

    $Sqlagustus = mysqli_query($con, "SELECT * FROM data where bulan = 'Agustus' && tahun='2021' && nama_kategori='$_GET[namakategori]'");
    $rowagustus = mysqli_fetch_array($Sqlagustus);

    $Sqlseptember = mysqli_query($con, "SELECT * FROM data where bulan = 'September' && tahun='2021' && nama_kategori='$_GET[namakategori]'");
    $rowseptember = mysqli_fetch_array($Sqlseptember);

    $Sqloktober = mysqli_query($con, "SELECT * FROM data where bulan = 'Oktober' && tahun='2021' && nama_kategori='$_GET[namakategori]'");
    $rowoktober = mysqli_fetch_array($Sqloktober);

    $Sqlnovember = mysqli_query($con, "SELECT * FROM data where bulan = 'November' && tahun='2021' && nama_kategori='$_GET[namakategori]'");
    $rownovember = mysqli_fetch_array($Sqlnovember);

    $Sqlsdesember = mysqli_query($con, "SELECT * FROM data where bulan = 'Desember' && tahun='2021' && nama_kategori='$_GET[namakategori]'");
    $rowdesember = mysqli_fetch_array($Sqlsdesember);


    $Sqljanuari = mysqli_query($con, "SELECT * FROM data where bulan = 'januari' && tahun='2022' && nama_kategori='$_GET[namakategori]'");
    $rowjanuari = mysqli_fetch_array($Sqljanuari);


    // Bulan Oktober

    $juli = $rowjuli['jumlah'] * 1;
    $agustus = $rowagustus['jumlah'] * 2;
    $september = $rowseptember['jumlah'] * 3;

    $jmlhOktober =  $september + $agustus + $juli;
    $wmaoktober = round($jmlhOktober / 6);

    $Sqloktober = mysqli_query($con, "SELECT * FROM data where bulan = 'Oktober' && tahun='2021' && nama_kategori='$_GET[namakategori]'");
    $rowoktober = mysqli_fetch_array($Sqloktober);

    $mfeoktober = round($rowoktober['jumlah'] - $wmaoktober);
    $maeoktober = abs($mfeoktober);
    $mseoktober = $mfeoktober * $mfeoktober;
    $Mapeoktober = round($rowoktober['jumlah'] / $mfeoktober);
    $Mapeoktober = abs($Mapeoktober);

    // Bulan November
    $agustus1 = $rowagustus['jumlah'] * 1;
    $september1 = $rowseptember['jumlah'] * 2;
    $oktober = $rowoktober['jumlah'] * 3;

    $jmlhnovember =  $agustus1 + $september1 + $oktober;
    $wmanovember = round($jmlhnovember / 6);

    $Sqlnovember = mysqli_query($con, "SELECT * FROM data where bulan = 'November' && tahun='2021' && nama_kategori='$_GET[namakategori]'");
    $rownovember = mysqli_fetch_array($Sqlnovember);

    $mfenovember = round($rownovember['jumlah'] - $wmanovember);
    $maenovember = abs($mfenovember);
    $msenovember = $mfenovember * $mfenovember;
    $Mapenovember = round($rownovember['jumlah'] / $mfenovember);

    // Bulan Desember
    $september2 = $rowseptember['jumlah'] * 1;
    $oktober1 = $rowoktober['jumlah'] * 2;
    $november = $rownovember['jumlah'] * 3;

    $jmlhdesember =  $september2 + $oktober1 + $november;
    $wmadesember = round($jmlhdesember / 6);

    $Sqldesember = mysqli_query($con, "SELECT * FROM data where bulan = 'desember' && tahun='2021' && nama_kategori='$_GET[namakategori]'");
    $rowdesember = mysqli_fetch_array($Sqldesember);

    $mfedesember = round($rowdesember['jumlah'] - $wmadesember);
    $maedesember = abs($mfedesember);
    $msedesember = $mfedesember * $mfedesember;
    $Mapedesember = round($rowdesember['jumlah'] / $mfedesember);


    // Bulan Januari
    $oktober2 = $rowoktober['jumlah'] * 1;
    $november1 = $rownovember['jumlah'] * 2;
    $desember = $rowdesember['jumlah'] * 3;

    $jmlhjanuari =  $oktober2 + $november1 + $desember;
    $wmajanuari = round($jmlhjanuari / 6);

    $Sqljanuari = mysqli_query($con, "SELECT * FROM data where bulan = 'januari' && tahun='2022' && nama_kategori='$_GET[namakategori]'");
    $rowjanuari = mysqli_fetch_array($Sqljanuari);

    $mfejanuari = round($rowjanuari['jumlah'] - $wmajanuari);
    $maejanuari = abs($mfejanuari);
    $msejanuari = $mfejanuari * $mfejanuari;
    $Mapejanuari = round($rowjanuari['jumlah'] / $mfejanuari);

    // Bulan Februari
    $totalmfe = $mfeoktober + $mfenovember + $mfedesember + $mfejanuari;
    $totalmae = $maeoktober + $maenovember + $maedesember + $maejanuari;
    $totalmse = $mseoktober + $msenovember + $msedesember + $msejanuari;
    $totalmape = $Mapeoktober + $Mapenovember + $Mapedesember + $Mapejanuari;

    $totalmfefeb = $totalmfe / (7 - 3);

    $totalmaefeb = $totalmae / (7 - 3);

    $totalmsefeb = $totalmse / (7 - 3);

    $totalmapefeb = $totalmape / (7 - 3);

    $november2 = $rownovember['jumlah'] * 1;
    $desember1 = $rowdesember['jumlah'] * 2;
    $januari = $rowjanuari['jumlah'] * 3;

    $jmlhfebruari =  $november2 + $desember1 + $januari;
    $wmafebruari = round($jmlhfebruari / 6);

    // Bulan Maret
    $totalmfemaret = $mfeoktober + $mfenovember + $mfedesember + $mfejanuari;
    $totalmaemaret = $maeoktober + $maenovember + $maedesember + $maejanuari;
    $totalmsemaret = $mseoktober + $msenovember + $msedesember + $msejanuari;
    $totalmapemaret = $Mapeoktober + $Mapenovember + $Mapedesember + $Mapejanuari;

    $totalmfemar = $totalmfemaret / (7 - 3);

    $totalmaemar = $totalmaemaret / (7 - 3);

    $totalmsemar = $totalmsemaret / (7 - 3);

    $totalmapemar = $totalmapemaret / (7 - 3);

    $desember2 = $rowdesember['jumlah'] * 1;
    $januari1 = $rowjanuari['jumlah'] * 2;
    $februari = $wmafebruari * 3;

    $jmlhmaret =  $desember2 + $januari1 + $februari;
    $wmamaret = round($jmlhmaret / 6);

    // Bulan Appril
    $totalmfeappril = $mfeoktober + $mfenovember + $mfedesember + $mfejanuari;
    $totalmaeappril = $maeoktober + $maenovember + $maedesember + $maejanuari;
    $totalmseappril = $mseoktober + $msenovember + $msedesember + $msejanuari;
    $totalmapeappril = $Mapeoktober + $Mapenovember + $Mapedesember + $Mapejanuari;

    $totalmfeappril = $totalmfeappril / (7 - 3);

    $totalmaeappril = $totalmaeappril / (7 - 3);

    $totalmseappril = $totalmseappril / (7 - 3);

    $totalmapeappril = $totalmapeappril / (7 - 3);

    $januari2 = $rowjanuari['jumlah'] * 1;
    $februari1 = $wmafebruari * 2;
    $maret = $wmamaret * 3;

    $jmlhappril =  $januari2 + $februari1 + $maret;
    $wmaappril = round($jmlhappril / 6);

    // Bulan mei
    $mfemei = $mfeoktober + $mfenovember + $mfedesember + $mfejanuari;
    $maemei = $maeoktober + $maenovember + $maedesember + $maejanuari;
    $msemei = $mseoktober + $msenovember + $msedesember + $msejanuari;
    $mapemei = $Mapeoktober + $Mapenovember + $Mapedesember + $Mapejanuari;

    $totalmfemei = $mfemei / (7 - 3);

    $totalmaemei = $maemei / (7 - 3);

    $totalmsemei = $msemei / (7 - 3);

    $totalmapemei = $mapemei / (7 - 3);

    $februari2 = $wmafebruari * 1;
    $maret1 = $wmamaret * 2;
    $appril = $wmaappril * 3;

    $jmlhmei =  $februari2 + $maret1 + $appril;
    $wmamei = round($jmlhmei / 6);

    // Bulan juni
    $totalmfejun = $mfeoktober + $mfenovember + $mfedesember + $mfejanuari;
    $totalmaejun = $maeoktober + $maenovember + $maedesember + $maejanuari;
    $totalmsejun = $mseoktober + $msenovember + $msedesember + $msejanuari;
    $totalmapejun = $Mapeoktober + $Mapenovember + $Mapedesember + $Mapejanuari;

    $totalmfejun = $totalmfejun / (7 - 3);

    $totalmaejun = $totalmaejun / (7 - 3);

    $totalmsejun = $totalmsejun / (7 - 3);

    $totalmapejun = $totalmapejun / (7 - 3);

    $maret2 = $wmamaret * 1;
    $appril1 = $wmaappril * 2;
    $mei = $wmamei * 3;

    $jmlhjun =  $maret2 + $appril1 + $mei;
    $wmajun = round($jmlhjun / 6);

    // Bulan juli
    $mfejuli = $mfeoktober + $mfenovember + $mfedesember + $mfejanuari;
    $maejuli = $maeoktober + $maenovember + $maedesember + $maejanuari;
    $msejuli = $mseoktober + $msenovember + $msedesember + $msejanuari;
    $mapejuli = $Mapeoktober + $Mapenovember + $Mapedesember + $Mapejanuari;

    $totalmfejuli = $mfejuli / (7 - 3);

    $totalmaejuli = $maejuli / (7 - 3);

    $totalmsejuli = $msejuli / (7 - 3);

    $totalmapejuli = $mapejuli / (7 - 3);

    $appril2 = $wmaappril * 1;
    $mei1 = $wmamei * 2;
    $juni = $wmajun * 3;

    $jmlhjuli =  $appril2 + $mei1 + $juni;
    $wmajuli = round($jmlhjuli / 6);

    // Bulan aGUSTUS
    $mfeagus = $mfeoktober + $mfenovember + $mfedesember + $mfejanuari;
    $maeagus = $maeoktober + $maenovember + $maedesember + $maejanuari;
    $mseagus = $mseoktober + $msenovember + $msedesember + $msejanuari;
    $mapeagus = $Mapeoktober + $Mapenovember + $Mapedesember + $Mapejanuari;

    $totalmfeagus = $mfeagus / (7 - 3);

    $totalmaeagus = $maeagus / (7 - 3);

    $totalmseagus = $mseagus / (7 - 3);

    $totalmapeagus = $mapeagus / (7 - 3);

    $mei2 = $wmamei * 1;
    $juni1 = $wmajun * 2;
    $juli = $wmajuli * 3;

    $jmlhagus =  $mei2 + $juni1 + $juli;
    $wmaagus = round($jmlhagus / 6);

    // Bulan September
    $mfesep = $mfeoktober + $mfenovember + $mfedesember + $mfejanuari;
    $maesep = $maeoktober + $maenovember + $maedesember + $maejanuari;
    $msesep = $mseoktober + $msenovember + $msedesember + $msejanuari;
    $mapesep = $Mapeoktober + $Mapenovember + $Mapedesember + $Mapejanuari;

    $totalmfesep = $mfesep / (7 - 3);

    $totalmaesep = $maesep / (7 - 3);

    $totalmsesep = $msesep / (7 - 3);

    $totalmapesep = $mapesep / (7 - 3);

    $juni2 = $wmajun * 1;
    $juli1 = $wmajuli * 2;
    $agustus = $wmaagus * 3;

    $jmlhsep =  $juni2 + $juli1 + $agustus;
    $wmasep = round($jmlhsep / 6);

    // Bulan Oktober
    $mfeokto = $mfeoktober + $mfenovember + $mfedesember + $mfejanuari;
    $maeokto = $maeoktober + $maenovember + $maedesember + $maejanuari;
    $mseokto = $mseoktober + $msenovember + $msedesember + $msejanuari;
    $mapeokto = $Mapeoktober + $Mapenovember + $Mapedesember + $Mapejanuari;

    $totalmfeokto = $mfeokto / (7 - 3);

    $totalmaeokto = $maeokto / (7 - 3);

    $totalmseokto = $mseokto / (7 - 3);

    $totalmapeokto = $mapeokto / (7 - 3);

    $juli2 = $wmajuli * 1;
    $agustus1 = $wmaagus * 2;
    $september1 = $wmasep * 3;

    $jmlhokto =  $juli2 + $agustus1 + $september1;
    $wmaokto = round($jmlhokto / 6);

    // Bulan November
    $mfenov = $mfeoktober + $mfenovember + $mfedesember + $mfejanuari;
    $maenov = $maeoktober + $maenovember + $maedesember + $maejanuari;
    $msenov = $mseoktober + $msenovember + $msedesember + $msejanuari;
    $Mapenov = $Mapeoktober + $Mapenovember + $Mapedesember + $Mapejanuari;

    $totalmfenov = $mfenov / (7 - 3);

    $totalmaenov = $maenov / (7 - 3);

    $totalmsenov = $msenov / (7 - 3);

    $totalmapenov = $Mapenov / (7 - 3);

    $agustus2 = $wmaagus * 1;
    $september1 = $wmasep * 2;
    $oktober1 = $wmaokto * 3;

    $jmlhnov =  $agustus2 + $september1 + $oktober1;
    $wmanov = round($jmlhnov / 6);

    // Bulan Desember
    $mfedes = $mfeoktober + $mfenovember + $mfedesember + $mfejanuari;
    $maedes = $maeoktober + $maenovember + $maedesember + $maejanuari;
    $msedes = $mseoktober + $msenovember + $msedesember + $msejanuari;
    $Mapedes = $Mapeoktober + $Mapenovember + $Mapedesember + $Mapejanuari;

    $totalmfedes = $mfedes / (7 - 3);

    $totalmaedes = $maedes / (7 - 3);

    $totalmsedes = $msedes / (7 - 3);

    $totalmapedes = $Mapedes / (7 - 3);

    $september2 = $wmasep * 1;
    $oktober2 = $wmaokto * 2;
    $november1 = $wmanov * 3;

    $jmlhdes =  $september2 + $oktober2 + $november1;
    $wmades = round($jmlhdes / 6);

?>

    <?php
    if ($_GET['Bulan'] == 'Febuari') {
    ?>
        <div class="row col-lg-12">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <?php
                        $Sql = mysqli_query($con, "SELECT * FROM kategori where nama_kategori='$_GET[namakategori]'");
                        $row = mysqli_fetch_array($Sql);

                        ?>
                        <h4 class="text-white">Hasil Prediksi Bulan Februari Kategori <?= $row['nama_kategori']  ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Bulan</th>
                                                        <th>Tahun</th>
                                                        <th>Jumlah Penjualan</th>
                                                        <th>WMA</th>
                                                        <th>MFE</th>
                                                        <th>MAE</th>
                                                        <th>MSE</th>
                                                        <th>MAPE</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <td>1</td>
                                                    <td>OKTOBER</td>
                                                    <td>2021</td>
                                                    <?php
                                                    $Sql = mysqli_query($con, "SELECT * FROM data where nama_kategori='$_GET[namakategori]' && bulan='Oktober' && tahun='2021'");
                                                    $row = mysqli_fetch_array($Sql);

                                                    ?>
                                                    <td><?= $row['jumlah'] ?></td>
                                                    <td><?= $wmaoktober ?></td>
                                                    <td><?= $mfeoktober ?></td>
                                                    <td><?= $maeoktober ?></td>
                                                    <td><?= $mseoktober ?></td>
                                                    <td><?= $Mapeoktober ?> %</td>
                                                </tbody>

                                                <tbody>
                                                    <td>2</td>
                                                    <td>November</td>
                                                    <td>2021</td>
                                                    <?php
                                                    $Sql = mysqli_query($con, "SELECT * FROM data where nama_kategori='$_GET[namakategori]' && bulan='November' && tahun='2021'");
                                                    $row = mysqli_fetch_array($Sql);

                                                    ?>
                                                    <td><?= $row['jumlah'] ?></td>
                                                    <td><?= $wmanovember ?></td>
                                                    <td><?= $mfenovember ?></td>
                                                    <td><?= $maenovember ?></td>
                                                    <td><?= $msenovember ?></td>
                                                    <td><?= $Mapenovember ?> %</td>
                                                </tbody>


                                                <tbody>
                                                    <td>3</td>
                                                    <td>Desember</td>
                                                    <td>2021</td>
                                                    <?php
                                                    $Sql = mysqli_query($con, "SELECT * FROM data where nama_kategori='$_GET[namakategori]' && bulan='Desember' && tahun='2021'");
                                                    $row = mysqli_fetch_array($Sql);

                                                    ?>
                                                    <td><?= $row['jumlah'] ?></td>
                                                    <td><?= $wmadesember ?></td>
                                                    <td><?= $mfedesember ?></td>
                                                    <td><?= $maedesember ?></td>
                                                    <td><?= $msedesember ?></td>
                                                    <td><?= $Mapedesember ?> %</td>
                                                </tbody>


                                                <tbody>
                                                    <td>4</td>
                                                    <td>Januari</td>
                                                    <td>2021</td>
                                                    <?php
                                                    $Sql = mysqli_query($con, "SELECT * FROM data where nama_kategori='$_GET[namakategori]' && bulan='Januari' && tahun='2022'");
                                                    $row = mysqli_fetch_array($Sql);

                                                    ?>
                                                    <td><?= $row['jumlah'] ?></td>
                                                    <td><?= $wmajanuari ?></td>
                                                    <td><?= $mfejanuari ?></td>
                                                    <td><?= $maejanuari ?></td>
                                                    <td><?= $msejanuari ?></td>
                                                    <td><?= $Mapejanuari ?> %</td>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td class="text-right font-weight-bold" colspan="5">
                                                            Total
                                                        </td>
                                                        <td class="font-weight-bold">
                                                            <?= $totalmfe ?>
                                                        </td>
                                                        <td class="font-weight-bold">
                                                            <?= $totalmae ?>
                                                        </td>
                                                        <td class="font-weight-bold">
                                                            <?= $totalmse ?>
                                                        </td>
                                                        <td class="font-weight-bold">
                                                            <?= $totalmape ?> %
                                                        </td>
                                                    </tr>
                                                    <tr class="bg-success text-white">
                                                        <td>5</td>
                                                        <td>Februari</td>
                                                        <td>2022</td>
                                                        <td></td>
                                                        <td><?= $wmafebruari ?></td>
                                                        <td><?= round($totalmfefeb) ?></td>
                                                        <td><?= round($totalmaefeb) ?></td>
                                                        <td><?= round($totalmsefeb) ?></td>
                                                        <td><?= round($totalmapefeb) ?> %</td>
                                                    </tr>


                                                </tfoot>
                                                </tbody>
                                            </table>
                                            <form action="" enctype="multipart/form-data" method="post">
                                                <div class="card-footer bg-white text-right">
                                                    <button class="btn btn-primary mr-1" type="submit" name="submit">Lihat Rekomendasi</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php
    } else if ($_GET['Bulan'] == 'Maret') {

    ?>
        <div class="row col-lg-12">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <?php
                        $Sql = mysqli_query($con, "SELECT * FROM kategori where nama_kategori='$_GET[namakategori]'");
                        $row = mysqli_fetch_array($Sql);

                        ?>
                        <h4 class="text-white">Hasil Prediksi Bulan <?= $_GET['Bulan'] ?> Kategori <?= $row['nama_kategori']  ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Bulan</th>
                                                        <th>Tahun</th>
                                                        <th>Jumlah Penjualan</th>
                                                        <th>WMA</th>
                                                        <th>MFE</th>
                                                        <th>MAE</th>
                                                        <th>MSE</th>
                                                        <th>MAPE</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <td>5</td>
                                                    <td><?= $_GET['Bulan'] ?></td>
                                                    <td>2022</td>
                                                    <td>0</td>
                                                    <td><?= $wmamaret ?></td>
                                                    <td><?= round($totalmfemar) ?></td>
                                                    <td><?= round($totalmaemar) ?></td>
                                                    <td><?= round($totalmsemar) ?></td>
                                                    <td><?= round($totalmapemar) ?> %</td>
                                                    <br>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php
    } else if ($_GET['Bulan'] == 'Appril') {

    ?>
        <div class="row col-lg-12">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <?php
                        $Sql = mysqli_query($con, "SELECT * FROM kategori where nama_kategori='$_GET[namakategori]'");
                        $row = mysqli_fetch_array($Sql);

                        ?>
                        <h4 class="text-white">Hasil Prediksi Bulan <?= $_GET['Bulan'] ?> Kategori <?= $row['nama_kategori']  ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Bulan</th>
                                                        <th>Tahun</th>
                                                        <th>Jumlah Penjualan</th>
                                                        <th>WMA</th>
                                                        <th>MFE</th>
                                                        <th>MAE</th>
                                                        <th>MSE</th>
                                                        <th>MAPE</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <td>5</td>
                                                    <td><?= $_GET['Bulan'] ?></td>
                                                    <td>2022</td>
                                                    <td>0</td>
                                                    <td><?= $wmaappril ?></td>
                                                    <td><?= round($totalmfeappril) ?></td>
                                                    <td><?= round($totalmaeappril) ?></td>
                                                    <td><?= round($totalmseappril) ?></td>
                                                    <td><?= round($totalmapeappril) ?> %</td>
                                                    <br>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php
    } else if ($_GET['Bulan'] == 'Mei') {

    ?>
        <div class="row col-lg-12">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <?php
                        $Sql = mysqli_query($con, "SELECT * FROM kategori where nama_kategori='$_GET[namakategori]'");
                        $row = mysqli_fetch_array($Sql);

                        ?>
                        <h4 class="text-white">Hasil Prediksi Bulan <?= $_GET['Bulan'] ?> Kategori <?= $row['nama_kategori']  ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Bulan</th>
                                                        <th>Tahun</th>
                                                        <th>Jumlah Penjualan</th>
                                                        <th>WMA</th>
                                                        <th>MFE</th>
                                                        <th>MAE</th>
                                                        <th>MSE</th>
                                                        <th>MAPE</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <td>5</td>
                                                    <td><?= $_GET['Bulan'] ?></td>
                                                    <td>2022</td>
                                                    <td>0</td>
                                                    <td><?= $wmamei ?></td>
                                                    <td><?= round($totalmfemei) ?></td>
                                                    <td><?= round($totalmaemei) ?></td>
                                                    <td><?= round($totalmsemei) ?></td>
                                                    <td><?= round($totalmapemei) ?> %</td>
                                                    <br>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <?php
    } else if ($_GET['Bulan'] == 'Juni') {

    ?>
        <div class="row col-lg-12">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <?php
                        $Sql = mysqli_query($con, "SELECT * FROM kategori where nama_kategori='$_GET[namakategori]'");
                        $row = mysqli_fetch_array($Sql);

                        ?>
                        <h4 class="text-white">Hasil Prediksi Bulan <?= $_GET['Bulan'] ?> Kategori <?= $row['nama_kategori']  ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Bulan</th>
                                                        <th>Tahun</th>
                                                        <th>Jumlah Penjualan</th>
                                                        <th>WMA</th>
                                                        <th>MFE</th>
                                                        <th>MAE</th>
                                                        <th>MSE</th>
                                                        <th>MAPE</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <td>5</td>
                                                    <td><?= $_GET['Bulan'] ?></td>
                                                    <td>2022</td>
                                                    <td>0</td>
                                                    <td><?= $wmajun ?></td>
                                                    <td><?= round($totalmfejun) ?></td>
                                                    <td><?= round($totalmaejun) ?></td>
                                                    <td><?= round($totalmsejun) ?></td>
                                                    <td><?= round($totalmapejun) ?> %</td>
                                                    <br>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php
    } else if ($_GET['Bulan'] == 'Juli') {

    ?>
        <div class="row col-lg-12">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <?php
                        $Sql = mysqli_query($con, "SELECT * FROM kategori where nama_kategori='$_GET[namakategori]'");
                        $row = mysqli_fetch_array($Sql);

                        ?>
                        <h4 class="text-white">Hasil Prediksi Bulan <?= $_GET['Bulan'] ?> Kategori <?= $row['nama_kategori']  ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Bulan</th>
                                                        <th>Tahun</th>
                                                        <th>Jumlah Penjualan</th>
                                                        <th>WMA</th>
                                                        <th>MFE</th>
                                                        <th>MAE</th>
                                                        <th>MSE</th>
                                                        <th>MAPE</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <td>5</td>
                                                    <td><?= $_GET['Bulan'] ?></td>
                                                    <td>2022</td>
                                                    <td>0</td>
                                                    <td><?= $wmajuli ?></td>
                                                    <td><?= round($totalmfejuli) ?></td>
                                                    <td><?= round($totalmaejuli) ?></td>
                                                    <td><?= round($totalmsejuli) ?></td>
                                                    <td><?= round($totalmapejuli) ?> %</td>
                                                    <br>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } else if ($_GET['Bulan'] == 'agustus') {

    ?>
        <div class="row col-lg-12">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <?php
                        $Sql = mysqli_query($con, "SELECT * FROM kategori where nama_kategori='$_GET[namakategori]'");
                        $row = mysqli_fetch_array($Sql);

                        ?>
                        <h4 class="text-white">Hasil Prediksi Bulan <?= $_GET['Bulan'] ?> Kategori <?= $row['nama_kategori']  ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Bulan</th>
                                                        <th>Tahun</th>
                                                        <th>Jumlah Penjualan</th>
                                                        <th>WMA</th>
                                                        <th>MFE</th>
                                                        <th>MAE</th>
                                                        <th>MSE</th>
                                                        <th>MAPE</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <td>5</td>
                                                    <td><?= $_GET['Bulan'] ?></td>
                                                    <td>2022</td>
                                                    <td>0</td>
                                                    <td><?= $wmaagus ?></td>
                                                    <td><?= round($totalmfeagus) ?></td>
                                                    <td><?= round($totalmaeagus) ?></td>
                                                    <td><?= round($totalmaeagus) ?></td>
                                                    <td><?= round($totalmapeagus) ?> %</td>
                                                    <br>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <?php
    } else if ($_GET['Bulan'] == 'September') {

    ?>
        <div class="row col-lg-12">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <?php
                        $Sql = mysqli_query($con, "SELECT * FROM kategori where nama_kategori='$_GET[namakategori]'");
                        $row = mysqli_fetch_array($Sql);

                        ?>
                        <h4 class="text-white">Hasil Prediksi Bulan <?= $_GET['Bulan'] ?> Kategori <?= $row['nama_kategori']  ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Bulan</th>
                                                        <th>Tahun</th>
                                                        <th>Jumlah Penjualan</th>
                                                        <th>WMA</th>
                                                        <th>MFE</th>
                                                        <th>MAE</th>
                                                        <th>MSE</th>
                                                        <th>MAPE</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <td>5</td>
                                                    <td><?= $_GET['Bulan'] ?></td>
                                                    <td>2022</td>
                                                    <td>0</td>
                                                    <td><?= $wmasep ?></td>
                                                    <td><?= round($totalmfesep) ?></td>
                                                    <td><?= round($totalmaesep) ?></td>
                                                    <td><?= round($totalmaesep) ?></td>
                                                    <td><?= round($totalmapesep) ?> %</td>
                                                    <br>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <?php
    } else if ($_GET['Bulan'] == 'Oktober') {

    ?>
        <div class="row col-lg-12">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <?php
                        $Sql = mysqli_query($con, "SELECT * FROM kategori where nama_kategori='$_GET[namakategori]'");
                        $row = mysqli_fetch_array($Sql);

                        ?>
                        <h4 class="text-white">Hasil Prediksi Bulan <?= $_GET['Bulan'] ?> Kategori <?= $row['nama_kategori']  ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Bulan</th>
                                                        <th>Tahun</th>
                                                        <th>Jumlah Penjualan</th>
                                                        <th>WMA</th>
                                                        <th>MFE</th>
                                                        <th>MAE</th>
                                                        <th>MSE</th>
                                                        <th>MAPE</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <td>5</td>
                                                    <td><?= $_GET['Bulan'] ?></td>
                                                    <td>2022</td>
                                                    <td>0</td>
                                                    <td><?= $wmaokto ?></td>
                                                    <td><?= round($totalmfeokto) ?></td>
                                                    <td><?= round($totalmaeokto) ?></td>
                                                    <td><?= round($totalmaeokto) ?></td>
                                                    <td><?= round($totalmapeokto) ?> %</td>
                                                    <br>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php
    } else if ($_GET['Bulan'] == 'November') {

    ?>
        <div class="row col-lg-12">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <?php
                        $Sql = mysqli_query($con, "SELECT * FROM kategori where nama_kategori='$_GET[namakategori]'");
                        $row = mysqli_fetch_array($Sql);

                        ?>
                        <h4 class="text-white">Hasil Prediksi Bulan <?= $_GET['Bulan'] ?> Kategori <?= $row['nama_kategori']  ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Bulan</th>
                                                        <th>Tahun</th>
                                                        <th>Jumlah Penjualan</th>
                                                        <th>WMA</th>
                                                        <th>MFE</th>
                                                        <th>MAE</th>
                                                        <th>MSE</th>
                                                        <th>MAPE</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <td>5</td>
                                                    <td><?= $_GET['Bulan'] ?></td>
                                                    <td>2022</td>
                                                    <td>0</td>
                                                    <td><?= $wmanov ?></td>
                                                    <td><?= round($totalmfenov) ?></td>
                                                    <td><?= round($totalmaemarnov) ?></td>
                                                    <td><?= round($totalmaenov) ?></td>
                                                    <td><?= round($totalmapenov) ?> %</td>
                                                    <br>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php
    } else if ($_GET['Bulan'] == 'Desember') {

    ?>
        <div class="row col-lg-12">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <?php
                        $Sql = mysqli_query($con, "SELECT * FROM kategori where nama_kategori='$_GET[namakategori]'");
                        $row = mysqli_fetch_array($Sql);

                        ?>
                        <h4 class="text-white">Hasil Prediksi Bulan <?= $_GET['Bulan'] ?> Kategori <?= $row['nama_kategori']  ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Bulan</th>
                                                        <th>Tahun</th>
                                                        <th>Jumlah Penjualan</th>
                                                        <th>WMA</th>
                                                        <th>MFE</th>
                                                        <th>MAE</th>
                                                        <th>MSE</th>
                                                        <th>MAPE</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <td>5</td>
                                                    <td><?= $_GET['Bulan'] ?></td>
                                                    <td>2022</td>
                                                    <td>0</td>
                                                    <td><?= $wmades ?></td>
                                                    <td><?= round($totalmfedes) ?></td>
                                                    <td><?= round($totalmaedes) ?></td>
                                                    <td><?= round($totalmaedes) ?></td>
                                                    <td><?= round($totalmapedes) ?> %</td>
                                                    <br>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php

    }
    ?>
    <?php

    if (isset($_POST['submit'])) {

        $idadmin = @$_SESSION['id_admin'];
        $idkategori = $_GET['namakategori'];
        $bulan = $_GET['Bulan'];
        $tahun = $_GET['Tahun'];

        $hasil = $wmafebruari;
        $del1 = mysqli_query($con, "DELETE FROM peramalan WHERE nama_kategori='$idkategori'");
        $saveoktober = mysqli_query($con, "INSERT INTO peramalan VALUES ('', '$idadmin', '$idkategori', 'Oktober', '2021', '$rowoktober[jumlah]','$wmaoktober')") or die(mysqli_error($con));
        $savenovember = mysqli_query($con, "INSERT INTO peramalan VALUES ('', '$idadmin', '$idkategori', 'November', '2021', '$rownovember[jumlah]','$wmanovember')") or die(mysqli_error($con));
        $savedesember = mysqli_query($con, "INSERT INTO peramalan VALUES ('', '$idadmin', '$idkategori', 'Desember', '2021', '$rowdesember[jumlah]', '$wmadesember')") or die(mysqli_error($con));
        $savejanuari = mysqli_query($con, "INSERT INTO peramalan VALUES ('', '$idadmin', '$idkategori', 'Januari', '2022', '$rowjanuari[jumlah]', '$wmajanuari')") or die(mysqli_error($con));


        // mengambil data barang dengan kode paling besar
        $query = mysqli_query($con, "SELECT max(id_peramalan) as maxKode FROM peramalan ");
        $data = mysqli_fetch_array($query);
        $id = $data['maxKode'];

        // // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
        // // dan diubah ke integer dengan (int)
        // $urutan = (int) substr($id, 1, 1);
        $urutan = $id;
        $urutan++;
        $huruf = "";
        $id = $huruf . sprintf("%03s", $urutan);

        $Sqljanuari1 = mysqli_query($con, "SELECT * FROM data where bulan = 'januari' && tahun='2022' && nama_kategori='$_GET[namakategori]'");
        $rowjanuari1 = mysqli_fetch_array($Sqljanuari1);
        $januarihasil = $rowjanuari1['jumlah'];
        if ($hasil > $januarihasil) {
            $rekomendasi = 'Perbanyak Stok Barang';

            $savefebruari = mysqli_query($con, "INSERT INTO peramalan VALUES ('$id', '$idadmin', '$idkategori', '$bulan', '$tahun', '0', '$hasil')") or die(mysqli_error($con));
            $saverekomendasi = mysqli_query($con, "INSERT INTO rekomendasi VALUES ('', '$id', '$rekomendasi')") or die(mysqli_error($con));
        } else if ($hasil < $januarihasil) {
            $rekomendasi = 'Kurangi Stok Barang';

            $savefebruari = mysqli_query($con, "INSERT INTO peramalan VALUES ('$id', '$idadmin', '$idkategori', '$bulan', '$tahun', '0', '$hasil')") or die(mysqli_error($con));
            $saverekomendasi = mysqli_query($con, "INSERT INTO rekomendasi VALUES ('', '$id', '$rekomendasi')") or die(mysqli_error($con));
        } else if ($hasil == $januarihasil) {
            $rekomendasi = 'Pertahankan Stok Barang';

            $savefebruari = mysqli_query($con, "INSERT INTO peramalan VALUES ('$id', '$idadmin', '$idkategori', '$bulan', '$tahun', '0', '$hasil')") or die(mysqli_error($con));
            $saverekomendasi = mysqli_query($con, "INSERT INTO rekomendasi VALUES ('', '$id', '$rekomendasi')") or die(mysqli_error($con));
        }
    ?>

        <div class="row col-lg-12">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0 admin" id="admin">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Bulan</th>
                                            <th>Tahun</th>
                                            <th>Kategori</th>
                                            <th>Hasil</th>
                                            <th>Rekomendasi</th>
                                            <th>Keterangan</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $SqlQuery = mysqli_query($con, "SELECT * FROM peramalan INNER JOIN rekomendasi as r on peramalan.id_peramalan=r.id_peramalan WHERE peramalan.nama_kategori='$_GET[namakategori]'");
                                        $no = 1;
                                        if (mysqli_num_rows($SqlQuery) > 0) {
                                            while ($row = mysqli_fetch_array($SqlQuery)) {
                                        ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $row['bulan'] ?></td>
                                                    <td><?= $row['tahun'] ?></td>
                                                    <td><?= $row['nama_kategori'] ?></td>
                                                    <td><?= $row['hasil_peramalan'] ?></td>
                                                    <td><?= $row['rekomendet'] ?></td>
                                                    <?php
                                                    if ($hasil > $januarihasil) {
                                                    ?>
                                                        <td>karena hasil prediksi penjualan produk katergori <?= $_GET['namakategori'] ?> pada bulan yg akan datang hasilnya meningkat,
                                                            karena lebih banyak barang terjual dari pada bulan sebelumnya)</td>
                                                    <?php
                                                    } else if ($hasil == $januarihasil) {
                                                    ?>
                                                        <td>karena hasil prediksi penjualan produk kategori <?= $_GET['namakategori'] ?> pada bulan yg akan datang hasilnya sama dengan jumlah penjualan produk pada bulan sebelumnya,
                                                            oleh karena itu stok produk di samakan seperti jumlah penjualan pada bulan sebelumnya</td>
                                                    <?php
                                                    } else if ($hasil < $januarihasil) {
                                                    ?>
                                                        <td>karena hasil prediksi penjualan produk katergori <?= $_GET['namakategori'] ?> pada bulan yang akan datang hasilnya menurun
                                                            dari pada bulan sebelumnya untuk itu jumlah stok produk harus di kurangi agar tidak ada penumpukan barang</td>
                                                    <?php
                                                    }
                                                    ?>
                                                </tr>
                                        <?php
                                            }
                                        } else {
                                            echo "<tr><td colspan=\"4\" align=\"center\">data tidak ada</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php
    }

        ?>

        <?php
        if ($_GET['Bulan'] == 'Febuari') {
        ?>
            <div class="row col-lg-12 mt-5">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-info">

                            <h4 class="text-white text-center">
                                Hasil prediksi penjualan kategori <?= $_GET['namakategori'] ?> pada bulan <?= $_GET['Bulan'] ?> adalah sebanyak <?=
                                                                                                                                                $wmafebruari;
                                                                                                                                                ?> produk yang akan terjual </h4>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php

        } else if ($_GET['Bulan'] == 'Maret') {
    ?>
        <div class="row col-lg-12 mt-5">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-info">

                        <h4 class="text-white text-center">Hasil Prediksi Bulan <?= $_GET['Bulan'] ?> adalah <?=

                                                                                                                $wmamaret;
                                                                                                                ?> produk yang akan terjual </h4>
                        <?php
                        if ($wmamaret > $wmafebruari) {
                        ?>

                            <h4 class="text-white text-center">Rekomendasi Bulan <?= $_GET['Bulan'] ?> adalah Tingkatkan Stok
                                karena hasil prediksi penjualan produk katergori <?= $_GET['namakategori'] ?> pada bulan yang akan datang hasilnya menurun
                                dari pada bulan sebelumnya untuk itu jumlah stok produk harus di kurangi agar tidak ada penumpukan barang</h4>
                        <?php
                        } else if ($wmamaret == $wmafebruari) {
                        ?>
                            <h4 class="text-white text-center">Rekomendasi Bulan <?= $_GET['Bulan'] ?> adalah Pertahankan Stok
                                karena hasil prediksi penjualan produk kategori <?= $_GET['namakategori'] ?> pada bulan yg akan datang hasilnya sama dengan jumlah penjualan produk pada bulan sebelumnya,
                                oleh karena itu stok produk di samakan seperti jumlah penjualan pada bulan sebelumnya</h4>
                        <?php
                        } else if ($wmamaret < $wmafebruari) {
                        ?>

                            <h4 class="text-white text-center">Rekomendasi Bulan <?= $_GET['Bulan'] ?> adalah Kurangi Stok
                                karena hasil prediksi penjualan produk katergori <?= $_GET['namakategori'] ?> pada bulan yg akan datang hasilnya meningkat,
                                karena lebih banyak barang terjual dari pada bulan sebelumnya</h4>

                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        </div>

    <?php

        } else if ($_GET['Bulan'] == 'Appril') {
    ?>

        <div class="row col-lg-12 mt-5">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-info">

                        <h4 class="text-white text-center">
                            <h4 class="text-white text-center">
                                Hasil prediksi penjualan kategori <?= $_GET['namakategori'] ?> pada bulan <?= $_GET['Bulan'] ?> adalah sebanyak <?=
                                                                                                                                                $wmamaret;
                                                                                                                                                ?> produk yang akan terjual </h4>
                            <?php
                            if ($wmaappril > $wmamaret) {
                            ?>

                                <h4 class="text-white text-center">Rekomendasi Bulan <?= $_GET['Bulan'] ?> adalah Tingkatkan Stok
                                    karena hasil prediksi penjualan produk katergori <?= $_GET['namakategori'] ?> pada bulan yang akan datang hasilnya menurun
                                    dari pada bulan sebelumnya untuk itu jumlah stok produk harus di kurangi agar tidak ada penumpukan barang</h4>

                            <?php
                            } else if ($wmaappril == $wmamaret) {
                            ?>
                                <h4 class="text-white text-center">Rekomendasi Bulan <?= $_GET['Bulan'] ?> adalah Pertahankan Stok
                                    karena hasil prediksi penjualan produk kategori <?= $_GET['namakategori'] ?> pada bulan yg akan datang hasilnya sama dengan jumlah penjualan produk pada bulan sebelumnya,
                                    oleh karena itu stok produk di samakan seperti jumlah penjualan pada bulan sebelumnya</h4>
                            <?php
                            } else if ($wmaappril < $wmamaret) {
                            ?>
                                <h4 class="text-white text-center">Rekomendasi Bulan <?= $_GET['Bulan'] ?> adalah Kurangi Stok
                                    adalah Kurangi Stok
                                    karena hasil prediksi penjualan produk katergori <?= $_GET['namakategori'] ?> pada bulan yg akan datang hasilnya meningkat,
                                    karena lebih banyak barang terjual dari pada bulan sebelumnya</h4>
                            <?php
                            }
                            ?>
                    </div>
                </div>
            </div>
        </div>
        </div>

    <?php

        } else if ($_GET['Bulan'] == 'Mei') {
    ?>

        <div class="row col-lg-12 mt-5">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-info">

                        <h4 class="text-white text-center"> Hasil prediksi penjualan kategori <?= $_GET['namakategori'] ?> pada bulan <?= $_GET['Bulan'] ?> adalah sebanyak <?=
                                                                                                                                                                            $wmamei;
                                                                                                                                                                            ?> produk yang akan terjual </h4>
                        <?php
                        if ($wmamei > $wmaappril) {
                        ?>
                            <h4 class="text-white text-center">Rekomendasi Bulan <?= $_GET['Bulan'] ?> adalah Tingkatkan Stok
                                karena hasil prediksi penjualan produk katergori <?= $_GET['namakategori'] ?> pada bulan yang akan datang hasilnya menurun
                                dari pada bulan sebelumnya untuk itu jumlah stok produk harus di kurangi agar tidak ada penumpukan barang</h4>

                        <?php
                        } else if ($wmamei == $wmaappril) {
                        ?>
                            <h4 class="text-white text-center">Rekomendasi Bulan <?= $_GET['Bulan'] ?> adalah Pertahankan Stok
                                karena hasil prediksi penjualan produk kategori <?= $_GET['namakategori'] ?> pada bulan yg akan datang hasilnya sama dengan jumlah penjualan produk pada bulan sebelumnya,
                                oleh karena itu stok produk di samakan seperti jumlah penjualan pada bulan sebelumnya</h4>
                        <?php
                        } else if ($wmamei < $wmaappril) {
                        ?>
                            <h4 class="text-white text-center">Rekomendasi Bulan <?= $_GET['Bulan'] ?> adalah Kurangi Stok
                                adalah Kurangi Stok
                                karena hasil prediksi penjualan produk katergori <?= $_GET['namakategori'] ?> pada bulan yg akan datang hasilnya meningkat,
                                karena lebih banyak barang terjual dari pada bulan sebelumnya</h4>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        </div>

    <?php

        } else if ($_GET['Bulan'] == 'Juni') {
    ?>


        <div class="row col-lg-12 mt-5">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-info">

                        <h4 class="text-white text-center"> Hasil prediksi penjualan kategori <?= $_GET['namakategori'] ?> pada bulan <?= $_GET['Bulan'] ?> adalah sebanyak <?=

                                                                                                                                                                            $wmajun;
                                                                                                                                                                            ?> produk yang akan terjual </h4>
                        <?php
                        if ($wmajun > $wmamei) {
                        ?>
                            <h4 class="text-white text-center">Rekomendasi Bulan <?= $_GET['Bulan'] ?> adalah Kurangi Stok
                                adalah Kurangi Stok
                                karena hasil prediksi penjualan produk katergori <?= $_GET['namakategori'] ?> pada bulan yg akan datang hasilnya meningkat,
                                karena lebih banyak barang terjual dari pada bulan sebelumnya</h4>
                        <?php
                        } else if ($wmajun == $wmamei) {
                        ?>
                            <h4 class="text-white text-center">Rekomendasi Bulan <?= $_GET['Bulan'] ?> adalah Pertahankan Stok
                                karena hasil prediksi penjualan produk kategori <?= $_GET['namakategori'] ?> pada bulan yg akan datang hasilnya sama dengan jumlah penjualan produk pada bulan sebelumnya,
                                oleh karena itu stok produk di samakan seperti jumlah penjualan pada bulan sebelumnya</h4>
                        <?php
                        } else if ($wmajun < $wmamei) {
                        ?>
                            <h4 class="text-white text-center">Rekomendasi Bulan <?= $_GET['Bulan'] ?> adalah Tingkatkan Stok
                                karena hasil prediksi penjualan produk katergori <?= $_GET['namakategori'] ?> pada bulan yang akan datang hasilnya menurun
                                dari pada bulan sebelumnya untuk itu jumlah stok produk harus di kurangi agar tidak ada penumpukan barang</h4>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        </div>

    <?php

        } else if ($_GET['Bulan'] == 'Juli') {
    ?>

        <div class="row col-lg-12 mt-5">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-info">

                        <h4 class="text-white text-center">Hasil prediksi penjualan kategori <?= $_GET['namakategori'] ?> pada bulan <?= $_GET['Bulan'] ?> adalah sebanyak <?=

                                                                                                                                                                            $wmajuli;
                                                                                                                                                                            ?> produk yang akan terjual </h4>
                        <?php
                        if ($wmajuli > $wmajun) {
                        ?>
                            <h4 class="text-white text-center">Rekomendasi Bulan <?= $_GET['Bulan'] ?> adalah Tingkatkan Stok
                                karena hasil prediksi penjualan produk katergori <?= $_GET['namakategori'] ?> pada bulan yang akan datang hasilnya menurun
                                dari pada bulan sebelumnya untuk itu jumlah stok produk harus di kurangi agar tidak ada penumpukan barang</h4>

                        <?php

                        } else if ($wmajuli == $wmajun) {
                        ?><h4 class="text-white text-center">Rekomendasi Bulan <?= $_GET['Bulan'] ?> adalah Pertahankan Stok
                                karena hasil prediksi penjualan produk kategori <?= $_GET['namakategori'] ?> pada bulan yg akan datang hasilnya sama dengan jumlah penjualan produk pada bulan sebelumnya,
                                oleh karena itu stok produk di samakan seperti jumlah penjualan pada bulan sebelumnya</h4>
                        <?php
                        } else if ($wmajuli < $wmajun) {
                        ?><h4 class="text-white text-center">Rekomendasi Bulan <?= $_GET['Bulan'] ?> adalah Kurangi Stok
                                adalah Kurangi Stok
                                karena hasil prediksi penjualan produk katergori <?= $_GET['namakategori'] ?> pada bulan yg akan datang hasilnya meningkat,
                                karena lebih banyak barang terjual dari pada bulan sebelumnya</h4>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        </div>

    <?php

        } else if ($_GET['Bulan'] == 'Agustus') {
    ?>

        <div class="row col-lg-12 mt-5">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-info">

                        <h4 class="text-white text-center">Hasil prediksi penjualan kategori <?= $_GET['namakategori'] ?> pada bulan <?= $_GET['Bulan'] ?> adalah sebanyak <?=

                                                                                                                                                                            $wmaagus;
                                                                                                                                                                            ?> produk yang akan terjual </h4>
                        <?php
                        if ($wmaagus > $wmajuli) {
                        ?><h4 class="text-white text-center">Rekomendasi Bulan <?= $_GET['Bulan'] ?> adalah Tingkatkan Stok
                                karena hasil prediksi penjualan produk katergori <?= $_GET['namakategori'] ?> pada bulan yang akan datang hasilnya menurun
                                dari pada bulan sebelumnya untuk itu jumlah stok produk harus di kurangi agar tidak ada penumpukan barang</h4>

                        <?php

                        } else if ($wmaagus == $wmajuli) {
                        ?>
                            <h4 class="text-white text-center">Rekomendasi Bulan <?= $_GET['Bulan'] ?> adalah Pertahankan Stok
                                karena hasil prediksi penjualan produk kategori <?= $_GET['namakategori'] ?> pada bulan yg akan datang hasilnya sama dengan jumlah penjualan produk pada bulan sebelumnya,
                                oleh karena itu stok produk di samakan seperti jumlah penjualan pada bulan sebelumnya</h4>
                        <?php
                        } else if ($wmaagus < $wmajuli) {
                        ?>
                            <h4 class="text-white text-center">Rekomendasi Bulan <?= $_GET['Bulan'] ?> adalah Kurangi Stok
                                adalah Kurangi Stok
                                karena hasil prediksi penjualan produk katergori <?= $_GET['namakategori'] ?> pada bulan yg akan datang hasilnya meningkat,
                                karena lebih banyak barang terjual dari pada bulan sebelumnya</h4> <?php
                                                                                                }
                                                                                                    ?>
                    </div>
                </div>
            </div>
        </div>
        </div>

    <?php

        } else if ($_GET['Bulan'] == 'September') {
    ?>

        <div class="row col-lg-12 mt-5">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-info">

                        <h4 class="text-white text-center">Hasil prediksi penjualan kategori <?= $_GET['namakategori'] ?> pada bulan <?= $_GET['Bulan'] ?> adalah sebanyak <?=

                                                                                                                                                                            $wmasep;
                                                                                                                                                                            ?> produk yang akan terjual </h4>
                        <?php
                        if ($wmasep > $wmaagus) {
                        ?>
                            <h4 class="text-white text-center">Rekomendasi Bulan <?= $_GET['Bulan'] ?> adalah Tingkatkan Stok
                                karena hasil prediksi penjualan produk katergori <?= $_GET['namakategori'] ?> pada bulan yang akan datang hasilnya menurun
                                dari pada bulan sebelumnya untuk itu jumlah stok produk harus di kurangi agar tidak ada penumpukan barang</h4>

                        <?php
                        } else if ($wmasep == $wmaagus) {
                        ?>
                            <h4 class="text-white text-center">Rekomendasi Bulan <?= $_GET['Bulan'] ?> adalah Pertahankan Stok
                                karena hasil prediksi penjualan produk kategori <?= $_GET['namakategori'] ?> pada bulan yg akan datang hasilnya sama dengan jumlah penjualan produk pada bulan sebelumnya,
                                oleh karena itu stok produk di samakan seperti jumlah penjualan pada bulan sebelumnya</h4>
                        <?php
                        } else if ($wmasep < $wmaagus) {
                        ?>
                            <h4 class="text-white text-center">Rekomendasi Bulan <?= $_GET['Bulan'] ?> adalah Kurangi Stok
                                adalah Kurangi Stok
                                karena hasil prediksi penjualan produk katergori <?= $_GET['namakategori'] ?> pada bulan yg akan datang hasilnya meningkat,
                                karena lebih banyak barang terjual dari pada bulan sebelumnya</h4> <?php
                                                                                                }
                                                                                                    ?>
                    </div>
                </div>
            </div>
        </div>
        </div>

    <?php

        } else if ($_GET['Bulan'] == 'Oktober') {
    ?>

        <div class="row col-lg-12 mt-5">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-info">

                        <h4 class="text-white text-center">Hasil prediksi penjualan kategori <?= $_GET['namakategori'] ?> pada bulan <?= $_GET['Bulan'] ?> adalah sebanyak <?=

                                                                                                                                                                            $wmaokto;
                                                                                                                                                                            ?> produk yang akan terjual </h4>
                        <?php
                        if ($wmaokto > $wmasep) {
                        ?>
                            <h4 class="text-white text-center">Rekomendasi Bulan <?= $_GET['Bulan'] ?> adalah Tingkatkan Stok
                                karena hasil prediksi penjualan produk katergori <?= $_GET['namakategori'] ?> pada bulan yang akan datang hasilnya menurun
                                dari pada bulan sebelumnya untuk itu jumlah stok produk harus di kurangi agar tidak ada penumpukan barang</h4>
                        <?php
                        } else if ($wmaokto == $wmasep) {
                        ?>
                            <h4 class="text-white text-center">Rekomendasi Bulan <?= $_GET['Bulan'] ?> adalah Pertahankan Stok
                                karena hasil prediksi penjualan produk kategori <?= $_GET['namakategori'] ?> pada bulan yg akan datang hasilnya sama dengan jumlah penjualan produk pada bulan sebelumnya,
                                oleh karena itu stok produk di samakan seperti jumlah penjualan pada bulan sebelumnya</h4>
                        <?php
                        } else if ($wmaokto < $wmasep) {
                        ?>
                            <h4 class="text-white text-center">Rekomendasi Bulan <?= $_GET['Bulan'] ?> adalah Kurangi Stok
                                adalah Kurangi Stok
                                karena hasil prediksi penjualan produk katergori <?= $_GET['namakategori'] ?> pada bulan yg akan datang hasilnya meningkat,
                                karena lebih banyak barang terjual dari pada bulan sebelumnya</h4> <?php
                                                                                                }
                                                                                                    ?>
                    </div>
                </div>
            </div>
        </div>
        </div>

    <?php

        } else if ($_GET['Bulan'] == 'November') {
    ?>

        <div class="row col-lg-12 mt-5">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-info">

                        <h4 class="text-white text-center">Hasil prediksi penjualan kategori <?= $_GET['namakategori'] ?> pada bulan <?= $_GET['Bulan'] ?> adalah sebanyak <?=

                                                                                                                                                                            $wmanov;
                                                                                                                                                                            ?> produk yang akan terjual </h4>
                        <?php
                        if ($wmanov > $wmaokto) {
                        ?>
                            <h4 class="text-white text-center">Rekomendasi Bulan <?= $_GET['Bulan'] ?> adalah Tingkatkan Stok
                                karena hasil prediksi penjualan produk katergori <?= $_GET['namakategori'] ?> pada bulan yang akan datang hasilnya menurun
                                dari pada bulan sebelumnya untuk itu jumlah stok produk harus di kurangi agar tidak ada penumpukan barang</h4>
                        <?php
                        } else if ($wmanov == $wmaokto) {
                        ?>
                            <h4 class="text-white text-center">Rekomendasi Bulan <?= $_GET['Bulan'] ?> adalah Pertahankan Stok
                                karena hasil prediksi penjualan produk kategori <?= $_GET['namakategori'] ?> pada bulan yg akan datang hasilnya sama dengan jumlah penjualan produk pada bulan sebelumnya,
                                oleh karena itu stok produk di samakan seperti jumlah penjualan pada bulan sebelumnya</h4>
                        <?php
                        } else if ($wmanov < $wmaokto) {
                        ?>
                            <h4 class="text-white text-center">Rekomendasi Bulan <?= $_GET['Bulan'] ?> adalah Kurangi Stok
                                adalah Kurangi Stok
                                karena hasil prediksi penjualan produk katergori <?= $_GET['namakategori'] ?> pada bulan yg akan datang hasilnya meningkat,
                                karena lebih banyak barang terjual dari pada bulan sebelumnya</h4> <?php
                                                                                                }
                                                                                                    ?>
                    </div>
                </div>
            </div>
        </div>
        </div>

    <?php

        } else if ($_GET['Bulan'] == 'Desember') {
    ?>
        <div class="row col-lg-12 mt-5">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-info">

                        <h4 class="text-white text-center">Hasil prediksi penjualan kategori <?= $_GET['namakategori'] ?> pada bulan <?= $_GET['Bulan'] ?> adalah sebanyak <?=

                                                                                                                                                                            $wmades;
                                                                                                                                                                            ?> produk yang akan terjual </h4>
                        <?php
                        if ($wmades > $wmanov) {
                        ?><h4 class="text-white text-center">Rekomendasi Bulan <?= $_GET['Bulan'] ?> adalah Tingkatkan Stok
                                karena hasil prediksi penjualan produk katergori <?= $_GET['namakategori'] ?> pada bulan yang akan datang hasilnya menurun
                                dari pada bulan sebelumnya untuk itu jumlah stok produk harus di kurangi agar tidak ada penumpukan barang</h4>
                        <?php
                        } else if ($wmades == $wmanov) {
                        ?>
                            <h4 class="text-white text-center">Rekomendasi Bulan <?= $_GET['Bulan'] ?> adalah Pertahankan Stok
                                karena hasil prediksi penjualan produk kategori <?= $_GET['namakategori'] ?> pada bulan yg akan datang hasilnya sama dengan jumlah penjualan produk pada bulan sebelumnya,
                                oleh karena itu stok produk di samakan seperti jumlah penjualan pada bulan sebelumnya</h4>
                        <?php
                        } else if ($wmades < $wmanov) {
                        ?> <h4 class="text-white text-center">Rekomendasi Bulan <?= $_GET['Bulan'] ?> adalah Kurangi Stok
                                adalah Kurangi Stok
                                karena hasil prediksi penjualan produk katergori <?= $_GET['namakategori'] ?> pada bulan yg akan datang hasilnya meningkat,
                                karena lebih banyak barang terjual dari pada bulan sebelumnya</h4> <?php
                                                                                                }
                                                                                                    ?>
                    </div>
                </div>
            </div>
        </div>
        </div>

    <?php
        }
    ?>
<?php include_once('footer.php');
} else {
    echo "<script type='text/javascript'>
    setTimeout(function () { 
        swal({ 
            title: 'Maaf', 
            text:  'Mohon Isi Data Bulan Lalu atau Tahun Tidak Ada',
            type: 'warning',
            timer: 5000,
            ConfirmButton: 'OK',
            showConfirmButton: true});
    },10);  
    window.setTimeout(function(){ 
      window.location.replace('index.php');
    } ,1000); 
    </script>";
}
?>