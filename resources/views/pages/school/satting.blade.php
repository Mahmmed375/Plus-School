@php
    $dbinfo = 'mysql:host=localhost;dbname=establishment';
    $userName = 'root';
    $password = '';
    try {
        $db = new PDO($dbinfo, $userName, $password);
        $id = $_COOKIE['company'];
        ###########################################
        // معلومات المدرسة
        ###########################################
        $get_info = 'SELECT * FROM `company` WHERE id=' . $id . ';';
        $info = $db->prepare($get_info);
        $info->execute();
        $informtion = $info->fetchAll();
        $name = '';
        $img = '';
        $admin = '';
        $adminphone = '';
        $location = '';
        $discription = '';
        $logotext = '';
        $cty = '';
        $cty2 = '';
        $email = '';
        $typschool = '';
        foreach ($informtion as $key => $value) {
            $name = $value[1];
            $img = $value[10];
            $logotext = $value[5];
            $discription = $value[6];
            $admin = $value[7];
            $adminphone = $value[8];
            $location = $value[12];
            $cty = $value[2];
            $email = $value[9];
            $typschool = $value[3];
        }
    
        ############################################
    
        ########################################
    } catch (PDOException $e) {
        echo 'error' . $e;
    }
@endphp
@php
    
    $class9 = 'SELECT * FROM `classinf` WHERE school=' . $id . ' ;';
    $class9Info = $db->prepare($class9);
    $class9Info->execute();
    $infoclass9 = $class9Info->fetchAll();
    if (empty($infoclass9)):
        if ($typschool == 'مدرسة خاصة' || $typschool == 'مدرسة حكومية') {
            for ($i = 1; $i <= 9; $i++) {
                $inclass = 'INSERT INTO `classinf` VALUES (' . $i . '," "," ",' . $id . '," ");';
                $re = $db->prepare($inclass);
                $re->execute();
            }
        } else {
            for ($i = 1; $i <= 3; $i++) {
                $inclass = 'INSERT INTO `classinf` VALUES (' . $i . '," "," ",' . $id . '," ");';
                $re = $db->prepare($inclass);
                $re->execute();
            }
        }
        # code...
        # code...
    elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updateClass'])):
        if ($typschool == 'مدرسة خاصة' || $typschool == 'مدرسة حكومية') {
            for ($ic = 0; $ic <= 8; $ic++) {
                if (isset($_POST['dis' . $ic])) {
                    $pric = $_POST['pric' . $ic];
                    $dis = $_POST['dis' . $ic];
                    $cont = $_POST['cont' . $ic];
                    $inse = 'UPDATE `classinf` SET pric="' . $pric . ' ", conet="' . $cont . '" , discont1="' . $dis . '" WHERE school=' . $id . ' AND classname=' . ($ic + 1) . ';';
                    $res = $db->prepare($inse);
                    $res->execute();
                    if ($ic == 8) {
                        header('location:satting');
                        exit();
                    }
                }
            }
        } else {
            for ($ic = 0; $ic <= 2; $ic++) {
                if (isset($_POST['dis' . $ic])) {
                    $pric = $_POST['pric' . $ic];
                    $dis = $_POST['dis' . $ic];
                    $cont = $_POST['cont' . $ic];
                    $inse = 'UPDATE `classinf` SET pric="' . $pric . ' ", conet="' . $cont . '" , discont1="' . $dis . '" WHERE school=' . $id . ' AND classname=' . ($ic + 1) . ';';
                    $res = $db->prepare($inse);
                    $res->execute();
                    if ($ic == 2) {
                        header('location:satting');
                        exit();
                    }
                }
            }
        }
    endif;
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updatsecrit'])):
        $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
        $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
        $pass1 = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        $pass2 = filter_var($_POST['password1'], FILTER_SANITIZE_STRING);
        $pass3 = filter_var($_POST['password2'], FILTER_SANITIZE_STRING);
        $error = '';
    
        $q33 = 'SELECT company_password FROM `company` WHERE id=' . $id . ';';
        $res33 = $db->prepare($q33);
        $res33->execute();
        $info33 = $res33->fetchAll();
        $pass33 = '';
        foreach ($info33 as $keys => $value):
            $pass33 = $value[0];
        endforeach;
        if ($pass1 != ''):
            if (md5($pass1 . $adminphone) == trim($pass33)):
                if ($pass2 == $pass3):
                    $inse2 = 'UPDATE `company` SET company_email="' . $email . '" , company_phone="' . $phone . '" , company_password="' . md5($pass3 . $name) . '" WHERE id=' . $id . ' ;';
                    $res2 = $db->prepare($inse2);
                    $res2->execute();
                    if ($res2->execute() == true):
                        $error = 'تم التغير بس نجاح';
                        header('location:satting');
                        exit();
                    endif;
                else:
                    $error = 'كلمة المرور غير متطابقة';
                endif;
            else:
                $error = 'كلمة المرور غير صحيحة';
            endif;
        else:
            $inse22 = 'UPDATE `company` SET company_email="' . $email . '" ,company_phone="' . $phone . '"   WHERE id=' . $id . ' ;';
            $res22 = $db->prepare($inse22);
            $res22->execute();
        endif;
    endif;
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updateinfo'])):
        $addmin = filter_var($_POST['admin'], FILTER_SANITIZE_STRING);
        $location = filter_var($_POST['location'], FILTER_SANITIZE_STRING);
        $logotext = filter_var($_POST['logotext'], FILTER_SANITIZE_STRING);
        $discription = filter_var($_POST['dis'], FILTER_SANITIZE_STRING);
    
        if ($_POST['updateinfo'] != '') {
            $inse2 = 'UPDATE `company` SET company_admin_nam="' . $addmin . '" , company_logo="' . $logotext . '" , location="' . $location . '", company_dis="' . $discription . '" WHERE id=' . $id . ' ;';
            $res2 = $db->prepare($inse2);
            $res2->execute();
            if ($res2->execute() == true) {
                header('location:satting');
                exit();
            }
        }
    endif;
@endphp
@extends('layout.master')

@section('body')
    <style>
        body {
            margin-top: 110px
        }
    </style>
    <div class="container">
        <!-- start profile -->
        <section class="profile">
            <div class="container my-5 profi">
                <i class="fas fa-cogs fa-sm fa-fw  text-center  text-light"></i>
                {{-- خيارات الضبط --}}
                <nav>
                    <div dir="rtl" class="nav nav-tabs w-100 f-10 text-center" id="nav-tab" role="tablist">
                        <button class="nav-link active w-50 fallWedth " id="nav-contact-tabe" data-bs-toggle="tab"
                            data-bs-target="#satting1" type="button" role="tab" data-controls="contact"
                            data-selected="false">عام</button>

                        <button class="nav-link w-50 fallWedth " id="nav-contact-tabe" data-bs-toggle="tab"
                            data-bs-target="#satting2" type="button" role="tab" data-controls="contact"
                            data-selected="false">الامان</button>
                        <button class="nav-link w-100 " id="nav-contact-tabe" data-bs-toggle="tab" data-bs-target="#class"
                            type="button" role="tab" data-controls="contact" data-selected="false">معلومات
                            الفصول</button>
                    </div>
                </nav>
            </div>
            {{-- خيارات الضبط --}}

            {{-- محتوا الضبط --}}
            <div class="container">
                <div class="tab-content" id="nav-tabcontene">
                    {{-- ضبط المعلومات الشخصية --}}
                    <div class="tab-pane fade show active p-3" id="satting1" role="tabpanel" aria-labelledby="nav-contact">
                        <!-- profile bod tab -->
                        <div class="prefileUser">
                            <form class="w-100 col-md-9" id="po" action="#" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row ">

                                    <div class="col-sm-5 col-md-5 upimg center">
                                        <div class="img my-2">
                                            <img class="card-img-top" src="/img/schools/{{ $img }}"
                                                alt="Card image cap">
                                            <input type="file" class="form-control mb-3" value="{{ @$_POST['logo'] }}"
                                                name="logo" placeholder="uplode logo img">
                                        </div>
                                    </div>

                                    <div class="text-center col-lg-7  col-md-7">
                                        <label for="name" class="label">اسم المدير</label>
                                        <input type="text" class="form-control w-100" id="name" name="admin"
                                            value="{{ @$admin }}" placeholder="اسم المدير " />
                                        <label for="location" class="label">موقع المدرسة</label>
                                        <input type="text" class="form-control w-100" id="location" name="location"
                                            value="{{ @$location }}" placeholder="موقع المدرسة" />
                                        <label for="icontxt">شعار المؤسسة </label>
                                        <input type="text" class="form-control mb-3" id="icontxt"
                                            value="{{ $logotext }}" name="logotext" placeholder=" " />
                                        <label for="discrabtion">وصف المؤسسة</label>
                                        <textarea name="dis" id="discrabtion" class="form-control my-2 bg-transparent textarea"
                                            placeholder="اكتب وصف كامل عن المؤسسة ">{{ @$discription }}</textarea>
                                        <div class="button justify-content-center text-center align-items-center">

                                        </div>
                                        {{-- </ul>
                                    </div> --}}
                                    </div>
                                    <button value="1" name="updateinfo" onclick="alert('هل انت متاكد')" type="submit"
                                        class="btn  py-1 mt-3 justify-content-center text-center w-100">
                                        حفظ
                                    </button>

                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- ضبط المعلومات الشخصية --}}
                    {{-- ضبط كلمة السر --}}
                    <div class="tab-pane fade show  pass p-3" id="satting2" role="tabpanel" aria-labelledby="nav-contact">
                        <form class="w-100 col-md-9" action="#" method="post" enctype="multipart/form-data">
                            @csrf
                            <label for="email">البريد الالكتروني</label>
                            <input type="email" class="form-control mb-3" name="email"
                                value="{{ @$email }}"placeholder="Email" id="email" />
                            <label for="phone" class="label">رقم مدير المدرسة</label>
                            <input type="text" class="form-control " name="phone" value="{{ @$adminphone }}"
                                placeholder="رقم مدير المدرسة" id="phone" /><br>
                            <button type="button" class="btn chicks w-10 my-3"> تعديل كلمة السر</button>
                            <p class="passbutton">
                                <label for="password1">كلمة المرور القديمة</label>
                                <input type="password" class="form-control mb-3" name="password" value=""
                                    placeholder="password" id="password1" />
                                <label for="password2">كلمة المرور الجديدة</label>
                                <input type="password" class="form-control mb-3" name="password1"
                                    placeholder="re password" value="" id="password2" />
                                <label for="respassword"> اعادة كتابة كلمة المرور </label>
                                <input type="password" class="form-control mb-3" name="password2"
                                    placeholder="re password" value="" id="respassword" />
                            </p>
                            <br>
                            <p class="errors" style="color: red">{{ @$error }}</p>
                            <button name="updatsecrit" type="submit" onclick="alert('هل انت متاكد')"
                                class="btn text-center  py-1 mt-3 justify-content-center text-center w-100">
                                حفظ
                            </button>
                        </form>

                    </div>
                    {{-- ضبط كلمة السر --}}
                    {{-- ضبط معلومات الفصول  --}}
                    <div class="tab-pane fade show   p-3  " id="class" role="tabpanel"
                        aria-labelledby="nav-contact">

                        <form class="w-100 col-md-9" action="#" method='POST' enctype='multipart/form-data'>
                            @csrf
                            <table class="my-4 tabel w-100">
                                <thead>
                                    <tr>
                                        <th>الصف</th>
                                        <th>القيمة الدراسية</th>
                                        <th>عدد الطلاب المطلوب</th>
                                        <th>التخفيض الخاص</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $class = ['الفصل الاول', 'الفصل الثاني', 'الفصل الثالث', 'الفصل الرابع', 'الفصل الخامس', 'الفصل السادس', 'الفصل الاول متوسط', 'الفصل الثاني متوسط', 'الفصل ثالث متوسط'];
                                    @endphp
                                    @if ($typschool == 'مدرسة خاصة' || $typschool == 'مدرسة حكومية')
                                        @for ($i = 0; $i <= 8; $i++)
                                            @php
                                                $class9 = 'SELECT * FROM `classinf` WHERE school=' . $id . '  AND classname=' . ($i + 1) . ';';
                                                $class9Info = $db->prepare($class9);
                                                $class9Info->execute();
                                                $infoclass9 = $class9Info->fetchAll();
                                                $name = '';
                                                $img = '';
                                                $admin = '';
                                                
                                                foreach ($infoclass9 as $key => $value) {
                                                    $pric = $value[1];
                                                    $contre = $value[2];
                                                    $discont = $value[4];
                                                }
                                            @endphp
                                            <tr>
                                                <td>{{ @$class[$i] }}</td>
                                                <td><input type="number" class="form-control ro" placeholder="المبلغ"
                                                        name="pric{{ @$i }}" value="{{ @$pric }}" />
                                                </td>
                                                <td><input type="number" class="form-control ro"
                                                        placeholder="عدد الطلاب" name="cont{{ $i }}"
                                                        value="{{ @$contre }}" />
                                                </td>
                                                <td><input type="number" name="dis{{ $i }}"
                                                        class="form-control ro" value="{{ @$discont }}" /></td>
                                            </tr>
                                        @endfor
                                    @else
                                        @for ($i = 0; $i <= 2; $i++)
                                            @php
                                                $class9 = 'SELECT * FROM `classinf` WHERE school=' . $id . '  AND classname=' . ($i + 1) . ';';
                                                $class9Info = $db->prepare($class9);
                                                $class9Info->execute();
                                                $infoclass9 = $class9Info->fetchAll();
                                                $pric = '';
                                                $contre = '';
                                                $discont = '';
                                                
                                                foreach ($infoclass9 as $key => $value) {
                                                    $pric = $value[1];
                                                    $contre = $value[2];
                                                    $discont = $value[4];
                                                }
                                            @endphp
                                            <tr>
                                                <td>{{ @$class[$i] }}</td>
                                                <td><input type="number" name="pric{{ @$i }}"
                                                        class="form-control ro" placeholder="المبلغ"
                                                        value="{{ @$pric }}" />
                                                </td>
                                                <td><input type="number" name="cont{{ $i }}"
                                                        class="form-control ro" placeholder="عدد الطلاب"
                                                        value="{{ @$contre }}" />
                                                </td>
                                                <td><input type="number" name="dis{{ $i }}"
                                                        class="form-control ro" value="{{ @$discont }}" /></td>
                                            </tr>
                                        @endfor
                                    @endif
                                </tbody>
                            </table>
                            <div class="button  justify-content-center text-center align-items-center">
                                <button type="submit" name="updateClass" class="btn text-center  py-1 cdr  w-100">
                                    حفظ
                                </button>
                            </div>
                        </form>

                    </div>
                    {{-- ضبط معلومات الفصول  --}}
                </div>
            </div>
            {{-- محتوا الضبط --}}

        </section>
    </div>
    <script>
        let buttn = document.querySelectorAll(".chicks");
        let p = document.querySelectorAll(".passbutton");
        buttn[0].onclick = () => {
            p[0].classList.toggle("showpass");
        }
    </script>
@endsection
