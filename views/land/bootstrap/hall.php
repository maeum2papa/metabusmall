<?php

?>
<div style="width: 100%; height: 200px; background-color: #F7B9BA">홀</div>

<script type="text/javascript">
	// asmo sh 231114 랜딩 페이지 디자인 상 헤더, 사이드바, 푸터 숨김 처리 스크립트
	$(document).ready(function() {
		$('header').addClass('dn');
		$('.navbar').addClass('dn');
		$('.sidebar').addClass('dn');
		$('footer').addClass('dn');

		$('.main').addClass('add');
	});
</script>