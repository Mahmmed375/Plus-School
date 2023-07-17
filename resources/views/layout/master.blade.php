<?php
    $page = ['index2', 'singSchools', 'reastPass', 'dashbord', 'exit', 'show', 'singin', 'subort', 'satting'];
    if (in_array($page_titl, $page)) {
?>


<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="refesh" content="30">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="نسعي الى حل مشاكل التعليم في السودن و التوجه الي رقمنة التعليم بالكامل">
    <link rel='icon' type='image/svg' href='img\icon\logo.jpg' style="border-radius: 50%">
    <link rel='stylesheet' href='asets/css/normalize.css' />
    <link rel="stylesheet" href="asets/lib/bootstrap-icons/bootstrap-icons.css" />
    <link rel="stylesheet" href="asets/lib/bootstrap-icons/fonts/bootstrap-icons.woff" />
    <link rel="stylesheet" href="asets/lib/bootstrap-icons/fonts/bootstrap-icons.woff2" />
    <link rel="stylesheet" href="asets/css/main.css" />
    <link rel="stylesheet" href="asets/lib/bootstrap-5.1.3-dist\css\bootstrap.min.css" />
    <link rel='stylesheet' href='/css/{{ $page_titl }}.css' />
    @if ($page_titl == 'dashbord' || $page_titl == 'profile' || $page_titl == 'masseg')
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">
        <link href='asets\css\sb-admin-2.min.css' rel='stylesheet'>
    @endif
    <title>{{ $page_titl }}</title>
@show
</head>

<body>

@section('nav')
    @include('layout.nav')
@show

@yield('body')

@include('layout.footr')

@if ($page_titl == 'singin')
    <script src='js/location.js'></script>
    <script src='js/creat_account.js'></script>
@else
    <script src='js/{{ $page_titl }}.js'></script>
@endif
<script src='js/all.js'></script>
<script src='asets/js/jquery-3.6.1.min.js'></script>
<script src='asets/js/bootstrap.min.js'></script>
<script src='js/main.js'></script>

</body>

</html>

<?php
          
     
  }  else {
        
    
?>

<html lang="en" dir="rtl">

<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta http-equiv="refesh" content="30">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="نسعي الى حل مشاكل التعليم في السودن و التوجه الي رقمنة التعليم بالكامل">
<link rel='icon' type='image/svg' href='img/icon/logo.jpg' style="border-radius: 50%">
@if ($page_titl == 'show')
    <link href="asets/css/show/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="asets/css/show/dashboard.rtl.css" rel="stylesheet">
    <link rel='stylesheet' href='asets/css/normalize.css' />
    <link rel="stylesheet" href="asets/lib/bootstrap-5.1.3-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="asets/lib/bootstrap-icons/bootstrap-icons.css" />
    <link rel="stylesheet" href="asets/lib/bootstrap-icons/fonts/bootstrap-icons.woff" />
    <link rel="stylesheet" href="asets/lib/bootstrap-icons/fonts/bootstrap-icons.woff2" />
    <link rel="stylesheet" href="asets/css/main.css" />
@else
    <link rel='stylesheet' href='asets/css/normalize.css' />
    <link rel="stylesheet" href="asets/lib/bootstrap-5.1.3-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="asets/lib/bootstrap-icons/bootstrap-icons.css" />
    <link rel="stylesheet" href="asets/lib/bootstrap-icon/fonts/bootstrap-icons.woff" />
    <link rel="stylesheet" href="asets/lib/bootstrap-icons/fonts/bootstrap-icons.woff2" />
    <link rel="stylesheet" href="asets/css/main.css" />
@endif
<link rel='stylesheet' href='css/{{ $page_titl }}.css' />
<title>{{ $page_titl }}</title>
@show
</head>

<body>


@section('nav')
@include('layout.nav')
@show
<div class="myicon">
@yield('body')
</div>


@include('layout.footr')




<script src='js/all.js'></script>
<script src='asets/js/jquery-3.6.1.min.js'></script>
<script src='asets/js/bootstrap.min.js'></script>
<script src='js/main.js'></script>
<script src='js/{{ $page_titl }}.js'></script>
@if (
    $page_titl == 'pre_school_education' or
        $page_titl == 'high_school' or
        $page_titl == 'basic_educaion' or
        $page_titl == 'intermediate_education' or
        $page_titl == 'art_workshop' or
        $page_titl == 'institute')
<script src='js/location.js'></script>
@endif

</body>

</html>
<?php
          
     
  }  
        
    
?>
