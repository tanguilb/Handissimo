<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 28/02/17
 * Time: 15:48
 */

namespace HandissimoBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentAnswerType extends AbstractType
{
    //private $name = 'answer_form';

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('activate', ButtonType::class, array(
                'label' => 'Répondre'
            ));

        /*$builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            $form = $event->getForm();
            $data = $event->getData();
            $activate = $data->getActivate();

            $form->add('author', TextType::class, array(
                'read_only' => true
            ))
            ->add('content', TextareaType::class);

        });*/

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HandissimoBundle\Entity\CommentAnswer'
        ));
    }

    public function getBlockPrefix()
    {
        return 'handissimo_answer';
    }

    /**
     * @param mixed $name
     */
    /*public function setName($name)
    {
        $this->name = $name;
    }*/


}