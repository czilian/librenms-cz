<?php

namespace spec\Prophecy\Prophecy;

use PhpSpec\ObjectBehavior;
<<<<<<< HEAD
=======
use Prophecy\Argument\ArgumentsWildcard;
use Prophecy\Call\Call;
use Prophecy\Prediction\PredictionInterface;
use Prophecy\Promise\PromiseInterface;
use Prophecy\Prophecy\ObjectProphecy;
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

class ClassWithFinalMethod
{
    final public function finalMethod() {}
}

class MethodProphecySpec extends ObjectBehavior
{
<<<<<<< HEAD
    /**
     * @param \Prophecy\Prophecy\ObjectProphecy $objectProphecy
     * @param \ReflectionClass                  $reflection
     */
    function let($objectProphecy, $reflection)
=======
    function let(ObjectProphecy $objectProphecy, \ReflectionClass $reflection)
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    {
        $objectProphecy->reveal()->willReturn($reflection);

        $this->beConstructedWith($objectProphecy, 'getName', null);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Prophecy\Prophecy\MethodProphecy');
    }

    function its_constructor_throws_MethodNotFoundException_for_unexisting_method($objectProphecy)
    {
        $this->shouldThrow('Prophecy\Exception\Doubler\MethodNotFoundException')->during(
            '__construct', array($objectProphecy, 'getUnexisting', null)
        );
    }

<<<<<<< HEAD
    /**
     * @param ClassWithFinalMethod $subject
     */
    function its_constructor_throws_MethodProphecyException_for_final_methods($objectProphecy, $subject)
=======
    function its_constructor_throws_MethodProphecyException_for_final_methods($objectProphecy, ClassWithFinalMethod $subject)
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    {
        $objectProphecy->reveal()->willReturn($subject);

        $this->shouldThrow('Prophecy\Exception\Prophecy\MethodProphecyException')->during(
            '__construct', array($objectProphecy, 'finalMethod', null)
        );
    }

    function its_constructor_transforms_array_passed_as_3rd_argument_to_ArgumentsWildcard(
        $objectProphecy
    )
    {
        $this->beConstructedWith($objectProphecy, 'getName', array(42, 33));

        $wildcard = $this->getArgumentsWildcard();
        $wildcard->shouldNotBe(null);
        $wildcard->__toString()->shouldReturn('exact(42), exact(33)');
    }

    function its_constructor_does_not_touch_third_argument_if_it_is_null($objectProphecy)
    {
        $this->beConstructedWith($objectProphecy, 'getName', null);

        $wildcard = $this->getArgumentsWildcard();
        $wildcard->shouldBe(null);
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Promise\PromiseInterface $promise
     */
    function it_records_promise_through_will_method($promise, $objectProphecy)
=======
    function it_records_promise_through_will_method(PromiseInterface $promise, $objectProphecy)
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    {
        $objectProphecy->addMethodProphecy($this)->willReturn(null);

        $this->will($promise);
        $this->getPromise()->shouldReturn($promise);
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Promise\PromiseInterface $promise
     */
    function it_adds_itself_to_ObjectProphecy_during_call_to_will($objectProphecy, $promise)
=======
    function it_adds_itself_to_ObjectProphecy_during_call_to_will(PromiseInterface $objectProphecy, $promise)
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    {
        $objectProphecy->addMethodProphecy($this)->shouldBeCalled();

        $this->will($promise);
    }

    function it_adds_ReturnPromise_during_willReturn_call($objectProphecy)
    {
        $objectProphecy->addMethodProphecy($this)->willReturn(null);

        $this->willReturn(42);
        $this->getPromise()->shouldBeAnInstanceOf('Prophecy\Promise\ReturnPromise');
    }

    function it_adds_ThrowPromise_during_willThrow_call($objectProphecy)
    {
        $objectProphecy->addMethodProphecy($this)->willReturn(null);

        $this->willThrow('RuntimeException');
        $this->getPromise()->shouldBeAnInstanceOf('Prophecy\Promise\ThrowPromise');
    }

    function it_adds_ReturnArgumentPromise_during_willReturnArgument_call($objectProphecy)
    {
        $objectProphecy->addMethodProphecy($this)->willReturn(null);

        $this->willReturnArgument();
        $this->getPromise()->shouldBeAnInstanceOf('Prophecy\Promise\ReturnArgumentPromise');
    }

    function it_adds_ReturnArgumentPromise_during_willReturnArgument_call_with_index_argument($objectProphecy)
    {
        $objectProphecy->addMethodProphecy($this)->willReturn(null);

        $this->willReturnArgument(1);
        $promise = $this->getPromise();
        $promise->shouldBeAnInstanceOf('Prophecy\Promise\ReturnArgumentPromise');
        $promise->execute(array('one', 'two'), $objectProphecy, $this)->shouldReturn('two');
    }

    function it_adds_CallbackPromise_during_will_call_with_callback_argument($objectProphecy)
    {
        $objectProphecy->addMethodProphecy($this)->willReturn(null);

        $callback = function () {};

        $this->will($callback);
        $this->getPromise()->shouldBeAnInstanceOf('Prophecy\Promise\CallbackPromise');
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Prediction\PredictionInterface $prediction
     */
    function it_records_prediction_through_should_method($prediction, $objectProphecy)
=======
    function it_records_prediction_through_should_method(PredictionInterface $prediction, $objectProphecy)
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    {
        $objectProphecy->addMethodProphecy($this)->willReturn(null);

        $this->callOnWrappedObject('should', array($prediction));
        $this->getPrediction()->shouldReturn($prediction);
    }

    function it_adds_CallbackPrediction_during_should_call_with_callback_argument($objectProphecy)
    {
        $objectProphecy->addMethodProphecy($this)->willReturn(null);

        $callback = function () {};

        $this->callOnWrappedObject('should', array($callback));
        $this->getPrediction()->shouldBeAnInstanceOf('Prophecy\Prediction\CallbackPrediction');
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Prediction\PredictionInterface $prediction
     */
    function it_adds_itself_to_ObjectProphecy_during_call_to_should($objectProphecy, $prediction)
=======
    function it_adds_itself_to_ObjectProphecy_during_call_to_should($objectProphecy, PredictionInterface $prediction)
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    {
        $objectProphecy->addMethodProphecy($this)->shouldBeCalled();

        $this->callOnWrappedObject('should', array($prediction));
    }

    function it_adds_CallPrediction_during_shouldBeCalled_call($objectProphecy)
    {
        $objectProphecy->addMethodProphecy($this)->willReturn(null);

        $this->callOnWrappedObject('shouldBeCalled', array());
        $this->getPrediction()->shouldBeAnInstanceOf('Prophecy\Prediction\CallPrediction');
    }

    function it_adds_NoCallsPrediction_during_shouldNotBeCalled_call($objectProphecy)
    {
        $objectProphecy->addMethodProphecy($this)->willReturn(null);

        $this->callOnWrappedObject('shouldNotBeCalled', array());
        $this->getPrediction()->shouldBeAnInstanceOf('Prophecy\Prediction\NoCallsPrediction');
    }

    function it_adds_CallTimesPrediction_during_shouldBeCalledTimes_call($objectProphecy)
    {
        $objectProphecy->addMethodProphecy($this)->willReturn(null);

        $this->callOnWrappedObject('shouldBeCalledTimes', array(5));
        $this->getPrediction()->shouldBeAnInstanceOf('Prophecy\Prediction\CallTimesPrediction');
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Argument\ArgumentsWildcard     $arguments
     * @param \Prophecy\Prediction\PredictionInterface $prediction
     * @param \Prophecy\Call\Call                      $call1
     * @param \Prophecy\Call\Call                      $call2
     */
    function it_checks_prediction_via_shouldHave_method_call(
        $objectProphecy, $arguments, $prediction, $call1, $call2
    )
    {
=======
    function it_checks_prediction_via_shouldHave_method_call(
        $objectProphecy,
        ArgumentsWildcard $arguments,
        PredictionInterface $prediction,
        Call $call1,
        Call $call2
    ) {
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        $objectProphecy->addMethodProphecy($this)->willReturn(null);
        $prediction->check(array($call1, $call2), $objectProphecy->getWrappedObject(), $this)->shouldBeCalled();
        $objectProphecy->findProphecyMethodCalls('getName', $arguments)->willReturn(array($call1, $call2));

        $this->withArguments($arguments);
        $this->callOnWrappedObject('shouldHave', array($prediction));
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Argument\ArgumentsWildcard     $arguments
     * @param \Prophecy\Prediction\PredictionInterface $prediction
     * @param \Prophecy\Call\Call                      $call1
     * @param \Prophecy\Call\Call                      $call2
     */
    function it_sets_return_promise_during_shouldHave_call_if_none_was_set_before(
        $objectProphecy, $arguments, $prediction, $call1, $call2
    )
    {
=======
    function it_sets_return_promise_during_shouldHave_call_if_none_was_set_before(
        $objectProphecy,
        ArgumentsWildcard $arguments,
        PredictionInterface $prediction,
        Call $call1,
        Call $call2
    ) {
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        $objectProphecy->addMethodProphecy($this)->willReturn(null);
        $prediction->check(array($call1, $call2), $objectProphecy->getWrappedObject(), $this)->shouldBeCalled();
        $objectProphecy->findProphecyMethodCalls('getName', $arguments)->willReturn(array($call1, $call2));

        $this->withArguments($arguments);
        $this->callOnWrappedObject('shouldHave', array($prediction));

        $this->getPromise()->shouldReturnAnInstanceOf('Prophecy\Promise\ReturnPromise');
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Argument\ArgumentsWildcard     $arguments
     * @param \Prophecy\Prediction\PredictionInterface $prediction
     * @param \Prophecy\Call\Call                      $call1
     * @param \Prophecy\Call\Call                      $call2
     * @param \Prophecy\Promise\PromiseInterface       $promise
     */
    function it_does_not_set_return_promise_during_shouldHave_call_if_it_was_set_before(
        $objectProphecy, $arguments, $prediction, $call1, $call2, $promise
    )
    {
=======
    function it_does_not_set_return_promise_during_shouldHave_call_if_it_was_set_before(
        $objectProphecy,
        ArgumentsWildcard $arguments,
        PredictionInterface $prediction,
        Call $call1,
        Call $call2,
        PromiseInterface $promise
    ) {
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        $objectProphecy->addMethodProphecy($this)->willReturn(null);
        $prediction->check(array($call1, $call2), $objectProphecy->getWrappedObject(), $this)->shouldBeCalled();
        $objectProphecy->findProphecyMethodCalls('getName', $arguments)->willReturn(array($call1, $call2));

        $this->will($promise);
        $this->withArguments($arguments);
        $this->callOnWrappedObject('shouldHave', array($prediction));

        $this->getPromise()->shouldReturn($promise);
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Argument\ArgumentsWildcard     $arguments
     * @param \Prophecy\Prediction\PredictionInterface $prediction1
     * @param \Prophecy\Prediction\PredictionInterface $prediction2
     * @param \Prophecy\Call\Call                      $call1
     * @param \Prophecy\Call\Call                      $call2
     * @param \Prophecy\Promise\PromiseInterface       $promise
     */
    function it_records_checked_predictions(
        $objectProphecy, $arguments, $prediction1, $prediction2, $call1, $call2, $promise
    )
    {
=======
    function it_records_checked_predictions(
        $objectProphecy,
        ArgumentsWildcard $arguments,
        PredictionInterface $prediction1,
        PredictionInterface $prediction2,
        Call $call1,
        Call $call2,
        PromiseInterface $promise
    ) {
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        $objectProphecy->addMethodProphecy($this)->willReturn(null);
        $prediction1->check(array($call1, $call2), $objectProphecy->getWrappedObject(), $this)->willReturn();
        $prediction2->check(array($call1, $call2), $objectProphecy->getWrappedObject(), $this)->willReturn();
        $objectProphecy->findProphecyMethodCalls('getName', $arguments)->willReturn(array($call1, $call2));

        $this->will($promise);
        $this->withArguments($arguments);
        $this->callOnWrappedObject('shouldHave', array($prediction1));
        $this->callOnWrappedObject('shouldHave', array($prediction2));

        $this->getCheckedPredictions()->shouldReturn(array($prediction1, $prediction2));
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Argument\ArgumentsWildcard     $arguments
     * @param \Prophecy\Prediction\PredictionInterface $prediction
     * @param \Prophecy\Call\Call                      $call1
     * @param \Prophecy\Call\Call                      $call2
     * @param \Prophecy\Promise\PromiseInterface       $promise
     */
    function it_records_even_failed_checked_predictions(
        $objectProphecy, $arguments, $prediction, $call1, $call2, $promise
    )
    {
=======
    function it_records_even_failed_checked_predictions(
        $objectProphecy,
        ArgumentsWildcard $arguments,
        PredictionInterface $prediction,
        Call $call1,
        Call $call2,
        PromiseInterface $promise
    ) {
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        $objectProphecy->addMethodProphecy($this)->willReturn(null);
        $prediction->check(array($call1, $call2), $objectProphecy->getWrappedObject(), $this)->willThrow(new \RuntimeException());
        $objectProphecy->findProphecyMethodCalls('getName', $arguments)->willReturn(array($call1, $call2));

        $this->will($promise);
        $this->withArguments($arguments);

        try {
          $this->callOnWrappedObject('shouldHave', array($prediction));
        } catch (\Exception $e) {}

        $this->getCheckedPredictions()->shouldReturn(array($prediction));
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Argument\ArgumentsWildcard     $arguments
     * @param \Prophecy\Prediction\PredictionInterface $prediction
     * @param \Prophecy\Call\Call                      $call1
     * @param \Prophecy\Call\Call                      $call2
     */
    function it_checks_prediction_via_shouldHave_method_call_with_callback(
        $objectProphecy, $arguments, $prediction, $call1, $call2
    )
    {
=======
    function it_checks_prediction_via_shouldHave_method_call_with_callback(
        $objectProphecy,
        ArgumentsWildcard $arguments,
        Call $call1,
        Call $call2
    ) {
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        $callback = function ($calls, $object, $method) {
            throw new \RuntimeException;
        };
        $objectProphecy->findProphecyMethodCalls('getName', $arguments)->willReturn(array($call1, $call2));

        $this->withArguments($arguments);
        $this->shouldThrow('RuntimeException')->duringShouldHave($callback);
    }

    function it_does_nothing_during_checkPrediction_if_no_prediction_set()
    {
        $this->checkPrediction()->shouldReturn(null);
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Argument\ArgumentsWildcard     $arguments
     * @param \Prophecy\Prediction\PredictionInterface $prediction
     * @param \Prophecy\Call\Call                      $call1
     * @param \Prophecy\Call\Call                      $call2
     */
    function it_checks_set_prediction_during_checkPrediction(
        $objectProphecy, $arguments, $prediction, $call1, $call2
    )
    {
=======
    function it_checks_set_prediction_during_checkPrediction(
        $objectProphecy,
        ArgumentsWildcard $arguments,
        PredictionInterface $prediction,
        Call $call1,
        Call $call2
    ) {
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        $prediction->check(array($call1, $call2), $objectProphecy->getWrappedObject(), $this)->shouldBeCalled();
        $objectProphecy->findProphecyMethodCalls('getName', $arguments)->willReturn(array($call1, $call2));
        $objectProphecy->addMethodProphecy($this)->willReturn(null);

        $this->withArguments($arguments);
        $this->callOnWrappedObject('should', array($prediction));
        $this->checkPrediction();
    }

    function it_links_back_to_ObjectProphecy_through_getter($objectProphecy)
    {
        $this->getObjectProphecy()->shouldReturn($objectProphecy);
    }

    function it_has_MethodName()
    {
        $this->getMethodName()->shouldReturn('getName');
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Argument\ArgumentsWildcard $wildcard
     */
    function it_contains_ArgumentsWildcard_it_was_constructed_with($objectProphecy, $wildcard)
=======
    function it_contains_ArgumentsWildcard_it_was_constructed_with($objectProphecy, ArgumentsWildcard $wildcard)
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    {
        $this->beConstructedWith($objectProphecy, 'getName', $wildcard);

        $this->getArgumentsWildcard()->shouldReturn($wildcard);
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Argument\ArgumentsWildcard $wildcard
     */
    function its_ArgumentWildcard_is_mutable_through_setter($wildcard)
=======
    function its_ArgumentWildcard_is_mutable_through_setter(ArgumentsWildcard $wildcard)
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    {
        $this->withArguments($wildcard);

        $this->getArgumentsWildcard()->shouldReturn($wildcard);
    }

    function its_withArguments_transforms_passed_array_into_ArgumentsWildcard()
    {
        $this->withArguments(array(42, 33));

        $wildcard = $this->getArgumentsWildcard();
        $wildcard->shouldNotBe(null);
        $wildcard->__toString()->shouldReturn('exact(42), exact(33)');
    }

    function its_withArguments_throws_exception_if_wrong_arguments_provided()
    {
        $this->shouldThrow('Prophecy\Exception\InvalidArgumentException')->duringWithArguments(42);
    }
}
