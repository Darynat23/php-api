<?php


function saludar(Req $request, Res $response, $args){
    $res->getBody()->writer("hello");
    return $res;
}