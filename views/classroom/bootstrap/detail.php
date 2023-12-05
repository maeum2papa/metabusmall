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
	<div id="asmo_classroom_detail">
		<section class="detail_slides">

			<div class="bg_slider">
				<div class="swiper-container">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/classroom/detail_1-1.png" alt="detail_1-1">
						</div>
						<div class="swiper-slide">
							<img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/classroom/detail_2-1.png" alt="detail_2-1">
						</div>
						<div class="swiper-slide">
							<img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/classroom/detail_3-1.png" alt="detail_3-1">
						</div>
						
					</div>
					
				</div>
			</div>
			<div class="main_slder">
				<div class="swiper-container">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/classroom/detail_1.png" alt="detail_1">
						</div>
						<div class="swiper-slide">
							<img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/classroom/detail_2.png" alt="detail_2">
						</div>
						<div class="swiper-slide">
							<img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/classroom/detail_3.png" alt="detail_3">
						</div>
						
					</div>
					<div class="main_nav">
						<div class="swiper-button-prev"></div>
						<div class="swiper-button-next"></div>
					</div>
					<div class="swiper-pagination"></div>
				</div>
			</div>

		</section>
		<section class="detail_info">
			<div class="detail_info_top">
				<div class="detail_info_category">
					<span>자기계발</span>
					<span>IT</span>
				</div>

				<div class="detail_info_title">
					<strong>문서로 커뮤니케이션하는 직장인 평생 생존스킬. 문서 구조화와 시각화</strong>
					<p>피피티 고수가 되기 위해 총 8개의 작품 만들기</p>
				</div>


				<div class="detail_info_btn">
					<a href="<?php echo site_url('classroom/my_class'); ?>">수강신청</a>
					<a href="<?php echo site_url('classroom'); ?>">목록으로</a>
				</div>

				<div class="detail_info_author">
					<div class="detail_info_author_img">
						<img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/classroom/detail_info_author.png" alt="detail_info_author">
					</div>
				</div>	
			</div>

			<div class="detail_info_curri">
				<strong>커리큘럼</strong>

				<div class="detail_info_curri_list">
					<div class="curri_sect">
						<div class="curri_sect_img">
							<img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/classroom/curri_1.png" alt="curri_1">
						</div>
					</div>

					<div class="curri_sect">
						<div class="curri_sect_img">
							<img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/classroom/curri_2.png" alt="curri_2">
						</div>
					</div>

					<div class="curri_sect">
						<strong>섹션 2. 피피티 고수는 마인드부터 다르다</strong>

						<div class="curri_sect_list">
							<div class="curri_sect_list_title">
								<p><span>1</span> 피피티, 이 정도는 알고 갑시다.</p>
							</div>
							<div class="curri_sect_list_title">
								<p><span>2</span> 단축키, 이것만 알아두셔도 충분합니다.</p>
							</div>
							<div class="curri_sect_list_title">
								<p><span>3</span> 사용 목적을 알면 길이 보인다.</p>
							</div>
						</div>
					</div>

					<div class="curri_sect">
						<strong>섹션 3. 피피티 고수는 마인드부터 다르다</strong>

						<div class="curri_sect_list">
							<div class="curri_sect_list_title">
								<p><span>1</span> 피피티, 이 정도는 알고 갑시다.</p>
							</div>
							<div class="curri_sect_list_title">
								<p><span>2</span> 단축키, 이것만 알아두셔도 충분합니다.</p>
							</div>
							<div class="curri_sect_list_title">
								<p><span>3</span> 사용 목적을 알면 길이 보인다.</p>
							</div>
							<div class="curri_sect_list_title">
								<p><span>4</span> 사용 목적을 알면 길이 보인다.</p>
							</div>
							<div class="curri_sect_list_title">
								<p><span>5</span> 사용 목적을 알면 길이 보인다.</p>
							</div>

							<div class="curri_sect_list_title">
								<p><span>6</span> 사용 목적을 알면 길이 보인다.</p>
							</div>

							<div class="curri_sect_list_title">
								<p><span>7</span> 사용 목적을 알면 길이 보인다.</p>
							</div>

							<div class="curri_sect_list_title">
								<p><span>8</span> 사용 목적을 알면 길이 보인다.</p>
							</div>
						</div>
					</div>

					<div class="curri_sect">
						<strong>섹션 4. 피피티 고수는 마인드부터 다르다</strong>

						<div class="curri_sect_list">
							<div class="curri_sect_list_title">
								<p><span>1</span> 피피티, 이 정도는 알고 갑시다.</p>
							</div>
							<div class="curri_sect_list_title">
								<p><span>2</span> 단축키, 이것만 알아두셔도 충분합니다.</p>
							</div>
							<div class="curri_sect_list_title">
								<p><span>3</span> 사용 목적을 알면 길이 보인다.</p>
							</div>

							<div class="curri_sect_list_title">
								<p><span>4</span> 사용 목적을 알면 길이 보인다.</p>
							</div>

							<div class="curri_sect_list_title">
								<p><span>5</span> 사용 목적을 알면 길이 보인다.</p>
							</div>
						</div>
					</div>

					<div class="curri_sect">
						<strong>섹션 5. 피피티 고수는 마인드부터 다르다</strong>

						<div class="curri_sect_list">
							<div class="curri_sect_list_title">
								<p><span>1</span> 피피티, 이 정도는 알고 갑시다.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="detail_img">
			<img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/classroom/detail_img.png" alt="detail_img">
		</section>

		<section class="detail_btn">
			<a href="<?php echo site_url('classroom/my_class'); ?>">수강신청</a>
			<a href="<?php echo site_url('classroom'); ?>">목록으로</a>
		</section>

		<div class="fixed_bar">
			<span>기업이 모셔가는 프론트엔드 개발자가 되는 법을 제대로 배워보세요.</span>

			<div class="fixed_bar_btn">
				<a href="<?php echo site_url('classroom/my_class'); ?>">수강신청</a>
				<a href="<?php echo site_url('classroom'); ?>">목록으로</a>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">

	const main_swiper = new Swiper('.main_slder .swiper-container', {
		speed: 500,
		effect: 'fade',
		loop: true,
		pagination: {
			el: '.main_slder .swiper-pagination',
			clickable: true,
		},
		navigation: {
			nextEl: '.main_slder .swiper-button-next',
			prevEl: '.main_slder .swiper-button-prev',
		},
	});

	const bg_swiper = new Swiper('.bg_slider .swiper-container', {
		effect: 'fade',
		loop: true,
		touchRatio: 0,
		fadeEffect: {
			crossFade: true
		},
		
	});

	main_swiper.controller.control = bg_swiper;


	// asmo sh 231123 클래스룸 상세 페이지 디자인 상 헤더, nav바 숨김 처리 스크립트
	$(document).ready(function() {
		$('header').addClass('dn');
		$('.navbar').addClass('dn');
		// $('.sidebar').addClass('dn');
		// $('footer').addClass('dn');

		$('.main').addClass('add');

		// asmo sh 231123 클래스룸 상세 페이지 푸터에 detail 클래스 추가
		$('footer').addClass('detail');

		// 클래스룸 페이지일 때 사이드바 메뉴 활성화
		$('#classroom a').addClass('selected');
	});
</script>