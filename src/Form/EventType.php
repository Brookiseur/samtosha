<?php

namespace App\Form;

use App\Entity\Event;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('imageFile', FileType::class, ["label"=>"Image", "required"=>$options["imageRequired"]])
            ->add('isActualite',CheckboxType::class, ["label"=>"Afficher en Actu ?", "attr"=> ["class" => "btn"],"required"=>false])
            ->add('participantMin', IntegerType::class, ["label"=>"Participant Min.","attr"=>["class"=>"littlefield"], "label_attr"=>["class"=>"labelform"],"required"=>false])
            ->add('participantMax', IntegerType::class, ["label"=>"Participant Max.","attr"=>["class"=>"littlefield"], "label_attr"=>["class"=>"labelform"],"required"=>false])
            ->add('title', TextType::class, ["label"=>"Nom de l'évènement","attr"=>["class"=>"littlefield"], "label_attr"=>["class"=>"labelform"]])
            ->add('startEvent', DateTimeType::class, [
                "label"=>"Date de l'évènement",
                'date_widget' =>'single_text',
                'time_widget' => 'single_text',
                "attr"=>["class"=>"inputfield"], "label_attr"=>["class"=>"labelform"]
            ])
            ->add('endEvent', DateTimeType::class, [
                'date_widget' =>'single_text',
                'time_widget' => 'single_text',
                "attr"=>["class"=>"inputfield"], "label_attr"=>["class"=>"labelform"],
            ])
            ->add('description', TextareaType::class, ["attr"=>["class"=>"areafield"], "label_attr"=>["class"=>"labelform"], "required"=>false])
            ->add('afficher',CheckboxType::class, ["label"=>"Dans le planning ?", "attr"=> ["class" => "btn"],"required"=>false])
            ->add('location', TextType::class, ["label"=>"Lieu","attr"=>["class"=>"littlefield"], "label_attr"=>["class"=>"labelform"]])
            ->add('price', TextType::class, ["label"=>"Prix","attr"=>["class"=>"littlefield"], "label_attr"=>["class"=>"labelform"]])
            ->add('save', SubmitType::class, ["label"=>"Sauvegarder"])
            ->remove('updatedAt')
            ->remove('imageName')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
            'imageRequired'=> false,
        ]);
    }
}
