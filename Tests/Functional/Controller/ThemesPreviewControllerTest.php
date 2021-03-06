<?php
/**
 * This file is part of the AlphaLemon CMS Application and it is distributed
 * under the GPL LICENSE Version 2.0. To use this application you must leave
 * intact this copyright notice.
 *
 * Copyright (c) AlphaLemon <webmaster@alphalemon.com>
 *
 * For the full copyright and license infpageRepositoryation, please view the LICENSE
 * file that was distributed with this source code.
 *
 * For extra documentation and help please visit http://www.alphalemon.com
 *
 * @license    GPL LICENSE Version 2.0
 *
 */

namespace AlphaLemon\AlphaLemonCmsBundle\Tests\Functional\Controller;

use AlphaLemon\AlphaLemonCmsBundle\Tests\WebTestCaseFunctional;

/**
 * ThemesControllerTest
 *
 * @author alphalemon <webmaster@alphalemon.com>
 */
class ThemesPreviewControllerTest extends WebTestCaseFunctional
{
    public function testThemePreview()
    {
        $crawler = $this->client->request('GET', '/backend/en/al_previewTheme/en/index/SunshineThemeBundle');
        $response = $this->client->getResponse();
        $this->assertEquals(200, $response->getStatusCode());
        
        $this->assertCount(1, $crawler->filter('#al_main_commands'));
        $this->assertCount(1, $crawler->filter('#al_show_navigation'));
        $this->assertCount(1, $crawler->filter('#al_templates_navigator'));
        $this->assertCount(1, $crawler->filter('#al-back'));
        $this->assertCount(1, $crawler->filter('#logo'));    
        $this->assertCount(1, $crawler->filter('#search_box'));  
        $this->assertCount(1, $crawler->filter('#download'));
        $this->assertCount(1, $crawler->filter('#right_sidebar')); 
        $this->assertCount(1, $crawler->filter('#footer'));    
        $this->assertCount(1, $crawler->filter('#links_footer_1'));           
        $this->assertCount(1, $crawler->filter('#links_footer_2'));
        $this->assertCount(1, $crawler->filter('#social_box'));
        $this->assertCount(1, $crawler->filter('#copyright_box'));
    }
}