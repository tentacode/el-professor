<?php

namespace App\Logbook\Form;

use App\Logbook\Model\Log;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class NewLogType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $textPlaceholder = <<<TEXT
        Aujourd'hui, j'ai travaillé sur ceci, mais j'ai un problème avec cela.
        (N'hésitez pas à élaborer !)
        TEXT;

        $builder
            ->add('project', ChoiceType::class, [
                'label' => false,
                'multiple' => false,
                'expanded' => false,
                'choices' => array_flip(Log::PROJECT_LABELS),
            ])
            ->add('text', null, [
                'label' => false,
                'attr' => [
                    'rows' => 6,
                    'placeholder' => $textPlaceholder,
                ]
            ])
            ->add('mediaFile', FileType::class, [
                'label' => 'Image',
                'help' => "N'hésitez pas à ajouter une image de votre travail en cours (taille maximum : 10mo).",
                'required' => false,
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Ajouter une entrée',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Log::class,
        ]);
    }
}
