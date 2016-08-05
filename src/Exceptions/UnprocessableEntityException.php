<?php

namespace KamranAhmed\Faulty\Exceptions;

/**
 * Class UnprocessableEntityException
 *
 * @package KamranAhmed\Faulty\Exceptions
 *
 * @author  Kamran Ahmed <kamranahmed.se@gmail.com>
 */
class UnprocessableEntityException extends BaseException
{
    /**
     * @var string
     */
    protected $status = '422';
    protected $title  = 'Unprocessable Entity';
    protected $detail = '';

    /**
     * UnprocessableEntityException constructor.
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
