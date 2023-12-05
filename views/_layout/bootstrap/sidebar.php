<!-- sidebar start -->
<?php
// $this->load->view(element('layout_skin_path', $layout) . '/box/login');
// $this->load->view(element('layout_skin_path', $layout) . '/box/latest');
// $this->load->view(element('layout_skin_path', $layout) . '/box/tagcloud');
?>

<!-- asmo sh 231120 사이드바 생성 -->
<div id="asmo_sidebar">
    <div class="sidebar_wrap">
        <section class="sidebar_header">
            <a href="<?php echo site_url('dashboard'); ?>" class="sidebar_logo">
                <img src="<?=busiIcon($this->member->item('company_idx'))?>" alt="기업 로고">
            </a>
            <div class="sidebar_userInfo">
                <div class="sidebar_userInfo_img">
                    <div class="userInfo_img_wrap">
                        <!-- 이 곳에 사이드바 이미지 넣으시면 됩니다! -->
                        <img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/preview/<?php echo html_escape($this->member->item('mem_id')); ?>_preview.png?v=<?php echo mt_rand(); ?>" alt="preview_img">
                    </div>

                    <!-- <button class="chat_menu">
                        <?=banner('chat')?>
                    </button> -->
                </div>
                <div class="sidebar_userInfo_name">
                    <span><?php echo html_escape($this->member->item('mem_nickname')); ?></span>
                </div>
                <div class="sidebar_userInfo_menu">
                    <a href="" class="alarm_menu"><img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/sidebar/alarm_icon.svg" alt="alarm_icon"></a>
                    <a href="" class="chat_menu"><img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/sidebar/chat_icon.svg" alt="chat_icon"></a>
                    <a href="" class="class_menu"><img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/sidebar/class_icon.svg" alt="class_icon"></a>
                </div>
                <div class="sidebar_userInfo_etc">
                    <div class="userInfo_etc">
                        <div class="etc_icon">
                            <?=banner('fruit')?>
                        </div>
                        <div class="etc_info">
                            <span>나의 열매 현황</span>
                            <div class="etc_info_box">
                                <span id="fruit_count"><?php echo html_escape($this->member->item('mem_cur_fruit')); ?></span>
                                개
                            </div>
                        </div>
                    </div>
                    <div class="userInfo_etc">
                        <div class="etc_icon">
                            <?=banner('ranking')?>
                        </div>
                        <div class="etc_info">
                            <span>나의 랭킹 현황</span>
                            <div class="etc_info_box">
                                <span id="rank_count"><?php echo html_escape($this->member->item('mem_ranking')); ?></span>
                                위
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="sidebar_contents">
            <div class="sidebar_menu">
                <ul>
                    <li id="officeland"><a href="<?php echo site_url('land/office'); ?>"><?=busiNm($this->member->item('company_idx'))?>랜드</a></li>
                    <li id="myland"><a href="<?php echo site_url('myland/space'); ?>">마이랜드</a></li>
                    <li id="classroom"><a href="<?php echo site_url('classroom'); ?>">클래스룸</a></li>
                    <li id="shop"><a href="<?php echo site_url('cmall'); ?>">SHOP</a></li>
                </ul>
            </div>
            <div class="sidebar_adv">
                <?=banner('sidebar_adv')?>
            </div>
        </section>

        <section class="sidebar_footer">
            <div class="sidebar_logout">
                <a href="<?php echo site_url('login/logout?url=' . urlencode(current_full_url())); ?>" title="로그아웃">
                    <?=banner('logout')?>로그아웃
                </a>
            </div>
        </section>

    </div>

    <button id="sidebar_close">
        <svg xmlns="http://www.w3.org/2000/svg" width="10.621" height="18.243" viewBox="0 0 10.621 18.243">
            <path id="패스_1186" data-name="패스 1186" d="M3574.5-4.48l-7,7,7,7" transform="translate(-3566.002 6.601)" fill="none" stroke="#fb8c00" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
        </svg>
    </button>
    
</div>

<button id="sidebar_open">메뉴 열기</button>

<script type="text/javascript">
	$(document).ready(function() {
		// asmo sh 231116 사이드바 버튼 토글 스크립트
		$("#sidebar_close").on('click', () => {
			$('#asmo_sidebar').addClass('active');

            // nav바 container
            $('nav .container').addClass('active');
            $('#search_layer').addClass('active');

            // 대시보드 메인 화면
			$('#asmo_dashboard_main .dashboard_main .dashboard_main_wrapper').addClass('active');

            // 공지사항 화면
            $('#asmo_list_wrapper').addClass('active');
            $('#asmo_post_wrapper').addClass('active');

            // 클래스룸 화면
            $('#asmo_classroom').addClass('active');

            $('#asmo_classroom #asmo_classroom_main section').addClass('active');
            $('#asmo_classroom_detail').addClass('active');
            $('#asmo_classroom_business').addClass('active');

            // shop
            $('#asmo_cmall').addClass('active');

            // 푸터
            $('footer').addClass('active');
		})

		$("#sidebar_open").on('click', () => {
			$('#asmo_sidebar').removeClass('active');

            // nav바 container
            $('nav .container').removeClass('active');
            $('#search_layer').removeClass('active');

            // 대시보드 메인 화면
			$('#asmo_dashboard_main .dashboard_main .dashboard_main_wrapper').removeClass('active');
            
            // 공지사항 화면
            $('#asmo_list_wrapper').removeClass('active');
            $('#asmo_post_wrapper').removeClass('active');

            // 클래스룸
            $('#asmo_classroom').removeClass('active');

            $('#asmo_classroom #asmo_classroom_main section').removeClass('active');
            $('#asmo_classroom_detail').removeClass('active');
            $('#asmo_classroom_business').removeClass('active');

            // shop
            $('#asmo_cmall').removeClass('active');

            // 푸터
            $('footer').removeClass('active');
		})
	});
</script>
<!-- sidebar end -->
