<?php

declare(strict_types = 1);

namespace GlobalGames\Component\ObjectTransformer;

/**
 * Represents basic object transformation context.
 */
class Context implements ContextInterface
{
    /**
     * @var mixed|null
     */
    private $payload;

    /**
     * @param mixed|null $payload
     */
    public function __construct($payload = null)
    {
        $this->payload = $payload;
    }

    /**
     * {@inheritdoc}
     */
    public function getPayload()
    {
        return $this->payload;
    }
}
