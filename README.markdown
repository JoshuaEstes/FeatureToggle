joshuaestes/feature-toggle
==========================

[![Build Status](https://travis-ci.org/JoshuaEstes/FeatureToggle.png?branch=master)](https://travis-ci.org/JoshuaEstes/FeatureToggle)

This is just a small proof of concept that can be used
to create feature toggles.

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

# Feature Bag

Now you can place your features in a bag!

    use JoshuaEstes\Component\FeatureToggle\FeatureBag;
    use JoshuaEstes\Component\FeatureToggle\Feature;

    $bag     = new FeatureBag();
    $feature = new Feature('enable_a_cool_new_feature');

    $bag->addFeature($feature);

    $coolNewFeature = $bag->getFeature('enable_a_cool_new_feature');

    $thisIsNull = $bag->getFeature('does_not_compute');

    $thisIsFalse = $bag->hasFeature('enable_that_sweet_new_feature');
    $thisIsTrue  = $bag->hasFeature('enable_a_cool_new_feature');
    
# Testing

    php vendor/bin/phing -f build/build.xml phpunit

