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

namespace AlphaLemon\AlphaLemonCmsBundle\Tests\Unit\Core\UrlManager;

use AlphaLemon\AlphaLemonCmsBundle\Core\UrlManager\AlUrlManager;
use Symfony\Component\HttpKernel\KernelInterface;
use AlphaLemon\AlphaLemonCmsBundle\Core\Repository\Factory\AlFactoryRepositoryInterface;

/**
 * AlUrlManagerTest
 *
 * @author alphalemon <webmaster@alphalemon.com>
 */
class AlUrlManagerTest extends BaseAlUrlManager
{
    protected $routePrefix = '';
    
    protected function getUrlManager(KernelInterface $kernel, AlFactoryRepositoryInterface $factoryRepository) {
        return new AlUrlManager($kernel, $factoryRepository);
    }
}