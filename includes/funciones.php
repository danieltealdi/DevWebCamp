<?php

function debuguear($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}
function paginaActual($path){
    return str_contains( $_SERVER['REQUEST_URI'],$path) ? TRUE : FALSE;
    
}
function is_auth() : bool {
    if(!isset($_SESSION)) {
        session_start();
    }
    return isset($_SESSION['nombre']) && !empty($_SESSION);
}
function is_admin() : bool {
    if(!is_auth()) {
        return false;
    }
    return $_SESSION['admin'] ?? false;
}
