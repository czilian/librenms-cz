<?php

namespace spec\Prophecy\Doubler;

use PhpSpec\ObjectBehavior;
<<<<<<< HEAD

class LazyDoubleSpec extends ObjectBehavior
{
    /**
     * @param \Prophecy\Doubler\Doubler $doubler
     */
    function let($doubler)
=======
use Prophecy\Doubler\Doubler;
use Prophecy\Prophecy\ProphecySubjectInterface;

class LazyDoubleSpec extends ObjectBehavior
{
    function let(Doubler $doubler)
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    {
        $this->beConstructedWith($doubler);
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Prophecy\ProphecySubjectInterface $double
     */
    function it_returns_anonymous_double_instance_by_default($doubler, $double)
=======
    function it_returns_anonymous_double_instance_by_default($doubler, ProphecySubjectInterface $double)
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    {
        $doubler->double(null, array())->willReturn($double);

        $this->getInstance()->shouldReturn($double);
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Prophecy\ProphecySubjectInterface $double
     * @param \ReflectionClass                            $class
     */
    function it_returns_class_double_instance_if_set($doubler, $double, $class)
=======
    function it_returns_class_double_instance_if_set($doubler, ProphecySubjectInterface $double, \ReflectionClass $class)
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    {
        $doubler->double($class, array())->willReturn($double);

        $this->setParentClass($class);

        $this->getInstance()->shouldReturn($double);
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Prophecy\ProphecySubjectInterface $double1
     * @param \Prophecy\Prophecy\ProphecySubjectInterface $double2
     */
    function it_returns_same_double_instance_if_called_2_times(
        $doubler, $double1, $double2
    )
    {
=======
    function it_returns_same_double_instance_if_called_2_times(
        $doubler,
        ProphecySubjectInterface $double1,
        ProphecySubjectInterface $double2
    ) {
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        $doubler->double(null, array())->willReturn($double1);
        $doubler->double(null, array())->willReturn($double2);

        $this->getInstance()->shouldReturn($double2);
        $this->getInstance()->shouldReturn($double2);
    }

    function its_setParentClass_throws_ClassNotFoundException_if_class_not_found()
    {
        $this->shouldThrow('Prophecy\Exception\Doubler\ClassNotFoundException')
            ->duringSetParentClass('SomeUnexistingClass');
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Prophecy\ProphecySubjectInterface $double
     */
    function its_setParentClass_throws_exception_if_prophecy_is_already_created(
        $doubler, $double
    )
    {
=======
    function its_setParentClass_throws_exception_if_prophecy_is_already_created(
        $doubler,
        ProphecySubjectInterface $double
    ) {
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        $doubler->double(null, array())->willReturn($double);

        $this->getInstance();

        $this->shouldThrow('Prophecy\Exception\Doubler\DoubleException')
            ->duringSetParentClass('stdClass');
    }

    function its_addInterface_throws_InterfaceNotFoundException_if_no_interface_found()
    {
        $this->shouldThrow('Prophecy\Exception\Doubler\InterfaceNotFoundException')
            ->duringAddInterface('SomeUnexistingInterface');
    }

<<<<<<< HEAD
    /**
     * @param \Prophecy\Prophecy\ProphecySubjectInterface $double
     */
    function its_addInterface_throws_exception_if_prophecy_is_already_created(
        $doubler, $double
    )
    {
=======
    function its_addInterface_throws_exception_if_prophecy_is_already_created(
        $doubler,
        ProphecySubjectInterface $double
    ) {
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        $doubler->double(null, array())->willReturn($double);

        $this->getInstance();

        $this->shouldThrow('Prophecy\Exception\Doubler\DoubleException')
            ->duringAddInterface('ArrayAccess');
    }
}
