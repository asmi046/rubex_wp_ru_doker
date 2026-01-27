<?php
/*
* Template Name: Конвейерная лента (из базы магазина) 
*/
get_header();
?>

<?
        $param = explode("ТУ", urldecode(get_query_var("tovname")));

        $standart = "ТУ".$param[1]; 
        $nam = $param[0]; 

        $namParam = explode("-", $nam);
        $bltType = $namParam[0]; 
        $bltH = $namParam[1]; 
        $bltProcladok = $namParam[2]; 
        
        $nextIndex = 5;
        if ($namParam[3] === "БКНЛ")
        {
            $bltTkan = $namParam[3]."-".$namParam[4];
            $nextIndex = 5;
        } else {
            $bltTkan = $namParam[3]."-".$namParam[4]."-".$namParam[5]; 
            $nextIndex = 6;
        }

        $bltTro = $namParam[$nextIndex]; 
        $bltTnro = $namParam[$nextIndex+1]; 
        $bltRuberType = $namParam[count($namParam)-3]."-".$namParam[count($namParam)-2]; 
        $bltBort = $namParam[count($namParam)-1]; 

        $q = "SELECT * FROM `wp_im_product_info` where `product` = '".$standart."'";
        $tovarDescr = $wpdb->get_results($q);

        $q = 'SELECT * FROM `wp_im_product_transfer` WHERE `gost` = "'.$standart.'" AND `geo` = "КРТ"  AND `name` LIKE "%'.$nam.'%"';
        $tovarPrice = $wpdb->get_results($q);



?>
    <div id="content" class="site-content product-page">


        <div class="container">
            <ul itemscope itemtype="https://schema.org/BreadcrumbList" class = "breadcrumbs_new">
                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <a href="<?bloginfo("url")?>" title = "Главная" itemprop="item">
                        <span itemprop="name">Главная</span>
                        <meta itemprop="position" content="0">
                    </a>
                </li>

                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <a href="<? echo get_the_permalink( 21982 ) ?>" title = "Каталог" itemprop="item">
                        <span itemprop="name">Каталог</span>
                        <meta itemprop="position" content="1">
                    </a>
                </li>

                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <a href="<? echo get_the_permalink( 21984 ) ?>" title = "Конвейерные ленты" itemprop="item">
                        <span itemprop="name">Конвейерные ленты</span>
                        <meta itemprop="position" content="2">
                    </a>
                </li>

                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <a href="#" title = "Лента конвейерная резинотканевая <?php echo $nam." ".$standart; ?>" itemprop="item">
                        <span itemprop="name">Лента конвейерная резинотканевая <?php echo $nam." ".$standart; ?></span>
                        <meta itemprop="position" content="3">
                    </a>
                </li>

            </ul>
        </div>

        <div class="container">
            <div class="category-wrapper open_category_wrapper" itemscope="" itemtype="http://schema.org/Product"> 
                <h1 itemprop="name" >Конвейерная лента <? echo $standart." ".$nam ?></h1>
                <div class="blt_info">
                    <div class = "img">
                        <img itemprop="image" src = "<?php echo get_bloginfo("template_url")."/img/magazin/tovar/".$tovarDescr[0]->images_lnk; ?>" title = "Лента конвейерная резинотканевая <?php echo $nam." ".$standart; ?>" />
                    </div>
                    <div class = "info">
                        <p itemprop="description" >
                            <?echo $tovarDescr[0]->plane_text?>
                        </p>

                        <div class="price_blk" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
                        
                            <div class="upblk">
                                <!-- <span itemprop="availability" href="http://schema.org/InStock" class="open_nal">В наличии</span> -->
                                <span itemprop="availability" href="http://schema.org/PreOrder" class="open_zak">Под заказ</span>
                            </div>
                            
                            <div class="downblk">
                                <div class="price_cer">
                                    <span itemprop="price"><?echo $tovarPrice[0]->min_price;?></span> <span class = "rub">₽</span>*

                                    <span style = "display:none" itemprop="priceCurrency">RUB</span>
                                </div>

                                <div class="price_btn">
                                    <a href="<?echo get_the_permalink( 20700 );?>" class="trueButton">Купить оптом</a>
                                </div>
                            </div>

                        </div>

                        <span class="snoska snoska_open">
                            * - приведена минимальная оптовая цена, для постоянных клиентов действует система лояльности 
                        </span>

                        <h2>Характеристики конвейерной ленты</h2>

                        <div class = "parametrs">
                            <div class="one_param">
                                <span>Наменклатура</span>
                                <span itemprop="model"><? echo $nam;?></span>
                            </div>
                            
                            <div class="one_param">
                                <span>Стандарт</span>
                                <span><? echo $standart;?></span>
                            </div>
                            
                            <div class="one_param">
                                <span>Производитель</span>
                                <span  itemprop="brand">Курскрезинотехника</span>
                            </div>
                            
                            <div class="one_param">
                                <span>Ширина ленты</span>
                                <span><? echo $bltH;?></span>
                            </div>
                            
                            <div class="one_param">
                                <span>Колличество прокладок</span>
                                <span><? echo $bltProcladok;?></span>
                            </div>
                            
                            <div class="one_param">
                                <span>Ткань</span>
                                <span><? echo $bltTkan;?></span>
                            </div>
                            
                            <div class="one_param">
                                <span>Толщина рабочей обкладки</span>
                                <span><? echo $bltTro;?></span>
                            </div>
                            
                            <div class="one_param">
                                <span>Толщина нерабочей обкладки</span>
                                <span><? echo $bltTnro;?></span>
                            </div>
                            
                            <div class="one_param">
                                <span>Тип резины</span>
                                <span><? echo $bltRuberType;?></span>
                            </div>
                            
                            <div class="one_param">
                                <span>Борт</span>
                                <span><? echo $bltBort;?></span>
                            </div>
                        </div>
                    
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <h2>Похожие товары</h2>
            <div class="category-list category-list-open">
                <?
                    $q = 'SELECT * FROM `wp_im_product_transfer` LEFT JOIN `wp_im_product_info` ON `product` = `gost` WHERE `gost` = "'.$standart.'" AND `geo` = "КРТ" ORDER BY RAND() LIMIT 3';
                    $upsale = $wpdb->get_results($q);
                    foreach ($upsale as $us) {
                        $url = get_the_permalink().$us->name;
                        $ta = "Лента конвейерная резинотканевая ".$us->name;
                ?>

                    <div class="category-list__item">
                        <a href="<?echo $url; ?>">		
                            <!-- <div class="category-list__photo" style="background-image: url(https://rubexgroup.ru/wp-content/uploads/2020/04/belts-tkan.jpg)"></div>	 -->
                            <img class="category-list__photo" src="<?php echo get_bloginfo("template_url")."/img/magazin/tovar/".$us->images_lnk; ?>" alt="<? echo $ta; ?>" title="<? echo $ta; ?>">
                        </a>
                        
                        <a href="<?echo $url; ?>">
                            <h3 class="category-list__title"><?echo $ta; ?></h3>	
                        </a>	
                        
                        <div class = "price price_open">
                            от <?echo $us->min_price;?> <span class = "rub">₽</span>
                        </div>

                        <div class="category-list__descr">
                            <p><? echo mb_substr($us->plane_text, 0, 120); ?></p>
                        </div>
                    
                        <a href="<?echo $url; ?>" class="main-catalog__photo-link">Подробнее</a>
                    </div>
                <?
                }
                ?>
            </div>
        </div>    

    </div>
<?php
get_footer();
