<?php

namespace CascadeEnergy\Exceptions;

/**
 * A custom exception class which provides a context argument for later reference.
 */
class ExceptionWithContext extends \Exception
{
    /** @var mixed The context of the exception */
    private $context;

    /**
     * @param string $message The message for the exception
     * @param mixed|null $context The context of the exception (it is recommended that this be an object or hash)
     * @param int $code The exception code
     * @param \Exception|null $previous The previous exception, if any
     */
    public function __construct($message, $context = null, $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->context = $context;
    }

    /**
     * Returns the context of the exception.
     *
     * @return mixed|null
     */
    public function getContext()
    {
        return $this->context;
    }
}
