<!DOCTYPE html>

<head>

</head>

<body>
    <img src="https://nadhamedia.s3.ap-southeast-1.amazonaws.com/limantoro/asset/img/logo.png" style="width: 80px;">
    <h4>Halo {{ $email }}</h4>
    <p>Anda telah meminta request untuk mereset password, silahkan klik link berikut untuk mereset password akun anda</p>
    <p><a href="{{ url('/auth/reset-password/token/'.$token) }}"><strong>Reset Password</strong></a></p>
    <p><i>Limantoro Admin</i></p>
</body>