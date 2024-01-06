<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= site_url('/assets/css/auth.css') ?>">
</head>

<body>
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="card card-primary" style="margin-top: 150px;">
                        <div class="card-body">
                            <div class="form-group text-center">
                                <h4>Login</h4>
                            </div>
                            <form method="POST" action="<?= site_url('auth/login') ?>" autocomplete="off">
                                <!-- <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="text" class="form-control" name="email" tabindex="1"
                                        autofocus required>
                                </div> -->
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="text"
                                        class="form-control <?php echo form_error('email') ? 'is-invalid' : ''; ?>"
                                        name="email" tabindex="1" autofocus required>

                                    <?php if (form_error('email')) : ?>
                                    <div class="invalid-feedback" style="display: block">
                                        <?php echo form_error('email'); ?>
                                    </div>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">Password</label>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password"
                                        tabindex="2" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Login
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php $this->load->view('includes/script') ?>
</body>

</html>