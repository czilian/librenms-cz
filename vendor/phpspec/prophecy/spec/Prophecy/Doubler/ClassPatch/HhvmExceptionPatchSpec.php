<?php

namespace spec\Prophecy\Doubler\ClassPatch;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
<<<<<<< HEAD
=======
use Prophecy\Doubler\Generator\Node\ClassNode;
use Prophecy\Doubler\Generator\Node\MethodNode;
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

class HhvmExceptionPatchSpec extends ObjectBehavior
{
    function it_is_a_patch()
    {
        $this->shouldBeAnInstanceOf('Prophecy\Doubler\ClassPatch\ClassPatchInterface');
    }

    function its_priority_is_minus_50()
    {
        $this->getPriority()->shouldReturn(-50);
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Doubler\Generator\Node\ClassNode  $node
     * @param \Prophecy\Doubler\Generator\Node\MethodNode $method
     * @param \Prophecy\Doubler\Generator\Node\MethodNode $getterMethod
     */
    function it_uses_parent_code_for_setTraceOptions($node, $method, $getterMethod)
=======
    function it_uses_parent_code_for_setTraceOptions(ClassNode $node, MethodNode $method, MethodNode $getterMethod)
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    {
        $node->hasMethod('setTraceOptions')->willReturn(true);
        $node->getMethod('setTraceOptions')->willReturn($method);
        $node->hasMethod('getTraceOptions')->willReturn(true);
        $node->getMethod('getTraceOptions')->willReturn($getterMethod);

        $method->useParentCode()->shouldBeCalled();
        $getterMethod->useParentCode()->shouldBeCalled();

        $this->apply($node);
    }
}
