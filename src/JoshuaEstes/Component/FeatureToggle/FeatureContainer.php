<?php

namespace JoshuaEstes\Component\FeatureToggle;

use JoshuaEstes\Component\FeatureToggle\FeatureInterface;
use Doctrine\Common\Collections\ArrayCollection;

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
    protected $features;

    /**
     * You can pass an array of Feature objects into the construct
     * to populate the feature list already.
     *
     * @param array $features
     */
    public function __construct(array $features = array())
    {
        $this->features = new ArrayCollection();
        foreach ($features as $feature) {
            if ($feature instanceof FeatureInterface) {
                $this->addFeature($feature);
            } else {
                throw new \Exception(
                    'The array you passed in must contain FeatureInterface objects'
                );
            }
        }
    }

    /**
     * Returns the collection of every feature this container has
     *
     * @return ArrayCollection
     */
    public function getAllFeatures()
    {
        return $this->features;
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
        $this->features->set($feature->getKey(), $feature);

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
        return $this->features->get($key);
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
        return $this->features->containsKey($key);
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
        $this->features->remove($key);

        return $this;
    }

    /**
     * Removes all features from the container.
     *
     * @return FeatureInterface
     */
    public function clearFeatures()
    {
        $this->features->clear();

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getIterator()
    {
        return $this->features->getIterator();
    }

    /**
     * {@inheritDoc}
     */
    public function count()
    {
        return $this->features->count();
    }
}
