<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company_info_model extends CB_Model
{

	/**
	 * 테이블명
	 */
	public $_table = 'company_info';

	/**
	 * 사용되는 테이블의 프라이머리키
	 */
	public $primary_key = 'company_idx'; // 사용되는 테이블의 프라이머리키

	public $search_sfield = '';

	function __construct()
	{
		parent::__construct();
	}

	public function get_company_code($company_code)
	{
	    $select = 'count(*) as cnt';
		$where = array('company_code' => $company_code);
		return $this->get_one('', $select, $where);
	}

	public function get_admin_list($limit = '', $offset = '', $where = '', $like = '', $findex = '', $forder = '', $sfield = '', $skeyword = '', $sop = 'OR')
	{
		$join = array();

		$select = 'company_info.*,  plan.plan_name';
		//$join[] = array('table' => 'template', 'on' => 'company_info.template_idx = template.template_idx', 'type' => 'inner');
        $join[] = array('table' => 'plan', 'on' => 'company_info.plan_idx = plan.plan_idx', 'type' => 'inner');

		$result = $this->_get_list_common($select, $join, $limit, $offset, $where, $like, $findex, $forder, $sfield, $skeyword, $sop);

		return $result;
	}

    public function get_company_list()
    {
        $sql = "select company_idx, company_name from cb_company_info where state = 'use' order by company_name asc";
        $rs = $this->db->query($sql);
        $result = $rs->result_array();

        return $result;
    }

	public function get_plan_list()
    {
        $sql = "select * from cb_plan where lv != 99 order by lv, plan_idx asc";
        $rs = $this->db->query($sql);
        $result = $rs->result_array();

        return $result;
    }

    public function get_template_list()
    {
        $sql = "select template_idx, template_name from cb_template order by template_name asc";
        $rs = $this->db->query($sql);
        $result = $rs->result_array();

        return $result;
    }
}
