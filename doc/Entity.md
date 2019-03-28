## Entity
These below APIs used to take action with your media files (we called Entity).

See details [here](http://dev-ap-southeast-1-api.uizadev.io/docs/#api-Media).

### Create entity.
Create entity using full URL. Direct HTTP, FTP or AWS S3 link are acceptable.

See details [here](http://dev-ap-southeast-1-api.uizadev.io/docs/#api-Media-create_entity).

````
require __DIR__."/../vendor/autoload.php";

Uiza\Base::setAppId('your-app-id');
Uiza\Base::setAuthorization('your-authorization');

try {
    $params = [
        'name' => 'Name entity',
        'url' => 'http://google.com',
        'inputType' => 'http',
    ];

    Uiza\Entity::create($params);
} catch(\Uiza\Exception\ErrorResponse $e) {
    print($e);
}
````

### Retrieve entity
Get detail of entity including all information of entity.

See details [here](http://dev-ap-southeast-1-api.uizadev.io/docs/#api-Media-get_entity).

````
require __DIR__."/../vendor/autoload.php";

Uiza\Base::setAppId('your-app-id');
Uiza\Base::setAuthorization('your-authorization');

try {
    Uiza\Entity::retrieve('key ... ');
} catch(\Uiza\Exception\ErrorResponse $e) {
    print($e);
}
````

### List all entities.
Get list of entities including all detail.

See details [here](http://dev-ap-southeast-1-api.uizadev.io/docs/#api-Media-get_entity).

````
require __DIR__."/../vendor/autoload.php";

Uiza\Base::setAppId('your-app-id');
Uiza\Base::setAuthorization('your-authorization');

try {
    Uiza\Entity::all();

    // or

    Uiza\Entity::list();
} catch(\Uiza\Exception\ErrorResponse $e) {
    print($e);
}
````

### Update entity.
Update entity's information.

See details [here](http://dev-ap-southeast-1-api.uizadev.io/docs/#api-Media-update_entity).

````
require __DIR__."/../vendor/autoload.php";

Uiza\Base::setAppId('your-app-id');
Uiza\Base::setAuthorization('your-authorization');

try {
    $entity = Uiza\Entity::retrieve('key ... ');
    $entity->name = "Name change";
    $entity->save();

    // or

    $params = [
        'name' => 'Name change',
        'url' => 'http://google.com',
        'inputType' => 'http',
    ];

    Uiza\Entity::update('key ..', $params);
} catch(\Uiza\Exception\ErrorResponse $e) {
    print($e);
}
````

### Delete entity
Delete entity.

See details [here](http://dev-ap-southeast-1-api.uizadev.io/docs/#api-Media-delete_entity).

````
require __DIR__."/../vendor/autoload.php";

Uiza\Base::setAppId('your-app-id');
Uiza\Base::setAuthorization('your-authorization');

try {
    $entity = Uiza\Entity::retrieve('key ... ');
    $entity->destroy();

    // or

    Uiza\Entity::delete('key ...');
} catch(\Uiza\Exception\ErrorResponse $e) {
    print($e);
}
````

### Search entity.
Search entity base on keyword entered.

````
require __DIR__."/../vendor/autoload.php";

Uiza\Base::setAppId('your-app-id');
Uiza\Base::setAuthorization('your-authorization');

try {
    Uiza\Entity::search(['keyword' => 'sample']);
} catch(\Uiza\Exception\ErrorResponse $e) {
    print($e);
}
````

### Publish entity to CDN
Publish entity to CDN, use for streaming.

See details [here](http://dev-ap-southeast-1-api.uizadev.io/docs/#api-Media-post_transcode_standard).

````
require __DIR__."/../vendor/autoload.php";

Uiza\Base::setAppId('your-app-id');
Uiza\Base::setAuthorization('your-authorization');

try {
    Uiza\Entity::publish(['id' => 'key ..']);
} catch(\Uiza\Exception\ErrorResponse $e) {
    print($e);
}
````

### Get Status Publish
Publish entity to CDN, use for streaming.

See details [here](http://dev-ap-southeast-1-api.uizadev.io/docs/#api-Media-get_publish_cdn_status).

````
require __DIR__."/../vendor/autoload.php";

Uiza\Base::setAppId('your-app-id');
Uiza\Base::setAuthorization('your-authorization');

try {
    Uiza\Entity::getStatusPublish('key ...');
} catch(\Uiza\Exception\ErrorResponse $e) {
    print($e);
}
````

### Get AWS Upload Key
This API will be return the bucket temporary upload storage & key for upload, so that you can push your file to Uiza’s storage and get the link for URL upload & create entity.

See details [here](http://dev-ap-southeast-1-api.uizadev.io/docs/#api-App-get_aws_key).

````
require __DIR__."/../vendor/autoload.php";

Uiza\Base::setAppId('your-app-id');
Uiza\Base::setAuthorization('your-authorization');

try {
    Uiza\Entity::getAWSUploadKey();
} catch(\Uiza\Exception\ErrorResponse $e) {
    print($e);
}
````
