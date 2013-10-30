<?php

namespace JoshuaEstes\Component\FeatureToggle;

use JoshuaEstes\Component\FeatureToggle\FeatureInterface;

/**
 * Now you too can have a bag full of features!
 */
class FeatureBag implements \IteratorAggregate
{

    /**
     * @var array
     */
    protected $features;

    /**
     * You can pass an array of Feature objects into the construct
     * to populate the feature list already.
     *
     * @param array $features
     */
    public function __construct(array $features = array())
    {
        foreach ($features as $feature) {
            $this->addFeature($feature);
        }
    }

    /**
     * @param FeatureInterface
     *
     * @return FeatureBag
     */
    public function addFeature(FeatureInterface $feature)
    {
        $this->features[$feature->getKey()] = $feature;

        return $this;
    }

    /**
     * @param string $key
     *
     * @return FeatureInterface|null
     */
    public function getFeature($key)
    {
        if (isset($this->features[$key])) {
            return $this->features[$key];
        }

        return null;
    }

    /**
     * @param string $key
     *
     * @return FeatureInterface
     */
    public function hasFeature($key)
    {
        return isset($this->features[$key]);
    }

    /**
     * {@inheritDoc}
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->features);
    }
}
