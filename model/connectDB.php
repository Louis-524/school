<?php
//取得所有傳送過來的值 判斷是用get或post
if($_POST){
foreach ($_POST as $key => $value) {
     $key=$value;
    }
}
else {
foreach ($_GET as $key => $value) {
     $key=$value;
    }
}
class PDOConfig extends PDO {

    private $engine;
    private $host;
    private $database;
    private $user;
    private $pass;
    private $charset;

    public function __construct(){
			$this->engine = 'mysql';
            $this->host = 'localhost';
            $this->charset='utf8';
            $this->database = 'test';
            $this->user = 'root';
        $this->pass = '';
        $dns = $this->engine.':dbname='.$this->database.";host=".$this->host.";charset=".$this->charset;
        parent::__construct( $dns, $this->user, $this->pass );
    }
}
?>
