<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Logs;

use Logs\Model\Logs;
use Logs\Model\LogsTable;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
		$eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
		{
			$moduleRouteListener->attach($eventManager);

		}

    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';

    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                )
            )
        );

    }

	public function getServiceConfig()
	{
		return array(
			'factories' => array(
			'Logs\Model\LogsTable' => function($sm)
			{
				$tableGateway = $sm->get('LogsTableGateway');
				$table 		  = new LogsTable($tableGateway);

				return $table;

			},
			'LogsTableGateway' => function($sm)
			{
				$dbAdapter 			= $sm->get('Zend\Db\Adapter\Adapter');
				$translator 	    = $sm->get('Translator');

				$resultSetPrototype = new ResultSet();
				{
					$resultSetPrototype->setArrayObjectPrototype(new Logs($translator));

				}

				return new TableGateway('logs', $dbAdapter, null, $resultSetPrototype);

			}
		));

	}

}