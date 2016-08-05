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
     * @param $status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param $title
     *
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * @param $detail
     *
     * @return $this
     */
    public function setDetail($detail)
    {
        $this->detail = $detail;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param $type
     *
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getInstance()
    {
        return $this->instance;
    }

    /**
     * @param $instance
     *
     * @return $this
     */
    public function setInstance($instance)
    {
        $this->instance = $instance;

        return $this;
    }

    /**
     * Fails with the current exception object
     *
     * @throws \KamranAhmed\Faulty\Exceptions\BaseException
     */
    public function fail()
    {
        throw $this;
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
            'type'     => $this->type ?: 'https://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html',
            'instance' => $this->instance,
        ];

        return array_filter($error);
    }
}
