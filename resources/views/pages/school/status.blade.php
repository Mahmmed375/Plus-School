@extends('layout.master')
@php
    $db_info = 'mysql:host=localhost;dbname=establishment';
    $db_user = 'root';
    $db_password = '';
    try {
        $db = new PDO($db_info, $db_user, $db_password);
    } catch (PDOException $i) {
        echo $i;
    }

    $site_status_info = 'SELECT * FROM `info_admin_site`;';
    $site_status_info_prepare = $db->prepare($site_status_info);
    $site_status_info_prepare->execute();
    $site_status_info_fatchAll = $site_status_info_prepare->fetchAll();
    $status = 'fugfj';

    foreach ($site_status_info_fatchAll as $info_status) {
        $status = $info_status[0];
        $status_info = $info_status[1];
        $status_masseg = $info_status[2];
    }

@endphp

@section('body')
    <style>
        footer,
        .fixed-top {
            display: none;
        }

        fieldset {
            border-color: green;
            border-style: solid;
            border-width: 2px;
            text-align: center;
            margin-top: 20%;
            font-size: 2em;


        }

        legend {
            float: none;
            width: auto;
            padding: 10px;
            text-align: start;
            font-size: 2em;
            color: rgb(241, 241, 59);
            background-color: #fff;
            border: #000 solid 2px;
            border-radius: 10%;
        }
    </style>
    <div class="container p-4">

        <fieldset>
            <legend>
                تنبيه
            </legend>
            <p>
                {{ $status_masseg }}
            </p>
        </fieldset>
    </div>
@stop
