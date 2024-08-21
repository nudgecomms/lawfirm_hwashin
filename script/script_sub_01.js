(function($){
    // ---(rolling)
    var ticker = function(){
        timer = setTimeout(function(){
            $('#ticker li:first').animate( {marginTop: '-20px'}, 400, function(){
                $(this).detach().appendTo('ul#ticker').removeAttr('style');
            });
            ticker();
        }, 2000);         
    };
    ticker();
    // ---(rolling end)

    // ---(tab)
    $(".sub_01_sec_07 .tab_title .title").on('click', function() {
        let index = $(".sub_01_sec_07 .tab_title .title").index(this);
        //모든 div의 on 클래스 제거
        $('.sub_01_sec_07 .tab_title .title').removeClass('on');
        $('.sub_01_sec_07 .tab_cont').removeClass('on');
        //클릭된 index에 해당하는 div에 on 추가
        $('.sub_01_sec_07 .tab_title .title:eq('+ index +')').addClass('on');
        $('.sub_01_sec_07 .tab_cont:eq('+ index +')').addClass('on');
    })
    // ---(tab end)

})(jQuery);