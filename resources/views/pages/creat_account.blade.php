@extends('layout.master')
@php
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $infoHost = 'mysql:host=localhost;dbname=establishment';
        $user = 'root';
        $paasword = '';
        $num;
    
        $user_name = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING);
        $user_phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
        $user_pssword = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        $user_pssword2 = filter_var($_POST['password2'], FILTER_SANITIZE_STRING);
        $user_age = filter_var(trim($_POST['age']), FILTER_SANITIZE_STRING);
        $user_type = filter_var(trim($_POST['type']), FILTER_SANITIZE_STRING);
        $user_cty = filter_var(trim($_POST['cty']), FILTER_SANITIZE_STRING);
        $user_stut = filter_var(trim($_POST['stut']), FILTER_SANITIZE_STRING);
        $error;
    
        try {
            $db = new PDO($infoHost, $user, $paasword);
            if ($user_name != '' && $user_pssword != '' && $user_phone != '' && $user_age != '' && $user_type != ''):
                $q = "SELECT name FROM `studin` WHERE name='$user_name';";
                $res4 = $db->prepare($q);
                $res4->execute();
                $info4 = $res4->fetchAll();
                $numss = '';
                foreach ($info4 as $key => $value) {
                    $numss = trim($value[0]);
                }
    
                $qphone = "SELECT company_phone	 FROM `company` WHERE company_phone='$user_phone';";
                $res4phone = $db->prepare($qphone);
                $res4phone->execute();
                $info4phone = $res4phone->fetchAll();
                $numssphone = '';
                foreach ($info4phone as $key => $value) {
                    $numssphone = trim($value[0]);
                }
    
                $qphone1 = "SELECT phone	 FROM `studin` WHERE phone='$user_phone';";
                $res41 = $db->prepare($qphone1);
                $res41->execute();
                $info411 = $res41->fetchAll();
                $numss1 = '';
                foreach ($info411 as $key => $value) {
                    $numss1 = trim($value[0]);
                }
    
                if ($user_name != $numss):
                    if ($user_phone != $numssphone && $user_phone != $numss1):
                        if ($user_pssword == $user_pssword2):
                            $q2 = "INSERT INTO `studin` VALUES (NULL, '" . $user_name . "', '" . $user_phone . "', '" . $user_type . "', '" . $user_age . "' ,'" . $user_cty . "',' " . md5($user_pssword . $user_phone) . "', NULL , NULL , NULL , NULL ,'" . $user_stut . "' );";
                            $responsiveness2 = $db->prepare($q2);
                            $responsiveness2->execute();
    
                            $q5 = "SELECT id FROM `studin` WHERE name='" . $user_name . "';";
                            $res5 = $db->prepare($q5);
                            $res5->execute();
                            $info5 = $res5->fetchAll();
                            $ides = '';
    
                            foreach ($info5 as $keys => $value):
                                $ides = trim($value[0]);
                            endforeach;
                            setcookie('studing', $ides);
                            setcookie('sing', 'ysea');
                            setcookie('typsin', 'studing');
                            header('location:/');
                            exit();
                        else:
                            $error = 'كلمة المرور غير متطابقة';
                            $num = 3;
                        endif;
                    else:
                        $error = ' هذا الرقم مسجل من قبل';
                        $num = 4;
                    endif;
                else:
                    $error = 'الاسم موجود مسبقا';
                    $num = 2;
                endif;
            else:
                $error = 'الرجاء ملاء الحقول';
                $num = 1;
            endif;
        } catch (PDOException $m) {
            echo " error $m";
        }
    }
@endphp

@section('body')





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

        .textcent {
            margin-right: auto !important;
            margin-left: auto !important;
            margin-top: 100px
        }
    </style>

    <div class="container m-4 mt-5 textcent">

        <section class="container ">
            <div class=" col-11 textcent">
                {{-- <h4 class="mb-3">تسجيل </h4> --}}
                <form class="needs-validation" novalidate action='' method='POST' enctype='multipart/form-data'>

                    @csrf

                    <div class="row g-3">
                        <div class="col-6">
                            <label for="firstName" class="form-label">اسم الطالب</label>
                            <input type="text" class="form-control" id="firstName" placeholder=""
                                value="{{ @$user_name }}" required name="username">
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="country" class="form-label">المرحلة الدراسية</label>
                            <select class="form-control" required name="type" id="type">
                                <option value="">Choose...</option>
                                <option value="رياض وحضانة اطفال" class="py-1">مرحلة ما قبل الدرسة</option>
                                <option value="المرحة المدرسية" class="py-1">المرحة المدرسية</option>
                                <option value="المرحلة الثانوية" class="py-1">المرحلةالثانوية</option>
                                <option value="أخرى" class="py-1">أخرى</option>
                            </select>
                            <div class="invalid-feedback">
                                الرجاء المرحلة الدراسية
                            </div>
                        </div>



                        <div class="col-6">
                            <label for="email" class="form-label">رقم والى امر الطالب</label>
                            <input type="tel" class="form-control" id="email" placeholder="+249..........."
                                name="phone" value="{{ @$user_phone }}">
                            <div class="invalid-feedback">
                                ايمل المدرسة مطلوب
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="email" class="form-label">ايميل الطالب </label>
                            <input type="email" class="form-control" id="email" placeholder="you@example.com"
                                name="email" value="{{ @$company_email }}">
                            <div class="invalid-feedback">
                                ايمل المدرسة مطلوب
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="address2" class="form-label">تاريخ الميلاد</label>
                            <input type="date" class="form-control" id="address2" name="age" maxlength="2"
                                minlength="1" required value="{{ @$user_age }}" class="form-control mb-3"
                                placeholder="العمر">
                        </div>

                        <div class="col-6">
                            <label for="country" class="form-label">الحالة الصحية</label>


                            <select class="form-control" required name="stut" id="stut">
                                <option value="">Choose...</option>
                                <option value="سليم" class="py-1">سليم</option>
                                <option value="معاق جسدي" class="py-1">معاق جسديا</option>
                                <option value="معاق عقلي" class="py-1">معاق عقلي</option>
                                <option value="أخرى" class="py-1">أخرى</option>
                            </select>
                            <div class="invalid-feedback">
                                الرجاء المرحلة الدراسية
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="username" class="form-label">مكان اقامة الطالب</label>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control" id="address" required maxlength="25"
                                    name="cty" id="cty" value="{{ @$_POST['cty'] }}" placeholder="شارع .........">
                                <div class="invalid-feedback">
                                    مكان الاقامة الحالية
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">كلمة المرور</label>
                            <input type="password" class="form-control" id="exampleInputPassword1"name="password"
                                value="{{ @$user_pssword }}" placeholder="password" minlength="10">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">اعدة كتابة كلمة المرور</label>
                            <input type="password" class="form-control" id="exampleInputPassword1"
                                placeholder=" password" name="password2" value="{{ @$user_pssword2 }}" minlength="10">
                        </div>

                        <hr class="my-2">

                        <button class="w-50 btn btn-primary btn-lg textcent" type="submit">تسجيل</button>

                        <p>{{ @$error }}</p>
                </form>
            </div>

        </section>
        <!-- stud sing end her -->
    </div>




@stop
