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
    <section>
        <div class="container p-4">
            <div class="container text-right my-5 ">
                <div class=" my-4">
                    <form class="form-group text-end w-75 my-5" action='' method='POST'>
                        @csrf
                        <div class="form-group my-3">
                            <label for="cty">الولية :-</label>
                            <select class="form-control text-center" name="cty" id="cty">
                                <option value=" " class="py-1"></option>
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
                        </div>
                        <div class="form-group my-3">
                            <label for="airea">المحلية :-</label>
                            <i class="bi bi-caret-down-fill"></i>
                            <select class="form-control text-center" name="ariea" id="airea">
                                <option value="1" class="py-1"></option>
                            </select>
                        </div>
                        <button class="btn btn-success w-25 mx-2 my-5 " type="submit">
                            بحث
                        </button>
                    </form>
                </div>
            </div>
            <div class="row ">
                @if ($_SERVER['REQUEST_METHOD'] == 'POST')
                    @php
                        $caty = $_POST['cty'];
                        $ariea = $_POST['ariea'];
                        // echo $type . $caty . $ariea;
                        $get_info2 = "SELECT * FROM `company` WHERE company_type='اساس' AND  cty='" . $caty . "'  AND company_ariea='" . $ariea . "';";
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
                                    array_unshift($idd, $value['id']);
                                endforeach;
                                $ides = rand(0, $i2 - 1);
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
                                __DIR__;
                            @endphp
                            @if ($name != '')
                                <div class='col-md-4' id='" . $idschool . "'>
                                    <!-- المحجتوي -->
                                    <div class='card mt-5' title="{{ $name }}"><img class='card-img-top  '
                                            src='{{ 'img/schools/' . $icon }}' alt='Card image cap'
                                            style="    max-height: 200px;
                                            min-height: 200px;">
                                        <div class='card-body text-center'>
                                            <h5 class='card-title fw-bold'> {{ $name }}</h5>
                                            <p class='card-text' title="{{ $discrip }}">{{ $discrip }}</p> <a
                                                href='/show'>
                                                <div class='clicks' id='{{ $idschool }}'
                                                    title="اضغط من اجل التسجيل في {{ $name }}"><button
                                                        class='btn btn-success' id='1'>سجل
                                                        الان</button> </div>
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
        </div>
    </section>

@stop
