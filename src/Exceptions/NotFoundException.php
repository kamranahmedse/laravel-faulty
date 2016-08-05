<?php

namespace KamranAhmed\Faulty\Exceptions;

/**
 * Class NotFoundException
 *
 *
 * @package KamranAhmed\Faulty\Exceptions
 *
 * @author  Kamran Ahmed <kamranahmed.se@gmail.com>
 */
class NotFoundException extends BaseException
{
    /** @var int */
    protected $status = 404;

    /** @var string */
    protected $title = 'Not found';

    /** @var string */
    protected $detail;

    /** @var string */
    protected $instance;

    /** @var string */
    protected $type;

    /**
     * NotFoundException constructor.
     *
     * @param string $detail
     * @param string $title
     * @param string $instance
     * @param string $type
     */
    public function __construct($detail, $title = '', $instance = '', $type = '')
    {
        $this->detail   = $detail ?: $this->detail;
        $this->title    = $title ?: $this->title;
        $this->instance = $instance;
        $this->type     = $type;

        parent::__construct($this->detail);
    }
}
