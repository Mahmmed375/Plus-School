@php
    $db_info = 'mysql:host=localhost;dbname=establishment';
    $db_user = 'root';
    $db_password = '';
    try {
        $db = new PDO($db_info, $db_user, $db_password);
    } catch (PDOException $i) {
        echo $i;
    }
@endphp
@extends('layout.master')

@section('body')
    <style>
        form {
            margin: auto;
            justify-content: center;
        }

        .mrt {
            margin-top: 15%;
            margin-bottom: 15%;
        }
    </style>
    <div class="container text-center  mrt">
        @if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['search'] != '')

            @php
                $schoole = $_POST['search'];
                $get_info = "SELECT phone FROM `studin` WHERE phone= '" . $schoole . "' ;";
                $info = $db->prepare($get_info);
                $info->execute();
                $informtion = $info->fetchAll();
                $phone = '';
                foreach ($informtion as $key => $value):
                    $phone = $value[0];
                endforeach;
                $wear = '';
                if (!empty($informtion)) {
                    $wear = '2';
                    $get_info2 = "SELECT name FROM `studin` WHERE phone= '" . $schoole . "';";
                    $info2 = $db->prepare($get_info2);
                    $info2->execute();
                    $informtion2 = $info2->fetchAll();
                    $namelast = '';
                    foreach ($informtion2 as $key => $value) {
                        $namelast = $value[0];
                    }
                } else {
                    $wear = '';
                }
            @endphp
            @if ($wear != '')
                <!-- المحجتوي -->
                <div class='align-items-center'>
                    <h5 class='card-title fw-bold text-center  align-items-center'>
                        لقد تم ارسال رسالة الي الرقم الرجاء التاكد من هاتفك
                    </h5>
                    <div class='card-body text-center'>

                        <a href='/'>
                            <div class='clicks'><button class='btn btn-primary ' id='2'>
                                    عودة للصفحة الرئسية</button>
                            </div>
                        </a>

                    </div>
                </div>
            @else
                <h3> ناسف لم نتمكن من ايجاد حساب بهذا الرقم الرجاء المحولة مرة اخرة</h3>
                <br>
                <a href='reaset'>
                    <div class='clicks'><button class='btn btn-primary ' id='2'>
                            اعدة محولة</button>
                    </div>
                </a>
            @endif
        @else
            <br>
            <div class='row justify-content-start  my-2'>
                <div class='col-md-12 '>
                    <h5 class='fw-bold'>
                        ابحث عن حسابك عن طريق ادخل رقم هاتفك
                    </h5>
                </div>
            </div>
            <div class="justify-content-center my-2">
                <form class="form-inline d-flex my-4 my-lg-0 sm-text-center" method="POST">
                    @csrf
                    <button class="btn btn-outline-success my-sm-0 mx-2 " type="submit">
                        بحث
                    </button>
                    <input class="form-control mr-sm-2 w-50" maxlength="20" minlength="10" name="search" type="search"
                        placeholder=" ادخل  الرقم" aria-bs-label="Search" />
                </form>
            </div>



        @endif

    </div>
@stop
