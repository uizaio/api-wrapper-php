<?php

require __DIR__."/../vendor/autoload.php";

Uiza\Base::setApiSubdomain('your-api-subdomain');
Uiza\Base::setApiKey('your-api-key');

$listEntity = Uiza\Entity::all();
var_dump($listEntity);

$entity = Uiza\Entity::retrieve('');
var_dump($entity);
