<?php
echo busiIcon($this->member->item('company_idx'));
echo busiNm($this->member->item('company_idx'));

$user_info = $this->member->item('mem_id');
?>



<div id="asmo_dashboard">
	
	<div id="asmo_dashboard_main">
		

		<div class="dashboard_main">
			<div class="dashboard_top_banner">
				<?=banner('dashboard_top_banner')?>
			</div>

			<div class="dashboard_main_wrapper">
				<div class="dashboard_main_contents">
					<div class="dashboard_main_contents_top">
						<div class="contents_top_left">
							<div class="contents_top_left_img">
								<!-- 유저 이미지 들어갈 곳 -->
								<img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/preview/<?php echo html_escape($this->member->item('mem_id')); ?>_preview.png?v=<?php echo mt_rand(); ?>" alt="preview_img">
							</div>

							<div class="contents_top_left_info">
								<div class="contents_top_left_info_name">
									<strong><?php echo html_escape($this->member->item('mem_nickname')); ?></strong>
									<strong id="info_position"><?php echo html_escape($this->member->item('mem_position')); ?></strong>
								</div>
								<div class="contents_top_left_info_department">
									<span id="info_department"><?php echo html_escape($this->member->item('mem_div')); ?></span>
								</div>
							</div>

							<div class="contents_top_left_info_stateMsg">
								<strong>상태명</strong>

								<button id="statusButton"><img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/dashboard/statusMsg.svg" alt="statusMsg"></button>
								
								<?php
								$memStateValue = html_escape($this->member->item('mem_state'));

								if ($memStateValue !== '') {
									
									echo '<span>' . $memStateValue . '</span>';
									echo '<input type="text" maxlength=15 placeholder="상태명을 입력하세요" style="display: none;">';
								} else {
									
									echo '<span style="display: none;"></span>';
									echo '<input type="text" maxlength=15 placeholder="상태명을 입력하세요">';
								}
								?>
							</div>
						</div>
						<div class="contents_top_middle">

							<div class="contents_top_middle_info">
								<div class="contents_top_middle_info_box">
									<div class="etc_icon">
										<?=banner('fruit')?>
									</div>
									<div class="etc_info">
										<div class="etc_info_box">
											<span id="fruit_count"><?php echo html_escape($this->member->item('mem_cur_fruit')); ?></span>
											개
										</div>
									</div>
								</div>

								<div class="contents_top_middle_info_box">
									<div class="etc_icon">
										<?=banner('seed')?>
									</div>
									<div class="etc_info">
										<div class="etc_info_box">
											<span id="fruit_count"><?php echo html_escape($this->member->item('mem_cur_seed')); ?></span>
											개
										</div>
									</div>
								</div>
							</div>
								
							<div class="contents_top_middle_bottom">
								<a href="<?php echo site_url('classroom/my_class'); ?>">
									<div class="contents_top_middle_bottom_box class">
										<div class="bottom_box_img">
											<?=banner('class')?>
										</div>
										<span>수강중인 과정</span>
										<strong id="class_num">23</strong>
									</div>
								</a>
								
								<a href="<?php echo site_url('classroom/my_class'); ?>">
									<div class="contents_top_middle_bottom_box end">
										<div class="bottom_box_img">
											<?=banner('end')?>
										</div>
										<span>종료예정 과정</span>
										<strong id="end_num">1</strong>
									</div>
								</a>

								<a href="<?php echo site_url('classroom/complete_class'); ?>">
									<div class="contents_top_middle_bottom_box graduation">
										<div class="bottom_box_img">
											<?=banner('graduation')?>
										</div>
										<span>수강완료 과정</span>
										<strong id="graduation_num">0</strong>
									</div>
								</a>
							</div>

						</div>


						<div class="contents_top_right">
							<div class="contents_top_right_top_box">
								<strong>랭킹 정보</strong>

								<table>
									<tr>
										<th>순위</th>
										<th>이름</th>
										<th>수강률</th>
									</tr>
									<tr>
										<td><span id="1st_rank">1</span></td>
										<td><span id="1st_name">김철수</span></td>
										<td><span id="1st_enroll_rate">80</span>%</td>
									</tr>
									<tr class="on">
										<td><span id="2nd_rank">2</span></td>
										<td><span id="2nd_name"><?php echo html_escape($this->member->item('mem_nickname')); ?></span></td>
										<td><span id="2nd_enroll_rate">72</span>%</td>
									</tr>
									<tr>
										<td><span id="3rd_rank">3</span></td>
										<td><span id="3rd_name">김영희</span></td>
										<td><span id="3rd_enroll_rate">72</span>%</td>
									</tr>
									
								</table>

								<a href="#">
									<?=banner('plus')?>
								</a>
							</div>

							<div class="contents_top_right_bottom_box">
								<span>평균 수강률</span>

								<div class="enroll_rate_bar">
									<div class="enroll_rate_bar_fill" style="width: 80%;"></div>
								</div>

								<span id="enroll_rate">80</span>%
							</div>

						</div>
					</div>
					<div class="dashboard_main_contents_bottom">
						<div class="contents_bottom_left">

							<div class="notice_box">
								<div class="panel">
									<div class="panel-heading">
										컬래버랜드 공지사항 
										<div class="view-all pull-right">
											<a href="<?php echo site_url('board/notice'); ?>"><?=banner('plus')?></a>
										</div>
									</div>

									<div class="table-responsive">
										<div class="table_wrap">
											
											<a href="" class="table_row">
												<span>컬래버랜드 공지사항 제목입니다.</span>
												<span class="px80">2023.10.24</span>
											</a>

											<a href="" class="table_row">
												<span>컬래버랜드 공지사항 제목입니다. 컬래버랜드 공지사항 제목입니다.</span>
												<span class="px80">2023.09.27</span>
											</a>

											<a href="" class="table_row">
												<span>컬래버랜드 공지사항 제목입니다.</span>
												<span class="px80">2023.08.13</span>
											</a>
											
										</div>
									</div>
								</div>
							</div>

							<div class="notice_box">
								<div class="panel">
									<div class="panel-heading">
										<?=busiNm($this->member->item('company_idx'))?> 공지사항
										<div class="view-all pull-right">
											<a href="<?php echo site_url('board/cnotice'); ?>"><?=banner('plus')?></a>
										</div>
									</div>

									<div class="table-responsive">
										<div class="table_wrap">
											
											<a href="" class="table_row">
												<span>기업 공지사항 제목입니다.</span>
												<span class="px80">2023.10.24</span>
											</a>

											<a href="" class="table_row">
												<span>기업 공지사항 제목입니다. 기업 공지사항 제목입니다. 기업 공지사항 제목입니다.</span>
												<span class="px80">2023.09.27</span>
											</a>

											<a href="" class="table_row">
												<span>기업 공지사항 제목입니다.</span>
												<span class="px80">2023.08.13</span>
											</a>
											
										</div>
									</div>

								</div>
							</div>

						</div>
						<div class="contents_bottom_middle">

							<div class="link_box">
								<a href="<?php echo site_url('board/qna'); ?>">컬래버랜드 문의 바로가기</a>
							</div>

							<div class="link_box company">
								<a href="<?php echo site_url('board/cqna'); ?>"><?=busiNm($this->member->item('company_idx'))?> 문의 바로가기</a>
							</div>

							<div class="link_box faq">
								<a href="<?php echo site_url('faq/faq'); ?>">FAQ 바로가기</a>
							</div>

						</div>
						<div class="contents_bottom_right">
							<div class="dashboard_adv_box">
								<?=banner('dashboard_adv')?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>




<script type="text/javascript">
	$(document).ready(function() {

		var user_info = <?php echo json_encode($user_info) ?>;
		console.log(user_info);

		// asmo sh 231114 대시보드 페이지 디자인 상 헤더, 사이드바, 푸터 숨김 처리 스크립트
		$('header').addClass('dn');
		$('.navbar').addClass('dn');
		// $('.sidebar').addClass('dn');
		$('footer').addClass('dn');

		$('.main').addClass('add');


		// asmo sh 231120 대시보드 메인 페이지 상단 좌측 상태명 수정 스크립트
		$('.contents_top_left_info_stateMsg button').on('click', function() {
			toggleEditMode();
		});

		$('.contents_top_left_info_stateMsg input').on('keyup', function(event) {
			if (event.key === 'Enter') {
				updateStateName();
			}
		});

		function toggleEditMode() {
			var spanElement = $('.contents_top_left_info_stateMsg span');
			var inputElement = $('.contents_top_left_info_stateMsg input');

			if (spanElement.is(':visible')) {
				
				spanElement.hide();
				inputElement.val(spanElement.text()).show().focus();
			} else {
				
				updateStateName();
			}
		}

		function updateStateName() {
			var stateName = $('.contents_top_left_info_stateMsg input').val().trim();
			var spanElement = $('.contents_top_left_info_stateMsg span');

			if (stateName !== '') {
				spanElement.text(stateName).show();
				$('.contents_top_left_info_stateMsg input').hide();
			}
		}
	});
</script>