## Analytic
Monitor the four key dimensions of video QoS: playback failures, startup time, rebuffering, and video quality.
These 15 metrics help you track playback performance, so your team can know exactly what’s going on.

See details [here](https://docs.uiza.io/#analytic).

### Total Line
Get data grouped by hour (data refresh every 5 minutes). Track video playback on any metric performance, so you can know exactly what’s happening on every user’s device and debug more effectively.

See details [here](https://docs.uiza.io/#total-line).

````
require __DIR__."/../vendor/autoload.php";

Uiza\Base::setWorkspaceApiDomain("your-workspace-api-domain.uiza.co");
Uiza\Base::setAuthorization("your-authorization");

try {
    $params = [
        'start_date' => 'YYYY-MM-DD hh:mm',
        'end_date' => 'YYYY-MM-DD hh:mm',
        'metric' => 'rebuffer_count'
    ];

    Uiza\Analytic::getTotalLine($params);
} catch(\Uiza\Exception\ErrorResponse $e) {
    print($e);
}
````

### Type
Get data base on 4 type of filter: country, device, title, player, os

See details [here](https://docs.uiza.io/#type).

````
require __DIR__."/../vendor/autoload.php";

Uiza\Base::setWorkspaceApiDomain("your-workspace-api-domain.uiza.co");
Uiza\Base::setAuthorization("your-authorization");

try {
    $params = [
        'start_date' => 'YYYY-MM-DD',
        'end_date' => 'YYYY-MM-DD',
        'type_filter' => 'country'
    ];

    Uiza\Analytic::getType($params);
} catch(\Uiza\Exception\ErrorResponse $e) {
    print($e);
}
````

## Line
Get data grouped by hour. Get total view in time range. This help you to draw a line chart to visualize data

See details [here](https://docs.uiza.io/#line).

````
require __DIR__."/../vendor/autoload.php";

Uiza\Base::setWorkspaceApiDomain("your-workspace-api-domain.uiza.co");
Uiza\Base::setAuthorization("your-authorization");

try {
    $params = [
        'start_date' => 'YYYY-MM-DD',
        'end_date' => 'YYYY-MM-DD',
        'type' => 'rebuffer_count'
    ];

    Uiza\Analytic::getLine($params);
} catch(\Uiza\Exception\ErrorResponse $e) {
    print($e);
}
````
