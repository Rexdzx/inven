<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - Barang</title>

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
                                <h3 class="mt-3">Tambah <b>Barang</b></h1>
                            </div>
                            <div class="section-body">
                                <div class="card-body">
                                    <form action="<?= site_url('admin/barang/store') ?>" method="POST"
                                        enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label>NAMA</label>
                                            <input type="text" name="nama"
                                                class="form-control <?php echo form_error('nama') ? 'is-invalid' : ''; ?>"
                                                required>

                                            <?php if (form_error('nama')) : ?>
                                            <div class="invalid-feedback" style="display: block">
                                                <?php echo form_error('nama'); ?>
                                            </div>
                                            <?php endif; ?>
                                        </div>

                                        <div class="form-group">
                                            <label>MEREK</label>
                                            <input type="text" name="merek"
                                                class="form-control <?php echo form_error('merek') ? 'is-invalid' : ''; ?>"
                                                required>

                                            <?php if (form_error('merek')) : ?>
                                            <div class="invalid-feedback" style="display: block">
                                                <?php echo form_error('merek'); ?>
                                            </div>
                                            <?php endif; ?>
                                        </div>

                                        <div class="form-group">
                                            <label>KONDISI</label>

                                            <select name="kondisi" class="form-control">
                                                <option value="Bagus">Bagus</option>
                                                <option value="Rusak">Rusak</option>
                                            </select>
                                        </div>


                                        <button class="btn btn-primary mr-1 btn-submit mt-3" type="submit"><i
                                                class="fa fa-paper-plane"></i>
                                            SIMPAN</button>
                                        <button class="btn btn-danger btn-reset mt-3" type="reset"><i
                                                class="fa fa-redo"></i>
                                            RESET</button>
                                    </form>
                                </div>
                            </div>
                        </section>
                    </div>

                    </section>
                </div>

            </div>
        </div>
        <!-- End of Content Wrapper -->

    </div>

    <?php $this->load->view('includes/script.php') ?>

</body>

</html>