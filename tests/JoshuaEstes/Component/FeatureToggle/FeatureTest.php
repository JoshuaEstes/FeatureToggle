<?php

use JoshuaEstes\Component\FeatureToggle\Feature;

class FeatureTest extends \PHPUnit_Framework_TestCase
{

    public function testWithoutToggle()
    {
        $feature = new Feature();
        $feature->setKey('test_feature');

        $this->assertSame($feature->getKey(), 'test_feature');
    }

    public function testWithToggle()
    {
        $toggle = $this->getMock('JoshuaEstes\Component\FeatureToggle\Toggle\FeatureToggleInterface');
        $feature = new Feature();
        $feature
            ->setKey('test_feature')
            ->setToggle($toggle);
        $this->assertSame($feature->getKey(), 'test_feature');
    }
}
