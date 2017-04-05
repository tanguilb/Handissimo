<?php

namespace HandissimoBundle\Tests\Form\DataTransformer;

use HandissimoBundle\Form\Type\BooleanType;
Use HandissimoBundle\Form\DataTransformer\BooleanTypeToBooleanTransformer;

class BooleanTypeToBooleanTransformerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider getTransformData
     */
    public function testTransform($value, $expected)
    {
        $transformer = new BooleanTypeToBooleanTransformer();
        $this->assertEquals($expected, $transformer->transform($value));
    }
    public function getTransformData()
    {
        return array(
            array(true, BooleanType::VALUE_TRUE),
            array(false, BooleanType::VALUE_FALSE),
            array('no', BooleanType::VALUE_FALSE),
            array('1', BooleanType::VALUE_TRUE),
            array('0', BooleanType::VALUE_FALSE),
            array(1, BooleanType::VALUE_TRUE),
            array(0, BooleanType::VALUE_FALSE),
        );
    }
    /**
     * @dataProvider getReverseTransformData
     */
    public function testReverseTransform($value, $expected)
    {
        $transformer = new BooleanTypeToBooleanTransformer();
        $this->assertEquals($expected, $transformer->reverseTransform($value));
    }
    public function getReverseTransformData()
    {
        return array(
            array(BooleanType::VALUE_TRUE, true),
            array(1, true),
            array('1', true),
            array(true, true),
            array('yes', false),
            array(BooleanType::VALUE_FALSE, false),
            array(0, false),
            array('0', false),
            array(false, false),
            array('no', false),
        );
    }
}