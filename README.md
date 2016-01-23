PHPGPX is an easy to use GPX Parser written in PHP.

## Example Usage

    $GPXParser = new GPXParser();

    $gpx = GPXParser->parseXML($xml);

    foreach ($gpx->getTracks() as $track) {
        foreach ($track->getTrackSegments() as $trackSegment) {
            foreach ($trackSegment->getTrackPoints() as $waypoint) {
                echo 'Lat: ' . $waypoint->getLatitude() . ', Lon:' . $waypoint->getLongitude();
            }
        }
    }

The above example will list the latitude and longitude of all the waypoints in all of the tracks.