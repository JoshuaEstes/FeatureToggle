<?php

namespace JoshuaEstes\Component\FeatureToggle\Toggle;

use JoshuaEstes\Component\FeatureToggle\Toggle\FeatureToggle;
use JoshuaEstes\Component\FeatureToggle\FeatureInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

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
    protected function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'enabled' => false,
            )
        );

        $resolver->setAllowedTypes(
            array(
                'enabled' => 'bool',
            )
        );
    }

    /**
     * {@inheritDoc}
     */
    public function isEnabled(FeatureInterface $feature)
    {
        return $this->options['enabled'];
    }
}
