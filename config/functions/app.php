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

	function dateHour($hour) {
		return date('h:i', strtotime($hour));
	}

	function fullMonth($event_data) {
	    $event_timestamp = strtotime($event_data);

	    $meses = array(
	        1 => 'Janeiro',
	        2 => 'Fevereiro',
	        3 => 'Março',
	        4 => 'Abril',
	        5 => 'Maio',
	        6 => 'Junho',
	        7 => 'Julho',
	        8 => 'Agosto',
	        9 => 'Setembro',
	        10 => 'Outubro',
	        11 => 'Novembro',
	        12 => 'Dezembro'
	    );

	    $format = date('d \d\e ', $event_timestamp) . $meses[date('n', $event_timestamp)] . date(' \d\e Y', $event_timestamp);
	    return $format;
	}

	function dayToName($dataHora) {
	    $timestamp = strtotime($dataHora);
	    $nomeDia = date('l', $timestamp);
	    switch ($nomeDia) {
	        case 'Monday':
	            return 'Segunda';
	        case 'Tuesday':
	            return 'Terça';
	        case 'Wednesday':
	            return 'Quarta';
	        case 'Thursday':
	            return 'Quinta';
	        case 'Friday':
	            return 'Sexta';
	        case 'Saturday':
	            return 'Sábado';
	        case 'Sunday':
	            return 'Domingo';
	        default:
	            return 'Dia inválido';
	    }
	}

	function monthToPT($nomeMesAbreviado) {
	    $nomesMeses = array(
	        'Jan' => 'Jan',
	        'Feb' => 'Fev',
	        'Mar' => 'Mar',
	        'Apr' => 'Abr',
	        'May' => 'Mai',
	        'Jun' => 'Jun',
	        'Jul' => 'Jul',
	        'Aug' => 'Ago',
	        'Sep' => 'Set',
	        'Oct' => 'Out',
	        'Nov' => 'Nov',
	        'Dec' => 'Dez'
	    );

	    return $nomesMeses[$nomeMesAbreviado];
	}


?>