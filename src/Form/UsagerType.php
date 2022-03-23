<?php

namespace App\Form;

use App\Entity\Usager;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class UsagerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prenom')
            ->add('prenom2')
            ->add('prenom3')
            ->add('prenom4')
            ->add('nom')
            ->add('surnom')
            ->add('date_naissance', DateType::class, [
              'label' => 'Date de naissance',
              'widget' => 'single_text'])
            ->add('parent1_id')
            ->add('parent2_id')
            ->add('valide')
            ->add('createdAt')
            ->add('createdBy')
            ->add('updatedAt')
            ->add('updatedBy')
            ->add('deletedAt')
            ->add('deletedBy')
            ->add('isDraft')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Usager::class,
        ]);
    }
}
