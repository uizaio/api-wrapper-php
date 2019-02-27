## Live Streaming
These APIs used to create and manage live streaming event.
* When a Live is not start : it's named as `Event`.
* When have an Event , you can start it : it's named as `Feed`.

See details [here](https://docs.uiza.io/#live-streaming).

### Create a live event

These APIs use to create a live streaming and manage the live streaming input (output). A live stream can be set up and start later or start right after set up. Live Channel Minutes counts when the event starts.

See details [here](https://docs.uiza.io/#create-a-live-event).

````
$params = [
    "name" => "test event",
    "mode" => "push",
    "encode" => 1,
    "dvr" => 1,
    "description" => "This is for test event",
    "poster" => "//image1.jpeg",
    "thumbnail" => "//image1.jpeg",
    "linkStream" => [
              "https://playlist.m3u8"
            ],
    "resourceMode" => "single"
];

Uiza\Live::create($params);
````

### Retrieve a live event

Retrieves the details of an existing event. You need only provide the unique identifier of event that was returned upon Live event creation.

See details [here](https://docs.uiza.io/#retrieve-a-live-event).

````
Uiza\Live::retrieve('key ... ');
````

### Update a live event

Update the specific Live event by edit values of parameters.

See details [here](https://docs.uiza.io/#update-a-live-event).

````
$params = [
    "name" => "live test",
    "mode" => "pull",
    "encode" => 0,
    "dvr" => 1,
    "resourceMode" => "single"
];
Uiza\Live::update('key ..', $params);
````

### Start a live feed

These API use to start a live event that has been create success. The Live channel minute start count whenever the event start success

See details [here](https://docs.uiza.io/#start-a-live-feed).

````
Uiza\Live::startFeed(['id' => 'your entityId...'])
````

### Get view of live feed

This API use to get a live view status . This view only show when event has been started and being processing.

See details [here](https://docs.uiza.io/#get-view-of-live-feed).

````
Uiza\Live::getView(['id' => 'your entityId...'])
````

### Stop a live feed

Stop live event

See details [here](https://docs.uiza.io/#stop-a-live-feed).

````
Uiza\Live::stopFeed(['id' => 'your entityId...'])
````

### List all recorded files

Retrieves list of recorded file after streamed (only available when your live event has turned on Record feature)

See details [here](https://docs.uiza.io/#list-all-recorded-files).

````
Uiza\Live::listRecorded();
````

### Delete a record file

Delete a recorded file

See details [here](https://docs.uiza.io/#delete-a-record-file).

````
Uiza\Storage::delete('id record ...');
````

### Convert into VOD

Convert recorded file into VOD entity. After converted, your file can be stream via Uiza's CDN.

See details [here](https://docs.uiza.io/#convert-into-vod).

````
Uiza\Live::convertToVOD(['id' => 'your entityId...'])
````
