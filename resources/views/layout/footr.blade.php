<?php
    $page = ['index2', 'singSchools', 'reastPass', 'dashbord', 'exit', 'show', 'singin', 'subort', 'satting'];
    if (in_array($page_titl, $page)) {
?>
<style>
    footer {
        display: none;
    }
</style>
<footer>
    <div class="container">


        <div class="footer-item my-2 pt-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="how-we-ar text-light">
                            <h5><a href="" class="brand">My SD School</a></h5>
                            <div class="abuot-us my-2">
                                <p class="lead">
                                    <!-- نبزة عن الموقع -->
                                    تسعع My SD School الي جعل التعليم اسهل وافضل عن طريق خدماته المتميزة التي تقدمها
                                    المنصة حصريا للطلاب السودنين و غير السودنين
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 my-1">
                        <div class="products">
                            <h5 class="lead mx-4 bulde">الوصول السريع</h5>
                            <ul class="navbar-nav my-1">
                                <li class="nav-item mx-1">
                                    <a href="http://mysdschool.com/">الرىسية</a>
                                </li>


                                <li class="nav-item mx-1">
                                    <a href="institute">معاهد</a>
                                </li>


                                <li class="nav-item mx-1">
                                    <a href="art_workshop">فني و حرفي</a>
                                </li>


                                <li class="nav-item mx-1">
                                    <a href="new">احدث البرامج التعلمية</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 my-1">
                        <div class="usfull-link">
                            <h5 class="lead mx-4 bulde">روابط المساعدة</h5>
                            <ul class="navbar-nav">

                                <li class="nav-item mx-1">
                                    <a href="help">المساعدة</a>
                                </li>

                                <li class="nav-item mx-1">
                                    <a href="creat_account">انشاء حساب</a>
                                </li>

                                <li class="nav-item mx-1">
                                    <a href="login">تسجيل الدخول</a>
                                </li>

                                <li class="nav-item mx-1">
                                    <a href="#">استغادة حسابك</a>
                                </li>



                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 ">
                        <div class="contact-us">
                            <h5 class="lead mx-4 bulde">اتصل بنا</h5>
                            <ul class="navbar-nav">
                                <li class="nav-item my-1">
                                    <i class="bi bi-house-door-fill"></i> امدرمان دار السلام م 26
                                </li>
                                <li class="nav-item my-1">
                                    <a href="email:mysdschool.com"> <i class="bi bi-envelope-fill"></i> mysdschool.com
                                    </a>
                                </li>
                                <li class="nav-item my-1" dir="ltr">
                                    <a href="tel:+249119032873">+249 119 032 873<i class="bi bi-telephone-fill"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="social text-center">
            <div class="row">
                <div class="col">
                    <a href="http://"><i class="bi bi-facebook"></i></a>
                    <a href="http://"><i class="bi bi-twitter"></i></a>
                    <a href="http://"><i class="bi bi-instagram"></i></a>
                    <a href="http://"><i class="bi bi-youtube"></i></a>
                    <a href="http://mysdschool.com"><i class="bi bi-google"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright text-center ">
        <div dir="ltr">
            &copy; <span class="copyrit">2023</span> copyright
            <strong>My SD School</strong>
        </div>
    </div>
</footer>

<?php
          
     
  }  else {
        
    
?>


<footer>
    <div class="container">


        <div class="footer-item my-2 pt-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="how-we-ar text-light">
                            <h5><a href="" class="brand">My SD School</a></h5>
                            <div class="abuot-us my-2">
                                <p class="lead">
                                    <!-- نبزة عن الموقع -->
                                    تسعع My SD School الي جعل التعليم اسهل وافضل عن طريق خدماته المتميزة التي تقدمها
                                    المنصة حصريا للطلاب السودنين و غير السودنين
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 my-1">
                        <div class="products">
                            <h5 class="lead mx-4 bulde">الوصول السريع</h5>
                            <ul class="navbar-nav my-1">
                                <li class="nav-item mx-1">
                                    <a href="/">الرىسية</a>
                                </li>


                                <li class="nav-item mx-1">
                                    <a href="institute">معاهد</a>
                                </li>


                                <li class="nav-item mx-1">
                                    <a href="art_workshop">فني و حرفي</a>
                                </li>


                                <li class="nav-item mx-1">
                                    <a href="new">احدث البرامج التعلمية</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 my-1">
                        <div class="usfull-link">
                            <h5 class="lead mx-4 bulde">روابط مساعدة</h5>
                            <ul class="navbar-nav">

                                <li class="nav-item mx-1">
                                    <a href="help">المساعدة</a>
                                </li>
                                @if ($page_titl == 'My SD School')
                                    @if (!isset($_COOKIE['sing']))
                                        <li class="nav-item mx-1">
                                            <a href="creat_account">انشاء حساب</a>
                                        </li>

                                        <li class="nav-item mx-1">
                                            <a href="#login">تسجيل الدخول</a>
                                        </li>

                                        <li class="nav-item mx-1">
                                            <a href="reaset">استغادة حسابك</a>
                                        </li>
                                    @else
                                        <li class="nav-item mx-1">
                                            <a href="profile">الملف الشخصي</a>
                                        </li>
                                        <li class="nav-item mx-1">
                                            <a href="exit">تسجيل خروج</a>
                                        </li>
                                    @endif

                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 ">
                        <div class="contact-us">
                            <h5 class="lead mx-4 bulde">اتصل بنا</h5>
                            <ul class="navbar-nav">
                                <li class="nav-item my-1">
                                    <i class="bi bi-house-door-fill"></i> امدرمان دار السلام م 26
                                </li>
                                <li class="nav-item my-1">
                                    <a href="email:mysdschool.com"> <i class="bi bi-envelope-fill"></i> mysdschool.com
                                    </a>
                                </li>
                                <li class="nav-item my-1" dir="ltr">
                                    <a href="tel:+249119032873">+249 119 032 873<i
                                            class="bi bi-telephone-fill"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="social text-center">
            <div class="row">
                <div class="col">
                    <a href="http://"><i class="bi bi-facebook"></i></a>
                    <a href="http://"><i class="bi bi-twitter"></i></a>
                    <a href="http://"><i class="bi bi-instagram"></i></a>
                    <a href="http://"><i class="bi bi-youtube"></i></a>
                    <a href="http://mysdschool.com"><i class="bi bi-google"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright text-center ">
        <div dir="ltr">
            &copy; <span class="copyrit">2023</span> copyright
            <strong>My SD School</strong>
        </div>
    </div>
</footer>
<?php
          
     
  }  
        
    
?>
