<?php

namespace spec\Prophecy\Call;

use PhpSpec\ObjectBehavior;
<<<<<<< HEAD
=======
use Prophecy\Promise\PromiseInterface;
use Prophecy\Prophecy\MethodProphecy;
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
use Prophecy\Prophecy\ObjectProphecy;
use Prophecy\Argument\ArgumentsWildcard;

class CallCenterSpec extends ObjectBehavior
{
<<<<<<< HEAD
    /**
     * @param \Prophecy\Prophecy\ObjectProphecy $objectProphecy
     */
    function let($objectProphecy)
    {
    }

    /**
     * @param \Prophecy\Prophecy\ObjectProphecy    $objectProphecy
     * @param \Prophecy\Argument\ArgumentsWildcard $wildcard
     */
    function it_records_calls_made_through_makeCall_method($objectProphecy, $wildcard)
=======
    function let(ObjectProphecy $objectProphecy)
    {
    }

    function it_records_calls_made_through_makeCall_method(ObjectProphecy $objectProphecy, ArgumentsWildcard $wildcard)
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    {
        $wildcard->scoreArguments(array(5, 2, 3))->willReturn(10);
        $objectProphecy->getMethodProphecies()->willReturn(array());

        $this->makeCall($objectProphecy, 'setValues', array(5, 2, 3));

        $calls = $this->findCalls('setValues', $wildcard);
        $calls->shouldHaveCount(1);

        $calls[0]->shouldBeAnInstanceOf('Prophecy\Call\Call');
        $calls[0]->getMethodName()->shouldReturn('setValues');
        $calls[0]->getArguments()->shouldReturn(array(5, 2, 3));
        $calls[0]->getReturnValue()->shouldReturn(null);
    }

    function it_returns_null_for_any_call_through_makeCall_if_no_method_prophecies_added(
        $objectProphecy
    )
    {
        $objectProphecy->getMethodProphecies()->willReturn(array());

        $this->makeCall($objectProphecy, 'setValues', array(5, 2, 3))->shouldReturn(null);
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Prophecy\MethodProphecy    $method1
     * @param \Prophecy\Prophecy\MethodProphecy    $method2
     * @param \Prophecy\Prophecy\MethodProphecy    $method3
     * @param \Prophecy\Argument\ArgumentsWildcard $arguments1
     * @param \Prophecy\Argument\ArgumentsWildcard $arguments2
     * @param \Prophecy\Argument\ArgumentsWildcard $arguments3
     * @param \Prophecy\Promise\PromiseInterface   $promise
     */
    function it_executes_promise_of_method_prophecy_that_matches_signature_passed_to_makeCall(
        $objectProphecy, $method1, $method2, $method3, $arguments1, $arguments2, $arguments3,
        $promise
    )
    {
=======
    function it_executes_promise_of_method_prophecy_that_matches_signature_passed_to_makeCall(
        $objectProphecy,
        MethodProphecy $method1,
        MethodProphecy $method2,
        MethodProphecy $method3,
        ArgumentsWildcard $arguments1,
        ArgumentsWildcard $arguments2,
        ArgumentsWildcard $arguments3,
        PromiseInterface $promise
    ) {
        $method1->hasReturnVoid()->willReturn(false);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        $method1->getMethodName()->willReturn('getName');
        $method1->getArgumentsWildcard()->willReturn($arguments1);
        $arguments1->scoreArguments(array('world', 'everything'))->willReturn(false);

<<<<<<< HEAD
=======
        $method2->hasReturnVoid()->willReturn(false);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        $method2->getMethodName()->willReturn('setTitle');
        $method2->getArgumentsWildcard()->willReturn($arguments2);
        $arguments2->scoreArguments(array('world', 'everything'))->willReturn(false);

<<<<<<< HEAD
=======
        $method3->hasReturnVoid()->willReturn(false);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        $method3->getMethodName()->willReturn('getName');
        $method3->getArgumentsWildcard()->willReturn($arguments3);
        $method3->getPromise()->willReturn($promise);
        $arguments3->scoreArguments(array('world', 'everything'))->willReturn(200);

        $objectProphecy->getMethodProphecies()->willReturn(array(
            'method1' => array($method1),
            'method2' => array($method2, $method3)
        ));
        $objectProphecy->getMethodProphecies('getName')->willReturn(array($method1, $method3));
        $objectProphecy->reveal()->willReturn(new \stdClass());

        $promise->execute(array('world', 'everything'), $objectProphecy->getWrappedObject(), $method3)->willReturn(42);

        $this->makeCall($objectProphecy, 'getName', array('world', 'everything'))->shouldReturn(42);

        $calls = $this->findCalls('getName', $arguments3);
        $calls->shouldHaveCount(1);
        $calls[0]->getReturnValue()->shouldReturn(42);
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Prophecy\MethodProphecy    $method1
     * @param \Prophecy\Prophecy\MethodProphecy    $method2
     * @param \Prophecy\Prophecy\MethodProphecy    $method3
     * @param \Prophecy\Argument\ArgumentsWildcard $arguments1
     * @param \Prophecy\Argument\ArgumentsWildcard $arguments2
     * @param \Prophecy\Argument\ArgumentsWildcard $arguments3
     * @param \Prophecy\Promise\PromiseInterface   $promise
     */
    function it_executes_promise_of_method_prophecy_that_matches_with_highest_score_to_makeCall(
        $objectProphecy, $method1, $method2, $method3, $arguments1, $arguments2, $arguments3,
        $promise
    )
    {
=======
    function it_executes_promise_of_method_prophecy_that_matches_with_highest_score_to_makeCall(
        $objectProphecy,
        MethodProphecy $method1,
        MethodProphecy $method2,
        MethodProphecy $method3,
        ArgumentsWildcard $arguments1,
        ArgumentsWildcard $arguments2,
        ArgumentsWildcard $arguments3,
        PromiseInterface $promise
    ) {
        $method1->hasReturnVoid()->willReturn(false);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        $method1->getMethodName()->willReturn('getName');
        $method1->getArgumentsWildcard()->willReturn($arguments1);
        $arguments1->scoreArguments(array('world', 'everything'))->willReturn(50);

<<<<<<< HEAD
=======
        $method2->hasReturnVoid()->willReturn(false);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        $method2->getMethodName()->willReturn('getName');
        $method2->getArgumentsWildcard()->willReturn($arguments2);
        $method2->getPromise()->willReturn($promise);
        $arguments2->scoreArguments(array('world', 'everything'))->willReturn(300);

<<<<<<< HEAD
=======
        $method3->hasReturnVoid()->willReturn(false);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        $method3->getMethodName()->willReturn('getName');
        $method3->getArgumentsWildcard()->willReturn($arguments3);
        $arguments3->scoreArguments(array('world', 'everything'))->willReturn(200);

        $objectProphecy->getMethodProphecies()->willReturn(array(
            'method1' => array($method1),
            'method2' => array($method2, $method3)
        ));
        $objectProphecy->getMethodProphecies('getName')->willReturn(array(
            $method1, $method2, $method3
        ));
        $objectProphecy->reveal()->willReturn(new \stdClass());

        $promise->execute(array('world', 'everything'), $objectProphecy->getWrappedObject(), $method2)
            ->willReturn('second');

        $this->makeCall($objectProphecy, 'getName', array('world', 'everything'))
            ->shouldReturn('second');
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Prophecy\MethodProphecy    $method
     * @param \Prophecy\Argument\ArgumentsWildcard $arguments
     */
    function it_throws_exception_if_call_does_not_match_any_of_defined_method_prophecies(
        $objectProphecy, $method, $arguments
    )
    {
=======
    function it_throws_exception_if_call_does_not_match_any_of_defined_method_prophecies(
        $objectProphecy,
        MethodProphecy $method,
        ArgumentsWildcard $arguments
    ) {
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        $method->getMethodName()->willReturn('getName');
        $method->getArgumentsWildcard()->willReturn($arguments);
        $arguments->scoreArguments(array('world', 'everything'))->willReturn(false);
        $arguments->__toString()->willReturn('arg1, arg2');

        $objectProphecy->getMethodProphecies()->willReturn(array('method1' => array($method)));
        $objectProphecy->getMethodProphecies('getName')->willReturn(array($method));

        $this->shouldThrow('Prophecy\Exception\Call\UnexpectedCallException')
            ->duringMakeCall($objectProphecy, 'getName', array('world', 'everything'));
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Prophecy\MethodProphecy    $method
     * @param \Prophecy\Argument\ArgumentsWildcard $arguments
     */
    function it_returns_null_if_method_prophecy_that_matches_makeCall_arguments_has_no_promise(
        $objectProphecy, $method, $arguments
    )
    {
=======
    function it_returns_null_if_method_prophecy_that_matches_makeCall_arguments_has_no_promise(
        $objectProphecy,
        MethodProphecy $method,
        ArgumentsWildcard $arguments
    ) {
        $method->hasReturnVoid()->willReturn(false);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        $method->getMethodName()->willReturn('getName');
        $method->getArgumentsWildcard()->willReturn($arguments);
        $method->getPromise()->willReturn(null);
        $arguments->scoreArguments(array('world', 'everything'))->willReturn(100);

        $objectProphecy->getMethodProphecies()->willReturn(array($method));
        $objectProphecy->getMethodProphecies('getName')->willReturn(array($method));

        $this->makeCall($objectProphecy, 'getName', array('world', 'everything'))
            ->shouldReturn(null);
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Argument\ArgumentsWildcard $wildcard
     */
    function it_finds_recorded_calls_by_a_method_name_and_arguments_wildcard(
        $objectProphecy, $wildcard
    )
    {
=======
    function it_finds_recorded_calls_by_a_method_name_and_arguments_wildcard(
        $objectProphecy,
        ArgumentsWildcard $wildcard
    ) {
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        $objectProphecy->getMethodProphecies()->willReturn(array());

        $this->makeCall($objectProphecy, 'getName', array('world'));
        $this->makeCall($objectProphecy, 'getName', array('everything'));
        $this->makeCall($objectProphecy, 'setName', array(42));

        $wildcard->scoreArguments(array('world'))->willReturn(false);
        $wildcard->scoreArguments(array('everything'))->willReturn(10);

        $calls = $this->findCalls('getName', $wildcard);

        $calls->shouldHaveCount(1);
        $calls[0]->getMethodName()->shouldReturn('getName');
        $calls[0]->getArguments()->shouldReturn(array('everything'));
    }
}
