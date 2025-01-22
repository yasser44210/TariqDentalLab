<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- LINEARICONS -->
    <link rel="stylesheet" href="<?= base_url('assets/fonts/linearicons/style.css') ?>">
    <!-- STYLE CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

</head>

<body>

<div class="wrapper">
    <div class="inner">
        <img src="<?= base_url() ?>assets/images/image-1.png" alt="" class="image-1">
        <form action="<?= base_url('auth/login') ?>" method="post">
            <h3>Login</h3>
            <div class="form-holder">
                <span class="lnr lnr-user"></span>
                <input type="text" class="form-control" name="username" placeholder="username">
            </div>
            <div class="form-holder">
                <span class="lnr lnr-lock"></span>
                <input type="password" class="form-control" name="password" placeholder="password">
            </div>
            <button>
                <span>Login</span>
            </button>

            <!-- Move the error message here -->
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger" style="margin-top: 10px;">
                    <?= $this->session->flashdata('error') ?>
                </div>
            <?php endif; ?>
        </form>
        <img src="<?= base_url() ?>assets/images/image-2.png" alt="" class="image-2">
    </div>
</div>

<script src="<?= base_url('assets/js/jquery-3.3.1.min.js') ?>"></script>
<script src="<?= base_url('assets/js/main.js') ?>"></script>

</body>
</html>
