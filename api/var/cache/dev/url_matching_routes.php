<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/plats' => [[['_route' => 'app_plats', '_controller' => 'App\\Controller\\PlatController::index'], null, ['GET' => 0], null, false, false, null]],
        '/plat/add' => [[['_route' => 'app_plat_new', '_controller' => 'App\\Controller\\PlatController::addPlat'], null, ['POST' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/plat/(?'
                    .'|show/([^/]++)(*:64)'
                    .'|delete/([^/]++)(*:86)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        64 => [[['_route' => 'app_plat_show', '_controller' => 'App\\Controller\\PlatController::showPlat'], ['id'], ['GET' => 0], null, false, true, null]],
        86 => [
            [['_route' => 'app_plat_delete', '_controller' => 'App\\Controller\\PlatController::deletePlat'], ['id'], ['POST' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
