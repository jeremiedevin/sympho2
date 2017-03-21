<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChatonType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')
                ->add('dateNaissance', \Symfony\Component\Form\Extension\Core\Type\DateTimeType::class)
                ->add('race')
                ->add('urlPhoto')
                ->add('maison', \Symfony\Bridge\Doctrine\Form\Type\EntityType::class,['class'=>'AppBundle:Maison','choice_label'=>'nom'])    
                ->add('enregistrer', \Symfony\Component\Form\Extension\Core\Type\SubmitType::class, ["attr" =>["class"=>"btn btn-success"]]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Chaton'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_chaton';
    }


}
