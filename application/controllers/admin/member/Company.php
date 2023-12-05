<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CB_Controller
{

    /**
     * 관리자 페이지 상의 현재 디렉토리입니다
     * 페이지 이동시 필요한 정보입니다
     */
    public $pagedir = 'member/company';

    /**
     * 모델을 로딩합니다
     */
    protected $models = array('Company_info');

    /**
     * 이 컨트롤러의 메인 모델 이름입니다
     */
    protected $modelname = 'Company_info_model';

    /**
     * 헬퍼를 로딩합니다
     */
    protected $helpers = array('form', 'array', 'chkstring');

    function __construct()
    {
        parent::__construct();

        /**
         * 라이브러리를 로딩합니다
         */
        $this->load->library(array('pagination', 'querystring'));
    }

    /**
     * 목록을 가져오는 메소드입니다
     */
    public function index()
    {
        $view = array();
        $view['view'] = array();

        $param =& $this->querystring;
        $page = (((int) $this->input->get('page')) > 0) ? ((int) $this->input->get('page')) : 1;
        $view['view']['sort'] = array(
            'company_name' => $param->sort('company_name', 'asc'),
            'state' => $param->sort('state', 'asc'),
            'reg_date' => $param->sort('reg_date', 'desc'),
        );
        $findex = $this->input->get('findex', null, '');
        $forder = $this->input->get('forder', null, '');
        $sfield = $this->input->get('sfield', null, '');
        $skeyword = $this->input->get('skeyword', null, '');

        $per_page = admin_listnum();
        $offset = ($page - 1) * $per_page;

        $this->{$this->modelname}->allow_search_field = array('company_name', 'company_code', 'company_num', 'company_tel', 'company_mail'); // 검색이 가능한 필드
        $this->{$this->modelname}->search_field_equal = array('company_code', 'state'); // 검색중 like 가 아닌 = 검색을 하는 필드
        $this->{$this->modelname}->allow_order_field = array('company_name', 'state', 'reg_date'); // 정렬이 가능한 필드

        $where = array();

        $result = $this->{$this->modelname}
            ->get_admin_list($per_page, $offset, $where, '', $findex, $forder, $sfield, $skeyword);
        $list_num = $result['total_rows'] - ($page - 1) * $per_page;

        $view['view']['data'] = $result;
        $view['view']['state_str'] = array('use'=>'활성화','unuse'=>'비활성화');

        $view['view']['primary_key'] = $this->{$this->modelname}->primary_key;

        $config['base_url'] = admin_url($this->pagedir) . '?' . $param->replace('page');
        $config['total_rows'] = $result['total_rows'];
        $config['per_page'] = $per_page;
        $this->pagination->initialize($config);
        $view['view']['paging'] = $this->pagination->create_links();
        $view['view']['page'] = $page;

        $search_option = array('company_name'=>'기업명', 'company_code'=>'서브도메인명', 'company_num'=>'사업자번호', 'company_tel'=>'전화번호', 'company_mail'=>'세금계산서메일');
        $view['view']['skeyword'] = ($sfield && array_key_exists($sfield, $search_option)) ? $skeyword : '';
        $view['view']['search_option'] = search_option($search_option, $sfield);
        $view['view']['listall_url'] = admin_url($this->pagedir);
        $view['view']['write_url'] = admin_url($this->pagedir . '/write');
        $view['view']['list_delete_url'] = admin_url($this->pagedir . '/listdelete/?' . $param->output());

        $layoutconfig = array('layout' => 'layout', 'skin' => 'index');
        $view['layout'] = $this->managelayout->admin($layoutconfig, $this->cbconfig->get_device_view_type());
        $this->data = $view;
        $this->layout = element('layout_skin_file', element('layout', $view));
        $this->view = element('view_skin_file', element('layout', $view));

    }

    public function write($pid = 0)
    {
        $view = array();
        $view['view'] = array();

        $primary_key = $this->{$this->modelname}->primary_key;
        $view['view']['primary_key'] = $primary_key;

        $getdata = array();

        $view['view']['plan_list'] = $this->{$this->modelname}->get_plan_list();
		//템플릿 리스트 추가
		$q = "select tp_sno, cate_sno, tp_nm from cb_asset_template where cate_sno in ('1','6','9','10')";
		$r = $this->db->query($q);
		$tp_list = $r->result_array();
		
		foreach ($tp_list as $v) {
			if($v[cate_sno] == '1'){
				$view['view']['inner_list'][] = $v;
			}else if($v[cate_sno] == '6'){
				$view['view']['outer_list'][] = $v;
			}else if($v[cate_sno] == '9'){
				$view['view']['office_list'][] = $v;
			}else if($v[cate_sno] == '10'){
				$view['view']['class_list'][] = $v;
			}
		}
		
//		$q = "select tp_sno, tp_nm from cb_asset_template where cate_sno = '6'";
//		$r = $this->db->query($q);
//		$view['view']['outer_list'] = $r->result_array();
		
		
		
		
		

        if($pid)
        {
            $getdata = $this->{$this->modelname}->get_one($pid);
            $getdata['code_chk'] = 1;
        } else {
            $getdata['use_sday'] = date('Y-m-d');
            $getdata['use_eday'] = date('Y-m-d');
            $getdata['code_chk'] = '';
            $getdata['state'] = 'use';
            $getdata['plan_idx'] = $view['view']['plan_list'][0]['plan_idx'];
        }

        $view['view']['data'] = $getdata;

        $this->load->library('form_validation');

        $layoutconfig = array('layout' => 'layout', 'skin' => 'write');
        $view['layout'] = $this->managelayout->admin($layoutconfig, $this->cbconfig->get_device_view_type());
        $this->data = $view;
        $this->layout = element('layout_skin_file', element('layout', $view));
        $this->view = element('view_skin_file', element('layout', $view));
    }

    public function save()
    {
        $in_post = $this->input->post();
        $idx = $in_post['company_idx'];

        unset($in_post['company_idx']);

        $this->load->library('upload');

        if (isset($_FILES) && isset($_FILES['company_logo_file']) && isset($_FILES['company_logo_file']['name']) && $_FILES['company_logo_file']['name'])
        {
            $upload_path = config_item('uploads_dir') . '/company_logo/';
            $upload_path = upload_mkdir($upload_path);

            $uploadconfig = array();
            $uploadconfig['upload_path'] = $upload_path;
            $uploadconfig['allowed_types'] = 'jpg|jpeg|png|gif';
            //$uploadconfig['max_size'] = '2000';
            //$uploadconfig['max_width'] = '1000';
            //$uploadconfig['max_height'] = '1000';
            $uploadconfig['encrypt_name'] = true;

            $this->upload->initialize($uploadconfig);

            if ($this->upload->do_upload('company_logo_file')) {
                $img = $this->upload->data();
                $updatephoto = "/".$upload_path.element('file_name', $img);
                $in_post['company_logo'] = $updatephoto;
            } else {
                $file_error = $this->upload->display_errors();
            }
        }

        if($idx == '') $this->{$this->modelname}->insert($in_post);
        else $this->{$this->modelname}->update($idx, $in_post);

        $this->session->set_flashdata(
            'message',
            '정상적으로 저장되었습니다'
        );

        $param =& $this->querystring;
        $redirecturl = admin_url($this->pagedir . '?' . $param->output());

        redirect($redirecturl);
    }

    public function chk_code()
    {
        $in_get = $this->input->get();
        if($in_get['code'] != '')
        {
            $rs = $this->{$this->modelname}->get_company_code($company_code);

            echo $rs['cnt'];
        } else echo 1;
    }
}
