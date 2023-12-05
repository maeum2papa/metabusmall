<div class="box">
	<div class="box-table">
    <?php
		echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>');
		echo show_alert_message(element('message', $view), '<div class="alert alert-warning">', '</div>');
		$attributes = array('class' => 'form-horizontal', 'name' => 'fadminwrite', 'id' => 'fadminwrite');
		echo form_open_multipart(admin_url($this->pagedir).'/save'. '?' . $this->input->server('QUERY_STRING', null, ''), $attributes);
		
    ?>
			<input type="hidden" name="<?php echo element('primary_key', $view); ?>" value="<?php echo element(element('primary_key', $view), element('data', $view)); ?>" />
            <input type="hidden" id="code_chk" value="<?php echo set_value('code_chk', element('code_chk', element('data', $view))); ?>" />
            <div class="box-table-header">
                <h4>기업정보</h4>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">기업명</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="company_name" value="<?php echo set_value('company_name', element('company_name', element('data', $view))); ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">서브도메인명</label>
                <div class="col-sm-8 form-inline">
                    <input type="text" class="form-control" id="company_code" name="company_code" onchange="company_code_edit();" value="<?php echo set_value('company_code', element('company_code', element('data', $view))); ?>" />
                    <a class="btn btn-default btn-sm" href="javascript:chk_code();" >중복확인</a>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">기업로고</label>
                <div class="col-sm-10">
                    <?php
                        if(element('company_logo', element('data', $view)))
                            echo "<img src='".element('company_logo', element('data', $view))."' style='width:100px;height:auto;'/>";
                    ?>
                    <input type="file" name="company_logo_file" id="company_logo_file" />
                    <p class="help-block"></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">활성화여부</label>
                <div class="col-sm-10 form-inline">
                    <select name="state" id="state" class="form-control">
                        <option value="use">활성화</option>
                        <option value="unuse">비활성화</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">템플릿 마이랜드 내부</label>
                <div class="col-sm-10 form-inline">
                    <select name="template_inner" id="template_inner" class="form-control">
                    <?php foreach (element('inner_list', $view) as $v) { ?>
						<option value="<?=$v[tp_sno]?>" <?php if(element('template_inner', element('data', $view)) == $v[tp_sno]){?>selected<?php } ?>><?=$v[tp_nm]?></option>
					<?php } ?>
                    </select>
                </div>
            </div>
			<div class="form-group">
                <label class="col-sm-2 control-label">템플릿 마이랜드 외부</label>
                <div class="col-sm-10 form-inline">
                    <select name="template_outer" id="template_outer" class="form-control">
                    <?php foreach (element('outer_list', $view) as $v) { ?>
						<option value="<?=$v[tp_sno]?>" <?php if(element('template_outer', element('data', $view)) == $v[tp_sno]){?>selected<?php } ?>><?=$v[tp_nm]?></option>
					<?php } ?>
                    </select>
                </div>
            </div>
			<div class="form-group">
                <label class="col-sm-2 control-label">템플릿 오피스</label>
                <div class="col-sm-10 form-inline">
                    <select name="template_office" id="template_office" class="form-control">
                    <?php foreach (element('office_list', $view) as $v) { ?>
						<option value="<?=$v[tp_sno]?>" <?php if(element('template_office', element('data', $view)) == $v[tp_sno]){?>selected<?php } ?>><?=$v[tp_nm]?></option>
					<?php } ?>
                    </select>
                </div>
            </div>
			<div class="form-group">
                <label class="col-sm-2 control-label">템플릿 교육실</label>
                <div class="col-sm-10 form-inline">
                    <select name="template_class" id="template_class" class="form-control">
                    <?php foreach (element('class_list', $view) as $v) { ?>
						<option value="<?=$v[tp_sno]?>" <?php if(element('template_class', element('data', $view)) == $v[tp_sno]){?>selected<?php } ?>><?=$v[tp_nm]?></option>
					<?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">플랜</label>
                <div class="col-sm-10 form-inline">
                    <select name="plan_idx" id="plan_idx" class="form-control">
                        <?php  foreach($view['plan_list'] as $l) { echo "<option value='".$l['plan_idx']."'>".$l['plan_name']."</option>";}?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">재화가치</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="coin_value" value="<?php echo set_value('coin_value', element('coin_value', element('data', $view))); ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">이용기간 시작일</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="use_sday" name="use_sday" value="<?php echo set_value('use_sday', element('use_sday', element('data', $view))); ?>" readonly />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">이용기간 종료일</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="use_eday" name="use_eday" value="<?php echo set_value('use_eday', element('use_eday', element('data', $view))); ?>" readonly />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">이용 최대인원</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="use_cnt" value="<?php echo set_value('use_cnt', element('use_cnt', element('data', $view))); ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">사업자번호</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="company_num" value="<?php echo set_value('company_num', element('company_num', element('data', $view))); ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">업종</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="company_type" value="<?php echo set_value('company_type', element('company_type', element('data', $view))); ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">업태</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="company_uptae" value="<?php echo set_value('company_uptae', element('company_uptae', element('data', $view))); ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">주소</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="company_addr" value="<?php echo set_value('company_addr', element('company_addr', element('data', $view))); ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">전화번호</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="company_tel" value="<?php echo set_value('company_tel', element('company_tel', element('data', $view))); ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">세금계산서 메일</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="company_mail" value="<?php echo set_value('company_mail', element('company_mail', element('data', $view))); ?>" />
                </div>
            </div>

            <div class="box-table-header">
                <h4>담당자1</h4>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">이름</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="manage_name_1" value="<?php echo set_value('manage_name_1', element('manage_name_1', element('data', $view))); ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">부서/직책</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="manage_div_1" value="<?php echo set_value('manage_div_1', element('manage_div_1', element('data', $view))); ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">이메일</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="manage_email_1" value="<?php echo set_value('manage_email_1', element('manage_email_1', element('data', $view))); ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">전화번호</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="manage_tel_1" value="<?php echo set_value('manage_tel_1', element('manage_tel_1', element('data', $view))); ?>" />
                </div>
            </div>

            <div class="box-table-header">
                <h4>담당자2</h4>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">이름</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="manage_name_2" value="<?php echo set_value('manage_name_2', element('manage_name_2', element('data', $view))); ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">부서/직책</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="manage_div_2" value="<?php echo set_value('manage_div_2', element('manage_div_2', element('data', $view))); ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">이메일</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="manage_email_2" value="<?php echo set_value('manage_email_2', element('manage_email_2', element('data', $view))); ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">전화번호</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="manage_tel_2" value="<?php echo set_value('manage_tel_2', element('manage_tel_2', element('data', $view))); ?>" />
                </div>
            </div>

            <div class="box-table-header">
                <h4>담당자3</h4>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">이름</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="manage_name_3" value="<?php echo set_value('manage_name_3', element('manage_name_3', element('data', $view))); ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">부서/직책</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="manage_div_3" value="<?php echo set_value('manage_div_3', element('manage_div_3', element('data', $view))); ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">이메일</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="manage_email_3" value="<?php echo set_value('manage_email_3', element('manage_email_3', element('data', $view))); ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">전화번호</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="manage_tel_3" value="<?php echo set_value('manage_tel_3', element('manage_tel_3', element('data', $view))); ?>" />
                </div>
            </div>
			<div class="btn-group pull-right" role="group" aria-label="...">
				<button type="button" class="btn btn-default btn-sm btn-history-back">취소하기</button>
				<a class="btn btn-success btn-sm" href="javascript:save();">저장하기</a>
			</div>
		<?php echo form_close(); ?>
	</div>
</div>

<script type="text/javascript">
//<![CDATA[
$(function() {
	$('#fadminwrite').validate({
		rules: {
            company_name: { required: true },
            company_mail: { email :true },
            manage_email_1: { email:true },
            manage_email_2: { email:true },
            manage_email_3: { email:true }
		}
	});

    $('#use_sday').datepicker({format: "yyyy-mm-dd",language : "kr"});
    $('#use_eday').datepicker({format: "yyyy-mm-dd",language : "kr"});

    $('#state').val('<?php echo set_value('state', element('state', element('data', $view))); ?>');
    $('#template_idx').val('<?php echo set_value('template_idx', element('template_idx', element('data', $view))); ?>');
    $('#plan_idx').val('<?php echo set_value('plan_idx', element('plan_idx', element('data', $view))); ?>');
});

function company_code_edit()
{
    $('#code_chk').val('');
}

function chk_code()
{
    var regex = /^[a-z0-9+]*$/;

    var company_code = $('#company_code').val();

    if(company_code == '')
    {
        alert('서브도메인명이 입력되지 않았습니다.');
        return false;
    }

    if(company_code != '' && !regex.test(company_code))
    {
        alert('서브도메인명은 소문자/숫자만 사용가능합니다.');
        return false;
    }

    $.get('<?php echo admin_url($this->pagedir).'/chk_code';?>?code='+company_code, function(data){
        if(data > 0)
        {
            $('#code_chk').val('');
            alert('중복된 서브도메인명이 있습니다.');
        } else {
            $('#code_chk').val(1);
            alert('입력된 서브도메인명은 사용가능합니다.');
        }
    });

}

function save()
{
    var regex = /^[a-z0-9+]*$/;

    var chk = $('#code_chk').val();
    var company_code = $('#company_code').val();

    if(company_code != '' && !regex.test(company_code))
    {
        alert('서브도메인명은 소문자/숫자만 사용가능합니다.');
        return false;
    }

    if(company_code != '' && chk == '')
    {
        alert('서브도메인명 중복체크는 필수 입니다.');
        return false;
    }

    $('#fadminwrite').submit();
}
//]]>
</script>
