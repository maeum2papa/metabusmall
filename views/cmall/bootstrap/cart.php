<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>
<?php $this->managelayout->add_js(base_url('assets/js/cmallitem.js')); ?>

<h3>장바구니</h3>

<?php
$attributes = array('class' => 'form-inline', 'name' => 'flist', 'id' => 'flist');
echo form_open(site_url('cmall/cart'), $attributes);
?>
	<input type="hidden" name="cor_pay_type" id='cor_pay_type' value='f'/>
	<div id="cart">
		

		<div class="all-chk"><input type="checkbox" name="chkallf" id="chkallf" checked="checked" /> <label for="chkallf">열매상품 전체선택</label></div>
		<button type="button" class="btn btn-outline btn-default btn-sm btn-list-delete btn-list-selected" data-list-delete-url = "<?php echo element('list_delete_url', $view); ?>" >선택삭제</button>
		<ul class="prd-list f-area">
		<?php
		$view_data = element('data', $view);
		$total_price_sum = 0;
		if ($view_data['f']) {
			foreach ($view_data['f'] as $result) {
		?>
			<li>
				<div class="col-xs-12 col-md-9 prd-info">
					<?php if(soldoutYn($result['cit_id'])=='y'){?>
						<div class="prd-chk"><input type="checkbox" name="chk[]" class="list-chkbox" value="<?php echo element('cit_id', $result); ?>" checked="checked" disabled/></div>
						<div><h1>품절</h1></div>
					<?php }else{ ?>
						<div class="prd-chk"><input type="checkbox" name="chk[]" class="list-chkbox" value="<?php echo element('cit_id', $result); ?>" checked="checked"/></div>
					<?php } ?>
					<div class="prd-img"><a href="<?php echo element('item_url', $result); ?>" title="<?php echo html_escape(element('cit_name', $result)); ?>" ><img src="<?php echo thumb_url('cmallitem', element('cit_file_1', $result), 60, 60); ?>" class="thumbnail" style="margin:0;width:60px;height:60px;" alt="<?php echo html_escape(element('cit_name', $result)); ?>" title="<?php echo html_escape(element('cit_name', $result)); ?>" /></a></div>

					<a href="<?php echo element('item_url', $result); ?>" title="<?php echo html_escape(element('cit_name', $result)); ?>" ><?php echo html_escape(element('cit_name', $result)); ?></a>
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
					// $total_price_sum += $total_price;
					?>
					</ul>
					<div class="cmall-option-change">
						<button class="change_option btn btn-info btn-xs" type="button" data-cit-id="<?php echo element('cit_id', $result); ?>">선택사항수정</button>
					</div>
				</div>
				<div class="col-xs-12 col-md-3 prd-price">
					<div><span>수량 :</span> <?php echo number_format($total_num); ?> 개</div>
					<div><span>판매가 : </span> <?php echo number_format(element('cit_price', $result)); ?> 원</div>
					<div class="prd-total"><span>소계 : </span> <strong><?php echo number_format($total_price); ?><input type="hidden" name="total_price[<?php echo element('cit_id', $result); ?>]" value="<?php echo $total_price; ?>" /></strong> 원</div>
				</div>
			</li>
		<?php
			}
		}
		if ( ! $view_data['f']) {
		?>
			<li class="nopost">장바구니가 비어있습니다</li>
		<?php
		}
		?>
		</ul>


		<div class="all-chk"><input type="checkbox" name="chkallc" id="chkallc" /> <label for="chkallc">코인상품 전체선택</label></div>
		<button type="button" class="btn btn-outline btn-default btn-sm btn-list-delete btn-list-selected" data-list-delete-url = "<?php echo element('list_delete_url', $view); ?>" >선택삭제</button>
		<ul class="prd-list c-area">
		<?php
		if ($view_data['c']) {
			foreach ($view_data['c'] as $result) {
		?>
			<li>
				<div class="col-xs-12 col-md-9 prd-info">
					<?php if(soldoutYn($result['cit_id'])=='y'){?>
						<div class="prd-chk"><input type="checkbox" name="chk[]" class="list-chkbox" value="<?php echo element('cit_id', $result); ?>" disabled/></div>
						<div><h1>품절</h1></div>
					<?php }else{ ?>
						<div class="prd-chk"><input type="checkbox" name="chk[]" class="list-chkbox" value="<?php echo element('cit_id', $result); ?>" /></div>
					<?php } ?>
					
					<div class="prd-img"><a href="<?php echo element('item_url', $result); ?>" title="<?php echo html_escape(element('cit_name', $result)); ?>" ><img src="<?php echo thumb_url('cmallitem', element('cit_file_1', $result), 60, 60); ?>" class="thumbnail" style="margin:0;width:60px;height:60px;" alt="<?php echo html_escape(element('cit_name', $result)); ?>" title="<?php echo html_escape(element('cit_name', $result)); ?>" /></a></div>

					<a href="<?php echo element('item_url', $result); ?>" title="<?php echo html_escape(element('cit_name', $result)); ?>" ><?php echo html_escape(element('cit_name', $result)); ?></a>
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
					// $total_price_sum += $total_price;
					?>
					</ul>
					<div class="cmall-option-change">
						<button class="change_option btn btn-info btn-xs" type="button" data-cit-id="<?php echo element('cit_id', $result); ?>">선택사항수정</button>
					</div>
				</div>
				<div class="col-xs-12 col-md-3 prd-price">
					<div><span>수량 :</span> <?php echo number_format($total_num); ?> 개</div>
					<div><span>판매가 : </span> <?php echo number_format(element('cit_price', $result)); ?> 원</div>
					<div class="prd-total"><span>소계 : </span> <strong><?php echo number_format($total_price); ?><input type="hidden" name="total_price[<?php echo element('cit_id', $result); ?>]" value="<?php echo $total_price; ?>" /></strong> 원</div>
				</div>
			</li>
		<?php
			}
		}
		if ( ! $view_data['c']) {
		?>
			<li class="nopost">장바구니가 비어있습니다</li>
		<?php
		}
		?>
		</ul>

	</div>
	<div class="well well-sm">
		<div class="total_price">결제금액 <span class="checked_price"><?php echo number_format($total_price_sum); ?></span> 원</div>
	</div>

	<button type="button" class="btn btn-black btn-list-selected pull-right btn-order" >주문하기</button>

<?php echo form_close(); ?>

<script type="text/javascript">
//<![CDATA[

jQuery(function($) {
	var close_btn_idx;

	function item_sum(){
		var sum = 0;
		$('.list-chkbox:checked').each(function () {
			sum += parseInt($("input[name='total_price[" + $(this).val() + "]']").val());
		});
		$('.checked_price').text(number_format(sum.toString()));
	}

	$(document).on('change', '.list-chkbox', function() {
		item_sum();
	});

	item_sum();

	// 선택사항수정
	$(document).on('click', '.change_option', function() {
		var cit_id = $(this).attr('data-cit-id');
		var $this = $(this);
		close_btn_idx = $('.change_option').index($(this));

		$.post(
			cb_url + '/cmall/cartoption',
			{ cit_id: cit_id, csrf_test_name: cb_csrf_hash },
			function(data) {
				$('#cart_option_modify').remove();
				$this.after("<div id=\"cart_option_modify\"></div>");
				$('#cart_option_modify').html(data);
			}
		);
	});

	// 모두선택
	$(document).on('click', 'input[name=ct_all]', function() {
		if ($(this).is(':checked')) {
			$('input[name^=ct_chk]').attr('checked', true);
		} else {
			$('input[name^=ct_chk]').attr('checked', false);
		}
	});

	// 옵션수정 닫기
	$(document).on('click', '#mod_option_close', function() {
		$('#cart_option_modify').remove();
		$('.change_option').eq(close_btn_idx).focus();
	});


	$('#chkallf').on('click',function(){

		if ($(this).is(':checked')) {
			$('.f-area input[name="chk[]"]').attr('checked', true);
			$('.c-area input[name="chk[]"]').attr('checked', false);
			$('#chkallc').attr('checked',false);
		} else {
			$('.f-area input[name="chk[]"]').attr('checked', false);
		}

	});


	$('#chkallc').on('click',function(){

		if ($(this).is(':checked')) {
			$('.c-area input[name="chk[]"]').attr('checked', true);
			$('.f-area input[name="chk[]"]').attr('checked', false);
			$('#chkallf').attr('checked',false);
		} else {
			$('.c-area input[name="chk[]"]').attr('checked', false);
		}
		
	});


	$('.f-area input[name="chk[]"]').click(function(){
		if ($(this).is(':checked')) {
			$('.c-area input[name="chk[]"]').attr('checked', false);
		}
	});

	$('.c-area input[name="chk[]"]').click(function(){
		if ($(this).is(':checked')) {
			$('.f-area input[name="chk[]"]').attr('checked', false);
		}
	});


	$(".btn-order").click(function(){

		fcount = $('.f-area input[name="chk[]"]:checked').length;

		ccount = $('.c-area input[name="chk[]"]:checked').length;


		if(fcount == 0 && ccount == 0){
			alert('주문할 상품을 선택해주세요.');
			return;
		}

		if(fcount > 0 && ccount > 0){
			alert('열매상품 또는 코인상품 한 종류만 선택해주세요.');
			return;
		}

		if(fcount > 0 && ccount == 0){
			$('#cor_pay_type').val('f');
			$('#flist').submit();
			return;
		}

		if(fcount == 0 && ccount > 0){
			$('#cor_pay_type').val('c');
			$('#flist').submit();
			return;
		}

	});
});
//]]>
</script>
