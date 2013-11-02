<?php

use JoshuaEstes\Component\FeatureToggle\Toggle\FeatureToggleGeneric;

class FeatureToggleGenericTest extends \PHPUnit_Framework_TestCase
{

    public function testEnabled()
    {
        $toggle = new FeatureToggleGeneric(array('enabled'=>true));

        $this->assertTrue($toggle->isEnabled());
    }

    public function testDisabled()
    {
        $toggle = new FeatureToggleGeneric(array('enabled'=>false));

        $this->assertFalse($toggle->isEnabled());
    }
}
