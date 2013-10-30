<?php

namespace JoshuaEstes\Component\FeatureToggle\Toggle;

/**
 */
interface FeatureToggleInterface
{

    /**
     * @return boolean
     */
    public function isEnabled();
}
