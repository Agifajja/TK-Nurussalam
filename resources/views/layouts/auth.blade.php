<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login – Sistem TK</title>

    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        html, body {
            width: 100%;
            height: 100%;
            margin: 0;
        }

        body {
            background: #1e1e1e;
        }

        /* ======================
           FULL SCREEN
        ====================== */
        .login-wrapper {
            width: 100vw;
            height: 100vh;
        }

        .login-card {
            width: 100%;
            height: 100%;
            margin: 0;
        }

        /* ======================
           LEFT
        ====================== */
        .login-left {
            background: #355f47;
        }

        /* LOGO 2x BESAR */
        .login-left img {
            width: 650px;
            max-width: 95%;
        }

        /* ======================
           RIGHT
        ====================== */
        .login-right {
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-form {
            width: 70%;
        }

        /* ======================
           INPUT & BUTTON
        ====================== */
        .input-custom,
        .btn-login {
            width: 100%;
            height: 56px;
            border-radius: 30px;
            font-size: 16px;
        }

        /* 🔥 WARNA INPUT BARU */
        .input-custom {
            background: #E1EEBC !important;
            border: none;
            padding: 0 24px;
            margin-bottom: 22px;
        }

        .input-custom:focus,
        .input-custom:active,
        .input-custom:-webkit-autofill {
            background: #E1EEBC !important;
            box-shadow: none !important;
            outline: none !important;
        }

        .btn-login {
            background: #355f47;
            color: white;
            font-weight: 600;
            border: none;
        }

        .btn-login:hover {
            background: #2f523f;
        }

        /* ======================
           ERROR MESSAGE
        ====================== */
        .login-error {
            margin-top: 18px;
            text-align: center;
            color: #d32f2f;
            font-size: 14px;
            font-weight: 500;
        }
    </style>
</head>
<body>

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
