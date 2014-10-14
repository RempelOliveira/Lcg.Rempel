<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Logs\Model;

use Zend\Mvc\I18n\Translator;

class Logs
{
	public $final;
	public $id_log;
	public $inicio;
	public $usuario;
	public $situacao;
	public $id_linha;
	public $utilizacao;

	public $strings = array();
	public $translator;

	public function __construct(Translator $translator)
	{
		$this->translator = $translator;
		$this->strings 	  = (object)array
		(
			'situacao'   => array
			(
				1 => $this->translator->translate('New Line'),
				2 => $this->translator->translate('Stock'   ),
				3 => $this->translator->translate('In Use'  ),
				4 => $this->translator->translate('Canceled')
			),
			'utilizacao' => array
			(
				1 => $this->translator->translate('Business'),
				2 => $this->translator->translate('Private' )
			)
		);

	}

	public function exchangeArray($data)
	{
		$this->final      = (!empty($data['final']))      ? $data['final']  							  	    : null;
		$this->id_log     = (!empty($data['id_log'])) 	  ? $data['id_log'] 							  	    : null;
		$this->inicio     = (!empty($data['inicio']))     ? $data['inicio']  							  	    : null;
		$this->usuario    = (!empty($data['usuario']))    ? $data['usuario']    						  	    : null;
		$this->situacao   = (!empty($data['situacao']))   ? $this->strings->{'situacao'}[$data['situacao']] 	: null;
		$this->id_linha   = (!empty($data['id_linha']))   ? $data['id_linha']   						  	    : null;
		$this->utilizacao = (!empty($data['utilizacao'])) ? $this->strings->{'utilizacao'}[$data['utilizacao']] : null;
		
	}

}