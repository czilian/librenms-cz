<?php

namespace spec\Prophecy\Argument\Token;

use PhpSpec\ObjectBehavior;
<<<<<<< HEAD
=======
use Prophecy\Argument\Token\TokenInterface;
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

class TypeTokenSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('integer');
    }

    function it_implements_TokenInterface()
    {
        $this->shouldBeAnInstanceOf('Prophecy\Argument\Token\TokenInterface');
    }

    function it_is_not_last()
    {
        $this->shouldNotBeLast();
    }

    function it_scores_5_if_argument_matches_simple_type()
    {
        $this->beConstructedWith('integer');

        $this->scoreArgument(42)->shouldReturn(5);
    }

    function it_does_not_scores_if_argument_does_not_match_simple_type()
    {
        $this->beConstructedWith('integer');

        $this->scoreArgument(42.0)->shouldReturn(false);
    }

<<<<<<< HEAD
    /**
     * @param \ReflectionObject $object
     */
    function it_scores_5_if_argument_is_an_instance_of_specified_class($object)
=======
    function it_scores_5_if_argument_is_an_instance_of_specified_class(\ReflectionObject $object)
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    {
        $this->beConstructedWith('ReflectionClass');

        $this->scoreArgument($object)->shouldReturn(5);
    }

    function it_has_simple_string_representation()
    {
        $this->__toString()->shouldReturn('type(integer)');
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Argument\Token\TokenInterface $interface
     */
    function it_scores_5_if_argument_is_an_instance_of_specified_interface($interface)
=======
    function it_scores_5_if_argument_is_an_instance_of_specified_interface(TokenInterface $interface)
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    {
        $this->beConstructedWith('Prophecy\Argument\Token\TokenInterface');

        $this->scoreArgument($interface)->shouldReturn(5);
    }
}
