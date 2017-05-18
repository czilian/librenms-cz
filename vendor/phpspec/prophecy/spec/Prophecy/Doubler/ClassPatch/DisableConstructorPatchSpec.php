<?php

namespace spec\Prophecy\Doubler\ClassPatch;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
<<<<<<< HEAD
=======
use Prophecy\Doubler\Generator\Node\ArgumentNode;
use Prophecy\Doubler\Generator\Node\ClassNode;
use Prophecy\Doubler\Generator\Node\MethodNode;
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

class DisableConstructorPatchSpec extends ObjectBehavior
{
    function it_is_a_patch()
    {
        $this->shouldBeAnInstanceOf('Prophecy\Doubler\ClassPatch\ClassPatchInterface');
    }

    function its_priority_is_100()
    {
        $this->getPriority()->shouldReturn(100);
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Doubler\Generator\Node\ClassNode $node
     */
    function it_supports_anything($node)
=======
    function it_supports_anything(ClassNode $node)
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    {
        $this->supports($node)->shouldReturn(true);
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Doubler\Generator\Node\ClassNode    $class
     * @param \Prophecy\Doubler\Generator\Node\MethodNode   $method
     * @param \Prophecy\Doubler\Generator\Node\ArgumentNode $arg1
     * @param \Prophecy\Doubler\Generator\Node\ArgumentNode $arg2
     */
    function it_makes_all_constructor_arguments_optional($class, $method, $arg1, $arg2)
    {
=======
    function it_makes_all_constructor_arguments_optional(
        ClassNode $class,
        MethodNode $method,
        ArgumentNode $arg1,
        ArgumentNode $arg2
    ) {
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        $class->hasMethod('__construct')->willReturn(true);
        $class->getMethod('__construct')->willReturn($method);
        $method->getArguments()->willReturn(array($arg1, $arg2));

        $arg1->setDefault(null)->shouldBeCalled();
        $arg2->setDefault(null)->shouldBeCalled();

        $method->setCode(Argument::type('string'))->shouldBeCalled();

        $this->apply($class);
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Doubler\Generator\Node\ClassNode $class
     */
    function it_creates_new_constructor_if_object_has_none($class)
=======
    function it_creates_new_constructor_if_object_has_none(ClassNode $class)
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    {
        $class->hasMethod('__construct')->willReturn(false);
        $class->addMethod(Argument::type('Prophecy\Doubler\Generator\Node\MethodNode'))
            ->shouldBeCalled();

        $this->apply($class);
    }
}
