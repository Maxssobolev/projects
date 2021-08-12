<?php

/*

	отправка почты через другой сервер.

	используется везде, по прямой ссылке.

*/

class CURLmail
{

    public $data = array();

    function __construct($to,$sub,$body) {

        $this->data = array(
            "user-mail"		=> $to ,
            "body"			=> $body,
            "subject"		=> $sub,
        );
    }

    function send(){
		$c = curl_init("http://mail.microklad.ru");
		curl_setopt($c,CURLOPT_POST,1);
		curl_setopt($c,CURLOPT_POSTFIELDS,$this->data);
		curl_setopt($c,CURLOPT_RETURNTRANSFER,1);
		$result = curl_exec($c);
		return $result;
    }

}
