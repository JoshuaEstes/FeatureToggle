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

    public function testWithConstructorArgument()
    {
        $this->setExpectedException('Symfony\Component\OptionsResolver\Exception\InvalidOptionsException');

        $feature = new Feature(
            array(
                'option' => 'value',
            )
        );
    }

    public function testHasOption()
    {
        $feature = new Feature();

        $this->assertFalse($feature->hasOption('not a real option'));
    }

    public function testGetOption()
    {
        $feature = new Feature();

        $this->assertNull($feature->getOption('null values are fun'));
    }
}
