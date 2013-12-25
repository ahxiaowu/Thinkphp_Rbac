<?php
class SessionMemcache {
	private static $handler = null;
	private static $maxLifeTime=null;
	private static $currTime = null;
	const NS = 'session_';
	
	private static function init($handler) {
		self::$handler = $handler;
		self::$maxLifeTime = ini_get('session.gc_maxlifetime');
		self::$currTime = time();
	}

	public static function start(Memcache $memcache) {
		self::init($memcache);
		session_set_save_handler(
			array(__CLASS__,'open'),
			array(__CLASS__,'close'),
			array(__CLASS__,'read'),
			array(__CLASS__,'write'),
			array(__CLASS__,'destroy'),
			array(__CLASS__,'gc')
		);
		session_start();
	}

	private static function session_key($phpSessionID) {
		$session_key = self::NS.$phpSessionID;
		return $session_key;
	}

	public function open($path,$name) {
		return true;
	}

	public function close() {
		return true;
	}
	
	# 读出session
	public function read($id) {
		$id = self::session_key($id);
		$out = self::$handler->get($id);
		if($out === false || $out == null){
			return '';
		}else{
			return $out;
		}
	}
	
	# 写入session
	public function write($id,$data) {
		$method = $data?'set':'replace';
		return self::$handler->$method(self::session_key($id),$data,MEMCACHE_COMPRESSED,self::$maxLifeTime);
	}
	
	# 销毁session
	public function destroy($id) {
		$id = self::session_key($id);
		return self::$handler->delete($id);
	}
	
	//垃圾处理
	public function gc($maxLifeTime) {
		return true;
	}
}

$memcache = new Memcache();
$memcache->connect('127.0.0.1',11211) or die('fail');
SessionMemcache::start($memcache);