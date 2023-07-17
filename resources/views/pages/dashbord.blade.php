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
        $typschool = '';
        foreach ($informtion as $key => $value) {
            $name = $value[1];
            $img = $value[10];
            $typschool = $value[4];
        }
        #############################################
        // معلومات الكورسات
        #############################################
        $get_info2 = 'SELECT * FROM `educational_programs` WHERE id_school=' . $id . ';';
        $info2 = $db->prepare($get_info2);
        $info2->execute();
        $informtion2 = $info2->fetchAll();
        $numb = count($informtion2);

        #############################################
        // معلومات الطلابة
        #############################################
        $get_info3 = 'SELECT * FROM `studin` WHERE school=' . $id . ';';
        $info3 = $db->prepare($get_info3);
        $info3->execute();
        $informtion3 = $info3->fetchAll();
        $studin = count($informtion3);
        #############################################
        // معلومات الدورات  والفعالية
        #############################################
        $get_info4 = 'SELECT * FROM `cors` WHERE commpany=' . $id . ';';
        $info4 = $db->prepare($get_info4);
        $info4->execute();
        $informtion4 = $info4->fetchAll();
        $actvi = count($informtion4);
        #############################################
        // معلومات الالضبط
        #############################################
        $get_info5 = 'SELECT * FROM `settting` WHERE commpany=' . $id . ';';
        $info5 = $db->prepare($get_info5);
        $info5->execute();
        $informtion5 = $info5->fetchAll();

        ############################################
        // الصف الثاني
        ############################################
        $class2 = 'SELECT * FROM `studin` WHERE school=' . $id . ' AND class=2;';
        $class2Info = $db->prepare($class2);
        $class2Info->execute();
        $infoclass2 = $class2Info->fetchAll();
        $studin2 = count($infoclass2);

        ############################################
        // الصف الثالث
        ############################################
        $class3 = 'SELECT * FROM `studin` WHERE school=' . $id . ' AND class=3;';
        $class3Info = $db->prepare($class3);
        $class3Info->execute();
        $infoclass3 = $class3Info->fetchAll();
        $studin3 = count($infoclass3);
        ############################################
        if ($typschool == 'معاهد' || $typschool == 'ورش فنيه' || $typschool == 'أخرى' || $typschool == 'مدرسة خاصة' || $typschool == 'مدرسة حكومية') {
            ############################################
            // الصف الرابع
            ############################################
            $class4 = 'SELECT * FROM `studin` WHERE school=' . $id . ' AND class=4;';
            $class4Info = $db->prepare($class4);
            $class4Info->execute();
            $infoclass4 = $class4Info->fetchAll();
            $studin4 = count($infoclass4);
            ############################################
            // الصف الخامس
            ############################################
            $class5 = 'SELECT * FROM `studin` WHERE school=' . $id . ' AND class=5;';
            $class5Info = $db->prepare($class5);
            $class5Info->execute();
            $infoclass5 = $class5Info->fetchAll();
            $studin5 = count($infoclass5);

            ############################################
            // الصف السادس
            ############################################
            $class6 = 'SELECT * FROM `studin` WHERE school=' . $id . ' AND class=6;';
            $class6Info = $db->prepare($class6);
            $class6Info->execute();
            $infoclass6 = $class6Info->fetchAll();
            $studin6 = count($infoclass6);
            ############################################
            // الصف السابع
            ############################################
            $class7 = 'SELECT * FROM `studin` WHERE school=' . $id . ' AND class=7;';
            $class7Info = $db->prepare($class7);
            $class7Info->execute();
            $infoclass7 = $class7Info->fetchAll();
            $studin7 = count($infoclass7);
            ############################################
            // الصف الثامن
            ############################################
            $class8 = 'SELECT * FROM `studin` WHERE school=' . $id . ' AND class=8;';
            $class8Info = $db->prepare($class8);
            $class8Info->execute();
            $infoclass8 = $class8Info->fetchAll();
            $studin8 = count($infoclass8);
            ############################################
            // الصف التاسع
            ############################################
            $class9 = 'SELECT * FROM `studin` WHERE school=' . $id . ' AND class=9;';
            $class9Info = $db->prepare($class9);
            $class9Info->execute();
            $infoclass9 = $class9Info->fetchAll();
            $studin9 = count($infoclass9);
            ########################################
        }
    } catch (PDOException $e) {
        echo 'error' . $e;
    }
@endphp
@extends('layout.master')

@section('body')
    <style>
        body {
            margin-top: 45px
        }
    </style>

    <!-- Page Wrapper -->
    <div id="wrapper" dir="ltr">
        {{-- القائمة التي في الجانب --}}
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <a class="nav-link" href="/">
                    <i class="fas fa-fw fa-2x  fa-tachometer-alt"></i>
                    <span>الصفحة الرئيسة</span></a>
            </li>
            <!-- Nav Item - Tables -->
            <li class="nav-item showclass hiden_class">
                <a class="nav-link">
                    <i class="fas fa-fw fa-2x  fa-table"></i>
                    <span class="h1">الفصول الدراسية</span></a>
            </li>
            <!-- Nav Item الضبط -->
            <li class="nav-item">
                <a class="nav-link" href="satting">
                    <i class="fas fa-fw fa-2x  fa-wrench"></i>
                    <span class="h1">الضبط</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#color"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <span>الالوان</span>
                </a>
                <div id="color" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h2 class="collapse-header">ضبط الوان</h2>
                        <ul class="color">
                            <li>1</li>
                            <li>2</li>
                            <li>3</li>
                            <li>4</li>
                            <li>5</li>
                            <li>6</li>
                        </ul>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#backgrunad"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <span>الخلفية</span>
                </a>
                <div id="backgrunad" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h2 class="collapse-header">ضبط الخلفية</h2>
                        <ul>
                            <li>1</li>
                            <li>2</li>
                            <li>3</li>
                            <li>4</li>
                            <li>5</li>
                            <li>6</li>
                        </ul>
                    </div>
                </div>
            </li>


        </ul>
        <!-- End of Sidebar -->
        {{-- القائمة التي في الجانب --}}

        {{-- محتوي الصفحة الاساسي --}}
        <!-- Content Wrapper -->

        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content  allcolo my-4">
                {{-- اسم المدرسة والاشعارات والرسائل --}}
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mx-3">
                        <i class="fa  fa-bars"> </i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto fex_error_in_dashort">
                        <!--الرسائل -->
                        @php
                            $masseginfo = 'SELECT id FROM `massegsinfo` WHERE idschool=' . $id . ';';
                            $infomasseg = $db->prepare($masseginfo);
                            $infomasseg->execute();
                            $informtionmasseg = $infomasseg->fetchAll();
                            $numbrformasseg = count($informtionmasseg);
                            $masseg = '';
                            foreach ($informtionmasseg as $key => $value) {
                                $masseg .= $value['id'] . ' ';
                            }
                            $idmasseg = explode(' ', $masseg);
                        @endphp
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-2x fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">
                                    @if ($numbrformasseg != '0')
                                        {{ $numbrformasseg . '+' }}
                                    @else
                                        {{ $numbrformasseg }}
                                    @endif

                                </span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    الرسائل
                                </h6>
                                @for ($i = 0; $i < $numbrformasseg; $i++)
                                    @php
                                        $orderinfo = 'SELECT * FROM `massegsinfo` WHERE id=' . $idmasseg[$i] . ';';
                                        $infoorder = $db->prepare($orderinfo);
                                        $infoorder->execute();
                                        $informtionorder = $infoorder->fetchAll();
                                        $idschool = '';
                                        $massegtext = '';

                                        foreach ($informtionorder as $key => $value) {
                                            $idschool = $value[2];
                                            $time = $value[4];
                                        }

                                        $orderinfo2 = 'SELECT name FROM `studin` WHERE id=' . $idschool . ';';
                                        $infoorder2 = $db->prepare($orderinfo2);
                                        $infoorder2->execute();
                                        $informtionorder2 = $infoorder2->fetchAll();
                                        $from = '';
                                        foreach ($informtionorder2 as $key => $value) {
                                            $from = $value[0];
                                        }
                                    @endphp
                                    <a class="dropdown-item d-flex align-items-center" href="/masseg">

                                        <div>
                                            <span class="font-weight-600">وصلتك رسالة من {{ $from }}</span>
                                            <div class="small text-gray-500">{{ $time }}</div>
                                        </div>
                                    </a>
                                @endfor
                            </div>
                        </li>
                        <!--الرسائل -->
                        <!-- رسائل التسجيل -->
                        @php
                            $classid = ['الفصل الاول', 'الفصل الثاني', 'الفصل الثالث', 'الفصل الرابع', 'الفصل الخامس', 'الفصل السادس', ' الاول المتوسط', ' الثاني المتوسط', ' ثالث المتوسط'];
                            $orderinfo = 'SELECT id FROM `infoorder` WHERE schoolid=' . $id . ';';
                            $infoorder = $db->prepare($orderinfo);
                            $infoorder->execute();
                            $informtionorder = $infoorder->fetchAll();
                            $numbrfor = count($informtionorder);
                            $strinid = '';
                            foreach ($informtionorder as $key => $value) {
                                $strinid .= $value['id'] . ' ';
                            }
                            $idindo = explode(' ', $strinid);
                        @endphp
                        <li class="nav-item dropdown no-arrow mx-3">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-2x  fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">{{ $numbrfor }}</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            {{-- اشعار وقبول الطالب --}}
                            {{-- اشعار وقبول الطالب --}}
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    اشعارات التسجيل
                                </h6>

                                @for ($i = 0; $i < $numbrfor; $i++)
                                    @php
                                        $orderinfo = 'SELECT * FROM `infoorder` WHERE id=' . $idindo[$i] . ';';
                                        $infoorder = $db->prepare($orderinfo);
                                        $infoorder->execute();
                                        $informtionorder = $infoorder->fetchAll();
                                        $id = '';
                                        $studingid = '';
                                        $schoolids = '';
                                        $tim = '';
                                        $orderclass = '';
                                        $phonestuding = '';
                                        $phonestuding2 = '';

                                        foreach ($informtionorder as $key => $value) {
                                            $id = $value[0];
                                            $studingid = $value[1];
                                            $schoolids = $value[2];
                                            $tim = $value[3];
                                            $orderclass = $value[4];
                                            $phonestuding = $value[5];
                                            $phonestuding2 = $value[6];
                                        }
                                        $orderinfo2 = 'SELECT name FROM `studin` WHERE id=' . $studingid . ';';
                                        $infoorder2 = $db->prepare($orderinfo2);
                                        $infoorder2->execute();
                                        $informtionorder2 = $infoorder2->fetchAll();
                                        $thename = '';
                                        foreach ($informtionorder2 as $key => $value) {
                                            $thename = $value[0];
                                        }

                                    @endphp
                                    <a class="dropdown-item d-flex align-items-center">
                                        <form action="/dashbord" method="post">
                                            @csrf

                                            <div class="font-weight-bold">
                                                <div class=" w-100"> الطالب {{ $thename }} يرغب في التسجيل
                                                </div>
                                                <div class="small text-gray-500">{{ $tim }}</div>
                                                <input type="hidden" value="{{ $schoolids }}" name="school">
                                                <input type="hidden" value="{{ $orderclass }}" name="class">
                                                <input type="hidden" value="{{ $phonestuding }}" name="phone1">
                                                <input type="hidden" value="{{ $phonestuding2 }}" name="pone2">
                                                <input type="hidden" value="{{ $studingid }}" name="id">
                                                <input type="hidden" value="{{ $id }}" name="delatid">
                                                <div class="small text-gray-500"><button type="submit"
                                                        name="delastudingt">رفض
                                                        الطالب</button>
                                                    <button type="submit" name="updatestuding"> قبول الطالب</button>
                                                </div>
                                            </div>
                                        </form>
                                    </a>
                                @endfor
                                @php
                                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updatestuding'])):
                                        $studingid = $_POST['id'];
                                        $schoolids = $_POST['school'];
                                        $phonestuding2 = $_POST['pone2'];
                                        $phonestuding = $_POST['phone1'];
                                        $delat = $_POST['delatid'];

                                        $q = 'UPDATE `studin` SET school=' . $schoolids . ' WHERE id=' . $studingid . ';';
                                        $res = $db->prepare($q);
                                        if ($res->execute() == true):
                                            $q2 = 'UPDATE `studin` SET class=' . $orderclass . ' WHERE id=' . $studingid . ';';
                                            $res2 = $db->prepare($q2);

                                            if ($res2->execute() == true):
                                                $q2 = 'UPDATE `studin` SET phone2=' . $phonestuding . ' WHERE id=' . $studingid . ';';
                                                $res2 = $db->prepare($q2);

                                                if ($res2->execute() == true):
                                                    $q2 = 'UPDATE `studin` SET phone3=' . $phonestuding2 . ' WHERE id=' . $studingid . ';';
                                                    $res2 = $db->prepare($q2);
                                                    if ($res2->execute() == true) {
                                                        $q2 = 'DELETE FROM `infoorder` WHERE id=' . $delat . ';';
                                                        $res2 = $db->prepare($q2);
                                                        if ($res2->execute() == true) {
                                                            header('location:/dashbord');
                                                            exit();
                                                        }
                                                    }
                                                endif;
                                            endif;
                                        endif;
                                    elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delastudingt'])):
                                        $studingid = $_POST['id'];
                                        $schoolids = $_POST['school'];
                                        $phonestuding2 = $_POST['pone2'];
                                        $phonestuding = $_POST['phone1'];
                                        $delat = $_POST['delatid'];
                                        $qwery = "INSERT INTO `stutuesorder` VALUES (NULL,'" . $studingid . "' ,'" . $name . "' );";
                                        $res2 = $db->prepare($qwery);
                                        if ($res2->execute() == true) {
                                            $q2 = 'DELETE FROM `infoorder` WHERE id=' . $delat . ';';
                                            $res2 = $db->prepare($q2);
                                            if ($res2->execute() == true) {
                                                header('location:/dashbord');
                                                exit();
                                            }
                                        }
                                    endif;
                                @endphp
                            </div>
                            {{-- اشعار وقبول الطالب --}}
                            {{-- اشعار وقبول الطالب --}}
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- رسائل التسجيل -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ $name }}</span>
                                <img class="img-profile rounded-circle" src="img/schools/{{ $img }}">
                            </a>
                            <!-- يظهر في مكان الاسم -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/satting">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    الضبط
                                </a>

                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    خروج
                                </a>
                            </div>
                            <!-- يظهر في مكان الاسم -->
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                {{-- اسم المدرسة والاشعارات والرسائل --}}
                {{-- محتوي لوحة التحكم كامل --}}
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">لوحة التحكم</h1>
                    </div> --}}

                    <!-- Content Row -->
                    <div class="row fex_error_in_dashort2">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class=" col-mahmmed  my-1">
                            <div class="card t border-left-primary shadow  align-items-center">
                                <div class="card-body text-center">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs h5 font-weight-bold text-primary text-uppercase mb-1">
                                                <i class="fas fa-calendar fa-2x   "></i> عدد الطلاب
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $studin }}
                                                طالب
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class=" col-mahmmed my-1">
                            <div class="card  t border-left-success shadow  align-items-center">
                                <div class="card-body text-center">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs h5 font-weight-bold text-success text-uppercase mb-1 ">
                                                <i class="fas fa-calendar fa-2x "></i> عدد البرامج التعلمية
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 "> {{ $numb }}
                                                برنامج
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Earnings (Monthly) Card Example -->

                    </div>

                    <!-- Content Row -->
                    <section class="testing">
                        {{-- الفصول المدرسية  --}}
                        <div class="row justify-content-center my-2">
                            <div class="col-md-12 my-s g-5 justify-content-around">
                                <div class="accordion" id="quationTage">
                                    @php
                                        $class = ['الفصل الاول', 'الفصل الثاني', 'الفصل الثالث', 'الفصل الرابع', 'الفصل الخامس', 'الفصل السادس', 'الفصل الاول متوسط', 'الفصل الثاني متوسط', 'الفصل ثالث متوسط'];
                                    @endphp
                                    @if ($typschool == 'مدرسة خاصة' || $typschool == 'مدرسة حكومية')
                                        @for ($i = 1; $i <= 9; $i++)
                                            <div class='accordion-item dash'>
                                                <h2 class='accordion-header'><button class='accordion-button btnHlep'
                                                        type='button' data-bs-toggle='collapse'
                                                        data-bs-target='#qu-{{ $i }}' aria-expanded='true'
                                                        aria-controls='qu-{{ $i }}'>
                                                        <p>{{ $class[$i - 1] }}</p>
                                                    </button>
                                                </h2>
                                                <div id='qu-{{ $i }}' class='accordion-collapse collapse'
                                                    data-bs-parent='#quationTage'>
                                                    <div class='accordion-body'>
                                                        <table class="tap w-100">
                                                            <thead>
                                                                <tr>
                                                                    <th>اسم الطالب</th>
                                                                    <th>مكان الطالب</th>
                                                                    <th>الحالة</th>
                                                                    <th>رقم الطالب</th>
                                                                    <th>رقم والى الامر</th>
                                                                    <th>رقم احتياطي</th>
                                                                    <th>طرد</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @php
                                                                    ############################################
                                                                    // الصف الثاني
                                                                    ############################################
                                                                    $class12 = 'SELECT * FROM `studin` WHERE school=' . $id . ' AND class=' . $i . ' ;';
                                                                    $class2Info = $db->prepare($class12);
                                                                    $class2Info->execute();
                                                                    $infoclass2 = $class2Info->fetchAll();
                                                                    $studin2 = count($infoclass2);
                                                                    $cl = 'SELECT id FROM `studin` WHERE school=' . $id . ' AND class=' . $i . ';';
                                                                    $clInfo = $db->prepare($cl);
                                                                    $clInfo->execute();
                                                                    $infoc = $clInfo->fetchAll();
                                                                    $strin = '';
                                                                    foreach ($infoc as $key => $value) {
                                                                        $strin .= $value['id'] . ' ';
                                                                    }
                                                                    $id2 = explode(' ', $strin);
                                                                @endphp
                                                                @for ($idu = 1; $idu <= $studin2; $idu++)
                                                                    @php

                                                                        $class2 = 'SELECT * FROM `studin` WHERE id=' . $id2[$idu - 1] . ';';
                                                                        $class2Info = $db->prepare($class2);
                                                                        $class2Info->execute();
                                                                        $infoclass2 = $class2Info->fetchAll();
                                                                        foreach ($infoclass2 as $key => $value):
                                                                            $idstydingfromcol = $value[0];
                                                                            $name2 = $value[1];
                                                                            $phone12 = $value[2];
                                                                            $cty2 = $value[5];
                                                                            $phone22 = $value[9];
                                                                            $phone32 = $value[10];
                                                                            $status2 = $value[11];
                                                                        endforeach;
                                                                    @endphp
                                                                    @if ($name2 != '')
                                                                        <tr>
                                                                            <td>{{ $name2 }}</td>
                                                                            <td>{{ $cty2 }}</td>
                                                                            <td>{{ $status2 }}</td>
                                                                            <td>{{ $phone12 }}</td>
                                                                            <td>{{ $phone22 }}</td>
                                                                            <td>{{ $phone32 }}</td>
                                                                            <td>
                                                                                <form method="POST">
                                                                                    <input type="hidden" name="idfrom"
                                                                                        value="{{ $idstydingfromcol }}">
                                                                                    @csrf<button type="submit"
                                                                                        name="dalet"
                                                                                        class="btn w-100">حذف</button>
                                                                                </form>
                                                                            </td>
                                                                    @endif
                                                                    <tr>
                                                                @endfor
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <th colspan="2"> مجموع عدد الطلاب</th>
                                                                    <th colspan="3"> {{ $studin2 }} طالب</th>
                                                                    <th colspan="3" class="prinnt"> <button
                                                                            class="btn btn2  w-100">طباعة</button>
                                                                    </th>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor
                                    @else
                                        @for ($i = 1; $i <= 3; $i++)
                                            <div class='accordion-item dash'>
                                                <h2 class='accordion-header'><button class='accordion-button btnHlep'
                                                        type='button' data-bs-toggle='collapse'
                                                        data-bs-target='#qu-{{ $i }}' aria-expanded='true'
                                                        aria-controls='qu-{{ $i }}'>
                                                        <p>{{ $class[$i - 1] }}</p>
                                                    </button>
                                                </h2>
                                                <div id='qu-{{ $i }}' class='accordion-collapse collapse'
                                                    data-bs-parent='#quationTage'>
                                                    <div class='accordion-body'>
                                                        <table class="tap">
                                                            <thead>
                                                                <tr>
                                                                    <th>اسم الطالب</th>
                                                                    <th>مكان اقامة الطالب</th>
                                                                    <th>الحالة الصحية</th>
                                                                    <th>رقم الطالب</th>
                                                                    <th>رقم والى امر الطالب</th>
                                                                    <th>رقم احتياطي</th>
                                                                    <th>طرد</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @php
                                                                    ############################################
                                                                    // الصف الثاني
                                                                    ############################################
                                                                    $class12 = 'SELECT * FROM `studin` WHERE school=' . $id . ' AND class=' . $i . ' ;';
                                                                    $class2Info = $db->prepare($class12);
                                                                    $class2Info->execute();
                                                                    $infoclass2 = $class2Info->fetchAll();
                                                                    $studin2 = count($infoclass2);
                                                                    $cl = 'SELECT id FROM `studin` WHERE school=' . $id . ' AND class=' . $i . ';';
                                                                    $clInfo = $db->prepare($cl);
                                                                    $clInfo->execute();
                                                                    $infoc = $clInfo->fetchAll();
                                                                    $strin = '';
                                                                    foreach ($infoc as $key => $value) {
                                                                        $strin .= $value['id'] . ' ';
                                                                    }
                                                                    $id2 = explode(' ', $strin);
                                                                @endphp
                                                                @for ($idu = 1; $idu <= $studin2; $idu++)
                                                                    @php

                                                                        $class2 = 'SELECT * FROM `studin` WHERE id=' . $id2[$idu - 1] . ';';
                                                                        $class2Info = $db->prepare($class2);
                                                                        $class2Info->execute();
                                                                        $infoclass2 = $class2Info->fetchAll();
                                                                        foreach ($infoclass2 as $key => $value):
                                                                            $idstydingfromcol = $value[0];
                                                                            $name2 = $value[1];
                                                                            $phone12 = $value[2];
                                                                            $cty2 = $value[5];
                                                                            $phone22 = $value[9];
                                                                            $phone32 = $value[10];
                                                                            $status2 = $value[11];
                                                                        endforeach;
                                                                    @endphp
                                                                    @if ($name2 != '')
                                                                        <tr>
                                                                            <td>{{ $name2 }}</td>
                                                                            <td>{{ $cty2 }}</td>
                                                                            <td>{{ $status2 }}</td>
                                                                            <td>{{ $phone12 }}</td>
                                                                            <td>{{ $phone22 }}</td>
                                                                            <td>{{ $phone32 }}</td>
                                                                            <td>
                                                                                <form method="POST">
                                                                                    <input type="hidden" name="idfrom"
                                                                                        value="{{ $idstydingfromcol }}">
                                                                                    @csrf<button type="submit"
                                                                                        name="dalet"
                                                                                        class="btn w-100">حذف</button>
                                                                                </form>
                                                                            </td>
                                                                    @endif
                                                                    <tr>
                                                                @endfor
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <th colspan="2"> مجموع عدد الطلاب</th>
                                                                    <th colspan="3"> {{ $studin2 }} طالب</th>
                                                                    <th colspan="3" class="prinnt"> <button
                                                                            class="btn btn2 w-100">طباعة</button>
                                                                    </th>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor

                                    @endif
                                    <!-- end occrd item -->
                                </div>
                            </div>
                        </div>
                        {{-- حزف طالب من قاعدة البيانات التابعة الي المدرسة --}}
                        @php
                            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['dalet'])):
                                $studingid = $_POST['idfrom'];
                                $q = "UPDATE `studin` SET school=' ' WHERE id=$studingid ;";
                                $res = $db->prepare($q);
                                if ($res->execute() == true) {
                                    header('location:/dashbord');
                                    exit();
                                }
                            endif;
                        @endphp
                        {{-- حزف طالب من قاعدة البيانات التابعة الي المدرسة --}}
                        {{-- الفصول المدرسية --}}
                    </section>
                </div>
                <!-- End of Content Wrapper -->
                {{-- محتوي لوحة التحكم كامل --}}
            </div>
        </div>

        <!-- End of Page Wrapper -->
        {{-- محتوي الصفحة الاساسي --}}

        {{-- تحريك القائمة الجانبية --}}
        <!-- Scroll to Top Button-->
        {{-- <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up fa-2x  "></i>
        </a> --}}
        {{-- تحريك القائمة الجانبية --}}

        {{-- محتوي الرسائل والاشعارات --}}
        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">هل تريد تسجيل الخروج?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">رجوع</button>
                        <a class="btn btn-primary" href="/exit">خروج</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- محتوي الرسائل والاشعارات --}}

    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

@stop
