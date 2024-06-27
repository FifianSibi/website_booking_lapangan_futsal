<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webleb</title>
    <link rel="stylesheet" href="<?= base_url() ?>/indexstyle.css">
</head>

<body style="display:flex; align-items:center; justify-content:center;">
    <div class="login-page">
        <div class="form">
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <form class="register-form" method="POST" action="/auth/register">
                <h2>Register</h2>
                <input type="text" name="username" placeholder="Username *" required />
                <input type="password" name="password" placeholder="Password *" required />
                <input type="password" name="password_confirm" placeholder="Confirm Password *" required />
                <button type="submit">Create</button>
                <p class="message">Already registered? <a href="#">Sign In</a></p>
            </form>

            <form class="login-form" method="POST" action="/auth/login">
                <h2>Login</h2>
                <input type="text" name="username" placeholder="Username" required />
                <input type="password" name="password" placeholder="Password" required />
                <button type="submit">Sign in</button>
                <p class="message">Not registered? <a href="#">Create an account</a></p>
            </form>

            <?php if (isset($validation)) : ?>
                <div class="alert alert-danger">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif; ?>

            <?php if (isset($error)) : ?>
                <div class="alert alert-danger">
                    <?= $error ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('.message a').click(function() {
            $('form').animate({
                height: "toggle",
                opacity: "toggle"
            }, "slow");
        });
    </script>
</body>

</html>