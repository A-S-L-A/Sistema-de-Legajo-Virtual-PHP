<?php

class ConexionBD{

    public static function cBD(){

        $bd = new PDO("mysql:host=localhost;port=3306;dbname=dbabel","root","");

        $bd -> exec("set names utf8");

        return $bd;
    }
}