<?php

namespace spec\Prophecy\Exception\Prediction;

use PhpSpec\ObjectBehavior;
<<<<<<< HEAD
=======
use Prophecy\Exception\Prediction\PredictionException;
use Prophecy\Prophecy\ObjectProphecy;
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

class AggregateExceptionSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(null);
    }

    function it_is_prediction_exception()
    {
        $this->shouldBeAnInstanceOf('RuntimeException');
        $this->shouldBeAnInstanceOf('Prophecy\Exception\Prediction\PredictionException');
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Prophecy\ObjectProphecy $object
     */
    function it_can_store_objectProphecy_link($object)
=======
    function it_can_store_objectProphecy_link(ObjectProphecy $object)
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    {
        $this->setObjectProphecy($object);
        $this->getObjectProphecy()->shouldReturn($object);
    }

    function it_should_not_have_exceptions_at_the_beginning()
    {
        $this->getExceptions()->shouldHaveCount(0);
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Exception\Prediction\PredictionException $exception
     */
    function it_should_append_exception_through_append_method($exception)
=======
    function it_should_append_exception_through_append_method(PredictionException $exception)
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    {
        $exception->getMessage()->willReturn('Exception #1');

        $this->append($exception);

        $this->getExceptions()->shouldReturn(array($exception));
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Exception\Prediction\PredictionException $exception
     */
    function it_should_update_message_during_append($exception)
=======
    function it_should_update_message_during_append(PredictionException $exception)
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    {
        $exception->getMessage()->willReturn('Exception #1');

        $this->append($exception);

        $this->getMessage()->shouldReturn("  Exception #1");
    }
}
