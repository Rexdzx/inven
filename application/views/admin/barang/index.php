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
                                <h3 class="mt-3">Semua <b>Barang</b></h3>
                            </div>

                            <div class="section-body">

                                <div class="card mt-5">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div
                                                class="input-group d-sm-flex align-items-center justify-content-between mb-4">
                                                <a href="<?= site_url('admin/barang/store ') ?>" class="btn btn-primary"
                                                    style="padding-top: 10px;"><i class="fa fa-plus-circle"></i>
                                                    TAMBAH</a>
                                                <form action="<?= site_url('admin/barang/index') ?>" method="get"
                                                    class="d-flex">
                                                    <!-- <select name="kondisi" class="form-control mx-3">
                                                        <option value="">Semua</option>
                                                        <option value="bagus">Bagus</option>
                                                        <option value="rusak">Rusak</option>
                                                    </select> -->
                                                    <select name="kondisi" class="form-control mx-3">
                                                        <option value="">Semua</option>
                                                        <option value="bagus"
                                                            <?= ($this->input->get('kondisi') == 'bagus') ? 'selected' : '' ?>>
                                                            Bagus</option>
                                                        <option value="rusak"
                                                            <?= ($this->input->get('kondisi') == 'rusak') ? 'selected' : '' ?>>
                                                            Rusak</option>
                                                    </select>

                                                    <button type="submit"
                                                        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm px-4">
                                                        <span class="text text-white">Filter</span>
                                                    </button>
                                                </form>

                                                <br>

                                                <form action="<?= site_url('admin/barang/printPDF') ?>" method="get"
                                                    target="_blank">
                                                    <input type="hidden" name="kondisi"
                                                        value="<?= $this->input->get('kondisi') ?>">
                                                    <!-- Hidden input untuk meneruskan nilai kondisi -->
                                                    <button type="submit"
                                                        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                                        <i class="fas fa-download fa-sm text-white-50"></i> Cetak
                                                        Laporan
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th scope="col" style="text-align: center;width: 6%">NO.</th>
                                                        <th scope="col">NAMA BARANG</th>
                                                        <th scope="col">MEREK BARANG</th>
                                                        <th scope="col">KONDISI BARANG</th>
                                                        <th scope="col" style="width: 15%;text-align: center">AKSI</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($barang as $no => $item) :?>
                                                    <tr class="text-center">
                                                        <th scope="row" style="text-align: center">
                                                            <?= ++$no ?></th>
                                                        <td><?= $item->nama?></td>
                                                        <td><?= $item->merek ?></td>
                                                        <td class="d-flex justify-content-center">
                                                            <?php if($item->kondisi == 'Rusak') :?>
                                                            <span class="bg-danger text-white shadow"
                                                                style="padding: 6px 25px 6px 25px;border-radius: 16px;">Rusak</span>
                                                            <?php else :?>
                                                            <span class="bg-success text-white shadow"
                                                                style="padding: 6px 25px 6px 25px;border-radius: 16px;">Bagus</span>
                                                            <?php endif ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="<?= site_url('admin/barang/update/' . $item->id) ?>"
                                                                class="btn btn-sm btn-primary">
                                                                <i class="fa fa-pencil-alt"></i>
                                                            </a>

                                                            <a href="#"
                                                                data-delete-url="<?= site_url('admin/barang/delete/'. $item->id) ?>"
                                                                class="btn btn-sm btn-danger" role="button"
                                                                onclick="confirmDelete(this)">
                                                                <i class="fa fa-trash"></i></a>


                                                        </td>
                                                    </tr>
                                                    <?php endforeach ?>
                                                    <?php if(count($barang) == 0) :?>
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