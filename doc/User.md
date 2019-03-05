## User Management
You can manage user with APIs user. Uiza have 2 levels of user:
  Admin - This account will have the highest priority, can have permission to create & manage users.
  User - This account level is under Admin level. It only manages APIs that relates to this account.

See details [here](https://docs.uiza.io/#user-management).

### Create an user
Create an user account for workspace

See details [here](https://docs.uiza.io/#create-an-user).

````
$params = [
    "status"  => 1,
    "username" => "test",
    "email" => "abc_test@uiza.io",
    "fullname" => "Test",
    "avatar" => "https://exemple.com/avatar.jpeg",
    "dob" => "05/15/2018",
    "gender" => 0,
    "password" => "FMpsr<4[dGPu?B#u",
    "isAdmin" => 1
];

Uiza\User::create($params);
````

### Retrieve an user
Retrieves the details of an existing user.
You need only supply the unique userId that was returned upon user creation.

See details [here](https://docs.uiza.io/#retrieve-an-user).

````
Uiza\User::retrieve('id user');
````

### List all users
Returns a list of your user. The users are returned sorted by creation date, with the most recent user appearing first.
If you use Admin token, you will get all the user.
If you use User token, you can only get the information of that user

See details [here](https://docs.uiza.io/#list-all-users).

````
Uiza\User::list();
````

### Update an user
Updates the specified user by setting the values of the parameters passed. Any parameters not provided will be left unchanged.

See details [here](https://docs.uiza.io/#update-an-user).

````
$params = [
    "status"  => 1,
    "username" => "test",
    "email" => "abc_test@uiza.io",
    "fullname" => "Test",
    "avatar" => "https://exemple.com/avatar.jpeg",
    "dob" => "05/15/2018",
    "gender" => 0,
    "password" => "FMpsr<4[dGPu?B#u",
    "isAdmin" => 1
];

Uiza\User::update('id user', $params);
````

### Delete an user
Permanently deletes an user. It cannot be undone. Also immediately cancels all token & information of this user.

See details [here](https://docs.uiza.io/#delete-an-user).

````
Uiza\User::delete('id user');
````

### Update password
Update password allows Admin or User update their current password.

See details [here](https://docs.uiza.io/#update-password).

````
$params = [
    "id" => "id user",
    "oldPassword" => "FMpsr<4[dGPu?B#u",
    "newPassword" => "S57Eb{:aMZhW=)G$"
];

Uiza\User::changePassword($params);
````

### Log Out
This API use to log out an user. After logged out, token will be removed.

See details [here](https://docs.uiza.io/#log-out).

````
Uiza\User::logOut();
````
