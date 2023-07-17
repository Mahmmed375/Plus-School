@extends('layout.master')
@php
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST'):
        $infoHost = 'mysql:host=localhost;dbname=establishment';
        $user = 'root';
        $paasword = '';
    
        $email = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $password123 = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        $num;
        $error;
        try {
            $db = new PDO($infoHost, $user, $paasword);
    
            if (($email && $password123) != ''):
                $qs = "SELECT company_email FROM `company` WHERE company_email='" . $email . "';";
                $ress3 = $db->prepare($qs);
                $ress3->execute();
                $infos = $ress3->fetchAll();
                $names2 = '';
                foreach ($infos as $keys => $value):
                    $names2 = $value[0];
                endforeach;
    
                $q33 = "SELECT company_password FROM `company` WHERE company_email='" . $email . "';";
                $res33 = $db->prepare($q33);
                $res33->execute();
                $info33 = $res33->fetchAll();
                $pass3 = '';
                foreach ($info33 as $keys => $value):
                    $pass3 = $value[0];
                endforeach;
                if ($email == @$names2):
                    if (md5($password123 . $email) == trim($pass3)):
                        $q5 = "SELECT id FROM `company` WHERE company_email='" . $email . "';";
                        $res5 = $db->prepare($q5);
                        $res5->execute();
                        $info5 = $res5->fetchAll();
                        $ides = '';
    
                        foreach ($info5 as $keys => $value):
                            $com = trim($value[0]);
                        endforeach;
                        setcookie('company', $com);
                        setcookie('sing', 1);
                        setcookie('typsin', 'school');
                        header('location:dashbord');
                        exit();
                    else:
                        $error = 'كلمة المرور غير صحيحة';
                        $num = 4;
                    endif;
                else:
                    $error = 'البريد الالكتروني او كلمة المرور غير صحيحة';
                    $num = 2;
                endif;
            else:
                $error = 'الرجاء ادخال البيانات';
                $num = 1;
            endif;
        } catch (PDOException $m) {
            echo " error $m";
        }
    endif;
@endphp

@section('body')

    <link rel="stylesheet" href="css\modals.css">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
    </head>

    <body class="text-center">

        <main class="form-signin w-100 m-auto">
            <form action="" class="form-group text-right my-5" method="POST">
                @csrf
                <img class="mb-4 img" src="img\icon\logo.jpg" alt="" width="72" height="57">
                <h1 class="h3 mb-4 mt-4 fw-normal">تسجيل الدخول</h1>

                <div class="form-floating">

                    <input type="email" class="form-control mb-2" id="floatingInput" placeholder="name@example.com"
                        value="{{ @$email }}" autofocus name="name">
                    <label for="floatingInput" class="lav2 text-end" style="margin-left: 59%;">البريد الالكتروني</label>
                </div>

                <div class="form-floating">

                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                        value="{{ @$password123 }}" name="password">
                    <label for="floatingPassword" class="lav2 text-end" style="margin-left: 59%;">كلمة المرور</label>
                </div>


                <div class="checkbox mt-3 ">
                    <label class="lav">
                        <input type="checkbox" value="remember-me" name="remember-me"> تذكرني

                    </label>
                </div>
                <span class="errors"><?php
                echo @$error;
                ?></span><br>
                <button class="w-100 btn btn-lg btn-primary mb-3" type="submit">تسجيل دخول</button>
                <small class="text-muted mt-3 lav2">اذا نسيت كلمة المرور او البريد الالكتروني اضخط <a
                        href="reastPass">هنا</a></small>
                <br>
                <small class="text-muted mt-3 lav2"> <a href="singin">انشاء حساب جديد</a></small>
                <p class="mt-5 mb-3 text-muted">&copy; 2023–2024</p>
            </form>
        </main>

    @stop
