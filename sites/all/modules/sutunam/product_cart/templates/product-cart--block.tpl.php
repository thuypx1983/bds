<?php
$url_checkout=url('content/devis');
?>
<div class="cart-introduction">
    <div class="cart-service">
        <?php echo t('Demande de devis')?>
        <span class="description"><?php echo t('Reponse sous 12h')?></span>
    </div>
</div>
<div class="product-cart-view">
    <?php if(count($item_list)==0){
        ?>
        <a class="cart-number cart-empty" href="javascript:void(0);">0</a>
        <?php
    }else{
     ?>
        <a class="cart-number cart-view" href="<?php echo url('content/devis')?>"><?php echo count($item_list)?></a>

    <div class="product-cart-popup">
        <div class="product-cart-popup-header">
            <div class="popup-cart-left">
                <span class="count-item"><?php echo count($item_list)?></span>
                <span class="count-title"><?php echo t('Devis')?></span>
            </div>
            <div class="popup-cart-right">
                <a id="clear-cart" href="javascipt:void(0);"><?php echo t('Clear')?></a>
            </div>
        </div>
        <div class="product-cart-popup-title">
            <span><?php echo t('Vos machines selectionneés')?></span>
        </div>
        <ul class="product-cart-lists">
            <?php
            foreach ($item_list as $tid=>$items) {
                $term=taxonomy_term_load($tid);
                echo '<li class="cart-category">'.$term->name.'</li>';
                foreach($items as $node){
                ?>
                <li>
                    <div class="product-title"><?php echo $node->title?></div>
                    <div class="product-remove">
                        <a href="<?php echo $url_checkout?>"><?php echo t('Voir fiche')?></a>
                        <!--<button class="btn-product-cart-remove" data-pid="<?php echo $node->nid?>"><?php echo t('Remove')?></button>-->
                    </div>
                </li>
            <?php
                }
            }

            ?>
        </ul>
        <div class="cart-checkout">
            <a href="<?php echo $url_checkout?>"><?php echo t('Finaliser votre devis')?></a>
        </div>
    </div>
    <?php
    }?>
</div>
<script>
    (function($){
        $(document).ready(function(){
            $('.btn-product-cart-remove').click(function(){
                var pdid=$(this).attr("data-pid");
                $.ajax({
                    url:'/ajax/product/cart/remove',
                    type:'post',
                    data:{nid:pdid},
                    success:function(response){
                        $('#block-product-cart-product-cart-block').replaceWith(response);

                    }
                })
            })
            $('#clear-cart').click(function(e){
                e.preventDefault()
                $.ajax({
                    url:'/ajax/product/cart/remove_all',
                    type:'post',
                    success:function(response){
                        $('#block-product-cart-product-cart-block').replaceWith(response);

                    }
                })
            })
        })
    })(jQuery)
</script>