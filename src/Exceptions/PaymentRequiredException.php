<?php

namespace KamranAhmed\Faulty\Exceptions;

/**
 * Class RequestTimeoutException
 *
 * @package KamranAhmed\Faulty\Exceptions
 *
 * @author  Kamran Ahmed <kamranahmed.se@gmail.com>
 */
class PaymentRequiredException extends BaseException
{
    /**
     * @var string
     */
    protected $status = '402';
    protected $title  = 'Payment required';
    protected $detail = 'Payment is required to perform this action';

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
