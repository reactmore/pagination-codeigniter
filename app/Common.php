<?php

/**
 * The goal of this file is to allow developers a location
 * where they can overwrite core procedural functions and
 * replace them with their own. This file is loaded during
 * the bootstrap process and is called during the frameworks
 * execution.
 *
 * This can be looked at as a `master helper` file that is
 * loaded early on, and may also contain additional functions
 * that you'd like to use throughout your entire application
 *
 * @see: https://codeigniter4.github.io/CodeIgniter4/
 */

//paginate
if (!function_exists('paginate')) {
    function paginate($perPage, $total)
    {
        $page = @intval(\Config\Services::request()->getGet('page'));
        if (empty($page) || $page < 1) {
            $page = 1;
        }
        $pager = \Config\Services::pager();
        $pager->makeLinks($page, $perPage, $total);
        $pager->page = $page;
        $pager->offset = ($page - 1) * $perPage;
        return $pager;
    }
}

//count items
if (!function_exists('countItems')) {
    function countItems($items)
    {
        if (!empty($items) && is_array($items)) {
            return count($items);
        }
        return 0;
    }
}
