## Storage
You can add your storage (FTP, AWS S3) with UIZA.
After synced, you can select your content easier from your storage to [create entity](http://dev-ap-southeast-1-api.uizadev.io/docs/#api-Media-create_entity).

See details [here](http://dev-ap-southeast-1-api.uizadev.io/docs/#api-Media_Storage).

### Add Storage
You can sync your storage (FTP, AWS S3) with UIZA.\
After synced, you can select your content easier from your storage to [create entity](http://dev-ap-southeast-1-api.uizadev.io/docs/#api-Media-create_entity).

See details [here](http://dev-ap-southeast-1-api.uizadev.io/docs/#api-Media_Storage-create_storage).

````
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
````

### Retrieve Storage
Get information of your added storage (FTP or AWS S3).

See details [here](http://dev-ap-southeast-1-api.uizadev.io/docs/#api-Media_Storage-list_storage).

````
Uiza\Storage::retrieve('key ... ');
````

### Update Storage
Update storage's information.

See details [here](http://dev-ap-southeast-1-api.uizadev.io/docs/#api-Media_Storage-update_storage).

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
Remove storage that added to Uiza.

See details [here](http://dev-ap-southeast-1-api.uizadev.io/docs/#api-Media_Storage-delete_storage).

````
Uiza\Storage::remove('key ...');
````
