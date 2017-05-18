<?php

namespace spec\Prophecy\Doubler\Generator;

use PhpSpec\ObjectBehavior;
<<<<<<< HEAD

class ClassCreatorSpec extends ObjectBehavior
{
    /**
     * @param \Prophecy\Doubler\Generator\ClassCodeGenerator $generator
     */
    function let($generator)
=======
use Prophecy\Doubler\Generator\ClassCodeGenerator;
use Prophecy\Doubler\Generator\Node\ClassNode;

class ClassCreatorSpec extends ObjectBehavior
{
    function let(ClassCodeGenerator $generator)
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    {
        $this->beConstructedWith($generator);
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Doubler\Generator\Node\ClassNode $class
     */
    function it_evaluates_code_generated_by_ClassCodeGenerator($generator, $class)
=======
    function it_evaluates_code_generated_by_ClassCodeGenerator($generator, ClassNode $class)
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    {
        $generator->generate('stdClass', $class)->shouldBeCalled()->willReturn(
            'return 42;'
        );

        $this->create('stdClass', $class)->shouldReturn(42);
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Doubler\Generator\Node\ClassNode $class
     */
    function it_throws_an_exception_if_class_does_not_exist_after_evaluation($generator, $class)
=======
    function it_throws_an_exception_if_class_does_not_exist_after_evaluation($generator, ClassNode $class)
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    {
        $generator->generate('CustomClass', $class)->shouldBeCalled()->willReturn(
            'return 42;'
        );

        $class->getParentClass()->willReturn('stdClass');
        $class->getInterfaces()->willReturn(array('Interface1', 'Interface2'));

        $this->shouldThrow('Prophecy\Exception\Doubler\ClassCreatorException')
            ->duringCreate('CustomClass', $class);
    }
}
