var step=1;
var cart_error_step_1="Please add at least a product";
(function($){

    $(document).ready(function(){

        //add to cart
        $(document).on('click','.btn-product-cart',function(){
            var pdid=$(this).attr("data-pid");
            var type=$(this).attr("type");
            $.ajax({
                url:'/ajax/product/cart/add',
                type:'post',
                dataType:'json',
                data:{nid:pdid,type:type},
                success:function(response){
                    $('#block-product-cart-product-cart-block').replaceWith(response.block_cart);

                    $.fancybox(
                        response.popup_cart,
                        {
                            'autoDimensions'	: false,
                            'width'         		: 350,
                            'height'        		: 'auto',
                            'transitionIn'		: 'none',
                            'transitionOut'		: 'none'
                        }
                    );
                }
            })
        })

        //cart process
        $('.cart-header-step').find("[step=1]").addClass("active");
        $('.webform-component--step-content--step-1').addClass("active");

        var btn_submit=$('#webform-client-form-30').find('input[name=op]');
        if(btn_submit.length==1){
            btn_submit.after('<button type="button" id="next-step">'+next_step_text+'</button>');
            btn_submit.hide();

            var btn_next_step=$('#webform-client-form-30').find('#next-step');

            $('.cart-header-step li').click(function(){
                $('#webform-client-form-30').find('.cart-error').remove();
                var i=parseInt($(this).attr('step'));
                step=i;
                var error_message="";
                if(step==1){

                }else if(step==2){
                    if($('#webform-client-form-30').find('.tbl-cart-products tbody tr').length==0){
                        error_message='<div class="cart-error"><span>'+cart_error_step_1+'<span></div>';

                        $('.webform-component--step-header').after(error_message)
                        return false;
                    }
                }else if(step==3){
                   $('.webform-component--step-content--step-2--step-2-top').find('[required=required]').each(function(){
                       if($(this).val()===undefined || $(this).val()===null ||  $(this).val()===""){
                            $(this).addClass('input-error');
                           error_message+='<span>'+$(this).parent().find('label').text()+'</span>'
                       }
                   })
                    if ($('.webform-component--step-content--step-2--step-2-bottom--reservation-calendar-type').find('input[name=gender]:checked').length == 0) {
                        // do something here
                    }

                    if(error_message!=""){
                        $('.webform-component--step-header').after('<div class="cart-error">'+error_message+'</div>')
                        return false;
                    }
                }
                if(i==3){
                    btn_submit.show();
                    btn_next_step.hide();
                }else{
                    btn_submit.hide();
                    btn_next_step.show();
                }

                $('.cart-header-step li').removeClass('active');
                $(this).addClass('active');
                $('.webform-component--step-content >div').removeClass('active');
                $('.webform-component--step-content').find('.webform-component--step-content--step-'+i).addClass('active');
            })


            btn_next_step.click(function(){
                var i=parseInt($('.cart-header-step li.active').attr('step'));
                step=i;
                switch (i){
                    case 1:
                        $('.cart-header-step').find("[step="+(i+1)+"]").trigger('click');
                        break;
                    case 2:
                        $('.cart-header-step').find("[step="+(i+1)+"]").trigger('click');
                        btn_submit.show();
                        btn_next_step.hide();
                        break
                    case 3:
                        break
                    default:
                        break;
                }
            })
        }



        //Reservation calenda
        $('.webform-component--step-content--step-2--step-2-bottom--reservation-calendar input[type=radio]').each(function(){
            if($(this).prop("checked")){
                if($(this).val()=='I want to apply those dates to all machines in my cart'){
                    $('#edit-submitted-step-content-step-2-step-2-bottom-step-2-bottom-content-all-items .reservation-calendar-all').show();

                }else{
                    $('#edit-submitted-step-content-step-2-step-2-bottom-step-2-bottom-content-items .reservation-calendar-each-items').show();
                }
            }
        })
        $('.webform-component--step-content--step-2--step-2-bottom--reservation-calendar input[type=radio]').click(function(){
            if($(this).val()=='I want to apply those dates to all machines in my cart'){
                $('#edit-submitted-step-content-step-2-step-2-bottom-step-2-bottom-content-all-items .reservation-calendar-all').show();
                $('#edit-submitted-step-content-step-2-step-2-bottom-step-2-bottom-content-items .reservation-calendar-each-items').hide();
            }else{
                $('#edit-submitted-step-content-step-2-step-2-bottom-step-2-bottom-content-all-items .reservation-calendar-all').hide();
                $('#edit-submitted-step-content-step-2-step-2-bottom-step-2-bottom-content-items .reservation-calendar-each-items').show();
            }
        })
    })
})(jQuery)