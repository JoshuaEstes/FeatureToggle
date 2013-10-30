<?php

use JoshuaEstes\Component\FeatureToggle\Toggle\FeatureToggleGeneric;

class FeatureToggleGenericTest extends \PHPUnit_Framework_TestCase
{

    public function testEnabled()
    {
        $toggle = new FeatureToggleGeneric(true);

        $this->assertTrue($toggle->isEnabled());
    }

    public function testDisabled()
    {
        $toggle = new FeatureToggleGeneric(false);

        $this->assertFalse($toggle->isEnabled());
    }
}
