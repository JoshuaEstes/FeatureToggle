<?php

namespace JoshuaEstes\Component\FeatureToggle;

use JoshuaEstes\Component\FeatureToggle\Toggle\FeatureToggleInterface;
use JoshuaEstes\Component\FeatureToggle\FeatureInterface;
use JoshuaEstes\Component\FeatureToggle\Toggle\FeatureToggleGeneric;

/**
 * Class that helps you build a feature object
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
     * @var array
     */
    private $options = array();

    /**
     * @param string $key
     */
    public function __construct($key = null)
    {
        $this->key = $key;
    }

    /**
     * @return FeatureBuilder
     */
    public static function create($key = null)
    {
        return new self($key);
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
            $this->toggle = new FeatureToggleGeneric(
                array(
                    'enabled' => false,
                )
            );
        }

        $feature = new Feature($this->options);
        $feature->setKey($this->key);
        $feature->setToggle($this->toggle);
        $feature->setDescription($this->description);

        return $feature;
    }
}
