<?php

namespace Cascade\Tests\Exceptions;

use Cascade\Exceptions\ExceptionWithContext;

class ExceptionWithContextTest extends \PHPUnit_Framework_TestCase
{
    public function testItShouldPassThroughStandardDataToTheBaseExceptionClass()
    {
        $previousException = new \Exception('previousMessage');
        $exception = new ExceptionWithContext('message', [], 42, $previousException);

        $this->assertEquals('message', $exception->getMessage());
        $this->assertEquals(42, $exception->getCode());
        $this->assertSame($previousException, $exception->getPrevious());
    }

    public function testItShouldAllowTheContextToBeRetrieved()
    {
        $context = new \stdClass();
        $exception = new ExceptionWithContext('message', $context);

        $this->assertSame($context, $exception->getContext());
    }
}
