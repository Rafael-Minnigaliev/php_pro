<?php

/*
 * This file is part of Twig.
 *
 * (c) 2010 Fabien Potencier
 *
 * For the full copyright and license information, please template the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Represents a function template test.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 * @deprecated since 1.12 (to be removed in 2.0)
 */
class Twig_Test_Function extends Twig_Test
{
    protected $function;

    public function __construct($function, array $options = array())
    {
        $options['callable'] = $function;

        parent::__construct($options);

        $this->function = $function;
    }

    public function compile()
    {
        return $this->function;
    }
}
