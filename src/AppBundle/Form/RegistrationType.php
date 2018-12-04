<?php


namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('first_name', null , array('label' => 'form.first_name', 'translation_domain' => 'FOSUserBundle'))
            ->add('last_name', null, array('label' => 'form.last_name', 'translation_domain' => 'FOSUserBundle'))
            ->add('birth_date',DateType::class,array( 'widget' => 'single_text','label' => 'form.birth_date', 'translation_domain' => 'FOSUserBundle'))
            ->add('phone', null, array('label' => 'form.phone', 'translation_domain' => 'FOSUserBundle'))
            ->add('address', null,  array('label' => 'form.address', 'translation_domain' => 'FOSUserBundle'))
            ->add('description',TextareaType::class,array('label' => 'form.description', 'translation_domain' => 'FOSUserBundle'))
            ->add('logo',  FileType::class,array('label' => 'form.logo', 'translation_domain' => 'FOSUserBundle'))
            ->add('roles',
                ChoiceType::class,
                array('label' => 'form.roles ',
                    'choices' => array(' AGENT' => 'ROLE_AGENT',
                        'CLIENT' => 'ROLE_CLIENT'),
                    'required' => true, 'multiple' => true,))
        ;
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';

        // Or for Symfony < 2.8
        // return 'fos_user_registration';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    // For Symfony 2.x
    public function getName()
    {
        return $this->getBlockPrefix();
    }
}