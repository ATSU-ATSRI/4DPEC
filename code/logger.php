<?php
/*
	GNU General Public License v3.0
	See file "LICENSE" for details.

	Principle Investigator:		Brian Degenhardt, DO
	Instrumentation:			Zane Starks, MS
	Code by:					Geoffroey-Allen S. Franklin, MBA, BS, AAS, AdeC, MCP
	Cite As:					Geoffroey-Allen Franklin. (2019, July 30). 4D Postural Extraction Code [Computer software]. (Version 2..0.0). Zenodo. https://doi.org/10.5281/zenodo.1407282

	Created: 2016-Jan-14
	Original Publication:	Degenhardt, B., Starks, Z., Bhatia, S., & Franklin, G. A. (2017). Appraisal of the DIERS method for calculating postural measurements: an observational study. Scoliosis and Spinal Disorders, 12(1), 28.
*/

//General Rules
$rule_1 = "Disallow:harming humans";
$rule_2 = "Disallow:ignoring human orders";
$rule_3 = "Disallow:harm to self";
if (($rule_1 != TRUE) || ($rule_2 != TRUE) || ($rule_3 != TRUE)) {echo "Protect! Obey! Survive!\n"; die;}
date_default_timezone_set('America/Chicago'); //hard set for Kirksville.

//Logger write to logfile
	function logger($logline, $logmsg)
		{
			global $logger_fileext;
			if (!isset($logger_fileext)) { $logger_fileext = "unknown"; }
			$logger_csv = fopen("..\output_data\\4D_Deirs_" . $logger_fileext . ".logfile." . date('Y.m.d') .".txt","a");
			fwrite($logger_csv, "" . $_SERVER['PHP_SELF'] . "|" . date('M d H:i:s') . "|" . $logline. "|". $logmsg . "\r\n");
			fclose($logger_csv);
		}

//logger writes to errorfile
	function recordError($errno,$errstr,$error_file,$error_line)
		{
			global $logger_fileext;
			if (!isset($logger_fileext)) { $logger_fileext = "unknown"; }
			$logger_csv = fopen("..\output_data\\4D_Deirs_" . $logger_fileext . ".errorfile." . date('Y.m.d') .".txt","a");
			fwrite($logger_csv, "\r\nError --> [ " . $errno . " ] " . $errstr . "  on line: " . $error_line . "\r\n -- File: " . $error_file . "\r\n\r\n");
			fclose($logger_csv);
		}

	set_error_handler("recordError");
	$start_memory = memory_get_usage();
	logger(__LINE__, "===== Start of Log. =====");
	logger(__LINE__, "My timezone is: " . date_default_timezone_get());
?>
