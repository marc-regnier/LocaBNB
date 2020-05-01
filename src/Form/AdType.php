<?php

namespace App\Form;

use App\Entity\Ad;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class AdType extends AbstractType
{
    /**
     * Permet d'avoir la configuration de base d'un champ!
     * 
     * @param string $label
     * @param string $placeholder
     * @return array
     */
    private function getConfiguration($label, $placeholder){
        return [
            'label' => $label,
            'attr' => [
                'placeholder' => $placeholder
            ]
        ];
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, $this->getConfiguration("Titre", "Tapez un titre pour l'annonce"))
            ->add('slug', TextType::class, $this->getConfiguration("Adresse web", "Tapez adresse web (automatique)"))
            ->add('coverImage', UrlType::class, $this->getConfiguration("Url de l'image principal","Donnez l'adresse d'une image qui donne envie!"))
            ->add('introduction', TextType::class, $this->getConfiguration("Introduction", "Donnez une description globale de l'annonce"))
            ->add('content', TextareaType::class, $this->getConfiguration("Description détaillé", "Tapez votre description de l'annonce"))
            ->add('price', MoneyType::class, $this->getConfiguration("Prix par nuit", "Indiquer le prix que vous voulez pour une nuit"))
            ->add('rooms', IntegerType::class, $this->getConfiguration("Nombre de chambres", "Tapez le nombre de chambre"))
            ->add('images', CollectionType::class,[
                "entry_type" => ImageType::class, 
                "allow_add" => true
                ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ad::class,
        ]);
    }
}