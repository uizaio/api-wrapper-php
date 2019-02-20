## Storage
You can add your storage (FTP, AWS S3) with UIZA.
After synced, you can select your content easier from your storage to create entity.

See details [here](https://docs.uiza.io/#storage).

### Add Storage
You can sync your storage (FTP, AWS S3) with UIZA.\
After synced, you can select your content easier from your storage to create entity.

See details [here](https://docs.uiza.io/#add-a-storage).

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
Get information of your added storage (FTP or AWS S3).

See details [here](https://docs.uiza.io/#retrieve-a-storage).

````
Uiza\Storage::retrieve('key ... ');
````

### Update Storage
Update storage's information.

See details [here](https://docs.uiza.io/#update-storage).

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

See details [here](https://docs.uiza.io/#remove-storage).

````
$category = Uiza\Storage::retrieve('key ... ');
$category->destroy();

// or

Uiza\Storage::delete('key ...');
````
