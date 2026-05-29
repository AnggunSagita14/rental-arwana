<?php

session_start();

$error = "";

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    // USERNAME & PASSWORD ADMIN

    $admin_username = "pashanggunamu";
    $admin_password = "mbdasik";

    // VALIDASI LOGIN

    if(
        $username == $admin_username
        &&
        $password == $admin_password
    ){

        $_SESSION['admin'] = $username;

        header("Location: dashboard.php");
        exit;

    } else {

        $error = "Username atau Password salah!";

    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
    content="width=device-width, initial-scale=1.0">

    <title>
        Login Admin | Rental Mobil Arwana
    </title>

    <!-- GOOGLE FONT -->

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">

    <!-- FONT AWESOME -->

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins',sans-serif;
        }

        body{

            height:100vh;

            display:flex;
            justify-content:center;
            align-items:center;

            background:
            linear-gradient(
                135deg,
                #eef4ff,
                #f8fbff
            );

            overflow:hidden;
        }

        /* BACKGROUND */

        .circle1,
        .circle2{

            position:absolute;

            border-radius:50%;

            filter:blur(100px);

            z-index:1;
        }

        .circle1{

            width:350px;
            height:350px;

            background:#2563eb;

            top:-100px;
            left:-100px;

            opacity:0.25;
        }

        .circle2{

            width:300px;
            height:300px;

            background:#60a5fa;

            bottom:-100px;
            right:-100px;

            opacity:0.2;
        }

        /* LOGIN CARD */

        .login-card{

            width:430px;

            background:white;

            border-radius:35px;

            padding:45px;

            position:relative;

            z-index:2;

            box-shadow:
            0 20px 60px rgba(0,0,0,0.08);
        }

        /* LOGO */

        .logo{

            width:90px;
            height:90px;

            border-radius:28px;

            background:
            linear-gradient(
                135deg,
                #2563eb,
                #4f46e5
            );

            display:flex;
            justify-content:center;
            align-items:center;

            margin:auto;

            margin-bottom:25px;

            color:white;

            font-size:35px;
        }

        h1{

            text-align:center;

            font-size:32px;

            margin-bottom:10px;

            color:#111827;
        }

        .subtitle{

            text-align:center;

            color:#6b7280;

            margin-bottom:35px;
        }

        /* ERROR */

        .error{

            background:#fee2e2;

            color:#dc2626;

            padding:15px;

            border-radius:16px;

            text-align:center;

            margin-bottom:20px;
        }

        /* INPUT */

        .input-group{

            margin-bottom:20px;
        }

        .input-group label{

            display:block;

            margin-bottom:10px;

            color:#374151;

            font-weight:500;
        }

        .input-box{

            height:58px;

            background:#f9fafb;

            border-radius:18px;

            display:flex;
            align-items:center;

            padding:0 18px;

            gap:15px;

            border:1px solid transparent;

            transition:0.3s;
        }

        .input-box:focus-within{

            border-color:#2563eb;

            background:white;
        }

        .input-box i{

            color:#6b7280;
        }

        .input-box input{

            border:none;
            outline:none;

            width:100%;

            background:none;

            font-size:15px;
        }

        /* BUTTON */

        .login-btn{

            width:100%;
            height:58px;

            border:none;

            border-radius:18px;

            background:
            linear-gradient(
                135deg,
                #2563eb,
                #4f46e5
            );

            color:white;

            font-size:16px;
            font-weight:600;

            cursor:pointer;

            margin-top:10px;

            transition:0.3s;
        }

        .login-btn:hover{

            transform:translateY(-2px);

            box-shadow:
            0 10px 25px rgba(37,99,235,0.3);
        }

        /* FOOTER */

        .footer{

            text-align:center;

            margin-top:25px;

            color:#9ca3af;

            font-size:14px;
        }

    </style>

</head>

<body>

    <!-- BACKGROUND -->

    <div class="circle1"></div>
    <div class="circle2"></div>

    <!-- LOGIN CARD -->

    <div class="login-card">

        <div class="logo">

            <i class="fa-solid fa-car-side"></i>

        </div>

        <h1>
            Rental Mobil Arwana
        </h1>

        <p class="subtitle">
            Login Administrator
        </p>

        <!-- ERROR -->

        <?php if($error != ""){ ?>

            <div class="error">

                <?php echo $error; ?>

            </div>

        <?php } ?>

        <!-- FORM -->

        <form method="POST">

            <!-- USERNAME -->

            <div class="input-group">

                <label>
                    Username
                </label>

                <div class="input-box">

                    <i class="fa-solid fa-user"></i>

                    <input
                    type="text"
                    name="username"
                    placeholder="Masukkan username"
                    required>

                </div>

            </div>

            <!-- PASSWORD -->

            <div class="input-group">

                <label>
                    Password
                </label>

                <div class="input-box">

                    <i class="fa-solid fa-lock"></i>

                    <input
                    type="password"
                    name="password"
                    placeholder="Masukkan password"
                    required>

                </div>

            </div>

            <!-- BUTTON -->

            <button
            type="submit"
            name="login"
            class="login-btn">

                Login Admin

            </button>

        </form>

        <div class="footer">

            © 2026 Rental Mobil Arwana

        </div>

    </div>

</body>
</html>