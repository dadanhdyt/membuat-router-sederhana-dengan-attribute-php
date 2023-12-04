<?php
require "Attr/Route.php";
class Post{
    #[Route('/home/index','GET')]
    public function home(){
        return "Data";
    }
  
    #[Route("/post/([a-zA-Z0-9_-]+)","GET")]
    public function detailPost($slug){
        return $slug;
    }
}
class Auth{
    #[Route('/login','GET')]
    public function login(){
        return "Halaman Login";
    }
}
$controllers = [
    Post::class,
    Auth::class,
];


require 'route.php';
parseRoute($controllers);

// foreach ( $controllers as $controller ){
//     $reflectionController = new ReflectionClass($controller);
//     $methods = $reflectionController->getMethods();
//     foreach ($methods as $method){
//         $attr = $method->getAttributes(Route::class);
//         foreach($attr as $atr){
//             $route = $atr->newInstance();
//             var_dump($route);
//         }
//     }
// }