<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - User</title>

    <?php $this->load->view('includes/style.php')?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php $this->load->view('includes/sidebar') ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php $this->load->view('includes/navbar') ?>
                <div class="container-fluid">
                    <div class="main-content">
                        <section class="section">
                            <div class="section-header">
                                <h3 class="mt-3">Semua <b>User</b></h3>
                            </div>

                            <div class="section-body">

                                <div class="card mt-5">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div
                                                class="input-group d-sm-flex align-items-center justify-content-between mb-4">
                                                <a href="<?= site_url('admin/user/store ') ?>" class="btn btn-primary"
                                                    style="padding-top: 10px;"><i class="fa fa-plus-circle"></i>
                                                    TAMBAH</a>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th scope="col" style="text-align: center;width: 6%">NO.</th>
                                                        <th scope="col">NAMA USER</th>
                                                        <th scope="col">ROLE USER</th>
                                                        <th scope="col" style="width: 15%;text-align: center">AKSI</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($users as $no => $item) :?>
                                                    <tr class="text-center">
                                                        <th scope="row" style="text-align: center">
                                                            <?= ++$no ?></th>
                                                        <td><?= $item->name ?></td>
                                                        <td><?= $item->role ?></td>
                                                        <td class="text-center">
                                                            <a href="<?= site_url('admin/user/update/' . $item->id) ?>"
                                                                class="btn btn-sm btn-primary">
                                                                <i class="fa fa-pencil-alt"></i>
                                                            </a>

                                                            <a href="#"
                                                                data-delete-url="<?= site_url('admin/user/delete/'. $item->id) ?>"
                                                                class="btn btn-sm btn-danger" role="button"
                                                                onclick="confirmDelete(this)">
                                                                <i class="fa fa-trash"></i></a>


                                                        </td>
                                                    </tr>
                                                    <?php endforeach ?>
                                                    <?php if(count($users) == 0) :?>
                                                    <tr class="text-center">
                                                        <td colspan="5">Belum Ada Data</td>
                                                    </tr>
                                                    <?php endif ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>

                    </section>
                </div>

                <?php $this->load->view('includes/footer') ?>
                <!-- End of Footer -->
            </div>
        </div>
        <!-- End of Content Wrapper -->

    </div>

    <?php $this->load->view('includes/script.php') ?>

</body>

</html>