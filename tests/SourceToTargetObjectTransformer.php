<?php

namespace GlobalGames\Component\ObjectTransformer\Tests;

use GlobalGames\Component\ObjectTransformer\ContextInterface;
use GlobalGames\Component\ObjectTransformer\ObjectTransformerInterface;

/**
 * @codingStandardsIgnoreStart
 *
 * This class is only for testing needs.
 *
 * @author Alexander Matsenko <a.matsenko@globalgames.net>
 */
class SourceToTargetObjectTransformer implements ObjectTransformerInterface
{
    public function supports($object, $targetClass, ContextInterface $context = null): bool
    {
        return
            $object instanceof ObjectTransformerSourceObject
                && is_a($targetClass, ObjectTransformerTargetObject::class, true);
    }

    /**
     * {@inheritdoc}
     *
     * @param ObjectTransformerSourceObject $object
     */
    public function transform($object, $targetClass, ContextInterface $context = null)
    {
        return new ObjectTransformerTargetObject($object->pr, $context->getPayload());
    }
}
