<?php

require __DIR__."/../vendor/autoload.php";

Uiza\Base::setApiKey('');

$listEntity = Uiza\Entity::all();
var_dump($listEntity);

$entity = Uiza\Entity::retrieve('');
var_dump($entity);