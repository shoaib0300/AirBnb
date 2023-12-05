<?php

namespace Controllers;
use App\Helpers\Twig;


class HomeController{
    // private ?Request $request;


    public function __construct(){

    }

    public function index(): void{
        try{
            $response = Twig::render(
                'index.php',
                'views',

            );
            } catch (TwigRenderException $e) {
            $response = $e->getMessage();
        }
        echo $response;
    }
}