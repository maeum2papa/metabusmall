<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 열매 헬퍼
 */


if ( ! function_exists('fadd')) {
    /**
     * 열매추가
     * @param int $mem_id 대상회원PK
     * @param int $amount 추가열매량
     * @param string $message 메시지
     * @param int $admin_mem_id 열매주는관리자회원, system의 경우 0
     */
	function fadd($mem_id, $amount, $message, $admin_mem_id = 0){
		


        //log write

	}
}


if ( ! function_exists('famount')) {
    /**
     * 사용가능 열매 조회
     * @param int $mem_id 대상회원PK
     * @return int amount 사용가능 열매
     */
    function famount($mem_id){
        $CI =& get_instance();
		$q = "select mem_cur_fruit from cb_member where mem_id = '".$mem_id."'";
		$r = $CI->db->query($q);
		$mem = (array) $r->row();
		return $mem['mem_cur_fruit'];
    }
}



if ( ! function_exists('fhistoty')) {
    /**
     * 회원 열매 내역
     * @param int $mem_id 대상회원PK
     * @param date $start_dt 조회시작일
     * @param date $end_dt 조회시작종료일
     * @return array list 내역
     */
    function fhistoty($mem_id, $start_dt = '1970-01-01', $end_dt = '9999-12-31'){

    }
}



if ( ! function_exists('fuse')) {
    /**
     * 열매 사용
     * @param int $mem_id 대상회원PK
     * @param int $amount 열매사용량
     * @param string $message 메시지
     * @param int $company_idx 기업PK cb_company_info.company_idx
     * @param int $admin_mem_id 열매사용처리관리자회원, system의 경우 0
     */
    function fuse($mem_id, $amount, $message, $company_idx, $admin_mem_id){

        //log write
    }
}
