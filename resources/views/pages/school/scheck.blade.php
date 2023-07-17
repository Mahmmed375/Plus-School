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
        footer {
            display: none;
        }

        form {
            justify-content: center
        }
    </style>
    <div class="container text-center">
        <br>
        <div class='row justify-content-start  my-2'>
            <div class='col-md-12 '>
                <h1 class='fw-bold'>
                    تاكيد الهوية
                </h1>
                <p class="h3">لقد تم ارسال رقم سري مكون من 6 ارقام الي هاتفك قم بكتابة رمز التاكيد </p>
            </div>
        </div>
        <div class="justify-content-center my-2">
            <form class="form-inline d-flex my-4 my-lg-0 sm-text-center" method="POST">
                @csrf

                <button class="btn btn-outline-success my-sm-0 mx-2 " type="submit">
                    تاكيد
                </button>
                <input class="form-control mr-sm-2 w-50" maxlength="20" minlength="10" name="search" type="search"
                    placeholder=" ادخل رقم التاكيد" aria-bs-label="Search" />
            </form>
            <a href="" style="margin-right: 0">اعدة ارسال الكود</a>
        </div>

    </div>
@endsection
