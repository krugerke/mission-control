<?php
namespace Doctrine\DBAL\Driver\OCI8;

class Driver extends \Doctrine\DBAL\Driver\OCI8\Driver {
	/**
	 * @var \Doctrine\DBAL\Driver\OCI8\OCI8Connection
	 */
	protected $oci8Connection;

	/**
	 * @var resource
	 */
	protected $dbh;
	
	public function connect(array $params, $username = null, $password = null, array $driverOptions = array())
	{
		/*
		return new \Doctrine\DBAL\Driver\OCI8\OCI8Connection(
			$username,
			$password,
			$this->_constructDsn($params),
			isset($params['charset']) ? $params['charset'] : null,
			isset($params['sessionMode']) ? $params['sessionMode'] : OCI_DEFAULT,
			isset($params['persistent']) ? $params['persistent'] : false
		);
		*/
		$this->oci8Connection = new \Doctrine\DBAL\Driver\OCI8\OCI8Connection(
				$username,
				$password,
				$this->_constructDsn($params),
				isset($params['charset']) ? $params['charset'] : null,
				isset($params['sessionMode']) ? $params['sessionMode'] : OCI_DEFAULT,
				isset($params['persistent']) ? $params['persistent'] : false
		);
		
		return $this->oci8Connection;
		//var_dump($this->oci8Connection);
		// query to alter the date format for an Oracle database session
		//$query = "ALTER SESSION SET NLS_DATE_FORMAT='YYYY/MM/DD'";
		//$parsedQuery = oci_parse($this->dbh, $query);
		//oci_execute($parsedQuery);
		
		//die;
	}

	/**
	 * Returns the dbh resource that is created by the constructor.
	 *
	 * @return resource
	 */
	//public function getDbh()
	//{
		//return $this->dbh;
	//}
}