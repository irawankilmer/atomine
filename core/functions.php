<?php
session_start();
include __DIR__.'/../vendor/autoload.php';
include __DIR__ .'/../app/routes.php';

function getUrl($uri)
{
    $folder = explode('/', $_SERVER['REQUEST_URI']);
    return $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].'/'.$folder[1].$uri;
}

function redirect($uri)
{
    header("Location:".getUrl($uri));
}