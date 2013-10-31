<?php

namespace JoshuaEstes\Component\FeatureToggle\Toggle;

/**
 * All toggles must implement this interface
 *
 * @author Joshua Estes <Joshua@Estes.in>
 */
interface FeatureToggleInterface
{

    /**
     * @return boolean
     */
    public function isEnabled();
}
