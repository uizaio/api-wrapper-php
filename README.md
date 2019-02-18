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

### Setup

````
Uiza\Base::setApiSubdomain('your-subdomain');
Uiza\Base::setApiKey('your-api-key');
````

## Entity

### Create entity.

````
$params = [
    'name' => 'Name entity',
    'url' => 'http://google.com,
    'inputType' => 'http',
];

$entity = Uiza\Entity::create($params);
````

### Retrieve entity

````
Uiza\Entity::retrieve('key ... ');
````

### List entity.

````
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

### Delete entity

````
$entity = Uiza\Entity::retrieve('key ... ');
$entity->destroy();

// or

Uiza\Entity::delete('key ...');
````

### Search entity.

````
$entity = Uiza\Entity::search(['keyword' => 'sample']);
````

### Publish entity.

````
$entity = Uiza\Entity::publish(['id' => 'key ..']);
````

### Get Status Pulblish

````
Uiza\Entity::getStatusPublish('key ...');
````

### Get AWS Upload Key

````
Uiza\Entity::getAWSUploadKey();
````

## Category

### Create Category

````
$params = [
    "name" => "Folder sample",
    "type" => "folder",
    "description" => "Folder description",
];

Uiza\Category::create($params);
````

### Retrieve Category

````
Uiza\Category::retrieve('key ... ');
````

### Retrieve Category List

````
$listCategory = Uiza\Category::all();

// or

$listCategory = Uiza\Category::list();
````

### Update Category

````
$params = [
    "name" => "Folder edited",
    "type" => "folder",
];

Uiza\Category::update('key ..', $params);

````

### Delete entity

````
$category = Uiza\Category::retrieve('key ... ');
$category->destroy();

// or

Uiza\Category::delete('key ...');
````

### Create Category Relation

````
$params = [
    "entityId" => "16ab25d3-fd0f-4568-8aa0-0339bbfd674f",
    "metadataIds" => ["095778fa-7e42-45cc-8a0e-6118e540b61d","e00586b9-032a-46a3-af71-d275f01b03cf"]
];

Uiza\Category::createRelation($params);
````

### Delete Category Relation

````
$params = [
    "entityId" => "16ab25d3-fd0f-4568-8aa0-0339bbfd674f",
    "metadataIds" => ["095778fa-7e42-45cc-8a0e-6118e540b61d","e00586b9-032a-46a3-af71-d275f01b03cf"]
];

Uiza\Category::deleteRelation($params);
````

## Storage

### Add Storage
````
$params = [
    "name" => "FTP Uiza",
    "description" => "FTP of Uiza, use for transcode",
    "storageType" => "ftp",
    "host" => "ftp-example.uiza.io",
    "username" => "uiza",
    "password" => "=59x@LPsd+w7qW",
    "port":21
];

Uiza\Storage::create($params);
````

### Retrieve Storage

````
Uiza\Storage::retrieve('key ... ');
````

### Update Storage

````
$params = [
    "name" => "FTP Uiza",
    "description" => "FTP of Uiza, use for transcode",
    "storageType" => "ftp",
    "host" => "ftp-example.uiza.io",
    "username" => "uiza",
    "password" => "=5;'9x@LPsd+w7qW",
    "port" => 21
];

Uiza\Storage::update('key ..', $params);
````

### Remove Storage

````
$category = Uiza\Storage::retrieve('key ... ');
$category->destroy();

// or

Uiza\Storage::delete('key ...');
````
