(function($){
    // ---(tab)
    $(".sub_05_sec_01 .tab_title .title").on('click', function() {
        let index = $(".sub_05_sec_01 .tab_title .title").index(this);
        //모든 div의 on 클래스 제거
        $('.sub_05_sec_01 .tab_title .title').removeClass('on');
        $('.sub_05_sec_01 .tab_cont').removeClass('on');
        //클릭된 index에 해당하는 div에 on 추가
        $('.sub_05_sec_01 .tab_title .title:eq('+ index +')').addClass('on');
        $('.sub_05_sec_01 .tab_cont:eq('+ index +')').addClass('on');
    })
    // ---(tab end)

})(jQuery);