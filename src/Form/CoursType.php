<?php

namespace App\Form;

use App\Entity\Cours;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CoursType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('type',TextType::class, ["attr"=>["class"=>"littlefield"], "label_attr"=>["class"=>"labelform"]])
            ->add('tarif',TextType::class, ["attr"=>["class"=>"littlefield"], "label_attr"=>["class"=>"labelform"]])
            ->add('description', TextareaType::class, ["attr"=>["class"=>"areafield"], "label_attr"=>["class"=>"labelform"]])
            ->add('presentation', CheckboxType::class, ["attr"=>["class"=>"littlefield"], "label_attr"=>["class"=>"labelform"], "label"=>"Présentation", "required"=>false])
            ->add('save', SubmitType::class, ["label"=>"Sauvegarder"])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cours::class,
        ]);
    }
}
