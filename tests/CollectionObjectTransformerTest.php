<?php

namespace GlobalGames\Component\ObjectTransformer\Tests;

use GlobalGames\Component\ObjectTransformer\CollectionObjectTransformer;
use GlobalGames\Component\ObjectTransformer\Context;
use GlobalGames\Component\ObjectTransformer\ObjectTransformerInterface;
use GlobalGames\Component\ObjectTransformer\ObjectTransformer;
use PHPUnit\Framework\TestCase;

/**
 * @codingStandardsIgnoreStart
 *
 * @author Alexander Matsenko <a.matsenko@globalgames.net>
 */
class CollectionObjectTransformerTest extends TestCase
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

        $collectionObjectTransformer = new CollectionObjectTransformer($this->objectTransformer);

        $this->objectTransformer->addObjectTransformer($collectionObjectTransformer);
    }

    public function testTransform()
    {
        $objects = [
            new ObjectTransformerSourceObject(1),
            new ObjectTransformerSourceObject(2),
        ];

        $payload = 10;

        $transformed = $this
            ->objectTransformer
            ->transform($objects, ObjectTransformerTargetObject::class, new Context($payload));

        self::assertTrue(is_array($transformed));
        self::assertCount(2, $transformed);

        self::assertInstanceOf(ObjectTransformerTargetObject::class, $transformed[0]);
        self::assertInstanceOf(ObjectTransformerTargetObject::class, $transformed[1]);
        self::assertEquals(1, $transformed[0]->pr);
        self::assertEquals(10, $transformed[0]->pl);
        self::assertEquals(2, $transformed[1]->pr);
        self::assertEquals(10, $transformed[1]->pl);
    }
}
