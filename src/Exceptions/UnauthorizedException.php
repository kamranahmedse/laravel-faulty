<?php

namespace KamranAhmed\Faulty\Exceptions;

/**
 * Class UnauthorizedException
 *
 * @package KamranAhmed\Faulty\Exceptions
 *
 * @author  Kamran Ahmed <kamranahmed.se@gmail.com>
 */
class UnauthorizedException extends BaseException
{
    /**
     * @var string
     */
    protected $status = '401';
    protected $title  = 'Unauthorized Exception';
    protected $detail = '';

    /**
     * UnauthorizedException constructor.
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
