# Uiza
----
## Introduction
This is documents the public API for Uiza version 3.0.
The Uiza API is organized around RESTful standard.
Our API has predictable, resource-oriented URLs, and uses HTTP response codes to indicate API errors.
JSON is returned by all API responses, including errors, although our API libraries convert responses to appropriate language-specific objects.

----
## Requirements
PHP 5.3.0 and later.

----
## Installation
You can install the bindings via Composer. Run the following command:

````
composer require uiza/uiza-php
````

----
## Authentication
In order, to use the Uiza, you should follow these steps:

* **Step 1:** Having an active Uiza account. (If you don't have, please get [here](https://id.uiza.io/))
* **Step 2:** Once you have an Uiza account, you can get a Token to call the APIs.

This Token will have right & permission related with your account.

## Usage
The library needs to be configured with your account's `workspace_api_domain` and `authorization` (API key).\

See details [here](https://docs.uiza.io/#authentication).

## Getting Started

### Require library.

````
require __DIR__."/../vendor/autoload.php";
````

### Setup for your project

````
Uiza\Base::setWorkspaceApiDomain('your-workspace-api-domain');
Uiza\Base::setApiKey('your-api-key');
````

## Entity
These below APIs used to take action with your media files (we called Entity).

See details [here](https://github.com/uizaio/api-wrapper-php/blob/develop/doc/Entity.md).

## Category
Category has been splits into 3 types: `folder`, `playlist` and `tag`. These will make the management of entity more easier.

See details [here](https://github.com/uizaio/api-wrapper-php/blob/develop/doc/Category.md).

## Storage
You can add your storage (`FTP`, `AWS S3`) with UIZA.
After synced, you can select your content easier from your storage to [create entity](https://docs.uiza.io/#create-entity).

See details [here](https://github.com/uizaio/api-wrapper-php/blob/develop/doc/Storage.md).

## Live Streaming
These APIs used to create and manage live streaming event.
* When a Live is not start : it's named as `Event`.
* When have an Event , you can start it : it's named as `Feed`.

See details [here](https://github.com/uizaio/api-wrapper-php/blob/develop/doc/Live.md).

## Callback

Callback used to retrieve an information for Uiza to your server, so you can have a trigger notice about an entity is upload completed and .

See details [here](https://github.com/uizaio/api-wrapper-php/blob/develop/doc/Callback.md).

## Analytic
Monitor the four key dimensions of video QoS: playback failures, startup time, rebuffering, and video quality.
These 15 metrics help you track playback performance, so your team can know exactly what’s going on.

See details [here](https://github.com/uizaio/api-wrapper-php/blob/develop/doc/Analytic.md).

## User Management
You can manage user with APIs user. Uiza have 2 levels of user:
  Admin - This account will have the highest priority, can have permission to create & manage users.
  User - This account level is under Admin level. It only manages APIs that relates to this account.

See details [here](https://github.com/uizaio/api-wrapper-php/blob/develop/doc/User.md).
