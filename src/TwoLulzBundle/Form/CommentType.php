<?php
/**
 * Created by PhpStorm.
 * User: RmX63
 * Date: 18/06/2017
 * Time: 12:44
 */

namespace TwoLulzBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type as Form;

class CommentType extends AbstractType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('text',Form\TextareaType::class)
                ->add('post_id',Form\HiddenType::class)
                ->add('user_id',Form\HiddenType::class);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TwoLulzBundle\Entity\Comment'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'twolulzbundle_comment';
    }
}