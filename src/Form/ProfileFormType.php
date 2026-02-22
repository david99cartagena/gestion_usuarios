<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Regex;

class ProfileFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $isEdit = $options['is_edit'] ?? false;

        $builder
            ->add('nombre', null, [
                'label' => 'Nombre',
                'constraints' => [
                    new NotBlank(['message' => 'El nombre no puede estar vacío']),
                    new Length(['min' => 3, 'minMessage' => 'El nombre debe tener al menos {{ limit }} caracteres'])
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Correo Electrónico',
            ])
            ->add('plainPassword', PasswordType::class, [
                'label' => $isEdit ? 'Nueva contraseña (opcional)' : 'Contraseña',
                'mapped' => false,
                'required' => !$isEdit,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => $isEdit ? [] : [
                    new NotBlank(['message' => 'Ingrese una contraseña']),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'La contraseña debe tener al menos {{ limit }} caracteres',
                        'max' => 4096,
                    ]),
                    new Regex([
                        'pattern' => '/^(?=.*[A-Z])(?=.*[0-9]).+$/',
                        'message' => 'Debe tener al menos una mayúscula y un número'
                    ]),
                ],
            ]);

        // Solo agregar agreeTerms si es registro
        if (!$isEdit) {
            $builder->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue(['message' => 'Debes aceptar los términos y condiciones']),
                ],
            ]);
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'is_edit' => false,
        ]);
    }
}
