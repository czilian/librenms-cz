<?php

namespace spec\Prophecy\Promise;

use PhpSpec\ObjectBehavior;
<<<<<<< HEAD
=======
use Prophecy\Prophecy\MethodProphecy;
use Prophecy\Prophecy\ObjectProphecy;
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

class ReturnPromiseSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(array(42));
    }

    function it_is_promise()
    {
        $this->shouldBeAnInstanceOf('Prophecy\Promise\PromiseInterface');
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Prophecy\ObjectProphecy $object
     * @param \Prophecy\Prophecy\MethodProphecy $method
     */
    function it_returns_value_it_was_constructed_with($object, $method)
=======
    function it_returns_value_it_was_constructed_with(ObjectProphecy $object, MethodProphecy $method)
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    {
        $this->execute(array(), $object, $method)->shouldReturn(42);
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Prophecy\ObjectProphecy $object
     * @param \Prophecy\Prophecy\MethodProphecy $method
     */
    function it_always_returns_last_value_left_in_the_return_values($object, $method)
=======
    function it_always_returns_last_value_left_in_the_return_values(ObjectProphecy $object, MethodProphecy $method)
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    {
        $this->execute(array(), $object, $method)->shouldReturn(42);
        $this->execute(array(), $object, $method)->shouldReturn(42);
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Prophecy\ObjectProphecy $object
     * @param \Prophecy\Prophecy\MethodProphecy $method
     */
    function it_consequently_returns_multiple_values_it_was_constructed_with($object, $method)
    {
=======
    function it_consequently_returns_multiple_values_it_was_constructed_with(
        ObjectProphecy $object,
        MethodProphecy $method
    ) {
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        $this->beConstructedWith(array(42, 24, 12));

        $this->execute(array(), $object, $method)->shouldReturn(42);
        $this->execute(array(), $object, $method)->shouldReturn(24);
        $this->execute(array(), $object, $method)->shouldReturn(12);
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Prophecy\ObjectProphecy $object
     * @param \Prophecy\Prophecy\MethodProphecy $method
     */
    function it_returns_null_if_constructed_with_empty_array($object, $method)
=======
    function it_returns_null_if_constructed_with_empty_array(ObjectProphecy $object, MethodProphecy $method)
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    {
        $this->beConstructedWith(array());

        $this->execute(array(), $object, $method)->shouldReturn(null);
    }
}
