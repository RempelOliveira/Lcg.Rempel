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

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;

use Zend\InputFilter\Factory as InputFactory;
use Zend\Mvc\I18n\Translator;

class LogsValidator implements InputFilterAwareInterface
{
    protected $translator;
	protected $inputFilter;

	public function __construct(Translator $translator)
	{
		$this->translator = $translator;

	}

    public function setInputFilter(InputFilterInterface $inputFilter)
    { 
        throw new \Exception("Not used");

    } 

    public function getInputFilter()
    {
        if(!$this->inputFilter)
        {
			$Logs = new Logs($this->translator);

			$factory 	 = new InputFactory();
			$inputFilter = new InputFilter();

			$inputFilter->add($factory->createInput(
			[
				'name' => 'usuario',
				'filters' => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
				'validators' => array(
					array(
						'name' => 'NotEmpty',
						'options' => array(
							'messages' => array(
								'isEmpty' => $Logs->translator->translate('Value is required and can\'\t be empty.')
							),
						),
					),
					array(
						'name' => 'StringLength',
						'options' => array(
							'encoding' => 'UTF-8',
							'min' => '0',
							'max' => '250',
							'messages' => array(
								'stringLengthTooLong' => $Logs->translator->translate('The input is more than 250 characters long.')
							),
						),
					),
				),
			]));

			$inputFilter->add($factory->createInput(
			[
				'name' => 'utilizacao',
				'filters' => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
				'validators' => array(
					array(
						'name' => 'InArray',
						'options' => array(
							'haystack' => array_keys($Logs->strings->utilizacao),
							'messages' => array(
								'notInArray' => $Logs->translator->translate('Invalid option.')
							),
						),
					),
				),
			]));

			$inputFilter->add($factory->createInput(
			[
				'name' => 'situacao',
				'filters' => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
				'validators' => array(
					array(
						'name' => 'InArray',
						'options' => array(
							'haystack' => array_keys($Logs->strings->situacao),
							'messages' => array(
								'notInArray' => $Logs->translator->translate('Invalid option.')
							),
						),
					),
				),
			]));

            $this->inputFilter = $inputFilter;

        } 

        return $this->inputFilter;

    }

}