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
     <div class="product-cart-popup">
        <div class="product-cart-popup-title">
            <span><?php echo t('VOTRE MACHINE A BIEN ÉTÉ AJOUTÉ A VOTRE')?></span>
        </div>
        <ul class="product-cart-lists">
            <?php
            foreach ($item_list as $tid=>$items) {
                $term=taxonomy_term_load($tid);
                foreach($items as $node){
                ?>
                <li>
                    <div class="product-title"><?php echo $term->name?> - <?php echo $node->title?></div>
                </li>
            <?php
                }
            }

            ?>
        </ul>
        <div class="cart-checkout">
            <a class="bnt-continue" href="javascript:void(0)"><?php echo t('CONTINUEZ VOS RECHERCHES')?></a>
            <a href="<?php echo $url_checkout?>"><?php echo t('Finaliser votre devis')?></a>
        </div>
    </div>
</div>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('.bnt-continue').click(function(){
            jQuery.fancybox.close();
        })
    })
</script>