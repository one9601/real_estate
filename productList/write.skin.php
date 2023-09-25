<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가


// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);

// if($write['wr_5'] == null){$write['wr_5'] =  37.566400714093284;}
// if($write['wr_6'] == null){$write['wr_6'] = 126.9785391897507;}
?>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<section id="bo_w">
    <h2 class="sound_only"><?php echo $g5['title'] ?></h2>

    <!-- 게시물 작성/수정 시작 { -->
    <form name="fwrite" id="fwrite" action="<?php echo $action_url ?>" onsubmit="return fwrite_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off" style="width:<?php echo $width; ?>">
    <input type="hidden" name="uid" value="<?php echo get_uniqid(); ?>">
    <input type="hidden" name="w" value="<?php echo $w ?>">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="wr_id" value="<?php echo $wr_id ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <?php
    $option = '';
    $option_hidden = '';
    if ($is_notice || $is_html || $is_secret || $is_mail) { 
        $option = '';
        if ($is_notice) {
            $option .= PHP_EOL.'<li class="chk_box"><input type="checkbox" id="notice" name="notice"  class="selec_chk" value="1" '.$notice_checked.'>'.PHP_EOL.'<label for="notice"><span></span>공지</label></li>';
        }
        if ($is_html) {
            if ($is_dhtml_editor) {
                $option_hidden .= '<input type="hidden" value="html1" name="html">';
            } else {
                $option .= PHP_EOL.'<li class="chk_box"><input type="checkbox" id="html" name="html" onclick="html_auto_br(this);" class="selec_chk" value="'.$html_value.'" '.$html_checked.'>'.PHP_EOL.'<label for="html"><span></span>html</label></li>';
            }
        }
        if ($is_secret) {
            if ($is_admin || $is_secret==1) {
                $option .= PHP_EOL.'<li class="chk_box"><input type="checkbox" id="secret" name="secret"  class="selec_chk" value="secret" '.$secret_checked.'>'.PHP_EOL.'<label for="secret"><span></span>비밀글</label></li>';
            } else {
                $option_hidden .= '<input type="hidden" name="secret" value="secret">';
            }
        }
        if ($is_mail) {
            $option .= PHP_EOL.'<li class="chk_box"><input type="checkbox" id="mail" name="mail"  class="selec_chk" value="mail" '.$recv_email_checked.'>'.PHP_EOL.'<label for="mail"><span></span>답변메일받기</label></li>';
        }
    }
    echo $option_hidden;
    ?>
        

        
    <table class="w_tables" border="0" cellspacing="0" cellpadding="0" style='display:none;'>

        <?php if ($is_name) { ?>
        <tr>
            <td class="thead">작성자</td>
            <td>
                <input type="text" name="wr_name" value="<?php echo $name ?>" id="wr_name2" required class="frm_input full_input w_inputs required" placeholder="작성자 성함" style="width:30%;">
            </td>
        </tr>
        <?php } ?>
        
        <?php if ($is_password) { ?>
        <tr>
            <td class="thead">비밀번호</td>
            <td>
                <input type="password" name="wr_password" id="wr_password2" <?php echo $password_required ?> class="frm_input full_input w_inputs <?php echo $password_required ?>" placeholder="비밀번호">
            </td>
        </tr>
        <?php } ?>

    </table>

    <div class="spot-stat-wrap">


      <?php if ($is_category) { ?>
        <ul class="clearfix spot-stat">
          <li class="spot-li spot-tit">
            <p>구분</p>
          </li>
          <li class="spot-li spot-2nd-txt">
            <select name="ca_name" id="ca_name" required>
              <option value="집" <?php if($ca_name == '집'){echo 'selected';} ?>>집</option>
              <option value="사무실" <?php if($ca_name == '사무실'){echo 'selected';} ?>>사무실</option>
            </select>
          </li>
        </ul>
      <?php } ?>

      <ul class="clearfix spot-stat">
        <li class="spot-li spot-tit">
          <p>매물명</p>
        </li>
        <li class="spot-li spot-2nd-txt">
          <input type="text" name="wr_subject" value="<?php echo $subject ?>" id="wr_subject" required class="frm_input full_input w_inputs required"  placeholder="매물명을 입력하세요." style="width:100%;">
        </li>
      </ul>

      <ul class="clearfix spot-stat">
        <li class="spot-li spot-tit">
          <p>주소</p>
        </li>
        <li class="spot-li spot-2nd-txt">
          <input type="text" name="wr_3" value="<?php echo $write['wr_3'] ?>" id="wr_3" class="frm_input full_input w_inputs required wr_3_ipt"  placeholder="주소가 검색되지 않을 경우 직접 입력해 주세요." style="width:70%;" required>
          <a href="javascript:void(0);" class="ser_bbt" id="ser_bbt"><i class="fa fa-search" aria-hidden="true"></i></a>
          <div style="width:50%; margin-top:5px;">
            <input type="text" name="wr_4" value="<?php echo $write['wr_4'] ?>" id="wr_4" class="frm_input full_input w_inputs"  placeholder="나머지주소">
          </div>
        </li>
      </ul>

      <ul class="clearfix spot-stat spot-lat-stat01">
        <li class="spot-li spot-tit">
          <p>좌표1</p>
        </li>
        <li class="spot-li spot-4nd-txt">
          <input type="text" name="wr_5" value="<?php echo $write['wr_5']; ?>" id="wr_5" class="lat-ipt frm_input full_input w_inputs required" required> 

          
        </li>
        <li class="spot-li spot-tit">
          <p>좌표2</p>
        </li>
        <li class="spot-li spot-4nd-txt">
          <input type="text" name="wr_6" value="<?php echo $write['wr_6']; ?>" id="wr_6" class="lat-ipt frm_input full_input w_inputs required" required>
        </li>
      </ul>

      <ul class="clearfix spot-stat spot-lat-stat02">
        <li class="spot-li spot-tit">
          <p></p>
        </li>
        <li class="spot-li spot-2nd-txt">
          <p class='lat-txt'>도로명주소가 발급되지 않은 경우 검색이 되지 않습니다.<br>
            검색이 되지 않을 경우 좌표를 직접 입력하여 주세요.
          </p>
        </li>

      </ul>


      <ul class="clearfix spot-stat">
        <li class="spot-li spot-tit">
          <p>마커선택</p>
        </li>
        <li class="spot-li spot-2nd-txt">
          <style>
            .mkup {padding-top: 0px; text-align: left;}
            .mkup ul {display: inline-block; width: 40px; text-align: center; margin-top: 10px}
          </style>
          <ul class='mkup-ul'>
              <label for="wr_1_1">입주예정<br><img src="<?php echo $board_skin_url ?>/img/markerStar1.png"></label><br>
              <input type="radio" name="wr_1" id="wr_1_1" value="markerStar1"<?php echo ($write['wr_1'] == "markerStar1") ? " checked" : "";?> <?php if($write['wr_1'] == ""){ echo "checked";}?>>
          </ul>
          <ul class='mkup-ul'>
              <label for="wr_1_2">분양마감<br><img src="<?php echo $board_skin_url ?>/img/markerStar2.png"></label><br>
              <input type="radio" name="wr_1" id="wr_1_2" value="markerStar2"<?php echo ($write['wr_1'] == "markerStar2") ? " checked" : "";?>>
          </ul>
          <ul class='mkup-ul'>
              <label for="wr_1_3">분양예정<br><img src="<?php echo $board_skin_url ?>/img/markerStar3.png"></label><br>
              <input type="radio" name="wr_1" id="wr_1_3" value="markerStar3"<?php echo ($write['wr_1'] == "markerStar3") ? " checked" : "";?>>
          </ul>
          <ul class='mkup-ul'>
              <label for="wr_1_4"><br><img src="<?php echo $board_skin_url ?>/img/markerStar1.png"></label><br>
              <input type="radio" name="wr_1" id="wr_1_4" value="markerStar4"<?php echo ($write['wr_1'] == "markerStar4") ? " checked" : "";?>>
          </ul>
        </li>
      </ul>

      <ul class="clearfix spot-stat">
        <li class="spot-li spot-tit">
          <p>가격</p>
        </li>
        <li class="spot-li spot-2nd-txt">
          <input type="text" name="wr_7" value="<?php echo $write['wr_7']; ?>" id="wr_7" class="frm_input full_input w_inputs required" placeholder="가격을 입력해주세요." required>
        </li>
      </ul>

      <ul class="clearfix spot-stat">
        <li class="spot-li spot-tit">
          <p>방향</p>
        </li>
        <li class="spot-li spot-2nd-txt">
          <input type="text" name="wr_18" value="<?php echo $write['wr_18']; ?>" id="wr_18" class="frm_input full_input w_inputs required" placeholder="방향을 입력해주세요." required>
        </li>
      </ul>

      <ul class="clearfix spot-stat">
        <li class="spot-li spot-tit">
          <p>입주가능일</p>
        </li>
        <li class="spot-li spot-2nd-txt">
          <input type="text" name="wr_16" value="<?php echo $write['wr_16']; ?>" id="wr_16" class="frm_input full_input w_inputs wr_16_datepicker required" placeholder="입주가능일을 선택해주세요." readonly required>
        </li>
      </ul>

      <script>
            $.datepicker.setDefaults({
                dateFormat: 'yy-mm-dd',
                prevText: '이전 달',
                nextText: '다음 달',
                monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
                monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
                dayNames: ['일', '월', '화', '수', '목', '금', '토'],
                dayNamesShort: ['일', '월', '화', '수', '목', '금', '토'],
                dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
                showMonthAfterYear: true,
                yearSuffix: '년',
                ignoreReadonly: true
            });




            $(function() {
                $(".wr_16_datepicker").datepicker({
                });
            });

    </script>

      <ul class="clearfix spot-stat">
        <li class="spot-li spot-tit">
          <p>총 세대수</p>
        </li>
        <li class="spot-li spot-2nd-txt">
          <input type="text" name="wr_8" value="<?php echo $write['wr_8']; ?>" id="wr_8" class="frm_input full_input w_inputs required" placeholder="총 세대수를 입력해주세요." required>
        </li>
      </ul>

      <ul class="clearfix spot-stat">
        <li class="spot-li spot-tit">
          <p>최저 · 최고층</p>
        </li>
        <li class="spot-li spot-2nd-txt">
          <input type="text" name="wr_9" value="<?php echo $write['wr_9']; ?>" id="wr_9" class="frm_input full_input w_inputs required" placeholder="최저층 / 최고층을 입력해주세요." required>
        </li>
      </ul>


    
      <ul class="clearfix spot-stat">
        <li class="spot-li spot-tit">
          <p>분양면적(평)</p>
        </li>
        <li class="spot-li spot-4nd-txt spot-4nd-txt02">
          <input type="text" name="wr_10" value="<?php echo $write['wr_10']; ?>" id="wr_10" class="frm_input full_input w_inputs required" placeholder="분양면적을 입력해주세요." onkeyup="calculator(1);" required>평
        </li>
        <li class="spot-li spot-tit">
          <p>분양면적(㎡)</p>
        </li>
        <li class="spot-li spot-4nd-txt spot-4nd-txt02">
          <input type="text" name="wr_11" value="<?php echo $write['wr_11']; ?>" id="wr_11" class="frm_input full_input w_inputs required" placeholder="단지 규모를 입력해주세요." onkeyup="calculator(2);" required>㎡
        </li>
      </ul>


      <ul class="clearfix spot-stat">
        <li class="spot-li spot-tit">
          <p>전용면적(평)</p>
        </li>
        <li class="spot-li spot-4nd-txt spot-4nd-txt02">
          <input type="text" name="wr_12" value="<?php echo $write['wr_12']; ?>" id="wr_12" class="frm_input full_input w_inputs required" placeholder="전용면적(평)을 입력해주세요." onkeyup="calculator2(1);" required>평
        </li>
        <li class="spot-li spot-tit">
          <p>전용면적(㎡)</p>
        </li>
        <li class="spot-li spot-4nd-txt spot-4nd-txt02">
          <input type="text" name="wr_13" value="<?php echo $write['wr_13']; ?>" id="wr_13" class="frm_input full_input w_inputs required" placeholder="전용면적(㎡)을 입력해주세요." onkeyup="calculator2(2);" required>㎡
        </li>
      </ul>

      <script>
        function calculator(chk){
          if(chk==1){ 
            var iptVal = Math.round(parseFloat(document.getElementById('wr_10').value) * 3.3058);
            document.getElementById('wr_11').value = iptVal;
          }
          else { 
              var iptVal = Math.round(parseFloat(document.getElementById('wr_11').value) / 3.3058);
              document.getElementById('wr_10').value = iptVal;
          }
        }

        function calculator2(chk){
          if(chk==1){ 
            var iptVal = Math.round(parseFloat(document.getElementById('wr_12').value) * 3.3058);
            document.getElementById('wr_13').value = iptVal;
          }
          else { 
              var iptVal = Math.round(parseFloat(document.getElementById('wr_13').value) / 3.3058);
              document.getElementById('wr_12').value = iptVal;
          }
        }
      </script>


      <ul class="clearfix spot-stat">
        <li class="spot-li spot-tit">
          <p>해당층 / 총층</p>
        </li>
        <li class="spot-li spot-2nd-txt">
          <input type="text" name="wr_14" value="<?php echo $write['wr_14']; ?>" id="wr_14" class="frm_input full_input w_inputs required" placeholder="해당층 / 총층을 입력해주세요." required>
        </li>
        
      </ul>

      <ul class="clearfix spot-stat">
        <li class="spot-li spot-tit">
          <p>월관리비</p>
        </li>
        <li class="spot-li spot-2nd-txt">
          <input type="text" name="wr_15" value="<?php echo $write['wr_15']; ?>" id="wr_15" class="frm_input full_input w_inputs required" placeholder="월관리비를 입력해주세요." required>
        </li>
      </ul>


      
      <ul class="clearfix spot-stat">
        <li class="spot-li spot-tit">
          <p>융자금</p>
        </li>
        <li class="spot-li spot-2nd-txt">
          <input type="text" name="wr_17" value="<?php echo $write['wr_17']; ?>" id="wr_17" class="frm_input full_input w_inputs required" placeholder="융자금을 입력해주세요." required>
        </li>
      </ul>

      <!-- <ul class="clearfix spot-stat">
        <li class="spot-li spot-tit">
          <p>기보증금 / 월세</p>
        </li>
        <li class="spot-li spot-2nd-txt">
          <input type="text" name="wr_18" value="<?php echo $write['wr_18']; ?>" id="wr_18" class="frm_input full_input w_inputs" placeholder="기보증금 / 월세를 입력해주세요.">
        </li>
      </ul> -->

      <ul class="clearfix spot-stat">
        <!-- <li class="spot-li spot-tit">
          <p>현관구조</p>
        </li>
        <li class="spot-li spot-4nd-txt">
          <input type="text" name="wr_19" value="<?php echo $write['wr_19']; ?>" id="wr_19" class="frm_input full_input w_inputs" placeholder="현관구조를 입력해주세요.">
        </li> -->

        <li class="spot-li spot-tit">
          <p>난방</p>
        </li>
        <li class="spot-li spot-2nd-txt">
          <input type="text" name="wr_20" value="<?php echo $write['wr_20']; ?>" id="wr_20" class="frm_input full_input w_inputs required" placeholder="난방 정보를 입력해주세요." required>
        </li>
      </ul>



      <!-- <ul class="clearfix spot-stat">
        <li class="spot-li spot-tit">
          <p>분양날짜</p>
        </li>
        <li class="spot-li spot-4nd-txt">
          <input type="text" name="wr_21" value="<?php echo $write['wr_21']; ?>" id="wr_21" class="frm_input full_input w_inputs" placeholder="분양날짜를 입력해주세요.">
        </li>

        <li class="spot-li spot-tit">
          <p>입주날짜</p>
        </li>
        <li class="spot-li spot-2nd-txt">
          <input type="text" name="wr_22" value="<?php echo $write['wr_22']; ?>" id="wr_22" class="frm_input full_input w_inputs" placeholder="입주날짜를 입력해주세요.">
        </li>
      </ul> -->

      <ul class="clearfix spot-stat">
        <li class="spot-li spot-tit">
          <p>총 주차대수</p>
        </li>
        <li class="spot-li spot-2nd-txt">
          <input type="text" name="wr_23" value="<?php echo $write['wr_23']; ?>" id="wr_23" class="frm_input full_input w_inputs required" placeholder="총 주차대수를 입력해주세요." required>
        </li>

        <!-- <li class="spot-li spot-tit">
          <p>해당면적 세대수</p>
        </li>
        <li class="spot-li spot-2nd-txt">
          <input type="text" name="wr_24" value="<?php echo $write['wr_24']; ?>" id="wr_24" class="frm_input full_input w_inputs" placeholder="해당면적 세대수를 입력해주세요.">
        </li> -->
      </ul>

      <!-- <ul class="clearfix spot-stat">
        <li class="spot-li spot-tit">
          <p>건축물 용도</p>
        </li>
        <li class="spot-li spot-2nd-txt">
          <input type="text" name="wr_25" value="<?php echo $write['wr_25']; ?>" id="wr_25" class="frm_input full_input w_inputs" placeholder="건축물 용도를 입력해주세요.">
        </li>
      </ul> -->

      <ul class="clearfix spot-stat">
        <li class="spot-li spot-tit">
          <p>방수 / 욕실수</p>
        </li>
        <li class="spot-li spot-2nd-txt">
          <input type="text" name="wr_28" value="<?php echo $write['wr_28']; ?>" id="wr_28" class="frm_input full_input w_inputs required" placeholder="방수 / 욕실수를 입력해주세요." required>
        </li>
      </ul>

      <ul class="clearfix spot-stat">
        <li class="spot-li spot-tit">
          <p>카카오톡 오픈채팅 링크</p>
        </li>
        <li class="spot-li spot-2nd-txt">
          <input type="text" name="wr_26" value="<?php echo $write['wr_26']; ?>" id="wr_26" class="frm_input full_input w_inputs required" placeholder="카카오톡 오픈채팅 링크를 입력해주세요." required>
        </li>
      </ul>


      <ul class="clearfix spot-stat">
        <li class="spot-li spot-tit">
          <p>상세설명</p>
        </li>
        <li class="spot-li spot-2nd-txt">
          <div class="write_div">
            <div class="wr_content <?php echo $is_dhtml_editor ? $config['cf_editor'] : ''; ?>">
                <?php if($write_min || $write_max) { ?>
                <!-- 최소/최대 글자 수 사용 시 -->
                <p id="char_count_desc">이 게시판은 최소 <strong><?php echo $write_min; ?></strong>글자 이상, 최대 <strong><?php echo $write_max; ?></strong>글자 이하까지 글을 쓰실 수 있습니다.</p>
                <?php } ?>
                <?php echo $editor_html; // 에디터 사용시는 에디터로, 아니면 textarea 로 노출 ?>
                <?php if($write_min || $write_max) { ?>
                <!-- 최소/최대 글자 수 사용 시 -->
                <div id="char_count_wrap"><span id="char_count"></span>글자</div>
                <?php } ?>
            </div>
          </div>
        </li>
      </ul>





    </div>


              
    <div style="background-color:#f9f9f9; width:100%; margin-top:5px; height:200px; border-radius:4px;" id="map" style='display:none;'></div>

    <script type="text/javascript" src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
                <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=<?php echo $board['bo_1'] ?>&libraries=services"></script>
                <!-- } -->
                
                <script>
                var mapContainer = document.getElementById('map'), // 지도를 표시할 div 
                    mapOption = {
                        center: new daum.maps.LatLng("37.566400714093284", "126.9785391897507"), // 지도의 중심좌표
                        level: 3 // 지도의 확대 레벨

                    };

                // 지도를 생성
                var map = new daum.maps.Map(mapContainer, mapOption);

                // 주소-좌표 변환 객체 생성
                var geocoder = new daum.maps.services.Geocoder();

                // 마커
                var marker = new daum.maps.Marker({
                    map: map,
                    // 지도 중심좌표에 마커를 생성
                    position: map.getCenter()
                });

				

                // 주소검색 API (주소 > 좌표변환처리)
                $(function() {
                    $("#wr_3").on("click", function() {
                        new daum.Postcode({
                            oncomplete: function(data) {
                                //console.log(data);
                                $("#wr_3").val(data.address);
                                //$("#road").val(data.roadAddress);
                                //$("#sido").val(data.sido);
                                //$("#gugun").val(data.sigungu);
                                //$("#dong").val(data.bname);

                                geocoder.addressSearch(data.address, function(results, status) {
                                    // 정상적으로 검색이 완료됐으면
                                    if (status === daum.maps.services.Status.OK) {

                                        //첫번째 결과의 값을 활용
                                        var result = results[0];

                                        // 해당 주소에 대한 좌표를 받아서
                                        var coords = new daum.maps.LatLng(result.y, result.x);

                                        // 지도를 보여준다.
                                        map.relayout();

                                        // 지도 중심을 변경한다.
                                        map.setCenter(coords);

                                        // 좌표값을 넣어준다.
                                        document.getElementById('wr_5').value = coords.getLat();
                                        document.getElementById('wr_6').value = coords.getLng();

                                        // 마커를 결과값으로 받은 위치로 옮긴다.
                                        marker.setPosition(coords);
                                    }
                                });

                            }
                        }).open();
                    });
                    
                    $("#ser_bbt").on("click", function() {
                        new daum.Postcode({
                            oncomplete: function(data) {
                                //console.log(data);
                                $("#wr_3").val(data.address);
                                //$("#road").val(data.roadAddress);
                                //$("#sido").val(data.sido);
                                //$("#gugun").val(data.sigungu);
                                //$("#dong").val(data.bname);

                                geocoder.addressSearch(data.address, function(results, status) {
                                    // 정상적으로 검색이 완료됐으면
                                    if (status === daum.maps.services.Status.OK) {

                                        //첫번째 결과의 값을 활용
                                        var result = results[0];

                                        // 해당 주소에 대한 좌표를 받아서
                                        var coords = new daum.maps.LatLng(result.y, result.x);

                                        // 지도를 보여준다.
                                        map.relayout();

                                        // 지도 중심을 변경한다.
                                        map.setCenter(coords);

                                        // 좌표값을 넣어준다.
                                        document.getElementById('wr_5').value = coords.getLat();
                                        document.getElementById('wr_6').value = coords.getLng();

                                        // 마커를 결과값으로 받은 위치로 옮긴다.
                                        marker.setPosition(coords);
                                    }
                                });

                            }
                        }).open();
                    });
                });
					
				//마커를 기준으로 가운데 정렬이 될 수 있도록 추가
				var markerPosition = marker.getPosition(); 
				map.relayout();
				map.setCenter(markerPosition);

				//브라우저가 리사이즈될때 지도 리로드
				$(window).on('resize', function () {
					var markerPosition = marker.getPosition(); 
					map.relayout();
					map.setCenter(markerPosition)
				});

                </script>




    <div class="thumnail-slider-tit">
        <h1>대표이미지</h1>
    </div>

        <?php for ($i=0; $i<1; $i++) { ?>
            <div class="bo_w_flie write_div">
                <div class="file_wr write_div">
                    <label for="bf_file_<?php echo $i+1 ?>" class="lb_icon"><i class="fa fa-folder-open" aria-hidden="true"></i><span class="sound_only"> 파일 #<?php echo $i+1 ?></span></label>
                    <input type="file" name="bf_file[]" id="bf_file_<?php echo $i+1 ?>" title="파일첨부 <?php echo $i+1 ?> : 용량 <?php echo $upload_max_filesize ?> 이하만 업로드 가능" class="frm_file ">
                </div>
                <?php if ($is_file_content) { ?>
                <input type="text" name="bf_content[]" value="<?php echo ($w == 'u') ? $file[$i]['bf_content'] : ''; ?>" title="파일 설명을 입력해주세요." class="full_input frm_input" size="50" placeholder="파일 설명을 입력해주세요.">
                <?php } ?>

                <?php if($w == 'u' && $file[$i]['file']) { ?>
                <span class="file_del">
                    <input type="checkbox" id="bf_file_del<?php echo $i ?>" name="bf_file_del[<?php echo $i;  ?>]" value="1"> <label for="bf_file_del<?php echo $i ?>"><?php echo $file[$i]['source'].'('.$file[$i]['size'].')';  ?> 파일 삭제</label>
                </span>
                <?php } ?>
            </div>
        <?php } ?>

    <div class="thumnail-slider-tit">
        <h1>내부이미지</h1>
    </div>
        <div class="row file-row">

        <?php for ($i=1; $i<11; $i++) { ?>
            <div class="bo_w_flie write_div col-md-6">
                <div class="file_wr write_div">
                    <label for="bf_file_<?php echo $i+1 ?>" class="lb_icon"><i class="fa fa-folder-open" aria-hidden="true"></i><span class="sound_only"> 파일 #<?php echo $i+1 ?></span></label>
                    <input type="file" name="bf_file[]" id="bf_file_<?php echo $i+1 ?>" title="파일첨부 <?php echo $i+1 ?> : 용량 <?php echo $upload_max_filesize ?> 이하만 업로드 가능" class="frm_file ">
                </div>
                <?php if ($is_file_content) { ?>
                <input type="text" name="bf_content[]" value="<?php echo ($w == 'u') ? $file[$i]['bf_content'] : ''; ?>" title="파일 설명을 입력해주세요." class="full_input frm_input" size="50" placeholder="파일 설명을 입력해주세요.">
                <?php } ?>

                <?php if($w == 'u' && $file[$i]['file']) { ?>
                <span class="file_del">
                    <input type="checkbox" id="bf_file_del<?php echo $i ?>" name="bf_file_del[<?php echo $i;  ?>]" value="1"> <label for="bf_file_del<?php echo $i ?>"><?php echo $file[$i]['source'].'('.$file[$i]['size'].')';  ?> 파일 삭제</label>
                </span>
                <?php } ?>
            </div>
        <?php } ?>

        </div>


        
    <div class="thumnail-slider-tit">
        <h1>타입 이미지</h1>
    </div>

        <div class="row file-row">

        <?php for ($i=11; $i<35; $i++) { ?>
            <div class="bo_w_flie write_div col-md-6">
                <div class="file_wr write_div">
                    <label for="bf_file_<?php echo $i+1 ?>" class="lb_icon"><i class="fa fa-folder-open" aria-hidden="true"></i><span class="sound_only"> 파일 #<?php echo $i+1 ?></span></label>
                    <input type="file" name="bf_file[]" id="bf_file_<?php echo $i+1 ?>" title="파일첨부 <?php echo $i+1 ?> : 용량 <?php echo $upload_max_filesize ?> 이하만 업로드 가능" class="frm_file ">
                </div>
                <?php if ($is_file_content) { ?>
                <input type="text" name="bf_content[]" value="<?php echo ($w == 'u') ? $file[$i]['bf_content'] : ''; ?>" title="파일 설명을 입력해주세요." class="full_input frm_input" size="50" placeholder="파일 설명을 입력해주세요.">
                <?php } ?>

                <?php if($w == 'u' && $file[$i]['file']) { ?>
                <span class="file_del">
                    <input type="checkbox" id="bf_file_del<?php echo $i ?>" name="bf_file_del[<?php echo $i;  ?>]" value="1"> <label for="bf_file_del<?php echo $i ?>"><?php echo $file[$i]['source'].'('.$file[$i]['size'].')';  ?> 파일 삭제</label>
                </span>
                <?php } ?>
            </div>
        <?php } ?>
        </div>


    <?php if ($is_use_captcha) { //자동등록방지  ?>
    <div class="write_div">
        <?php echo $captcha_html ?>
    </div>
    <?php } ?>

    <div class="btn_confirm write_div">
        <a href="<?php echo get_pretty_url($bo_table); ?>" class="btn_cancel btn">취소</a>
        <button type="submit" id="btn_submit" accesskey="s" class="btn_submit btn">작성완료</button>
    </div>
    </form>

    <script>
    <?php if($write_min || $write_max) { ?>
    // 글자수 제한
    var char_min = parseInt(<?php echo $write_min; ?>); // 최소
    var char_max = parseInt(<?php echo $write_max; ?>); // 최대
    check_byte("wr_content", "char_count");

    $(function() {
        $("#wr_content").on("keyup", function() {
            check_byte("wr_content", "char_count");
        });
    });

    <?php } ?>
    function html_auto_br(obj)
    {
        if (obj.checked) {
            result = confirm("자동 줄바꿈을 하시겠습니까?\n\n자동 줄바꿈은 게시물 내용중 줄바뀐 곳을<br>태그로 변환하는 기능입니다.");
            if (result)
                obj.value = "html2";
            else
                obj.value = "html1";
        }
        else
            obj.value = "";
    }

    function fwrite_submit(f)
    {
        <?php echo $editor_js; // 에디터 사용시 자바스크립트에서 내용을 폼필드로 넣어주며 내용이 입력되었는지 검사함   ?>

        var subject = "";
        var content = "";
        $.ajax({
            url: g5_bbs_url+"/ajax.filter.php",
            type: "POST",
            data: {
                "subject": f.wr_subject.value,
                "content": f.wr_content.value
            },
            dataType: "json",
            async: false,
            cache: false,
            success: function(data, textStatus) {
                subject = data.subject;
                content = data.content;
            }
        });

        if (subject) {
            alert("제목에 금지단어('"+subject+"')가 포함되어있습니다");
            f.wr_subject.focus();
            return false;
        }

        if (content) {
            alert("내용에 금지단어('"+content+"')가 포함되어있습니다");
            if (typeof(ed_wr_content) != "undefined")
                ed_wr_content.returnFalse();
            else
                f.wr_content.focus();
            return false;
        }

        if (document.getElementById("char_count")) {
            if (char_min > 0 || char_max > 0) {
                var cnt = parseInt(check_byte("wr_content", "char_count"));
                if (char_min > 0 && char_min > cnt) {
                    alert("내용은 "+char_min+"글자 이상 쓰셔야 합니다.");
                    return false;
                }
                else if (char_max > 0 && char_max < cnt) {
                    alert("내용은 "+char_max+"글자 이하로 쓰셔야 합니다.");
                    return false;
                }
            }
        }

        <?php echo $captcha_js; // 캡챠 사용시 자바스크립트에서 입력된 캡챠를 검사함  ?>

        document.getElementById("btn_submit").disabled = "disabled";

        return true;
    }
    </script>
</section>
<!-- } 게시물 작성/수정 끝 -->