<?php
$config = include "../dbconf.php";
require "../Loading.php";

session_start();
$uri = $_SERVER['REQUEST_URI'];
$uris = explode("/",$uri);//파란책
//print_r($uris);

$db = new \Module\Database\Database( $config );

if(isset($uris[1])&& $uris[1]){
    //컨트롤러 실행
   // echo $uri[1]."컨트롤러 실행";
    $controllerName = "\App\Controller\\".ucfirst($uris[1]);
    $tables = new $controllerName($db);
    //클래스의 
    $tables->main();
}else{
    //처음페이지
    //echo "처음페이지";
    $body = file_get_contents("../Resource/index.html");
    if($_SESSION["email"]){
        //로그아웃 상태
        $body = str_replace("{{login}}","로그인 상태입니다. <a href='logout'>로그아웃</a>",$body);
    }else{
        //로그인 상태
        $loginform = file_get_contents("../Resource/login.html");
        $body = str_replace("{{login}}",$loginform,$body);
    }
    echo $body;
}
// $desc = new \App\Controller\TableInfo;
// $desc->main();
