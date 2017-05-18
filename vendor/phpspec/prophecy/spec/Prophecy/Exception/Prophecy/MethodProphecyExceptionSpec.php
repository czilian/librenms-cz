<?php

namespace spec\Prophecy\Exception\Prophecy;

use PhpSpec\ObjectBehavior;
<<<<<<< HEAD
=======
use Prophecy\Prophecy\MethodProphecy;
use Prophecy\Prophecy\ObjectProphecy;
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
use spec\Prophecy\Exception\Prophecy;

class MethodProphecyExceptionSpec extends ObjectBehavior
{
<<<<<<< HEAD
    /**
     * @param \Prophecy\Prophecy\ObjectProphecy $objectProphecy
     * @param \Prophecy\Prophecy\MethodProphecy $methodProphecy
     */
    function let($objectProphecy, $methodProphecy)
=======
    function let(ObjectProphecy $objectProphecy, MethodProphecy $methodProphecy)
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    {
        $methodProphecy->getObjectProphecy()->willReturn($objectProphecy);

        $this->beConstructedWith('message', $methodProphecy);
    }

    function it_extends_DoubleException()
    {
        $this->shouldBeAnInstanceOf('Prophecy\Exception\Prophecy\ObjectProphecyException');
    }

    function it_holds_a_stub_reference($methodProphecy)
    {
        $this->getMethodProphecy()->shouldReturn($methodProphecy);
    }
}
