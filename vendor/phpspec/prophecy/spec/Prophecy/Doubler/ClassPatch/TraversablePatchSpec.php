<?php

namespace spec\Prophecy\Doubler\ClassPatch;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
<<<<<<< HEAD
=======
use Prophecy\Doubler\Generator\Node\ClassNode;
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

class TraversablePatchSpec extends ObjectBehavior
{
    function it_is_a_patch()
    {
        $this->shouldBeAnInstanceOf('Prophecy\Doubler\ClassPatch\ClassPatchInterface');
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Doubler\Generator\Node\ClassNode $node
     */
    function it_supports_class_that_implements_only_Traversable($node)
=======
    function it_supports_class_that_implements_only_Traversable(ClassNode $node)
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    {
        $node->getInterfaces()->willReturn(array('Traversable'));

        $this->supports($node)->shouldReturn(true);
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Doubler\Generator\Node\ClassNode $node
     */
    function it_does_not_support_class_that_implements_Iterator($node)
=======
    function it_does_not_support_class_that_implements_Iterator(ClassNode $node)
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    {
        $node->getInterfaces()->willReturn(array('Traversable', 'Iterator'));

        $this->supports($node)->shouldReturn(false);
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Doubler\Generator\Node\ClassNode $node
     */
    function it_does_not_support_class_that_implements_IteratorAggregate($node)
=======
    function it_does_not_support_class_that_implements_IteratorAggregate(ClassNode $node)
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    {
        $node->getInterfaces()->willReturn(array('Traversable', 'IteratorAggregate'));

        $this->supports($node)->shouldReturn(false);
    }

    function it_has_100_priority()
    {
        $this->getPriority()->shouldReturn(100);
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Doubler\Generator\Node\ClassNode $node
     */
    function it_forces_node_to_implement_IteratorAggregate($node)
=======
    function it_forces_node_to_implement_IteratorAggregate(ClassNode $node)
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    {
        $node->addInterface('Iterator')->shouldBeCalled();

        $node->addMethod(Argument::type('Prophecy\Doubler\Generator\Node\MethodNode'))->willReturn(null);

        $this->apply($node);
    }
}
