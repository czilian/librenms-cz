<?php

/*
 * This file is part of the Prophecy.
 * (c) Konstantin Kudryashov <ever.zet@gmail.com>
 *     Marcello Duarte <marcello.duarte@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Prophecy\Doubler\Generator;

/**
 * Class code creator.
 * Generates PHP code for specific class node tree.
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
class ClassCodeGenerator
{
    /**
     * Generates PHP code for class node.
     *
     * @param string         $classname
     * @param Node\ClassNode $class
     *
     * @return string
     */
    public function generate($classname, Node\ClassNode $class)
    {
        $parts     = explode('\\', $classname);
        $classname = array_pop($parts);
        $namespace = implode('\\', $parts);

        $code = sprintf("class %s extends \%s implements %s {\n",
            $classname, $class->getParentClass(), implode(', ',
                array_map(function ($interface) {return '\\'.$interface;}, $class->getInterfaces())
            )
        );

        foreach ($class->getProperties() as $name => $visibility) {
            $code .= sprintf("%s \$%s;\n", $visibility, $name);
        }
        $code .= "\n";

        foreach ($class->getMethods() as $method) {
            $code .= $this->generateMethod($method)."\n";
        }
        $code .= "\n}";

        return sprintf("namespace %s {\n%s\n}", $namespace, $code);
    }

    private function generateMethod(Node\MethodNode $method)
    {
        $php = sprintf("%s %s function %s%s(%s)%s {\n",
            $method->getVisibility(),
            $method->isStatic() ? 'static' : '',
            $method->returnsReference() ? '&':'',
            $method->getName(),
            implode(', ', $this->generateArguments($method->getArguments())),
<<<<<<< HEAD
            version_compare(PHP_VERSION, '7.0', '>=') && $method->hasReturnType()
                ? sprintf(': %s', $method->getReturnType())
                : ''
=======
            $this->getReturnType($method)
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        );
        $php .= $method->getCode()."\n";

        return $php.'}';
    }

<<<<<<< HEAD
=======
    /**
     * @return string
     */
    private function getReturnType(Node\MethodNode $method)
    {
        if (version_compare(PHP_VERSION, '7.1', '>=')) {
            if ($method->hasReturnType()) {
                return $method->hasNullableReturnType()
                    ? sprintf(': ?%s', $method->getReturnType())
                    : sprintf(': %s', $method->getReturnType());
            }
        }

        if (version_compare(PHP_VERSION, '7.0', '>=')) {
            return $method->hasReturnType() && $method->getReturnType() !== 'void'
                ? sprintf(': %s', $method->getReturnType())
                : '';
        }

        return '';
    }

>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    private function generateArguments(array $arguments)
    {
        return array_map(function (Node\ArgumentNode $argument) {
            $php = '';

<<<<<<< HEAD
=======
            if (version_compare(PHP_VERSION, '7.1', '>=')) {
                $php .= $argument->isNullable() ? '?' : '';
            }

>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
            if ($hint = $argument->getTypeHint()) {
                switch ($hint) {
                    case 'array':
                    case 'callable':
                        $php .= $hint;
                        break;

<<<<<<< HEAD
=======
                    case 'iterable':
                        if (version_compare(PHP_VERSION, '7.1', '>=')) {
                            $php .= $hint;
                            break;
                        }

                        $php .= '\\'.$hint;
                        break;

>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
                    case 'string':
                    case 'int':
                    case 'float':
                    case 'bool':
                        if (version_compare(PHP_VERSION, '7.0', '>=')) {
                            $php .= $hint;
                            break;
                        }
                        // Fall-through to default case for PHP 5.x

                    default:
                        $php .= '\\'.$hint;
                }
            }

            $php .= ' '.($argument->isPassedByReference() ? '&' : '');

            $php .= $argument->isVariadic() ? '...' : '';

            $php .= '$'.$argument->getName();

            if ($argument->isOptional() && !$argument->isVariadic()) {
                $php .= ' = '.var_export($argument->getDefault(), true);
            }

            return $php;
        }, $arguments);
    }
}
