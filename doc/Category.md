## Category
Category has been splits into 4 types: folder, playlist, tag and category. These will make the management of entity more easier.

See details [here](http://dev-ap-southeast-1-api.uizadev.io/docs/#api-Media_Metadata).

### Create Category
Create category for entity for easier management.\
Category use to group all the same entities into a group (like Folder/playlist/category or tag).

See details [here](http://dev-ap-southeast-1-api.uizadev.io/docs/#api-Media_Metadata-create_metadata).

````
require __DIR__."/../vendor/autoload.php";

Uiza\Base::setAppId('your-app-id');
Uiza\Base::setAuthorization('your-authorization');

try {
    $params = [
        "name" => "Folder sample",
        "type" => "folder",
        "description" => "Folder description",
    ];

    Uiza\Category::create($params);
} catch(\Uiza\Exception\ErrorResponse $e) {
    print($e);
}
````

### Retrieve Category
Get detail of category.

See details [here](http://dev-ap-southeast-1-api.uizadev.io/docs/#api-Media_Metadata-get_metadata).

````
require __DIR__."/../vendor/autoload.php";

Uiza\Base::setAppId('your-app-id');
Uiza\Base::setAuthorization('your-authorization');

try {
    Uiza\Category::retrieve('key ... ');
} catch(\Uiza\Exception\ErrorResponse $e) {
    print($e);
}
````

### Retrieve Category List
Get all category.

See details [here](http://dev-ap-southeast-1-api.uizadev.io/docs/#api-Media_Metadata-get_metadata).

````
require __DIR__."/../vendor/autoload.php";

Uiza\Base::setAppId('your-app-id');
Uiza\Base::setAuthorization('your-authorization');

try {
    Uiza\Category::all();

    // or

    Uiza\Category::list();
} catch(\Uiza\Exception\ErrorResponse $e) {
    print($e);
}
````

### Update Category
Update information of category

See details [here](http://dev-ap-southeast-1-api.uizadev.io/docs/#api-Media_Metadata-update_metadata).

````
require __DIR__."/../vendor/autoload.php";

Uiza\Base::setAppId('your-app-id');
Uiza\Base::setAuthorization('your-authorization');

try {
    $params = [
        "name" => "Folder edited",
        "type" => "folder",
    ];

    Uiza\Category::update('key ..', $params);
} catch(\Uiza\Exception\ErrorResponse $e) {
    print($e);
}
````

### Delete Category
Delete category

See details [here](http://dev-ap-southeast-1-api.uizadev.io/docs/#api-Media_Metadata-delete_metadata).

````
require __DIR__."/../vendor/autoload.php";

Uiza\Base::setAppId('your-app-id');
Uiza\Base::setAuthorization('your-authorization');

try {
    $category = Uiza\Category::retrieve('key ... ');
    $category->destroy();

    // or

    Uiza\Category::delete('key ...');
} catch(\Uiza\Exception\ErrorResponse $e) {
    print($e);
}
````

### Create Category Relation
Add relation for entity and category

See details [here](http://dev-ap-southeast-1-api.uizadev.io/docs/#api-Media_Metadata-create_n_metadata_for_one_entiy)).

````
require __DIR__."/../vendor/autoload.php";

Uiza\Base::setAppId('your-app-id');
Uiza\Base::setAuthorization('your-authorization');

try {
    $params = [
        "entityId" => "16ab25d3-fd0f-4568-8aa0-0339bbfd674f",
        "metadataIds" => ["095778fa-7e42-45cc-8a0e-6118e540b61d","e00586b9-032a-46a3-af71-d275f01b03cf"]
    ];

    Uiza\Category::createRelation($params);
} catch(\Uiza\Exception\ErrorResponse $e) {
    print($e);
}
````

### Delete Category Relation
Delete relation for entity and category

See details [here](http://dev-ap-southeast-1-api.uizadev.io/docs/#api-Media_Metadata-delete_n_metadata_for_one_entiy).

````
require __DIR__."/../vendor/autoload.php";

Uiza\Base::setAppId('your-app-id');
Uiza\Base::setAuthorization('your-authorization');

try {
    $params = [
        "entityId" => "16ab25d3-fd0f-4568-8aa0-0339bbfd674f",
        "metadataIds" => ["095778fa-7e42-45cc-8a0e-6118e540b61d","e00586b9-032a-46a3-af71-d275f01b03cf"]
    ];

    Uiza\Category::deleteRelation($params);
} catch(\Uiza\Exception\ErrorResponse $e) {
    print($e);
}
````
