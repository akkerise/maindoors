$( document ).ready(function() {
    $('.tab-content').hide();
    $(".tab-content:first").show();

    $(".tab-project li").click(function() {
        // gỡ bỏ class="active" cho tất cả các thẻ
        $(".tab-project li").removeClass("active");
        // chèn class="active" vào phần tử </li> vừa được click
        $(this).addClass("active");
        // ẩn tất cả thẻ với class="tab_content"
        $(".tab-content").hide();
        //Hiển thị nội dung thẻ tab được click với hiệu ứng Fade In
        var activeTab = $(this).attr("rel");
        $("#"+activeTab).fadeIn();
    });

    $(".project-default").hover(function(){
            //$(this).animate(addClass("project-hover"),500);
            $(this).addClass("project-hover");
        }, 
        function()
        {
            //$(this).animate(removeClass("project-hover"),500);
            $(this).removeClass("project-hover");
        });
});