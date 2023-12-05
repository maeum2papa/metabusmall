<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Videoinfo extends CB_Controller
{

    /**
     * 관리자 페이지 상의 현재 디렉토리입니다
     * 페이지 이동시 필요한 정보입니다
     */
    public $pagedir = 'lms/videoinfo';

    /**
     * 모델을 로딩합니다
     */
    protected $models = array('video');

    /**
     * 이 컨트롤러의 메인 모델 이름입니다
     */
    protected $modelname = 'video_model';

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
            'video_name' => $param->sort('video_name', 'asc'),
            'state' => $param->sort('state', 'asc'),
            'reg_date' => $param->sort('reg_date', 'desc'),
        );

        $findex = $this->input->get('findex', null, '');
        $forder = $this->input->get('forder', null, '');
        $sfield = $this->input->get('sfield', null, '');
        $skeyword = $this->input->get('skeyword', null, '');

        $per_page = admin_listnum();
        $offset = ($page - 1) * $per_page;

        $this->{$this->modelname}->allow_search_field = array('video_name'); // 검색이 가능한 필드
        $this->{$this->modelname}->search_field_equal = array(); // 검색중 like 가 아닌 = 검색을 하는 필드
        $this->{$this->modelname}->allow_order_field = array('video_name', 'state', 'reg_date'); // 정렬이 가능한 필드


        $result = $this->{$this->modelname}
            ->get_admin_list($per_page, $offset, $where, '', $findex, $forder, $sfield, $skeyword, $cate_flag);
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

        $search_option = array('video_name'=>'동영상컨텐츠명');
        $view['view']['skeyword'] = ($sfield && array_key_exists($sfield, $search_option)) ? $skeyword : '';
        $view['view']['search_option'] = search_option($search_option, $sfield);
        $view['view']['listall_url'] = admin_url($this->pagedir);
        $view['view']['write_url'] = admin_url($this->pagedir . '/write');

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

        if($pid)
        {
            $getdata = $this->{$this->modelname}->get_one($pid);
        } else {
            $getdata['state'] = 'use';
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
        $idx = $in_post['video_idx'];

        unset($in_post['video_idx']);

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
}
?>