<?php

declare(strict_types = 1);

namespace GlobalGames\Component\ObjectTransformer;

/**
 * Responsible for object transformation with context.
 *
 * @author Alexander Matsenko <a.matsenko@globalgames.net>
 */
interface ObjectTransformerInterface
{
    /**
     * Does transformer support transformation to target class?
     *
     * @param object|array|\Traversable $object
     * @param string                    $targetClass
     * @param ContextInterface|null     $context
     *
     * @return bool
     */
    public function supports($object, $targetClass, ContextInterface $context = null): bool;

    /**
     * Transforms object to supported class with specified context.
     *
     * @param object|array|\Traversable $object
     * @param string                    $targetClass
     * @param ContextInterface|null     $context
     *
     * @return array|object|\object[]
     */
    public function transform($object, $targetClass, ContextInterface $context = null);
}
