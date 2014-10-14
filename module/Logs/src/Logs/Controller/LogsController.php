<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Logs\Controller;

use Logs\Form\LogsForm;
use Logs\Form\LogsValidator;

use Logs\Model\Logs;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Zend\Session\Container;

class LogsController extends AbstractActionController
{
	protected $LogsTable;

	public function getLogsTable()
	{
		if(!$this->LogsTable)
		{
			$sm 			 = $this->getServiceLocator();
			$this->LogsTable = $sm->get("Logs\Model\LogsTable");

		}

		return $this->LogsTable;

	}

	public function CreateAction()
    {
        $form    = new LogsForm(null, $this->getServiceLocator()->get("Translator"));
		$request = $this->getRequest();

		if($request->isPost() == true)
		{
			$validator = new LogsValidator($this->getServiceLocator()->get("Translator"));
			{
				$form->setInputFilter($validator->getInputFilter());
				$form->setData($request->getPost());

			}

			if($form->isValid())
			{
				$Logs = new Logs($this->getServiceLocator()->get("Translator"));
				$Logs->exchangeArray($form->getData());

				$this->getLogsTable()->saveLogs($Logs);

				$Session 		  = new Container();
				$Session->success = true;
				
				return $this->redirect()->toRoute("logs");

			}

		}

		return new ViewModel(array
		(
			'form' => $form

		));

    }

	public function ReadAction()
    {
		$Session = new Container();
		$Success = $Session->success;

		unset($Session->success);

        return new ViewModel(array
		(
			'logs' 	  => $this->getLogsTable()->fetchAll(),
			'success' => $Success

		));

    }

}