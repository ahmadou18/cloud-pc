<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use AppBundle\Entity\BlogPost;
use Sonata\AdminBundle\Datagrid\DatagridMapper;


class BlogPostAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Content', array('class' => 'col-md-9'))
            ->add('title', 'text')
            ->add('description', 'text')

            ->add('body', 'textarea')
            ->end()

            ->with('Meta data', array('class' => 'col-md-3'))
            ->add('category', 'sonata_type_model', array(
                'class' => 'AppBundle\Entity\Category',
                'property' => 'name',
            ))
            ->end()
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
            ->add('description')
            ->add('category.name')
            ->add('draft')
        ;
    }

    public function toString($object)
    {
        return $object instanceof BlogPost
            ? $object->getTitle()
            : 'Blog Post'; // shown in the breadcrumb on the create view
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('category', null, array(), 'entity', array(
                'class'    => 'AppBundle\Entity\Category',
                'choice_label' => 'name', // In Symfony2: 'property' => 'name'
            ));
    }
}












