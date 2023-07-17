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
            <article class="TopVeos container-fluid py-2 my-5 ">

                <div class="row justify-content-around g-2 my-3">
                    @php
                        $get_info2 = 'SELECT *  FROM `educational_programs` ;';
                        $info2 = $db->prepare($get_info2);
                        $info2->execute();
                        $informtion2 = $info2->fetchAll();
                        $i2 = count($informtion2);
                        $idd = [];
                    @endphp
                    @for ($i = 1; $i <= $i2; $i++)
                        @php
                            foreach ($informtion2 as $key => $value):
                                array_unshift($idd, $value['id']);
                            endforeach;
                            
                            $get_info = 'SELECT * FROM `educational_programs` WHERE id=' . @$idd[$i] . ' ;';
                            $info = $db->prepare($get_info);
                            $info->execute();
                            $informtion = $info->fetchAll();
                            $name = '';
                            $idschool = '';
                            $discrip = '';
                            $icon = '';
                            $sing_start = '';
                            $sing_end = '';
                            foreach ($informtion as $key => $value):
                                $idschool = $value[0];
                                $name = $value[2];
                                $discrip = $value[3];
                                $icon = $value[4];
                                $sing_start = $value[6];
                                $sing_end = $value[10];
                            endforeach;
                        @endphp
                        @if ($name != '')
                            <div class='col-md-4' id='" . $idschool . "'>
                                <!-- المحجتوي -->
                                <div class='card  mt-5' title="{{ $name }}"><img class='card-img-top  '
                                        src='img\{{ $icon }}' alt='Card image cap'
                                        style="    max-height: 200px;
                                        min-height: 200px;">
                                    <div class='card-body text-center'>
                                        <h5 class='card-title fw-bold'> {{ $name }}</h5>
                                        <p class='card-text' title="{{ $discrip }}">{{ $discrip }}</p>
                                        <p class="card-text"> يبدا التسجيل في {{ $sing_start }} وينتهي في
                                            {{ $sing_end }}</p> <a href='/show'>

                                            <div class='clicks' id='{{ $idschool }}'
                                                title="اضغط من اجل التسجيل في {{ $name }}"><button
                                                    class='btn btn-primary ' id='1'>سجل
                                                    الان</button> </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endfor
                </div>
            </article>
        </div>
    </section>

@stop
