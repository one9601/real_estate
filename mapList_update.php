<?php
include_once('./_common.php');
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

error_reporting(E_ALL);

ini_set("display_errors", 1);



$s = $_GET['south_lat'];
$n = $_GET['north_lat'];
$w = $_GET['west_lng'];
$e = $_GET['east_lat'];

$page = $_GET['page'];
$level = $_GET['level'];
$detail = $_GET['detail'];
$center_lat = $_GET['center_lat'];
$center_lng = $_GET['center_lng'];
$bo_table = "2023portfolio_write_".$_GET['bo_table'];



$page_rows = $_GET['page_cnt'];
if(!$page){	$page = '1'; }

$sql_cnt = "SELECT count(wr_id) as cnt FROM {$bo_table} WHERE (wr_5 BETWEEN {$s} and {$n}) and (wr_6 BETWEEN {$w} and {$e}) order by wr_id asc";

  

  $rows = sql_fetch($sql_cnt);
  
  $total_count = $rows['cnt'];
  $total_page  = ceil($total_count / $page_rows);  // 전체 페이지 계산
  $from_record = ($page - 1) * $page_rows; // 시작 열을 구함
  
  // echo $total_count;
  
  
  $sql = "
    SELECT SQRT(POW(69.1 * ($center_lng - wr_6), 2) + POW(69.1 * (wr_5 - $center_lat) * COS(wr_6 / 57.3), 2)) AS distance, wr_id, wr_subject, wr_3, wr_5, wr_6, wr_7, wr_8, wr_11 FROM `{$bo_table}` WHERE (wr_5 BETWEEN {$s} and {$n}) and (wr_6 BETWEEN {$w} and {$e}) order by distance asc limit {$from_record}, $page_rows
  ";

  // echo $sql;

  $result = sql_query($sql);
  
  
  for($i=0; $row=sql_fetch_array($result); $i++){
    $data[$i] = $row;
      
    $thumb[$i] = get_list_thumbnail($_GET['bo_table'], $data[$i]['wr_id'], 354, 354, false, true);
    if($thumb[$i]['src']) {
      $data[$i]['thumb_src']  = $thumb[$i]['src'];
    }else{ //이미지 없을때
      $data[$i]['thumb_src'] = '';
    }
  
    $row_data1[$i] = array(
      'idx' => $i, 'wr_id' => $data[$i]['wr_id'], 'wr_subject' => $data[$i]['wr_subject'], 'thumb_img' => $data[$i]['thumb_src'], 'wr_3' => $data[$i]['wr_3'], 'wr_7' => $data[$i]['wr_7'], 'wr_8' => $data[$i]['wr_8'], 'wr_11' => $data[$i]['wr_11']
    );
  }

  if(!isset($row_data1)){
    $row_data1 = "noData";
  }


  $data_list_result = array('mapItems' => $row_data1, 'TotalCount' => $total_count, 'page' => $page);

  echo json_encode($data_list_result);




?>

