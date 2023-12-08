<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * basic_helper.php 에 include 되어 있음
 * 사용법 <?php echo cmsg("1100");?>
 */
if ( ! function_exists('cmsg')) {
    /**
     * 모든 메세지 모음 메소드
     * @param String $code 메세지코드
     * @return String 메세지
     * 
     * 0000
     * 1자리 : 메세지 분류 (상품, 주문, 회원 ...) 
     * 2자리 : 메세지 종류 (경고, 일반 ...)
     * 3자리 : 예비
     * 4자리 : 예비
     * 
     * 1*** : 상품
     * 
     * *0** : 일반
     * *1** : 경고
     * 
     */
    function cmsg($code){

        $msg = array(
            "1100"=>"삭제된 상품 입니다.",
            "1101"=>"품절된 상품이 포함되어 있습니다."
        );

        $result = ($msg[$code])?$msg[$code]:"";

        return $result;
    }
}