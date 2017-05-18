<?php

namespace spec\Prophecy\Prediction;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
<<<<<<< HEAD
=======
use Prophecy\Argument\ArgumentsWildcard;
use Prophecy\Call\Call;
use Prophecy\Prophecy\MethodProphecy;
use Prophecy\Prophecy\ObjectProphecy;
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

class CallPredictionSpec extends ObjectBehavior
{
    function it_is_prediction()
    {
        $this->shouldHaveType('Prophecy\Prediction\PredictionInterface');
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Prophecy\ObjectProphecy $object
     * @param \Prophecy\Prophecy\MethodProphecy $method
     * @param \Prophecy\Call\Call               $call
     */
    function it_does_nothing_if_there_is_more_than_one_call_been_made($object, $method, $call)
    {
        $this->check(array($call), $object, $method)->shouldReturn(null);
    }

    /**
     * @param \Prophecy\Prophecy\ObjectProphecy    $object
     * @param \Prophecy\Prophecy\MethodProphecy    $method
     * @param \Prophecy\Argument\ArgumentsWildcard $arguments
     */
    function it_throws_NoCallsException_if_no_calls_found($object, $method, $arguments)
    {
=======
    function it_does_nothing_if_there_is_more_than_one_call_been_made(
        ObjectProphecy $object,
        MethodProphecy $method,
        Call $call
    ) {
        $this->check(array($call), $object, $method)->shouldReturn(null);
    }

    function it_throws_NoCallsException_if_no_calls_found(
        ObjectProphecy $object,
        MethodProphecy $method,
        ArgumentsWildcard $arguments
    ) {
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        $method->getObjectProphecy()->willReturn($object);
        $method->getMethodName()->willReturn('getName');
        $method->getArgumentsWildcard()->willReturn($arguments);
        $arguments->__toString()->willReturn('123');
        $object->reveal()->willReturn(new \stdClass());
        $object->findProphecyMethodCalls('getName', Argument::any())->willReturn(array());

        $this->shouldThrow('Prophecy\Exception\Prediction\NoCallsException')
            ->duringCheck(array(), $object, $method);
    }
}
