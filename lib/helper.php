 <?php
 if(!isset($_SESSION)){ 
        session_start(); 
    }
?>
<?php require_once('config/config.php'); ?>
<?php
	function mres($input){
		if(get_magic_quotes_gpc()){
			$input = stripslashes($input);
		}
		return mysql_real_escape_string($input);
	}
	function selectEndID($id, $table){
		$id_db = 0;
		$sql = "
				select $id
				from $table
				ORDER BY $id 
				DESC LIMIT 1
				";
		$query = mysql_query($sql);
		while($row = mysql_fetch_assoc($query)){
			$id_db = $row[$id];
		}
		return $id_db;
	}
	function selectTable($table,$f1,$f2){
		$data = array();
		$sql = "
				select *
				from $table
				";
		$query = mysql_query($sql);
		while($row = mysql_fetch_assoc($query)){
			$id_db[] = $row;
		}
		return $id_db;
	}
	function selectData_fil($table,$f1){
		$data = array();
		$sql = "
				select $f1
				from $table
				group by $f1
				order by $f1
				";
		$query = mysql_query($sql);
		while($row = mysql_fetch_assoc($query)){
			$id_db[] = $row[$f1];
		}
		return $id_db;
	}
	function selectData_fil_id($table,$f1,$f2,$result){
		$data = "";
		$sql = "
				select $f1
				from $table
				where $f2 = '$result'
				";
		$query = mysql_query($sql);
		while($row = mysql_fetch_assoc($query)){
			$data = $row[$f1];
		}
		return $data;
	}
	function selectTableAs($table,$f1,$f2){
		$data = array();
		$sql = "
				select *
				from $table
				order by $f1 DESC
				";
		$query = mysql_query($sql);
		while($row = mysql_fetch_assoc($query)){
			$id_db[] = $row;
		}
		return $id_db;
	}
	function upload_image($files, $proType,$proid ){
		ini_set('display_errors','off');
		date_default_timezone_set('Asia/Phnom_Penh');
		//2014-03-04 00:00:00
        $cur_time   = date('Y_m_d_H_m_s');
		$p = "uploads/".$proType."/".$proid;
		for($x=0; $x < count($files['name']); $x++){
			$file_name = $files['name'][$x];
			$file_size = $files['size'][$x];
			$file_tmp = $files['tmp_name'][$x];
            $file_ext = strtolower(end(explode('.' , $file_name)));
			if($file_size > 5242880){
				$msg = 'File upload under 5MB';
			}
			else if(empty($errors)){
				$new_name = $proid."_".$cur_time."_".$x.".".$file_ext;
				if($x == 0){
				$_GET['table'] = $proType;
				if($_GET['table'] == 'phone'){
					$tbl = "tblphone";
					$id_f = "PID";
				}else if($_GET['table'] == 'acc'){
					$tbl = "tblaccessary";
					$id_f = "AccID";
				}else if($_GET['table'] == 'spare'){
					$tbl = "tblsparepart";
					$id_f = "SPID";
				}else if($_GET['table'] == 'download'){
					$tbl = "tbldownload";
					$id_f = "DID";
				}else if($_GET['table'] == 'news'){
					$tbl = "tblnews";
					$id_f = "News_ID";
				}else if($_GET['table'] == 'train'){
					$tbl = "tbltrain";
					$id_f = "TRID";
				}else if($_GET['table'] == 'spare_service'){
					$tbl = "tblsparepartservice";
					$id_f = "SPID";
				}
				
				$sql1="
						UPDATE 
							$tbl
						SET 
							img='$new_name'
						WHERE 
							$id_f='$proid'
					 ";
				$result=mysql_query($sql1);
				}
				$path = $p."/".$new_name;
				if(move_uploaded_file($file_tmp, $path)){ 
				}
			}
		}
	}
	function insert_acc($proid,$model,$price,$category,$brand,$status,$option,$userid,$des){
        date_default_timezone_set('Asia/Phnom_Penh');
		//2014-03-04 00:00:00
        $cur_time   = date('Y-m-d H:m:s');
        $sql = "
                    INSERT INTO
                        tblaccessary(
                                  AccID,
                                  Model,
                                  Upload_Datetime,
                                  Upload_By,
                                  Price,
                                  Status,
                                  Opt,
								  ACC_CatID,
								  Acc_BrID,
								  Description
                                 )
                    VALUE(
                            '$proid',
                            '".mysql_real_escape_string($model)."',
                            '$cur_time',
                            '$userid',
                            '$price',
                            '$status',
                            '$option',
							'$category',
							'$brand',
							'".mysql_real_escape_string($des)."'
                          )
                   ";
        $query=mysql_query($sql);
        if($query){
            
        }
    }


    function insert_download($did,$title,$des,$userid,$category,$status,$ios,$android,$win,$mac){
        date_default_timezone_set('Asia/Phnom_Penh');
		//2014-03-04 00:00:00
        $cur_time   = date('Y-m-d H:m:s');
        $sql = "
                    INSERT INTO
                        tbldownload(
                                  did,
                                  title,
                                  Description,
                                  Upload_Datetime,
                                  Upload_By,
                                  D_CatName,
                                  Status,
                                  Iphone_Link,
								  Android_Link,
								  win,
								  mac
                                 )
                    VALUES(
                            $did,
                            '".mysql_real_escape_string($title)."',
							'".mysql_real_escape_string($des)."',
                            '$cur_time',
                            '$userid',
                            '$category',
                            '$status',
                            '$ios',
							'$android',
							'$win',
							'$mac'
                          )
                   ";
        $query=mysql_query($sql);
        if($query){
            
        }
    }
	function insert_news($did,$title,$userid,$status){
        date_default_timezone_set('Asia/Phnom_Penh');
		//2014-03-04 00:00:00
        $cur_time   = date('Y-m-d H:m:s');
        $sql = "
                    INSERT INTO
                        tblnews(
                                  News_ID,
                                  Title,                               
                                  Upload_Datetime,
                                  Upload_By,                                
                                  Status                                
                                 )
                    VALUES(
                            $did,
                            '".mysql_real_escape_string($title)."',			
                            '$cur_time',
                            '$userid',                      
                            '$status'                    
                          )
                   ";
        $query=mysql_query($sql);
        if($query){
            
        }
    }
	function insert_train($did,$title,$userid,$status){
        date_default_timezone_set('Asia/Phnom_Penh');
		//2014-03-04 00:00:00
        $cur_time   = date('Y-m-d H:m:s');
        $sql = "
                    INSERT INTO
                        tbltrain(
                                  TRID,
                                  Title,                               
                                  Upload_Datetime,
                                  Upload_By,                                
                                  Status                                
                                 )
                    VALUES(
                            $did,
                            '".mysql_real_escape_string($title)."',			
                            '$cur_time',
                            '$userid',                      
                            '$status'                    
                          )
                   ";
        $query=mysql_query($sql);
        if($query){
            
        }
    }
	function get_thumnail($path, $name_image){
        ini_set('display_errors','off');
		$list_files = array();
		$dir  = $path."/".$name_image;
		$file_display = array('jpg', 'jpeg', 'png', 'gif' );
		
		if (file_exists($dir) == false && $flag == true){
			echo 'Directory \'', $dir, '\' not found';
		}else{
			$dir_contents = scandir($dir);
			
			foreach ($dir_contents as $file){
				$file_type = strtolower(end(explode('.', $file)));			
				
				if($file !== '.' && $file !== '..' && in_array($file_type, $file_display) == true ){
				array_push($list_files,$file);	
					 
				}
			}
		}
		return $list_files;
    }
	function insert_phone($proid,$model,$price,$category,$brand,$status,$option,$userid){
        date_default_timezone_set('Asia/Phnom_Penh');
		//2014-03-04 00:00:00
        $cur_time   = date('Y-m-d H:m:s');
        $sql = "
                    INSERT INTO
                        tblphone(
                                  PID,
                                  Model,
                                  Upload_DateTime,
                                  Upload_By,
                                  Price,
                                  Status,
                                  Opt,
								  detail,
								  spe,
								  CatID,
								  BrID
                                 )
                    VALUE(
                            '".mysql_real_escape_string($proid)."',
                            '$model',
                            '$cur_time',
                            '$userid',
                            '$price',
                            '$status',
                            '$option',
							'',
							'',
							'$category',
							'$brand'
                          )
                   ";
        $query=mysql_query($sql);
        if($query){
            
        }
    }
	function insert_spare($proid,$model,$price,$sprice,$brand,$status,$option,$userid,$category,$type,$pmodel){
        date_default_timezone_set('Asia/Phnom_Penh');
		//2014-03-04 00:00:00
        $cur_time   = date('Y-m-d H:m:s');
        $sql = "
                    INSERT INTO
                        tblsparepart(
                                  SPID,
                                  Model,
                                  Upload_DateTime,
                                  Upload_By,
                                  Price,
								  Service_Price,
                                  Status,
                                  Opt,
								  SP_BrID,
								  CatID,
								  TID,
								  PID
                                 )
                    VALUE(
                            '$proid',
                            '".mysql_real_escape_string($model)."',
                            '$cur_time',
                            '$userid',
                            '$price',
							'$sprice',
                            '$status',
                            '$option',
							'$brand',
							'$category',
                            '$type',
                            '$pmodel'
                          )
                   ";
        $query=mysql_query($sql);
        if($query){
            
        }
    }
	function insert_spare_service($proid,$model,$price,$sprice,$brand,$status,$option,$userid,$category,$type,$pmodel){
        date_default_timezone_set('Asia/Phnom_Penh');
		//2014-03-04 00:00:00
        $cur_time   = date('Y-m-d H:m:s');
        $sql = "
                    INSERT INTO
                        tblsparepartservice(
                                  SPID,
                                  Model,
                                  Upload_DateTime,
                                  Upload_By,
                                  Price,
								  Service_Price,
                                  Status,
                                  Opt,
								  SP_BrID,
								  CatID,
								  TID,
								  PID
                                 )
                    VALUE(
                            '$proid',
                            '".mysql_real_escape_string($model)."',
                            '$cur_time',
                            '$userid',
                            '$price',
							'$sprice',
                            '$status',
                            '$option',
							'$brand',
							'$category',
                            '$type',
                            '$pmodel'
                          )
                   ";
        $query=mysql_query($sql);
        if($query){
            
        }
    }
	function selectfeedback(){
		$data = array();
		$sql = "
				select *
				from tblfeedback
				order by FID DESC
				";
		$query = mysql_query($sql);
		while($row = mysql_fetch_assoc($query)){
			$data[] = $row;
		}
		return $data;
	}
	function countfeedback(){ 
		$sql = "select count(FID) from tblfeedback where status=1";
		$result = mysql_query($sql);
		while($row = mysql_fetch_assoc($result)){
			$data = $row["count(FID)"];
		}
		return $data;
	}
	function insert_phone_model($ta_name,$fID,$fName,$pid,$model){
        $sql = "
                    INSERT INTO
                        $ta_name(
                                  $fID,
                                  $fName
							    )
                    VALUE(
                            '".$pid."',
                            '".mysql_real_escape_string($model)."'                        
                          )
                   ";
        $query=mysql_query($sql);
        if($query){
            
        }
    }
?>
