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
class NotModifiedException extends BaseException
{
    /**
     * @var string
     */
    protected $status = '304';
    protected $title  = 'Resource not modified';
    protected $detail = '';

    /**
     * NotFoundException constructor.
     *
     * @param        $detail
     * @param string $title
     */
    public function __construct($detail, $title = '')
    {
        $this->detail = $detail ?: $this->detail;
        $this->title  = $title ?: $this->title;

        parent::__construct($this->detail);
    }
}
