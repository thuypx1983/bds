<?php
$ar_compare=array(
    1=>array('title'=>t('Compare platform')),
    2=>array('title'=>t('Compare mini crane')),
    3=>array('title'=>t('Compare Industrial Forklift and Telehandler and Trollet Rotary')),
    4=>array('title'=>t('Compare Lifting Platforms')),
)
?>
<div class="block-compare">
    <div class="title_compare">
        <span><?php echo t('Comparateur');?></span>
    </div>
    <div class="product-compare-list">
        <ul class="list-products-compare">
            <?php
            foreach ($ar_compare as $i=>$value) {
                ?>
                <li>
                    <a href="<?php echo url('compare/'.$i)?>"><div class="product-title"><?php echo $value['title']?></div></a>

                </li>
            <?php
            }
            ?>
        </ul>
    </div>
</div>