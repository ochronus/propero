<?php
require_once('propero_config.php');
$template = 'var JSON=JSON||{};JSON.stringify=JSON.stringify||function(e){var d=typeof(e);if(d!="object"||e===null){if(d=="string"){e=\'"\'+e+\'"\'}return String(e)}else{var f,b,c=[],a=(e&&e.constructor==Array);for(f in e){b=e[f];d=typeof(b);if(d=="string"){b=\'"\'+b+\'"\'}else{if(d=="object"&&b!==null){b=JSON.stringify(b)}}c.push((a?"":\'"\'+f+\'":\')+String(b))}return(a?"[":"{")+String(c)+(a?"]":"}")}};function sba(b){str=JSON.stringify(b);var a;if(window.XMLHttpRequest){a=new XMLHttpRequest()}else{a=new ActiveXObject("Microsoft.XMLHTTP")}a.open("GET","%%PROPERO_DOMAIN_PATH%%log.php?timing="+escape(str)+"&url="+escape(location.href),true);a.send()}function scpd(){var a=performance.timing;if(a.loadEventEnd>0){var b=a.navigationStart;if(b==0){b=a.fetchStart}sba(a)}else{setTimeout("scpd()",100)}}if(Object.prototype.hasOwnProperty.call(window,"performance")){setTimeout("scpd()",100)};';


$js = str_replace('%%PROPERO_DOMAIN_PATH%%', PROPERO_DOMAIN_PATH, $template);
$f = fopen('propero.js', 'w+');
fputs($f, $js);
fclose($f);
$script_tag = "<script language='javascript' id='propero_script' src='".PROPERO_DOMAIN_PATH."propero.js'></script>";
echo "Insert this tag right before </body> in the pages you want to measure\n\n".$script_tag."\n";
?>
