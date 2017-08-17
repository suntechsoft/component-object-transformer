<?php

declare(strict_types = 1);

namespace GlobalGames\Component\ObjectTransformer;

use GlobalGames\Component\ObjectTransformer\Exception\UnsupportedTransformationException;

/**
 * Handles transformation of collection of objects.
 *
 * @author Alexander Matsenko <a.matsenko@globalgames.net>
 */
class CollectionObjectTransformer implements ObjectTransformerInterface
{
    /**
     * @var ObjectTransformerInterface
     */
    private $objectTransformer;

    /**
     * @param ObjectTransformerInterface $objectTransformer
     */
    public function __construct(ObjectTransformerInterface $objectTransformer)
    {
        $this->objectTransformer = $objectTransformer;
    }

    /**
     * {@inheritdoc}
     */
    public function supports($object, $targetClass, ContextInterface $context = null): bool
    {
        if (is_array($object) || $object instanceof \Traversable) {
            foreach ($object as $element) {
                if (!$this->objectTransformer->supports($element, $targetClass, $context)) {
                    return false;
                }
            }

            return true;
        }

        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function transform($object, $targetClass, ContextInterface $context = null)
    {
        if (count($object) === 0) {
            return [];
        }

        if (!$this->supports($object, $targetClass, $context)) {
            $objectType = is_object($object) ? get_class($object) : gettype($object);

            throw new UnsupportedTransformationException($objectType, $targetClass);
        }

        $elements = [];

        foreach ($object as $element) {
            $elements[] = $this->objectTransformer->transform($element, $targetClass, $context);
        }

        return $elements;
    }
}
