<?php

namespace ContainerXS3NwkI;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_RQcjfe3Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.RQcjfe3' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.RQcjfe3'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'App\\Controller\\TareaController::crear' => ['privates', '.service_locator.9kKwU2t', 'get_ServiceLocator_9kKwU2tService', true],
            'App\\Controller\\TareaController::editar' => ['privates', '.service_locator.8rayZ1_', 'get_ServiceLocator_8rayZ1Service', true],
            'App\\Controller\\TareaController::eliminar' => ['privates', '.service_locator.Gu_Tond', 'get_ServiceLocator_GuTondService', true],
            'App\\Controller\\TareaController::listado' => ['privates', '.service_locator.bRiazx9', 'get_ServiceLocator_BRiazx9Service', true],
            'App\\Kernel::loadRoutes' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'App\\Kernel::registerContainerConfiguration' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'kernel::loadRoutes' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'kernel::registerContainerConfiguration' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'App\\Controller\\TareaController:crear' => ['privates', '.service_locator.9kKwU2t', 'get_ServiceLocator_9kKwU2tService', true],
            'App\\Controller\\TareaController:editar' => ['privates', '.service_locator.8rayZ1_', 'get_ServiceLocator_8rayZ1Service', true],
            'App\\Controller\\TareaController:eliminar' => ['privates', '.service_locator.Gu_Tond', 'get_ServiceLocator_GuTondService', true],
            'App\\Controller\\TareaController:listado' => ['privates', '.service_locator.bRiazx9', 'get_ServiceLocator_BRiazx9Service', true],
            'kernel:loadRoutes' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'kernel:registerContainerConfiguration' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
        ], [
            'App\\Controller\\TareaController::crear' => '?',
            'App\\Controller\\TareaController::editar' => '?',
            'App\\Controller\\TareaController::eliminar' => '?',
            'App\\Controller\\TareaController::listado' => '?',
            'App\\Kernel::loadRoutes' => '?',
            'App\\Kernel::registerContainerConfiguration' => '?',
            'kernel::loadRoutes' => '?',
            'kernel::registerContainerConfiguration' => '?',
            'App\\Controller\\TareaController:crear' => '?',
            'App\\Controller\\TareaController:editar' => '?',
            'App\\Controller\\TareaController:eliminar' => '?',
            'App\\Controller\\TareaController:listado' => '?',
            'kernel:loadRoutes' => '?',
            'kernel:registerContainerConfiguration' => '?',
        ]);
    }
}
