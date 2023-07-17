@extends('layout.master')
@php
    $infoHost = 'mysql:host=localhost;dbname=establishment';
    $user = 'root';
    $paasword = '';

    try {
        $db = new PDO($infoHost, $user, $paasword);
    } catch (PDOException $m) {
        echo " error $m";
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST'):
        $class = $_POST['class'];
        $phone2 = $_POST['phone2'];
        $phone3 = $_POST['phone3'];
        $school = $_COOKIE['ids'] + 0;
        $studin = $_COOKIE['studing'] + 0;

        $qwery = "INSERT INTO `infoorder` VALUES (NULL, '" . $studin . "', '" . $school . "', '2009-07-15 04:13:09', '" . $class . "', '" . $phone2 . "', '" . $phone3 . "')";
        $info1 = $db->prepare($qwery);

        if ($info1->execute() == true) {
            header('location:/');
            exit();
        }
    endif;

    $id = $_COOKIE['ids'] + 0;
    $get_info = 'SELECT company_area FROM `company` WHERE id=' . $id . ';';
    $info = $db->prepare($get_info);
    $info->execute();
    $informtion = $info->fetchAll();
    $type = '';
    foreach ($informtion as $key => $value) {
        $type = $value[0];
    }

@endphp

@section('body')
    <section class="container p-4">
        <article class="row justify-content-center">
            <div class="col-md-5 form m-5 ">
                <span class="tage px-5 py-3">استمارات التسجيل</span>
                <form class="form-group text-right p-2" method='POST' enctype="multipart/form-data">
                    @csrf
                    <div id="show1">
                        <label for="" class="label">اسم الطالب</label>
                        <input type="text" autofocus name="username" required maxlength="100" maxlength="10"
                            value="{{ @$user_name }}" id="userName" class="form-control mb-3" placeholder="user name">
                        <div class="form-group my-3">
                            <label for="typ">الفصل الدراسي</label>
                            <i class="bi bi-caret-down-fill"></i>
                            <select class="form-control" name="class">
                                <option value="1" class="py-1">الفصل الدراسي الاول</option>
                                <option value="2" class="py-1">الفصل الدراسي الثاني</option>
                                <option value="3" class="py-1">الفصل الدراسي الثالث</option>
                                @if ($type == 'مدرسة خاصة' || $type == 'مدرسة حكومية')
                                    <option value="4" class="py-1">الفصل الدراسي الرابع</option>
                                    <option value="5" class="py-1">الفصل الدراسي الخامس</option>
                                    <option value="6" class="py-1">الفصل الدراسي السادس</option>
                                    <option value="7" class="py-1">الفصل الاول متوسط</option>
                                    <option value="8" class="py-1">الفصل الثاني متوسط</option>
                                    <option value="9" class="py-1">الفصل الثالث متوسط</option>
                                @endif
                            </select>
                        </div>
                        <label for="typ">رقم والى امر الطالب </label>
                        <input type="number" class="form-control mb-3" minlength="10" maxlength="14" name="phone2"
                            value="" placeholder="رقم  والى امر الطالب " />
                        <label for="typ">رقم حالة الطوارء</label>
                        <input type="tel" class="form-control mb-3" name="phone3" minlength="10" maxlength="14"
                            value="" placeholder="رقم الطوارء" />


                        <div class="button justify-content-center text-center align-items-center">
                            <button data-toggle="modal" data-target="#logoutModal" type="button" class='btn btn-success '>
                                تسجيل
                            </button>
                        </div>

                        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">هل انت متاكد</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">سوف تقوم المدرسة بمراجعة الطلب ثم سوف تصل رسالة تاكد على جهازك
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">رجوع</button>
                                        <button class="btn btn-primary" type="submit">ارسال</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </article>
    </section>
@endsection
