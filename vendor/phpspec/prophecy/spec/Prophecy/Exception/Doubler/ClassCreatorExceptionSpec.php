<?php

namespace spec\Prophecy\Exception\Doubler;

use PhpSpec\ObjectBehavior;
<<<<<<< HEAD
=======
use Prophecy\Doubler\Generator\Node\ClassNode;
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
use spec\Prophecy\Exception\Prophecy;

class ClassCreatorExceptionSpec extends ObjectBehavior
{
<<<<<<< HEAD
    /**
     * @param \Prophecy\Doubler\Generator\Node\ClassNode $node
     */
    function let($node)
=======
    function let(ClassNode $node)
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    {
        $this->beConstructedWith('', $node);
    }

    function it_is_a_prophecy_exception()
    {
        $this->shouldBeAnInstanceOf('Prophecy\Exception\Exception');
        $this->shouldBeAnInstanceOf('Prophecy\Exception\Doubler\DoublerException');
    }

    function it_contains_a_reflected_node($node)
    {
        $this->getClassNode()->shouldReturn($node);
    }
}
