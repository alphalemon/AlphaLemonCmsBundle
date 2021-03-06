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

namespace AlphaLemon\AlphaLemonCmsBundle\Core\Event\Content;

/**
 * Defines the names for the template manager events
 *
 * @author alphalemon <webmaster@alphalemon.com>
 *
 * @api
 */
final class TemplateManagerEvents
{
    // alcms.event_listener
    const BEFORE_POPULATE = 'template_manager.before_populate';
    const BEFORE_POPULATE_COMMIT = 'template_manager.before_populate_commit';
    const AFTER_POPULATE = 'template_manager.after_populate';

    const BEFORE_CLEAR_BLOCKS = 'template_manager.before_clear_blocks';
    const BEFORE_CLEAR_BLOCKS_COMMIT = 'template_manager.before_clear_blocks_commit';
    const AFTER_CLEAR_BLOCKS = 'template_manager.after_clear_blocks';
}
