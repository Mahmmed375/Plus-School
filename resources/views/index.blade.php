@php
    $db_info = 'mysql:host=localhost;dbname=establishment';
    $db_user = 'root';
    $db_password = '';
    $resalt = 0;
    $condetion = 1;
    $err = '';
    
    try {
        $db = new PDO($db_info, $db_user, $db_password);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['post1'])) {
                $Fond = filter_var($_POST['search'], FILTER_SANITIZE_STRING);
    
                if (!empty(@$_POST['search'])) {
                    $q = "SELECT * FROM `company` WHERE company_name='" . $Fond . "';";
                    $res = $db->prepare($q);
                    $res->execute();
                    $info = $res->fetchAll();
    
                    if (!empty($info)) {
                        $resalt = 1;
                        $condetion = 2;
                    } else {
                        $resalt = 2;
                        $condetion = 4;
                    }
                    $dis = '';
                } elseif (empty(@$_POST['search'])) {
                    $err = 'الرجاء كتابة اسم مدرسة ';
                    $condetion = 3;
                } else {
                    $condetion = 1;
                }
            } elseif (isset($_POST['post2'])) {
                $company_name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
                $password123 = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    
                $error;
    
                if (($company_name && $password123) != ''):
                    $q = "SELECT phone FROM `studin` WHERE phone='" . $company_name . "';";
                    $res = $db->prepare($q);
                    $res->execute();
                    $info = $res->fetchAll();
                    $name = '';
    
                    foreach ($info as $keys => $value):
                        $name = $value[0];
                    endforeach;
    
                    $q3 = "SELECT password  FROM `studin` WHERE phone='" . $company_name . "';";
                    $res3 = $db->prepare($q3);
                    $res3->execute();
                    $info3 = $res3->fetchAll();
                    $pass = '';
                    foreach ($info3 as $keys => $value):
                        $pass = $value[0];
                    endforeach;
    
                    if ($company_name == @$name):
                        if (md5($password123 . $company_name) == trim($pass)):
                            $q5 = "SELECT id FROM `studin` WHERE phone='" . $company_name . "';";
                            $res5 = $db->prepare($q5);
                            $res5->execute();
                            $info5 = $res5->fetchAll();
                            $ides = '';
    
                            foreach ($info5 as $keys => $value):
                                $ides = trim($value[0]);
                            endforeach;
                            setcookie('studing', $ides);
                            header('location:/');
                            setcookie('sing', 2);
                            exit();
                        else:
                            $error = 'كلمة المرور غير صحيحة';
                        endif;
                    else:
                        $error = 'الرقم غير مسجل';
                    endif;
                endif;
            }
        }
    } catch (PDOException $i) {
        echo $i;
    }
    
@endphp
@extends('layout.master')

@section('body')

    <div class=" styleing"> </div>
    <!-- Custom styles for this template -->


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 700px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }

            .stydan {
                min-width: 120px;
                margin-right: 5px !important;
            }

            .conter {
                font-size: 1.5rem !important;
            }
        }

        @media (min-width: 990px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }

            .stydan {
                min-width: 120px;
                margin-right: 5px !important;
            }

            .conter {
                font-size: 1.5rem !important;
            }
        }


        @media (max-width:990px) {
            .display-4 {
                text-align: center;
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

        @media (min-width: 992px) {
            .rounded-lg-3 {
                border-radius: .3rem;
            }
        }

        .styleing {
            display: block;
            width: 100%;
            height: 145px;
            position: relative;
            top: 145px !important;
        }

        .link {
            color: blue !important;
        }
    </style>
    @if ($condetion == 1)
        <main>
            <div class="container">



                

                <form class="form-group  mt-3 " method="POST" id="1">
                    @csrf
                    <div class="px-4 py-5 my-5 mt-4   text-center">
                        <img class="d-block mx-auto mb-4" src="img/icon/logo.jpg" alt="" width="72" height="57">
                        <h1 class="display-5 fw-bold">اهلا وسهلا بكم</h1>
                        <div class="col-lg-6 mx-auto">
                            <p class="lead mb-4">نتمنا لكم تجربة مميزة و سهل معا و نتمنا سماع ارئكم حولنا وشكرا لكم</p>

                            <input class="form-control  " autofocus autocomplete="language" type="search" name="search"
                                placeholder="الرجاء كتابة اسم المؤسسة التعليمية هنا" aria-bs-label="Search" />
                            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">

                                <button type="submit" class="btn btn-primary btn-lg px-4 gap-3 mt-4" name="post1"
                                    value="1">بحث</button>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="b-example-divider"></div>
            @if (!isset($_COOKIE['sing']))
                <div class="container">
                    <div class="container my-5">
                        <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
                            <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
                                <h1 class="display-4 fw-bold lh-1 mb-3">من انت</h1>
                                <p class="lead">اذا كنت طالب وتبجث عن دور العلم و المعرفة فذا خيرك المناسب و الافضل اما
                                    اذا
                                    كنت
                                    مدير مؤسسة تبحث عن طالبي العلم و المعرفة فانت في المكان المناسب فقط اختار ة نحن سوف نلبي
                                    طلبك
                                </p>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                                    <a href="#login" class="  w-300 "> <button type="button"
                                            class="stydan btn btn-primary btn-lg px-4 w-300 me-md-2 w-100">
                                            طالب
                                        </button></a>
                                    <a href="school ">
                                        <button type="button" class="btn btn-outline-secondary btn-lg px-4  w-100">مؤسسة
                                            تعليية</button></a>
                                </div>

                            </div>
                            <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
                                <img src="img/icon/icon1.svg" class="img-fluid border rounded-3 shadow-lg mb-4"
                                    alt="Example image" width="700" height="500" loading="lazy">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="b-example-divider"></div>
                <div class="container">
                    <div class="container col-xl-10 col-xxl-8 px-4 py-5" id="login">
                        <div class="row align-items-center g-lg-5 py-5">
                            <div class="col-lg-7 text-center text-lg-end">
                                <h1 class="display-4 fw-bold lh-1 mb-3">تسجيل الدخول</h1>
                                <p class="col-lg-10 fs-4"> من خلا التسجيل يمكنك التمتع بالخدمات التي نخدمها بشكل افضل واذا
                                    لم
                                    تكن مسجلا الرجاء التسجيل لتحقيق اقصا استفادة من الموقع فقط اضخط <a href="creat_account"
                                        class="link">
                                        هنا</a></p>
                            </div>
                            <div class="col-md-10 mx-auto col-lg-5">
                                <form class="p-4 p-md-5 border rounded-3 bg-light" method="POST">
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <input type="tel" class="form-control" id="floatingInput"
                                            placeholder="name@example.com" name="name">
                                        <label for="floatingInput">البريد الالكتروني</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" id="floatingPassword"
                                            placeholder="Password" name="password">
                                        <label for="floatingPassword">كلمة المرور</label>
                                    </div>
                                    <div class="checkbox mb-3">
                                        <label>
                                            <input type="checkbox" value="remember-me"> تذكرني
                                        </label>
                                    </div>
                                    <button class="w-100 btn btn-lg btn-primary" type="submit" name="post2"
                                        value="2">دخول</button>
                                    <p class="error">{{ @$error }}</p>
                                    <hr class="my-4">
                                    <small class="text-muted">اذا نسيت كلمة المرور اضخط <a href="reaset"
                                            class="link">هنا</a></small>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="b-example-divider"></div>
            <div class="container">
                <div class="container my-5">
                    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
                        <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
                            <h1 class="display-4 fw-bold lh-1">من نحن </h1>
                            <p class="lead"> نحن عبارة عن مجموعة من الطلاب اللذين يسعون الي نهضة البلاد من اجل اجيال
                                واعدة ومزدهرة و نسع الي جعل التعليم في السودان اكثر تطورا وتقدما من خلال جعل الوصول اليه
                                سهلا
                                وممتعا في نفس الوقت و التقليل من تكاليف التعليم الباهظة وجعل التعليم للجميع تحت شعار معنا
                                نحو
                                سودان جديد</p>

                        </div>
                        <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
                            <img class="rounded-lg-3" src="img/icon/icon2.svg" alt="" width="720">
                        </div>
                    </div>
                </div>
            </div>

            <div class="b-example-divider"></div>
            <div class="container">
                <div class="container my-5">
                    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
                        <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
                            <h1 class="display-4 fw-bold lh-1">اهدافنا</h1>
                            <p class="lead">
                            <ul style=" font-size: 1em" class="conter">
                                <li class="">تسهيل الوصول الى التعليم </li>
                                <li class="">التسوية بين فئاة المجتمع في التعليم</li>
                                <li class="">جعل التعليم اكثر تنافسية </li>
                                <li class="">توفير كافة الاحتيجات الطلابية</li>
                                <li class="">ضمان وصول التعليم لكل منزل</li>

                            </ul>
                            </p>

                        </div>
                        <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
                            <img class="rounded-lg-3" src="img/icon/icon3.svg" alt="" width="720">
                        </div>
                    </div>
                </div>

            </div>
        </main>
    @elseif ($condetion == 2)
        <div class="container">
            <article class="TopVeos container-fluid py-2 my-5 ">

                <div class="row justify-content-around g-2 my-3">
                    @php
                        $get_info2 = 'SELECT id FROM `company` WHERE  company_name="' . $Fond . '"  ;';
                        $info2 = $db->prepare($get_info2);
                        $info2->execute();
                        $informtion2 = $info2->fetchAll();
                        
                        $i2 = count($informtion2);
                        $idd = [];
                    @endphp
                    @for ($i = 1; $i <= $i2; $i++)
                        @php
                            foreach ($informtion2 as $key => $value):
                                array_unshift($idd, $value['id']);
                            endforeach;
                            $get_info = 'SELECT * FROM `company` WHERE id=' . @$idd[$i] . ' ;';
                            $info = $db->prepare($get_info);
                            $info->execute();
                            $informtion = $info->fetchAll();
                            $name = '';
                            $idschool = '';
                            $discrip = '';
                            $icon = '';
                            foreach ($informtion as $key => $value):
                                $idschool = $value[0];
                                $name = $value[1];
                                $discrip = $value[6];
                                $icon = $value[10];
                            endforeach;
                        @endphp
                        @if ($name != '')
                            <div class='col-md-4' id='" . $idschool . "'>
                                <!-- المحجتوي -->
                                <div class='card  ' title="{{ $name }}"><img class='card-img-top  '
                                        src='img/schools/{{ $icon }}' alt='Card image cap'
                                        style="    max-height: 200px;
                                    min-height: 200px;">
                                    <div class='card-body text-center'>
                                        <h5 class='card-title fw-bold'> {{ $name }}</h5>
                                        <p class='card-text' title="{{ $discrip }}">{{ $discrip }}</p> <a
                                            href='show'>
                                            <div class='clicks' id='{{ $idschool }}'
                                                title="اضغط من اجل التسجيل في {{ $name }}"><button
                                                    class='btn btn-success ' id='1'>عرض المزيد </button>
                                            </div>

                                        </a>
                                    </div>
                                </div>
                            </div>
                        @else
                            {{ 'hf' }}
                        @endif
                    @endfor
                </div>
            </article>
        </div>
    @elseif ($condetion == 3)
        <main>
            <div class="container">


                

                <form class="form-group  mt-3 " method="POST">
                    @csrf
                    <div class="px-4 py-5 my-5 mt-4   text-center">
                        <img class="d-block mx-auto mb-4" src="img/icon/logo.jpg" alt="" width="72"
                            height="57">
                        <h1 class="display-5 fw-bold">اهلا وسهلا بكم</h1>
                        <div class="col-lg-6 mx-auto">
                            <p class="lead mb-4">نتمنا لكم تجربة مميزة و سهل معا و نتمنا سماع ارئكم حولنا وشكرا لكم</p>
                            <input class="form-control  " autofocus autocomplete="language" type="search"
                                name="search" placeholder="الرجاء كتابة اسم المؤسسة التعليمية هنا"
                                aria-bs-label="Search" />
                            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">

                                <button type="submit" class="btn btn-primary btn-lg px-4 gap-3 mt-4" name="post1"
                                    value="1">بحث</button>


                            </div>
                            <p class="error">

                                {{ @$err }}

                            </p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="b-example-divider"></div>
            @if (!isset($_COOKIE['sing']))
                <div class="container">
                    <div class="container col-xxl-8 px-4 py-5">
                        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                            <div class="col-10 col-sm-8 col-lg-6">
                                <img src="img/icon/icon1.svg" class="img-fluid border rounded-3 shadow-lg mb-4"
                                    alt="Example image" width="700" height="500" loading="lazy">
                            </div>
                            <div class="col-lg-6">
                                <h1 class="display-4 fw-bold lh-1 mb-3">من انت</h1>
                                <p class="lead">اذا كنت طالب وتبجث عن دور العلم و المعرفة فذا خيرك المناسب و الافضل اما
                                    اذا
                                    كنت
                                    مدير مؤسسة تبحث عن طالبي العلم و المعرفة فانت في المكان المناسب فقط اختار ة نحن سوف نلبي
                                    طلبك
                                </p>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                                    <a href="#login" class="  w-300 "> <button type="button"
                                            class="stydan btn btn-primary btn-lg px-4 w-300 me-md-2 w-100">
                                            طالب
                                        </button></a>
                                    <a href="http://school.mysdschool.com/singin ">
                                        <button type="button" class="btn btn-outline-secondary btn-lg px-4  w-100">مؤسسة
                                            تعليية</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="b-example-divider"></div>
                <div class="container" id="login">
                    <div class="container col-xl-10 col-xxl-8 px-4 py-5" id="singinschool">
                        <div class="row align-items-center g-lg-5 py-5">
                            <div class="col-lg-7 text-center text-lg-end">
                                <h1 class="display-4 fw-bold lh-1 mb-3">تسجيل الدخول</h1>
                                <p class="col-lg-10 fs-4"> من خلا التسجيل يمكنك التمتع بالخدمات التي نخدمها بشكل افضل واذا
                                    لم
                                    تكن مسجلا الرجاء التسجيل لتحقيق اقصا استفادة من الموقع فقط اضخط <a href="creat_account"
                                        class="link">
                                        هنا</a></p>
                            </div>
                            <div class="col-md-10 mx-auto col-lg-5">
                                <form class="p-4 p-md-5 border rounded-3 bg-light" method="POST">
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <input type="tal" class="form-control" id="floatingInput"
                                            placeholder="name@example.com" name="name">
                                        <label for="floatingInput">البريد الالكتروني</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" id="floatingPassword"
                                            placeholder="Password" name="password">
                                        <label for="floatingPassword">كلمة المرور</label>
                                    </div>
                                    <div class="checkbox mb-3">
                                        <label>
                                            <input type="checkbox" value="remember-me"> تذكرني
                                        </label>
                                    </div>
                                    <button class="w-100 btn btn-lg btn-primary" type="submit" name="post2"
                                        value="2">دخول</button>
                                    <p class="error">{{ @$error }}</p>
                                    <hr class="my-4">
                                    <small class="text-muted">اذا نسيت كلمة المرور اضخط <a href="reaset"
                                            class="link">هنا</a></small>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="b-example-divider"></div>
            @endif
            <div class="container">
                <div class="container my-5">
                    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
                        <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
                            <h1 class="display-4 fw-bold lh-1">من نحن </h1>
                            <p class="lead"> نحن عبارة عن مجموعة من الطلاب اللذين يسعون الي نهضة البلاد من اجل اجيال
                                واعدة ومزدهرة و نسع الي جعل التعليم في السودان اكثر تطورا وتقدما من خلال جعل الوصول اليه
                                سهلا
                                وممتعا في نفس الوقت و التقليل من تكاليف التعليم الباهظة وجعل التعليم للجميع تحت شعار معنا
                                نحو
                                سودان جديد</p>

                        </div>
                        <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
                            <img class="rounded-lg-3" src="img/icon/icon2.svg" alt="" width="720">
                        </div>
                    </div>
                </div>
            </div>

            <div class="b-example-divider"></div>
            <div class="container">
                <div class="container my-5">
                    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
                        <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
                            <h1 class="display-4 fw-bold lh-1">اهدافنا</h1>
                            <p class="lead">
                            <ul style=" font-size: 1em" class="conter">
                                <li class="">تسهيل الوصول الى التعليم </li>
                                <li class="">التسوية بين فئاة المجتمع في التعليم</li>
                                <li class="">جعل التعليم اكثر تنافسية </li>
                                <li class="">توفير كافة الاحتيجات الطلابية</li>
                                <li class="">ضمان وصول التعليم لكل منزل</li>

                            </ul>
                            </p>

                        </div>
                        <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
                            <img class="rounded-lg-3" src="img/icon/icon3.svg" alt="" width="720">
                        </div>
                    </div>
                </div>

            </div>
        </main>
    @elseif ($condetion == 4)
        <main>
            <div class="container">


                

                <form class="form-group  mt-3 " method="POST">
                    @csrf
                    <div class="px-4 py-5 my-5 mt-4   text-center">
                        <img class="d-block mx-auto mb-4" src="img/icon/logo.jpg" alt="" width="72"
                            height="57">
                        <h1 class="display-5 fw-bold">اهلا وسهلا بكم</h1>
                        <div class="col-lg-6 mx-auto">
                            <p class="lead mb-4">نتمنا لكم تجربة مميزة و سهل معا و نتمنا سماع ارئكم حولنا وشكرا لكم</p>
                            <input class="form-control  " autofocus autocomplete="language" type="search"
                                value="{{ @$Fond }}" name="search"
                                placeholder="الرجاء كتابة اسم المؤسسة التعليمية هنا" aria-bs-label="Search" />
                            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">

                                <button type="submit" class="btn btn-primary btn-lg px-4 gap-3 mt-4" name="post1"
                                    value="1">بحث</button>


                            </div>
                            <p class="error">

                                ناسف لم يتم العثور على نتيجة الرجاء اعدة المحولة مرة اخرة

                            </p>
                        </div>
                    </div>
                </form>
            </div>
            @if (!isset($_COOKIE['sing']))
                <div class="b-example-divider"></div>
                <div class="container">
                    <div class="container col-xxl-8 px-4 py-5">
                        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                            <div class="col-10 col-sm-8 col-lg-6">
                                <img src="img/icon/icon1.svg" class="img-fluid border rounded-3 shadow-lg mb-4"
                                    alt="Example image" width="700" height="500" loading="lazy">
                            </div>
                            <div class="col-lg-6">
                                <h1 class="display-4 fw-bold lh-1 mb-3">من انت</h1>
                                <p class="lead">اذا كنت طالب وتبجث عن دور العلم و المعرفة فذا خيرك المناسب و الافضل اما
                                    اذا
                                    كنت
                                    مدير مؤسسة تبحث عن طالبي العلم و المعرفة فانت في المكان المناسب فقط اختار ة نحن سوف نلبي
                                    طلبك
                                </p>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                                    <a href="#login" class="  w-300 "> <button type="button"
                                            class="stydan btn btn-primary btn-lg px-4 w-300 me-md-2 w-100">
                                            طالب
                                        </button></a>
                                    <a href="http://school.mysdschool.com/singin ">
                                        <button type="button" class="btn btn-outline-secondary btn-lg px-4  w-100">مؤسسة
                                            تعليية</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="b-example-divider"></div>
                <div class="container">
                    <div class="container col-xl-10 col-xxl-8 px-4 py-5" id="singinschool">
                        <div class="row align-items-center g-lg-5 py-5">
                            <div class="col-lg-7 text-center text-lg-end">
                                <h1 class="display-4 fw-bold lh-1 mb-3">تسجيل الدخول</h1>
                                <p class="col-lg-10 fs-4"> من خلا التسجيل يمكنك التمتع بالخدمات التي نخدمها بشكل افضل واذا
                                    لم
                                    تكن مسجلا الرجاء التسجيل لتحقيق اقصا استفادة من الموقع فقط اضخط <a href="creat_account"
                                        class="link">
                                        هنا</a></p>
                            </div>
                            <div class="col-md-10 mx-auto col-lg-5" id="login">
                                <form class="p-4 p-md-5 border rounded-3 bg-light" method="POST">
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <input type="tal" class="form-control" id="floatingInput"
                                            placeholder="name@example.com" name="name">
                                        <label for="floatingInput">البريد الالكتروني</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" id="floatingPassword"
                                            placeholder="Password" name="password">
                                        <label for="floatingPassword">كلمة المرور</label>
                                    </div>
                                    <div class="checkbox mb-3">
                                        <label>
                                            <input type="checkbox" value="remember-me"> تذكرني
                                        </label>
                                    </div>
                                    <button class="w-100 btn btn-lg btn-primary" type="submit" name="post2"
                                        value="2">دخول</button>
                                    <p class="error">{{ @$error }}</p>
                                    <hr class="my-4">
                                    <small class="text-muted">اذا نسيت كلمة المرور اضخط <a href="reaset"
                                            class="link">هنا</a></small>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="b-example-divider"></div>
            <div class="container">
                <div class="container my-5">
                    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
                        <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
                            <h1 class="display-4 fw-bold lh-1">من نحن </h1>
                            <p class="lead"> نحن عبارة عن مجموعة من الطلاب اللذين يسعون الي نهضة البلاد من اجل اجيال
                                واعدة ومزدهرة و نسع الي جعل التعليم في السودان اكثر تطورا وتقدما من خلال جعل الوصول اليه
                                سهلا
                                وممتعا في نفس الوقت و التقليل من تكاليف التعليم الباهظة وجعل التعليم للجميع تحت شعار معنا
                                نحو
                                سودان جديد</p>

                        </div>
                        <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
                            <img class="rounded-lg-3" src="img/icon/icon2.svg" alt="" width="720">
                        </div>
                    </div>
                </div>
            </div>

            <div class="b-example-divider"></div>
            <div class="container">
                <div class="container my-5">
                    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
                        <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
                            <h1 class="display-4 fw-bold lh-1">اهدافنا</h1>
                            <p class="lead">
                            <ul style=" font-size: 1em" class="conter">
                                <li class="">تسهيل الوصول الى التعليم </li>
                                <li class="">التسوية بين فئاة المجتمع في التعليم</li>
                                <li class="">جعل التعليم اكثر تنافسية </li>
                                <li class="">توفير كافة الاحتيجات الطلابية</li>
                                <li class="">ضمان وصول التعليم لكل منزل</li>

                            </ul>
                            </p>

                        </div>
                        <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
                            <img class="rounded-lg-3" src="img/icon/icon3.svg" alt="" width="720">
                        </div>
                    </div>
                </div>

            </div>
        </main>
    @endif




@stop
