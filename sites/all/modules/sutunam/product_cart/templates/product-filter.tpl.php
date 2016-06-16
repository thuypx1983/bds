<?php
$categories=getProductCategory();
?>
<div>
    <div>
        <span><?php echo t('Add a new machine to your selection')?></span>
    </div>
    <div>
        <div class="product-cart-filter">
            <div>
                <select id="category_product">
                    <option value=""><?php echo t('Category selector')?></option>
                    <?php foreach($categories as $category){
                        echo '<option value="'.$category->tid.'">'.$category->taxonomy_term_data_name.'</option>';
                    }?>
                </select>
            </div>

            <div>
                <select id="energy"  disabled="disabled">
                    <option value=""><?php echo t('Energy')?></option>
                </select>
            </div>

            <div>

            <select id="height"  disabled="disabled">
                    <option value=""><?php echo t('Height')?></option>
                </select>
            </div>
            <div>
                <select id="width"  disabled="disabled">
                    <option value=""><?php echo t('Width')?></option>
                </select>

            </div>
            <div>
                <select id="maximum_charge"  disabled="disabled">
                    <option value=""><?php echo t('Maximum charge')?></option>
                </select>
            </div>
            <div>
                <select id="maximum_range"  disabled="disabled">
                    <option value=""><?php echo t('Maximum Range')?></option>
                </select>
            <div>

            </div>
        </div>
        </div>
        <div id="add-option">
            <button type="button" id="add-option"><?php echo 'Add to cart'?></button>
        </div>
    </div>
</div>
<script>
    var inputs= ['#category_product','#energy','#height','#width','#maximum_charge','#maximum_range'];
    (function($){
        $(document).ready(function(){
            $('#category_product').change(function(){
                resetWhenChange('#category_product');
                if($(this).val()=="") return false;

                var catid=$('#category_product').val();
                $.ajax({
                    url:'/ajax/product/cart/getfeture',
                    type:'post',
                    dataType:'json',
                    data:{type:'engine',catid:catid},
                    success:function(response){
                        $('#energy').html(response.option);
                        $('#energy').prop("disabled", false);
                    }
                })
            })
            $('#energy').change(function(){
                resetWhenChange('#energy');
                if($(this).val()=="") return false;
                var catid=$('#category_product').val();
                var energyid=$('#energy').val();
                $.ajax({
                    url:'/ajax/product/cart/getfeture',
                    type:'post',
                    dataType:'json',
                    data:{type:'height',catid:catid,energyid:energyid},
                    success:function(response){
                        $('#height').html(response.option);
                        $('#height').prop("disabled", false);
                    }
                })
            })
            $('#height').change(function(){
                resetWhenChange('#height');
                if($(this).val()=="") return false;

                var catid=$('#category_product').val();
                var energyid=$('#energy').val();
                var height=$('#height').val();
                $.ajax({
                    url:'/ajax/product/cart/getfeture',
                    type:'post',
                    dataType:'json',
                    data:{type:'width',catid:catid,energyid:energyid,height:height},
                    success:function(response){
                        $('#width').html(response.option);
                        $('#width').prop("disabled", false);
                    }
                })
            })
            $('#width').change(function(){
                resetWhenChange('#width');
                if($(this).val()=="") return false;

                var catid=$('#category_product').val();
                var energyid=$('#energy').val();
                var height=$('#height').val();
                var width=$('#width').val();
                $.ajax({
                    url:'/ajax/product/cart/getfeture',
                    type:'post',
                    dataType:'json',
                    data:{type:'maximum_charge',catid:catid,energyid:energyid,height:height,width:width},
                    success:function(response){
                        $('#maximum_charge').html(response.option);
                        $('#maximum_charge').prop("disabled", false);
                    }
                })
            })
            $('#maximum_charge').change(function(){
                resetWhenChange('#maximum_charge');
                if($(this).val()=="") return false;

                var catid=$('#category_product').val();
                var energyid=$('#energy').val();
                var height=$('#height').val();
                var width=$('#width').val();
                var maximum_charge=$('#maximum_charge').val();
                $.ajax({
                    url:'/ajax/product/cart/getfeture',
                    type:'post',
                    dataType:'json',
                    data:{type:'maximum_range',catid:catid,energyid:energyid,height:height,width:width,maximum_charge:maximum_charge},
                    success:function(response){
                        $('#maximum_range').html(response.option);
                        $('#maximum_range').prop("disabled", false);
                    }
                })
            })
        })

        $('#add-option').click(function(){
            var obj=$(this);
            obj.prop('disabled',true);
            var data={};
            for(i=0;i<inputs.length;i++){
                data[inputs[i]]= $(inputs[i]).val();

            }
            $.ajax({
                url:'/ajax/product/cart/add_option',
                type:'post',
                data:data,
                success:function(response){
                    obj.prop('disabled',false);
                    $('#edit-submitted-step-content-step-1-items').html(response);
                }
            })
        })

        function resetWhenChange(id){
            $('#product-cart-result-search').html("");
            if(id=='#category_product'){
                $('#add-option').prop('disabled',true);
            }else{
                $('#add-option').prop('disabled',false);
            }
            for(start=(inputs.indexOf(id)+1);start<inputs.length;start++){
                var id_next=inputs[start];
                $(id_next).find('.option-value').remove();
                $(id_next).prop("disabled", true);
            }
        }
    })(jQuery)
</script>