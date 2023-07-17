@php
    
    $db_info = 'mysql:host=localhost;dbname=establishment';
    $db_user = 'root';
    $db_password = '';
    $error = '';
    try {
        $db = new PDO($db_info, $db_user, $db_password);
    } catch (PDOException $i) {
        echo $i;
    }
    
@endphp
@extends('layout.master')

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
    </style>
    <div class="container">
        <section class="my-3">
            @if (!empty($_COOKIE['types']))
                <div class="row  head p-2">
                    @php
                        $id = $_COOKIE['ids'] + 0;
                        $get_info = 'SELECT * FROM `company` WHERE id=' . $id . ';';
                        $info = $db->prepare($get_info);
                        $info->execute();
                        if ($info->execute() == true):
                            $informtion = $info->fetchAll();
                            $name = '';
                            $cty = '';
                            $cty2 = '';
                            $area = '';
                            $establishing = '';
                            $logotxt = '';
                            $dis = '';
                            $admin = '';
                            $phone = '';
                            $email = '';
                        
                            // $img = [];
                        
                            foreach ($informtion as $key => $value):
                                $name = $value[1];
                                $cty = $value[2];
                                $area = $value[3];
                                $establishing = $value[5];
                                $logotxt = $value[5];
                                $dis = $value[6];
                                $admin = $value[7];
                                $phone = $value[8];
                                $email = $value[9];
                        
                                // array_push($img, $value[10]);
                                $cty2 = $value[12];
                            endforeach;
                        else:
                            echo 'الرجاء الرجوع الي الخلف';
                        endif;
                        $get_info_img = 'SELECT company_icon FROM `company` WHERE id=' . $id . ';';
                        $info_img = $db->prepare($get_info_img);
                        $info_img->execute();
                        if ($info_img->execute() == true):
                            $informtion_img = $info_img->fetchAll();
                        
                            $img = '';
                            // $img = [];
                        
                            foreach ($informtion_img as $key => $value):
                                $img = $value[0];
                                // array_push($img, $value[10]);
                            endforeach;
                        else:
                            echo 'الرجاء الرجوع الي الخلف';
                        endif;
                        
                    @endphp

                    <div class="col-md-12">

                        <h2 style="text-align:center">{{ $name }}</h2>

                        <div class="container">
                            @for ($i = 1; $i <= count($informtion_img); $i++)
                                <div class="mySlides">
                                    <div class="numbertext">{{ $i }} / 6</div>
                                    <img src="..\..\..\..\img\schools\{{ $img }}" style="width:100%;height: 20em;">
                                </div>
                            @endfor


                            <a class="prev" onclick="plusSlides(-1)">❮</a>
                            <a class="next" onclick="plusSlides(1)">❯</a>

                            <div class="caption-container">
                                <p id="caption"></p>
                            </div>

                            <div class="row">
                                @for ($i = 1; $i <= count($informtion_img); $i++)
                                    <div class="column">
                                        <img class="demo cursor" src="..\..\..\..\img\schools\{{ $i }}.jpeg"
                                            style="width:100%;height: 4em;" onclick="currentSlide({{ $i + 1 }})"
                                            alt="صور المدرسة">
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                    {{ count($informtion_img) }}
                    {{ $img }}
                    {{-- {{ implode($img) }} --}}
                    {{-- <div class="col-md-6">
                        <h5 class="card-title fw-bold my-3">{{ $name }}</h5>

                        <p class="lead">{{ $dis }}</p>
                        <p class="lead">{{ $logotxt }}</p>
                    </div> --}}

                    <div class="col-md-12">
                        <div class="row justify-content-center my-4">

                            <div class="card my2">
                                <div class="card-titelm">
                                    <h3 class="text-content "> اهم المعلومات عن المدرسة</h3>
                                </div>

                                <ul class="list-group  showinformatton">


                                    <div class="table-responsive">
                                        <table class="table table-striped table-sm">
                                            {{-- <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">عنوان</th>
                                                    <th scope="col">عنوان</th>
                                                    <th scope="col">عنوان</th>
                                                    <th scope="col">عنوان</th>
                                                </tr>
                                            </thead> --}}
                                            <tbody>
                                                <tr>
                                                    <td> الولاية</td>
                                                    <td>{{ $cty }}</td>

                                                </tr>
                                                <tr>
                                                    <td> تاريخ
                                                        الانشاء</td>
                                                    <td>{{ $establishing }}</td>

                                                </tr>
                                                <tr>
                                                    <td>اسم مدير المدرسة</td>
                                                    <td>{{ $admin }}</td>

                                                </tr>
                                                <tr>
                                                    <td>رقم مدير
                                                        المدسة </td>
                                                    <td>{{ $phone }}</td>

                                                </tr>
                                                <tr>
                                                    <td>ايمال
                                                        المدرسة </td>
                                                    <td>{{ $email }}</td>

                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>

                                </ul>
                            </div>


                            <div class="card my2 mt-4">
                                <div class="card-titelm">
                                    <h3 class="text-content "> معلومات الفصول</h3>
                                </div>

                                <ul class="list-group  showinformatton">

                                    <div class="table-responsive">
                                        <table class="table table-striped table-sm">


                                            <thead>
                                                <tr>
                                                    <th scope="col">الفصل الدراسي</th>
                                                    <th scope="col">الرسوم </th>
                                                    <th scope="col">المقاعد المتبقية</th>
                                                    <th scope="col">تخفيض الحالة الخاصة</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @if ($area != '')
                                                    @php
                                                        $classinfo = 'SELECT * FROM `classinf` WHERE school=' . $id . ' ;';
                                                        $infoclass = $db->prepare($classinfo);
                                                        $infoclass->execute();
                                                        $infoclassall = $infoclass->fetchAll();
                                                        $cont = count($infoclassall);
                                                    @endphp
                                                    @for ($i = 1; $i <= $cont; $i++)
                                                        @php
                                                            if ($cont != 0):
                                                                $stuinfo = 'SELECT * FROM `studin` WHERE school=' . $id . '  AND class=' . $i . ';';
                                                                $styclass = $db->prepare($stuinfo);
                                                                $styclass->execute();
                                                                $styclassall = $styclass->fetchAll();
                                                                $sty = count($styclassall);
                                                                $classid = ['الفصل الاول', 'الفصل الثاني', 'الفصل الثالث', 'الفصل الرابع', 'الفصل الخامس', 'الفصل السادس', ' الاول المتوسط', ' الثاني المتوسط', ' ثالث المتوسط'];
                                                                $get_info = 'SELECT * FROM `classinf` WHERE school=' . $id . ' AND classname=' . $i . ' ;';
                                                                $info = $db->prepare($get_info);
                                                                $info->execute();
                                                                $informtion = $info->fetchAll();
                                                                $classname = '';
                                                                $classpris = '';
                                                                $classcont = '';
                                                                $discont1 = '';
                                                                $discont2 = '';
                                                                foreach ($informtion as $key => $value):
                                                                    $classpris = $value[1];
                                                                    $classcont = $value[2];
                                                                    $discont1 = $value[4];
                                                                endforeach;
                                                            endif;
                                                        @endphp
                                                        @if ($classpris != 0 && !empty($informtion))
                                                            <tr>
                                                                <td> {{ $classid[$i - 1] }}</td>
                                                                <td> {{ $classpris }}
                                                                    جنه</td>
                                                                <td> {{ @($classcont - $sty) }}
                                                                    طالب</td>
                                                                <td>{{ $discont1 }}
                                                                    جنه</td>

                                                            </tr>
                                                        @else
                                                        @endif
                                                    @endfor
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </ul>
                            </div>

                            <div class="card my2 mt-4">
                                <div class="card-titelm">
                                    <h3 class="text-content ">المعلمين</h3>
                                </div>

                                <ul class="list-group  showinformatton">

                                    <div class="table-responsive">
                                        <table class="table table-striped table-sm">
                                            <thead>
                                                <tr>
                                                    <th scope="col">الاستاذا</th>
                                                    <th scope="col">المادة</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1,001</td>
                                                    <td>بيانات</td>

                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </ul>
                            </div>
                            <span class="bg-success py-1 my-2 text-light text-center px-1 fw-bold  "
                                style="border-radius: 20px; max-width:300px;font-size:1em ">
                                <i class="bi bi-geo-alt-fill
                                mx-1"></i>{{ @$cty2 }}
                            </span>
                        </div>



                        <div class="text-center w-100">
                            @if (!isset($_COOKIE['studing']))
                                <a onclick="alert('الرجاء التسجيل في الموقع اولا كطالب')" href="/singStuding">
                                    <button class="btn btn-primary  w-70">تسجيل</button>
                                </a>
                            @else
                                <a href="/stady">
                                    <button class="btn btn-primary  w-60">تسجيل</button>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                {{-- ==================================================== --}}
            @endif
        </section>
        <script>
            var slideIndex = 1;
            showSlides(slideIndex);

            function plusSlides(n) {
                showSlides(slideIndex += n);
            }

            function currentSlide(n) {
                showSlides(slideIndex = n);
            }

            function showSlides(n) {
                var i;
                var slides = document.getElementsByClassName("mySlides");
                var dots = document.getElementsByClassName("demo");
                var captionText = document.getElementById("caption");
                if (n > slides.length) {
                    slideIndex = 1
                }
                if (n < 1) {
                    slideIndex = slides.length
                }
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex - 1].style.display = "block";
                dots[slideIndex - 1].className += " active";
                captionText.innerHTML = dots[slideIndex - 1].alt;
            }
        </script>
    </div>
@endsection
