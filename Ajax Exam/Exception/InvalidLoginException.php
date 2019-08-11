<?php

/**
 * InvalidLoginException short summary.
 *
 * InvalidLoginException description.
 *
 * @version 1.0
 * @author Long charmroeun
 */
class InvalidLoginException extends Exception
{

    #region Exception Members

    /**
     * Construct the exception
     * Constructs the Exception.
     *
     * @param string $message The Exception message to throw.
     * @param int $code The Exception code.
     * @param Throwable $previous The previous exception used for the exception chaining.
     */
    function __construct()
    {
        parent::__construct("Invalid User Login!", 0, null);
    }

    /**
     * String representation of the exception
     * Returns the string representation of the exception.
     *
     * @return string
     */
    function __toString()
    {
        return parent::__toString();
    }

    #endregion
}