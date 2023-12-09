<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>
<?php $this->managelayout->add_js(base_url('assets/js/cmallitem.js')); ?>
<script type="text/javascript" src="https://ssl.daumcdn.net/dmaps/map_js_init/postcode.v2.js"></script>
<div id="order">
	<h3>주문하기</h3>

	<ul class="prd-list">
	<?php
	$total_price_sum = 0;
	if (element('data', $view)) {
		foreach (element('data', $view) as $result) {
	?>
		<li>

			<div class="col-xs-12 col-md-8 prd-info">
				<div class="prd-img"><a href="<?php echo element('item_url', $result); ?>" title="<?php echo html_escape(element('cit_name', $result)); ?>"><img src="<?php echo thumb_url('cmallitem', element('cit_file_1', $result), 60, 60); ?>" class="thumbnail" style="margin:0;width:60px;height:60px;" alt="<?php echo html_escape(element('cit_name', $result)); ?>" title="<?php echo html_escape(element('cit_name', $result)); ?>" /></a></div>
				<a href="<?php echo element('item_url', $result); ?>" title="<?php echo html_escape(element('cit_name', $result)); ?>"><?php echo html_escape(element('cit_name', $result)); ?></a>
				<ul class="cmall-options">
					<?php
					$total_num = 0;
					$total_price = 0;
					foreach (element('detail', $result) as $detail) {
					?>
						<li><i class="fa fa-angle-right" aria-hidden="true"></i> <?php echo html_escape(element('cde_title', $detail)) . ' ' . element('cct_count', $detail);?>개 (+<?php echo number_format(element('cde_price', $detail)); ?>원)</li>
					<?php
						$total_num += element('cct_count', $detail);
						$total_price += ((int) element('cit_price', $result) + (int) element('cde_price', $detail)) * element('cct_count', $detail);
					}
					$total_price_sum += $total_price;
					?>
				</ul>
			</div>
			<div class="col-xs-12 col-md-4 prd-price">
				<div><span>수량 :</span> <?php echo number_format($total_num); ?> 개</div>
				<div><span>판매가 : </span> <?php echo number_format(element('cit_price', $result)); ?>원</div>
				<div class="prd-total"><span>소계 : </span> <strong><?php echo number_format($total_price); ?><input type="hidden" name="total_price[<?php echo element('cit_id', $result); ?>]" value="<?php echo $total_price; ?>" /></strong> 원</div>
				<div><span>다운로드 : </span><?php echo (element('cit_download_days', $result)) ? '구매후 <strong>' . element('cit_download_days', $result) . '</strong> 일간 ' : ' 기간제한없음'; ?></div>
			</div>
		</li>
	<?php
		}
	}
	if ( ! element('data', $view)) {
	?>
		<li class="nopost">주문내역이 비어있습니다</li>
	<?php
	}
	?>
	</ul>
	<div class="well well-sm">
	결제해야할 금액
	<div class="total_price"><span class="checked_price"><?php echo number_format($total_price_sum); ?></span> 원</div>
</div>


<?php
$sform['view'] = $view;
if ($this->cbconfig->item('use_payment_pg') && element('use_pg', $view)) {
	$this->load->view('paymentlib/' . $this->cbconfig->item('use_payment_pg') . '/' . element('form1name', $view), $sform);
}
$attributes = array('class' => 'form-horizontal', 'name' => 'fpayment', 'id' => 'fpayment', 'autocomplete' => 'off');
echo form_open(site_url('cmall/orderupdate'), $attributes);
if ($this->cbconfig->item('use_payment_pg') && element('use_pg', $view)) {
	$this->load->view('paymentlib/' . $this->cbconfig->item('use_payment_pg') . '/' . element('form2name', $view), $sform);
}
?>
<div class="row">
	<input type="hidden" name="unique_id" value="<?php echo element('unique_id', $view); ?>" />
	<input type="hidden" name="total_price_sum" id="total_price_sum" value="<?php echo $total_price_sum; ?>" />
	<input type="hidden" name="good_mny" value="0" />
	<div class="col-xs-12 col-md-6 info-wr">
		<div class="ord-info">
			<h5 class="market-title">구매하시는 분</h5>
			<div class="form-group">
				<label class=" control-label">실명</label>
				<input type="text" name="mem_realname" class="form-control" value="<?php echo $this->member->item('mem_nickname'); ?>" />
			</div>
			<div class="form-group">
				<label class="control-label">이메일</label>
				<input type="email" name="mem_email" class="form-control" value="<?php echo $this->member->item('mem_email'); ?>" />
			</div>
			<div class="form-group">
				<label class="control-label">휴대폰</label>
				<input type="text" name="mem_phone" class="form-control" value="<?php echo $this->member->item('mem_phone'); ?>" />
			</div>
			<?php
			if(element('input_address', $view)=='y'){
			?>
			<div class="form-group">
				<label class="control-label">배송지</label>
				<input type="text" name="cor_ship_zipcode" class="form-control" value="" placeholder="우편번호">
				<button type='button' class="btn" onclick="win_zip('fpayment', 'cor_ship_zipcode', 'cor_ship_address', 'cor_ship_address_detail', 'cor_ship_address_detail', 'cor_ship_address4');">[우편번호 검색]</button>
				<input type="text" name="cor_ship_address" class="form-control" value="" placeholder="주소">
				<input type="text" name="cor_ship_address_detail" class="form-control" value="" placeholder="주소상세">
				<input type="hidden" name="cor_ship_address4" value="" readonly>
			</div>
			<?php
				}
			?>
			<div class="form-group">
				<label class="control-label">하고싶은 말</label>
				<textarea name="cor_content" class="form-control " cols="5"></textarea>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-6 info-wr">
		<div class="pay-info">
			<?php
				if(element('cor_pay_type',$view)=='f'){
					?>
					<div>
					<h5 class="market-title">열매상품 결제정보</h5>
					<ul>
						<li>
							<span class="info-tit">총 주문 열매</span>
							<strong><?php echo number_format($total_price_sum); ?>개</strong>
						</li>
						<li>
							<span class="info-tit">보유 열매 </span> <?php echo number_format((int) $this->member->item('mem_cur_fruit'));?> 개
								( 최대
								<?php
								$max_f = min((int) $this->member->item('mem_cur_fruit'), $total_price_sum);
								echo number_format($max_f);
								?>
								개 까지 사용 가능 )
						</li>
						<li>
							<?php
								if($total_price_sum <= $this->member->item('mem_cur_fruit')){
									?>
									<span class="info-tit">사용 열매 </span> <input type="text" name="order_fruit" id="order_fruit" class="form-control px100" value="<?php echo $max_f; ?>"  readonly/> 원	
									<?php
								}
							?>	
						</li>
					</ul>
					</div>
					<?php
				}else if(element('cor_pay_type',$view)=='c'){
					?>
					<div>
					<h5 class="market-title">코인상품 결제정보</h5>
					<ul>
						<li>
							<span class="info-tit">총 주문 코인</span>
							<strong><?php echo number_format($total_price_sum); ?>개</strong>
						</li>
						<li>
							<span class="info-tit">보유 코인 </span> <?php echo number_format((int) $this->member->item('mem_point'));?> 개
								( 최대
								<?php
								$max_c = min((int) $this->member->item('mem_point'), $total_price_sum);
								echo number_format($max_c);
								?>
								개 까지 사용 가능 )
						</li>
						<li>
							<?php
								if($total_price_sum <= $this->member->item('mem_point')){
									?>
									<span class="info-tit">사용 코인 </span> <input type="text" name="order_coin" id="order_coin" class="form-control px100" value="<?php echo $max_c; ?>"  readonly/> 원
									<?php
								}
							?>	
						</li>
					</ul>
					</div>
					<?php
				}
			?> 
			<div style="display:none">
				<h5 class="market-title">결제정보</h5>
				<ul>
					<li>
						<span class="info-tit">총 주문</span>
						<strong><?php echo number_format($total_price_sum); ?>원</strong>
					</li>
					<li>
						<?php
						if ($this->cbconfig->item('use_deposit')) {
						?>
							<span class="info-tit">보유<?php echo html_escape($this->cbconfig->item('deposit_name')); ?> </span> <?php echo number_format((int) $this->member->item('total_deposit'));?> <?php echo html_escape($this->cbconfig->item('deposit_unit')); ?>
							( 최대
							<?php
							$max_deposit = min((int) $this->member->item('total_deposit'), $total_price_sum);
							echo number_format($max_deposit);
							echo html_escape($this->cbconfig->item('deposit_unit'));
							?>
							까지 사용 가능 )
						</li>
						<li>
							<input type="hidden" name="max_deposit" id="max_deposit" value="<?php echo $max_deposit; ?>" />
							<span class="info-tit">사용
							<?php echo html_escape($this->cbconfig->item('deposit_name')); ?> </span> <input type="text" name="order_deposit" id="order_deposit" class="form-control px100" value="0" /> 원
						<?php } else { ?>
							<input type="hidden" name="order_deposit" id="order_deposit" class="input" value="0" />
						<?php }?>
					</li>
				</ul>
			</div>
			

			<div class="feedback-box" style="display:none">
				<h5>결제수단</h5>
				<?php if ($this->cbconfig->item('use_payment_bank')) { ?>
					<label for="pay_type_bank" >
						<input type="radio" name="pay_type" value="bank" id="pay_type_bank" /> 무통장입금
					</label>
				<?php } ?>
				<?php if ($this->cbconfig->item('use_payment_card')) { ?>
					<label for="pay_type_card" >
						<input type="radio" name="pay_type" value="card" id="pay_type_card" /> 신용카드
					</label>
				<?php } ?>
				<?php if ($this->cbconfig->item('use_payment_realtime')) { ?>
					<label for="pay_type_realtime" >
						<input type="radio" name="pay_type" value="realtime" id="pay_type_realtime" /> 계좌이체
					</label>
				<?php } ?>
				<?php if ($this->cbconfig->item('use_payment_vbank')) { ?>
					<label for="pay_type_vbank" >
						<input type="radio" name="pay_type" value="vbank" id="pay_type_vbank" /> 가상계좌
					</label>
				<?php } ?>
				<?php if ($this->cbconfig->item('use_payment_phone')) { ?>
					<label for="pay_type_phone" >
						<input type="radio" name="pay_type" value="phone" id="pay_type_phone" /> 휴대폰결제
					</label>
				<?php } ?>
					<label for="pay_type_f" >
						<input type="radio" name="pay_type" value="f" id="pay_type_f" /> 열매
					</label>

					<label for="pay_type_c" >
						<input type="radio" name="pay_type" value="c" id="pay_type_c" /> 코인
					</label>

				</div>
				<div class="alert alert-success bank-info">
					<div><strong>계좌안내</strong></div>
					<div><?php echo nl2br($this->cbconfig->item('payment_bank_info')); ?> </div>
				</div>
				<?php
				if ($this->cbconfig->item('use_payment_pg')) {
					
					if($total_price_sum > $this->member->item('mem_cur_fruit') && element('cor_pay_type',$view)=='f'){
						?><h5><?php echo cmsg("2103");?></h5><?php
					}else if($total_price_sum > $this->member->item('mem_point') && element('cor_pay_type',$view)=='c'){
						?><h5><?php echo cmsg("2104");?></h5><?php
					}else{
						$this->load->view('paymentlib/' . $this->cbconfig->item('use_payment_pg') . '/' . element('form3name', $view), $sform);
					}

				} ?>
			</div>
		</div>
	</div>

	<?php echo form_close(); ?>
</div>


<?php
	if(element('cor_pay_type',$view)=='f' || element('cor_pay_type',$view)=='c'){
		?>
		<script type="text/javascript">

			function paytypefc(type){
				var genderRadios = document.getElementsByName("pay_type");

				// 라디오 버튼을 반복하면서 'f' or 'c' 값을 가진 것을 찾아 체크하기
				for (var i = 0; i < genderRadios.length; i++) {
					if (genderRadios[i].value == type) {
						genderRadios[i].checked = true;
						break; // 'f' 값을 찾으면 루프를 종료
					}
				}
			}
			
			paytypefc('<?php echo element('cor_pay_type',$view);?>');

		</script>
		<?php	
	}
?>


<script type="text/javascript">
//<![CDATA[
$(document).on('change', 'input[name= pay_type]', function() {
	if ($("input[name='pay_type']:checked").val() === 'bank') {
		$('.bank-info').show();
	} else {
		$('.bank-info').hide();
	}
});
//]]>
</script>

<script type="text/javascript">
var use_pg = '<?php echo element('use_pg', $view) ? '1' : ''; ?>';
var pg_type = '<?php echo $this->cbconfig->item('use_payment_pg'); ?>';
var payment_unique_id = '<?php echo element('unique_id', $view); ?>';
var good_name = '<?php echo html_escape(element('good_name', $view)); ?>';
var ptype = 'cmall';
</script>
<script type="text/javascript" src="<?php echo base_url('assets/js/payment.js'); ?>"></script>
<?php
if ($this->cbconfig->item('use_payment_pg') && element('use_pg', $view)) {
	$this->load->view('paymentlib/' . $this->cbconfig->item('use_payment_pg') . '/' . element('form4name', $view), $sform);
}
