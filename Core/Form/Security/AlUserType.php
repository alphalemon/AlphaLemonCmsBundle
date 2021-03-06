<?php
/**
 * This file is part of the AlphaLemon CMS Application and it is distributed
 * under the GPL LICENSE Version 2.0. To use this application you must leave
 * intact this copyright notice.
 *
 * Copyright (c) AlphaLemon <webmaster@alphalemon.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * For extra documentation and help please visit http://www.alphalemon.com
 *
 * @license    GPL LICENSE Version 2.0
 *
 */

namespace AlphaLemon\AlphaLemonCmsBundle\Core\Form\Security;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Implements the form to manage the website users
 *
 * @author alphalemon <webmaster@alphalemon.com>
 */
class AlUserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('id', 'hidden');
        $builder->add('username');
        $builder->add('password');
        $builder->add('email');

        $builder->add('AlRole', 'model', array(
            'class'     => 'AlphaLemon\AlphaLemonCmsBundle\Model\AlRole',
            'property'  => 'Role',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'AlphaLemon\AlphaLemonCmsBundle\Model\AlUser',
            'csrf_protection' => false,
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'al_user';
    }
}
