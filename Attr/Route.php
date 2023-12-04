<?php
#[Attribute]
class Route{
    public function __construct(public string $route, public string $method = 'GET'){
    }
}