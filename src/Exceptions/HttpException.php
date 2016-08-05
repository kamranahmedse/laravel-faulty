<?php

namespace KamranAhmed\Faulty\Exceptions;

/**
 * Class HttpException
 *
 * @package KamranAhmed\Faulty\Exceptions
 *
 * @author  Kamran Ahmed <kamranahmed.se@gmail.com>
 */
class HttpException extends BaseException
{
    /** @var int */
    protected $status = 500;

    /** @var string */
    protected $title = 'Problem Occurred';

    /** @var string */
    protected $detail = "An error occurred and the process couldn't be processed";

    /** @var string */
    protected $instance;

    /** @var string */
    protected $type;

    /**
     * BadRequestException constructor.
     *
     * @param string  $title
     * @param integer $status
     * @param string  $detail
     * @param string  $instance
     * @param string  $type
     */
    public function __construct($title = '', $status = 500, $detail = '', $instance = '', $type = '')
    {
        $this->title    = $title ?: $this->title;
        $this->status   = $status;
        $this->detail   = $detail ?: $this->detail;
        $this->type     = $type;
        $this->instance = $instance;

        parent::__construct($this->detail);
    }
}
