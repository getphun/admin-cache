<?php
/**
 * admin-cache config file
 * @package admin-cache
 * @version 0.0.1
 * @upgrade true
 */

return [
    '__name' => 'admin-cache',
    '__version' => '0.0.1',
    '__git' => 'https://github.com/getphun/admin-cache',
    '__files' => [
        'modules/admin-cache' => [ 'install', 'remove', 'update' ],
        'theme/admin/system/cache' => [ 'install', 'remove', 'update' ]
    ],
    '__dependencies' => [
        'admin'
    ],
    '_services' => [],
    '_autoload' => [
        'classes' => [
            'AdminCache\\Controller\\CacheController'  => 'modules/admin-cache/controller/CacheController.php',
        ],
        'files' => []
    ],
    
    '_routes' => [
        'admin' => [
            'adminSystemCache' => [
                'rule'  => '/system/cache',
                'handler' => 'AdminCache\\Controller\\Cache::index'
            ]
        ]
    ],
    
    'admin' => [
        'menu' => [
            'system' => [
                'label'     => 'System',
                'icon'      => 'terminal',
                'order'     => 20000,
                'submenu'   => [
                    'caches'    => [
                        'label'     => 'Caches',
                        'perms'     => 'clear_cache',
                        'target'    => 'adminSystemCache',
                        'order'     => 200
                    ]
                ]
            ]
        ]
    ]
];