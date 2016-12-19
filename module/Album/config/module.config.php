<?php

namespace Album;

use Zend\Router\Http\Segment;
use Album\Controller\AlbumController;
//use Zend\ServiceManager\Factory\InvokableFactory;

return [
   /* 'controllers' => [
        'factories' => [
            Controller\AlbumController::class => InvokableFactory::class,
        ],
    ],*/
     'router' => [
        'routes' => [
            'album' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/album[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\AlbumController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            'album' => __DIR__ . '/../view',
        ],
    ],

  'view_helpers' => array(
        'factories' => array(
            'Zend\View\Helper\Navigation' => 'UMS\Factory\NavigationViewFactory',
            'zendviewhelpernavigation' => 'UMS\Factory\NavigationViewFactory',
        ),
 ),

    'home' => [
    'type' => \Zend\Router\Http\Literal::class,
    'options' => [
        'route'    => '/',
        'defaults' => [
            'controller' => Controller\AlbumController::class,
            'action'     => 'index',
        ],
    ],
],
];