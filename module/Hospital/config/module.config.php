<php
namespace Hospital;

use Zend\Router\Http\Segment;

return [
    
    ],


    'router' => [
        'routes' => [
            'hospital' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/hospital[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\HospitalController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],

    'view_manager' => [
        'template_path_stack' => [
            'hospital' => __DIR__ . '/../view',
        ],
    ],
];

?>