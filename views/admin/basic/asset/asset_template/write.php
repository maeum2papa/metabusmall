<div class="box">
	<div class="box-table">
		<?php
		echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>');
		$attributes = array('class' => 'form-horizontal', 'name' => 'fadminwrite', 'id' => 'fadminwrite');
		echo form_open(current_full_url(), $attributes);
		?>
			<input type="hidden" name="<?php echo element('primary_key', $view); ?>"	value="<?php echo element(element('primary_key', $view), element('data', $view)); ?>" />
			<div class="form-group">
				<label class="col-sm-2 control-label">템플릿번호(자동생성)</label>
				<div class="col-sm-10 form-inline">
					<input type="text" class="form-control" name="tp_sno" value="<?php echo set_value('tp_sno', element('tp_sno', element('data', $view))); ?>" readonly/>
				</div>
			</div>
			<div class="form-group" id="tp_type1">
				<label class="col-sm-2 control-label">카테고리</label>
				<div class="col-sm-10">
                    <select class="form-control" name="cate_sno1"  style="width: 250px;">
						<?php
						foreach (element('category1', $view) as $v) {
						?>
						<option value="<?=$v[cate_sno]?>" <?php if(element('cate_sno', element('data', $view)) == $v[cate_sno]){?>selected<?php } ?>><?=$v[cate_kr]?></option>
						<?php
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group" id="tp_type2">
				<label class="col-sm-2 control-label">카테고리</label>
				<div class="col-sm-10">
                    <select class="form-control" name="cate_sno2"  style="width: 250px;">
						<?php
						foreach (element('category2', $view) as $v) {
						?>
						<option value="<?=$v[cate_sno]?>" <?php if(element('cate_sno', element('data', $view)) == $v[cate_sno]){?>selected<?php } ?>><?=$v[cate_kr]?></option>
						<?php
						}
						?>
					</select>
				</div>
			</div>
            <div class="form-group">
				<label class="col-sm-2 control-label">템플릿명</label>
				<div class="col-sm-10">
                    <input type="text" class="form-control" name="tp_nm" value="<?php echo set_value('tp_nm', element('tp_nm', element('data', $view))); ?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">종류</label>
				<div class="col-sm-10">
					<label class="radio-inline" for="tp_type_g">
						<input type="radio" name="tp_type" id="tp_type_g" value="g" checked <?php echo set_radio('tp_type', 'g', (element('tp_type', element('data', $view)) == 'g' ? true : false)); ?>  onclick="tp_type1('g')" /> 게임
					</label>
					<label class="radio-inline" for="tp_type_l">
						<input type="radio" name="tp_type" id="tp_type_l" value="l" <?php echo set_radio('tp_type', 'l', (element('tp_type', element('data', $view)) == 'l' ? true : false)); ?> onclick="tp_type1('l')" /> 랜드
					</label>
				</div>
			</div>
			<div class="btn-group pull-right" role="group" aria-label="...">
				<button type="button" class="btn btn-default btn-sm btn-history-back" >취소하기</button>
				<button type="submit" class="btn btn-success btn-sm">저장하기</button>
			</div>
		<?php echo form_close(); ?>
	</div>
</div>

<script type="text/javascript">
//<![CDATA[
function tp_type1(arg) {
	if (arg === 'g') {
		$("#tp_type1").css("display",'block'); 
		$("#tp_type2").css("display",'none'); 
	} else {
		$("#tp_type2").css("display",'block'); 
		$("#tp_type1").css("display",'none'); 
	}
}
<?php if(element('tp_type', element('data', $view))){?>
var tp_type_arg = '<?=element('tp_type', element('data', $view))?>';
<?php }else{?>
var tp_type_arg = 'g';
<?php }?>
//]]>
tp_type1(tp_type_arg);
</script>
