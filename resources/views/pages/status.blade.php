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
        body {
            background-color: rgb(129 104 66);
            color: #fff;
        }
        footer,
        .fixed-top {
            display: none;
        }

        fieldset {
            border-color: #003;
            border-style: solid;
            border-width: 2px;
            text-align: center;
            margin-top: 20%;
            font-size: 2em;
            box-shadow: 10px 10px 10px #000;


        }

        legend {
            float: none;
            width: auto;
            padding: 10px;
            text-align: start;
            font-size: 2em;
            border-radius: 10%;
            color: yellow;
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
