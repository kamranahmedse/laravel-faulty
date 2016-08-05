<?php

namespace KamranAhmed\Faulty\Exceptions;

/**
 * Class PreconditionFailedException
 *
 * @package KamranAhmed\Faulty\Exceptions
 *
 * @author  Kamran Ahmed <kamranahmed.se@gmail.com>
 */
class RequestTooLongException extends BaseException
{
    /**
     * @var string
     */
    protected $status = '414';
    protected $title  = 'Request URI too long';
    protected $detail = '';

    /**
     * PreconditionFailedException constructor.
     *
     * @param string $detail
     * @param string $title
     */
    public function __construct($detail, $title = '')
    {
        $this->detail = $detail ?: $this->detail;
        $this->title  = $title ?: $this->title;

        parent::__construct($this->detail);
    }
}
