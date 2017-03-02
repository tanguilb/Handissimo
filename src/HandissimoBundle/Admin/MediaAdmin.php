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

class MediaAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {

        $formMapper
            ->add('file', 'file', array(
                'required' => false
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