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

namespace AlphaLemon\Block\ScriptBundle\Tests\Unit\Core\Block;

use AlphaLemon\AlphaLemonCmsBundle\Tests\Unit\Core\Content\Block\Base\AlBlockManagerContainerBase;
use AlphaLemon\Block\ScriptBundle\Core\Block\AlBlockManagerScript;

/**
 * AlBlockManagerTest
 *
 * @author AlphaLemon <webmaster@alphalemon.com>
 */
class AlBlockManagerScriptTest extends AlBlockManagerContainerBase
{
    
    protected function setUp()
    {
        parent::setUp();
        
        $this->initContainer();
        
        $this->blockManager = new AlBlockManagerScript($this->container, $this->validator);
    }

    public function testDefaultValue()
    {
        $message = 'This is a default script content';
        $this->translator
            ->expects($this->once())
            ->method('translate')
            ->with($message)                
            ->will($this->returnValue($message));
            
        $expectedValue = array(
            'Content' => $message,
        );
        $this->assertEquals($expectedValue, $this->blockManager->getDefaultValue());
    }

    public function testHtmlViewOutput()
    {
        $block = $this->getMock('AlphaLemon\AlphaLemonCmsBundle\Model\AlBlock');
        $this->blockManager->set($block);        
        $expectedResult = array('RenderView' => array(
            'view' => 'ScriptBundle:Content:script.html.twig',
            'options' => array(
                'block_manager' => $this->blockManager
            ),
        ));
        
        $this->assertEquals($expectedResult, $this->blockManager->getHtml());
    }
    
    public function testEditorParameters()
    {
        $block = $this->getMock('AlphaLemon\AlphaLemonCmsBundle\Model\AlBlock');
        $block->expects($this->once())
              ->method('getExternalJavascript')
              ->will($this->returnValue('javascript-1.js,javascript-2.js'))
        ;
        $block->expects($this->once())
              ->method('getExternalStylesheet')
              ->will($this->returnValue('stylesheet-1.js,stylesheet-2.js'))
        ;
        $this->blockManager->set($block);        
        
        $this->configuration = $this->getMock('AlphaLemon\AlphaLemonCmsBundle\Core\Configuration\AlConfigurationInterface');        
        $this->container
            ->expects($this->at(0))
            ->method('get')
            ->with('alpha_lemon_cms.configuration')
            ->will($this->returnValue($this->configuration))
        ;
        
        $expectedResult = array(
            "template" => "ScriptBundle:Editor:_editor.html.twig",
            "title" => "Script editor",
            "blockManager" => $this->blockManager,
            "jsFiles" => array(
                "javascript-1.js",
                "javascript-2.js",
            ),
            "cssFiles" => array(
                "stylesheet-1.js",
                "stylesheet-2.js",
            ),
            'configuration' => $this->configuration,
        );
        
        $this->assertEquals($expectedResult, $this->blockManager->editorParameters());
    }

    public function testHideInEditMode()
    {   
        $this->assertTrue($this->blockManager->getHideInEditMode());
    }
    
    protected function initContainer()
    {
        parent::initContainer();
        
        $this->translator = $this->getMock('AlphaLemon\AlphaLemonCmsBundle\Core\Translator\AlTranslatorInterface');
        $this->container
            ->expects($this->at(2))
            ->method('get')
            ->with('alpha_lemon_cms.translator')
            ->will($this->returnValue($this->translator))
        ;
    }
}
