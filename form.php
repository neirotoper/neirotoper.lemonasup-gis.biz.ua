<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?=$_SERVER['SERVER_NAME']?></title>
	<title>Спецпредложение от нашего интернет-магазина, товары по супер цене! Скидки до 50%.</title>
	
<!-- Facebook Pixel Code -->

<!-- End Facebook Pixel Code -->
	
</head>
<body>
	<?php

	if (isValidOrderData()) {
	    sendOrderToCRM(); 
	    sendOrderToNewCRM(); 
	} else {
	    $host = $_SERVER['SERVER_NAME'];
	    $utmData = array(
	        'utm_source'   => $_REQUEST['utm_source'],
	        'utm_medium'   => $_REQUEST['utm_medium'],
	        'utm_campaign' => $_REQUEST['utm_campaign'],
	        'utm_content'  => $_REQUEST['utm_content'],
	        'utm_term'     => $_REQUEST['utm_term'],
	    );
	    $queryStr = http_build_query(array_filter($utmData));
	    $url = "http://$host?$queryStr"; 
	?>
	<h1 style="color: red;">Пожалуйста, введите телефон</h1>
	<meta content="2; url=&lt;?=$url?&gt;" http-equiv="refresh"><?php
	    }
	?>
	<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="noindex" name="robots">
	<link href="" rel="icon" type="image/x-icon">
	<link href="" rel="shortcut icon" type="image/x-icon">
	<link href="main.css" media="all" rel="stylesheet" type="text/css">
	<link href="css.сss" rel="stylesheet" type="text/css">
	<script src="jquery-2.2.2.min.js" type="text/javascript">
	</script> 
	<script src="scripts.js" type="text/javascript">
	</script>
	<style type="text/css">
	.video-container{height:0;position:relative;padding-bottom:57.7%;}.video-container iframe, .video-container object, .video-container embed{position:absolute;display:block;width:100%;height:100%;top:0;left:0;}.youtube{position:absolute;left:0;top:0;width:100%;max-width:100%;height:100%;background-color:#000;overflow:hidden;cursor:hand;cursor:pointer;}.youtube .thumb{bottom:0;display:block;left:0;margin:auto;max-width:100%;position:absolute;right:0;top:0;width:100%;height:auto}.youtube .play{filter:alpha(opacity=80);opacity:.8;height:77px;left:50%;margin-left:-38px;margin-top:-38px;position:absolute;top:50%;width:77px;background:url("success/img/youtube-play-icon.png") no-repeat}
	</style>
	

	
	<div class="section block-1">
		<div class="wrap">
			<img alt="" src="girl_wh.png">
			<div class="top-title">
				<h2>Спасибо. Ваш заказ принят!</h2>
				<div>
					Наши операторы свяжутся с вами для уточнения заказа
				</div>
				<p>Время работы операторов: 8:00 - 19:00</p>
			</div>
		</div>
	</div>
	<div class="section block-2">
		<h1>Специальное предложение для Вас!</h1>
		<h2>Добавьте к Вашему заказу другие наши товары со скидкой</h2>
	</div>
	<div class="section block-3">
		<div class="wrap">
			
			<iframe frameborder="0" height="8000px" src="https://yl-max.biz.ua/thanks?group=4" width="100%"></iframe>
			
			<!--Начало товара->
			<div class="tov-item clearfix">
				<span class="tov-item-sale"></span>
				<div class="tov-left-cont">
					<div class="tov-gal clearfix">
						<div class="tov-gal-big"><img alt="" class="image3" src="sani.jpg"></div>
					</div>
					<ul class="tov-adv clearfix">
						<li class="hint hint--top hint--info" data-hint="Гарантия возврата 14 дней"></li>
						<li class="hint hint--top hint--info" data-hint="Доставка в течение 5-10 рабочих дней"></li>
						<li class="hint hint--top hint--info" data-hint="Оплата товара при получении"></li>
					</ul>
				</div>
				<div class="tov-info">
					<h3 style="text-align: center;">Палочки для устранения засоров в трубах</h3>
					<div class="tov-info-rate"></div>
					<div class="tov-info-cost">
						<span class="old-cost">198<small>грн</small></span> <span class="new-cost">99 <small>грн</small></span>
					</div>
					<ul class="tov-info-li">
						<li>
							<p>Палочки предназначены для удаления засоров из сливов. В квартире есть много водосточных труб, каждая из которых по-своему подвергается нагрузке. В ванной – волосы, на кухне – плотные наслоения жира</p>
						</li>
						<li>Удаляют существующие засоры.</li>
						<li>Растворяют жир, волосы и другую органику.</li>
						<li>Препятствуют образованию новых отложений.</li>
						<li>Борются с известковым налетом.</li>
						<li>Удаляют неприятные запахи из слива.</li>
					</ul>
				</div>
			</div>
			<!--Конец товара-->
			
		</div>
	</div>
	<div class="section footer">
		<div class="wrap clearfix">
			<div class="left clearfix foot-logo">
				<p><b>Интернет-магазин</b><br>
				<br></p>
			</div>
			<div class="right">
				<p>© 2021. ВСЕ ПРАВА ЗАЩИЩЕНЫ.</p>
			</div>
		</div>
	</div>
	
	<?php

	    function sendOrderToCRM()
	    {
	        $_REQUEST['phone'] = preg_replace('/\D/', '', $_REQUEST['phone']);

	        if (empty($_REQUEST['quantity'])) {
	            $_REQUEST['quantity'] = 1;
	        }

	        $orderData = array(
	            'order_id'     => date('Y-m-d H:i:s'),
	            'site'         => $_SERVER['SERVER_NAME'], //(авто)сайт отправитель заказа
	            'product_id'   => $_REQUEST['product_id'], //код товара
	            'price'        => $_REQUEST['price'], //цена товара
	            'count'        => $_REQUEST['quantity'], //количество товара
	            'bayer_name'   => $_REQUEST['name'], // покупатель
	            'phone'        => $_REQUEST['phone'], // телефон
	            'email'        => $_REQUEST['email'], //e-mail
	            'comment'      => $_REQUEST['comment'], // комментарий
	            'total'        => $_REQUEST['price'] * $_REQUEST['quantity'],
	            'ip'           => $_SERVER['REMOTE_ADDR'], //(авто)IP-адрес клиента
	            'subject'      => $_REQUEST['subject'],
	            'utm_source'   => $_REQUEST['utm_source'],
	            'utm_medium'   => $_REQUEST['utm_medium'],
	            'utm_campaign' => $_REQUEST['utm_campaign'],
	            'utm_content'  => $_REQUEST['utm_content'],
	            'utm_term'     => $_REQUEST['utm_term'],
	        );

	        $serializedOrderData = urlencode(serialize($orderData));
	        $send = urlencode(serialize($data));
	        
	        
	        $subject = 'Заказ товара - Менажница для сухофруктов'; // заголовок письма 
	        $addressat = "china777zakaz@gmail.com"; // Электронный адрес 
	        $success_url = 'name='.$_POST['name'].'&phone='.$_POST['phone'].'&time='.$_POST['Время звонка'].'';
	        $massage = "ФИО: {$_POST['name']}\nКонтактный телефон: {$_POST['phone']}\nСайт: {$_SERVER['SERVER_NAME']}";
	        $verify = mail($addressat,$subject,$massage,"Content-type:text/plain;charset=utf-8\r\n");
	        $requestUrl = '' . urlencode(serialize($orderData));
	        file_get_contents($requestUrl);
	    }

	    function isValidOrderData()
	    {
	        return !empty($_REQUEST['phone']);
	    }

	function sendOrderToNewCRM()
	{
	    $_REQUEST['phone'] = preg_replace('/\D/', '', $_REQUEST['phone']);

	    if (empty($_REQUEST['quantity'])) {
	        $_REQUEST['quantity'] = 1;
	    }

	    //The URL that we want to send a PUT request to.
	    $url = 'http://hqnl0102899.online-vm.com/api/order';

	    //Initiate cURL
	    $ch = curl_init($url);
	    curl_setopt($ch, CURLOPT_POST, true);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	    //Our fields.
	    $fields = array(
	        "api_token" => "",
	        'site' => $_SERVER["SERVER_NAME"],
	        'name' => $_REQUEST['name'],
	        'phone' => $_REQUEST['phone'],
	        'ip' => $_SERVER["REMOTE_ADDR"],
	        'products[0][product_id]' => 599, //$_REQUEST['product_id'],
	        'products[0][price]' => 299, //$_REQUEST['price'],
	        'products[0][quantity]' => 1,
	    );

	    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);

	    //Execute the request.
	    $response = curl_exec($ch);

	    // echo "<pre style='padding:10px;border:1px dotted #000'>".print_r(curl_getinfo($ch), true)."</pre>";
	    // echo "<pre style='padding:10px;border:1px dotted #000'>".print_r($response, true)."</pre>";
	    // echo $response.'*';
	    // exit;
	}

	?>
	
</body>
</html>