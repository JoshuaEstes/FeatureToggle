=====
Usage
=====

Using this library is fairly simple.

.. code-block:: php

    <?php

    use JoshuaEstes\Component\FeatureToggle\FeatureBuilder;

    $feature = FeatureBuilder::create('enable_a_cool_new_feature')
        ->getFeature();

    if ($feature->isEnabled()) {
        // code for when the feature is enabled
    } else {
        // code for when the feature is disabled
    }

By default the feature is disabled. You will need to enabled the
feature. You are able to do this two different ways.

.. code-block:: php

    <?php

    use JoshuaEstes\Component\FeatureToggle\Toggle\FeatureToggleGeneric;

    $feature = FeatureBuilder::create('enable_a_cool_new_feature')
        ->setFeatureToggle(
            new FeatureToggleGeneric(
                array(
                    'enabled' => true
                )
            )
        )
        ->getFeature();

This will now enabled the feature, when you call `isEnabled()` it will return `true`. The
other way to enable a feature is like so:

.. code-block:: php

    <?php

    $feature = FeatureBuilder::create('enable_a_cool_new_feature')
        ->getFeature();

    $feature->setFeatureToggle(
        new FeatureToggleGeneric(
            array(
                'enabled' => true
            )
        )
    );
