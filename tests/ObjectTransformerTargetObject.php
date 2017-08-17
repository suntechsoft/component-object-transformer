<?php

namespace GlobalGames\Component\ObjectTransformer\Tests;

/**
 * This class is only for testing needs.
 *
 * @author Alexander Matsenko <a.matsenko@globalgames.net>
 */
class ObjectTransformerTargetObject
{
    /**
     * @var int
     */
    public $pr;

    /**
     * @var int
     */
    public $pl;

    /**
     * @param int $pr
     * @param int $pl
     */
    public function __construct($pr, $pl)
    {
        $this->pr = $pr;
        $this->pl = $pl;
    }
}
