<?php
namespace App\Form;


use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;





class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('firstname', TextType::class,[
            'attr' => [
                // this will always show, and is a standard html attribute
                'class' => 'form-control',
              
            ]
        ])
        ->add('lastname', TextType::class)
        ->add('phone', TelType::class)
        ->add('mail', EmailType::class)
        ->add('password', PasswordType::class)
       
        ->add('photo', FileType::class, [
            'label' => 'upload',
            'data_class' => null
        ])
        ->add('save', SubmitType::class,[
            'attr' => [
                // this will always show, and is a standard html attribute
                'class' => 'btn btn-lg mt-3 btn-save ',
              
            ]
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }


}