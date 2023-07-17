@php
    $db_info = 'mysql:host=localhost;dbname=establishment';
    $db_user = 'root';
    $db_password = '';
    try {
        $db = new PDO($db_info, $db_user, $db_password);
    } catch (PDOException $i) {
        echo $i;
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST'):
        $type = $_POST['typ'];
        $pric = $_POST['pric'];
    endif;
@endphp
@extends('layout.master')

@section('body')
    <section>
        <div class="container p-4">
            <div class="container text-right">


                <div class="justify-content-center my-5">
                    <form class="form-group text-start w-75" method="POST">
                        @csrf
                        <div class="form-group my-3">
                            <label for="typ m-5 display-4">نوع المؤسسة :-</label>
                            <i class="bi bi-caret-down-fill"></i>
                            <select class="form-control text-center" name="typ" id="type"
                                value="{{ @$type }}">
                                <option value=" " class="py-1"></option>
                                <option value="رياض" class="py-1">رياض</option>
                                <option value="اساس و متوسطة" class="py-1">اساس+ متوسط</option>
                                <option value="ثانوي" class="py-1">ثانوي</option>
                            </select>
                        </div>
                        <div class="form-group my-3">
                            <label for="typ m-5 display-4">الفصل الدراسي:-</label>
                            <i class="bi bi-caret-down-fill"></i>
                            <select class="form-control text-center" name="class" id="class"
                                value="{{ @$type }}">
                                <option value=" " class="py-1"></option>
                            </select>
                        </div>
                        <label for="typ">اختار المبلغ المناسب لك :-</label>
                        <input type="number" class="form-control mb-3" name="pric" value="{{ @$pric }}"
                            minlength="10" maxlength="11" placeholder="المبلخ بالجنه" />
                        <button class="btn btn-success w-25 mx-2 " type="submit">
                            بحث
                        </button>
                    </form>
                </div>

            </div>
            <div class="row">
                @if ($_SERVER['REQUEST_METHOD'] == 'POST')
                    @php
                        $type = $_POST['typ'];
                        $pric = $_POST['pric'];
                        $class = $_POST['class'];
                        $get_info2 = "SELECT * FROM `classinf` WHERE pric='" . $pric . "'   AND  classname='" . $class . "';";
                        $info2 = $db->prepare($get_info2);
                        $info2->execute();
                        $informtion2 = $info2->fetchAll();
                        
                        $i2 = count($informtion2);
                        
                        $idd = [];
                    @endphp

                    @if (!empty($informtion2))

                        @for ($i = 1; $i <= $i2; $i++)
                            @php
                                foreach ($informtion2 as $key => $value):
                                    array_unshift($idd, $value['school']);
                                endforeach;
                                $ides = rand(0, $i2 - 1);
                                $get_info = 'SELECT * FROM `company` WHERE  company_type="' . $type . '"  AND  id=' . @$idd[$ides] . '  ;';
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
                                    <div class='card  mt-5' title="{{ $name }}"><img class='card-img-top  '
                                            src='\img\schools\{{ $icon }}' alt='Card image cap'
                                            style="    max-height: 200px;
                                            min-height: 200px;">
                                        <div class='card-body text-center'>
                                            <h5 class='card-title fw-bold'> {{ $name }}</h5>
                                            <p class='card-text' title="{{ $discrip }}">{{ $discrip }}</p> <a
                                                href='/show'>
                                                <div class='clicks' id='{{ $idschool }}'
                                                    title="اضغط من اجل التسجيل في {{ $name }}"><button
                                                        class='btn btn-success ' id='1'>عرض المزيد </button></div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endfor
                    @else
                        <div class='row justify-content-center my-2'>
                            <div class='col-md-12 '>
                                <p class='h3 text-warning'>
                                    نأسف لم يتم العثور على نتيجة الرجاء المحولة مرة اخرة !
                                </p>
                            </div>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </section>

@stop
