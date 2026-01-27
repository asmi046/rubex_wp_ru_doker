<?php

global $query_string;
parse_str($query_string, $args);	

	$sort_param_name = "_sort_catalog";
	if( is_category( 18 ) || is_category( 225 ) || is_category( 21 )|| is_category( 19 )){ 
		$sort_param_name = "_sort_category_main";
	}


	$metaquery = array(
		'orderCatM' => array (
			'key'     => $sort_param_name,
			'compare' => 'EXIST',
			'type'    => 'NUMERIC',
		)
	);


	$args['meta_query'] = $metaquery;
	$args['orderby'] =	"orderCatM";
	$args['order'] = "ASC";

	query_posts( $args );
	
?>