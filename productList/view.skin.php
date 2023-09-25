<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>

<script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>
<style>
    .sub_title, .sub_visual{
        display : none;
    }
    article{
        margin-top: 70px;
    }
</style>
<!-- 게시물 읽기 시작 { -->
      <?php
        if($member['mb_level'] >= 3) { ?>
        

      	<!-- 게시물 상단 버튼 시작 { -->
          <div id="bo_v_top">
	        <?php ob_start(); ?>

	        <ul class="btn_bo_user bo_v_com">
				<li><a href="<?php echo $list_href ?>" class="btn_b01 btn" title="목록"><i class="fa fa-list" aria-hidden="true"></i><span class="sound_only">목록</span></a></li>
	            <?php if ($reply_href) { ?><li><a href="<?php echo $reply_href ?>" class="btn_b01 btn" title="답변"><i class="fa fa-reply" aria-hidden="true"></i><span class="sound_only">답변</span></a></li><?php } ?>
	            <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b01 btn" title="글쓰기"><i class="fa fa-pencil" aria-hidden="true"></i><span class="sound_only">글쓰기</span></a></li><?php } ?>
	        	<?php if($update_href || $delete_href || $copy_href || $move_href || $search_href) { ?>
	        	<li>
	        		<button type="button" class="btn_more_opt is_view_btn btn_b01 btn" title="게시판 리스트 옵션"><i class="fa fa-ellipsis-v" aria-hidden="true"></i><span class="sound_only">게시판 리스트 옵션</span></button>
		        	<ul class="more_opt is_view_btn"> 
			            <?php if ($update_href) { ?><li><a href="<?php echo $update_href ?>">수정<i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></li><?php } ?>
			            <?php if ($delete_href) { ?><li><a href="<?php echo $delete_href ?>" onclick="del(this.href); return false;">삭제<i class="fa fa-trash-o" aria-hidden="true"></i></a></li><?php } ?>
			            <?php if ($copy_href) { ?><li><a href="<?php echo $copy_href ?>" onclick="board_move(this.href); return false;">복사<i class="fa fa-files-o" aria-hidden="true"></i></a></li><?php } ?>
			            <?php if ($move_href) { ?><li><a href="<?php echo $move_href ?>" onclick="board_move(this.href); return false;">이동<i class="fa fa-arrows" aria-hidden="true"></i></a></li><?php } ?>
			            <?php if ($search_href) { ?><li><a href="<?php echo $search_href ?>">검색<i class="fa fa-search" aria-hidden="true"></i></a></li><?php } ?>
			        </ul> 
	        	</li>
	        	<?php } ?>
	        </ul>
	        <script>

            jQuery(function($){
                // 게시판 보기 버튼 옵션
				$(".btn_more_opt.is_view_btn").on("click", function(e) {
                    e.stopPropagation();
				    $(".more_opt.is_view_btn").toggle();
				})
;
                $(document).on("click", function (e) {
                    if(!$(e.target).closest('.is_view_btn').length) {
                        $(".more_opt.is_view_btn").hide();
                    }
                });
            });
            </script>
	        <?php
	        $link_buttons = ob_get_contents();
	        ob_end_flush();
	         ?>
	    </div>

    <?php } ?>
<div id="bo_v">
    <main>
      <ul>
        <?php if($view['file'][0]['view']){ ?>
          <li>
            <div class="pview01-imgBox02">
                <div>
                  <?php echo get_view_thumbnail($view['file'][0]['view']); ?>
                </div>
              <!-- 대표이미지 -->
            </div>
          </li>
        <?php } ?>
      </ul>
      <div class="pview-pd">

      <li class="pview-subejct-left">
        <h1>
          <?php echo $view['wr_subject']; ?>
        </h1>
        <h2>
          <?php echo $view['wr_7']; ?>
          <!-- 주소 -->
        </h2>
        <p>
        <?php echo $view['wr_3']; ?> <?php echo $view['wr_4']; ?>
        </p>
      </li>
      <div class='pview-of-wrap'> 
      <div class="pview-subject-wrap">
        <ul class="clearfix">
          <li class="pview-subject-right clearfix">
            <div class="pview-info02 pview-info-div">
              <h2>
                <span class='pview-info-subtit'>총 세대수</span> <?php echo $view['wr_8']; ?>
              </h2>
            </div>
            <div class="pview-info03 pview-info-div">
              <h2>
                <span class='pview-info-subtit'>저층 · 최고층</span> 
                <?php echo $view['wr_9']; ?>
              </h2>
            </div>
          </li>
        </ul>
      </div>


      <?php if($view['file'][11]['view']){ ?>
      <div class="pview01-wrap pview-con-box">
        <div class="pview-con-tit">
          <h2>
            갤러리
          </h2>
        </div>
        <ul class="row pview01-row">
          <li class="col-lg-12">
            <ul class="pview01-slideBox">
              <?php 
                for($i=1; $i<36; $i++){
                  if($view['file'][$i]['view']){ ?>
                    <li class='pview01-slide-smallBox'>
                      <div class="pview01-imgBox02">
                          <div>
                            <?php echo get_view_thumbnail($view['file'][$i]['view']); ?>
                          </div>
                      </div>
                    </li>
                  <?php }
                }
              ?>
            </ul>
            <script>
              $(function(){
              $('.pview01-slideBox').slick({
                slide: 'li',		//슬라이드 되어야 할 태그 ex) div, li 
                fade : true,
                infinite : false, 	//무한 반복 옵션	 
                slidesToShow : 1,		// 한 화면에 보여질 컨텐츠 개수
                slidesToScroll : 1,		//스크롤 한번에 움직일 컨텐츠 개수
                speed : 400,	 // 다음 버튼 누르고 다음 화면 뜨는데까지 걸리는 시간(ms)
                arrows : true, 		// 옆으로 이동하는 화살표 표시 여부
                dots : false, 		// 스크롤바 아래 점으로 페이지네이션 여부
                autoplay : false,			// 자동 스크롤 사용 여부
                pauseOnHover : true,		// 슬라이드 이동	시 마우스 호버하면 슬라이더 멈추게 설정
                dotsClass : "slick-dots", 	//아래 나오는 페이지네이션(점) css class 지정
                draggable : true, 	//드래그 가능 여부 
                prevArrow : "<button type='button' class='slick-prev02'>Previous</button>",
                nextArrow : "<button type='button' class='slick-next02'>Next</button>"
              });
              })
            </script>
          </li>
        </ul>
      </div>
      <?php } ?>

      <div class="pview03-tab-wrap">
        <div class="pview-tab">
          <button class="pview-tablinks active" onclick="openCity(event, 'London')">부동산 정보</button>
          <button class="pview-tablinks" onclick="openCity(event, 'Paris')">상세 설명</button>
          <button class="pview-tablinks" onclick="openCity(event, 'Tokyo')">매물 위치</button>
        </div>

        <div id="London" class="pview-tabcontent first">
          <div class="pview03-wrap pview-con-box">
            <div class="pview-con-tit">
              <h2>
                부동산 정보
              </h2>
            </div>
            <ul class="pview03-stat-line clearfix first-line">
              <li>
                <div class='pview03-stat-info-txtBox'>
                  <span>분양면적</span>
                  <p><?php echo $view['wr_10']; ?>평 / <?php echo $view['wr_11']; ?>㎡</p>
                </div>
              </li>

              <li>
                <div class='pview03-stat-info-txtBox'>
                  <span>전용면적</span>
                  <p><?php echo $view['wr_12']; ?>평 / <?php echo $view['wr_13']; ?>㎡</p>
                </div>
              </li>

              <li>
                <div class='pview03-stat-info-txtBox'>
                  <span>해당층 · 총층</span>
                  <p><?php echo $view['wr_14']; ?></p>
                </div>
              </li>

              <li>
                <div class='pview03-stat-info-txtBox'>
                  <span>방수 · 욕실수</span>
                  <p><?php echo $view['wr_28']; ?></p>
                </div>
              </li>
            </ul>

            <ul class="pview03-stat-line clearfix">
              <li>
                <div class='pview03-stat-info-txtBox'>
                  <span>월관리비</span>
                  <p><?php echo $view['wr_15']; ?></p>
                </div>
              </li>



              <!-- <li>
                <div class='pview03-stat-info-txtBox'>
                  <span>입주가능일</span>
                  <p><?php echo $view['wr_16']; ?></p>
                </div>
              </li> -->

              <li>
                <div class='pview03-stat-info-txtBox'>
                  <span>융자금</span>
                  <p><?php echo $view['wr_17']; ?></p>
                </div>
              </li>
    
              <!-- <li>
                <div class='pview03-stat-info-txtBox'>
                  <span>기보증금 · 월세</span>
                  <p><?php echo $view['wr_18']; ?></p>
                </div>
              </li> -->
            </ul>

            <ul class="pview03-stat-line clearfix">


              <li>
                <div class='pview03-stat-info-txtBox'>
                  <span>난방</span>
                  <p><?php echo $view['wr_20']; ?></p>
                </div>
              </li>

              <li>
                <div class='pview03-stat-info-txtBox'>
                  <span>방향</span>
                  <p><?php echo $view['wr_18']; ?></p>
                </div>
              </li>

              <li>
                <div class='pview03-stat-info-txtBox'>
                  <span>입주가능일</span>
                  <p><?php echo $view['wr_16']; ?></p>
                </div>
              </li>
            </ul>

            <ul class="pview03-stat-line clearfix">
              <li>
                <div class='pview03-stat-info-txtBox'>
                  <span>총 주차대수</span>
                  <p><?php echo $view['wr_23']; ?></p>
                </div>
              </li>

              <!-- <li>
                <div class='pview03-stat-info-txtBox'>
                  <span>해당면적 세대수</span>
                  <p><?php echo $view['wr_24']; ?></p>
                </div>
              </li> -->

              <!-- <li>
                <div class='pview03-stat-info-txtBox'>
                  <span>건축물 용도</span>
                  <p><?php echo $view['wr_25']; ?></p>
                </div>
              </li> -->

              <!-- <li>
                <div class='pview03-stat-info-txtBox'>
                  <span>매물번호</span>
                  <p><?php echo $view['wr_73']; ?></p>
                </div>
              </li> -->
            </ul>

          </div>
        </div>

        <div id="Paris" class="pview-tabcontent">
          <div class="pview04-wrap pview-con-box">
            <div class="pview-con-tit">
              <h2>
                상세설명
              </h2>
            </div>

            <div class="pview04-txtBox">
              <h5><?php echo $view['content']; ?></h5>
            </div>
          </div>
        </div>

        <div id="Tokyo" class="pview-tabcontent">
          <div class="pview05-wrap pview-con-box">
            <div class="pview-con-tit">
              <h2>
                매물 위치
              </h2>
            </div>

            <div class="pview05-locationBox">
              <div class="" id="map2" style='width:100%;'></div>

              <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=<?php echo $board['bo_1'] ?>&libraries=services"></script>
              
            <script>
                var mapContainer2 = document.getElementById('map2'), // 지도를 표시할 div 
                    mapOption2 = {
                        center: new daum.maps.LatLng(<?php echo $view['wr_5']?>, <?php echo $view['wr_6']?>), // 지도의 중심좌표
                        level: 7 // 지도의 확대 레벨
                    };

                          // 지도를 생성합니다    
                          var map2 = new daum.maps.Map(mapContainer2, mapOption2);

                          // 주소-좌표 변환 객체를 생성합니다
                          //var geocoder = new daum.maps.services.Geocoder();

                // 마커
                var marker2 = new daum.maps.Marker({
                  map: map2,
                  // 지도 중심좌표에 마커를 생성
                  position: map2.getCenter()
                });
                
                //마커를 기준으로 가운데 정렬이 될 수 있도록 추가
                var markerPosition2 = marker2.getPosition(); 
                map2.relayout();
                map2.setCenter(markerPosition2);


                //브라우저가 리사이즈될때 지도 리로드
                
                $(window).on('resize', function () {
                  var markerPosition2 = marker.getPosition(); 
                  map2.relayout();
                  map2.setCenter(markerPosition2);
                });
                
                      </script>
              
              <div style="clear:both"></div>
            </div>
          </div>
        </div>

        <script>
        function openCity(evt, cityName) {
          var i, tabcontent, tablinks;
          tabcontent = document.getElementsByClassName("pview-tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("pview-tablinks");
          for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
          }
          document.getElementById(cityName).style.display = "block";
          evt.currentTarget.className += " active";

          map2.relayout();
          map2.setCenter(markerPosition2);
        }
        </script>
      </div>

      <div class="pview-estimateBtn">
        <a href="<?php echo $view['wr_26']; ?>" target="_blank">
          <p>이 매물 문의하기</p>
        </a>
      </div>
    </div>

    </div>
  </main>








    <?php
    $cnt = 0;
    if ($view['file']['count']) {
        for ($i=0; $i<count($view['file']); $i++) {
            if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view'])
                $cnt++;
        }
    }
	?>

    <?php if($cnt) { ?>
    <!-- 첨부파일 시작 { -->
    <section id="bo_v_file">
        <h2>첨부파일</h2>
        <ul>
            <?php
        // 가변 파일
        for ($i=0; $i<count($view['file']); $i++) {
            if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view']) {
         ?>
            <li>
                <i class="fa fa-folder-open" aria-hidden="true"></i>
                <a href="<?php echo $view['file'][$i]['href'];  ?>" class="view_file_download" download>
                    <strong><?php echo $view['file'][$i]['source'] ?></strong> <?php echo $view['file'][$i]['content'] ?> (<?php echo $view['file'][$i]['size'] ?>)
                </a>
                <br>
                <span class="bo_v_file_cnt"><?php echo $view['file'][$i]['download'] ?>회 다운로드 | DATE : <?php echo $view['file'][$i]['datetime'] ?></span>
            </li>
            <?php
            }
        }
         ?>
        </ul>
    </section>
    <!-- } 첨부파일 끝 -->
    <?php } ?>






    <?php if ($prev_href || $next_href) { ?>
    <!-- <ul class="bo_v_nb">
        <?php if ($prev_href) { ?>
        <li class="btn_prv">
            <dd class="elc_01"><span class="nb_tit"><i class="fa fa-chevron-up" aria-hidden="true"></i> 이전글</span></dd>
            <dd class="elc_02"><a href="<?php echo $prev_href ?>"><?php echo $prev_wr_subject;?></a></dd>
            <dd class="elc_03"><span class="nb_date"><?php echo str_replace('-', '.', substr($prev_wr_date, '2', '8')); ?></span></dd>
            <div style="clear:both"></div>
        </li>
        <?php } ?>

        <?php if ($next_href) { ?>
        <li class="btn_next">
            <dd class="elc_01"><span class="nb_tit"><i class="fa fa-chevron-down" aria-hidden="true"></i> 다음글</span></dd>
            <dd class="elc_02"><a href="<?php echo $next_href ?>"><?php echo $next_wr_subject;?></a></dd>
            <dd class="elc_03"><span class="nb_date"><?php echo str_replace('-', '.', substr($next_wr_date, '2', '8')); ?></span></dd>
            <div style="clear:both"></div>
        </li>
        <?php } ?>
    </ul> -->
    <?php } ?>

    <?php
    // 코멘트 입출력
    // include_once(G5_BBS_PATH.'/view_comment.php');
	?>
</div>

<!-- } 게시판 읽기 끝 -->





<script>
    <?php if ($board['bo_download_point'] < 0) { ?>
    $(function() {
        $("a.view_file_download").click(function() {
            if (!g5_is_member) {
                alert("다운로드 권한이 없습니다.\n회원이시라면 로그인 후 이용해 보십시오.");
                return false;
            }

            var msg = "파일을 다운로드 하시면 포인트가 차감(<?php echo number_format($board['bo_download_point']) ?>점)됩니다.\n\n포인트는 게시물당 한번만 차감되며 다음에 다시 다운로드 하셔도 중복하여 차감하지 않습니다.\n\n그래도 다운로드 하시겠습니까?";

            if (confirm(msg)) {
                var href = $(this).attr("href") + "&js=on";
                $(this).attr("href", href);

                return true;
            } else {
                return false;
            }
        });
    });
    <?php } ?>

    function board_move(href) {
        window.open(href, "boardmove", "left=50, top=50, width=500, height=550, scrollbars=1");
    }
</script>

<script>
    $(function() {
        $("a.view_image").click(function() {
            window.open(this.href, "large_image", "location=yes,links=no,toolbar=no,top=10,left=10,width=10,height=10,resizable=yes,scrollbars=no,status=no");
            return false;
        });

        // 추천, 비추천
        $("#good_button, #nogood_button").click(function() {
            var $tx;
            if (this.id == "good_button")
                $tx = $("#bo_v_act_good");
            else
                $tx = $("#bo_v_act_nogood");

            excute_good(this.href, $(this), $tx);
            return false;
        });

        // 이미지 리사이즈
        $("#bo_v_atc").viewimageresize();
    });

    function excute_good(href, $el, $tx) {
        $.post(
            href, {
                js: "on"
            },
            function(data) {
                if (data.error) {
                    alert(data.error);
                    return false;
                }

                if (data.count) {
                    $el.find("strong").text(number_format(String(data.count)));
                    if ($tx.attr("id").search("nogood") > -1) {
                        $tx.text("이 글을 비추천하셨습니다.");
                        $tx.fadeIn(200).delay(2500).fadeOut(200);
                    } else {
                        $tx.text("이 글을 추천하셨습니다.");
                        $tx.fadeIn(200).delay(2500).fadeOut(200);
                    }
                }
            }, "json"
        );
    }
</script>
<!-- } 게시글 읽기 끝 -->