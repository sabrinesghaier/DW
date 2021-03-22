<?php
namespace App\Form;

use App\Entity\Publication;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;






class PublicationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
    
        ->add('description', TextareaType::class,[
            'attr' => [
                // this will always show, and is a standard html attribute
                'class' => 'form-control',
                'rows' => '3'
            ]
            ])
        
        ->add('publier', SubmitType::class,[
            'attr' => [
                // this will always show, and is a standard html attribute
                'class' => 'btn btn-primary btn-publish',
              
            ]
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Publication::class,
        ]);
    }


}