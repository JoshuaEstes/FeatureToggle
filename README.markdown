joshuaestes/feature-toggle
==========================

[![Build Status](https://travis-ci.org/JoshuaEstes/FeatureToggle.png?branch=master)](https://travis-ci.org/JoshuaEstes/FeatureToggle)

This library allows you to easily add and modify various features to your code
while in development. Please read the information below on instructions on how
to use this library as well as how to customize and add to it for your own needs.

# Concepts

* **Features** are all unique and allows you to enable or disable each feature.
* **Toggles** are the logic behind whether a feature is enabled or not.
* **Repositories** allow you to persist features.

# Installation

To install, just add to your `composer.json` file.

    "require": {
        "joshuaestes/feature-toggle": "~0.1"
    },

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

    $feature = new Feature('enable_a_cool_new_feature', new FeatureToggleGeneric(array('enabled'=>true)));

This will now enabled the feature, when you call `isEnabled()` it will return `true`. The
other way to enable a feature is like so:

    $feature->setToggle(new FeatureToggleGeneric(array('enabled'=>true)));

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

# Creating Custom Features

All features must implement the [FeatureInterface](https://github.com/JoshuaEstes/FeatureToggle/blob/master/src/JoshuaEstes/Component/FeatureToggle/FeatureInterface.php).

In most situations you will only need to use the default `Feature`, however in
some situations you might want to create your own.

# Creating Custom Toggles

All toggles must implement the [FeatureToggleInterface](https://github.com/JoshuaEstes/FeatureToggle/blob/master/src/JoshuaEstes/Component/FeatureToggle/Toggle/FeatureToggleInterface.php).

By creating a custom toggle, you can change the logic for figuring out if a
feature is enable or not. Some ideas for custom toggles include:

* IP Based, can enable a feature if the user is on an internal network.
* Username, or something similar.
* Collection, a collection of toggles where it checks for any or all to be enable.
* Gradual, where you can release a feature to x% of a user base.

# Creating Custom Repository

All toggles must implement the [RepositoryInterface](https://github.com/JoshuaEstes/FeatureToggle/blob/master/src/JoshuaEstes/Component/FeatureToggle/Repository/RepositoryInterface.php).

Creating custom repositories allow you to store the states of the features
in anything from a database to a flat file store. Some ideas are:

* MySQL
* MongoDB
* SQLite

# Testing

    php vendor/bin/phing -f build/build.xml phpunit

