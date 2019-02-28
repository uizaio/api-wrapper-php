## Entity
These below APIs used to take action with your media files (we called Entity).

See details [here](https://docs.uiza.io/#video).

### Create entity.
Create entity using full URL. Direct HTTP, FTP or AWS S3 link are acceptable.

See details [here](https://docs.uiza.io/#create-entity).

````
$params = [
    'name' => 'Name entity',
    'url' => 'http://google.com,
    'inputType' => 'http',
];

Uiza\Entity::create($params);
````

### Retrieve entity
Get detail of entity including all information of entity.

See details [here](https://docs.uiza.io/#retrieve-an-entity).

````
Uiza\Entity::retrieve('key ... ');
````

### List all entities.
Get list of entities including all detail.

See details [here](https://docs.uiza.io/#list-all-entities).

````
Uiza\Entity::all(['publishToCdn' => 'queue']);

// or

Uiza\Entity::list(['publishToCdn' => 'queue']);
````

### Update entity.
Update entity's information.

See details [here](https://docs.uiza.io/#update-an-entity).

````
$entity = Uiza\Entity::retrieve('key ... ');
$entity->name = "Name change";
$entity->save();

// or
$params = [
    'name' => 'Name change'
];

Uiza\Entity::update('key ..', $params);
````

### Delete entity
Delete entity.

See details [here](https://docs.uiza.io/#delete-an-entity).

````
$entity = Uiza\Entity::retrieve('key ... ');
$entity->destroy();

// or

Uiza\Entity::delete('key ...');
````

### Search entity.
Search entity base on keyword entered.

See details [here](https://docs.uiza.io/#search-entity).

````
Uiza\Entity::search(['keyword' => 'sample']);
````

### Publish entity to CDN
Publish entity to CDN, use for streaming.

See details [here](https://docs.uiza.io/#publish-entity-to-cdn).

````
Uiza\Entity::publish(['id' => 'key ..']);
````

### Get Status Publish
Publish entity to CDN, use for streaming.

See details [here](https://docs.uiza.io/#get-status-publish).
````
Uiza\Entity::getStatusPublish('key ...');
````

### Get AWS Upload Key
This API will be return the bucket temporary upload storage & key for upload, so that you can push your file to Uiza’s storage and get the link for URL upload & create entity.

See details [here](https://docs.uiza.io/#get-aws-upload-key).

````
Uiza\Entity::getAWSUploadKey();
````
