<?php
    $page = ['index2', 'singSchools', 'reastPass', 'dashbord', 'exit', 'show', 'singin', 'subort', 'satting'];
    if (in_array($page_titl, $page)) {
?>
<div class="cont fixed-top">
    <nav class="navbar  navbar-expand-lg">
        <div class="container ">
            @if (!empty($_COOKIE['sing']) && $_COOKIE['sing'] == '1')
                <a class="navbar-brand display-2" href="/dashbord">
                    My SD School
                </a>
            @else
                <a class="navbar-brand display-2" href="/school">
                    My SD School
                </a>
            @endif

        </div>
    </nav>
</div>

<?php
          
     
  }  else {
        
    
?>

<div class="cont fixed-top">
    <nav class="navbar navbar-expand-lg">
        <div class="container ">
            <a class="navbar-brand" href="http://mysdschool.com/">My SD School</a>
            <button class="navbar-toggler navbar-light" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-bs-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto  ">

                    <li class="nav-item active ">
                        <a class="nav-link mx-s" href="http://mysdschool.com/">الرىسية</a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link " href="educational_programs">برامج تعليمية</a>
                    </li>


                    <li class="nav-item ">
                        <a class="nav-link " href="high_school">ثانوي</a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link " href="basic_educaion">اساس</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="intermediate_education">متوسطة</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="pre_school_education">رياض</a>
                    </li>




                    <li class="nav-item dropdown  ">
                        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-bs-haspopup="true" aria-bs-expanded="false">
                            المزيد
                        </a>
                        <div class="dropdown-menu " aria-bs-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="institute">معاهد</a>
                            <a class="dropdown-item" href="art_workshop">فني و حرفي</a>
                            <a class="dropdown-item" href="new">احدث البرامج التعلمية</a>
                            <a class="dropdown-item" href="school">المدرسة</a>
                            <div class="dropdown-divider"></div>



                            @if (!isset($_COOKIE['sing']))
                                @if ($page_titl == 'My SD School')
                                    <a class="dropdown-item" href="#login">تسجيل الدخول</a>
                                @else
                                    <a class="dropdown-item" href="/#login">تسجيل الدخول</a>
                                @endif
                                <a class="dropdown-item" href="creat_account">انساء حساب</a>
                                <a class="dropdown-item" href="reaset">استغادة حسابك</a>
                            @else
                                <a class="dropdown-item" href="profile">الملف الشخصي</a>
                                <a class="dropdown-item" href="exit">تسجيل خروج</a>
                            @endif

                            <a class="dropdown-item" href="help">المساعدة</a>
                        </div>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
</div>
<?php
  }
?>
