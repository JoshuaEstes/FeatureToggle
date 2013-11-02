<?php

namespace JoshuaEstes\Component\FeatureToggle;

use JoshuaEstes\Component\FeatureToggle\Toggle\FeatureToggleInterface;
use JoshuaEstes\Component\FeatureToggle\Toggle\FeatureToggleGeneric;

/**
 * Object that represents a feature in the system.
 *
 * @author Joshua Estes <Joshua@Estes.in>
 */
class Feature implements FeatureInterface
{

    /**
     * @var string
     */
    protected $key;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var FeatureToggleInterface
     */
    protected $toggle;

    /**
     * Create a new feature
     *
     * @param string                 $key
     * @param FeatureToggleInterface $toggle
     */
    public function __construct($key, FeatureToggleInterface $toggle = null)
    {
        $this->key    = $key;
        $this->toggle = $toggle ? $toggle : new FeatureToggleGeneric(array('enabled'=>false));
    }

    /**
     * {@inheritDoc}
     */
    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * {@inheritDoc}
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * {@inheritDoc}
     */
    public function setToggle(FeatureToggleInterface $toggle)
    {
        $this->toggle = $toggle;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getToggle()
    {
        return $this->toggle;
    }

    /**
     * {@inheritDoc}
     */
    public function isEnabled()
    {
        return $this->toggle->isEnabled();
    }
}
