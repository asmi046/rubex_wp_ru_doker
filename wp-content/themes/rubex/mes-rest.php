<?

define("MES_SERVICE_DB_NAME", "krtiru_tracking");
define("MES_SERVICE_USER_NAME", "krtiru_tracking");
define("MES_SERVICE_USER_PASS", "3P75LXhUIDmU");
define("MES_SERVICE_DB_HOST", "localhost");

add_action( 'rest_api_init', function () {
	register_rest_route( 'mes/v2', '/userautorizationmes', array(
		'methods'  => 'GET',
		'callback' => 'user_autorizationmes',
		'args' => array(
			'autinfo' => array(
				'default'           => null,
				'required'          => true,        		
			)
		),
	) );
});

//http://rubexgroup.ru/wp-json/mes/v2/userautorizationmes?autinfo=null
//https://rubexgroup.ru/wp-json/mes/v2/userautorizationmes?autinfo[mail]=asmi046@gmail.com&autinfo[pass]=1111
function user_autorizationmes( WP_REST_Request $request) {
	
	
	$autinfo = json_decode($request["autinfo"], true);
	
	if (empty($autinfo))
		$autinfo = $request["autinfo"];

	if (empty($autinfo)) return new WP_Error( 'no_user_data', 'Учетные данные не переданы.', [ 'status' => 403 ] );
	
	$mail = $autinfo["mail"];
	$password = $autinfo["pass"];
	
	$serviceBase = new wpdb(MES_SERVICE_USER_NAME, MES_SERVICE_USER_PASS, MES_SERVICE_DB_NAME, MES_SERVICE_DB_HOST);
	
	// return array ("SELECT * FROM `trk_users` WHERE `login` = '".$mail."' AND `pass` =  '".$password."'");

	$user_feeld =  $serviceBase->get_results("SELECT * FROM `trk_users` WHERE `login` = '".$mail."' AND `pass` =  '".$password."'");

		if (!empty($user_feeld)) {
			  
			return $user_feeld[0];	

		} else {
			return new WP_Error( 'no_user', 'Пользоватея с такими данными нет в системе.', [ 'status' => 403 ] );
		}


}


add_action( 'rest_api_init', function () {

	register_rest_route( 'mes/v2', '/get_timeline', array(
		'methods'  => 'GET',
		'callback' => 'get_timeline',
		'args' => array(
			'guid' => array(
				'default'           => null,
				'required'          => true,        		
			)
		),
	) );

});

//http://rubexgroup.ru/wp-json/mes/v2/get_timeline?guid=aa30fea8-ce90-11eb-80f9-90b11c05915c
function get_timeline( WP_REST_Request $request ){

	$mesBase = new wpdb(MES_SERVICE_USER_NAME, MES_SERVICE_USER_PASS, MES_SERVICE_DB_NAME, MES_SERVICE_DB_HOST);
	
	$timeline = $mesBase->get_results("SELECT * FROM `trk_timetable` WHERE `id_guid` = '".$request['guid']."' ORDER BY `operation_number`");
	$orderInfo = $mesBase->get_results("SELECT * FROM `trk_order` WHERE `number` = '".$timeline[0]->order_number."'");
	
	
	for ($i = 0; $i<count($timeline); $i++) {
		$statuses = $mesBase->get_results("SELECT * FROM `trk_status` WHERE `work_centers` = '".$timeline[$i]->work_centers."'");
		$timeline[$i]->fix_statuses = $statuses;
		
		$diff = $mesBase->get_results("SELECT * FROM `trk_diffects` WHERE `work_centers` LIKE '".$timeline[$i]->work_centers."'");
		for ($j = 0; $j < count($diff); $j++) {
			$diff[$j]->checed = false;
		}
		$timeline[$i]->diffects = $diff;
	}	

    $rezTable = array(
        "head" => [
            "order_number" =>  $timeline[0]->order_number,
            "nam" =>  $timeline[0]->nam,
            "contragent" =>  $orderInfo[0]->contragent,
            "sp" =>  $timeline[0]->sp,
            "plan_data" =>  $orderInfo[0]->plan_data,
            "calc_data" =>  $orderInfo[0]->calc_data,
            "count" =>$timeline[0]->count,
            "buhta_number" =>$timeline[0]->buhta_number,
            "description_krt" =>$timeline[0]->description_krt,
            "work_centers" =>$timeline[0]->work_centers,
        ],
        "timeline" => $timeline,
    );

	if ( empty( $timeline ) )
		return new WP_Error( 'no_author_posts', 'Данные не найдены', [ 'status' => 404 ] );
	
	return $rezTable;
}


add_action( 'rest_api_init', function () {

	register_rest_route( 'mes/v2', '/set_fix', array(
		'methods'  => 'GET',
		'callback' => 'set_fix',
		'args' => array(
			'id_list' => array(
				'default'           => null,
				'required'          => true,        		
			),

			'status' => array(
				'default'           => null,
				'required'          => true,        		
			)
		),
	) );

});

//http://rubexgroup.ru/wp-json/mes/v2/set_fix?id_list[0]=1&id_list[1]=2&status=Выполнено
function set_fix( WP_REST_Request $request ){
	$mesBase = new wpdb(MES_SERVICE_USER_NAME, MES_SERVICE_USER_PASS, MES_SERVICE_DB_NAME, MES_SERVICE_DB_HOST);

	$controlRez = array();

	foreach ($request['id_list'] as $elem) {
		$rezUpdate = $mesBase->update("trk_timetable", array("fixation" =>1, "fact_data" => date('Y-m-d H:i:s'), "fixation_status" =>  $request['status']), array("id" => $elem));
		
		if (!empty($rezUpdate))
		{
			$controlRez[] = $rezUpdate;
		}
	}

	return $controlRez;
}


add_action( 'rest_api_init', function () {

	register_rest_route( 'mes/v2', '/set_start', array(
		'methods'  => 'GET',
		'callback' => 'set_start',
		'args' => array(
			'id' => array(
				'default'           => null,
				'required'          => true,        		
			)
		),
	) );

});

//http://rubexgroup.ru/wp-json/mes/v2/set_start?id=1
function set_start( WP_REST_Request $request ){
	$mesBase = new wpdb(MES_SERVICE_USER_NAME, MES_SERVICE_USER_PASS, MES_SERVICE_DB_NAME, MES_SERVICE_DB_HOST);

	$controlRez = array();

	$rezUpdate = $mesBase->update("trk_timetable", array("started" =>1, "started_data" => date('Y-m-d H:i:s')), array("id" => $request['id']));

	return $rezUpdate;
}

add_action( 'rest_api_init', function () {

	register_rest_route( 'mes/v2', '/get_timetable', array(
		'methods'  => 'GET',
		'callback' => 'get_timetable',
		'args' => array(
			'search_str' => array(
				'default'           => null,
				'required'          => true,        		
			)
		),
	) );

});

//http://rubexgroup.ru/wp-json/mes/v2/get_timetable?search_str=1
function get_timetable( WP_REST_Request $request ){
	$mesBase = new wpdb(MES_SERVICE_USER_NAME, MES_SERVICE_USER_PASS, MES_SERVICE_DB_NAME, MES_SERVICE_DB_HOST);

	$sstr = (empty($request['search_str']))?"%":$request['search_str'];

	$timeline = $mesBase->get_results("SELECT `trk_timetable`.*, `trk_order`.`contragent` , `trk_order`.`plan_data` , `trk_order`.`calc_data` FROM `trk_timetable` LEFT JOIN `trk_order` ON `trk_order`.`number` = `trk_timetable`.`order_number` WHERE `order_number` LIKE '%".$sstr."%' OR `nam` LIKE '%".$sstr."%' OR `sp` LIKE '%".$sstr."%' OR `buhta_number` LIKE '%".$sstr."%' OR `contragent` LIKE '%".$sstr."%' group BY `id_guid`");

	$rez = array();
	foreach ($timeline as $el)
	{
		$rez[ $el->order_number ]["order_number"] = $el->order_number;
		$rez[ $el->order_number ]["contragent"] = $el->contragent;
		$rez[ $el->order_number ]["plan_data"] = $el->plan_data;
		$rez[ $el->order_number ]["calc_data"] = $el->calc_data;
		$rez[ $el->order_number ]["show"] = false;
		$rez[ $el->order_number ]["elements"][] = $el;
	}


	return $rez;
}

add_action( 'rest_api_init', function () {

	register_rest_route( 'mes/v2', '/get_workcenters', array(
		'methods'  => 'GET',
		'callback' => 'get_workcenters',
		'args' => array(
			'supdevision' => array(
				'default'           => null,
				'required'          => true,        		
			)
		),
	) );

});

//http://rubexgroup.ru/wp-json/mes/v2/get_workcenters?supdevision=0
function get_workcenters( WP_REST_Request $request ){
	$mesBase = new wpdb(MES_SERVICE_USER_NAME, MES_SERVICE_USER_PASS, MES_SERVICE_DB_NAME, MES_SERVICE_DB_HOST);

	$supdev = (empty($request['supdevision']))?"%":$request['supdevision'];

	$workcenters = $mesBase->get_results("SELECT * FROM `trk_work_centers` WHERE `subdivisions_name` LIKE '".$supdev."' GROUP BY `name`");

	return $workcenters;
}

add_action( 'rest_api_init', function () {

	register_rest_route( 'mes/v2', '/get_workcenter', array(
		'methods'  => 'GET',
		'callback' => 'get_workcenter',
		'args' => array(
			'rpdata' => array(
				'default'           => null,
				'required'          => true,        		
			),
			'center' => array(
				'default'           => null,
				'required'          => true,        		
			)
		),
	) );

});

//http://rubexgroup.ru/wp-json/mes/v2/get_workcenter?rpdata=&center=ц. 2 Пресс 15
function get_workcenter( WP_REST_Request $request ){
	$mesBase = new wpdb(MES_SERVICE_USER_NAME, MES_SERVICE_USER_PASS, MES_SERVICE_DB_NAME, MES_SERVICE_DB_HOST);

	$wc = (empty($request['center']))?"%":$request['center'];
	$data = (empty($request['rpdata']))?"CURDATE()":"'".$request['rpdata']."'";

	$q = "SELECT CONVERT(`trk_timetable`.`start_data`, DATE) as `s_data` FROM `trk_timetable` WHERE `work_centers` = '".$wc."' GROUP BY `s_data` ORDER BY `s_data`";
	$dates = $mesBase->get_results($q);
	$workcenter = $mesBase->get_results("SELECT `trk_timetable`.*, `trk_order`.`contragent` , `trk_order`.`plan_data` FROM `trk_timetable` LEFT JOIN `trk_order` ON `trk_order`.`number` = `trk_timetable`.`order_number` WHERE `work_centers` = '".$wc."' AND DATE(`start_data`) = ".$data." ORDER BY `start_data`");

	for ($i = 0; $i<count($workcenter); $i++) {
		$statuses = $mesBase->get_results("SELECT * FROM `trk_status` WHERE `work_centers` = '".$workcenter[$i]->work_centers."'");
		$workcenter[$i]->fix_statuses = $statuses;
		
		$diff = $mesBase->get_results("SELECT * FROM `trk_diffects` WHERE `work_centers` LIKE '".$workcenter[$i]->work_centers."'");
		for ($j = 0; $j < count($diff); $j++) {
			$diff[$j]->checed = false;
		}
		$workcenter[$i]->diffects = $diff;
	}	

	return array("q" => $q,"dates" =>$dates, "timeline" => $workcenter);
}


add_action( 'rest_api_init', function () {

	register_rest_route( 'mes/v2', '/get_tablo', array(
		'methods'  => 'GET',
		'callback' => 'get_tablo',
		'args' => array(
			'group' => array(
				'default'           => "",
				'required'          => true,        		
			)
		),
	) );

});

//http://rubexgroup.ru/wp-json/mes/v2/get_tablo?rpdata=&group=Ц.2 Пресса
function get_tablo( WP_REST_Request $request ){
	$mesBase = new wpdb(MES_SERVICE_USER_NAME, MES_SERVICE_USER_PASS, MES_SERVICE_DB_NAME, MES_SERVICE_DB_HOST);

	$group = (empty($request['group']))?"%":$request['group'];
	
	$group_center = $mesBase->get_results("SELECT * FROM `trk_work_centers` WHERE `replace_group` = '".$group."'"); 
	
	$result = [];
	foreach($group_center as $center) {
		
		$result_center = [];

		$q = "SELECT `trk_timetable`.*, `trk_order`.`contragent` , `trk_order`.`plan_data` FROM `trk_timetable` LEFT JOIN `trk_order` ON `trk_order`.`number` = `trk_timetable`.`order_number` WHERE `work_centers` = '".$center->name."'  ORDER BY `start_data` DESC LIMIT 2";
		$workcenter = $mesBase->get_results($q);
		
		if (empty($workcenter)) continue;

		$result_center[] = $workcenter[0];
		
		if (!empty($workcenter[0]->started) && (count($workcenter) > 1))
			$result_center[] = $workcenter[1];

		$result[$center->name] = $result_center;
	}

	return array("timeline" => $result);
}

add_action( 'rest_api_init', function () {

	register_rest_route( 'mes/v2', '/fix_diffect', array(
		'methods'  => 'GET',
		'callback' => 'fix_diffect',
		'args' => array(
			'fixdata' => array(
				'default'           => null,
				'required'          => true,        		
			)
		),
	) );

});

//http://rubexgroup.ru/wp-json/mes/v2/fix_diffect?fixdata=null
function fix_diffect( WP_REST_Request $request ){
	$mesBase = new wpdb(MES_SERVICE_USER_NAME, MES_SERVICE_USER_PASS, MES_SERVICE_DB_NAME, MES_SERVICE_DB_HOST);

	if ( empty( $request['fixdata'] ) )
		return new WP_Error( 'no_data', 'Данные не переданы', [ 'status' => 404 ] );

	foreach ($request['fixdata'] as $element) {
		$mesBase->insert('trk_fixed_diffects',array(
			"metr" => $element["metr"],
			"order_number" => $element["orderNumber"],
			"buhta_number" => $element["buhtaNumber"],
			"work_centers" => $element["workCenter"],
			"diffect" => $element["diffect"],
			"comment" => $element["comment"],
		));
	}

	return array("fixed" => $request['fixdata']);
}

?>