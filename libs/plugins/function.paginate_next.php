<?php

/**
 * Project:     SmartyPaginate: Pagination for the Smarty Template Engine
 * File:        function.paginate_next.php
 * Author:      Monte Ohrt <monte at newdigitalgroup dot com>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * @link http://www.phpinsider.com/php/code/SmartyPaginate/
 * @copyright 2001-2005 New Digital Group, Inc.
 * @author Monte Ohrt <monte at newdigitalgroup dot com>
 * @package SmartyPaginate
 * @version 1.6-dev
 */

function smarty_function_paginate_next($params, &$smarty) {

    $_id = 'default';
    $_attrs = array();
    
    if (!class_exists('SmartyPaginate')) {
        $smarty->trigger_error("paginate_next: missing SmartyPaginate class");
        return;
    }
    if (!isset($_SESSION['SmartyPaginate'])) {
        $smarty->trigger_error("paginate_next: SmartyPaginate is not initialized, use connect() first");
        return;        
    }

    foreach($params as $_key => $_val) {
        switch($_key) {
            case 'id':
                if (!SmartyPaginate::isConnected($_val)) {
                    $smarty->trigger_error("paginate_next: unknown id '$_val'");
                    return;        
                }
                $_id = $_val;
                break;
            default:
                $_attrs[] = $_key . '="' . $_val . '"';
                break;   
        }
    }
    
    if (SmartyPaginate::getTotal($_id) === false) {
        $smarty->trigger_error("paginate_next: total was not set");
        return;        
    }
    
    $_url = SmartyPaginate::getURL($_id);
    
    $_attrs = !empty($_attrs) ? ' ' . implode(' ', $_attrs) : '';    
    
    if(($_item = SmartyPaginate::_getNextPageItem($_id)) !== false) {
        $_show = true;
        $_text = isset($params['text']) ? $params['text'] : SmartyPaginate::getNextText($_id);
        $_url .= (strpos($_url, '?') === false) ? '?' : '&';
        $_url .= SmartyPaginate::getUrlVar($_id) . '=' . $_item;
    } else {
        $_show = false;   
    }
    return $_show ? '<a class="btn btn-info" href="' . str_replace('&','&amp;', $_url) . '"' . $_attrs . '>' . $_text .'<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>  </a>' : '';
}

?>
