# Uiza

----
## Requirements
PHP 5.3.0 and later.

----
## Installation
You can install the bindings via Composer. Run the following command:

````
composer require uiza/uiza-php
````

----

## Getting Started

### Require library.

````
require __DIR__."/../vendor/autoload.php";
````

### List entity.

````
Uiza\Base::setApiKey('your-api-key');

$listEntity = Uiza\Entity::all();
````

### Update entity.

````
$entity = Uiza\Entity::retrieve('key ... ');
$entity->name = "Name change";
$entity->save();

// or

Uiza\Entity::update('key ..', ['name' => 'Name change']);

````

### Create entity.

````
$params = [
	'name' => 'Name entity',
	'url' => 'http://google.com,
	'inputType' => 'http',
];

$entity = Uiza\Entity::create($params);
````

### Search entity.

````
$entity = Uiza\Entity::search(['keyword' => 'sample']);
````

### Publish entity.

````
$entity = Uiza\Entity::publish(['id' => 'key ..']);
````

### Delete entity

````
$entity = Uiza\Entity::retrieve('key ... ');
$entity->destroy();

// or

Uiza\Entity::delete('key ...');
````

### Get Status Pulblish

````
Uiza\Entity::getStatusPublish('key ...');
````

### Get AWS Upload Key

````
Uiza\Entity::getAWSUploadKey();
````
