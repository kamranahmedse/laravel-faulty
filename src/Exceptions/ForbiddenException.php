<?php

namespace KamranAhmed\Faulty\Exceptions;

/**
 * Class ForbiddenException
 *
 * @package KamranAhmed\Faulty\Exceptions
 *
 * @author  Kamran Ahmed <kamranahmed.se@gmail.com>
 */
class ForbiddenException extends BaseException
{
    /** @var int */
    protected $status = 403;

    /** @var string */
    protected $title = 'Forbidden Exception';

    /** @var string */
    protected $detail = '';

    /** @var string */
    protected $instance;

    /** @var string */
    protected $type;

    /**
     * ForbiddenException constructor.
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
