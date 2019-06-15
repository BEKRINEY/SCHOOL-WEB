// <?php
class database {
	private static $host = 'localhost';
	private static $user = 'root';
	private static $pass = '';
	private static $dbname = 'pfephp';
	private $db;
	private $ps;
	private $rs;
	/**
	 */
	public function __construct(){
		try {
			$this->db = new mysqli ( self::$host, self::$user, self::$pass, self::$dbname );
		} catch ( mysqli_sql_exception $ex ) {
			throw new Exception($ex->getMessage());
		}
	}
	/**
	 */
	public function __destruct() {
		$this->db->close ();
		unset($this->db);
		unset($this->ps);
		unset($this->rs);
	}
	/**
	 */
	
	public function query($query) {
		try {
			$this->ps = $this->db->query( $query );
			if($this->ps!=false){
				$this->rs=$this->ps->fetch_all(MYSQLI_BOTH);
				return $this->rs;
			}
			else
				throw new Exception($this->db->error);
		} catch ( mysqli_sql_exception $ex ) {
			throw new Exception($ex->getMessage());
		}
	}
	/**
	 *
	 * @param String $string
	 * @param array $args
	 * @return boolean
	 */
	public function nonQuery($string) {
		try {
			$this->ps = $this->db->query( $string );
			if($this->ps!=false){
				return true;
			}
			else
				throw new Exception($this->db->error);
		} catch ( mysqli_sql_exception $ex ) {
			throw new Exception($ex->getMessage());
		}
	}
	
	/**
	 *
	 * @param unknown $string        	
	 * @param array $args        	
	 * @return Ambigous <NULL, multitype:>
	 */
	public function doQuery($string, array $args = null, $boolean = false) {
		try {
			if (! $boolean)
				$this->ps = $this->db->prepare ( $string );
			if ($args != null)
			{
				// $ref    = new ReflectionClass('mysqli_stmt');
				// $method = $ref->getMethod("bind_param");
				// $method->invokeArgs($this->ps,$args);
			}
			if($this->ps->execute ()){
				$this->rs = $this->ps->get_result ();
				return $this->rs->fetch_all (MYSQLI_BOTH);
			}
			else
				throw new Exception($this->db->error);
		} catch ( mysqli_sql_exception $ex ) {
			throw new Exception($ex->getMessage());
		}
	}
	/**
	 *
	 * @param String $string        	
	 * @param array $args        	
	 * @return boolean
	 */
	public function doNonQuery( $string, array $args = null, $boolean = false) {
		try {
			if (! $boolean)
				$this->ps = $this->db->prepare ( $string );
			if ($args != null)
			{
				$ref    = new ReflectionClass('mysqli_stmt');
				$method = $ref->getMethod("bind_param");
				$method->invokeArgs($this->ps,$args);
			}
			if($this->ps->execute ())
			return true;
			else 
				throw new Exception($this->db->error);
		} catch ( mysqli_sql_exception $ex ) {
			throw new Exception($ex->getMessage());
		}
	}
}
?>