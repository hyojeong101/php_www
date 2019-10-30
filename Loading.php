<?php
 //자동으로 require
 spl_autoload_register(function($classname){
     echo $classname;
     //클래스 이름을 조합해서 ,require 해준다
     require "../".$classname.".php";
     //exit;
 });