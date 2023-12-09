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


if ( ! function_exists('fdeposit')) {
    /**
     * 열매 전환가치를 적용하여 사용시킬 예치금 산출
     * @param Array $items 주문상품들
     * @param int $company_idx 주문하는 회원의 소속 기업PK
     * @return int 차감할 예치금
     */
    function fdeposit($items, $company_idx){
        // 자사몰 상품일때는 열매만 소모되고 기업 예치금은 그대로
        // 팀메타 아이템(열매) + 자사몰 상품(열매) 경우 있을 수 있음
        $use_deposit = 0;
        $use_items = array(); //계산 대상 아이템
        $cconfig['custom'] = config_item('custom');
        //$cconfig['custom']['category']['company']
        
        foreach($items as $k => $v){
            
            // 1. 열매 결제가 아닌게 들어왔는지 체크
            if($v['cit_money_type'] == 'c'){
                alert(cmsg('3100'));
                exit;
            }

            if($v['company_idx'] != $company_idx){
                $use_items[] = $v;
            }

        }


        if(count($use_items) > 0){

            //회원의 기업 재화가치 가져오기
            $company_coin_value = busiCoin($company_idx);
            debug("$company_coin_value = "+ $company_coin_value);

            foreach($use_items as $k => $v){
                $use_deposit += $v['cct_count'] * $company_coin_value;
            }
        }

        return $use_deposit;
    }
}