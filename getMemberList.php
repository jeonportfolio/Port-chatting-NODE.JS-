<?php
    $db_host = "localhost";
    $db_user = "root";
    $db_passwd = "";
    $db_name = "kakaotalk";

    $db_link = mysqli_connect($db_host,$db_user,$db_passwd); //데이터 베이스 연결 
    mysqli_select_db($db_link,$db_name);//내부 database  선택 

    $SQL = "SELECT memberCode,userId,userIcon, alias FROM member ORDER BY alias";
    $result = mysqli_query($db_link,$SQL); //SQL의 결과물을 result로 가지고 옴
    $memberResult = dbresultTojson($result);
    echo $memberResult;
    
    //받아온 값을 JSON으로 변환 시킨다.
    function dbresultTojson($res)
	{
		$ret_arr = array();

		while($row = mysqli_fetch_array($res))
		{
			foreach($row as $key => $value){
				$row_array[$key] = urlencode($value);
			}
			array_push($ret_arr, $row_array);
		}

		return urldecode(json_encode($ret_arr));
	}

    
?>