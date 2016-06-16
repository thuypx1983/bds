

    <table class="tbl-cart-products" border="1" style="width: 100%">
        <thead>
        <tr>
            <td><?php echo t('Category')?></td>
            <td><?php echo t('Type de Machine')?></td>
            <td><?php echo t('Durée prévisionelle (jours)')?></td>
            <td><?php echo t('quantity')?></td>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach($products as $product){
            $term=taxonomy_term_load($product->field_category['und'][0]['tid']);
            ?>
            <tr>
                <td><?php echo $term->name?></td>
                <td><?php echo $product->title?></td>
                <td><input type="number" min="1" name="duration_<?php echo $product->nid?>" value="1"></td>
                <td>
                    <a href="<?php echo file_create_url($product->field_file['und'][0]['uri'])?>"><?php echo t('Download pdf')?></a>
                </td>
                <td><a data-pid="<?php echo $product->nid?>" class="btn-cart-remove" type="option" href="javascript:void(0)">Remove</a></td>
            </tr>
        <?php
        }
        foreach($options as $option){

            ?>
            <tr>
                <td><?php echo $option['category_product'][$language]->name?></td>
                <td>
                    Energy:<?php echo $option['energy'][$language]->name?>
                    <br/>
                    Height:<?php echo $option['height']?>
                    <br/>
                    Width:<?php echo $option['width']?>
                    <br/>
                    Max Charge:<?php echo $option['maximum_charge']?>
                    <br/>
                    Max Range:<?php echo $option['maximum_range']?>
                </td>
                <td><input type="number" min="1" name="duration_<?php echo $product->nid?>" value="1"></td>
                <td>
                </td>
                <td><a data-pid="<?php echo $option['id']?>" class="btn-cart-remove" type="option" href="javascript:void(0)">Remove</a></td>
            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
    <script>
        (function($){
            $(document).ready(function(){
                $('.btn-cart-remove').click(function(){
                    var pdid=$(this).attr("data-pid");
                    var type=$(this).attr("type");
                    var obj=$(this);
                    $.ajax({
                        url:'/ajax/product/cart/remove',
                        type:'post',
                        data:{nid:pdid,type:type},
                        success:function(response){
                            obj.parent().parent().remove();
                        }
                    })
                })

            })
        })(jQuery)
    </script>