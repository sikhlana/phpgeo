<?php

namespace Location\Parser;

use Location\GeometryInterface;

/**
 * Geometry Parser Interface
 *
 * @author Saif M. <xoxo@saifmahmud.name>
 */
interface ParserInterface
{
    /**
     * @param  string|array $str
     *
     * @return GeometryInterface
     */
    public function parse($str): GeometryInterface;
}