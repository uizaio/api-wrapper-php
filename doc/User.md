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
