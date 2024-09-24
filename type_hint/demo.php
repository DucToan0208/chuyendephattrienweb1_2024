<?php 
declare(strict_types=1);

require "A.php";
// require "B.php";


class Demo {

    // Type A
    public function typeAReturnA():A
    {
        echo __FUNCTION__ ."<br>";
        return new A();
    }
    public function typeAReturnB():A
    {
        echo __FUNCTION__ ."<br>";
        return new B();
    }

    public function typeAReturnC():A
    {
        echo __FUNCTION__ ."<br>";
        return new C();
    }

    public function typeAReturnI():A
    {
        echo __FUNCTION__ ."<br>";
        return new I();
    }

    public function typeAReturnNull():A
    {
        echo __FUNCTION__ ."<br>";
        return null;
    }

    //Type B
    public function typeBReturnA():B
    {
        echo __FUNCTION__ ."<br>";
        return new A();
    }
    public function typeBReturnB() :B
    {
        echo __FUNCTION__ ."<br>";
        return new B();
    }

    public function typeBReturnC():B
    {
        echo __FUNCTION__ ."<br>";
        return new C();
    }

    public function typeBReturnI():B
    {
        echo __FUNCTION__ ."<br>";
        return new I();
    }

    public function typeBReturnNull():B
    {
        echo __FUNCTION__ ."<br>";
        return null;
    }

    //Type C

    public function typeCReturnA(): C
    {
        echo __FUNCTION__ ."<br>";
        return new A();
    }
    public function typeCReturnB(): C
    {
        echo __FUNCTION__ ."<br>";
        return new B();
    }

    public function typeCReturnC(): C
    {
        echo __FUNCTION__ ."<br>";
        return new C();
    }

    public function typeCReturnI(): C
    {
        echo __FUNCTION__ ."<br>";
        return new I();
    }

    public function typeCReturnNull(): C
    {
        echo __FUNCTION__ ."<br>";
        return null;
    }


    //Type I
    public function typeIReturnA(): I
    {
        echo __FUNCTION__ ."<br>";
        return new A();
    }
    public function typeIReturnB(): I
    {
        echo __FUNCTION__ ."<br>";
        return new B();
    }

    public function typeIReturnC(): I
    {
        echo __FUNCTION__ ."<br>";
        return new C();
    }

    public function typeIReturnI(): I
    {
        echo __FUNCTION__ ."<br>";
        return new I();
    }

    public function typeIReturnNull(): I
    {
        echo __FUNCTION__ ."<br>";
        return null;
    }


    //Type null
    public function typeNullReturnA(): null
    {
        echo __FUNCTION__ ."<br>";
        return new A();
    }
    public function typeNullReturnB(): null
    {
        echo __FUNCTION__ ."<br>";
        return new B();
    }

    public function typeNullReturnC(): null
    {
        echo __FUNCTION__ ."<br>";
        return new C();
    }

    public function typeNullReturnI(): null
    {
        echo __FUNCTION__ ."<br>";
        return new I();
    }

    public function typeNullReturnNull(): null
    {
        echo __FUNCTION__ ."<br>";
        return null;
    }


}

$demo = new Demo();
// $demo->typeAReturnA();
 $demo->typeNULLReturnNULL();