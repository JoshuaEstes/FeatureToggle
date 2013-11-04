<?php

use JoshuaEstes\Component\FeatureToggle\Feature;

class FeatureTest extends \PHPUnit_Framework_TestCase
{

    public function testNewWithoutToggle()
    {
        $feature = new Feature('test_feature');

        $this->assertSame($feature->getKey(), 'test_feature');
    }

    public function testNewWithToggle()
    {
        $toggle = $this->getMock('JoshuaEstes\Component\FeatureToggle\Toggle\FeatureToggleInterface');
        $feature = new Feature('test_feature', $toggle);
        $this->assertSame($feature->getKey(), 'test_feature');
    }
}
