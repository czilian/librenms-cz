<?php

namespace spec\Prophecy\Exception\Prophecy;

use PhpSpec\ObjectBehavior;
<<<<<<< HEAD
use spec\Prophecy\Exception\Prophecy;

class ObjectProphecyExceptionSpec extends ObjectBehavior
{
    /**
     * @param \Prophecy\Prophecy\ObjectProphecy $objectProphecy
     */
    function let($objectProphecy)
=======
use Prophecy\Prophecy\ObjectProphecy;

class ObjectProphecyExceptionSpec extends ObjectBehavior
{
    function let(ObjectProphecy $objectProphecy)
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    {
        $this->beConstructedWith('message', $objectProphecy);
    }

    function it_should_be_a_prophecy_exception()
    {
        $this->shouldBeAnInstanceOf('Prophecy\Exception\Prophecy\ProphecyException');
    }

    function it_holds_double_reference($objectProphecy)
    {
        $this->getObjectProphecy()->shouldReturn($objectProphecy);
    }
}
