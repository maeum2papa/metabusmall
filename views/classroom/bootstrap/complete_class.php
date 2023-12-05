<?php
/*
$k = 0;
$is_open = false;
if (element('board_list', $view)) {
	foreach (element('board_list', $view) as $key => $board) {
		$config = array(
			'skin' => 'bootstrap',
			'brd_key' => element('brd_key', $board),
			'limit' => 5,
			'length' => 40,
			'is_gallery' => '',
			'image_width' => '',
			'image_height' => '',
			'cache_minute' => 1,
		);
		if ($k % 2 === 0) {
			echo '<div class="row">';
			$is_open = true;
		}
		echo $this->board->latest($config);
		if ($k % 2 === 1) {
			echo '</div>';
			$is_open = false;
		}
		$k++;
	}
}
if ($is_open) {
	echo '</div>';
	$is_open = false;
}
*/
?>
<div id="asmo_classroom">
	<div id="asmo_classroom_myClass">
		<div class="myClass_wrap">

			<!-- 게시판이 들어가야 합니다 -->

			<div class="myClass_board_top">
				<div class="board_name_box">
					<a href="<?php echo site_url('classroom/my_class')?>">수강중인 과정</a>
					<a class="selected" href="#" onclick="return false;">수강완료 과정</a>
				</div>

				<div class="board_select_box">
					<select class="form-control">
						<option value="">정렬</option>
						<option value="">진도율 순</option>
						<option value="">시작일 순</option>
						<option value="">카테고리 순</option>
					</select>
				</div>
			</div>
			<div class="myClass_board_bottom"></div>


			<!-- 페이지네이션이 들어가야 합니다. -->
		</div>
	</div>
</div>


<script type="text/javascript">
	// asmo sh 231114 랜딩 페이지 디자인 상 헤더, 사이드바, 푸터 숨김 처리 스크립트
	$(document).ready(function() {
		$('header').addClass('dn');
		$('.navbar').addClass('dn');
		// $('.sidebar').addClass('dn');
		// $('footer').addClass('dn');

		$('.main').addClass('add');

		// 클래스룸 페이지일 때 사이드바 메뉴 활성화
		$('#classroom a').addClass('selected');
	});
</script>