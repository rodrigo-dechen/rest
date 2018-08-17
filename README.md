# REST

Pequena classe para criar use server rest

## Server
````php
$_HEAD = [
    // Obrigario
    'verbo' => 'METHOD', // GET | POST | PUT | DELETE
    
    // Opcional
    'login' => $_SERVER['PHP_AUTH_USER'],
    'password' => $_SERVER['PHP_AUTH_PW'],
];

$_DATA = [];

$api = '\Teste\Teste';

$api = new $api();

$apiReturn = $api->request($_HEAD, $_DATA);
````

## Comando

````php
namespace Teste;
use Rest\Rest;

class Teste extends Rest{
    
    // confere o login do usuario
    protected function auth($_HEAD, $_DATA = []){
    
        // $_HEAD['login'] 
        // $_HEAD['password']
         
        return true;
    }

    protected function POST($_DATA){
        // Cria o registro no sistemna
    }
}

````