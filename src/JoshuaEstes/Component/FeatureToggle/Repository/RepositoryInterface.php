<?php

namespace JoshuaEstes\Component\FeatureToggle\Repository;

use JoshuaEstes\Component\FeatureToggle\FeatureContainer;
use JoshuaEstes\Component\FeatureToggle\FeatureInterface;

/**
 * Interface that all other repositories need to implement which
 * will take care of storing the states of features.
 *
 * @author Joshua Estes <Joshua@Estes.in>
 */
interface RepositoryInterface
{

    /**
     * @param string $key
     *
     * @return FeatureInterface
     */
    public function get($key);

    /**
     * @param FeatureInterface $feature
     *
     * @return FeatureInterface
     */
    public function add(FeatureInterface $feature);

    /**
     * @param FeatureInterface $feature
     *
     * @return FeatureInterface
     */
    public function update(FeatureInterface $feature);

    /**
     * @param string $key
     */
    public function delete($key);

    /**
     * @return FeatureContainer
     */
    public function all();
}
