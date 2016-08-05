<?php

namespace KamranAhmed\Faulty\Exceptions;

/**
 * Class ConflictException
 *
 * @package KamranAhmed\Faulty\Exceptions
 *
 * @author  Kamran Ahmed <kamranahmed.se@gmail.com>
 */
class ConflictException extends BaseException
{
    /** @var int */
    protected $status = 409;

    /** @var string */
    protected $title = 'Conflict Error';

    /** @var string */
    protected $detail = '';

    /** @var string */
    protected $instance;

    /** @var string */
    protected $type;

    /**
     * ConflictException constructor.
     *
     * @param string $detail
     * @param string $title
     * @param string $instance
     * @param string $type
     */
    public function __construct($detail, $title = '', $instance = '', $type = '')
    {
        $this->detail   = $detail ?: $this->title;
        $this->title    = $title ?: $this->title;
        $this->instance = $instance;
        $this->type     = $type;

        parent::__construct($this->detail);
    }
}
