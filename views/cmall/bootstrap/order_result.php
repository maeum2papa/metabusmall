<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css');
?>


<!-- asmo sh 231215 shop div#order-result 감싸는 div#asmo_cmall 생성  -->

<div id="asmo_cmall">
	<div id="order-result">

		<!-- asmo sh 231215 디자인 상 장바구니, 구매내역 버튼 필요하여 div.cmall_orderlist_top_box 생성  -->
		<div class="cmall_orderlist_top_box">
				
			<strong>주문상세내역</strong>

			<div class="orderlist_top_flex_box">
				<a href="/cmall/wishlist">찜하기목록으로 <?=banner('heart_color')?></a>
				<a href="/cmall/cart">장바구니 <?=banner('cart')?></a>
				<a href="/cmall/orderlist">구매내역 <?=banner('purchase_history')?></a>
			</div>
			
		</div>
	

		
		<ul class="prd-list">

			<!-- asmo sh 231215 디자인 상 열매상품, 코인상품 나타내는 함수 자리 옮김 -->
			<?php if($view['data']['cor_pay_type']=='f'){?>
				<h3>열매상품</h3>
			<?php }else if($view['data']['cor_pay_type']=='c'){?>
				<h3>코인상품</h3>
			<?php }?>

			<?php
			$total_price_sum = 0;
			if (element('orderdetail', $view)) {
				foreach (element('orderdetail', $view) as $result) {
			?>
				<li>

					<!-- asmo sh 231215 디자인 상 li 내 div들 재배치 -->
					<div class="col-xs-12 col-md-9 prd-info">
						<a href="<?php echo cmall_item_url(element('cit_key', element('item', $result))); ?>" title="<?php echo html_escape(element('cit_name', element('item', $result))); ?>"><?php echo html_escape(element('cit_name', element('item', $result))); ?></a>


						<div class="order_info_box">

							<!-- asmo sh 231215 썸네일 이미지 style 삭제 -->
							<div class="prd-img"><a href="<?php echo cmall_item_url(element('cit_key', element('item', $result))); ?>" title="<?php echo html_escape(element('cit_name', element('item', $result))); ?>" ><img src="<?php echo thumb_url('cmallitem', element('cit_file_1', element('item', $result)), 60, 60); ?>" class="thumbnail"  alt="<?php echo html_escape(element('cit_name', element('item', $result))); ?>" title="<?php echo html_escape(element('cit_name', element('item', $result))); ?>" /></a></div>
							
							<div class="order_option_box">
								<ul class="cmall-options">
									<?php
									$total_num = 0;
									$total_price = 0;
									foreach (element('itemdetail', $result) as $detail) {
									?>
										<li>
											<i class="fa fa-angle-right" aria-hidden="true"></i>
											<?php
											if (element('cor_status', element('data', $view)) === '1') {
												if (element('possible_download', element('item', $result))) {
											?>
												<!-- <a href="<?php echo site_url('cmallact/download/' . element('cor_id', element('data', $view)) . '/' . element('cde_id', $detail));?>" type="button" name="download" class="btn btn-xs btn-info"><i class="fa fa-download" aria-hidden="true"></i> 다운로드</a> -->
											<?php } else { ?>
												<button type="button" class="btn btn-xs btn-default disabled ">다운로드 기간 완료</button>
											<?php
												}
											} else {
											?>
												<button type="button" class="btn btn-xs btn-warning">입금확인중</button>
											<?php
											}
											?>
											<?php echo html_escape(element('cde_title', $detail)) . ' ' . element('cod_count', $detail);?>개 (+<?php
											if($view['data']['cor_pay_type'] == 'f'){
												echo number_format(element('cde_price', $detail) / $view['data']['company_coin_value']);
											}else if($view['data']['cor_pay_type'] == 'c'){
												echo number_format(element('cde_price', $detail));
											}
											?>개)
										</li>
									<?php
										$total_num += element('cod_count', $detail);
										$total_price += ((int) element('cit_price', element('item', $result)) + (int) element('cde_price', $detail)) * element('cod_count', $detail);
									}
									$total_price_sum += $total_price;
									?>
								</ul>
								<div class="col-xs-12 col-md-3 prd-price">
									<div><span>수량 :</span> <?php echo number_format($total_num); ?> 개</div>
									<div><span>판매가 :</span> <?php
										if($view['data']['cor_pay_type'] == 'f'){
											echo number_format(element('cit_price', $detail) / $view['data']['company_coin_value']);
										}else if($view['data']['cor_pay_type'] == 'c'){
											echo number_format(element('cit_price', $detail));
										}
									?> 개</div>
									<div class="prd-total"><span>소계 :</span> <strong><?php
										if($view['data']['cor_pay_type'] == 'f'){
											echo number_format($total_price / $view['data']['company_coin_value']);
										}else if($view['data']['cor_pay_type'] == 'c'){
											echo number_format($total_price);
										}
									?><input type="hidden" name="total_price[<?php echo element('cit_id', element('item', $result)); ?>]" value="<?php echo $total_price; ?>" /></strong> 개</div>
									
									<!-- 디자인 상 다운로드 관련 텍스트 불필요하여 주석 처리 -->
									<!-- <div>
										<span>다운로드 :</span>
										<?php
										if (element('cod_download_days', $detail)) {
											echo '구매후 <strong>' . element('cod_download_days', $detail) . '</strong>일간';
											if( element('download_end_date', element('item', $result)) ){
												echo '<br>(~' . element('download_end_date', element('item', $result)) . ' 까지)';
											}
										} else {
											echo '기간제한없음';
										}
										?>
									</div> -->

								</div>
							</div>
						</div>

					</div>
				</li>
			<?php
				}
			}
			?>
		</ul>
	
		<!-- asmo sh 231215 결제정보, 주문자 정보, 배송지 정보 감싸는 div 생성 및 디자인 상 컨텐츠 재배치 -->
		<div class="order_fixed_box">
			<div class="credit row">
				<div class="col-xs-12 col-md-6">
					<div class="ord-info">
						<h5>결제정보</h5>
						<table class="table">
							<tbody>
								<tr>
									<th>주문번호</th>
									<td><?php echo element('cor_id', element('data', $view)); ?></td>
								</tr>
								<?php if (element('cor_approve_datetime', element('data', $view)) > '0000-00-00 00:00:00') { ?>
									<tr>
										<th>결제일시</th>
										<td><?php echo element('cor_approve_datetime', element('data', $view)); ?></td>
									</tr>
								<?php } ?>
								<?php if (element('cor_pay_type', element('data', $view)) === 'bank') {?>
									<tr>
										<th>입금자명</th>
										<td><?php echo html_escape(element('mem_realname', element('data', $view))); ?></td>
									</tr>
									<tr>
										<th>입금계좌</th>
										<td><?php echo nl2br(html_escape($this->cbconfig->item('payment_bank_info'))); ?></td>
									</tr>
								<?php } ?>
								<?php if (element('cor_pay_type', element('data', $view)) === 'card') {?>
									<tr>
										<th>승인번호</th>
										<td><?php echo html_escape(element('cor_app_no', element('data', $view))); ?></td>
									</tr>
								<?php } ?>
								<?php if (element('cor_pay_type', element('data', $view)) === 'phone') {?>
									<tr>
										<th>휴대폰번호</th>
										<td><?php echo html_escape(element('cor_app_no', element('data', $view))); ?></td>
									</tr>
								<?php } ?>
								<?php if (element('cor_pay_type', element('data', $view)) === 'vbank' OR element('cor_pay_type', element('data', $view)) === 'realtime') {?>
									<tr>
										<th>거래번호</th>
										<td><?php echo html_escape(element('cor_tno', element('data', $view))); ?></td>
									</tr>
								<?php } ?>
								<?php if (element('cor_pay_type', element('data', $view)) === 'card' OR element('cor_pay_type', element('data', $view)) === 'phone') {?>
									<tr>
										<th>영수증</th>
										<td>
										<?php if( $receipt_link_js = element('card_receipt_js', element('data', $view)) ){ ?>
										<script language="JavaScript" src="<?php echo $receipt_link_js; ?>"></script>
										<?php } ?>
										<a href="#" onclick="<?php echo element('card_receipt_script', element('data', $view)); ?>">영수증 출력</a>
									</td>
								</tr>
								<?php } ?>
								<?php if ( element('cor_pay_type', element('data', $view)) === 'vbank' ){	//가상계좌이면 ?>
									<tr>
										<th>입금계좌</th>
										<td><?php echo element('cor_bank_info', element('data', $view)); ?></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-xs-12 col-md-6 ">
					<div class="pay-info">
					<?php if($view['data']['cor_pay_type']=='f'){?>
						<h5>열매 결제합계</h5>
					<?php }else if($view['data']['cor_pay_type']=='c'){?>
						<h5>코인 결제상품</h5>
					<?php }?>
						<ul>

							<li>
								<span class="info-tit">총 주문액</span>
								<?php
								if($view['data']['cor_pay_type']=='f'){
									echo number_format(abs(element('cor_cash_request', element('data', $view)) / $view['data']['company_coin_value']));
								}else if($view['data']['cor_pay_type']=='c'){
									echo number_format(abs(element('cor_cash_request', element('data', $view))));
								}
								?> 개
							</li>
							<li>
								<span class="info-tit">미결제액</span>
								<?php
								$notyet = abs(element('cor_cash_request', element('data', $view))) - abs(element('cor_cash', element('data', $view)));
								if($view['data']['cor_pay_type']=='f'){
									echo number_format($notyet / $view['data']['company_coin_value']);
								}else if($view['data']['cor_pay_type']=='c'){
									echo number_format($notyet);
								}
								?> 개
							</li>
							<li>
								<span class="info-tit">결제액</span>
								<strong><?php
								if($view['data']['cor_pay_type']=='f'){
									echo number_format(abs(element('cor_cash', element('data', $view)) / $view['data']['company_coin_value']));
								}else if($view['data']['cor_pay_type']=='c'){
									echo number_format(abs(element('cor_cash', element('data', $view))));
								}
								?></strong> 개
							</li>
						</ul>
					</div>
				</div>
				<!-- 디자인 상 배송정보 div 불필요하여 주석처리 -->
				<!-- <?php if($view['data']['cor_ship_zipcode']!=''){
					?>
					<div style="clear:both;">
						<h5>배송정보</h5>
						<div><?php echo $view['data']['cor_ship_zipcode'] ?></div>
						<div><?php echo $view['data']['cor_ship_address'] ?></div>
						<div><?php echo $view['data']['cor_ship_address_detail'] ?></div>
						<div><?php echo $view['data']['cor_content']; ?></div>
					</div>
					<?php
				}?> -->
			</div>
		</div>
	</div>
</div>



<script>
$(document).ready(function() {
	// asmo sh 231214 shop 페이지 디자인 상 헤더, nav바, 숨김 처리 스크립트
	$('header').addClass('dn');
	$('.navbar').addClass('dn');
	// $('.sidebar').addClass('dn');
	// $('footer').addClass('dn');

	$('.main').addClass('add');

	// shop 페이지일 때 사이드바 메뉴 활성화
	$('#shop a').addClass('selected');
});
</script>