<?php
include './_common.php';
$D_PATH = '001001';
$SUB_BG_CLASS = '';
$SUB_SUB_TITLE = '';
$SUB_MAIN_TITLE = '';
include_once G5_PATH.'/head.php';
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_URL . '/css/contents.css">');
?>

<?php

  if (is_mobile()) {
    $lat =37.38650248899659;
    $lng = 126.62352900031621;
    $level = "6";
  } else {
    $lat =37.39248313713672;
    $lng = 126.62286670004993;
    $level = "6";
  }


  if(isset($_GET['id'])){
    $wr_id = $_GET['id'];
  }
?>


<style>
  body{
    height : 100vh;
    overflow : hidden;
  }
  .foot-wrap, #top_btn, .kakao-link-fixed{
    display : none;
  }
</style>


<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=ff46f5583f86ea457dd9a9d3df5f7e59&libraries=services,clusterer"></script>


<div class="con_wrap">
  <section class="map-page-sec">
    <ul class="clearfix map-page-ul">
      <li class="left-map-area" id='map'>
      </li>
      <script>
        var mapContainer = document.getElementById('map'), // 지도를 표시할 div 
        mapOption = {
            center: new kakao.maps.LatLng(<?php echo $lat ?>, <?php echo $lng ?>), // 지도의 중심좌표
            level: <?=$level?> // 지도 초기 확대레벨
        };

        

        var map = new kakao.maps.Map(mapContainer, mapOption);

        // 일반 지도와 스카이뷰로 지도 타입을 전환할 수 있는 지도타입 컨트롤을 생성합니다
        var mapTypeControl = new daum.maps.MapTypeControl();

        // 지도에 컨트롤을 추가해야 지도위에 표시됩니다
        // daum.maps.ControlPosition은 컨트롤이 표시될 위치를 정의하는데 TOPRIGHT는 오른쪽 위를 의미합니다
        map.addControl(mapTypeControl, daum.maps.ControlPosition.TOPRIGHT);

        // 지도 확대 축소를 제어할 수 있는  줌 컨트롤을 생성합니다
        // var zoomControl = new daum.maps.ZoomControl();
        // map.addControl(zoomControl, daum.maps.ControlPosition.RIGHT);


        // kakao.maps.event.addListener(map, 'center_changed', function() {
        // // 지도의  레벨을 얻어옵니다
        // var level = map.getLevel();
        // // 지도의 중심좌표를 얻어옵니다 
        // var latlng = map.getCenter(); 
        // console.log('level : ' + level + '위도 : ' + latlng.getLat() + '경도 : ' + latlng.getLng()  );
        // });



            // 클러스터 생성
        var clusterer = new daum.maps.MarkerClusterer({
        map: map, // 마커들을 클러스터로 관리하고 표시할 지도 객체
        averageCenter: true, // 클러스터에 포함된 마커들의 평균 위치를 클러스터 마커 위치로 설정
        minLevel: 5, // 클러스터 할 최소 지도 레벨
        disableClickZoom: true, // 클러스터 마커를 클릭했을 때 지도 확대여부

        calculator: [3, 5, 8, 10, 20],

        

        styles: [{ // calculator 각 사이 값 마다 적용될 스타일을 지정한다
                width : '50px', height : '50px',
                background: 'url(../img/cluster.png) no-repeat center center / cover',
                color: '#fff',
                textAlign: 'center',
                fontWeight: 'bold',
                lineHeight: '51px'
            },
            {
                width : '53px', height : '53px',
                background: 'url(../img/cluster.png) no-repeat center center / cover',
                color: '#fff',
                textAlign: 'center',
                fontWeight: 'bold',
                lineHeight: '54px'
            },
            {
                width : '56px', height : '56px',
                background: 'url(../img/cluster.png) no-repeat center center / cover',
                color: '#fff',
                textAlign: 'center',
                fontWeight: 'bold',
                lineHeight: '57px'
            },
            {
                width : '59px', height : '59px',
                background: 'url(../img/cluster.png) no-repeat center center / cover',
                color: '#fff',
                textAlign: 'center',
                fontWeight: 'bold',
                lineHeight: '60px'
            }
        ]



        

        
        
        });




        function clusterSize(){
          clusterer.setMinClusterSize(1);
        };

        clusterSize();


        // 마커들의 전체 배열
        var markers = new Array();
        // 반복문 내에서는 마커 전체 배열에 마커를 하나씩 넣어줌
        <?
        $sql = " select wr_subject, wr_1, wr_5, wr_6, wr_id from 2023portfolio_write_real_estate_listings order by wr_id asc ";

        $result = sql_query($sql);
        $cnt = 0;
        while ($row = sql_fetch_array($result)) 
        { 
        if($row['wr_5'] && $row['wr_6']) 
        {
        ?>
        <?php if($row['wr_1'] == "markerStar1") { ?>
        var imageSrc = '/portfolio/skin/board/productList/img/markerStar1.png',
        imageSize = new kakao.maps.Size(40, 59), // 마커이미지의 크기입니다
            imageOption = {
                offset: new kakao.maps.Point(20, 59)
            }; // 마커이미지의 옵션입니다. 마커의 좌표와 일치시킬 이미지 안에서의 좌표를 설정합니다.
            <?php $propertyState = "입주예정";
            $propertyClass ="marker01";
            ?>
            <?php } else if($row['wr_1'] == "markerStar2") { ?>
        var imageSrc = '/portfolio/skin/board/productList/img/markerStar2.png',
        imageSize = new kakao.maps.Size(44, 48),
            imageOption = {
                offset: new kakao.maps.Point(22, 48)
            };
            <?php $propertyState = "분양마감";
            $propertyClass ="marker02";
            ?>
            <?php } else if($row['wr_1'] == "markerStar3") { ?>
        var imageSrc = '/portfolio/skin/board/productList/img/markerStar3.png',
        imageSize = new kakao.maps.Size(44, 33),
            imageOption = {
              offset: new kakao.maps.Point(44, 33)
            };
            <?php $propertyState = "분양예정";
            $propertyClass ="marker03";
            ?>
            <?php } else if($row['wr_1'] == "markerStar4") { ?>
        var imageSrc = '/portfolio/skin/board/productList/img/markerStar1.png',
        imageSize = new kakao.maps.Size(40, 59),
            imageOption = {
              offset: new kakao.maps.Point(20, 59)
            };
            <?php $propertyState = "";
            $propertyClass ="marker04";
            ?>
            <?php } ?>



            var markerImage = new kakao.maps.MarkerImage(imageSrc, imageSize, imageOption);

            var marker = new daum.maps.Marker({
                map: map,
                position: new daum.maps.LatLng('<?=$row['wr_5']?>', '<?=$row['wr_6']?>'),
                // 마커 표시 위치
                title : "<?php echo $row['wr_subject']; ?>",
                image : markerImage 
            });

            // 클러스터를 위한 마커배열에 마커들 담기
            markers.push(marker);

            var content = '<div class="overlay-wrap <?php echo $propertyClass; ?>">' + 
            '    <a href="/portfolio/bbs/board.php?bo_table=real_estate_listings&wr_id=<?php echo $row['wr_id']; ?>" class="viewBtn-<?php echo $row['wr_id']; ?>" onclick="gallWrId(this, event);">'+
            '     <div class="overlay-state">'+
            '       <p><?php echo $propertyState; ?></p>'+
            '     </div>'+
            '     </a>'+
            '    <div class="overlay-info">' + 
            '        <p class="overlay-title">' + 
            '            <?php echo $row['wr_subject']; ?>' + 
            '        </p>' + 
            '    </div>' +    
            '</div>';

            var overlay = new kakao.maps.CustomOverlay({
                content: content,
                map: map,
                position: marker.getPosition()       
            });

            kakao.maps.event.addListener(marker, 'click', function() {
              var marLink = "/portfolio/bbs/board.php?bo_table=real_estate_listings&wr_id=<?php echo $row['wr_id']; ?>";
              $(".map-right-viewBox main").empty();

              popupView(marLink);
            });




        <?
            $cnt++;
        }
        }
        ?>
        if(markers.length > 0) {
          clusterer.addMarkers(markers);
          kakao.maps.event.addListener(clusterer, 'clusterclick', function(cluster) {
            var level = map.getLevel()-1;
            map.setLevel(level, {anchor: cluster.getCenter()});
          });

        }
</script>

      <li class="map-right-area">
        <ul class="clearfix">

          <li class="map-right-viewBox">
            <div class="map-right-view-smallBox">
              <div class="property-loading"></div>
              <main></main>
            </div>
            <div class="map-viewBox-top clearfix">
              <h2></h2>
              <div class="map-right-viewBox-closeBtn">×</div>
            </div>
          </li>
          <li class="right-list-area">
            <div class="ojlist-ov-wrap">
              <ul class='ojlist-ov-ul' id='timezones'>
                
              </ul>
              <div class="more-view on">
                더보기 +
                <span id="page" class='sound_only'>2</span>
              </div>
            </div>
            <div class="mo-right-listBtn">
              <p>지도에서 매물보기</p>
            </div>
          </li>
        </ul>
      </li>
    </ul>
  </section>

</div>
<div class="mo-pview-listBtn">
  <p>이 지역 매물보기 <span class="mo-pview-list-total_count"></span>개</p>
</div>


<script>


    
  function popupView(link){ 
    var url = link;
    var tbody = "";
    var thtml = "";
    $.ajax({
      type:"POST",
      url:url,
      dataType : "html",
      success: function(html){
        tbody = html.split('<main>');
        thtml = tbody[1].split('</main>');

        setTimeout(function() { 
          $(".property-loading").removeClass("on");
          $("main").append(thtml[0]);

          var tit = $(".pview-subejct-left h1").text();
          $(".map-viewBox-top h2").text(tit);
        }, 500);
      },
      beforeSend: function (){
        $(".map-right-viewBox").show();
        $(".property-loading").addClass("on");
      },
      complete: function () {
      },
      error: function(xhr, status, error) {
        alert(error);
      }  
    });
  }

  function gallWrId(e, evt){
    evt.preventDefault();
    $(".map-right-viewBox main").empty();
    var link = $(e).attr("href");
    popupView(link);
  }

  history.pushState(null, null, "#Back");

  $(window).bind("hashchange", function () {
    if (!confirm("이 페이지에서 나가시겠습니까?")) {
      history.pushState(null, null, "#Back");
    } else { 
      window.location.href = '/index.php';
    }

  });


  <?php if($wr_id){ ?>

    var pmLink = "/portfolio/bbs/board.php?bo_table=real_estate_listings&wr_id=<?=$wr_id?>";
    // console.log(pmLink);
    popupView(pmLink);

  <?php } ?>


  



  $(".map-right-viewBox-closeBtn").click(function(){
    $(".map-right-viewBox").hide();
    $(".map-right-viewBox main").empty();
  });
  $(".mo-pview-listBtn").click(function(){
    $(".right-list-area").slideToggle();
  });
  $(".mo-right-listBtn").click(function(){
    $(".right-list-area").slideToggle();
  });

  $(".map-right-view-smallBox").scroll(function() {
    var wheel = $(".map-right-view-smallBox").scrollTop();
    if (wheel > 100) {
      $(".map-viewBox-top").addClass("scrolled");
    } else {
      $(".map-viewBox-top").removeClass("scrolled");
    }
  });

</script>


<script>

                function overlayShow(){
                  var level = map.getLevel();
                  if(level >= 5){
                    $(".overlay-wrap").hide(0);
                  } else {
                    $(".overlay-wrap").show(0);
                  }
                  <?php if(is_mobile()){ ?>
                    if(level >= 5){
                      $(".overlay-info").hide(0);
                    } else {
                      $(".overlay-info").show(0);
                    }
                  <?php } else { ?> 
                    if(level >= 4){
                      $(".overlay-info").hide(0);
                    } else {
                      $(".overlay-info").show(0);
                    }
                  <?php } ?>
                }
                overlayShow();
                kakao.maps.event.addListener(map, 'dragend', function() {        
                  overlayShow();
                  mapChange();
                });
                kakao.maps.event.addListener(map, 'zoom_changed', function() {       
                  overlayShow();
                  // 마커 상단 오버레이 숨김
                  mapChange();
                });
                $(".more-view").click(function(){
                  if($(this).hasClass("on")){
                    moreView();
                  }
                });


                function mapChange(){
                  var bounds = map.getBounds();
                  var center = map.getCenter();
                  var center_lat = map.getCenter().getLat(); //센터위도
                  var center_lng = map.getCenter().getLng(); //센터경도
                  var swLatlng = bounds.getSouthWest(); //남서
                  var neLatlng = bounds.getNorthEast(); //북동
                  var south_lat = swLatlng.getLat(); //남
                  var north_lat = neLatlng.getLat(); //북
                  var west_lng = swLatlng.getLng(); //서
                  var east_lat = neLatlng.getLng(); //동

                  var level = map.getLevel();
                  var bo_table = "real_estate_listings";


                  var page = 1; 
                  var page_cnt = 15;

                  var data_url = "https://keewon17.cafe24.com/portfolio/skin/board/productList/mapList_update.php?south_lat=" + south_lat + "&north_lat=" + north_lat + "&west_lng=" + west_lng + "&east_lat=" + east_lat + "&level=" + level + "&detail=false" + "&center_lat=" + center_lat + "&center_lng=" + center_lng + "&bo_table=" + bo_table + "&page=" + page + "&page_cnt=" + page_cnt;

                  // console.log(data_url);

                  $.ajax({
                    type: "GET",
                    url: data_url,
                    dataType: "json", //추가
                    success:function(data){
                      $("#timezones").children().remove();

                      if(data.mapItems == "noData"){
                        return false;
                      }

                      for (var i = 0; i < data.mapItems.length; i++) {
                        var mapItems = data.mapItems[i];
                        itemList_put(mapItems);
                      }

                      var total_count = data.TotalCount;
                      $(".mo-pview-list-total_count").text(total_count);

                      var now_count = $(".ojlist-ov-li").length;

                      if(data.TotalCount <= now_count){
                        
                        $(".more-view").removeClass("on")
                        $(".more-view").text("매물이 더이상 없습니다.");
                      }

                    }
                  });
                }

                function moreView(){
                  var bounds = map.getBounds();
                  var center = map.getCenter();
                  var center_lat = map.getCenter().getLat(); //센터위도
                  var center_lng = map.getCenter().getLng(); //센터경도
                  var swLatlng = bounds.getSouthWest(); //남서
                  var neLatlng = bounds.getNorthEast(); //북동
                  var south_lat = swLatlng.getLat(); //남
                  var north_lat = neLatlng.getLat(); //북
                  var west_lng = swLatlng.getLng(); //서
                  var east_lat = neLatlng.getLng(); //동

                  var level = map.getLevel();
                  var bo_table = "real_estate_listings";

                  var pageDiv = Number($("#page").text());

                  var page = pageDiv; 
                  var page_cnt = 15;

                  var data_url = "https://keewon17.cafe24.com/portfolio/skin/board/productList/mapList_update.php?south_lat=" + south_lat + "&north_lat=" + north_lat + "&west_lng=" + west_lng + "&east_lat=" + east_lat + "&level=" + level + "&detail=false" + "&center_lat=" + center_lat + "&center_lng=" + center_lng + "&bo_table=" + bo_table + "&page=" + page + "&page_cnt=" + page_cnt;

                  // console.log(data_url);

                  $.ajax({
                    type: "GET",
                    url: data_url,
                    dataType: "json", //추가
                    success:function(data){
                      if(data.mapItems == "noData"){
                        $(".more-view").removeClass("on")
                        $(".more-view").text("매물이 더이상 없습니다.");
                        return false;
                      }

                      for (var i = 0; i < data.mapItems.length; i++) {
                        var mapItems = data.mapItems[i];
                        itemList_put(mapItems);
                      }

                      var total_count = data.TotalCount;
                      $(".mo-pview-list-total_count").text(total_count);
                      var now_count = $(".ojlist-ov-li").length;
                      if(data.TotalCount <= now_count){
                        $(".more-view").removeClass("on")
                        $(".more-view").text("매물이 더이상 없습니다.");
                      }

                      page++
                      $("#page").text(page);
                    }
                  }); 
                }

                function itemList_put(item){
                  html = '<li class="ojlist-ov-li">';
                  html += '<a href="/portfolio/bbs/board.php?bo_table=real_estate_listings&wr_id=' + item.wr_id + '" class="viewBtn-'+ item.wr_id +'" onclick="gallWrId(this, event);">';
                  html += '<div class="clearfix">';
                  html += '<div class="ojlist-ov-imgBox">';
                  html += '<img src="' + item.thumb_img + '" alt="">';
                  html += '</div>';
                  html += '<div class="ojlist-ov-txtBox">';
                  html += '<h3>'+ item.wr_subject +'</h3>';
                  html += '<h2>' + item.wr_7 +'</h2>';
                  html += '<p><span>' + item.wr_3 +'</span></p>';
                  html += '<p><span><img src="/portfolio/theme/CKW/img/size-change-icon.png">'+ item.wr_11 +'㎡</span><span><img src="/portfolio/theme/CKW/img/member-size-icon.png">'+ item.wr_8 +'</span></p>';
                  html += '</div></div></a></li>';


                  $("#timezones").append(html);
                } 

                mapChange();
                

              </script>




<?php
include_once(G5_THEME_PATH.'/tail.php');
?>
