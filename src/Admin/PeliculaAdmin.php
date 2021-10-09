<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use App\Entity\Genero;
use App\Entity\Director;
use App\Entity\Actor;

final class PeliculaAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form): void
    {
        $form->add('nombre', TextType::class);
        $form->add('descripcion', TextType::class, ['required' => false]);
        $form->add('generos', EntityType::class, [
            'class' => Genero::class,
            'choice_label' => 'nombre',
            'multiple' => true,
            'required' => false
        ]);
        $form->add('directores', EntityType::class, [
            'class' => Director::class,
            'choice_label' => 'nombre',
            'multiple' => true,
            'required' => false
        ]);
        $form->add('actores', EntityType::class, [
            'class' => Actor::class,
            'choice_label' => 'nombre',
            'multiple' => true,
            'required' => false
        ]);
        $form->add('ano', TextType::class, ['required' => false]);
    }

    protected function configureActionButtons(array $buttonList, string $action, ?object $object = null): array
    {
        $list = parent::configureActionButtons($buttonList,$action, $object);

        /*$list['sincronizacion'] = array(
                'template' =>  'admin/boton_sincro.html.twig',
        );*/

        return $list;
    }

    protected function configureDatagridFilters(DatagridMapper $datagrid): void
    {
        $datagrid->add('nombre');
        $datagrid->add('descripcion');
        $datagrid->add('ano');
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list->addIdentifier('nombre');
        $list->addIdentifier('descripcion');
        $list->add('_action', 'actions', [
                                    'template' => 'admin/boton_sincro.html.twig',
                                ]);
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show->add('nombre');
        $show->add('descripcion');
        $show->add('generos');
        $show->add('directores');
        $show->add('actores');
        $show->add('ano');
    }
}