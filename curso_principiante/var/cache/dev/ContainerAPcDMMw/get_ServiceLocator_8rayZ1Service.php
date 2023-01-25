<?php

namespace ContainerAPcDMMw;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_8rayZ1Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.8rayZ1_' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.8rayZ1_'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'em' => ['services', 'doctrine.orm.default_entity_manager', 'getDoctrine_Orm_DefaultEntityManagerService', false],
            'tareaRepository' => ['privates', 'App\\Repository\\TareaRepository', 'getTareaRepositoryService', true],
        ], [
            'em' => '?',
            'tareaRepository' => 'App\\Repository\\TareaRepository',
        ]);
    }
}