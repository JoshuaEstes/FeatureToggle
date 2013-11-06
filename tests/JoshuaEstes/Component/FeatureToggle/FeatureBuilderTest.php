<?php

use JoshuaEstes\Component\FeatureToggle\FeatureBuilder;

class FeatureBuilderTest extends \PHPUnit_Framework_TestCase
{

    public function testNewFeature()
    {
        $toggle = $this->getMock('JoshuaEstes\Component\FeatureToggle\Toggle\FeatureToggleInterface');

        $feature = FeatureBuilder::create()
            ->setKey('test_feature')
            ->setDescription('This is a test feature')
            ->setFeatureToggle($toggle)
            ->getFeature();

        $this->assertInstanceOf('JoshuaEstes\Component\FeatureToggle\FeatureInterface', $feature);
        $this->assertSame($feature->getKey(), 'test_feature');
        $this->assertSame($feature->getDescription(), 'This is a test feature');
        $this->assertSame($feature->getToggle(), $toggle);
    }
}
