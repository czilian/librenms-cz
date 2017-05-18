<?php

namespace spec\Prophecy\Promise;

use PhpSpec\ObjectBehavior;
<<<<<<< HEAD
=======
use Prophecy\Prophecy\MethodProphecy;
use Prophecy\Prophecy\ObjectProphecy;
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

class ReturnArgumentPromiseSpec extends ObjectBehavior
{
    function it_is_promise()
    {
        $this->shouldBeAnInstanceOf('Prophecy\Promise\PromiseInterface');
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Prophecy\ObjectProphecy $object
     * @param \Prophecy\Prophecy\MethodProphecy $method
     */
    function it_should_return_first_argument_if_provided($object, $method)
=======
    function it_should_return_first_argument_if_provided(ObjectProphecy $object, MethodProphecy $method)
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    {
        $this->execute(array('one', 'two'), $object, $method)->shouldReturn('one');
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Prophecy\ObjectProphecy $object
     * @param \Prophecy\Prophecy\MethodProphecy $method
     */
    function it_should_return_null_if_no_arguments_provided($object, $method)
=======
    function it_should_return_null_if_no_arguments_provided(ObjectProphecy $object, MethodProphecy $method)
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    {
        $this->execute(array(), $object, $method)->shouldReturn(null);
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Prophecy\ObjectProphecy $object
     * @param \Prophecy\Prophecy\MethodProphecy $method
     */
    function it_should_return_nth_argument_if_provided($object, $method)
=======
    function it_should_return_nth_argument_if_provided(ObjectProphecy $object, MethodProphecy $method)
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    {
        $this->beConstructedWith(1);
        $this->execute(array('one', 'two'), $object, $method)->shouldReturn('two');
    }
}
