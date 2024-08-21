<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );
        
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'hello-elementor','hello-elementor','hello-elementor-theme-style' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );

// END ENQUEUE PARENT ACTION

//my style 추가
function my_style(){
    wp_register_style('common.css', get_stylesheet_directory_uri() . '/css/common.css'); 
    wp_enqueue_style('common.css');

    wp_register_style('style_header_footer.css', get_stylesheet_directory_uri() . '/css/main/style_header_footer.css'); 
    wp_enqueue_style('style_header_footer.css');
    if(is_page(8748)){
        wp_register_style('style_main.css', get_stylesheet_directory_uri() . '/css/main/style_main.css'); 
        wp_enqueue_style('style_main.css');
    }
    // subpage
    if(is_page(array(/*성공사례*/3331, /*언론보도*/3332))){
        wp_register_style('kboard.css', get_stylesheet_directory_uri() . '/css/subpage/kboard.css'); 
        wp_enqueue_style('kboard.css');
    }
    // 변호사소개
    if(is_page(3327)){
        wp_register_style('sub_01_lawyer.css', get_stylesheet_directory_uri() . '/css/subpage/sub_01_lawyer.css'); 
        wp_enqueue_style('sub_01_lawyer.css');
    }
    // 변호철학
    if(is_page(3329)){
        wp_register_style('sub_02_philosophy.css', get_stylesheet_directory_uri() . '/css/subpage/sub_02_philosophy.css'); 
        wp_enqueue_style('sub_02_philosophy.css');
    }
    // 성공사례
    if(is_page(3331)){
        wp_register_style('sub_03_success.css', get_stylesheet_directory_uri() . '/css/subpage/sub_03_success.css'); 
        wp_enqueue_style('sub_03_success.css');
    }
    // 오시는길
    if(is_page(3513)){
        wp_register_style('sub_05_directions.css', get_stylesheet_directory_uri() . '/css/subpage/sub_05_directions.css'); 
        wp_enqueue_style('sub_05_directions.css');
    }
    // 온랴인문의
    if(is_page(3333)){
        wp_register_style('sub_06_inquiry.css', get_stylesheet_directory_uri() . '/css/subpage/sub_06_inquiry.css'); 
        wp_enqueue_style('sub_06_inquiry.css');
    }
    // contact_success
    if(is_page(array(/*온라인문의*/327, /*빠른상담*/10645))){
        wp_register_style('contact_success.css', get_stylesheet_directory_uri() . '/css/subpage/contact_success.css'); 
        wp_enqueue_style('contact_success.css');
    }
    // subpage end
}
add_action( 'wp_enqueue_scripts', 'my_style', 10);
//my style 추가 end

//my scrtip 연결
function my_script() {
    wp_register_script( 'script_common', get_stylesheet_directory_uri() . '/script/script_common.js',  array ('jquery'), '1.0.0', true );
    wp_enqueue_script( 'script_common' );
    // (subpage)
    if(is_page( /*변호사소개*/3327 )){
        wp_register_script( 'script_sub_01', get_stylesheet_directory_uri() . '/script/script_sub_01.js',  array ('jquery'), '1.0.0', true );
        wp_enqueue_script( 'script_sub_01' ); 
    }
    if(is_page( /*오시는길*/3513 )){
        wp_register_script( 'script_sub_05', get_stylesheet_directory_uri() . '/script/script_sub_05.js',  array ('jquery'), '1.0.0', true );
        wp_enqueue_script( 'script_sub_05' ); 
    }
} 
add_action( 'wp_enqueue_scripts', 'my_script', 100);
//my scrtip 연결 end

//언론보도
add_filter('kboard_url_document_uid', 'my_kboard_url_document_uid', 10, 3);
function my_kboard_url_document_uid($url, $content_uid, $board){
	if($board->id == '1'){
		$content = new KBContent();
		$content->initWithUID($content_uid);
		if($content->option->url){
			$url = $content->option->url;
		}
	}
	return $url;
}
//언론보도 link end

//kboard thumbnail
add_filter('kboard_content_get_thumbnail', 'my_kboard_content_get_thumbnail_20230811', 10, 4);
function my_kboard_content_get_thumbnail_20230811($thumbnail_url, $width, $height, $content){
	
	$board = $content->getBoard();
	
	if($board->skin == 'ocean-gallery' || $board->skin == 'card-gallery'){ // 게시판 스킨
		if(!$thumbnail_url){
			$thumbnail_url = '/wp-content/uploads/2024/06/thum_empty.jpg'; // 이미지 주소 편집
		}
	}
	
	return $thumbnail_url;
}
//kboard thumbnail end
//워드프레스 알림판 상단바 삭제
function remove_admin_bar_node( $wp_admin_bar ) {
    global $wp_admin_bar;
    $wp_admin_bar->remove_node( 'archive' ); //글보기
    $wp_admin_bar->remove_node( 'customize' ); //사용자정의
    $wp_admin_bar->remove_node( 'updates' ); //업데이트
    $wp_admin_bar->remove_node( 'comments' ); //코멘트
    $wp_admin_bar->remove_node( 'new-content' ); //새로추가
    $wp_admin_bar->remove_node( 'edit' ); //페이지편집
    $wp_admin_bar->remove_node( 'elementor_notes' ); //Notes
    $wp_admin_bar->remove_node( 'quform' ); //quform
    $wp_admin_bar->remove_node( 'kboard-setting-page' ); //케이보드 게시판관리
    $wp_admin_bar->remove_node( 'wpcode-admin-bar-info' ); //WPcode
}
add_action( 'admin_bar_menu', 'remove_admin_bar_node', 999 );

// 워드프레스 알림판에서 특정 메뉴 항목 제거하기
// Remove admin menu items in WordPress
function my_remove_menu_pages() {
    global $user_ID;

    remove_menu_page('update-core.php'); // 알림판
    remove_menu_page('upload.php'); // 미디어 (Media)
    remove_menu_page('link-manager.php'); // 링크 (Links)
    remove_menu_page('edit-comments.php'); // 댓글 (Comments)
    remove_menu_page('edit.php?post_type=page'); // 페이지 (Pages) 
    remove_menu_page('plugins.php'); // 플러그인 (Plugins)
    remove_menu_page('themes.php'); // 외모 (Appearance)
    remove_menu_page('users.php'); // 사용자 (Users)
    remove_menu_page('tools.php'); // 도구 (Tools)

    //글
    // remove_menu_page('edit.php'); // 글 (Posts)
    remove_submenu_page('edit.php', 'post-new.php'); //새로 추가
    remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=category'); //카테고리
    remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag'); //태그

    // 설정
    remove_menu_page('options-general.php'); // 설정 (Settings)
    remove_submenu_page('options-general.php', 'options-general.php'); // 설정 (Settings)_일반
    remove_submenu_page('options-general.php', 'options-writing.php'); // 설정 (Settings)_쓰기
    remove_submenu_page('options-general.php', 'options-reading.php'); // 설정 (Settings)_읽기
    remove_submenu_page('options-general.php', 'options-discussion.php'); // 설정 (Settings)_토론
    remove_submenu_page('options-general.php', 'options-media.php'); // 설정 (Settings)_미디어
    remove_submenu_page('options-general.php', 'options-permalink.php'); // 설정 (Settings)_고유주소
    remove_submenu_page('options-general.php', 'options-privacy.php'); // 설정 (Settings)_개인정보보호

    remove_menu_page('index.php'); //알림판
    remove_submenu_page('index.php','update-core.php' ); // 업데이트 (Update Core)
    
    // 케이보드
    remove_menu_page('kboard_store'); //케이보드 스토어
    remove_submenu_page('kboard_dashboard', 'kboard_dashboard'); //케이보드_대시보드
    remove_submenu_page('kboard_dashboard', 'kboard_list'); //케이보드_게시판 목록 및 관리
    remove_submenu_page('kboard_dashboard', 'kboard_new'); //케이보드_게시판 생성
    remove_submenu_page('kboard_dashboard', 'kboard_latestview'); //최신글 모아보기
    remove_submenu_page('kboard_dashboard', 'kboard_latestview_new'); //최신글 모아보기 생성
    remove_submenu_page('kboard_dashboard', 'kboard_backup'); //백업 및 복구
    remove_submenu_page('kboard_dashboard', 'kboard_category_update'); //카테고리 변경
    remove_submenu_page('kboard_dashboard', 'kboard_updates'); //업데이트
    remove_submenu_page('kboard_dashboard', 'kboard_comments_list'); //전체 댓글

    // elementor
    remove_menu_page('elementor'); // 엘리멘터 페이지 빌더
    remove_menu_page('edit.php?post_type=elementor_library'); // 엘리멘터 템플릿

    // 큐폼
    // remove_menu_page('quform.dashboard'); //큐폼
    remove_submenu_page('quform.dashboard', 'quform.dashboard');//Dashboard
    remove_submenu_page('quform.dashboard', 'quform.forms');//Forms
    remove_submenu_page('quform.dashboard', 'quform.forms&sp=add');//Add New
    remove_submenu_page('quform.dashboard', 'quform.tools');//Tools
    remove_submenu_page('quform.dashboard', 'quform.settings');//Settings
    remove_submenu_page('quform.dashboard', 'quform.help');//Help
    
    // 이외 플러그인
    remove_menu_page('wpcode'); //Code Snippets
    remove_submenu_page('wpcode', 'wpcode');//Code Snippets
    remove_submenu_page('wpcode', 'wpcode-snippet-manager');//+Add Snippet
    remove_submenu_page('wpcode', 'wpcode-pixel');//Conversion Pixels
    remove_submenu_page('wpcode', 'wpcode-library');//Library
    remove_submenu_page('wpcode', 'wpcode-generator');//Generator
    remove_submenu_page('wpcode', 'wpcode-file-editor');//File Editor
    remove_submenu_page('wpcode', 'wpcode-tools');//Tools
    remove_submenu_page('wpcode', 'wpcode-settings');//Settings
}
add_action( 'admin_init', 'my_remove_menu_pages' );

// add_action( 'admin_menu', function () {
//     echo '<pre>' . print_r( $GLOBALS[ 'menu' ], true) . '</pre>';
// } );
// add_action( 'admin_menu', function () {
//     echo '<pre>' . print_r( $GLOBALS[ 'submenu' ], true) . '</pre>';
// } );
