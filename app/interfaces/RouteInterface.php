<?php

/**
 * Initialize route interface
 *
 * @category Routes
 * @package  General
 * @author   Sadra Moghadasi <sadra.19@gmail.com>
 * @license  Copyright Offun
 * @link     https://offun.ir
 */

namespace App\Interfaces;

/**
 * Initialize route interface
 *
 * @category Routes
 * @package  RouteInterface
 * @author   Sadra moghadasi <sadra.19@gmail.com>
 * @license  Copyright iran-tarabar
 * @link     https://iran-tarabar.ir
 */
interface RouteInterface
{
    /**
     * Initialize routes
     *
     * @return void
     */
    public static function init(): void;
}
