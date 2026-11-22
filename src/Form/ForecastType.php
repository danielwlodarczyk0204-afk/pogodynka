<?php

namespace App\Form;

use App\Entity\Forecast;
use App\Entity\Place;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ForecastType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date')

            ->add('temperature')

            ->add('cloudiness')

            ->add('humidity')

            ->add('rain')

                //https://stackoverflow.com/questions/63130539/how-can-i-use-the-querybuilder-with-choice-label-in-formbuilder
            ->add('place', EntityType::class, [
                'class' => place::class,
                'choice_label' => function(Place $place) {
                    return $place->getName().', '.$place->getCountry();
                }
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Forecast::class,
        ]);
    }
}
