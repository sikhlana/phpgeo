<?php

namespace Location\Formatter\Polygon;

use Location\Exception\InvalidPolygonException;
use Location\Polygon;

class WKT implements FormatterInterface
{
    /**
     * @param Polygon $polygon
     *
     * @return string
     */
    public function format(Polygon $polygon): string
    {
        if ($polygon->getNumberOfPoints() === 0) {
            return 'POLYGON EMPTY';
        }

        if ($polygon->getNumberOfPoints() < 3) {
            throw new InvalidPolygonException('A polygon must consist of at least three points.');
        }

        $points = [];

        foreach ($polygon->getPoints() as $point) {
            $points[] = $point->getLng().' '.$point->getLat();
        }

        return 'POLYGON (('.implode(', ', $points).'))';
    }
}