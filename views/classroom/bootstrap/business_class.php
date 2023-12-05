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
	<div id="asmo_classroom_business">
		<div class="business_top_wrap">
			<div class="top_left_wrap">
				<strong>전체 강의 <span id="list_length">40</span>개</strong>

				<div class="top_left_checkbox">
					<input type="checkbox" id="check" name="check" value="check">
					<label for="check">필수 강의만 보기</label>
				</div>
			</div>
			<div class="top_right_wrap">
				<div class="board_select_box">
					<select class="form-control">
						<option value="">정렬</option>
						<option value="">진도율 순</option>
						<option value="">시작일 순</option>
						<option value="">카테고리 순</option>
					</select>
				</div>
				<a href="<?php echo site_url('classroom/my_class'); ?>">나의 수강 목록 <img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/classroom/more.svg" alt="more"></a>
			</div>
		</div>

		<div class="buneess_list_wrap">

			<div class="class_video" >
				<div style="cursor: pointer;" class="class_video_box" onClick="location.href='<?php echo site_url('classroom/detail'); ?>'" >
					<div class="class_video_img">
						<img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/classroom/thumbnail.svg" alt="thumbnail">
					</div>


					<div class="class_video_category swiper-container">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								공통역량 기타
							</div>
							<div class="swiper-slide">
								직무역량 기타
							</div>
							
						</div>
					</div>

					<div class="class_video_info">
						<div class="class_video_info_title">
							<span>[게임 개발] 마인크래프트 게임을 활용한 파이썬 프로그래밍 완벽 이해</span>
						</div>
						<div class="class_video_info_desc">
							<span>커뮤니케이션 메커니즘의 이해로 올바른 조직문화 형성...커뮤니케이션 메커니즘의 이해로 올바른 조직문화 형성...</span>
						</div>
					</div>
					<div class="class_video_icon">
						<span>수강중</span>
					</div>
				</div>
			</div>

			<div class="class_video" >
				<div style="cursor: pointer;" class="class_video_box" onClick="location.href='<?php echo site_url('classroom/detail'); ?>'" >
					<div class="class_video_img">
						<img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/classroom/thumbnail_2.svg" alt="thumbnail_2">
					</div>


					<div class="class_video_category swiper-container">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								외국어_영어
							</div>
							<div class="swiper-slide">
								직무역량 기타
							</div>
							<div class="swiper-slide">
								리더십 일반
							</div>
							<div class="swiper-slide">
								자격증
							</div>
						</div>
					</div>

					<div class="class_video_info">
						<div class="class_video_info_title">
							<span>[게임 개발] 마인크래프트 게임을 활용한 파이썬 프로그래밍 완벽 이해</span>
						</div>
						<div class="class_video_info_desc">
							<span>커뮤니케이션 메커니즘의 이해로 올바른 조직문화 형성...커뮤니케이션 메커니즘의 이해로 올바른 조직문화 형성...</span>
						</div>
					</div>
					<div class="class_video_icon">
						<span>수강중</span>
					</div>
				</div>
			</div>

			<div class="class_video" >
				<div style="cursor: pointer;" class="class_video_box" onClick="location.href='<?php echo site_url('classroom/detail'); ?>'" >
					<div class="class_video_img">
						<img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/classroom/thumbnail.svg" alt="thumbnail">
					</div>


					<div class="class_video_category swiper-container">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								공통역량 기타
							</div>
							<div class="swiper-slide">
								직무역량 기타
							</div>
							
							<div class="swiper-slide">
								공통역량 기타
							</div>
						</div>
					</div>

					<div class="class_video_info">
						<div class="class_video_info_title">
							<span>[게임 개발] 마인크래프트 게임을 활용한 파이썬 프로그래밍 완벽 이해</span>
						</div>
						<div class="class_video_info_desc">
							<span>커뮤니케이션 메커니즘의 이해로 올바른 조직문화 형성...커뮤니케이션 메커니즘의 이해로 올바른 조직문화 형성...</span>
						</div>
					</div>
					<div class="class_video_icon">
						<span>수강중</span>
					</div>
				</div>
			</div>

			<div class="class_video" >
				<div style="cursor: pointer;" class="class_video_box" onClick="location.href='<?php echo site_url('classroom/detail'); ?>'" >
					<div class="class_video_img">
						<img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/classroom/thumbnail_2.svg" alt="thumbnail_2">
					</div>


					<div class="class_video_category swiper-container">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								외국어_영어
							</div>
							<div class="swiper-slide">
								직무역량 기타
							</div>
							<div class="swiper-slide">
								리더십 일반
							</div>
							<div class="swiper-slide">
								자격증
							</div>
						</div>
					</div>

					<div class="class_video_info">
						<div class="class_video_info_title">
							<span>[게임 개발] 마인크래프트 게임을 활용한 파이썬 프로그래밍 완벽 이해</span>
						</div>
						<div class="class_video_info_desc">
							<span>커뮤니케이션 메커니즘의 이해로 올바른 조직문화 형성...커뮤니케이션 메커니즘의 이해로 올바른 조직문화 형성...</span>
						</div>
					</div>
					<div class="class_video_icon">
						<span>수강중</span>
					</div>
				</div>
			</div>


			<div class="class_video" >
				<div style="cursor: pointer;" class="class_video_box" onClick="location.href='<?php echo site_url('classroom/detail'); ?>'" >
					<div class="class_video_img">
						<img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/classroom/thumbnail.svg" alt="thumbnail">
					</div>


					<div class="class_video_category swiper-container">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								공통역량 기타
							</div>
							<div class="swiper-slide">
								직무역량 기타
							</div>
							<div class="swiper-slide">
								IT
							</div>
							<div class="swiper-slide">
								공통역량 기타
							</div>
						</div>
					</div>

					<div class="class_video_info">
						<div class="class_video_info_title">
							<span>[게임 개발] 마인크래프트 게임을 활용한 파이썬 프로그래밍 완벽 이해</span>
						</div>
						<div class="class_video_info_desc">
							<span>커뮤니케이션 메커니즘의 이해로 올바른 조직문화 형성...커뮤니케이션 메커니즘의 이해로 올바른 조직문화 형성...</span>
						</div>
					</div>
					<div class="class_video_icon">
						<span>수강중</span>
					</div>
				</div>
			</div>

			<div class="class_video" >
				<div style="cursor: pointer;" class="class_video_box" onClick="location.href='<?php echo site_url('classroom/detail'); ?>'" >
					<div class="class_video_img">
						<img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/classroom/thumbnail_2.svg" alt="thumbnail_2">
					</div>


					<div class="class_video_category swiper-container">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								외국어_영어
							</div>
							<div class="swiper-slide">
								직무역량 기타
							</div>
							<div class="swiper-slide">
								리더십 일반
							</div>
							<div class="swiper-slide">
								자격증
							</div>
						</div>
					</div>

					<div class="class_video_info">
						<div class="class_video_info_title">
							<span>[게임 개발] 마인크래프트 게임을 활용한 파이썬 프로그래밍 완벽 이해</span>
						</div>
						<div class="class_video_info_desc">
							<span>커뮤니케이션 메커니즘의 이해로 올바른 조직문화 형성...커뮤니케이션 메커니즘의 이해로 올바른 조직문화 형성...</span>
						</div>
					</div>
					<div class="class_video_icon">
						<span>수강중</span>
					</div>
				</div>
			</div>


			<div class="class_video" >
				<div style="cursor: pointer;" class="class_video_box" onClick="location.href='<?php echo site_url('classroom/detail'); ?>'" >
					<div class="class_video_img">
						<img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/classroom/thumbnail.svg" alt="thumbnail">
					</div>


					<div class="class_video_category swiper-container">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								공통역량 기타
							</div>
							<div class="swiper-slide">
								직무역량 기타
							</div>
							<div class="swiper-slide">
								IT
							</div>
							<div class="swiper-slide">
								공통역량 기타
							</div>
						</div>
					</div>

					<div class="class_video_info">
						<div class="class_video_info_title">
							<span>[게임 개발] 마인크래프트 게임을 활용한 파이썬 프로그래밍 완벽 이해</span>
						</div>
						<div class="class_video_info_desc">
							<span>커뮤니케이션 메커니즘의 이해로 올바른 조직문화 형성...커뮤니케이션 메커니즘의 이해로 올바른 조직문화 형성...</span>
						</div>
					</div>
					<div class="class_video_icon">
						<span>수강중</span>
					</div>
				</div>
			</div>

			<div class="class_video" >
				<div style="cursor: pointer;" class="class_video_box" onClick="location.href='<?php echo site_url('classroom/detail'); ?>'" >
					<div class="class_video_img">
						<img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/classroom/thumbnail_2.svg" alt="thumbnail_2">
					</div>


					<div class="class_video_category swiper-container">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								외국어_영어
							</div>
							<div class="swiper-slide">
								직무역량 기타
							</div>
							<div class="swiper-slide">
								리더십 일반
							</div>
							<div class="swiper-slide">
								자격증
							</div>
						</div>
					</div>

					<div class="class_video_info">
						<div class="class_video_info_title">
							<span>[게임 개발] 마인크래프트 게임을 활용한 파이썬 프로그래밍 완벽 이해</span>
						</div>
						<div class="class_video_info_desc">
							<span>커뮤니케이션 메커니즘의 이해로 올바른 조직문화 형성...커뮤니케이션 메커니즘의 이해로 올바른 조직문화 형성...</span>
						</div>
					</div>
					<div class="class_video_icon">
						<span>수강중</span>
					</div>
				</div>
			</div>


			<div class="class_video" >
				<div style="cursor: pointer;" class="class_video_box" onClick="location.href='<?php echo site_url('classroom/detail'); ?>'" >
					<div class="class_video_img">
						<img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/classroom/thumbnail.svg" alt="thumbnail">
					</div>


					<div class="class_video_category swiper-container">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								공통역량 기타
							</div>
							<div class="swiper-slide">
								직무역량 기타
							</div>
							<div class="swiper-slide">
								IT
							</div>
							<div class="swiper-slide">
								공통역량 기타
							</div>
						</div>
					</div>

					<div class="class_video_info">
						<div class="class_video_info_title">
							<span>[게임 개발] 마인크래프트 게임을 활용한 파이썬 프로그래밍 완벽 이해</span>
						</div>
						<div class="class_video_info_desc">
							<span>커뮤니케이션 메커니즘의 이해로 올바른 조직문화 형성...커뮤니케이션 메커니즘의 이해로 올바른 조직문화 형성...</span>
						</div>
					</div>
					<div class="class_video_icon">
						<span>수강중</span>
					</div>
				</div>
			</div>

			<div class="class_video" >
				<div style="cursor: pointer;" class="class_video_box" onClick="location.href='<?php echo site_url('classroom/detail'); ?>'" >
					<div class="class_video_img">
						<img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/classroom/thumbnail_2.svg" alt="thumbnail_2">
					</div>


					<div class="class_video_category swiper-container">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								외국어_영어
							</div>
							<div class="swiper-slide">
								직무역량 기타
							</div>
							<div class="swiper-slide">
								리더십 일반
							</div>
							<div class="swiper-slide">
								자격증
							</div>
						</div>
					</div>

					<div class="class_video_info">
						<div class="class_video_info_title">
							<span>[게임 개발] 마인크래프트 게임을 활용한 파이썬 프로그래밍 완벽 이해</span>
						</div>
						<div class="class_video_info_desc">
							<span>커뮤니케이션 메커니즘의 이해로 올바른 조직문화 형성...커뮤니케이션 메커니즘의 이해로 올바른 조직문화 형성...</span>
						</div>
					</div>
					<div class="class_video_icon">
						<span>수강중</span>
					</div>
				</div>
			</div>


			<div class="class_video" >
				<div style="cursor: pointer;" class="class_video_box" onClick="location.href='<?php echo site_url('classroom/detail'); ?>'" >
					<div class="class_video_img">
						<img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/classroom/thumbnail.svg" alt="thumbnail">
					</div>


					<div class="class_video_category swiper-container">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								공통역량 기타
							</div>
							<div class="swiper-slide">
								직무역량 기타
							</div>
							<div class="swiper-slide">
								IT
							</div>
							<div class="swiper-slide">
								공통역량 기타
							</div>
						</div>
					</div>

					<div class="class_video_info">
						<div class="class_video_info_title">
							<span>[게임 개발] 마인크래프트 게임을 활용한 파이썬 프로그래밍 완벽 이해</span>
						</div>
						<div class="class_video_info_desc">
							<span>커뮤니케이션 메커니즘의 이해로 올바른 조직문화 형성...커뮤니케이션 메커니즘의 이해로 올바른 조직문화 형성...</span>
						</div>
					</div>
					<div class="class_video_icon">
						<span>수강중</span>
					</div>
				</div>
			</div>

			<div class="class_video" >
				<div style="cursor: pointer;" class="class_video_box" onClick="location.href='<?php echo site_url('classroom/detail'); ?>'" >
					<div class="class_video_img">
						<img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/classroom/thumbnail_2.svg" alt="thumbnail_2">
					</div>


					<div class="class_video_category swiper-container">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								외국어_영어
							</div>
							<div class="swiper-slide">
								직무역량 기타
							</div>
							<div class="swiper-slide">
								리더십 일반
							</div>
							<div class="swiper-slide">
								자격증
							</div>
						</div>
					</div>

					<div class="class_video_info">
						<div class="class_video_info_title">
							<span>[게임 개발] 마인크래프트 게임을 활용한 파이썬 프로그래밍 완벽 이해</span>
						</div>
						<div class="class_video_info_desc">
							<span>커뮤니케이션 메커니즘의 이해로 올바른 조직문화 형성...커뮤니케이션 메커니즘의 이해로 올바른 조직문화 형성...</span>
						</div>
					</div>
					<div class="class_video_icon">
						<span>수강중</span>
					</div>
				</div>
			</div>


			

		</div>

		<!-- 페이지네이션 들어가야 합니다. -->
		<div class="pagination_box">
			<ul class="pagination">
				<li class="first">
					<a href=""></a>
				</li>
				
				<li class="prev">
					<a href=""></a>
				</li>

				<li class="active">
					<a href="">1</a>
				</li>

				<li>
					<a href="">2</a>
				</li>

				<li>
					<a href="">3</a>
				</li>

				<li class="next">
					<a href=""></a>
				</li>
				
				<li class="last">
					<a href=""></a>
				</li>
			</ul>
		</div>
	</div>
</div>



<script type="text/javascript">

	const swiper = new Swiper('.swiper-container', {
		loop: false,
		centeredSlides: false,
		slidesPerView: 'auto',
		slideToClickedSlide: true,		
	});

	// asmo sh 231128 클래스룸 기업 전체 강의 목록 페이지 디자인 상 헤더숨김 처리 스크립트
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