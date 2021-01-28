<?php

namespace Hospital;

use Zend\Db\Adapter\Adapter;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                Model\HospitalTable::class        => function ($container) {
                    $tableGateway = $container->get('Model\HospitalTableGateway');

                    return new Model\HospitalTable($tableGateway);
                },
                'Model\HospitalTableGateway' => function ($container) {
                    $dbAdapter          = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Hospital());

                    return new TableGateway('hospital', $dbAdapter, null, $resultSetPrototype);
                },
            ],
        ];
    }

    public function getControllerConfig()
    {
        return [
            'factories' => [
                Controller\HospitalController::class => function ($container) {
                    return new Controller\HospitalController(
                        $container->get(Model\HospitalTable::class)
                    );
                },
            ],
        ];
    }
}