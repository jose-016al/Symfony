<?php

namespace App\Form;

use App\Entity\Articulos;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class ArticulosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            // ->add('contenido')
            ->add('contenido', TextareaType::class, [
                'required' => true,
                'attr' => ['rows' => 5]
            ])
            ->add('imagen', FileType::class, [
                'label' => 'Imagen para el articulo',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                        ],
                        'mimeTypesMessage' => 'Por favor sube una imagen'
                    ])
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Articulos::class,
        ]);
    }
}
