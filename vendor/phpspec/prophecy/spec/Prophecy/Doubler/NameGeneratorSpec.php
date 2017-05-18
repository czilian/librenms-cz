<?php

namespace spec\Prophecy\Doubler;

use PhpSpec\ObjectBehavior;

class NameGeneratorSpec extends ObjectBehavior
{
<<<<<<< HEAD
    /**
     * @param \ReflectionClass $class
     */
    function its_name_generates_name_based_on_simple_class_reflection($class)
=======
    function its_name_generates_name_based_on_simple_class_reflection(\ReflectionClass $class)
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    {
        $class->getName()->willReturn('stdClass');
        $this->name($class, array())->shouldStartWith('Double\stdClass\\');
    }

<<<<<<< HEAD
    /**
     * @param \ReflectionClass $class
     */
    function its_name_generates_name_based_on_namespaced_class_reflection($class)
=======
    function its_name_generates_name_based_on_namespaced_class_reflection(\ReflectionClass $class)
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    {
        $class->getName()->willReturn('Some\Custom\Class');
        $this->name($class, array())->shouldStartWith('Double\Some\Custom\Class\P');
    }

<<<<<<< HEAD
    /**
     * @param \ReflectionClass $interface1
     * @param \ReflectionClass $interface2
     */
    function its_name_generates_name_based_on_interface_shortnames($interface1, $interface2)
    {
=======
    function its_name_generates_name_based_on_interface_shortnames(
        \ReflectionClass $interface1,
        \ReflectionClass $interface2
    ) {
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        $interface1->getShortName()->willReturn('HandlerInterface');
        $interface2->getShortName()->willReturn('LoaderInterface');

        $this->name(null, array($interface1, $interface2))->shouldStartWith(
            'Double\HandlerInterface\LoaderInterface\P'
        );
    }

    function it_generates_proper_name_for_no_class_and_interfaces_list()
    {
        $this->name(null, array())->shouldStartWith('Double\stdClass\P');
    }

<<<<<<< HEAD
    /**
     * @param \ReflectionClass $class
     * @param \ReflectionClass $interface1
     * @param \ReflectionClass $interface2
     */
    function its_name_generates_name_based_only_on_class_if_its_available(
        $class, $interface1, $interface2
    )
    {
=======
    function its_name_generates_name_based_only_on_class_if_its_available(
        \ReflectionClass $class,
        \ReflectionClass $interface1,
        \ReflectionClass $interface2
    ) {
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        $class->getName()->willReturn('Some\Custom\Class');
        $interface1->getShortName()->willReturn('HandlerInterface');
        $interface2->getShortName()->willReturn('LoaderInterface');

        $this->name($class, array($interface1, $interface2))->shouldStartWith(
            'Double\Some\Custom\Class\P'
        );
    }

    public function getMatchers()
    {
        return array(
            'startWith' => function ($subject, $string) {
                return 0 === strpos($subject, $string);
            },
        );
    }
}
