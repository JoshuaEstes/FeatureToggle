<?php

use JoshuaEstes\Component\FeatureToggle\FeatureBag;

class FeatureBagTest extends \PHPUnit_Framework_TestCase
{

    public function testGetFeature()
    {
        $feature = $this->getMockFeature();
        $bag = new FeatureBag(
            array(
                $feature,
            )
        );

        $this->assertSame($feature, $bag->getFeature('test_key'));
    }

    public function testHasFeature()
    {
        $feature = $this->getMockFeature();
        $bag = new FeatureBag(
            array(
                $feature,
            )
        );

        $this->assertTrue($bag->hasFeature('test_key'));
        $this->assertFalse($bag->hasFeature('no_feature'));
    }

    public function testIterator()
    {
        $feature = $this->getMockFeature();
        $bag = new FeatureBag(
            array(
                $feature,
            )
        );

        foreach ($bag as $f) {
            $this->assertSame($f, $feature);
        }
    }

    private function getMockFeature($key = 'test_key')
    {
        $feature = $this->getMock('JoshuaEstes\Component\FeatureToggle\FeatureInterface');
        $feature->expects($this->any())
            ->method('getKey')
            ->will($this->returnValue($key));

        return $feature;
    }
}
