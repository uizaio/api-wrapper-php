## Entity
These below APIs used to take action with your media files (we called Entity).

See details [here](https://docs.uiza.io/#video).

### Create entity.
Create entity using full URL. Direct HTTP, FTP or AWS S3 link are acceptable.

See details [here](https://docs.uiza.io/#create-entity).

````
require __DIR__."/../vendor/autoload.php";

Uiza\Base::setWorkspaceApiDomain("your-workspace-api-domain.uiza.co");
Uiza\Base::setAuthorization("your-authorization");

try {
    $params = [
        "name" => "Sample Video",
        "url" => "https://example.com/video.mp4",
        "inputType" => "http",
        "description" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry",
        "shortDescription" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry",
        "poster" => "https://example.com/picture001.jpeg",
        "thumbnail" => "https://example.com/picture002.jpeg",
        "extendMetadata" => [
            "movie_category" => "action",
            "imdb_score" => 8.8,
            "published_year" => "2018"
        ],
        "embedMetadata" => [
            "artist" => "John Doe",
            "album" => "Album sample",
            "genre" => "Pop"
        ],
        "metadataIds" => ["16a9e425-efb0-4360-bd92-8d49da111e88"]
    ];

    Uiza\Entity::create($params);
} catch(\Uiza\Exception\ErrorResponse $e) {
    print($e);
}
````

### Retrieve entity
Get detail of entity including all information of entity.

See details [here](https://docs.uiza.io/#retrieve-an-entity).

````
require __DIR__."/../vendor/autoload.php";

Uiza\Base::setWorkspaceApiDomain("your-workspace-api-domain.uiza.co");
Uiza\Base::setAuthorization("your-authorization");

try {
    Uiza\Entity::retrieve('key ... ');
} catch(\Uiza\Exception\ErrorResponse $e) {
    print($e);
}
````

### List all entities.
Get list of entities including all detail.

See details [here](https://docs.uiza.io/#list-all-entities).

````
require __DIR__."/../vendor/autoload.php";

Uiza\Base::setWorkspaceApiDomain("your-workspace-api-domain.uiza.co");
Uiza\Base::setAuthorization("your-authorization");

try {
    Uiza\Entity::all(['publishToCdn' => 'queue']);

    // or

    Uiza\Entity::list(['publishToCdn' => 'queue']);
} catch(\Uiza\Exception\ErrorResponse $e) {
    print($e);
}
````

### Update entity.
Update entity's information.

See details [here](https://docs.uiza.io/#update-an-entity).

````
require __DIR__."/../vendor/autoload.php";

Uiza\Base::setWorkspaceApiDomain("your-workspace-api-domain.uiza.co");
Uiza\Base::setAuthorization("your-authorization");

try {
    $entity = Uiza\Entity::retrieve('key ... ');
    $entity->name = "Name change";
    $entity->description = "Description";
    $entity->save();

    // or

    $params = [
        "name" => "Title edited",
        "description" => "Description edited",
        "shortDescription" => "001 Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
        "poster" => "/example.com/picture001a",
        "thumbnail" => "/example.com/picture001a",
        "extendMetadata"  => [
            "movie_category" => "action",
            "imdb_score" => 8.8,
            "published_year" => "2018"
        ]
    ];

    Uiza\Entity::update('key ..', $params);
} catch(\Uiza\Exception\ErrorResponse $e) {
    print($e);
}
````

### Delete entity
Delete entity.

See details [here](https://docs.uiza.io/#delete-an-entity).

````
require __DIR__."/../vendor/autoload.php";

Uiza\Base::setWorkspaceApiDomain("your-workspace-api-domain.uiza.co");
Uiza\Base::setAuthorization("your-authorization");

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

See details [here](https://docs.uiza.io/#search-entity).

````
require __DIR__."/../vendor/autoload.php";

Uiza\Base::setWorkspaceApiDomain("your-workspace-api-domain.uiza.co");
Uiza\Base::setAuthorization("your-authorization");

try {
    Uiza\Entity::search(['keyword' => 'sample']);
} catch(\Uiza\Exception\ErrorResponse $e) {
    print($e);
}
````

### Publish entity to CDN
Publish entity to CDN, use for streaming.

See details [here](https://docs.uiza.io/#publish-entity-to-cdn).

````
require __DIR__."/../vendor/autoload.php";

Uiza\Base::setWorkspaceApiDomain("your-workspace-api-domain.uiza.co");
Uiza\Base::setAuthorization("your-authorization");

try {
    Uiza\Entity::publish(['id' => 'key ..']);
} catch(\Uiza\Exception\ErrorResponse $e) {
    print($e);
}
````

### Get Status Publish
Publish entity to CDN, use for streaming.

See details [here](https://docs.uiza.io/#get-status-publish).
````
require __DIR__."/../vendor/autoload.php";

Uiza\Base::setWorkspaceApiDomain("your-workspace-api-domain.uiza.co");
Uiza\Base::setAuthorization("your-authorization");

try {
    Uiza\Entity::getStatusPublish('key ...');
} catch(\Uiza\Exception\ErrorResponse $e) {
    print($e);
}
````

### Get AWS Upload Key
This API will be return the bucket temporary upload storage & key for upload, so that you can push your file to Uiza’s storage and get the link for URL upload & create entity.

See details [here](https://docs.uiza.io/#get-aws-upload-key).

````
require __DIR__."/../vendor/autoload.php";

Uiza\Base::setWorkspaceApiDomain("your-workspace-api-domain.uiza.co");
Uiza\Base::setAuthorization("your-authorization");

try {
    Uiza\Entity::getAWSUploadKey();
} catch(\Uiza\Exception\ErrorResponse $e) {
    print($e);
}
````
