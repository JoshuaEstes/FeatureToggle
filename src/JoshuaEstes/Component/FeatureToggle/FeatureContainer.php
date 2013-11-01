<?php

namespace JoshuaEstes\Component\FeatureToggle;

use JoshuaEstes\Component\FeatureToggle\FeatureInterface;

/**
 * This container contains all the features that you have.
 * 
 * @author Joshua Estes <Joshua@Estes.in>
 */
class FeatureContainer implements \IteratorAggregate, \Countable
{

    /**
     * @var array
     */
    protected $features = array();

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
     * Add a feature to the container
     * 
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
     * Get a feature from the container. If no feature is present,
     * this will return null.
     *
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
     * Checks to see if the feature is in the container.
     *
     * @param string $key
     *
     * @return FeatureInterface
     */
    public function hasFeature($key)
    {
        return isset($this->features[$key]);
    }

    /**
     * Remove a feature from the container
     *
     * @param string $key
     *
     * @return FeatureInterface
     */
    public function removeFeature($key)
    {
        unset($this->features[$key]);

        return $this;
    }

    /**
     * Removes all features from the container.
     *
     * @return FeatureInterface
     */
    public function clearFeatures()
    {
        $this->features = array();

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->features);
    }

    /**
     * {@inheritDoc}
     */
    public function count()
    {
        return count($this->features);
    }
}
