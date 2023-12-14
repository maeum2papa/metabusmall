<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Mypage class
 *
 * Copyright (c) CIBoard <www.ciboard.co.kr>
 *
 * @author CIBoard (develop@ciboard.co.kr)
 */

/**
 * 마이페이지와 관련된 controller 입니다.
 */
class Classroom extends CB_Controller
{

	/**
	 * 모델을 로딩합니다
	 */
	protected $models = array('Classroom');
	/**
	 * 이 컨트롤러의 메인 모델 이름입니다
	 */
	protected $modelname = 'Classroom_model';
	/**
	 * 헬퍼를 로딩합니다
	 */
	protected $helpers = array('form', 'array');

	function __construct()
	{
		parent::__construct();

		/**
		 * 라이브러리를 로딩합니다
		 */
		$this->load->library(array('querystring'));
		if (!$this->member->is_member()) {
			redirect('https://collaborland.kr/');
		}
	}


	/**
	 * 페이지기본 기본
	 */
	public function index()
	{
		$layoutconfig = array(
			'path' => 'classroom',
			'layout' => 'layout',
			'skin' => 'main',
			'layout_dir' => 'bootstrap',
			'mobile_layout_dir' => 'bootstrap',
			'use_sidebar' => 1,
			'use_mobile_sidebar' => 1,
			'skin_dir' => 'bootstrap',
			'mobile_skin_dir' => 'bootstrap',
			'page_title' => "클래스룸",
			'meta_description' => $meta_description,
			'meta_keywords' => $meta_keywords,
			'meta_author' => $meta_author,
			'page_name' => "클래스룸",
		);
		
		
		
		
		$view['layout'] = $this->managelayout->front($layoutconfig, $this->cbconfig->get_device_view_type());
		$this->data = $view;
		$this->layout = element('layout_skin_file', element('layout', $view));
		$this->view = element('view_skin_file', element('layout', $view));
	}

	/**
	 *  강의 상세
	 */
	public function detail()
	{
		
		$layoutconfig = array(
			'path' => 'classroom',
			'layout' => 'layout',
			'skin' => 'detail',
			'layout_dir' => 'bootstrap',
			'mobile_layout_dir' => 'bootstrap',
			'use_sidebar' => 0,
			'use_mobile_sidebar' => 0,
			'skin_dir' => 'bootstrap',
			'mobile_skin_dir' => 'bootstrap',
			'page_title' => "강의상세",
			'meta_description' => $meta_description,
			'meta_keywords' => $meta_keywords,
			'meta_author' => $meta_author,
			'page_name' => "강의상세",
			);
		
		
		
		$view['layout'] = $this->managelayout->front($layoutconfig, $this->cbconfig->get_device_view_type());
		$this->data = $view;
		$this->layout = element('layout_skin_file', element('layout', $view));
		$this->view = element('view_skin_file', element('layout', $view));
	}
	
	public function my_class()
	{
		
		$layoutconfig = array(
			'path' => 'classroom',
			'layout' => 'layout',
			'skin' => 'my_class',
			'layout_dir' => 'bootstrap',
			'mobile_layout_dir' => 'bootstrap',
			'use_sidebar' => 0,
			'use_mobile_sidebar' => 0,
			'skin_dir' => 'bootstrap',
			'mobile_skin_dir' => 'bootstrap',
			'page_title' => "나의수강목록",
			'meta_description' => $meta_description,
			'meta_keywords' => $meta_keywords,
			'meta_author' => $meta_author,
			'page_name' => "나의수강목록",
			);
		
		
		
		$view['layout'] = $this->managelayout->front($layoutconfig, $this->cbconfig->get_device_view_type());
		$this->data = $view;
		$this->layout = element('layout_skin_file', element('layout', $view));
		$this->view = element('view_skin_file', element('layout', $view));
	}
	
	public function complete_class()
	{
		
		$layoutconfig = array(
			'path' => 'classroom',
			'layout' => 'layout',
			'skin' => 'complete_class',
			'layout_dir' => 'bootstrap',
			'mobile_layout_dir' => 'bootstrap',
			'use_sidebar' => 0,
			'use_mobile_sidebar' => 0,
			'skin_dir' => 'bootstrap',
			'mobile_skin_dir' => 'bootstrap',
			'page_title' => "수강완료과정",
			'meta_description' => $meta_description,
			'meta_keywords' => $meta_keywords,
			'meta_author' => $meta_author,
			'page_name' => "수강완료과정",
			);
		
		
		
		$view['layout'] = $this->managelayout->front($layoutconfig, $this->cbconfig->get_device_view_type());
		$this->data = $view;
		$this->layout = element('layout_skin_file', element('layout', $view));
		$this->view = element('view_skin_file', element('layout', $view));
	}
	
	public function business_class()
	{
		
		$layoutconfig = array(
			'path' => 'classroom',
			'layout' => 'layout',
			'skin' => 'business_class',
			'layout_dir' => 'bootstrap',
			'mobile_layout_dir' => 'bootstrap',
			'use_sidebar' => 0,
			'use_mobile_sidebar' => 0,
			'skin_dir' => 'bootstrap',
			'mobile_skin_dir' => 'bootstrap',
			'page_title' => "기업강의목록",
			'meta_description' => $meta_description,
			'meta_keywords' => $meta_keywords,
			'meta_author' => $meta_author,
			'page_name' => "기업강의목록",
			);
		
		
		
		$view['layout'] = $this->managelayout->front($layoutconfig, $this->cbconfig->get_device_view_type());
		$this->data = $view;
		$this->layout = element('layout_skin_file', element('layout', $view));
		$this->view = element('view_skin_file', element('layout', $view));
	}
	
	public function player()
	{
		
		$layoutconfig = array(
			'path' => 'classroom',
			'layout' => 'layout',
			'skin' => 'player',
			'layout_dir' => 'bootstrap',
			'mobile_layout_dir' => 'bootstrap',
			'use_sidebar' => 0,
			'use_mobile_sidebar' => 0,
			'skin_dir' => 'bootstrap',
			'mobile_skin_dir' => 'bootstrap',
			'page_title' => "동영상 플레이어",
			'meta_description' => $meta_description,
			'meta_keywords' => $meta_keywords,
			'meta_author' => $meta_author,
			'page_name' => "동영상 플레이어",
			);
		
		
		
		$view['layout'] = $this->managelayout->front($layoutconfig, $this->cbconfig->get_device_view_type());
		$this->data = $view;
		$this->layout = element('layout_skin_file', element('layout', $view));
		$this->view = element('view_skin_file', element('layout', $view));
	}
	public function test_game()
	{
		
		$layoutconfig = array(
			'path' => 'classroom',
			'layout' => 'layout',
			'skin' => 'test_game',
			'layout_dir' => 'bootstrap',
			'mobile_layout_dir' => 'bootstrap',
			'use_sidebar' => 0,
			'use_mobile_sidebar' => 0,
			'skin_dir' => 'bootstrap',
			'mobile_skin_dir' => 'bootstrap',
			'page_title' => "테스트 게임",
			'meta_description' => $meta_description,
			'meta_keywords' => $meta_keywords,
			'meta_author' => $meta_author,
			'page_name' => "테스트 게임",
			);
		
		
		
		$view['layout'] = $this->managelayout->front($layoutconfig, $this->cbconfig->get_device_view_type());
		$this->data = $view;
		$this->layout = element('layout_skin_file', element('layout', $view));
		$this->view = element('view_skin_file', element('layout', $view));
	}
}
