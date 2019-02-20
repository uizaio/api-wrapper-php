## Category
Category has been splits into 3 types: folder, playlist and tag. These will make the management of entity more easier.

See details [here](https://docs.uiza.io/#category).

### Create Category
Create category for entity for easier management.\
Category use to group all the same entities into a group (like Folder/ playlist/or tag).

See details [here](https://docs.uiza.io/#create-category).

````
$params = [
    "name" => "Folder sample",
    "type" => "folder",
    "description" => "Folder description",
];

Uiza\Category::create($params);
````

### Retrieve Category
Get detail of category.

See details [here](https://docs.uiza.io/#retrieve-category).

````
Uiza\Category::retrieve('key ... ');
````

### Retrieve Category List
Get all category.

See details [here](https://docs.uiza.io/#retrieve-category-list).

````
$listCategory = Uiza\Category::all();

// or

$listCategory = Uiza\Category::list();
````

### Update Category
Update information of category

See details [here](https://docs.uiza.io/#update-category).

````
$params = [
    "name" => "Folder edited",
    "type" => "folder",
];

Uiza\Category::update('key ..', $params);

````

### Delete Category
Delete category

See details [here](https://docs.uiza.io/#delete-category).

````
$category = Uiza\Category::retrieve('key ... ');
$category->destroy();

// or

Uiza\Category::delete('key ...');
````

### Create Category Relation
Add relation for entity and category

See details [here](https://docs.uiza.io/#create-category-relation).

````
$params = [
    "entityId" => "16ab25d3-fd0f-4568-8aa0-0339bbfd674f",
    "metadataIds" => ["095778fa-7e42-45cc-8a0e-6118e540b61d","e00586b9-032a-46a3-af71-d275f01b03cf"]
];

Uiza\Category::createRelation($params);
````

### Delete Category Relation
Delete relation for entity and category

See details [here](https://docs.uiza.io/#delete-category-relation).

````
$params = [
    "entityId" => "16ab25d3-fd0f-4568-8aa0-0339bbfd674f",
    "metadataIds" => ["095778fa-7e42-45cc-8a0e-6118e540b61d","e00586b9-032a-46a3-af71-d275f01b03cf"]
];

Uiza\Category::deleteRelation($params);
````
