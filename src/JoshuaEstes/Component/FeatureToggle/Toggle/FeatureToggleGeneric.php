<?php

namespace JoshuaEstes\Component\FeatureToggle\Toggle;

use JoshuaEstes\Component\FeatureToggle\FeatureInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Used to easly add a feature that can be enabled or disabled
 * 
 * @author Joshua Estes <Joshua@Estes.in>
 */
class FeatureToggleGeneric extends FeatureToggle
{
    /**
     * {@inheritDoc}
     */
    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('enabled', false);

        $resolver->setAllowedTypes('enabled', 'bool');
    }

    /**
     * {@inheritDoc}
     */
    public function isEnabled(FeatureInterface $feature)
    {
        return $this->options['enabled'];
    }
}
