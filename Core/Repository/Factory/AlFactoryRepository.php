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

namespace AlphaLemon\AlphaLemonCmsBundle\Core\Repository\Factory;

use Symfony\Component\DependencyInjection\ContainerInterface;
use AlphaLemon\AlphaLemonCmsBundle\Core\Repository\Factory\Exception\RepositoryNotFoundException;

/**
 * AlFactoryRepository object instantiates repository objects according with the orm
 * and the repository type
 *
 * @author alphalemon <webmaster@alphalemon.com>
 */
class AlFactoryRepository implements AlFactoryRepositoryInterface
{
    private $container = null;
    private $namespace = 'AlphaLemon\AlphaLemonCmsBundle\Core\Repository';

    /**
     * Constructor
     *
     * @param string $orm
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * {@inheritdoc}
     */
    public function createRepository($blockType, $namespace = null)
    {
        $orm = ucfirst($this->container->getParameter('alpha_lemon_cms.orm'));
        $namespace = (null === $namespace) ?  $this->namespace : $namespace;
        $blockType = ucfirst($blockType);
        $class = sprintf('%s\%s\%sRepository%s', $namespace, $orm, $blockType, $orm);
        if (!class_exists($class)) {
            $class = sprintf('%s\%s\Al%sRepository%s', $namespace, $orm, $blockType, $orm);
            if (!class_exists($class)) {
                throw new RepositoryNotFoundException(sprintf('The repository for the "%s" block type at the namespace "%s" cannot be created', $blockType, $namespace));
            }
        }
        
        $argument = ($orm == 'Doctrine') ? $this->container->get('doctrine')->getManager() : null;
        
        return new $class($argument);
    }
}
