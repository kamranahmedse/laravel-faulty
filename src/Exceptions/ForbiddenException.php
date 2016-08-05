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
    /**
     * @var string
     */
    protected $status = '403';
    protected $title  = 'Forbidden Exception';
    protected $detail = '';

    /**
     * ForbiddenException constructor.
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
