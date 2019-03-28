## User Management
You can manage user with APIs user.

See details [here](http://dev-ap-southeast-1-api.uizadev.io/docs/#api-User).

### Retrieve an user
Retrieves the details of an existing user.
You need only supply the unique userId that was returned upon user creation.

See details [here](http://dev-ap-southeast-1-api.uizadev.io/docs/#api-User-get_userInfo).

````
require __DIR__."/../vendor/autoload.php";

Uiza\Base::setAppId('your-app-id');
Uiza\Base::setAuthorization('your-authorization');

try {
    Uiza\User::retrieve('id user');
} catch(\Uiza\Exception\ErrorResponse $e) {
    print($e);
}
````

### List all users
Returns a list of your user. The users are returned sorted by creation date, with the most recent user appearing first.
If you use Admin token, you will get all the user.
If you use User token, you can only get the information of that user

See details [here](http://dev-ap-southeast-1-api.uizadev.io/docs/#api-User-get_userInfo).

````
require __DIR__."/../vendor/autoload.php";

Uiza\Base::setAppId('your-app-id');
Uiza\Base::setAuthorization('your-authorization');

try {
    Uiza\User::list(["id" => ""]);
} catch(\Uiza\Exception\ErrorResponse $e) {
    print($e);
}
````

### Update an user
Updates the specified user by setting the values of the parameters passed. Any parameters not provided will be left unchanged.

See details [here](http://dev-ap-southeast-1-api.uizadev.io/docs/#api-User-update_userInfo).

````
require __DIR__."/../vendor/autoload.php";

Uiza\Base::setAppId('your-app-id');
Uiza\Base::setAuthorization('your-authorization');

try {
    $params = [
        "email" => "user_test@gmail.com",
        "status"  => 1,
        "name" => "test",
        "avatar" => "https://exemple.com/avatar.jpeg",
        "dob" => "YYYY-MM-DD"
    ];

    Uiza\User::update('id user', $params);
} catch(\Uiza\Exception\ErrorResponse $e) {
    print($e);
}
````

### Update password
Update password allows Admin or User update their current password.

See details [here](http://dev-ap-southeast-1-api.uizadev.io/docs/#api-User-changePassword).

````
require __DIR__."/../vendor/autoload.php";

Uiza\Base::setAppId('your-app-id');
Uiza\Base::setAuthorization('your-authorization');

try {
    $params = [
        "userId" => "id user",
        "oldPassword" => "FMpsr<4[dGPu?B#u",
        "newPassword" => "S57Eb{:aMZhW=)G$"
    ];

    Uiza\User::changePassword($params);
} catch(\Uiza\Exception\ErrorResponse $e) {
    print($e);
}
````

### Log Out
This API use to log out an user. After logged out, token will be removed.

See details [here](http://dev-ap-southeast-1-api.uizadev.io/docs/#api-User-Logout).

````
require __DIR__."/../vendor/autoload.php";

Uiza\Base::setAppId('your-app-id');
Uiza\Base::setAuthorization('your-authorization');

try {
    Uiza\User::logOut();
} catch(\Uiza\Exception\ErrorResponse $e) {
    print($e);
}
````

