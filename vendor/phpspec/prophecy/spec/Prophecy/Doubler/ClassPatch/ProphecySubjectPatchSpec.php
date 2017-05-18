<?php

namespace spec\Prophecy\Doubler\ClassPatch;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
<<<<<<< HEAD
=======
use Prophecy\Doubler\Generator\Node\ClassNode;
use Prophecy\Doubler\Generator\Node\MethodNode;
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

class ProphecySubjectPatchSpec extends ObjectBehavior
{
    function it_is_a_patch()
    {
        $this->shouldBeAnInstanceOf('Prophecy\Doubler\ClassPatch\ClassPatchInterface');
    }

    function it_has_priority_of_0()
    {
        $this->getPriority()->shouldReturn(0);
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Doubler\Generator\Node\ClassNode $node
     */
    function it_supports_any_class($node)
=======
    function it_supports_any_class(ClassNode $node)
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    {
        $this->supports($node)->shouldReturn(true);
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Doubler\Generator\Node\ClassNode $node
     */
    function it_forces_class_to_implement_ProphecySubjectInterface($node)
=======
    function it_forces_class_to_implement_ProphecySubjectInterface(ClassNode $node)
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    {
        $node->addInterface('Prophecy\Prophecy\ProphecySubjectInterface')->shouldBeCalled();

        $node->addProperty('objectProphecy', 'private')->willReturn(null);
        $node->getMethods()->willReturn(array());
        $node->hasMethod(Argument::any())->willReturn(false);
        $node->addMethod(Argument::type('Prophecy\Doubler\Generator\Node\MethodNode'))->willReturn(null);
        $node->addMethod(Argument::type('Prophecy\Doubler\Generator\Node\MethodNode'))->willReturn(null);

        $this->apply($node);
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Doubler\Generator\Node\ClassNode  $node
     * @param \Prophecy\Doubler\Generator\Node\MethodNode $constructor
     * @param \Prophecy\Doubler\Generator\Node\MethodNode $method1
     * @param \Prophecy\Doubler\Generator\Node\MethodNode $method2
     * @param \Prophecy\Doubler\Generator\Node\MethodNode $method3
     */
    function it_forces_all_class_methods_except_constructor_to_proxy_calls_into_prophecy_makeCall(
        $node, $constructor, $method1, $method2, $method3
    )
    {
=======
    function it_forces_all_class_methods_except_constructor_to_proxy_calls_into_prophecy_makeCall(
        ClassNode $node,
        MethodNode $constructor,
        MethodNode $method1,
        MethodNode $method2,
        MethodNode $method3
    ) {
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        $node->addInterface('Prophecy\Prophecy\ProphecySubjectInterface')->willReturn(null);
        $node->addProperty('objectProphecy', 'private')->willReturn(null);
        $node->hasMethod(Argument::any())->willReturn(false);
        $node->addMethod(Argument::type('Prophecy\Doubler\Generator\Node\MethodNode'))->willReturn(null);
        $node->addMethod(Argument::type('Prophecy\Doubler\Generator\Node\MethodNode'))->willReturn(null);

        $constructor->getName()->willReturn('__construct');
        $method1->getName()->willReturn('method1');
        $method2->getName()->willReturn('method2');
        $method3->getName()->willReturn('method3');

<<<<<<< HEAD
=======
        $method1->getReturnType()->willReturn('int');
        $method2->getReturnType()->willReturn('int');
        $method3->getReturnType()->willReturn('void');

>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        $node->getMethods()->willReturn(array(
            'method1' => $method1,
            'method2' => $method2,
            'method3' => $method3,
        ));

        $constructor->setCode(Argument::any())->shouldNotBeCalled();

        $method1->setCode('return $this->getProphecy()->makeProphecyMethodCall(__FUNCTION__, func_get_args());')
            ->shouldBeCalled();
        $method2->setCode('return $this->getProphecy()->makeProphecyMethodCall(__FUNCTION__, func_get_args());')
            ->shouldBeCalled();
<<<<<<< HEAD
        $method3->setCode('return $this->getProphecy()->makeProphecyMethodCall(__FUNCTION__, func_get_args());')
=======
        $method3->setCode('$this->getProphecy()->makeProphecyMethodCall(__FUNCTION__, func_get_args());')
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
            ->shouldBeCalled();

        $this->apply($node);
    }
}
