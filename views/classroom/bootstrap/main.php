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
	<div id="asmo_classroom_main">
		<section class="take_class_sec">
			<strong><span><?php echo html_escape($this->member->item('mem_nickname')); ?></span>님이 수강중인 강의</strong>

			<div class="swiper-container mySwiper">
				<div class="swiper-wrapper">
					<div class="swiper-slide">
						<a href="<?php echo site_url('classroom/player'); ?>">
							<div class="class_video_img">
								<img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/classroom/thumbnail.svg" alt="thumbnail">
							</div>
							<div class="class_video_info">
								<div class="class_video_info_title">
									<span>[게임 개발] 마인크래프트 게임을 활용한 파이썬 프로그래밍 완벽 이해</span>
								</div>
								<div class="class_video_info_date">
									<span>2023.10.25 - 2023.10.26</span>
								</div>
							</div>
						</a>
					</div>

					<div class="swiper-slide">
						<a href="<?php echo site_url('classroom/player'); ?>">
							<div class="class_video_img">
								<img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/classroom/thumbnail_2.svg" alt="thumbnail_2">
							</div>
							<div class="class_video_info">
								<div class="class_video_info_title">
									<span>[법정 필수 교육] 개인정보보호교육</span>
								</div>
								<div class="class_video_info_date">
									<span>2023.10.25 - 2023.10.26</span>
								</div>
							</div>
						</a>
					</div>

					<div class="swiper-slide">
						<a href="<?php echo site_url('classroom/player'); ?>">
							<div class="class_video_img">
								<img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/classroom/thumbnail.svg" alt="thumbnail">
							</div>
							<div class="class_video_info">
								<div class="class_video_info_title">
									<span>[게임 개발] 마인크래프트 게임을 활용한 파이썬 프로그래밍 완벽 이해</span>
								</div>
								<div class="class_video_info_date">
									<span>2023.10.25 - 2023.10.26</span>
								</div>
							</div>
						</a>
					</div>

					<div class="swiper-slide">
						<a href="<?php echo site_url('classroom/player'); ?>">
							<div class="class_video_img">
								<img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/classroom/thumbnail_2.svg" alt="thumbnail_2">
							</div>
							<div class="class_video_info">
								<div class="class_video_info_title">
									<span>[법정 필수 교육] 개인정보보호교육</span>
								</div>
								<div class="class_video_info_date">
									<span>2023.10.25 - 2023.10.26</span>
								</div>
							</div>
						</a>
					</div>

					<div class="swiper-slide">
						<a href="<?php echo site_url('classroom/player'); ?>">
							<div class="class_video_img">
								<img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/classroom/thumbnail.svg" alt="thumbnail">
							</div>
							<div class="class_video_info">
								<div class="class_video_info_title">
									<span>[게임 개발] 마인크래프트 게임을 활용한 파이썬 프로그래밍 완벽 이해</span>
								</div>
								<div class="class_video_info_date">
									<span>2023.10.25 - 2023.10.26</span>
								</div>
							</div>
						</a>
					</div>

					<div class="swiper-slide">
						<a href="<?php echo site_url('classroom/player'); ?>">
							<div class="class_video_img">
								<img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/classroom/thumbnail_2.svg" alt="thumbnail_2">
							</div>
							<div class="class_video_info">
								<div class="class_video_info_title">
									<span>[법정 필수 교육] 개인정보보호교육</span>
								</div>
								<div class="class_video_info_date">
									<span>2023.10.25 - 2023.10.26</span>
								</div>
							</div>
						</a>
					</div>

					<div class="swiper-slide">
						<a href="<?php echo site_url('classroom/player'); ?>">
							<div class="class_video_img">
								<img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/classroom/thumbnail.svg" alt="thumbnail">
							</div>
							<div class="class_video_info">
								<div class="class_video_info_title">
									<span>[게임 개발] 마인크래프트 게임을 활용한 파이썬 프로그래밍 완벽 이해</span>
								</div>
								<div class="class_video_info_date">
									<span>2023.10.25 - 2023.10.26</span>
								</div>
							</div>
						</a>
					</div>

					<div class="swiper-slide">
						<a href="<?php echo site_url('classroom/player'); ?>">
							<div class="class_video_img">
								<img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/classroom/thumbnail_2.svg" alt="thumbnail_2">
							</div>
							<div class="class_video_info">
								<div class="class_video_info_title">
									<span>[법정 필수 교육] 개인정보보호교육</span>
								</div>
								<div class="class_video_info_date">
									<span>2023.10.25 - 2023.10.26</span>
								</div>
							</div>
						</a>
					</div>

				</div>
			</div>

			<a href="<?php echo site_url('classroom/my_class'); ?>">나의 수강 목록 <img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/classroom/more.svg" alt="more"></a>
		</section>

		<section class="class_sec">
			<strong>필수 강의</strong>

			<div class="class_video_box">
				<div class="class_video">
					<a href="<?php echo site_url('classroom/detail'); ?>">
						<div class="class_video_img">
							<img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/classroom/thumbnail.svg" alt="thumbnail">
						</div>
						<div class="class_video_info">
							<div class="class_video_info_title">
								<span>[법정 필수 교육] 개인정보보호교육</span>
							</div>
							<div class="class_video_info_icon">
								<span>수강중</span>
							</div>
						</div>
					</a>
				</div>

				<div class="class_video">
					<a href="<?php echo site_url('classroom/detail'); ?>">
						<div class="class_video_img">
							<img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/classroom/thumbnail_2.svg" alt="thumbnail_2">
						</div>
						<div class="class_video_info">
							<div class="class_video_info_title">
								<span>[법정 필수 교육] 산업안전 및 보건교육</span>
							</div>
							<div class="class_video_info_icon">
								<span class="class_apply">수강 신청</span>
							</div>
						</div>
					</a>
				</div>

				<div class="class_video">
					<a href="<?php echo site_url('classroom/detail'); ?>">
						<div class="class_video_img">
							<img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/classroom/thumbnail.svg" alt="thumbnail">
						</div>
						<div class="class_video_info">
							<div class="class_video_info_title">
								<span>[법정 필수 교육] 직장 내 괴롭힘 예방교육</span>
							</div>
							<div class="class_video_info_icon">
								<span>수강중</span>
							</div>
						</div>
					</a>
				</div>

				<div class="class_video">
					<a href="<?php echo site_url('classroom/detail'); ?>">
						<div class="class_video_img">
							<img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/classroom/thumbnail_2.svg" alt="thumbnail_2">
						</div>
						<div class="class_video_info">
							<div class="class_video_info_title">
								<span>[법정 필수 교육] 직장 내 장애인 인식개선교육</span>
							</div>
							<div class="class_video_info_icon">
								<span class="class_apply">수강 신청</span>
							</div>
						</div>
					</a>
				</div>
			</div>

			<a href="<?php echo site_url('classroom/business_class'); ?>">더보기</a>
		</section>

		<section class="class_sec">
			<strong>추천 강의</strong>

			<div class="class_video_box">
				<div class="class_video">
					<a href="<?php echo site_url('classroom/detail'); ?>">
						<div class="class_video_img">
							<img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/classroom/thumbnail.svg" alt="thumbnail">
						</div>
						<div class="class_video_info">
							<div class="class_video_info_title">
								<span>[법정 필수 교육] 개인정보보호교육</span>
							</div>
							<div class="class_video_info_icon">
								<span>수강중</span>
							</div>
						</div>
					</a>
				</div>

				<div class="class_video">
					<a href="<?php echo site_url('classroom/detail'); ?>">
						<div class="class_video_img">
							<img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/classroom/thumbnail_2.svg" alt="thumbnail_2">
						</div>
						<div class="class_video_info">
							<div class="class_video_info_title">
								<span>[법정 필수 교육] 산업안전 및 보건교육</span>
							</div>
							<div class="class_video_info_icon">
								<span class="class_apply">수강 신청</span>
							</div>
						</div>
					</a>
				</div>

				<div class="class_video">
					<a href="<?php echo site_url('classroom/detail'); ?>">
						<div class="class_video_img">
							<img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/classroom/thumbnail.svg" alt="thumbnail">
						</div>
						<div class="class_video_info">
							<div class="class_video_info_title">
								<span>[법정 필수 교육] 직장 내 괴롭힘 예방교육</span>
							</div>
							<div class="class_video_info_icon">
								<span>수강중</span>
							</div>
						</div>
					</a>
				</div>

				<div class="class_video">
					<a href="<?php echo site_url('classroom/detail'); ?>">
						<div class="class_video_img">
							<img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/classroom/thumbnail_2.svg" alt="thumbnail_2">
						</div>
						<div class="class_video_info">
							<div class="class_video_info_title">
								<span>[법정 필수 교육] 직장 내 장애인 인식개선교육</span>
							</div>
							<div class="class_video_info_icon">
								<span class="class_apply">수강 신청</span>
							</div>
						</div>
					</a>
				</div>
			</div>

			<a href="<?php echo site_url('classroom/business_class'); ?>">더보기</a>
		</section>
	</div>
</div>


<script type="text/javascript">

	const swiper = new Swiper('.swiper-container', {
		loop: true,
		centeredSlides: true,
		slidesPerView: 'auto',
		slideToClickedSlide: true,
		effect: 'coverflow',
		initialSlide: 5,
		coverflowEffect: {
			rotate: -7,
			stretch: -30,
			
			slideShadows: false,
		},
	});

	// asmo sh 231122 클래스룸 페이지 디자인 상 헤더 숨김 처리 스크립트
	$(document).ready(function() {
		$('header').addClass('dn');
		// $('.navbar').addClass('dn');
		// $('.sidebar').addClass('dn');
		// $('footer').addClass('dn');

		$('.main').addClass('add');

		// 클래스룸 페이지일 때 사이드바 메뉴 활성화
		$('#classroom a').addClass('selected');
	});
</script>