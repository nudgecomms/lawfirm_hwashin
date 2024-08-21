(function($){
    //●footer●
    const floatingBtn = $('.floating_bar, .floating_bar_mb');

    // ---floating btn---
    $(window).scroll(function(){
        const imgTop=$(window).scrollTop();
        // console.log(imgTop);
    
        if (imgTop < 200){
            floatingBtn.css({'opacity':'0' , 'transition':'.3s', 'transform':'translateY(7rem)'});
        }
        if (imgTop > 201){
            floatingBtn.css({'opacity':'1', 'transform':'translateY(0)'});
        }
    });
    //---floating btn end---
    //●footer end●

    // --(개인정보처리방침/입금안내)창닫기버튼--
    $('#close_window').click(function(){
        window.open('','_self').close();
    });
    // --(개인정보처리방침/입금안내)창닫기 버튼 end--

    //언론보도
    // (필수속성 추가)
    $('.required input, .media_kboard .newsLink input').attr("required",true);
    // (새창열기)
    $('.media_kboard .kboard-gallery-item a, #kboard-ocean-gallery-latest a').attr({"target" : "_blank"});
    //언론보도 end
})(jQuery);