<?php

namespace JoshuaEstes\Component\FeatureToggle\Toggle;

use JoshuaEstes\Component\FeatureToggle\FeatureInterface;

/**
 * @author Joshua Estes <Joshua@Estes.in>
 */
interface FeatureToggleInterface extends \Serializable
{

    /**
     * This will return true or false if this toggle is enabled
     * or disabled.
     *
     * @param FeatureInterface $feature
     * 
     * @return boolean
     */
    public function isEnabled(FeatureInterface $feature);
}
