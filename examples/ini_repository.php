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

$f = $repo->get('enable_test_feature');
if (null !== $f) {
    var_dump($f->isEnabled());
}

$feature = new Feature('enable_test_feature');
$feature = $repo->add($feature);
$feature->getToggle()->setOption('enabled', true);
$repo->update($feature);
