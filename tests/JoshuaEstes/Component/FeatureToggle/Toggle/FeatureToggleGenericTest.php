<?php

use JoshuaEstes\Component\FeatureToggle\Toggle\FeatureToggleGeneric;

class FeatureToggleGenericTest extends \PHPUnit_Framework_TestCase
{

    public function testEnabled()
    {
        $toggle = new FeatureToggleGeneric(array('enabled'=>true));
        $feature = $this->getMock('JoshuaEstes\Component\FeatureToggle\FeatureInterface');

        $this->assertTrue($toggle->isEnabled($feature));
    }

    public function testDisabled()
    {
        $toggle = new FeatureToggleGeneric(array('enabled'=>false));
        $feature = $this->getMock('JoshuaEstes\Component\FeatureToggle\FeatureInterface');

        $this->assertFalse($toggle->isEnabled($feature));
    }
}
