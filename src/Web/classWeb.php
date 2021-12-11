<?php
declare(strict_types=1);

namespace Alberto\src;


class Webb {

    private const IP = '127.0.0.1';

    public function aperturahtml(){
        return '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>';        
    }

    public function CierreHTML(){
       return '</body>
        </html>';

    }

    public function Piedepagina(){

    }
    public function Menú(){

    }

    public function ConexiónBD(){

    }

    public function EstructuraBD(){
        
    }
}