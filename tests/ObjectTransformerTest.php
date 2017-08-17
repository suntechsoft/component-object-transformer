<?php

namespace GlobalGames\Component\ObjectTransformer\Tests;

use GlobalGames\Component\ObjectTransformer\Context;
use GlobalGames\Component\ObjectTransformer\ObjectTransformerInterface;
use GlobalGames\Component\ObjectTransformer\Exception\UnsupportedTransformationException;
use GlobalGames\Component\ObjectTransformer\ObjectTransformer;
use PHPUnit\Framework\TestCase;

/**
 * @codingStandardsIgnoreStart
 *
 * @author Alexander Matsenko <a.matsenko@globalgames.net>
 */
class ObjectTransformerTest extends TestCase
{
    /**
     * @var ObjectTransformerInterface
     */
    private $objectTransformer;

    protected function setUp()
    {
        parent::setUp();

        $this->objectTransformer = new ObjectTransformer();
        $this->objectTransformer->addObjectTransformer(new SourceToTargetObjectTransformer());
    }

    public function testTransform()
    {
        $object = new ObjectTransformerSourceObject(1);
        $payload = 10;

        $transformed = $this->objectTransformer->transform($object, ObjectTransformerTargetObject::class, new Context($payload));

        self::assertInstanceOf(ObjectTransformerTargetObject::class, $transformed);
        self::assertEquals(1, $transformed->pr);
        self::assertEquals(10, $transformed->pl);
    }

    public function testTransformWithException()
    {
        $this->expectException(UnsupportedTransformationException::class);

        $object = new ObjectTransformerSourceObject(1);

        $this->objectTransformer->transform($object, ObjectTransformerTargetObject2::class);
    }
}

class ObjectTransformerTargetObject2
{
}
