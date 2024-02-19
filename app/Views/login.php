<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <Title>Login</Title>
    <link rel="stylesheet" href="/assets/css/login.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<html>
<body>
<div class="Login-Form">
    <center>
        <form name="LoginForm" action="<?= base_url('auth/login') ?>" method="post">
        <table class="Login-Container">
            <tr>
                <td>
                    <h2>
                        Simpan Resep Yang Kamu Suka
                    </h2>
                    <p>Dari Jutaan Resep Yang Ada</p>
                </td>
            </tr>
            <tr align="center">
                <td><input type="email" name="email" placeholder="Email/Username" class="Login-Input" required autofocus title="Enter your email"></td>
            </tr>
            <tr align="center">
                <td><input type="password" name="pass" placeholder="Password" id="Password" class="Login-Input" required title="Enter your password(Alpha Numeric)"></td>
            </tr>
            <tr>
                <td><div class="Show-Password"><input type="checkbox" onkeyup="showPassword()">Show Password</div></td>
            </tr>
            <tr align="center">
                <td><button type="submit" name="Login" id="Login" class="Login-Button">LOG IN</button></td>
            </tr>
            <tr>
                <td class="SignUpText">Belum Punya Akun?<a href="<?= base_url('home/daftar') ?>"> Daftar</a></td>
            </tr>
            <tr>
                <td></td>
            </tr>
        </table>
    </form>
    </center>
</div>
</body>
</html>
<script type="text/javascript" src="assets/js/script.js"></script>
