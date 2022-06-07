<?php include_once('header.php');
require_once "../config/config.php";
?>


<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex justify-content-center  mb-4">
        <h1 class="text-light mb-0 text-gray-800 ">Tentang Aplikasi</h1>
    </div>
    <div class="card-body">
        <?php
        $sql = mysqli_query($con, "SELECT * from tentang");
        $row = mysqli_fetch_array($sql);
        $tentang = $row['tentang'];
        ?>
        <span>
            <?= $tentang ?>
        </span>
    </div>
</div>
</div>

<div>
</div>
</div>

<?php include_once('footer.php');
?>