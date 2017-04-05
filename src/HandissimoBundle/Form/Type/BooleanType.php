<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 05/04/17
 * Time: 14:24
 */

namespace HandissimoBundle\Form\Type;


use HandissimoBundle\Form\DataTransformer\BooleanTypeToBooleanTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BooleanType extends AbstractType
{
    const VALUE_FALSE = 0;
    const VALUE_TRUE = 1;
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addModelTransformer(new BooleanTypeToBooleanTransformer());
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'compound' => false,
        ));
    }
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'boolean';
    }
}