<?php

namespace JoshuaEstes\Component\FeatureToggle;

use JoshuaEstes\Component\FeatureToggle\Toggle\FeatureToggleInterface;

/**
 * All features must implement this interface.
 * 
 * @author Joshua Estes <Joshua@Estes.in>
 */
interface FeatureInterface
{

    /**
     * The key is a unique identifier for the feature
     *
     * @param string $key
     */
    public function setKey($key);

    /**
     * @return string
     */
    public function getKey();

    /**
     * Descriptions can be set to allow users to get more information about
     * what the feature does.
     *
     * @param string $description
     */
    public function setDescription($description);

    /**
     * @return string
     */
    public function getDescription();

    /**
     * Sets a feature toggle that is responsible for figuring out how the
     * feature becomes enabled or disabled.
     *
     * @param FeatureToggleInterface $toggle
     */
    public function setToggle(FeatureToggleInterface $toggle);

    /**
     * @return FeatureToggleInterface
     */
    public function getToggle();

    /**
     * Checks to see if this feature is enabled or not.
     *
     * @return boolean
     */
    public function isEnabled();
}
