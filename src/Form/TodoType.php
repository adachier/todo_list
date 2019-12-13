<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Todo;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TodoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /* Test */ 
        //  dump($options['data']->getId());
        /* Fin Test */
        $builder
            ->add('title', TextType::class,[
                'label' => 'Un titre en quelques mots',
                'required'=>false,
                'attr' => [
                    'placeholder' => 'Entrez le titre ici !'
                ]
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label'=> 'name',
                'label' => 'Quelle catégorie ?',
                'required'=>false,
            ])
            ->add('content', TextareaType::class,[
                'label' => 'Plus précisemment ?',
                'required'=>false,
                'attr' => [
                    'placeholder' => 'Ajouter le détail ici'
                ]
            ]);
            if($options['data']->getId()!== null){
                // en mode édition d'une todo existante
                $builder->add('todoFor', DateType::class,[
                'years' => ['2019', '2020'],
                'format'=> 'dd MM yyyy',
                'data' => new \DateTime('now', new \DateTimeZone('Europe/Paris'))
            ]);
            }else{
                $builder->add('todoFor', DateType::class,[
                    'years' => ['2019', '2020'],
                    'format'=> 'dd MM yyyy',
            ]);
            }
            $builder->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Todo::class,
        ]);
    }
}
