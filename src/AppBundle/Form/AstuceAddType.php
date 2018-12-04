<?php


namespace AppBundle\Form;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Vich\UploaderBundle\Form\Type\VichFileType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;

class AstuceAddType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titre', TextType::class , array('class' => 'form-control'))
            ->add('details', TextType::class , array('class' => 'form-control'))
            ->add('videoFile', VichFileType::class, [
                'required' => true,
            ]);
        ;
    }

    public function getParent()
    {
        return 'AppBundle\Form\AstuceAddType';

        // Or for Symfony < 2.8
    }

    public function getBlockPrefix()
    {
        return 'AstuceAddType';
    }

    // For Symfony 2.x
    public function getName()
    {
        return $this->getBlockPrefix();
    }
}