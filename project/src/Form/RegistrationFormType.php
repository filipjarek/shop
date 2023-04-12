<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Firstname',
                'attr' => ['placeholder' => 'Firstname']
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Lastname',
                'attr' => ['placeholder' => 'Lastname']
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email address',
                'attr' => ['placeholder' => 'Email address']
            ])
            ->add('plainPassword', RepeatedType::class, [
                'mapped' => false,
                'required' => true,
                'type' => PasswordType::class,
                'invalid_message' => 'The passwords do not match.',
                'first_options' => [
                    'label' => 'Password',
                    'attr' => ['placeholder' => 'Password'],
                    'constraints' => [
                        new Length(['min' => 8, 'max' => 32]),
                    ],
                ],
                'second_options' => [
                    'label' => 'Confirm password',
                    'attr' => ['placeholder' => 'Confirm Password']
                ],
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Submit'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
