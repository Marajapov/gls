<?php

class db_mysql { 
    private $error;
    private $sql;
    private $bind;
    private $rows;

    private $server   = ""; //database server
    private $user     = ""; //database login name
    private $pass     = ""; //database login password
    private $database = ""; //database name
    private $pre      = ""; //table prefix

    //number of rows affected by SQL query
    private $affected_rows = 0;

    private $link_id = 0;
    private $query_id = 0;
    
    public function __construct($server, $user, $pass, $database, $pre='') {
        $this->server=$server;
        $this->user=$user;
        $this->pass=$pass;
        $this->database=$database;
        $this->pre=$pre;
       
    }
    
    public function connect($new_link=false) {
        $this->link_id=@mysql_connect($this->server,$this->user,$this->pass,$new_link);
        if (!$this->link_id) {
            $this->error="Could not connect to server: <b>".$this->server."</b>.";
            }

        if(!@mysql_select_db($this->database, $this->link_id)) {//no database
            $this->error="Could not open database: <b>$this->database</b>";    
            }
		mysql_set_charset('UTF8',$this->link_id);
    }

# show errors etc********************************************************************************
    public function debug() {
        echo  $this->error ;
    }

    
# prepare strings for Mysql***************************************************************************
    function escape($string) {
        if(get_magic_quotes_runtime()) $string = stripslashes($string);
        return @mysql_real_escape_string($string,$this->link_id);
    }#-#escape()
    
 # run sqls for return data******************************************************************************   
    public function run($sql) {
        $this->sql = trim($sql);
        $this->error = "";  
                             //echo $sql;
        $this->query_id = @mysql_query($sql, $this->link_id); 
            if (!$this->query_id) {
                  $this->error="<b>Query failed : </b> $sql";
                return 0;
            }
        $this->affected_rows = @mysql_affected_rows($this->link_id);
        return $this->query_id;           
    }  
    
 #** just delete selected *********************************************************************************   
    public function delete($table, $where) {
        $sql = "DELETE FROM " . $table . " WHERE " . $where . ";";
        $this->run($sql);
    }
# log action ********************************************************************************************  
     public function logaction($table, $sql, $where) {
		$ptt = "/'/";
		$rpl = "`*`";
		$sql = preg_replace($ptt,$rpl, $sql);
		if($_SESSION["userid"]>0){
			$insert = array(
				"user_id" => $_SESSION["userid"],
				"sql" => $sql,
				"table" => $table,
				"where" => $where
				);
			if($this->insert("logdb", $insert)) return true; else return false;
		}
		return $true;
      }    
# look for liveFlag ********************************************************************************************  
     public function checkliveFlag($table, $where="") {
		return $where;
      }    
# select all data output array **********************************************************************************
  public function select_count($table, $where="", $fields="*", $order="", $limit="") {
	  	$where = $this->checkliveFlag($table, $where);
        $sql = "SELECT " . $fields . " FROM " . $table;
        if(!empty($where))
            $sql .= " WHERE " . $where;
        if(!empty($order))
            $sql .= " " . $order;             
        if(!empty($limit))
            $sql .= " LIMIT " . $limit;
        $sql .= ";";  
		//echo $sql;    
         $query_id = $this->run($sql);         
         $count=mysql_num_rows($query_id); 
     
        $this->free_result($query_id);
        return $count;
        //return $this->fetch_all_array($sql);
    }    

# select all data output array **********************************************************************************
  public function independent_select_count($table, $where="", $fields="*", $order="", $limit="") {
        $sql = "SELECT " . $fields . " FROM " . $table;
        if(!empty($where))
            $sql .= " WHERE " . $where;
        if(!empty($order))
            $sql .= " " . $order;             
        if(!empty($limit))
            $sql .= " LIMIT " . $limit;
        $sql .= ";";       
         $query_id = $this->run($sql);         
         $count=mysql_num_rows($query_id); 
     
        $this->free_result($query_id);
        return $count;
        //return $this->fetch_all_array($sql);
    }    

    
 #** For insert from array data*******************************************************************************
    public function insert($table, $info) {              
        $q="INSERT INTO `".$this->pre.$table."` ";
        $v=''; $n=''; 
          foreach($info as $key=>$val) {
			$val = str_replace("'","%27", $val);
			$n.="`$key`, ";
            if(strtolower($val)=='null') $v.="NULL, ";
             elseif(strtolower($val)=='now()') $v.="NOW(), ";
             //else $v.= "'".$this->escape($val)."', "; 
             else $v.= "'".$val."', ";  
         } 
       $q .= "(". rtrim($n, ', ') .") VALUES (". rtrim($v, ', ') .");";
	   //echo $q;
	   //die();
	if($this->run($q)){           
        return mysql_insert_id($this->link_id);
    } else{
        return 0; 
    }    
 }

 #** update from array and id***********************************************************************************
    public function update($table, $info, $where='1') {
        try{
            $sql="UPDATE `".$this->pre.$table."` SET ";
            foreach($info as $key=>$val) {
				$val = str_replace("'","%27", $val);
                if(strtolower($val)=='null') $sql.= "`$key` = NULL, ";
                elseif(strtolower($val)=='now()') $sql.= "`$key` = NOW(), ";
                elseif(preg_match("/^increment\((\-?\d+)\)$/i",$val,$m)) $sql.= "`$key` = `$key` + $m[1], "; 
                //else $sql.= "`$key`='".$this->escape($val)."', ";
                else $sql.= "`$key`='".$val."', ";
            }  
               $sql = rtrim($sql, ', ') . ' WHERE '.$where.';';
              //echo $sql;
			  if($this->run($sql)){
				 if ($this->logaction($table, $sql, $where));
                 return 1; 
              }else{
                 return 0; 
              }
            
        }catch(Exception $e){
            return 0;
        }  
     }
     
 # select all data output array **********************************************************************************
  public function query($sql) {
       $query_id = $this->run($sql);
        $out = array();

        while ($row = $this->fetch_array($query_id)){
            $out[] = $row;
        }
        $this->free_result($query_id);
        return $out;
        //return $this->fetch_all_array($sql);
    } 

 # select all data output one **********************************************************************************
  public function query_one($sql) {
       $query_id = $this->run($sql);
        $out = $this->fetch_array($query_id);
        $this->free_result($query_id);
        return $out;       
    } 
 
# select all data output array **********************************************************************************
  public function select($table, $where="", $fields="*", $order="", $limit="") {
	  	$where = $this->checkliveFlag($table, $where);
        $sql = "SELECT " . $fields . " FROM " . $table;
        if(!empty($where))
            $sql .= " WHERE " . $where;
        if(!empty($order))
            $sql .= " " . $order;             
        if(!empty($limit))
            $sql .= " LIMIT " . $limit;
        $sql .= ";";  
		//echo $sql;
        $query_id = $this->run($sql);
        $out = array();

        while ($row = $this->fetch_array($query_id)){
            $out[] = $row;
        }
        $this->free_result($query_id);
        return $out;
        //return $this->fetch_all_array($sql);
    } 

# PURE SQL
public function selectpuresql($sql) {
        $query_id = $this->run($sql);
        $out = array();

        while ($row = $this->fetch_array($query_id)){
            $out[] = $row;
        }
        $this->free_result($query_id);
        return $out;
        //return $this->fetch_all_array($sql);
    } 
    
 # return first selected record********************************************************************
   public function select_one($table, $where="", $fields="*", $order="", $limit="") {
	   	$where = $this->checkliveFlag($table, $where);
         $sql = "SELECT " . $fields . " FROM " . $table;
        if(!empty($where))
            $sql .= " WHERE " . $where;
        if(!empty($order))
            $sql .= " " . $order;             
        if(!empty($limit))
            $sql .= " LIMIT " . $limit;
        $sql .= ";"; 
        //echo $sql;
        
		$query_id = $this->run($sql);
        $out = $this->fetch_array($query_id);
        $this->free_result($query_id);
        return $out;
    } 

 # return first selected record********************************************************************
   public function update_status() {
	$this->run("update zakaz_position set status='0'");
    }    
    
# return for array output***************************************************************************** 
    function fetch_array($query_id=-1) {
        // retrieve row
        if ($query_id!=-1) {
            $this->query_id=$query_id;
        }

        if (isset($this->query_id)) {
            $record = @mysql_fetch_assoc($this->query_id);
        }else{
            $this->error="Invalid query_id: <b>$this->query_id</b>. Records could not be fetched.";
        }
        return $record;
    }#-#fetch_array()
    
# Free results for ********************************************************************************************  
      function free_result($query_id=-1) {
        if ($query_id!=-1) {
            $this->query_id=$query_id;
        }
        if($this->query_id!=0 && !@mysql_free_result($this->query_id)) {
            $this->error="Result ID: <b>$this->query_id</b> could not be freed.";
        }
      }    
}
?>
