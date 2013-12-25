<?php 
class SessionRedis {
	private $redis = null;
	private $redis_prefix = 'redis_'; # 前缀
	private $expire = 1440; # 有效时间

	public function execute() {
		session_set_save_handler(
			array(&$this,"open"), 
			array(&$this,"close"), 
			array(&$this,"read"), 
			array(&$this,"write"), 
			array(&$this,"destroy"), 
			array(&$this,"gc")
		); 
	}

	public function open($path,$name) {
		$this->redis = new Redis();
		$this->redis->connect('127.0.0.1',6379);
	}

	public function close() {
		return $this->redis->close();
	}
	
	# 读出session
	public function read($id) {
		$id = $this->redis_prefix.$id;
		$data = $this->redis->get($id);
		return $data?$data:'';
	}
	
	# 写入session
	public function write($id,$data) {
		$id = $this->redis_prefix.$id;
		return $this->redis->set($id,$data,$this->expire);
	}
	
	# 销毁session
	public function destroy($id) {
		$id = $this->redis_prefix.$id;
		return $this->redis->delete($id);
	}
	
	//垃圾处理
	public function gc($maxLifeTime) {
		return true;
	}
}
?>