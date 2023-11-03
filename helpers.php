<?php

function redirect($url)
{
    header("Location: {$url}");
    die();
}

function view($path, $data = [])
{
    extract($data);
    include __DIR__.'/views/'.$path.'.php';
}
function partial(string $path)
{
    include __DIR__.'/partials/'.$path.'.php';
}