<?php

namespace GlobalGames\Component\ObjectTransformer\Tests;

/**
 * This class is only for testing needs.
 *
 * @author Alexander Matsenko <a.matsenko@globalgames.net>
 */
class ObjectTransformerSourceObject
{
    /**
     * @var int
     */
    public $pr;

    /**
     * @param int $pr
     */
    public function __construct($pr)
    {
        $this->pr = $pr;
    }
}
