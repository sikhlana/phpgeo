<?php

namespace Location\Formatter\Coordinate;

use Location\Coordinate;

class WKT implements FormatterInterface
{
    /**
     * @param Coordinate $coordinate
     *
     * @return string
     */
    public function format(Coordinate $coordinate): string
    {
        return 'POINT ('.$coordinate->getLng().' '.$coordinate->getLat().')';
    }
}