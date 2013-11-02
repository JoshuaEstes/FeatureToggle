<?php

namespace JoshuaEstes\Component\FeatureToggle\Toggle;

/**
 * @author Joshua Estes <Joshua@Estes.in>
 */
interface FeatureToggleInterface extends \Serializable
{

    /**
     * This will return true or false if this toggle is enabled
     * or disabled.
     * 
     * @return boolean
     */
    public function isEnabled();
}
