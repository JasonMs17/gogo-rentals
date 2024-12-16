<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<!-- css -->
<link rel="stylesheet" href="css/login.css">
<title>Login Page</title>

<!-- body -->
<section>
    <div class="gambar">
        <h1>GoGo Rentals</h1>
    </div>

    <div class="login">
        <form action="/login" method="post">
            <div class="wrapper">
                <h1>Login Here!</h1>

                <?php if (session()->get('success')) : ?>
                    <p style="color: black; font-size: 15px;"><?= session()->get('success') ?></p>
                <?php endif; ?>

                <?php if (isset($validation)) : ?>
                    <ul class="validation-errors">
                        <p><?= $validation->listErrors() ?></p>
                    </ul>
                <?php endif; ?>

                <div class="input-container">
                    <span class="user-icon"><img src="Src/Icon/user_icon.svg" alt="User Icon"></span>
                    <input type="text" placeholder="Username" name="username" value="<?= set_value('username') ?>">
                </div>

                <div class="input-container">
                    <span class="password-icon"><img src="Src/Icon/password_icon.svg" alt="Password Icon"></span>
                    <input type="password" placeholder="Password" name="password" value="<?= set_value('password') ?>">
                </div>

                <div class="remember">
                    <input type="checkbox" name="remember_me" id="remember" <?php if(isset($_POST['remember_me'])) echo "checked='checked'"; ?>>
                    <label for="remember">Remember me</label>
                </div>

                <button type="submit">Login</button>

                <p>Don't have an account? Create your account
                    <a href="<?= base_url('/register'); ?>"> <u> here </u></a>
                </p>
            </div>
        </form>
    </div>
</section>

<?= $this->endSection(); ?>
<?php $this->setData(['hideFooter' => true]); ?>