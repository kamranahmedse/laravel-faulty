<?php

namespace KamranAhmed\Faulty\Exceptions;

/**
 * Class BadRequestException
 *
 * @package KamranAhmed\Faulty\Exceptions
 *
 * @author  Kamran Ahmed <kamranahmed.se@gmail.com>
 */
class BadRequestException extends BaseException
{
    /**
     * @var string
     */
    protected $status = '400';
    protected $title  = 'Bad Request';
    protected $detail = '';

    /**
     * BadRequestException constructor.
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
