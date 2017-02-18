<?php

namespace KamranAhmed\Faulty;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use KamranAhmed\Faulty\Exceptions\BaseException;
use KamranAhmed\Faulty\Exceptions\NotFoundException;
use Laravel\Lumen\Exceptions\Handler as LumenExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

/**
 * Class Handler
 *
 * The handler which overrides the lumen's exception handler in order to
 * integrate the Restful exceptions
 *
 * @package KamranAhmed\Faulty\Exceptions
 *
 * @author  Kamran Ahmed <kamranahmed.se@gmail.com>
 */
class Handler extends LumenExceptionHandler
{
    /**
     * Convert the Exception into a JSON HTTP Response
     *
     * @param Request   $request
     * @param Exception $e
     *
     * @return \Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response
     */
    public function render($request, Exception $e)
    {
        $debugMode = env('APP_DEBUG', false);

        // If debug is enabled, we are okay with sending back the views
        if ($debugMode && (php_sapi_name() !== 'cli')) {
            return $this->renderExceptionWithWhoops($e);
        }

        return $this->handle($request, $e);
    }

    /**
     * Render an exception using Whoops.
     *
     * @param  Exception $e
     *
     * @return Response
     */
    protected function renderExceptionWithWhoops(Exception $e)
    {
        $statusCode = 500;
        if (method_exists($e, 'getStatusCode')) {
            $statusCode = $e->getStatusCode();
        }

        $headers = [];
        if (method_exists($e, 'getHeaders')) {
            $headers = $e->getHeaders();
        }

        $whoops = new Run;
        $whoops->pushHandler(new PrettyPageHandler());

        return new Response($whoops->handleException($e), $statusCode, $headers);
    }

    /**
     * Handles the exceptions thrown in the application. Checks if the exception
     * is one of the Faulty's exception (i.e. BaseException's Child) then returns
     * the array with status and render. If there is any other e.g. fatal or anything
     *
     * @param            $request
     * @param Exception  $e
     *
     * @return Response|\Symfony\Component\HttpFoundation\Response
     */
    public function handle($request, Exception $e)
    {
        $data = $this->getExceptionDefaults($e);

        if ($e instanceOf BaseException) {
            $data = $e->toArray();
        } else if ($e instanceof HttpException) {

            if ($e instanceof NotFoundException) {
                $detail = 'Resource not found';
            } else if ($e instanceof MethodNotAllowedHttpException) {
                $detail = 'Method not allowed';
            } else {
                $detail = $this->generateHttpExceptionMessage($e);
            }

            $data = [
                'status' => $e->getStatusCode(),
                'title'  => $detail,
                'detail' => $detail,
            ];
        } else if ($e instanceof ValidationException) {
            parent::render($request, $e);
        }

        // Include the trace in response iff
        //    - Environment allows it `APP_STACKTRACE`
        //    - It is an internal error
        //    - Exception has a trace string method
        if (
            env('APP_DEBUG_TRACE', true) &&
            $data['status'] === 500 &&
            method_exists($e, 'getTraceAsString')
        ) {
            $data['trace'] = $e->getTraceAsString();
        }

        return response()->json($data, $data['status'], ['Content-Type' => 'application/problem+json']);
    }

    /**
     * Gets the default details for the exception, if suitable match isn't found
     *
     * @param Exception $e
     *
     * @return array
     */
    protected function getExceptionDefaults(Exception $e)
    {
        return [
            'status' => 500,
            'title'  => 'Uncaught Error',
            'detail' => $e->getMessage(),
            'type'   => 'https://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html',
        ];
    }

    /**
     * @param \Symfony\Component\HttpKernel\Exception\HttpException $e
     *
     * @return string
     */
    private function generateHttpExceptionMessage(HttpException $e)
    {
        $class = get_class($e);
        $parts = explode('\\', $class);

        $title = $parts[count($parts) - 1] ?? $class;
        $title = str_replace('HttpException', '', $title);

        return $title;
    }
}
