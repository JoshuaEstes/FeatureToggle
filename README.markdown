joshuaestes/feature-toggle
==========================

[![Build Status](https://travis-ci.org/JoshuaEstes/FeatureToggle.png?branch=master)](https://travis-ci.org/JoshuaEstes/FeatureToggle)

# Usage

    use JoshuaEstes\Component\FeatureToggle\Feature;

    $feature = new Feature('enable_a_cool_new_feature');

    if ($feature->isEnabled()) {
        // code for when the feature is enabled
    } else {
        // code for when the feature is disabled
    }

By default the feature is disabled. You will need to enabled the
feature. You are able to do this two different ways.

    use JoshuaEstes\Component\FeatureToggle\Toggle\FeatureToggleGeneric;

    $feature = new Feature('enable_a_cool_new_feature', new FeatureToggleGeneric(true));

This will now enabled the feature, when you call `isEnabled()` it will return `true`. The
other way to enable a feature is like so:

    $feature->setToggle(new FeatureToggleGeneric(true));

# Toggles

Various toggles can be created to allow enable or disable based on various
other conditions such as IP address, username, or anything else that you want
to make. It must implement `JoshuaEstes\Component\FeatureToggle\Toggle\FeatureToggleInterface`.

# Feature Container

The feature container is used to put all your features into one place where you
can easily loop through them.

    use JoshuaEstes\Component\FeatureToggle\FeatureContainer;
    use JoshuaEstes\Component\FeatureToggle\Feature;

    $container = new FeatureContainer();
    $feature   = new Feature('enable_a_cool_new_feature');

    $container->addFeature($feature);

    $coolNewFeature = $container->getFeature('enable_a_cool_new_feature');

    $thisIsNull = $container->getFeature('does_not_compute');

    $thisIsFalse = $container->hasFeature('enable_that_sweet_new_feature');
    $thisIsTrue  = $container->hasFeature('enable_a_cool_new_feature');

    $numberOfFeatures = count($container);

    foreach ($container as $f) {
        // @var FeatureInterface $f
        var_dump($f->isEnabled());
    }

You can read the source code for more methods that you can call, such as
`removeFeature` and `clearFeatures`.

# Testing

    php vendor/bin/phing -f build/build.xml phpunit

