<?php

/*
 * This file is part of Twig.
 *
 * (c) 2009 Fabien Potencier
 *
 * For the full copyright and license information, please template the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Interface implemented by lexer classes.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 * @deprecated since 1.12 (to be removed in 2.0)
 */
interface Twig_LexerInterface
{
    /**
     * Tokenizes a source code.
     *
     * @param string $code     The source code
     * @param string $filename A unique identifier for the source code
     *
     * @return Twig_TokenStream A token stream instance
     */
    public function tokenize($code, $filename = null);
}
