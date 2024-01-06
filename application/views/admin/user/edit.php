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
                                <h3 class="mt-3">Edit <b>User</b></h1>
                            </div>
                            <div class="section-body">
                                <div class="card-body">
                                    <form action="" method="POST" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label>NAMA</label>
                                            <input type="text" name="name"
                                                class="form-control <?php echo form_error('name') ? 'is-invalid' : ''; ?>"
                                                required value="<?= $user->name ?>">

                                            <?php if (form_error('name')) : ?>
                                            <div class="invalid-feedback" style="display: block">
                                                <?php echo form_error('name'); ?>
                                            </div>
                                            <?php endif; ?>
                                        </div>

                                        <div class="form-group">
                                            <label>EMAIL</label>
                                            <input type="email" name="email"
                                                class="form-control <?php echo form_error('email') ? 'is-invalid' : ''; ?>"
                                                required value="<?= $user->email ?>">

                                            <?php if (form_error('email')) : ?>
                                            <div class="invalid-feedback" style="display: block">
                                                <?php echo form_error('email'); ?>
                                            </div>
                                            <?php endif; ?>
                                        </div>

                                        <div class="form-group">
                                            <label>PASSWORD</label>
                                            <input type="password" name="password"
                                                class="form-control <?php echo form_error('password') ? 'is-invalid' : ''; ?>"
                                                required placeholder="Masukkan Password">

                                            <?php if (form_error('password')) : ?>
                                            <div class="invalid-feedback" style="display: block">
                                                <?php echo form_error('password'); ?>
                                            </div>
                                            <?php endif; ?>
                                        </div>

                                        <div class="form-group">
                                            <label>ROLE</label>

                                            <select name="role" class="form-control">
                                                <option value="operator">Operator</option>
                                                <option value="admin">Admin</option>
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