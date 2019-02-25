## Callback

Callback used to retrieve an information for Uiza to your server, so you can have a trigger notice about an entity is upload completed and .

See details [here](https://docs.uiza.io/#callback).

### Create a callback

This API will allow you setup a callback to your server when an entity is completed for upload or public

See details [here](https://docs.uiza.io/#create-a-callback).

````
$params = [
    "url" => "https://callback-url.uiza.co",
    "method" => "POST"
];
Uiza\Callback::create($params);
````

### Retrieve a callback

Retrieves the details of an existing callback.

See details [here](https://docs.uiza.io/#retrieve-a-callback).

````
Uiza\Callback::retrieve('id callback');
````

### Update a callback

This API will allow you setup a callback to your server when an entity is completed for upload or public

See details [here](https://docs.uiza.io/#update-a-callback).

````
$params = [
    "url" => "https://callback-url.uiza.co",
    "method" => "POST"
];
Uiza\Callback::update('id callback', $params);
````

### Delete a callback

Delete an existing callback.

See details [here](https://docs.uiza.io/#delete-a-callback).

````
Uiza\Callback::delete('id callback');
````
