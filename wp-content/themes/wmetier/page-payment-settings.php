<?php

if ($_SERVER['REQUEST_METHOD'] != "POST") {
	die("No access!");
}

$paypalEmail = get_field('paypalemail');
$paypalURL = "https://sandbox.paypal.com/cgi-bin/webscr";
$price = "20.20";
$itemName = "Upgrade account";
$returnUrl = "localhost";
$cancelUrl = "localhost";
$notifyUrl = "wmetier.xpage.com.ua";



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
$querystring .= "custom=" . urlencode(6) . "&";

$querystring .= "item_name=" . urlencode($itemName) . "&";
$querystring .= "amount=" . urlencode($price) . "&";

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