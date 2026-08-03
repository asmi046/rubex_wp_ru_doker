<?php

function tg_text_clear($text){
	$result = str_replace(["<br/>", "<br>"],"\n\r", $text);
	$result = str_replace("<h1>","", $result);
	$result = str_replace("</h1>", "\n\r", $result);
	$result = str_replace("strong>", "b>", $result);
	$result = str_replace("&nbsp;", " ", $result);
	return $result;
}

function message_to_telegram($text)
{
	// $arr_chat = TELEGRAM_IDS;
	// if($arr_chat) {

	// 	$arr_chat = explode(",",$arr_chat);
	//     $ch = curl_init();
		
	// 	for ($i = 0; $i<count($arr_chat); $i++) {
	// 	    curl_setopt_array(
	// 	        $ch,
	// 	        array(
	// 	            CURLOPT_URL => 'https://api.telegram.org/bot' . TELEGRAM_TOKEN . '/sendMessage',
	// 	            CURLOPT_POST => TRUE,
	// 	            CURLOPT_RETURNTRANSFER => TRUE,
	// 	            CURLOPT_TIMEOUT => 10,
	// 	            CURLOPT_POSTFIELDS => array(
	// 	                'chat_id' => trim($arr_chat[$i]),
	// 	                'text' => tg_text_clear($text),
	// 					'parse_mode' => "html",
	// 	            ),
	// 	        )
	// 	    );
	// 	    $output = curl_exec($ch);
	// 	}
	// }
}