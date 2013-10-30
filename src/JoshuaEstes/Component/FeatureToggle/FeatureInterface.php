<?php

namespace JoshuaEstes\Component\FeatureToggle;

use JoshuaEstes\Component\FeatureToggle\Toggle\FeatureToggleInterface;

/**
 * All features must implement this interface.
 */
interface FeatureInterface
{

    /**
     * @param string $key
     */
    public function setKey($key);

    /**
     * @return string
     */
    public function getKey();

    /**
     * @param string $description
     */
    public function setDescription($description);

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @param FeatureToggleInterface $toggle
     */
    public function setToggle(FeatureToggleInterface $toggle);

    /**
     * @return FeatureToggleInterface
     */
    public function getToggle();

    /**
     * @return boolean
     */
    public function isEnabled();
}
