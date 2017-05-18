<?php

namespace spec\Prophecy\Prediction;

use PhpSpec\ObjectBehavior;
<<<<<<< HEAD
=======
use Prophecy\Argument\ArgumentsWildcard;
use Prophecy\Call\Call;
use Prophecy\Prophecy\MethodProphecy;
use Prophecy\Prophecy\ObjectProphecy;
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

class NoCallsPredictionSpec extends ObjectBehavior
{
    function it_is_prediction()
    {
        $this->shouldHaveType('Prophecy\Prediction\PredictionInterface');
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Prophecy\ObjectProphecy $object
     * @param \Prophecy\Prophecy\MethodProphecy $method
     */
    function it_does_nothing_if_there_is_no_calls_made($object, $method)
=======
    function it_does_nothing_if_there_is_no_calls_made(ObjectProphecy $object, MethodProphecy $method)
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    {
        $this->check(array(), $object, $method)->shouldReturn(null);
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Prophecy\ObjectProphecy    $object
     * @param \Prophecy\Prophecy\MethodProphecy    $method
     * @param \Prophecy\Call\Call                  $call
     * @param \Prophecy\Argument\ArgumentsWildcard $arguments
     */
    function it_throws_UnexpectedCallsException_if_calls_found($object, $method, $call, $arguments)
    {
=======
    function it_throws_UnexpectedCallsException_if_calls_found(
        ObjectProphecy $object,
        MethodProphecy $method,
        Call $call,
        ArgumentsWildcard $arguments
    ) {
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        $method->getObjectProphecy()->willReturn($object);
        $method->getMethodName()->willReturn('getName');
        $method->getArgumentsWildcard()->willReturn($arguments);
        $arguments->__toString()->willReturn('123');

        $call->getMethodName()->willReturn('getName');
        $call->getArguments()->willReturn(array(5, 4, 'three'));
        $call->getCallPlace()->willReturn('unknown');

        $this->shouldThrow('Prophecy\Exception\Prediction\UnexpectedCallsException')
            ->duringCheck(array($call), $object, $method);
    }
}
