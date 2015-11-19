<?php
/**
 * Created by PhpStorm.
 * User: ngodo
 * Date: 17/11/2015
 * Time: 12:38 AM
 */
 class Bootstrap
 {
     public function __construct()
     {
         $url = isset($_GET['url']) ? $_GET['url'] : null;
         $url = rtrim($url,"/");
         $url = explode("/",$url);
         //print_r($url);

         if(empty($url[0]))
         {
             require 'controllers/index.php';
             $controller = new Index();
             $controller->index();
             return false;
         }

         $file = 'controllers/'.$url[0].'.php';

         if(file_exists($file))
         {
             require $file;
         }
         else
         {
             require 'controllers/error.php';
             $controller = new Error();
             return false;
         };

         $controller = new $url[0]();

         if(isset($url[2]))
         {
            if(method_exists($controller,$url[1]))
            {
                $controller ->{$url[1]}($url[2]);
            }
             else
             {
                 echo 'Error';
             }
         }
         else
         {
             if(isset($url[1]))
             {
                 //$controller->index();
                 $controller ->{$url[1]}();
                 echo $url[1];
             }
             else {
                 $controller->index();
             }
         };

     }
 }