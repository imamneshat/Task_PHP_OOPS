<?php
    class Database
    {
        public $conn;
        private $host;
        private $user;
        private $password;
        private $baseName;
        private $port;
        private $Debug;

        public function __construct($params=array()) 
        {
            $this->conn = false;
            $this->host = 'localhost'; //hostname
        
            $this->user = 'root'; //username
            $this->password = ''; //password
            $this->baseName = 'user_data'; //name of your database

            $this->port = '3306';
            $this->Debug = true;
            $this->connect();
        }

        public function __destruct() 
        {
            $this->disconnect();
        }

        public function connect() 
        {
            if (!$this->conn) 
            {
                try 
                {
                    $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->baseName.'', $this->user, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
                    // set the PDO error mode to exception
                    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }
                catch (Exception $e) 
                {
                    die('Erreur : ' . $e->getMessage());
                }

                if (!$this->conn) 
                {
                    $this->status_fatal = true;
                    echo 'Connection BDD failed';
                    die();
                }
                else 
                {
                    $this->status_fatal = false;
                }
            }

            return $this->conn;
        }

        public function disconnect() 
        {
            if ($this->conn) 
            {
                $this->conn = null;
            }
        }

        public function cleanData($data)
        {
            $data = trim($data);
            $data = strip_tags($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
         
        public function dmy($day2convert)
        {
            $timestamp = strtotime($day2convert);
            $dmy = date("d-M-Y", $timestamp);
            return$dmy;
        }
    
        public function month($date)
        {
            $month =  date("M", strtotime($date));
            return $month;
        }
         
        public function url($id,$title)
        {
            $url =   $id."_".implode("-",explode(' ',$title));
            return $url;
        }

        public function percent($get,$total)
        {
            $percent =$get/$total;
            $percent = floor($percent*100);
            return $percent;
        }

        public function alt($title)
        {
            $alt = explode(" ",$title);
            $alt = implode("-",$alt);
            return $alt;
        }
         
        public function auto_copyright($year = 'auto')
        {
            if(intval($year) == 'auto')
            { 
                $year = date('Y'); 
            }
            if(intval($year) == date('Y'))
            { 
                echo intval($year); 
            }
            if(intval($year) < date('Y'))
            { 
                echo intval($year) . ' - ' . date('Y'); 
            }
            if(intval($year) > date('Y'))
            { 
                echo date('Y'); 
            }
        }
        
        public function current_page_name ()
        {
            $pageName = basename($_SERVER['PHP_SELF']);
            return $pageName;
        } 
    }
?>
