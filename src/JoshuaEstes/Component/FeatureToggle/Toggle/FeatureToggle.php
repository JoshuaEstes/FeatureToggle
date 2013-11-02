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
     * @var OptionsResolver
     */
    protected $resolver;

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

    public function setOption($option, $value)
    {
        $this->options[$option] = $value;
        $this->resolve($this->options);
    }

    private function resolve(array $options = array())
    {
        $this->resolver = new OptionsResolver();
        $this->setDefaultOptions($this->resolver);
        $this->options = $this->resolver->resolve($options);
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
