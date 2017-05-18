<?php

namespace spec\Prophecy\Prediction;

use PhpSpec\ObjectBehavior;

<<<<<<< HEAD
=======
use Prophecy\Call\Call;
use Prophecy\Prophecy\MethodProphecy;
use Prophecy\Prophecy\ObjectProphecy;
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
use RuntimeException;

class CallbackPredictionSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('get_class');
    }

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
    function it_proxies_call_to_callback($object, $method, $call)
=======
    function it_proxies_call_to_callback(ObjectProphecy $object, MethodProphecy $method, Call $call)
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    {
        $returnFirstCallCallback = function ($calls, $object, $method) {
            throw new RuntimeException;
        };

        $this->beConstructedWith($returnFirstCallCallback);

        $this->shouldThrow('RuntimeException')->duringCheck(array($call), $object, $method);
    }
}
