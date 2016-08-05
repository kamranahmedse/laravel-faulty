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
class InternalErrorException extends BaseException
{
    /**
     * @var string
     */
    protected $status = '500';
    protected $title  = 'Internal Error';
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
