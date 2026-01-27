<?php

add_action( 'rest_api_init', function () {
    register_rest_route( 'product/v2', '/namenclatura', array(
        'methods'  => 'GET',
        'callback' => 'pb_namenclatura',
        'args' => array(
        ),
    ) );

});

//https://rubexgroup.ru/wp-json/product/v2/namenclatura
function pb_namenclatura( WP_REST_Request $request ){
    global $wpdb;
    $categories = $wpdb->get_results("SELECT COUNT(*) as `products_count`, `ukrnam` FROM `wp_im_product_transfer` GROUP BY `ukrnam`");

    $result = [];

    foreach ($categories as $item) {

        if ($item->ukrnam === "") continue;
        $gosts = $wpdb->get_results('SELECT `gost` FROM `wp_im_product_transfer` WHERE `ukrnam` = "'. $item->ukrnam .'" GROUP BY `gost`;');
        $result[] = [
            'name' => $item->ukrnam,
            'products_count' => $item->products_count,
            'gosts' => $gosts 
        ];
    }

    return $result;
}


add_action( 'rest_api_init', function () {
    register_rest_route( 'product/v2', '/gost_info', array(
        'methods'  => 'GET',
        'callback' => 'pb_gost_info',
        'args' => array(
            'gost' => array(
                'required'          => true,        		
            )
        ),
    ) );

});

//https://rubexgroup.ru/wp-json/product/v2/gost_info
function pb_gost_info( WP_REST_Request $request ){
    global $wpdb;
    $gost = $wpdb->get_results('SELECT * FROM `wp_im_product_info` WHERE `product` = "'. $_REQUEST['gost'] .'"');

    $postDesct = get_post($gost[0]->inform_elem_id, ARRAY_A);

    $result = [
        'gost' => $gost[0]->product,
        'description' => $gost[0]->plane_text,
        'img' => get_bloginfo("template_url")."/img/magazin/tovar/".$gost[0]->images_lnk,
        'info' => apply_filters('the_content', $postDesct["post_content"])
    ];

    return $result;
}
