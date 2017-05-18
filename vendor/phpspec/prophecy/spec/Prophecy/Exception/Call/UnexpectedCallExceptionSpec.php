<?php

namespace spec\Prophecy\Exception\Call;

use PhpSpec\ObjectBehavior;
<<<<<<< HEAD
=======
use Prophecy\Prophecy\ObjectProphecy;
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
use spec\Prophecy\Exception\Prophecy\Prophecy;

class UnexpectedCallExceptionSpec extends ObjectBehavior
{
<<<<<<< HEAD
    /**
     * @param \Prophecy\Prophecy\ObjectProphecy $objectProphecy
     */
    function let($objectProphecy)
=======
    function let(ObjectProphecy $objectProphecy)
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    {
        $this->beConstructedWith('msg', $objectProphecy, 'getName', array('arg1', 'arg2'));
    }

    function it_is_prophecy_exception()
    {
        $this->shouldBeAnInstanceOf('Prophecy\Exception\Prophecy\ObjectProphecyException');
    }

    function it_exposes_method_name_through_getter()
    {
        $this->getMethodName()->shouldReturn('getName');
    }

    function it_exposes_arguments_through_getter()
    {
        $this->getArguments()->shouldReturn(array('arg1', 'arg2'));
    }
}
