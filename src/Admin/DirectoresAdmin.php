<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;

final class DirectoresAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form): void
    {
        $form->add('nombre', TextType::class);
        //$form->add('foto', TextType::class);
    }

    protected function configureDatagridFilters(DatagridMapper $datagrid): void
    {
        $datagrid->add('nombre');
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list->addIdentifier('nombre');
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show->add('nombre');
        //$show->add('foto');
    }
}