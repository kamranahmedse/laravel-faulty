<?php

namespace KamranAhmed\Faulty\Exceptions;

/**
 * Class PreconditionFailedException
 *
 * @package KamranAhmed\Faulty\Exceptions
 *
 * @author  Kamran Ahmed <kamranahmed.se@gmail.com>
 */
class PreconditionFailedException extends BaseException
{
    /**
     * @var string
     */
    protected $status = '412';
    protected $title  = 'Precondition failed';
    protected $detail = '';

    /**
     * PreconditionFailedException constructor.
     *
     * @param string $detail
     * @param        $title
     */
    public function __construct($detail, $title = '')
    {
        $this->detail = $detail ?: $this->detail;
        $this->title  = $title ?: $this->title;

        parent::__construct($this->detail);
    }
}
