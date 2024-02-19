<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <Title>Sign Up</Title>
    <link rel="stylesheet" href="/assets/css/register.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<html>
<body>
<div class="SignUp-Form" id="SignUp-Form">
    <center>
    <form action="<?= base_url('auth/register') ?>" name="SignupForm" method="POST">
        <table class="SignUp-Container">
            <tr>
                <td>
                    <div>
                        <h2>Daftar Akun</h2>
                        <p>Silahkan Masukkan Data Diri Anda</p>
                    </div>
                </td>
            </tr>
            <tr align="center">
                <td><input type="text" name="nama_user" id="Name" placeholder="Username" class="SignUp-Input" required autofocus title="Input Your Name. (Alphabet Only)"></td>
            </tr>
            <tr align="center">
                <td><input type="email" name="email_user" placeholder="Email" class="SignUp-Input" required></td>
            </tr>
            <tr align="center">
                <td><input type="text" name="password_user" placeholder="Password" class="SignUp-Input" required></td>
            </tr>
            <tr align="center">
                <td><input type="text" name="provinsi" placeholder="Provinsi" class="SignUp-Input" required></td>
            </tr>
            <tr align="center">
                <td><input type="text" name="kota" placeholder="Kota" class="SignUp-Input" required></td>
            </tr>
            <tr align="center">
                <td><button type="submit" id="Signup" class="SignUp-Button">SIGN UP</button></td>
            </tr>
            <tr>
                <td class="LoginText">Already have an account?<a href="<?= base_url('home/login') ?>"> Login</a></td>
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