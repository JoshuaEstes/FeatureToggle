<?php

namespace JoshuaEstes\Component\FeatureToggle\Toggle;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * All features should extend this class. This provides some defaults that
 * help with feature toggles
 * 
 * @author Joshua Estes <Joshua@Estes.in>
 */
abstract class FeatureToggle implements FeatureToggleInterface
{

    /**
     * @var array
     */
    protected $options;

    /**
     * @param array $options
     */
    public function __construct(array $options = array())
    {
        $this->resolve($options);
    }

    /**
     * {@inheritDoc}
     */
    abstract protected function setDefaultOptions(OptionsResolverInterface $resolver);

    /**
     * Set or modify an option after the object has been initialized
     *
     * @param string $option
     * @param string $value
     */
    public function setOption($option, $value)
    {
        $this->options[$option] = $value;
        $this->resolve($this->options);
    }

    /**
     * Resolves the options that have been set to see if there are any issues.
     *
     * @param array $options
     */
    private function resolve(array $options = array())
    {
        $resolver = new OptionsResolver();
        $this->setDefaultOptions($resolver);
        $this->options = $resolver->resolve($options);
    }

    /**
     * {@inheritDoc}
     */
    public function serialize()
    {
        return serialize($this->options);
    }

    /**
     * {@inheritDoc}
     */
    public function unserialize($data)
    {
        $this->resolve(unserialize($data));
    }
}
