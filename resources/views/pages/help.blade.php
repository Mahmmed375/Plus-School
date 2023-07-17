@php
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $infoHost = 'mysql:host=localhost;dbname=establishment';
        $user = 'root';
        $paasword = '';
    
        $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
        $text = filter_var(trim($_POST['text']), FILTER_SANITIZE_STRING);
        $error = '';
    
        try {
            $db = new PDO($infoHost, $user, $paasword);
    
            if ($name != '' && $email != '' && $text != ''):
                $q2 = "INSERT INTO `tem_subort` VALUES (NULL, '" . $name . "', '" . $email . "', '" . $text . "');";
                $responsiveness2 = $db->prepare($q2);
                $responsiveness2->execute();
                header('location:/');
                exit();
            else:
                $error = 'الرجاء ملاء الحقول';
            endif;
        } catch (PDOException $m) {
            echo " error $m";
        }
    }
@endphp
@extends('layout.master')

@section('body')

    <section class="subort">
        <article class="container p-4">
            <div class="row justify-content-center my-4">
                <div class="col-md-5">
                    <div class="sub bg-success p-2">
                        <div class="subortTem text-right my-2">
                            <h2 class="mx-3 text-light">
                                فريق الدعم

                            </h2>

                            <div class="form bg-info p-3 m-2">
                                <form action="" class="form-group " method="POST">
                                    @csrf
                                    <label for="userName" class="label text-light">الاسم</label>
                                    <input type="text" name="name" id="userName" class="form-control mb-3"
                                        placeholder=".........." />

                                    <label for="email" class="label text-light">البريد الالكتروني</label>
                                    <input type="email" name="email" id="email" class="form-control mb-3"
                                        placeholder="..........." />
                                    <label for="info" class="label text-light">المشكلة</label>
                                    <textarea name="text" id="info" cols="" rows="5" class="form-control my-2 bg-transparent textarea"
                                        placeholder="......."></textarea>

                                    <div class="button justify-content-center text-center align-items-center">
                                        <span
                                            style="color: #090f68e1;font-size:18px; text-align: center;"><?php echo @$error; ?></span><br>

                                        <button type="submit" class="btn text-center px-5 py-1 mt-3">
                                            ارسال
                                        </button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </section>

@stop
