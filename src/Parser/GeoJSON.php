<?php

namespace Location\Parser;

use Location\Coordinate;
use Location\Exception\InvalidGeometryException;
use Location\GeometryInterface;
use Location\Polygon;
use Location\Polyline;

class GeoJSON implements ParserInterface
{
    /**
     * @param string|array $json
     *
     * @return GeometryInterface
     */
    public function parse($json): GeometryInterface
    {
        if (is_string($json)) {
            $json = json_decode($json, true);
        } else if (is_object($json)) {
            $json = json_decode(json_encode($json), true);
        }

        switch ($json['type']) {
            default:
                throw new InvalidGeometryException(sprintf(
                    'The geometry type `%s` is not yet supported.', $json['type']
                ));

            case 'Point':
                return new Coordinate($json['coordinates'][1], $json['coordinates'][0]);

            case 'Polygon':
                $points = [];

                foreach ($json['coordinates'][0] as $point) {
                    $points[] = new Coordinate($point[1], $point[0]);
                }

                return new Polygon($points);

            case 'Polyline':
                $points = [];

                foreach ($json['coordinates'] as $point) {
                    $points[] = new Coordinate($point[1], $point[0]);
                }

                return new Polyline($points);
        }
    }
}