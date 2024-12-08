<?php 
    require "I.php";
    class C implements I {

        public function f() {
            echo "Hiện thực interface I";
        }
    }

    $c = new C();
    $c->f();