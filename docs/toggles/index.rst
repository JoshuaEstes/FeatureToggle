=======
Toggles
=======

Toggles are reusable code snippets that enable/disable a feature. A toggle can
be created to enable a feature by an IP address or something as simple as a
configuration value.

A toggle is also passed an array that is used to configure the toggle.

-----------------------
Creating Custom Toggles
-----------------------

All toggles must implement the `FeatureToggleInterface <https://github.com/JoshuaEstes/FeatureToggle/blob/master/src/JoshuaEstes/Component/FeatureToggle/Toggle/FeatureToggleInterface.php`_.

By creating a custom toggle, you can change the logic for figuring out if a
feature is enable or not. Some ideas for custom toggles include:

* IP Based, can enable a feature if the user is on an internal network.
* Username, or something similar.
* Collection, a collection of toggles where it checks for any or all to be enable.
* Gradual, where you can release a feature to x% of a user base.

Creating a custom toggle based on username
==========================================

You can create a custom feature toggle with ease.

.. code-block:: php

    <?php
    use Symfony\Component\Security\Core\User\UserInterface;
    use JoshuaEstes\Component\FeatureToggle\Toggle\FeatureToggle;
    use JoshuaEstes\Component\FeatureToggle\FeatureInterface;

    class FeatureToggleUsername extends FeatureToggle
    {

        /**
         * @var UserInterface
         */
        protected $user;

        /**
         * Dependency injection
         *
         * @param UserInterface $user
         */
        public function setUser(UserInterface $user)
        {
            $this->user = $user;
        }

        /**
         * Used to set the options that are allowed to be used with this toggle
         *
         * @param OptionsResolverInterface $resolver
         */
        protected function setDefaultOptions(OptionsResolverInterface $resolver)
        {
            $resolver->setRequired(
                array(
                    'username'
                )
            );
        }

        /**
         * Check some settings and return true if the feature should be enabled
         *
         * @param FeatureInterface $feature
         */
        public function isEnabled(FeatureInterface $feature)
        {
            return $this->options['username'] == $this->user->getUsername();
        }
    }

Now that we have the toggle, we just need to create the toggle and assign it to
a feature object.

.. code-block:: php

    <?php
    use JoshuaEstes\Component\FeatureToggle\FeatureBuilder;

    $toggle = new FeatureToggleUsername(
        array(
            'username' => 'joshua',
        )
    );
    $toggle->setUser($user);

    $feature = FeatureBuilder::create('enable_for_joshua')
        ->setFeatureToggle($toggle)
        ->getFeature();

That's all there is to it! Note that the `$user` variable needs to be
defined and must have a method `getUsername`. This feature will return true
only for the user with the username `joshua` and will return false for
all other users.
