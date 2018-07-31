<?php

if ($_SERVER['REQUEST_METHOD'] != "POST") {
	die("No access!");
}

if(!isset($_POST['orderID']) || empty($_POST['orderID'])) {
	$order = new Orders();
	$orderId = $order->NewOrder();
} else {
	$orderId = $_POST['orderID'];
}
$order = Orders::getOneOrder( $orderId );

//$paypalEmail = get_field('paypalemail');
$paypalEmail = get_field('paypalemail');
if(get_field('test_mod')) {
	$paypalURL = "https://sandbox.paypal.com/cgi-bin/webscr";
} else {
	$paypalURL = "https://paypal.com/cgi-bin/webscr";
}
$price = $order->price;
$itemName = "Upgrade account";
$returnUrl = "http://wmetier.page.ua/return";
$cancelUrl = "http://wmetier.page.ua/cancel";
$notifyUrl = "http://wmetier.page.ua/notify?notify";



$querystring = 'cmd=_notify-validate';

$querystring .= "?business=" . urlencode($paypalEmail) . "&";

//Добавляем сумму и валюту
$querystring .= "currency_code=" . urlencode('USD') . "&";
$querystring .= "lc=" . urlencode('US') . "&";

//остальные данные
$querystring .= "bn=" . urlencode('YourBussiness_BuyNow_WPS_US') . "&";
$querystring .= "no_note=" . urlencode('1') . "&";
$querystring .= "cmd=" . urlencode('_xclick') . "&";

//ид пользователя – чтоб знати при ответе Paypal кто заплатил
$querystring .= "custom=" . urlencode($orderId) . "&";

$querystring .= "rm=" . urlencode(2) . "&";
$querystring .= "item_name=" . urlencode($itemName) . "&";
$querystring .= "amount=" . urlencode($price) . "&". '&';
$querystring .= "address1=" . urlencode('test'). '&';
$querystring .= "address2=" . urlencode('test'). '&';
$querystring .= "charset=" . urlencode('utf-8'). '&';
$querystring .= "city=" . urlencode('Bill Town'). '&';
$querystring .= "state=" . urlencode('Bill County'). '&';
$querystring .= "country=" . urlencode('UK'). '&';
$querystring .= "zip=" . urlencode('NE23 1HU'). '&';

//мы не используем этот код – но он нужен, если отправляются какие-то данные из формы
/* foreach ($_POST as $key => $value) {
	$value = urlencode(stripslashes($value));
	$querystring .= "$key=$value&";
} */

//Добавление адресов возврата
$querystring .= "return=" . urlencode(stripslashes($returnUrl)) . "&";
$querystring .= "cancel_return=" . urlencode(stripslashes($cancelUrl)) . "&";
$querystring .= "notify_url=" . urlencode($notifyUrl);


header('location:' . $paypalURL . $querystring);
exit();