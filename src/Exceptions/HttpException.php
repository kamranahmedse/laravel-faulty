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
    /**
     * @var string
     */
    protected $status = 500;
    protected $title  = 'Problem Occured';
    protected $detail = "An error occured and the process couldn't be processed";

    /**
     * BadRequestException constructor.
     *
     * @param string  $title
     * @param integer $status
     * @param string  $detail
     */
    public function __construct($title = '', $status = 500, $detail = '')
    {
        $this->title  = $title ?: $this->title;
        $this->status = $status;
        $this->detail = $detail ?: $this->detail;

        parent::__construct($this->detail);
    }
}
