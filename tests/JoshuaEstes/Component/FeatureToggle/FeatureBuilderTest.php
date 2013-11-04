<?php

use JoshuaEstes\Component\FeatureToggle\FeatureBuilder;

class FeatureBuilderTest extends \PHPUnit_Framework_TestCase
{

    public function testNewFeature()
    {
        $toggle = $this->getMock('JoshuaEstes\Component\FeatureToggle\Toggle\FeatureToggleInterface');
        $builder = new FeatureBuilder();
        $builder
            ->setKey('test_feature')
            ->setFeatureToggle($toggle);

        $feature = $builder->create();

        $this->assertInstanceOf('JoshuaEstes\Component\FeatureToggle\FeatureInterface', $feature);
        $this->assertSame($feature->getKey(), 'test_feature');
        $this->assertSame($feature->getToggle(), $toggle);
    }
}
