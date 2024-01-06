<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - Peminjaman</title>

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
                                <h3 class="mt-3">Edit <b>Barang</b></h1>
                            </div>
                            <div class="section-body">
                                <div class="card-body">
                                    <form action="" method="POST" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label>NAMA PEMINJAM</label>
                                            <input type="text" name="nama_peminjam"
                                                class="form-control <?php echo form_error('nama_peminjam') ? 'is-invalid' : ''; ?>"
                                                required value="<?= $peminjaman->nama_peminjam ?>">

                                            <?php if (form_error('nama_peminjam')) : ?>
                                            <div class="invalid-feedback" style="display: block">
                                                <?php echo form_error('nama_peminjam'); ?>
                                            </div>
                                            <?php endif; ?>
                                        </div>

                                        <div class="form-group">
                                            <label>BARANG</label>
                                            <select name="barang" class="form-control">
                                                <option value="">Pilih Barang</option>
                                                <?php foreach ($barang as $item) : ?>
                                                <option value="<?= $item->id ?>"
                                                    <?php echo ($peminjaman->id_barang == $item->id) ? 'selected' : ''; ?>>
                                                    <?= $item->nama ?>
                                                </option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <input type="hidden" name="id_penjamin" class="form-control"
                                                value="<?= $this->session->userdata('login_session')['id'] ?>">
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