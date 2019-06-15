<?php
class database {
	private static $host = 'mysql:host=localhost;dbname=pfe';
	private static $user = 'root';
	private static $pass = '';
	private $db;
	private $ps;
	private $rs;
	/**
	 */
	public function __construct() {
		try {
			$this->db = new PDO ( self::$host, self::$user, self::$pass, array (
					PDO::ATTR_PERSISTENT => true 
			) );
		} catch ( PDOException $ex ) {
			echo $ex->getMessage();
			//throw new Exception($ex->getMessage());
		}
	}
	/**
	 */
	public  function __destruct() {
		$this->db = null;
		unset($this->db);
		unset($this->ps);
		unset($this->rs);
	}
	/**
	 */
	public function __autoload() {
	}
	/**
	 * 
	 * @param unknown $string
	 * @param array $args
	 * @param string $boolean
	 * @return multitype:
	 */
	public function doQuery($string, array $args = null, $boolean = false)  {
		try {
			if (! $boolean)
				$this->ps = $this->db->prepare ( $string );
			$i = 1;
			if ($args != null)
				foreach ( $args as $value ) {
					if ($i != 1) {
						$this->ps->bindValue ( $i - 1, $value );
					}
					$i++;
				}
		if($this->ps->execute ()){
			$this->rs = $this->ps->fetchAll ( PDO::FETCH_BOTH );
			return ( $this->rs);
		}else
			$err=$this->ps->errorInfo();
			throw new Exception ($err[2]);
		} catch ( PDOException $ex ) {
			throw new PDOException ($ex->getMessage());
		}
	}
	public function query($query) {
		try {
			$this->ps = $this->db->query ( $query );
		if($this->ps->execute ()){
			$this->rs = $this->ps->fetchAll ( PDO::FETCH_BOTH );
			return ( $this->rs);
		}else
			$err=$this->ps->errorInfo();
			throw new Exception ($err[2]);
		} catch ( PDOException $ex ) {
			throw new Exception($ex->getMessage());
		}
	}
	/**
	 *
	 * @param String $string        	
	 * @param array $args        	
	 * @return boolean
	 */
	public function doNonQuery($string, array $args = null,$boolean = false) {
		try {
			if (!$boolean)
				$this->ps = $this->db->prepare ( $string );
			$i = 1;
			if ($args != null)
				foreach ( $args as $value ) {
					if ($i != 1) {
						$this->ps->bindValue ( $i - 1, $value );
					}
					$i ++;
				}
		if($this->ps->execute ()){
			return true;
		}else
			$err=$this->ps->errorInfo();
			throw new Exception ($err[2]);
		} catch ( PDOException $ex ) {
			throw new Exception($ex->getMessage());
		}
	}
	
	public function nonQuery($string) {
		try {
			$this->ps = $this->db->query ( $string );
		if($this->ps->execute ()){
			return true;
		}else
			$err=$this->ps->errorInfo();
			throw new Exception ($err[2]);
		} catch ( PDOException $ex ) {
			throw new Exception($ex->getMessage());
		}
	}
	
	public function __clone(){
		return clone $this;
	}
	
	function __call($e,$m){
		print 'walou';
	}
	
	function __toString(){
		return  'walou';
	}
}
?>