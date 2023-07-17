@extends('layout.master')
@php
    echo $_SERVER['DOCUMENT_ROOT'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST'):
        $infoHost = 'mysql:host=localhost;dbname=establishment';
        $user = 'root';
        $paasword = '';
        $name = filter_var(trim($_POST['company']), FILTER_SANITIZE_STRING);
        $type = filter_var(trim($_POST['typ']), FILTER_SANITIZE_STRING);
        $cty = filter_var(trim($_POST['cty']), FILTER_SANITIZE_STRING);
        $area = filter_var(trim($_POST['ariea']), FILTER_SANITIZE_STRING);
        $establishing = filter_var(trim($_POST['company2']), FILTER_SANITIZE_STRING);
        $dis = filter_var(trim($_POST['dis']), FILTER_SANITIZE_STRING);
        $apout = filter_var(trim($_POST['apout']), FILTER_SANITIZE_STRING);
        $admin = filter_var(trim($_POST['adminName']), FILTER_SANITIZE_STRING);
        $location = filter_var(trim($_POST['location']), FILTER_SANITIZE_STRING);
        $phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
        $pssword = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        $pssword2 = filter_var($_POST['password2'], FILTER_SANITIZE_STRING);
        $error = '';
        $err;
        $num;
    
        try {
            $db = new PDO($infoHost, $user, $paasword);
            if (!empty($name && $type && $area && $establishing && $dis && $apout && $admin && $phone && $email && $pssword)):
                $q = "SELECT company_name,company_phone FROM `company` WHERE company_phone='" . $phone . "';";
                $res = $db->prepare($q);
                $res->execute();
                $info = $res->fetchAll();
                $name2 = '';
                $phone2 = '';
    
                foreach ($info as $keys => $value):
                    $name = trim($value[0]);
                    $phone = $value[1];
                endforeach;
    
                if ($name != $name2):
                    if ($phone != $phone2):
                        if ($pssword === $pssword2):
                            $error = '';
    
                            $imgs = strtolower($_FILES['logo']['name']);
                            $file_type = $_FILES['logo']['type'];
    
                            $file_size = $_FILES['logo']['size'];
                            $file_tmp = $_FILES['logo']['tmp_name'];
                            $file_error = $_FILES['logo']['error'];
                            $ty = substr(strstr($imgs, '.'), 1);
    
                            $file_name = $name . 'a.' . $ty;
    
                            $allowed_extensions = ['jpg', 'png'];
                            $imge_extensions = explode('.', $imgs);
                            $imge_extensions = strtolower(end($imge_extensions));
    
                            if ($file_error == 4):
                                $error = '<div> لم تقم باختير صورة</div>';
                            else:
                                if ($file_size > 1000000):
                                    $error = 'يجب ان يكون حجم الصورة اصغر من 1mg kp حجم صورتك' . $file_size . ' </div>';
                                endif;
    
                                if (!in_array($imge_extensions, $allowed_extensions)):
                                    $error = '<div> الصورة غير صالحة </div>';
                                endif;
                            endif;
    
                            if (empty($error)):
                                move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'] . '/img/schools/' . $name . $imgs);
    
                                $q = "INSERT INTO `company` VALUES (NULL, '" . $name . "', '" . $cty . "', '" . $area . "','" . $type . "', '" . $establishing . "', '" . $dis . "',  '" . $admin . "', '" . $phone . "','" . $email . "', '" . $name . $imgs . "', '" . md5($pssword . $email) . "','" . $location . "',' ','','');";
                                $res3 = $db->prepare($q);
                                $res3->execute();
                                $q5 = "SELECT id FROM `company` WHERE company_name='" . $name . "';";
                                $res5 = $db->prepare($q5);
                                $res5->execute();
                                $info5 = $res5->fetchAll();
                                $ides = '';
    
                                foreach ($info5 as $keys => $value):
                                    $ides = trim($value[0]);
                                endforeach;
                                header('location:/dashbord');
                                setcookie('sing', 1);
                                setcookie('typsin', 'school');
                                setcookie('company', $ides);
                                exit();
                            else:
                                $err = $error;
                            endif;
                        else:
                            $error = 'كلمة المرور غير متطابقة';
                            $num = 3;
                        endif;
                    else:
                        $error = ' هذا الرقم مسجل من قبل';
                        $num = 4;
                    endif;
                else:
                    $error = 'الاسم  مسجل مسبقا ';
                    $num = 2;
                endif;
            else:
                $error = 'الرجاء ملاء هذاه الحقول';
                $num = 1;
            endif;
        } catch (PDOException $m) {
            echo " error $m";
        }
    endif;
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
        }
    </style>

    <div class="container m-4 mt-5 textcent">

        <section class="container ">
            <div class=" col-11 textcent">
                <h4 class="mb-3">تسجيل </h4>
                <form class="needs-validation" novalidate action='' method='POST' enctype='multipart/form-data'>

                    @csrf

                    <div class="row g-3">
                        <div class="col-6">
                            <label for="firstName" class="form-label">اسم المدرسة</label>
                            <input type="text" class="form-control" id="firstName" placeholder=""
                                value="{{ @$company_name }}" required name="company">
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="country" class="form-label">نوع المؤسسة</label>
                            <select class="form-select" id="country" required name="typ">
                                <option value="">Choose...</option>
                                <option value="رياض" class="py-1">رياض</option>
                                <option value="اساس و متوسطة" class="py-1"> اساس + متوسط</option>
                                <option value="ثانوي" class="py-1">ثانوي</option>
                                <option value="معهد" class="py-1">معهد</option>
                                <option value="فني و حرفي" class="py-1">مدرسة فنية وحرفية</option>
                                <option value="أخرى">أخرى</option>
                            </select>
                            <div class="invalid-feedback">
                                الرجاء اختيار نوع المؤسسة
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="username" class="form-label">اسم مدير المدرسة</label>
                            <div class="input-group has-validation">
                                {{-- <span class="input-group-text"></span> --}}
                                <input type="text" class="form-control" id="username" placeholder="Username" required
                                    name="adminName" value="{{ @$company_admin_nam }}">
                                <div class="invalid-feedback">
                                    مطلوب اسم لمدير المدرسة
                                </div>
                            </div>
                        </div>



                        <div class="col-6">
                            <label for="email" class="form-label">رقم مدير الدرسة</label>
                            <input type="number" class="form-control" id="email" placeholder="+249..........."
                                name="phone" value="{{ @$company_phone }}">
                            <div class="invalid-feedback">
                                ايمل المدرسة مطلوب
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="email" class="form-label">ايميل المدرسة </label>
                            <input type="email" class="form-control" id="email" placeholder="you@example.com"
                                name="email" value="{{ @$company_email }}">
                            <div class="invalid-feedback">
                                ايمل المدرسة مطلوب
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="country" class="form-label">اسم الولاية</label>
                            <select class="form-select" id="cty" required name="cty" id="cty">
                                <option value="">Choose...</option>

                                <option value="الخرطوم" class="py-1">الخرطوم</option>
                                <option value="الجزيرة" class="py-1">الجزيرة</option>
                                <option value="البحر الاحمر" class="py-1">البحر الاحمر</option>
                                <option value="كسلا" class="py-1">كسلا</option>
                                <option value="القضارف" class="py-1">القضارف</option>
                                <option value="سنار" class="py-1">سنار</option>
                                <option value="النيل الابيض" class="py-1">النيل الابيض</option>
                                <option value="النيل الازرق" class="py-1">النيل الازرق</option>
                                <option value="الشمالية" class="py-1">الشمالية</option>
                                <option value="نهر النيل" class="py-1">نهر النيل</option>
                                <option value="شمال كردفان" class="py-1">شمال كردفان</option>
                                <option value="غرب كردفان" class="py-1">غرب كردفان</option>
                                <option value="جنوب كردفان" class="py-1">جنوب كردفان</option>
                                <option value="شمال درفور" class="py-1">شمال درفور </option>
                                <option value="غرب دارفور" class="py-1">غرب دارفور</option>
                                <option value="جنوب دارفور" class="py-1">جنوب دارفور</option>
                                <option value="شرق دارفور " class="py-1">شرق دارفور </option>
                                <option value="وسط دارفور" class="py-1">وسط دارفور</option>
                            </select>
                            <div class="invalid-feedback">
                                اسم ولاية غير صحيح
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="state" class="form-label">المحلية</label>
                            <select class="form-select" name="ariea" id="airea" required>
                                <option value="">Choose...</option>

                            </select>
                            <div class="invalid-feedback">
                                اسم محلية غير صحيح
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="address" class="form-label">المكان </label>
                            <input type="text" class="form-control" id="address" value="{{ @$company_location }}"
                                name="location" placeholder="شارع ........." required>
                            <div class="invalid-feedback">
                                الرجاء ملاء الحقل
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="address2" class="form-label">تاريخ تاسيس المؤسسة </label>
                            <input type="date" class="form-control" id="address2" placeholder="Apartment or suite"
                                name="company2">
                        </div>
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">شعار الؤسسة</label>
                            <input type="text" class="form-control" id="firstName" placeholder=""
                                value="{{ @$company_logo }}" name="dis" required>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">ايقونت المؤسسة</label>

                            <input type="file" class="form-control" id="customFile" required name="logo">

                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label for="firstName" class="form-label">نبذة عن المؤسسة</label>
                            <textarea name="apout" class="form-control my-2 bg-transparent textarea" maxlength="300"
                                placeholder="اكتب وصف كامل عن المؤسسة ">{{ @$_POST['dis'] }}</textarea>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">كلمة المرور</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password"
                                value="{{ @$company_pssword }}" placeholder="password" minlength="10">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">اعدة كتابة كلمة المرور</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password2"
                                placeholder=" password" value="{{ @$company_pssword2 }}" minlength="10">
                        </div>




                        <hr class="my-4">

                        <button class="w-50 btn btn-primary btn-lg textcent" type="submit">تسجيل</button>

                        <p>{{ @$error }}</p>
                </form>
            </div>


















        </section>
        <!-- stud sing end her -->
    </div>
@stop
