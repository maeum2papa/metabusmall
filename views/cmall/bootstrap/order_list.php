<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

<div id="orderlist">
	<h3>주문 내역 관리</h3>

	<div class="credit table-responsive">
		<span class="list-total">전체 <?php echo number_format(element('total_rows', element('data', $view), 0)); ?> 건</span>
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>구매날짜</th>
					<th>구매내역</th>
					<th class="text-center">차감내역</th>
					<th>상태</th>
				</tr>
			</thead>
			<tbody>
			<?php
			if (element('list', element('data', $view))) {
				foreach (element('list', element('data', $view)) as $result) {
					unset($order_detail,$thumnail,$order_name);
			?>
				<tr>
					<td><?php echo str_replace('-','.',substr($result['cor_datetime'],0,10)); ?></td>
					<td>
						<a href="<?php echo site_url('cmall/orderresult/' . element('cor_id', $result)); ?>" class="bold">
							<?php 
								$order_detail = cmall_order_detail(element('cor_id', $result));
								$thumnail = '';
								$order_name = [];

								foreach($order_detail as $k => $v){
									if($k==0) $thumnail = $v['cit_file_1'];
									$order_name[] = $v['cit_name'];
								}

							?>
							<img src="<?php echo thumb_url('cmallitem', $thumnail, 60, 60); ?>" class="thumbnail" style="margin:0;width:60px;height:60px;" alt="<?php echo html_escape($order_detail[0]['cit_name']); ?>" title="<?php echo html_escape($order_detail[0]['cit_name']); ?>" />
							<?php echo implode(" + ",$order_name); ?>
						</a>
						
					</td>
					<td class="text-right">
						<?php 
							if($result['cor_pay_type']=='f'){
								echo '열매';
							}else{
								echo '컬래버 코인';
							}
						?>

						<?php echo number_format((int) element('cor_total_money', $result)); ?> 개
					</td>
					<td class="text-center">
						<?php

						if($result['status']=='cancel'){
							echo '주문취소';
						}elseif($result['status']=='order'){
							?>
							주문확인<br/>
							<button type="button" onClick="order_cancel('<?php echo element('cor_id', $result);?>')">[주문취소]</button>
							<?php

						}elseif($result['status']=='end'){
							echo '발송완료';
						}

						?>
					</td>
				</tr>
			<?php
				}
			}
			if ( ! element('list', element('data', $view))) {
			?>
				<tr>
					<td colspan="4" class="nopost">회원님이 주문 내역이 없습니다</td>
				</tr>
			<?php
			}
			?>
			</tbody>
		</table>
		<nav><?php echo element('paging', $view); ?></nav>
	</div>
</div>

<script>
function order_cancel(cor_id){
	$.post(
		cb_url + "/cmall/ordercancel",
		{cor_id:cor_id, csrf_test_name: cb_csrf_hash },
		function(res){
		if(res=='false'){
			alert("<?php echo cmsg("4100"); ?>");
		}else if(res=='false_status'){
			alert("<?php echo cmsg("4101"); ?>");
		}else if(res=='true'){
			alert("<?php echo cmsg("4000"); ?>);
			location.reload();
		}
	});
}
</script>