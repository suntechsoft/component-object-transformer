<?php

declare(strict_types = 1);

namespace GlobalGames\Component\ObjectTransformer\Exception;

/**
 * Usually happens when transformer can not transform object.
 *
 * @author Alexander Matsenko <a.matsenko@globalgames.net>
 */
class UnsupportedTransformationException extends \Exception
{
    /**
     * @var string
     */
    private $objectType;

    /**
     * @var string
     */
    private $targetClass;

    /**
     * @param string $objectType
     * @param string $targetClass
     */
    public function __construct(string $objectType, string $targetClass)
    {
        $this->objectType = $objectType;
        $this->targetClass = $targetClass;

        parent::__construct(sprintf(
            'Can not transform object of type "%s" to object of type "%s"',
            $objectType,
            $targetClass
        ));
    }

    /**
     * @return string
     */
    public function getObjectType(): string
    {
        return $this->objectType;
    }

    /**
     * @return string
     */
    public function getTargetClass(): string
    {
        return $this->targetClass;
    }
}
