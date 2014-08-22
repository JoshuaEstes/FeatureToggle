========
Features
========

A Feature is either enabled or disabled. It is enabled/disabled by the use of a
toggle.

-----------------
Feature Container
-----------------

The feature container is used to put all your features into one place where you
can easily loop through them.

.. code-block:: php

    <?php
    use JoshuaEstes\Component\FeatureToggle\FeatureContainer;
    use JoshuaEstes\Component\FeatureToggle\Feature;

    $container = new FeatureContainer();
    $feature   = FeatureBuilder::create('enable_a_cool_new_feature')
        ->getFeature();

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

------------------------
Creating Custom Features
------------------------

All features must implement the `FeatureInterface <https://github.com/JoshuaEstes/FeatureToggle/blob/master/src/JoshuaEstes/Component/FeatureToggle/FeatureInterface.php>`_.

In most situations you will only need to use the default `Feature <https://github.com/JoshuaEstes/FeatureToggle/blob/master/src/JoshuaEstes/Component/FeatureToggle/Feature.php`_,
however in some situations you might want to create your own.
