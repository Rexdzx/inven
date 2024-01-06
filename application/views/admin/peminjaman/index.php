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
                                <h3 class="mt-3">Peminjaman <b>Barang</b></h3>
                            </div>

                            <div class="section-body">

                                <div class="card mt-5">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div
                                                class="input-group input-group d-sm-flex align-items-center justify-content-between mb-4">
                                                <a href="<?= site_url('admin/peminjaman/store') ?>"
                                                    class="btn btn-primary" style="padding-top: 10px;"><i
                                                        class="fa fa-plus-circle"></i> TAMBAH</a>

                                                <form action="<?= site_url('admin/peminjaman/index') ?>" method="get"
                                                    class="d-flex">
                                                    <select name="filter" class="form-control mx-4">
                                                        <option value="">Semua</option>
                                                        <option value="minggu"
                                                            <?= ($this->input->get('filter') == 'minggu') ? 'selected' : '' ?>>
                                                            Per Minggu</option>
                                                        <option value="bulan"
                                                            <?= ($this->input->get('filter') == 'bulan') ? 'selected' : '' ?>>
                                                            Per Bulan</option>
                                                        <option value="tahun"
                                                            <?= ($this->input->get('filter') == 'tahun') ? 'selected' : '' ?>>
                                                            Per Tahun</option>
                                                    </select>

                                                    <button type="submit"
                                                        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm px-4">
                                                        <span class="text text-white">Filter</span>
                                                    </button>
                                                </form>

                                                <br>

                                                <form action="<?= site_url('admin/peminjaman/printPDF') ?>" method="get"
                                                    target="_blank">
                                                    <input type="hidden" name="filter"
                                                        value="<?= $this->input->get('filter') ?>">
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
                                                        <th scope="col">NAMA PEMINJAM</th>
                                                        <th scope="col">NAMA BARANG</th>
                                                        <th scope="col">MEREK BARANG</th>
                                                        <th scope="col">TANGGAL PINJAM</th>
                                                        <th scope="col">NAMA PENJAMIN</th>
                                                        <th scope="col">ROLE PENJAMIN</th>
                                                        <th scope="col" style="width: 15%;text-align: center">AKSI</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($barang as $no => $item) :?>
                                                    <tr class="text-center">
                                                        <th scope="row" style="text-align: center">
                                                            <?= ++$no ?></th>
                                                        <td><?= $item->nama_peminjam ?></td>
                                                        <td><?= $item->nama ?></td>
                                                        <td><?= $item->merek ?></td>
                                                        <td><?= date('d-m-Y', strtotime($item->tanggal_pinjam)) ?></td>
                                                        <td><?= $item->name ?></td>
                                                        <td><?= $item->role ?></td>
                                                        <td class="text-center">
                                                            <a href="<?= site_url('admin/peminjaman/edit/' . $item->id_peminjam) ?>"
                                                                class="btn btn-sm btn-primary">
                                                                <i class="fa fa-pencil-alt"></i>
                                                            </a>
                                                            <a href="#"
                                                                data-delete-url="<?= site_url('admin/peminjaman/delete/'. $item->id_peminjam) ?>"
                                                                class="btn btn-sm btn-danger" role="button"
                                                                onclick="confirmDelete(this)">
                                                                <i class="fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach ?>
                                                    <?php if(count($barang) == 0) :?>
                                                    <tr class="text-center">
                                                        <td colspan="8">Belum Ada Data</td>
                                                    </tr>
                                                    <?php endif ?>
                                                </tbody>
                                            </table>
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