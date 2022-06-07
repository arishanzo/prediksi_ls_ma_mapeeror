<?php include_once('header.php');
require_once "../config/config.php";
?>


<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex justify-content-center  mb-4">
        <h1 class="text-light mb-0 text-gray-800 ">Data Provinsi</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div> -->
    </div>
    <div class="card-body">
        <div class="card-body" style="text-align: right;">
            <a class="btn btn-success btn-action btn-xs mr-1" href="add.php" data-toggle="tooltip" title="Tambah Data"><span>Tambah Data Provinsi</span></a>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Provinsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $SqlQuery = mysqli_query($con, "SELECT * FROM provinsi");
                        $no = 1;
                        if (mysqli_num_rows($SqlQuery) > 0) {
                            while ($row = mysqli_fetch_array($SqlQuery)) {
                        ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $row['nama_provinsi'] ?></td>
                                    <td>

                                        <a href=" delete.php?id=<?= $row['id_provinsi'] ?>" class="btn btn-danger btn-xs delete-data" title="hapus">Hapus</a>
                                        <a href="edit.php?id=<?= $row['id_provinsi'] ?>" class="btn btn-success btn-action mr-1" title="Edit">Edit</a>

                                    </td>

                                </tr>
                        <?php
                            }
                        } else {
                            echo "<tr><td colspan=\"8\" align=\"center\">data tidak ada</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        </section>
    </div>
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