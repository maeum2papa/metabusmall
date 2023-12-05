<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<?php if ($this->cbconfig->get_device_view_type() === 'desktop' && $this->cbconfig->get_device_type() === 'mobile') { ?>
<meta name="viewport" content="width=1000">
<?php } else { ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php } ?>
<title><?php echo html_escape(element('page_title', $layout)); ?></title>
<?php if (element('meta_description', $layout)) { ?><meta name="description" content="<?php echo html_escape(element('meta_description', $layout)); ?>"><?php } ?>
<?php if (element('meta_keywords', $layout)) { ?><meta name="keywords" content="<?php echo html_escape(element('meta_keywords', $layout)); ?>"><?php } ?>
<?php if (element('meta_author', $layout)) { ?><meta name="author" content="<?php echo html_escape(element('meta_author', $layout)); ?>"><?php } ?>
<?php if (element('favicon', $layout)) { ?><link rel="shortcut icon" type="image/x-icon" href="<?php echo element('favicon', $layout); ?>" /><?php } ?>
<?php if (element('canonical', $view)) { ?><link rel="canonical" href="<?php echo element('canonical', $view); ?>" /><?php } ?>
<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" />
<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo element('layout_skin_url', $layout); ?>/css/style.css" />
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/earlyaccess/nanumgothic.css" />
<link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css" />


<!-- asmo sh 231113 seum_custom.css, 폰트 cdn, swiper link cdn 추가 -->
<link href="https://webfontworld.github.io/NexonLv2Gothic/NexonLv2Gothic.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo element('layout_skin_url', $layout); ?>/css/seum_custom.css" />

<link
	rel="stylesheet"
	href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>
<!-- //asmo sh 231113 seum_custom.css, 폰트 cdn, swiper link cdn 추가 -->


<?php echo $this->managelayout->display_css(); ?>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
// 자바스크립트에서 사용하는 전역변수 선언
var cb_url = "<?php echo trim(site_url(), '/'); ?>";
var cb_cookie_domain = "<?php echo config_item('cookie_domain'); ?>";
var cb_charset = "<?php echo config_item('charset'); ?>";
var cb_time_ymd = "<?php echo cdate('Y-m-d'); ?>";
var cb_time_ymdhis = "<?php echo cdate('Y-m-d H:i:s'); ?>";
var layout_skin_path = "<?php echo element('layout_skin_path', $layout); ?>";
var view_skin_path = "<?php echo element('view_skin_path', $layout); ?>";
var is_member = "<?php echo $this->member->is_member() ? '1' : ''; ?>";
var is_admin = "<?php echo $this->member->is_admin(); ?>";
var cb_admin_url = <?php echo $this->member->is_admin() === 'super' ? 'cb_url + "/' . config_item('uri_segment_admin') . '"' : '""'; ?>;
var cb_board = "<?php echo isset($view) ? element('board_key', $view) : ''; ?>";
var cb_board_url = <?php echo ( isset($view) && element('board_key', $view)) ? 'cb_url + "/' . config_item('uri_segment_board') . '/' . element('board_key', $view) . '"' : '""'; ?>;
var cb_device_type = "<?php echo $this->cbconfig->get_device_type() === 'mobile' ? 'mobile' : 'desktop' ?>";
var cb_csrf_hash = "<?php echo $this->security->get_csrf_hash(); ?>";
var cookie_prefix = "<?php echo config_item('cookie_prefix'); ?>";
</script>
<!--[if lt IE 9]>
<script type="text/javascript" src="<?php echo base_url('assets/js/html5shiv.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/respond.min.js'); ?>"></script>
<![endif]-->
<script type="text/javascript" src="<?php echo base_url('assets/js/common.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.validate.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.validate.extension.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/sideview.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/js.cookie.js'); ?>"></script>


<!-- asmo sh 231113 swiper script cdn 추가 -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<!-- //asmo sh 231113 swiper script cdn 추가 -->


<?php echo $this->managelayout->display_js(); ?>
</head>
<body <?php echo isset($view) ? element('body_script', $view) : ''; ?>>
<div class="wrapper">

	<?php if ($this->cbconfig->get_device_view_type() !== 'mobile') {?>
		<!-- header start -->
		<header class="header">.

			<div class="container">
				<ul class="header-top-menu">
					<?php if ($this->member->is_admin() === 'super' || $this->session->userdata['mem_admin_flag'] == 1) { ?>
						<li><i class="fa fa-cog"></i><a href="<?php echo site_url(config_item('uri_segment_admin')); ?>" title="관리자 페이지로 이동">관리자</a></li>
					<?php } ?>
					<?php
					if ($this->member->is_member()) {
						if ($this->cbconfig->item('use_notification')) {
					?>
						<li class="notifications"><i class="fa fa-bell-o"></i>알림 <span class="badge notification_num"><?php echo number_format((int) element('notification_num', $layout)); ?></span>
							<div class="notifications-menu"> </div>
						</li>
						<script type="text/javascript">
						//<![CDATA[
						$(document).mouseup(function (e)
						{
							var noticontainer = $('.notifications-menu');

							if ( ! noticontainer.is(e.target) // if the target of the click isn't the container...
								&& noticontainer.has(e.target).length === 0) // ... nor a descendant of the container
							{
								noticontainer.hide();
							}
						});
						//]]>
						</script>
					<?php
						}
					?>
						<li><i class="fa fa-sign-out"></i><a href="<?php echo site_url('login/logout?url=' . urlencode(current_full_url())); ?>" title="로그아웃">로그아웃</a></li>
						<li><i class="fa fa-user"></i><a href="<?php echo site_url('mypage'); ?>" title="마이페이지">마이페이지</a></li>
					<?php } else { ?>
						<li><i class="fa fa-sign-in"></i><a href="<?php echo site_url('login?url=' . urlencode(current_full_url())); ?>" title="로그인">로그인</a></li>
						<!--li><i class="fa fa-user"></i><a href="<?php echo site_url('register'); ?>" title="회원가입">회원가입</a></li-->
					<?php } ?>
					<?php if ($this->cbconfig->item('open_currentvisitor')) { ?>
						<li><i class="fa fa-link"></i><a href="<?php echo site_url('currentvisitor'); ?>" title="현재접속자">현재접속자</a> <span class="badge"><?php echo element('current_visitor_num', $layout); ?></span></li>
					<?php } ?>
				</ul>
			</div>
		<!-- header-content end -->
		</header>

<?php } else {?>

	<div class="header_line"></div>

<?php } ?>

	<!-- nav start -->
	<nav class="navbar navbar-default">
		<div class="container">

		<!-- asmo sh 231122 디자인 상 div.navbar-header 불필여하여 dn 처리 -->
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header dn">
				<button type="button" class="navbar-toggle collapsed" <?php if ($this->cbconfig->get_device_view_type() !== 'mobile') {?>data-toggle="collapse" data-target="#topmenu-navbar-collapse" <?php } ?> id="btn_side">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="<?php echo site_url(); ?>" class="navbar-brand" title="<?php echo html_escape($this->cbconfig->item('site_title'));?>"><?php echo $this->cbconfig->item('site_logo'); ?></a>
			</div>
		<!-- //asmo sh 231122 디자인 상 div.navbar-header 불필여하여 dn 처리 -->

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="topmenu-navbar-collapse">
				<ul class="nav navbar-nav navbar-right">	

					<!-- asmo sh 231122 전체 카테고리 nav 바 생성 -->
					<li class="dropdown all">
						<a href="javascript:;">
							<img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/classroom/category.svg" alt="category">
							전체 카테고리
						</a>
						<ul class="dropdown-menu nav navbar-nav">
						<?php
						$menuhtml = '';
						if (element('menu', $layout)) {
							$menu = element('menu', $layout);
							if (element(0, $menu)) {
								foreach (element(0, $menu) as $mkey => $mval) {
									if (element(element('men_id', $mval), $menu)) {
										$mlink = element('men_link', $mval) ? element('men_link', $mval) : 'javascript:;';
										$menuhtml .= '<li>
										<span ' . element('men_custom', $mval);
										if (element('men_target', $mval)) {
											$menuhtml .= ' target="' . element('men_target', $mval) . '"';
										}
										$menuhtml .= ' title="' . html_escape(element('men_name', $mval)) . '">' . html_escape(element('men_name', $mval)) . '</span>
										<ul>';

										foreach (element(element('men_id', $mval), $menu) as $skey => $sval) {
											$slink = element('men_link', $sval) ? element('men_link', $sval) : 'javascript:;';
											$menuhtml .= '<li><a href="' . $slink . '" ' . element('men_custom', $sval);
											if (element('men_target', $sval)) {
												$menuhtml .= ' target="' . element('men_target', $sval) . '"';
											}
											$menuhtml .= ' title="' . html_escape(element('men_name', $sval)) . '">' . html_escape(element('men_name', $sval)) . '</a></li>';
										}
										$menuhtml .= '</ul></li>';

									} else {
										$mlink = element('men_link', $mval) ? element('men_link', $mval) : 'javascript:;';
										$menuhtml .= '<li><span ' . element('men_custom', $mval);
										if (element('men_target', $mval)) {
											$menuhtml .= ' target="' . element('men_target', $mval) . '"';
										}
										$menuhtml .= ' title="' . html_escape(element('men_name', $mval)) . '">' . html_escape(element('men_name', $mval)) . '</span></li>';
									}
								}
							}
						}
						echo $menuhtml;
						?>
						</ul>
					</li>		
					<!-- //asmo sh 231122 전체 카테고리 nav 바 생성 -->


					<!-- asmo sh 231123 디자인 상 커스텀 필요하여 nav 바 탑 메뉴 생성 및 div.dropdown-menu-wrap 생성 -->
					<?php
					$menuhtml = '';
					if (element('menu', $layout)) {
						$menu = element('menu', $layout);
						if (element(0, $menu)) {
							foreach (element(0, $menu) as $mkey => $mval) {
								if (element(element('men_id', $mval), $menu)) {
									$mlink = element('men_link', $mval) ? element('men_link', $mval) : 'javascript:;';
									$men_name = html_escape(element('men_name', $mval));
									$menuhtml .= '<li class="dropdown">
									<a href="' . $mlink . '" ' . element('men_custom', $mval);
									if (element('men_target', $mval)) {
										$menuhtml .= ' target="' . element('men_target', $mval) . '"';
									}
									$menuhtml .= ' title="' . html_escape(element('men_name', $mval)) . '">' . html_escape(element('men_name', $mval)) . '</a>
									<ul class="dropdown-menu"><span>' . html_escape(element('men_name', $mval)) . '</span><div class="dropdown-menu-wrap">';

									foreach (element(element('men_id', $mval), $menu) as $skey => $sval) {
										$slink = element('men_link', $sval) ? element('men_link', $sval) : 'javascript:;';
										$menuhtml .= '<li><a href="' . $slink . '" ' . element('men_custom', $sval);
										if (element('men_target', $sval)) {
											$menuhtml .= ' target="' . element('men_target', $sval) . '"';
										}
										$menuhtml .= ' title="' . html_escape(element('men_name', $sval)) . '">' . html_escape(element('men_name', $sval)) . '</a></li>';
									}
									$menuhtml .= '</div></ul></li>';

								} else {
									$mlink = element('men_link', $mval) ? element('men_link', $mval) : 'javascript:;';
									$menuhtml .= '<li><a href="' . $mlink . '" ' . element('men_custom', $mval);
									if (element('men_target', $mval)) {
										$menuhtml .= ' target="' . element('men_target', $mval) . '"';
									}
									$menuhtml .= ' title="' . html_escape(element('men_name', $mval)) . '">' . html_escape(element('men_name', $mval)) . '</a></li>';
								}
							}
						}
					}
					echo $menuhtml;
					?>
					<!-- //asmo sh 231123 디자인 상 커스텀 필요하여 nav 바 탑 메뉴 생성 및 div.dropdown-menu-wrap 생성 -->

				</ul>

				<!-- asmo sh 231122 디자인 상 nav바 검색버튼 ul 옆으로 재배치 및 검색창 삭제 후 검색 버튼 생성 -->
				<div class="nav_search_box">
					<button><img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/classroom/search.svg" alt="search"></button>
					<script type="text/javascript">
					//<![CDATA[
					$(function() {
						$('#topmenu-navbar-collapse .dropdown').hover(function() {
							$(this).addClass('open');
						}, function() {
							$(this).removeClass('open');
						});


						// 검색 버튼
						$('.nav_search_box button').click(function() {
							$('#search_layer').fadeIn();
						});

						// 취소 버튼
						$('#search_layer button').click(function() {
							$('#search_layer').fadeOut();
						});

						// 검색창 외 영역 클릭 시 검색창 닫기

						
					});
					function headerSearch(f) {
						var skeyword = f.skeyword.value.replace(/(^\s*)|(\s*$)/g,'');
						if (skeyword.length < 2) {
							alert('2글자 이상으로 검색해 주세요');
							f.skeyword.focus();
							return false;
						}
						return true;
					}
					//]]>
					</script>
				</div>
				<!-- //asmo sh 231122 디자인 상 nav바 검색버튼 ul 옆으로 재배치 -->

			</div><!-- /.navbar-collapse -->
		</div>

		<!-- asmo sh 231123 검색 버튼 누르면 나오는 검색창 레이어 팝업 -->
		<div class="search_layer" id="search_layer">
			<div class="search_layer_wrap">
				<div class="search_layer_header">
					<form class="navbar-form navbar-right" name="header_search" id="header_search" action="<?php echo site_url('search'); ?>" onSubmit="return headerSearch(this);">
						<div class="form-group">
							<input type="text" class="form-control px150" placeholder="어떤 강의를 찾으시나요?" name="skeyword" accesskey="s" />
							
						</div>
					</form>
					<button><img src="<?php echo element('layout_skin_url', $layout); ?>/seum_img/classroom/cancel.svg" alt="cancel"></button>
				</div>
				<div class="search_layer_body">
					<div class="layer_body_box">
						<span>추천 검색어</span>
						<div class="reco_word">
							<a href="<?php echo site_url('classroom/business_class'); ?>">블렌더</a>
							<a href="<?php echo site_url('classroom/business_class'); ?>">4차 산업</a>
							<a href="<?php echo site_url('classroom/business_class'); ?>">금융경제</a>
							<a href="<?php echo site_url('classroom/business_class'); ?>">CS</a>
							<a href="<?php echo site_url('classroom/business_class'); ?>">성과관리</a>
							<a href="<?php echo site_url('classroom/business_class'); ?>">마케팅</a>
							<a href="<?php echo site_url('classroom/business_class'); ?>">직무역량 기타</a>
							<a href="<?php echo site_url('classroom/business_class'); ?>">유통/물류</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</nav>
	<!-- nav end --> <!-- header end -->

	<!-- main start -->
	<div class="main">
		<div class="container">
			<div class="row">

				<?php if (element('use_sidebar', $layout)) {?>
					<div class="col-md-9 col-sm-8 col-xs-12 mb20">
				<?php } ?>

				<!-- 본문 시작 -->
				<?php if (isset($yield))echo $yield; ?>
				<!-- 본문 끝 -->

				<?php if (element('use_sidebar', $layout)) {?>
					</div>
					<div class="col-md-3 col-sm-4 col-xs-12">
						<div class="sidebar">
							<!-- 사이드바 시작 -->
							<?php $this->load->view(element('layout_skin_path', $layout) . '/sidebar'); ?>
							<!-- 사이드바 끝 -->
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<!-- main end -->

	<!-- footer start -->
	<footer>

		<!-- asmo sh 231121 footer 내 div.container dn 처리 후 디자인에 맞게 재배치 및 일단 하드코딩으로 관리 -->

		<div class="container">
			<div class="footer_logo">
				<a href=""><?=banner('login_logo')?></a>
			</div>

			<div class="company_info_box">
				<div class="company_info">
					<b>(주) 팀메타</b>
					<span>서울특별시 금천구 가산디지털1로 196, 303호</span>
				</div>

				<div class="company_info">
					<span>사업자등록번호 722-81-02408</span>
				</div>

				<div class="company_info">
					<span>대표번호 1877-1630</span>
					<span>FAX 02-838-1631</span>
				</div>
			</div>
		</div>

		<div class="container dn">
			<div>
				<ul class="company">
					<li><a href="<?php echo document_url('aboutus'); ?>" title="회사소개">회사소개</a></li>
					<li><a href="<?php echo document_url('provision'); ?>" title="이용약관">이용약관</a></li>
					<li><a href="<?php echo document_url('privacy'); ?>" title="개인정보 취급방침">개인정보 취급방침</a></li>
					<!--li><a href="<?php echo site_url('pointranking'); ?>" title="포인트 전체랭킹">포인트 전체랭킹</a></li>
					<li><a href="<?php echo site_url('pointranking/month'); ?>" title="포인트 월별랭킹">포인트 월별랭킹</a></li>
					<li><a href="<?php echo site_url('levelup'); ?>" title="레벨업">레벨업</a></li-->
				</ul>
			</div>
			<div class="copyright">
				<?php if ($this->cbconfig->item('company_address')) { ?>
					<span><?php echo $this->cbconfig->item('company_address'); ?>
						<?php if ($this->cbconfig->item('company_zipcode')) { ?>(우편 <?php echo $this->cbconfig->item('company_zipcode'); ?>)<?php } ?>
					</span>
				<?php } ?>
				<?php if ($this->cbconfig->item('company_owner')) { ?><span><b>대표</b> <?php echo $this->cbconfig->item('company_owner'); ?></span><?php } ?>
				<?php if ($this->cbconfig->item('company_phone')) { ?><span><b>전화</b> <?php echo $this->cbconfig->item('company_phone'); ?></span><?php } ?>
				<?php if ($this->cbconfig->item('company_fax')) { ?><span><b>팩스</b> <?php echo $this->cbconfig->item('company_fax'); ?></span><?php } ?>
			</div>
			<div class="copyright">
				<?php if ($this->cbconfig->item('company_reg_no')) { ?><span><b>사업자</b> <?php echo $this->cbconfig->item('company_reg_no'); ?></span><?php } ?>
				<?php if ($this->cbconfig->item('company_retail_sale_no')) { ?><span><b>통신판매</b> <?php echo $this->cbconfig->item('company_retail_sale_no'); ?></span><?php } ?>
				<?php if ($this->cbconfig->item('company_added_sale_no')) { ?><span><b>부가통신</b> <?php echo $this->cbconfig->item('company_added_sale_no'); ?></span><?php } ?>
				<?php if ($this->cbconfig->item('company_admin_name')) { ?><span><b>정보관리책임자명</b> <?php echo $this->cbconfig->item('company_admin_name'); ?></span><?php } ?>
				<span>Copyright&copy; <?php echo html_escape($this->cbconfig->item('site_title')); ?>. All Rights Reserved.</span>
			</div>
			<?php
			if ($this->cbconfig->get_device_view_type() === 'mobile') {
			?>
				<div class="see_mobile"><a href="<?php echo current_full_url(); ?>" class="btn btn-primary btn-xs viewpcversion">PC 버전으로 보기</a></div>
			<?php
			} else {
				if ($this->cbconfig->get_device_type() === 'mobile') {
			?>
				<div class="see_mobile"><a href="<?php echo current_full_url(); ?>" class="btn btn-primary btn-lg viewmobileversion" style="width:100%;font-size:5em;">모바일 버전으로 보기</a></div>
			<?php
				} else {
			?>
				<div class="see_mobile"><a href="<?php echo current_full_url(); ?>" class="btn btn-primary btn-xs viewmobileversion">모바일 버전으로 보기</a></div>
			<?php
				}
			}
			?>
		</div>
	</footer>
	<!-- footer end -->
</div>

<?php if ($this->cbconfig->get_device_view_type() === 'mobile') {?>
<div id="side_menu">
	<div class="side_wr add_side_wr">
		<div id="isroll_wrap" class="side_inner_rel">
			<div class="side_inner_abs">
				<div class="m_search">
					<form name="mobile_header_search" id="mobile_header_search" action="<?php echo site_url('search'); ?>" onSubmit="return headerSearch(this);">
						<input type="text" placeholder="Search" class="form-control per80" name="skeyword" accesskey="s" />
					</form>
				</div>
				<div class="m_login">
					<?php if ($this->member->is_member()) { ?>
						<span><a href="<?php echo site_url('login/logout?url=' . urlencode(current_full_url())); ?>" class="btn btn-primary btn-xs" title="로그아웃"> <i class="fa fa-sign-out"></i> 로그아웃 </a></span>
						<span><a href="<?php echo site_url('mypage'); ?>" class="btn btn-primary btn-xs" title="마이페이지"> <i class="fa fa-user"></i> 마이페이지 </a></span>
					<?php } else { ?>
						<span><a href="<?php echo site_url('login?url=' . urlencode(current_full_url())); ?>" class="btn btn-primary btn-xs" title="로그인"> <i class="fa fa-sign-in"></i> 로그인 </a></span>
						<span><a href="<?php echo site_url('register'); ?>" class="btn btn-primary btn-xs" title="회원가입"> <i class="fa fa-user"></i> 회원가입 </a></span>
					<?php } ?>
				</div>
				<ul class="m_board">
					<?php if ($this->cbconfig->item('open_currentvisitor')) { ?>
						<li><a href="<?php echo site_url('currentvisitor'); ?>" title="현재 접속자"><span class="fa fa-link"></span> 현재 접속자</a></li>
					<?php } ?>
					<?php if ($this->member->is_member()) { ?>
						<li><a href="<?php echo site_url('notification'); ?>" title="나의 알림"><span class="fa fa-bell-o"></span>알림 : <?php echo number_format((int) element('notification_num', $layout)); ?> 개</a></li>
						<?php if ($this->cbconfig->item('use_note') && $this->member->item('mem_use_note')) { ?>
							<li><a href="javascript:;" onClick="note_list();" title="나의 쪽지"><span class="fa fa-envelope"></span> 쪽지 : <?php echo number_format((int) $this->member->item('meta_unread_note_num')); ?> 개</a></li>
						<?php } ?>
						<?php if ($this->cbconfig->item('use_point')) { ?>
							<li><a href="<?php echo site_url('mypage/point'); ?>" title="나의 포인트"><span class="fa fa-gift"></span> 포인트 : <?php echo number_format((int) $this->member->item('mem_point')); ?> 점</a></li>
						<?php } ?>
					<?php } ?>
				</ul>
				<ul class="m_menu">
					<?php
					$menuhtml = '';
					if (element('menu', $layout)) {
						$menu = element('menu', $layout);
						if (element(0, $menu)) {
							foreach (element(0, $menu) as $mkey => $mval) {
								if (element(element('men_id', $mval), $menu)) {
									$menuhtml .= '<li class="dropdown">
									<a href="' . element('men_link', $mval) . '" ' . element('men_custom', $mval);
									if (element('men_target', $mval)) {
										$menuhtml .= ' target="' . element('men_target', $mval) . '"';
									}
									$menuhtml .= ' class="text_link" title="' . html_escape(element('men_name', $mval)) . '">' . html_escape(element('men_name', $mval)) . '</a><a href="#" style="width:25px;float:right;" class="subopen" data-menu-order="' . $mkey . '"><i class="fa fa-caret-down"></i></a>
									<ul class="dropdown-custom-menu drop-downorder-' . $mkey . '">';

									foreach (element(element('men_id', $mval), $menu) as $skey => $sval) {
										$menuhtml .= '<li><a href="' . element('men_link', $sval) . '" ' . element('men_custom', $sval);
										if (element('men_target', $sval)) {
											$menuhtml .= ' target="' . element('men_target', $sval) . '"';
										}
										$menuhtml .= ' title="' . html_escape(element('men_name', $sval)) . '">' . html_escape(element('men_name', $sval)) . '</a></li>';
									}
									$menuhtml .= '</ul></li>';

								} else {
									$menuhtml .= '<li><a class="text_link" href="' . element('men_link', $mval) . '" ' . element('men_custom', $mval);
									if (element('men_target', $mval)) {
										$menuhtml .= ' target="' . element('men_target', $mval) . '"';
									}
									$menuhtml .= ' title="' . html_escape(element('men_name', $mval)) . '">' . html_escape(element('men_name', $mval)) . '</a></li>';
								}
							}
						}
					}
					echo $menuhtml;
					?>
				</ul>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.hoverIntent.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.ba-outside-events.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/iscroll.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/mobile.sidemenu.js'); ?>"></script>

<?php } ?>

<script type="text/javascript">
$(document).on('click', '.viewpcversion', function(){
	Cookies.set('device_view_type', 'desktop', { expires: 1 });
});
$(document).on('click', '.viewmobileversion', function(){
	Cookies.set('device_view_type', 'mobile', { expires: 1 });
});
</script>
<?php echo element('popup', $layout); ?>
<?php echo $this->cbconfig->item('footer_script'); ?>
<!--
Layout Directory : <?php echo element('layout_skin_path', $layout); ?>,
Layout URL : <?php echo element('layout_skin_url', $layout); ?>,
Skin Directory : <?php echo element('view_skin_path', $layout); ?>,
Skin URL : <?php echo element('view_skin_url', $layout); ?>,
-->
</body>
</html>
