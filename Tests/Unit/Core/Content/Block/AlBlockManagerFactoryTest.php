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

namespace AlphaLemon\AlphaLemonCmsBundle\Tests\Unit\Core\Content\Block;

use AlphaLemon\AlphaLemonCmsBundle\Tests\TestCase;
use AlphaLemon\AlphaLemonCmsBundle\Core\Content\Block\AlBlockManagerFactory;

/**
 * AlBlockManagerFactoryTest
 *
 * @author AlphaLemon <webmaster@alphalemon.com>
 */
class AlBlockManagerFactoryTest extends TestCase
{
    private $factoryRepository;
    private $translator;
    private $blockManager;
    private $blockManagerFactory;
    private $eventsHandler;

    protected function setUp()
    {
        $this->factoryRepository = $this->getMock('AlphaLemon\AlphaLemonCmsBundle\Core\Repository\Factory\AlFactoryRepositoryInterface');
        $this->translator = $this->getMock('Symfony\Component\Translation\TranslatorInterface');
        $this->eventsHandler = $this->getMock('AlphaLemon\AlphaLemonCmsBundle\Core\EventsHandler\AlEventsHandlerInterface');

        $this->blockManagerFactory = new AlBlockManagerFactory($this->eventsHandler, $this->factoryRepository, $this->translator);
    }

    public function testTypeOptionIsrequiredToAddANewBlockManager()
    {
        $blockManager = $this->createBlockManager();
        $blockManager->expects($this->never())
                     ->method('setFactoryRepository');

        $this->assertNull($this->blockManagerFactory->addBlockManager($blockManager, array()));
    }

    public function testANewBlockManagerAsBeenAddedToFactory()
    {
        $this->initBlockManager();
        $blocks = $this->blockManagerFactory->getBlocks();
        $this->assertCount(2, $blocks);
        $this->assertTrue(array_key_exists('Default', $blocks));        
        $this->assertTrue(array_key_exists('Text', $blocks));
    }
    
    /**
     * @dataProvider blocksProvider
     */
    public function testGetBlocks($isInternal, $expectedBlocks)
    {
        $this->initBlockManager();
        
        $blockManager = $this->createBlockManager();
        $blockManager->expects($this->once())
                     ->method('getIsInternalBlock')
                     ->will($this->returnValue($isInternal));

        $attributes = array('id' => 'app_fake.block', 'description' => 'Script block',  'type' => 'Script', 'group' => 'group_1');
        $this->blockManagerFactory->addBlockManager($blockManager, $attributes);
        
        $blocks = $this->blockManagerFactory->getBlocks();
        $this->assertCount(count($expectedBlocks), $blocks);
        $this->assertEquals($expectedBlocks, $blocks);
    }
    
    public function testABlockNotAssignedToAnyGroupIsRenderedAtTheBottomOfTheArray()
    {
        $this->initBlockManager();
        
        $attributes = array('id' => 'app_not_grouped.block', 'description' => 'Script block',  'type' => 'Script', 'group' => '');
        $this->blockManagerFactory->addBlockManager($this->createBlockManager(), $attributes);
        
        $blocks = $this->blockManagerFactory->getBlocks();
        $this->assertCount(3, $blocks);
        
        $expectedResult = array
        (
            "Default" => array(),
            "Script" => "Script block",
            "Text" => "Fake block",
        );

        
        $this->assertEquals($expectedResult, $blocks);
    }
    
    /**
     * @dataProvider availableBlocksProvider
     */
    public function testAvailableBlocks($isInternal, $expectedBlocks)
    {
        $this->initBlockManager();
        
        $blockManager = $this->createBlockManager();
        $blockManager->expects($this->once())
                     ->method('getIsInternalBlock')
                     ->will($this->returnValue($isInternal));

        $attributes = array('id' => 'app_fake_1.block', 'description' => 'Script block',  'type' => 'Script', 'group' => 'group_1');
        $this->blockManagerFactory->addBlockManager($blockManager, $attributes);
        
        $blocks = $this->blockManagerFactory->getAvailableBlocks();
        $this->assertCount(count($expectedBlocks), $blocks);
        $this->assertEquals($expectedBlocks, $blocks);
    }

    public function testNothigIsCreatedWhenAnyBlockHasBeenAddedToFactory()
    {
        $this->assertNull($this->blockManagerFactory->createBlockManager('Text'));
    }

    public function testFactoryCreateANewBlockManagerFromBlockType()
    {
        $this->initBlockManager();
        $this->setEventsHandler();
        
        $blockManager = $this->blockManagerFactory->createBlockManager('Text');
        $this->assertInstanceOf('AlphaLemon\AlphaLemonCmsBundle\Core\Content\Block\AlBlockManager', $blockManager);
        $this->assertNotSame($this->blockManager, $blockManager);
    }

    public function testFactoryCreateANewBlockManagerFromAnAlBlockObject()
    {
        $block = $this->getMock('AlphaLemon\AlphaLemonCmsBundle\Model\AlBlock');
        $block->expects($this->once())
              ->method('getType')
              ->will($this->returnValue('Text'));
        $this->initBlockManager();
        $this->setEventsHandler();
        $blockManager = $this->blockManagerFactory->createBlockManager($block);
        $this->assertInstanceOf('AlphaLemon\AlphaLemonCmsBundle\Core\Content\Block\AlBlockManager', $blockManager);
        $this->assertNotSame($this->blockManager, $blockManager);
    }
    
    public function testFactoryRemovesABlockThatDoesNotExist()
    {
        $block = $this->getMock('AlphaLemon\AlphaLemonCmsBundle\Model\AlBlock');
        $block->expects($this->once())
              ->method('getType')
              ->will($this->returnValue('Removed'));
        $this->initBlockManager();

        $this->blockRepository = $this->getMockBuilder('AlphaLemon\AlphaLemonCmsBundle\Core\Repository\Propel\AlBlockRepositoryPropel')
                                      ->disableOriginalConstructor()
                                      ->getMock();
        $this->blockRepository->expects($this->once())
                              ->method('setRepositoryObject')
                              ->with($block);

        $this->blockRepository->expects($this->once())
                              ->method('delete');

        $this->blockManager->expects($this->once())
                           ->method('getBlockRepository')
                           ->will($this->returnValue($this->blockRepository));

        $blockManager = $this->blockManagerFactory->createBlockManager($block);
        $this->assertNull($blockManager);
    }
    
    public function blocksProvider()
    {
        return array(
            array(
                false,
                array
                (
                    "Default" => array(),
                    "Script" => "Script block",
                    "Text" => "Fake block",
                ),
            ),array(
                true,
                array
                (
                    "Default" => array(),
                    "Text" => "Fake block",
                ),
            ),
        );
    }
    
    public function availableBlocksProvider()
    {
        return array(
            array(
                false,
                array
                (
                    "Text",
                    "Script",
                ),
            ),array(
                true,
                array
                (
                    "Text",
                ),
            ),
        );
    }

    private function initBlockManager(array $attributes = null)
    {
        if (null === $attributes) {
            $attributes = array('id' => 'app_fake.block', 'description' => 'Fake block',  'type' => 'Text');
        }
        
        $this->blockManager = $this->createBlockManager();
        $this->blockManager->expects($this->once())
                           ->method('setFactoryRepository')
                           ->with($this->factoryRepository);

        $this->blockManagerFactory->addBlockManager($this->blockManager, $attributes);
    }
    
    private function setEventsHandler()
    {
        $this->blockManager->expects($this->once())
                           ->method('setEventsHandler')
                           ->with($this->eventsHandler);
    }

    private function createBlockManager()
    {
        $blockManager = $this->getMockBuilder('AlphaLemon\AlphaLemonCmsBundle\Core\Content\Block\AlBlockManager')
                                    ->disableOriginalConstructor()
                                    ->getMock();

        return $blockManager;
    }
}
