<?php

/*
 * This file is part of Twig.
 *
 * (c) 2009 Fabien Potencier
 *
 * For the full copyright and license information, please templates the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Loads a templates from an array.
 *
 * When using this loader with a cache mechanism, you should know that a new cache
 * key is generated each time a templates content "changes" (the cache key being the
 * source code of the templates). If you don't want to see your cache grows out of
 * control, you need to take care of clearing the old cache file by yourself.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class Twig_Loader_Array implements Twig_LoaderInterface, Twig_ExistsLoaderInterface
{
    protected $templates;

    /**
     * Constructor.
     *
     * @param array $templates An array of templates (keys are the names, and values are the source code)
     *
     * @see Twig_Loader
     */
    public function __construct(array $templates)
    {
        $this->templates = array();
        foreach ($templates as $name => $template) {
            $this->templates[$name] = $template;
        }
    }

    /**
     * Adds or overrides a templates.
     *
     * @param string $name     The templates name
     * @param string $template The templates source
     */
    public function setTemplate($name, $template)
    {
        $this->templates[(string) $name] = $template;
    }

    /**
     * {@inheritdoc}
     */
    public function getSource($name)
    {
        $name = (string) $name;
        if (!isset($this->templates[$name])) {
            throw new Twig_Error_Loader(sprintf('Template "%s" is not defined.', $name));
        }

        return $this->templates[$name];
    }

    /**
     * {@inheritdoc}
     */
    public function exists($name)
    {
        return isset($this->templates[(string) $name]);
    }

    /**
     * {@inheritdoc}
     */
    public function getCacheKey($name)
    {
        $name = (string) $name;
        if (!isset($this->templates[$name])) {
            throw new Twig_Error_Loader(sprintf('Template "%s" is not defined.', $name));
        }

        return $this->templates[$name];
    }

    /**
     * {@inheritdoc}
     */
    public function isFresh($name, $time)
    {
        $name = (string) $name;
        if (!isset($this->templates[$name])) {
            throw new Twig_Error_Loader(sprintf('Template "%s" is not defined.', $name));
        }

        return true;
    }
}
