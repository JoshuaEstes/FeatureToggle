<?php

namespace JoshuaEstes\Component\FeatureToggle;

use JoshuaEstes\Component\FeatureToggle\Toggle\FeatureToggleInterface;
use JoshuaEstes\Component\FeatureToggle\FeatureInterface;

/**
 */
class FeatureBuilder
{

    /**
     * @var string
     */
    private $key;

    /**
     * @var string
     */
    private $description;


    /**
     * @var FeatureToggleInterface
     */
    private $toggle;

    /**
     * @return FeatureBuilder
     */
    public static function create()
    {
        return new self();
    }

    /**
     * @param string $key
     *
     * @return FeatureBuilder
     */
    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * @param FeatureToggleInterface $toggle
     *
     * @return FeatureBuilder
     */
    public function setFeatureToggle(FeatureToggleInterface $toggle)
    {
        $this->toggle = $toggle;

        return $this;
    }

    /**
     * @param string $description
     *
     * @return FeatureBuilder
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return FeatureInterface
     */
    public function getFeature()
    {
        if (null === $this->key) {
            throw new \Exception('Must set the feature key.');
        }

        if (null === $this->toggle) {
            throw new \Exception('Must set the feature toggle.');
        }

        $feature = new Feature($this->key);
        $feature->setKey($this->key);
        $feature->setToggle($this->toggle);
        $feature->setDescription($this->description);

        return $feature;
    }
}
