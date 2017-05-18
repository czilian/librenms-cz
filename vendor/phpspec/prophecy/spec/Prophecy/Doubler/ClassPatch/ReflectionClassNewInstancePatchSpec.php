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

class ReflectionClassNewInstancePatchSpec extends ObjectBehavior
{
    function it_is_a_patch()
    {
        $this->shouldBeAnInstanceOf('Prophecy\Doubler\ClassPatch\ClassPatchInterface');
    }

    function its_priority_is_50()
    {
        $this->getPriority()->shouldReturn(50);
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Doubler\Generator\Node\ClassNode $reflectionClassNode
     * @param \Prophecy\Doubler\Generator\Node\ClassNode $anotherClassNode
     */
    function it_supports_ReflectionClass_only($reflectionClassNode, $anotherClassNode)
=======
    function it_supports_ReflectionClass_only(ClassNode $reflectionClassNode, ClassNode $anotherClassNode)
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    {
        $reflectionClassNode->getParentClass()->willReturn('ReflectionClass');
        $anotherClassNode->getParentClass()->willReturn('stdClass');

        $this->supports($reflectionClassNode)->shouldReturn(true);
        $this->supports($anotherClassNode)->shouldReturn(false);
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Doubler\Generator\Node\ClassNode    $class
     * @param \Prophecy\Doubler\Generator\Node\MethodNode   $method
     * @param \Prophecy\Doubler\Generator\Node\ArgumentNode $arg1
     * @param \Prophecy\Doubler\Generator\Node\ArgumentNode $arg2
     */
    function it_makes_all_newInstance_arguments_optional($class, $method, $arg1, $arg2)
    {
=======
    function it_makes_all_newInstance_arguments_optional(
        ClassNode $class,
        MethodNode $method,
        ArgumentNode $arg1
    ) {
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        $class->getMethod('newInstance')->willReturn($method);
        $method->getArguments()->willReturn(array($arg1));
        $arg1->setDefault(null)->shouldBeCalled();

        $this->apply($class);
    }
}
