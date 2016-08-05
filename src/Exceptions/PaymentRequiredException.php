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
    /** @var int */
    protected $status = 402;

    /** @var string */
    protected $title = 'Payment required';

    /** @var string */
    protected $detail = 'Payment is required to perform this action';

    /** @var string */
    protected $instance;

    /** @var string */
    protected $type;

    /**
     * BadRequestException constructor.
     *
     * @param string $detail
     * @param string $title
     * @param string $instance
     * @param string $type
     */
    public function __construct($detail, $title = '', $instance = '', $type = '')
    {
        $this->detail   = $detail ?: $this->title;
        $this->title    = $title ?: $this->title;
        $this->instance = $instance;
        $this->type     = $type;

        parent::__construct($this->detail);
    }
}
