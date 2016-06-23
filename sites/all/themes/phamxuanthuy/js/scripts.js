(function($){
         $(function(){
             $('#block-menu-menu-project .content >ul>li').append('<span data-toggle="dropdown" class="icon-add dropdown-toggle">+</span>');
             $('#block-menu-menu-project .content >ul>li.active-trail >ul').show();
             $('#block-menu-menu-project .content >ul>li').on("click",'.dropdown-toggle',function(){
                 $(this).prev().toggle();
             })             
              smoothScroll.init();
         })
})(jQuery);
