<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 02/03/17
 * Time: 12:09
 */

namespace HandissimoBundle\Admin;


use HandissimoBundle\Entity\Media;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class MediaAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {

        $formMapper
            ->add('fileName', FileType::class, array(
                'data_class' => null,
                'required' => false,
                'label' => 'ajouter une image'
            ))
            ->add('caroussel', null, array(
                'label' => 'Ajouter au caroussel'))
            ->add('firstPicture', null, array(
                'label' => "Imgage de présentation"
            ));
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('fileName')
            ->add('webPath')
         ;
    }

    public function prePersist($image)
    {
        $this->manageFileUpload($image);
    }

    public function preUpdate($image)
    {
        $this->manageFileUpload($image);
    }

    private function manageFileUpload($image)
    {
        if($image->getFile())
        {
            $image->refreshUpdated();
        }
    }

    public function getWebPath($image)
    {
        return $image->getFileName();

    }
}