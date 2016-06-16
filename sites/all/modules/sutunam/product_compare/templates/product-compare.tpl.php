<?php
    $fields_new=array();
    foreach($fields as $name=>$value){
        $fields_new[$name]=$value;
        if($name=='field_image'){
            $fields_new['']=array('label'=>'','field_name'=>'cart');
        }
    }
?>

<?php
    $column ="";
     foreach($item_list as $node){
        $column_header="";
        $column_sub="";
          $column_sub.='
            <ul class="cd-features-list">';
             $column_sub.= '<li>'.$node->title.'</li>';
             foreach($fields_new as $field){
                $field_name=$field['field_name'];
                $item=$node->$field_name;

                switch ($field_name){
                case 'field_image':
                    $img_url = $item[LANGUAGE_NONE][0]['uri'];
                    $column_header.= '<img src="'.image_style_url("thumbnail", $img_url).'" />';
                    break; 
                case 'field_engine':
                case 'field_category':
                    $term = taxonomy_term_load($item[LANGUAGE_NONE][0]['tid']);
                    $column_sub.= '<li>'.$term->name.'</li>';
                    break;
                case 'field_file':
                    if($node->field_file){
                    $file=file_create_url($node->field_file['und'][0]['uri']);
                    $column_sub.= '<li><a href="'.$file.'"><img class="file-icon" src="/modules/file/icons/application-pdf.png" title="application/pdf" alt="PDF icon">'.t('Download PDF').'</a></li>';
                    }else{ $column_sub.= '<li></li>';}
                    break;
                case 'cart':
                    $column_sub.= '<li class="line-button-cart">
                        <div class="product-cart-add">
                            <button class="btn-product-cart" data-pid="'.$node->nid.'">
                                <span>'.t('Ajouter au devis').'</span>
                            </button>
                        </div>
                    </li>';
                    break;
                default:
                    $column_sub.= '<li>'.($item?$item[LANGUAGE_NONE][0]['value']:'--').'</li>';
                    break;
             }
            }
          $column_sub.='<li><a href="'.url('node/'.$node->nid).'">'.t('Voir la fiche détaillée').'</a></li></ul>';
          $column.='<li class="product"><div class="top-info"><div class="check"></div>'.$column_header.'</div>'.$column_sub.'</li>';  
        }
    ?>
<section class="cd-intro">
    </section> <!-- .cd-intro -->

    <section class="cd-products-comparison-table">
        <header>
            <div class="actions">
                <a href="#0" class="reset">Reset</a>
                <a href="#0" class="filter">Filter</a>
            </div>
        </header>

        <div class="cd-products-table">
            <div class="features">
                <div class="top-info">Masquer les images</div>
                <ul class="cd-features-list">
                    <li>Model</li>
                    <?php
                        foreach($fields_new as $field){
                            if($field['label']=='image'){
                                echo "";
                            }else{
                                echo "<li>".t($field['label'])."</li>";
                            }
                        } 

                    ?>
                    <li></li>
                </ul>
            </div> <!-- .features -->
            
            <div class="cd-products-wrapper">
                <ul class="cd-products-columns">
                    <?php echo $column?></ul>                
            </div> <!-- .cd-products-wrapper -->
            
            <ul class="cd-table-navigation">
                <li><a href="#0" class="prev inactive">Prev</a></li>
                <li><a href="#0" class="next">Next</a></li>
            </ul>
        </div> <!-- .cd-products-table -->
    </section>