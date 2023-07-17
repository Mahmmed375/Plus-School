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
        footer {
            display: none !important;
        }

        form {
            margin: auto;
            justify-content: center;
        }

        .psd {
            margin-top: 15%
        }
    </style>
    <div class="container text-center psd">
        <br>
        <div class='row justify-content-start  my-2'>
            <div class='col-md-12 '>
                <h5 class='fw-bold'>
                    ابحث عن حسابك باستخدام رقمك او البريد الالكتروني
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
                    placeholder=" ادخل رقم الهاتف او البريد الالكتروني" aria-bs-label="Search" />
            </form>
        </div>

    </div>
    <div class="container text-center">
        @if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['search'] != '')

            @php
                $schoole = $_POST['search'];
                $get_info2 = 'SELECT company_phone,company_email,company_icon FROM `company` WHERE company_phone= ' . $schoole . ' OR company_email=' . $schoole . '';
                $info2 = $db->prepare($get_info2);
                $info2->execute();
                $informtion2 = $info2->fetchAll();
                $phone = '';
                $email = '';
                $icon = '';
                foreach ($informtion2 as $key => $value):
                    $phone = $value[0];
                    $email = $value[1];
                    $icon = 'schools/' . $value[2];
                endforeach;
                
                $get_info = "SELECT phone FROM `studin` WHERE phone= '" . $schoole . "' ;";
                $info = $db->prepare($get_info);
                $info->execute();
                $informtion = $info->fetchAll();
                $phone = '';
                foreach ($informtion2 as $key => $value):
                    $phone = $value[0];
                endforeach;
                $wear = '';
                if (!empty($informtion2)) {
                    $wear = '1';
                    $get_info2 = "SELECT company_name FROM `company` WHERE company_phone= '" . $schoole . "' OR company_email='" . $schoole . "'";
                    $info2 = $db->prepare($get_info2);
                    $info2->execute();
                    $informtion2 = $info2->fetchAll();
                    $namelast = '';
                    foreach ($informtion2 as $key => $value) {
                        $namelast = $value[0];
                    }
                } elseif (!empty($informtion)) {
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
                if (empty($icon)) {
                    $icon = 'undraw_profile_1.svg';
                }
            @endphp
            @if ($wear != '')
                <div class='col-md-4' id='" . $idschool . " '>
                    <!-- المحجتوي -->
                    <div class='card '>
                        <h5 class='card-title fw-bold text-center  align-items-center'>
                            هل هاذا حسابك
                        </h5>
                        <img class='card-img-top' src='/img/{{ $icon }}' alt='Card image cap'>
                        <div class='card-body text-center'>

                            <p class='card-text text-center align-items-center'>
                                {{ $namelast }}
                            </p> <a href='/scheck'>
                                <div class='clicks'><button class='btn btn-primary ' id='2'>
                                        استعادة</button>
                                </div>
                            </a>

                        </div>
                    </div>
                </div>
            @else
                <h3>لم نتمكن من ايجاد حساب بالمعلومة{{ ' : ' . @$_POST['search'] }} </h3>
            @endif
        @endif
    </div>

@stop
