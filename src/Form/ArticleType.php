<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\Auteur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [
                'constraints' => [
                    new NotBlank(['message' => "Ce champs ne peut pas être vides"])
                ],
                "attr" => [
                    "autofocus" => true
                ]
            ])
            ->add('contenu')
            ->add("auteur", EntityType::class, [
                "class" => Auteur::class,
                "choice_label" => function($auteur){
                    return $auteur->getPrenom();
                },
                "placeholder" => "-- Choisir l'auteur -- "
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
