<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Logs\Form;

use Logs\Model\Logs;

use Zend\Form\Form;
use Zend\Form\Element;

use Zend\Mvc\I18n\Translator;

class LogsForm extends Form
{
	protected $translator;

	public function __construct($name = null, Translator $translator)
	{
		parent::__construct('logs');

		$this->setAttribute('method', 'post'  );
		$this->setAttribute('action', 'create');

		$this->translator = $translator;

		$Logs = new Logs($translator);

        $this->add(array(
            'name' => 'usuario',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'class'		  => 'form-control',
				'placeholder' => '...',
            ),
            'options' => array(
                'label' => $this->translator->translate('User'),
            ),
        )); 

        $this->add(array(
            'name' => 'utilizacao',
            'type' => 'Zend\Form\Element\Select',
            'attributes' => array(
				'class'	   => 'form-control',
                'required' => 'required',
				'value'    => '1',
            ),
            'options' => array(
                'label' => $this->translator->translate('Use'),
                'value_options' => $Logs->strings->utilizacao,
            ),
        ));

        $this->add(array(
            'name' => 'situacao',
            'type' => 'Zend\Form\Element\Select',
            'attributes' => array(
                'class'	   => 'form-control',
				'required' => 'required',
                'value'    => '3',
            ),
            'options' => array(
                'label' => $this->translator->translate('Status'),
                'value_options' => $Logs->strings->situacao,
            ),
        ));

	}

}