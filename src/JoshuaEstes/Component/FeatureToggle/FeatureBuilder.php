<?php

namespace JoshuaEstes\Component\FeatureToggle;

use JoshuaEstes\Component\FeatureToggle\Toggle\FeatureToggleInterface;
use JoshuaEstes\Component\FeatureToggle\FeatureInterface;

/**
 */
class FeatureBuilder
{
    private $key;
    private $description;
    private $toggle;

    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    public function setFeatureToggle(FeatureToggleInterface $toggle)
    {
        $this->toggle = $toggle;

        return $this;
    }

    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    public function create()
    {
        if (null === $this->key) {
            throw new \Exception('Must set the feature key.');
        }

        if (null === $this->toggle) {
            throw new \Exception('Must set the feature toggle.');
        }

        $feature = new Feature();
        $feature->setKey($this->key);
        $feature->setToggle($this->toggle);
        $feature->setDescription($this->description);

        return $feature;
    }
}
