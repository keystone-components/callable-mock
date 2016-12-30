<?php

namespace Keystone\Mockery;

use Mockery;

class CallableMock
{
    /**
     * @var \Mockery\Mock
     */
    private $mock;

    public function __construct()
    {
        $this->mock = Mockery::mock($this);
    }

    /**
     * @param mixed
     *
     * @return \Mockery\Expectation
     */
    public function shouldBeCalled()
    {
        return $this->mock->shouldReceive('__invoke');
    }

    /**
     * Calls the mocked invoke method.
     *
     * @return mixed
     */
    public function __invoke()
    {
        return call_user_func_array($this->mock, func_get_args());
    }
}
