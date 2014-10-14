<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Logs\Model;

use Zend\Db\TableGateway\TableGateway;

class LogsTable
{
	protected $tableGateway;

	public function __construct(TableGateway $tableGateway)
	{
		$this->tableGateway = $tableGateway;

	}

	public function fetchAll()
	{
		$query = $this->tableGateway->getSql()->select();
		$query->join('linhas', 'linhas.id_linha = logs.id_linha', array(), 'left');

		return $this->tableGateway->selectWith($query);

	}

	public function getLogs($id)
	{
		$query = $this->tableGateway->getSql()->select();

		$query->join ('linhas', 'linhas.id_linha = logs.id_linha', array(), 'left');
		$query->where(array('logs.id_linha' => (int)$id));

		$row = $this->tableGateway->selectWith($query)->current();

		if(!$row)
			throw new \Exception("Could not find row $id");

		return $row;

	}

	public function saveLogs(Logs $Logs)
	{
		$data = array
		(
			'final'  	 => $Logs->final,
			'usuario'    => $Logs->usuario,
			'situacao'   => array_flip($Logs->strings->situacao)[$Logs->situacao],
			'id_linha'   => 1,
			'utilizacao' => array_flip($Logs->strings->utilizacao)[$Logs->utilizacao]

		);

		$id = (int)$Logs->id;

		if($id == 0)
		{
			$this->tableGateway->insert($data);

		}
		else
		{
			if($this->getLogs($id))
			{
				$this->tableGateway->update($data, array('logs.id_linha' => $id));

			}
			else
				throw new \Exception('Logs id does not exist');

		}

	}

	public function deleteLogs($id)
	{
		$this->tableGateway->delete(array('logs.id_linha' => (int)$id));

	}

 }