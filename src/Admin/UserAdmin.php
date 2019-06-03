<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;

final class UserAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', TextType::class)
            ->add('email', TextType::class)
            ->add('password', TextType::class)
            ->add('imgUrl', TextType::class)
            ->add('age', TextType::class)
            ->add('country', TextType::class);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('email')
            ->add('password')
            ->add('imgUrl')
            ->add('country')
            ->add('age');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->addIdentifier('email')
            ->addIdentifier('password')
            ->addIdentifier('imgUrl')
            ->addIdentifier('country')
            ->addIdentifier('age');
    }
}