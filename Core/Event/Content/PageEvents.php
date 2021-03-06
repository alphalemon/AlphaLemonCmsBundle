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
 * Defines the names for the page events
 *
 * All those events are tagged as alcms.event_listener
 *
 * @author alphalemon <webmaster@alphalemon.com>
 *
 * @api
 */
final class PageEvents
{
    const BEFORE_ADD_PAGE = 'pages.before_page_adding';
    const BEFORE_ADD_PAGE_COMMIT = 'pages.before_add_page_commit';
    const AFTER_ADD_PAGE = 'pages.after_page_added';

    const BEFORE_EDIT_PAGE = 'pages.before_page_editing';
    const BEFORE_EDIT_PAGE_COMMIT = 'pages.before_edit_page_commit';
    const AFTER_EDIT_PAGE = 'pages.after_page_edited';

    const BEFORE_DELETE_PAGE = 'pages.before_page_deleting';
    const BEFORE_DELETE_PAGE_COMMIT = 'pages.before_delete_page_commit';
    const AFTER_DELETE_PAGE = 'pages.after_page_deleted';
}
