<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



    $db_info = 'mysql:host=localhost;dbname=establishment';
    $db_user = 'root';
    $db_password = '';
   
    try {
        $db = new PDO($db_info, $db_user, $db_password);
    } catch (PDOException $i) {
        echo $i;
    }
    $site_status_info = 'SELECT site_status FROM `info_admin_site`;';
    $site_status_info_prepare = $db->prepare($site_status_info);
    $site_status_info_prepare->execute();
    $site_status_info_fatchAll = $site_status_info_prepare->fetchAll();
    $status = '';
    foreach ($site_status_info_fatchAll as $info_status) {
        $status = $info_status[0];
    }

    define('SITE_STATUS', $status);


    if(SITE_STATUS == "o"){

            Route::match(['get', 'post'],'/', function () {
                return view('index',["page_titl"=>"My SD School"]);
            });


            Route::match(['get', 'post'], '/{name}', function ($name) {


                $pages=array("index","intermediate_education","basic_educaion","high_school","educational_programs","show","form","help","pre_school_education","institute","art_workshop","educational_courses","reaset","creat_account","new","profile","exit","index2","singSchools","reastPass","dashbord","exit","show","singin","subort","satting");
                $pages2=array("school","singSchools","reastPass","dashbord","exit","show","singin","subort","satting");

                    if(in_array($name,$pages) or in_array($name,$pages2)){
                        $name=$name;
                    } else{

                        return view('index',[ "page_titl"=>"Home"]);
                    }

                    if(in_array($name,$pages2)){

                         return view("/pages/school/$name",["page_titl"=>$name ]);
                    }else{
                        
                         return view("/pages/$name",["page_titl"=>$name ]);
                    }
            });
    }elseif(SITE_STATUS == "c"){

        Route::match(['get', 'post'],'/', function () {
            return view("/pages//status",["page_titl"=>"My SD School"]);
        });

    }else{

    }

