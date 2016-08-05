<?php

namespace KamranAhmed\Faulty\Exceptions;

use Exception;

/**
 * Class BaseException
 *
 * Abstract Exception class that all of the application specific exceptions will extend from. This will make it
 * easy to catch all of the application specific exceptions and provides a clean separation from the other
 * potential exceptions that may be thrown during the application’s execution.
 *
 * @package KamranAhmed\Faulty\Exceptions
 *
 * @author  Kamran Ahmed <kamranahmed.se@gmail.com>
 */
abstract class BaseException extends Exception
{
    /** @var int */
    protected $status;

    /** @var string */
    protected $title;

    /** @var string */
    protected $detail;

    /** @var string */
    protected $type;

    /** @var string */
    protected $instance;

    /**
     * @param string $message
     *
     * @throws \KamranAhmed\Faulty\Exceptions\InternalErrorException
     */
    public function __construct($message)
    {
        if (!is_scalar($message)) {
            throw new InternalErrorException('Exception message should be string');
        }

        parent::__construct($message);
    }

    /**
     * Get the status
     *
     * @return int
     */
    public function getStatus()
    {
        return (int)$this->status;
    }

    /**
     * Return the Exception as an array
     *
     * @return array
     */
    public function toArray()
    {
        $error = [
            'status'   => $this->status,
            'title'    => $this->title,
            'detail'   => $this->detail,
            'type'     => !empty($this->type) ? $this->type : "https://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html",
            'instance' => $this->instance,
        ];

        return array_filter($error);
    }
}
