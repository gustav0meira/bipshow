<?php 

	function route($routeName) {
	    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
	    $fullUrl = $protocol . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	    $urlParts = parse_url($fullUrl);

	    // Obter o diretório do script em execução
	    $scriptDir = pathinfo($_SERVER['SCRIPT_NAME'], PATHINFO_DIRNAME);

	    // Montar a URL base
	    $baseUrl = $protocol . '://' . $urlParts['host'] . $scriptDir . '/';
	    $appLocal = $baseUrl;

	    return $appLocal . $routeName;
	}

	function isMobileDevice() {
	    return preg_match("/(android|blackberry|iphone|ipod|palm|pocket|symbian|windows ce|windows phone|mobile)/i", $_SERVER["HTTP_USER_AGENT"]);
	}

?>