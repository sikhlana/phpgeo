<?php

namespace Location\Formatter\Polyline;

use Location\Polyline;

class WKT implements FormatterInterface
{
    /**
     * @param Polyline $polyline
     *
     * @return string
     */
    public function format(Polyline $polyline): string
    {
        if ($polyline->getNumberOfPoints() === 0) {
            return 'LINESTRING EMPTY';
        }

        $points = [];

        foreach ($polyline->getPoints() as $point) {
            $points[] = $point->getLng().' '.$point->getLat();
        }

        return 'LINESTIRNG ('.implode(', ', $points).')';
    }
}