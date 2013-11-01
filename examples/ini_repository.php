<?php

require_once __DIR__ . '/../vendor/autoload.php';

use JoshuaEstes\Component\FeatureToggle\Repository\IniRepository;
use JoshuaEstes\Component\FeatureToggle\Feature;
use JoshuaEstes\Component\FeatureToggle\Toggle\FeatureToggleGeneric;

$repo = new IniRepository(
    array(
        'path' => '/tmp',
    )
);

$feature = new Feature('enable_test_feature');

$repo->add($feature);
