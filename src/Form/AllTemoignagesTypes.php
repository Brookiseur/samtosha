<?php

namespace App\Form;

use App\Entity\Temoignages;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class AllTemoignagesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('monTemoignage', TextareaType::class, ["label"=>"Leur témoignage","attr"=>["class"=>"inputfield"], "label_attr"=>["class"=>"labelform"]])
            ->add('save', SubmitType::class, ["label"=>"Sauvegarder", "attr"=> ["class" => "btn"]])
            ->add('isValid', CheckboxType::class, ["label"=>"Témoignage Visible ?", "attr"=> ["class" => "btn"],"required"=>false])
            ->remove('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Temoignages::class,
        ]);
    }
}