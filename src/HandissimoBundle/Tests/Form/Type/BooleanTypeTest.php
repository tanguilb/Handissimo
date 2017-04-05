<?php

namespace HandissimoBundle\Tests\Form\Type;


use HandissimoBundle\Form\Type\BooleanType;
use Symfony\Component\Form\Test\TypeTestCase;

class BooleanTypeTest extends TypeTestCase
{
    /**
     * @dataProvider getTestData
     */
    public function testFormType($value, $expected)
    {
        $type = new BooleanType();
        $form = $this->factory->create($type);
        $form->submit($value);
        $this->assertTrue($form->isSynchronized());
        $this->assertEquals($expected, $form->getData());
    }
    public function getTestData()
    {
        return array(
            array('1', true),
            array(1, true),
            array(true, true),
            array('0', false),
            array(0, false),
            array(false, false),
            array('yes', false),
            array('no', false),
        );
    }
}