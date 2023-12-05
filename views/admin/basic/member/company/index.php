<div class="box">
	<div class="box-table">
		<?php
		echo show_alert_message($this->session->flashdata('message'), '<div class="alert alert-auto-close alert-dismissible alert-info"><button type="button" class="close alertclose" >&times;</button>', '</div>');
		$attributes = array('class' => 'form-inline', 'name' => 'flist', 'id' => 'flist');
		echo form_open(current_full_url(), $attributes);
		?>
			<div class="box-table-header">
				<div class="btn-group btn-group-sm" role="group">
				</div>
				<?php
				ob_start();
				?>
					<div class="btn-group pull-right" role="group" aria-label="...">
						<a href="<?php echo element('listall_url', $view); ?>" class="btn btn-outline btn-default btn-sm">전체목록</a>
						<a href="<?php echo element('write_url', $view); ?>" class="btn btn-outline btn-danger btn-sm">기업추가</a>
					</div>
				<?php
				$buttons = ob_get_contents();
				ob_end_flush();
				?>
			</div>
			<div class="row">전체 : <?php echo element('total_rows', element('data', $view), 0); ?>건</div>
			<div class="table-responsive">
				<table class="table table-hover table-striped table-bordered">
					<thead>
						<tr>
							<th>idx</th>
							<th><a href="<?php echo element('company_name', element('sort', $view)); ?>">기업명</a></th>
							<th>서브도메인명</th>
							<th>플랜명</th>
							<th>시작일</th>
                            <th>종료일</th>
                            <th>최대인원</th>
                            <th>사업자번호</th>
                            <th>전화번호</th>
                            <th>세금계산서메일</th>
                            <th><a href="<?php echo element('state', element('sort', $view)); ?>">활성화여부</a></th>
                            <th><a href="<?php echo element('reg_date', element('sort', $view)); ?>">등록일시</a></th>
							<th>수정</th>
						</tr>
					</thead>
					<tbody>
					<?php
					if (element('list', element('data', $view))) {
						foreach (element('list', element('data', $view)) as $result) {
					?>
						<tr>
							<td><?php echo element('company_idx', $result); ?></td>
                            <td><?php echo element('company_name', $result); ?></td>
                            <td><?php echo element('company_code', $result); ?></td>
                            <td><?php echo element('plan_name', $result); ?></td>
                            <td><?php echo element('use_sday', $result); ?></td>
                            <td><?php echo element('use_eday', $result); ?></td>
                            <td><?php echo element('use_cnt', $result); ?></td>
                            <td><?php echo element('company_num', $result); ?></td>
                            <td><?php echo element('company_tel', $result); ?></td>
                            <td><?php echo element('company_mail', $result); ?></td>
                            <td><?php echo $view['state_str'][element('state', $result)]; ?></td>
                            <td><?php echo element('reg_date', $result); ?></td>
							<td><a href="<?php echo admin_url($this->pagedir); ?>/write/<?php echo element(element('primary_key', $view), $result); ?>?<?php echo $this->input->server('QUERY_STRING', null, ''); ?>" class="btn btn-outline btn-default btn-xs">수정</a></td>
						</tr>
                    <?php
                        }
                    } else echo '<tr><td colspan="13" class="nopost">자료가 없습니다</td></tr>';
                    ?>
					</tbody>
				</table>
			</div>
			<div class="box-info">
				<?php echo element('paging', $view); ?>
				<div class="pull-left ml20"><?php echo admin_listnum_selectbox();?></div>
				<?php echo $buttons; ?>
			</div>
		<?php echo form_close(); ?>
	</div>
	<form name="fsearch" id="fsearch" action="<?php echo current_full_url(); ?>" method="get">
		<div class="box-search">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<select class="form-control" name="sfield" >
						<?php echo element('search_option', $view); ?>
					</select>
					<div class="input-group">
						<input type="text" class="form-control" name="skeyword" value="<?php echo html_escape(element('skeyword', $view)); ?>" placeholder="Search for..." />
						<span class="input-group-btn">
							<button class="btn btn-default btn-sm" name="search_submit" type="submit">검색</button>
						</span>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>

