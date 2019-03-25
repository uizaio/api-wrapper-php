## Storage
You can add your storage (FTP, AWS S3) with UIZA.
After synced, you can select your content easier from your storage to create entity.

See details [here](https://docs.uiza.io/#storage).

### Add Storage
You can sync your storage (FTP, AWS S3) with UIZA.\
After synced, you can select your content easier from your storage to create entity.

See details [here](https://docs.uiza.io/#add-a-storage).

````
require __DIR__."/../vendor/autoload.php";

Uiza\Base::setWorkspaceApiDomain("your-workspace-api-domain.uiza.co");
Uiza\Base::setAuthorization("your-authorization");

try {
    $params = [
        "name" => "FTP Uiza",
        "description" => "FTP of Uiza, use for transcode",
        "storageType" => "ftp",
        "host" => "ftp-example.uiza.io",
        "username" => "uiza",
        "password" => "=59x@LPsd+w7qW",
        "port" => 21
    ];

    Uiza\Storage::add($params);
} catch(\Uiza\Exception\ErrorResponse $e) {
    print($e);
}
````

### Retrieve Storage
Get information of your added storage (FTP or AWS S3).

See details [here](https://docs.uiza.io/#retrieve-a-storage).

````
require __DIR__."/../vendor/autoload.php";

Uiza\Base::setWorkspaceApiDomain("your-workspace-api-domain.uiza.co");
Uiza\Base::setAuthorization("your-authorization");

try {
    Uiza\Storage::retrieve('key ... ');
} catch(\Uiza\Exception\ErrorResponse $e) {
    print($e);
}
````

### Update Storage
Update storage's information.

See details [here](https://docs.uiza.io/#update-storage).

````
require __DIR__."/../vendor/autoload.php";

Uiza\Base::setWorkspaceApiDomain("your-workspace-api-domain.uiza.co");
Uiza\Base::setAuthorization("your-authorization");

try {
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
} catch(\Uiza\Exception\ErrorResponse $e) {
    print($e);
}
````

### Remove Storage
Remove storage that added to Uiza.

See details [here](https://docs.uiza.io/#remove-storage).

````
require __DIR__."/../vendor/autoload.php";

Uiza\Base::setWorkspaceApiDomain("your-workspace-api-domain.uiza.co");
Uiza\Base::setAuthorization("your-authorization");

try {
    Uiza\Storage::remove('key ...');
} catch(\Uiza\Exception\ErrorResponse $e) {
    print($e);
}
````
