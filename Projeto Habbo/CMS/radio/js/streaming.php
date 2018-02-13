<?php

namespace Controllers;

class Streaming {
	var $connection = false;

	public function __construct($url) {
		$this->connection = $url;

		$this->connection = curl_init();

		curl_setopt_array($this->connection, [
			CURLOPT_URL => 'http://' . $url . '/index.html',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_USERAGENT => $_SERVER['HTTP_USER_AGENT'],
			CURLOPT_CONNECTTIMEOUT => 2,
		]);

		$this->connection = curl_exec($this->connection);
	}

	public function find($param) {
		switch($param) {
			case 'locutor':
				$pick = explode('Stream Title: </font></td><td><font class=default><b>', $this->connection);
				return explode('</b>', $pick[1])[0];
			break;

			case 'programa':
				$pick = explode('Stream Genre: </font></td><td><font class=default><b>', $this->connection);
				return explode('</b>', $pick[1])[0];
			break;

			case 'musica':
				$pick = explode('Current Song: </font></td><td><font class=default><b>', $this->connection);
				return explode('</b>', $pick[1])[0];
			break;

			case 'ouvintes':
				$pick = explode('Stream Status: </font></td><td><font class=default><b>', $this->connection);
				$pick = explode('</b>', $pick[1])[0];
				return preg_replace('/Stream is up at (.*) kbps with <B>(.*) of (.*) listeners \((.*) unique\)/', '$2', $pick);
			break;

			case 'unicos':
				$pick = explode('Stream Status: </font></td><td><font class=default><b>', $this->connection);
				$pick = explode('</b>', $pick[1])[0];
				return preg_replace('/Stream is up at (.*) kbps with <B>(.*) of (.*) listeners \((.*) unique\)/', '$4', $pick);
			break;

			case 'maximo':
				$pick = explode('Stream Status: </font></td><td><font class=default><b>', $this->connection);
				$pick = explode('</b>', $pick[1])[0];
				return preg_replace('/Stream is up at (.*) kbps with <B>(.*) of (.*) listeners \((.*) unique\)/', '$3', $pick);
			break;

			case 'link':
				$pick = explode('Stream URL: </font></td><td><font class=default><b>', $this->connection);
				return preg_replace('/<a href="(.*)">(.*)<\/a>/i', '$1', explode('</b>', $pick[1])[0]);
			break;
		}

		return false;
	}
}