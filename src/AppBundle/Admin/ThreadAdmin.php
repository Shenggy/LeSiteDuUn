<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class ThreadAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('nomThread')
            ->add('nbVues')
            ->add('etat')
            ->add('user')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('nomThread')
            ->add('dateCreation')
            ->add('dateModification')
            ->add('nbVues')
            ->add('etat')
            ->add('user.username',null, [
                'associated_property' => 'username'
            ])
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('nom')
            ->add('nomThread')
            ->add('dateCreation')
            ->add('dateModification')
            ->add('nbVues')
            ->add('etat')
            ->add('_action', null, [
                'actions' => [
                    'show' => [],
                    'edit' => [],
                    'delete' => [],
                ]
            ])
        ;
    }

    protected function configureShowFields(ShowMapper $showMapper){
        $showMapper
            ->with('Infos principales')
            ->add('nomThread')
            ->add('dateCreation')
            ->add('dateModification')
            ->add('nbVues')
            ->add('etat')
            ->end()
        ;
    }
}