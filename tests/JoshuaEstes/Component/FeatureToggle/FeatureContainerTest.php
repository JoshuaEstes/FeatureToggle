<?php

use JoshuaEstes\Component\FeatureToggle\FeatureContainer;

class FeatureContainerTest extends \PHPUnit_Framework_TestCase
{

    public function testContainer()
    {
        $container = new FeatureContainer(
            array(
                $this->getMockFeature('one'),
                $this->getMockFeature('two'),
                $this->getMockFeature('three'),
                $this->getMockFeature('four'),
            )
        );

        $this->assertFalse($container->hasFeature('zero'));
        $this->assertNull($container->getFeature('zero'));
        $this->assertEquals($container->getFeature('one')->getKey(), 'one');

        $container->removeFeature('one');

        $this->assertSame($container->count(), 3);
    }

    private function getMockFeature($key)
    {
        $feature = $this
            ->getMockBuilder('JoshuaEstes\Component\FeatureToggle\Feature')
            ->disableOriginalConstructor()
            ->getMock();

        $feature->expects($this->any())
            ->method('getKey')
            ->will($this->returnValue($key));

        return $feature;
    }
}
