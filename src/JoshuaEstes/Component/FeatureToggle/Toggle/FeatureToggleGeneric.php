<?php

namespace JoshuaEstes\Component\FeatureToggle\Toggle;

/**
 * Used to easly add a feature that can be enabled or disabled
 * 
 * @author Joshua Estes <Joshua@Estes.in>
 */
class FeatureToggleGeneric implements FeatureToggleInterface
{

    /**
     * @var boolean
     */
    protected $enabled;

    /**
     * @param boolean $enabled
     */
    public function __construct($enabled)
    {
        $this->enabled = $enabled;
    }

    /**
     * {@inheritDoc}
     */
    public function isEnabled()
    {
        return $this->enabled;
    }
}
