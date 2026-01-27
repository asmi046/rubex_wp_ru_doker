<?php
/*
* Template Name: Категория Конвейерная лента (из базы магазина) 
*/
get_header();
?>

<?
global $wpdb;
    $q = 'SELECT * FROM `wp_im_product_transfer` LEFT JOIN `wp_im_product_info` ON `product` = `gost` WHERE `ukrnam` = "Лента конвейерная с текстилем" AND `geo` = "КРТ"';
    $allpage = $wpdb->get_results($q);
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
            </ul>
        </div>

        <div class="container">
            <h1>Ленты конвейерные резинотканевые</h1>

            <div class="catalog_list_descr">
                <div class="img_blk">
                    <img src="<?echo get_bloginfo( "template_url" )?>/img/magazin/tovar/belts-tkan.jpg" alt="Ленты конвейерные резинотканевые">
                </div>
                
                <div class="descr">
                    <p>Облегченные и легкие конвейерные ленты производства завода "Курскрезинотехника". Данные ленты предназанченны для легких условий эксплуатации без активной внешней среды и серьезного механического воздействия.</p>
                    <p>Наше предприятие предлагает широкий ассортимент резинотканевых лент с различьными характеристиками.</p>
                </div>
                 
            </div>
        </div>
        
        <div class="container imTovarTables">
            
            <table class = "imAssortimentTable product-main__table">
                <thead>
                    <tr class = "t-head-dark thead-img">
                        <th>Фото</th>
                        
                        <th>Наименование</th>
                        <th>Стандарт</th>
                        <th>Цена</th>
                    </tr>
                </thead>

                <tbody>
                    <?
                        foreach ($allpage as $ap) {
                            $urlMain = get_the_permalink(21986).$ap->name;
                    ?>
                        <tr>
                            <td>
                                <a href="<?php echo $urlMain; ?>">
                                    <img class = "open_table_img" src="<?php echo get_bloginfo("template_url")."/img/magazin/tovar/".$ap->images_lnk; ?>" 
                                        alt = "Лента конвейерная резинотканевая <?php echo $ap->name; ?>"
                                        title = "Лента конвейерная резинотканевая <?php echo $ap->name; ?>">
                                </a>
                            </td>
                            
                            <td>
                                <a href="<?php echo $urlMain; ?>"><?php echo $ap->name; ?></a>
                            </td>
                            
                            <td><?php echo $ap->gost; ?></td>

                            <td><?php echo $ap->min_price; ?> <span class = "rub">₽</span>*</td>
                        </tr>
                    <?
                        }
                    ?>
                </tbody>
            </table>

            <span class="snoska snoska_open">
                * - приведена минимальная оптовая цена, для постоянных клиентов действует система лояльности 
            </span>
        </div>    

    </div>
<?php
get_footer();
