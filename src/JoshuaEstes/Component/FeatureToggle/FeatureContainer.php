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
