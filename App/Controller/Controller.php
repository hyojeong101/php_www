<?php

namespace App\Controller;

abstract class Controller
{
    //인터페이스와 유사하게 선언 할 수 있어요.
    
    abstract public function main();

    // 추상화는 메소드 설정 할 수 있다.
    public function hello()
    {
        echo"안녕 대림대학교 php강좌";
    }
}
