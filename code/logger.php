<?php
/* 
	MIT License

	Copyright (c) 2017 Geoffroey-Allen Franklin

	Permission is hereby granted, free of charge, to any person obtaining a copy
	of this software and associated documentation files (the "Software"), to deal
	in the Software without restriction, including without limitation the rights
	to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
	copies of the Software, and to permit persons to whom the Software is
	furnished to do so, subject to the following conditions:

	The above copyright notice and this permission notice shall be included in all
	copies or substantial portions of the Software.

	THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
	IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
	FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
	AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
	LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
	OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
	SOFTWARE.

	Principle Investigator:		Brian Degenhardt, DO
	Instrumentation:			Zane Starks, MS
	Code by:					Geoffroey-Allen S. Franklin, MBA, BS, AAS, AdeC, MCP
	Cite As:					Franklin, G. A.. (2016). 4D Postural Extraction Code [Computer software]. Kirksville, MO: Still Research Institute at A.T. Still University.
	
	
	Created: 2016-Jan-14
	Original Publication:	Degenhardt, B., Starks, Z., Bhatia, S., & Franklin, G. A. (2017). Appraisal of the DIERS method for calculating postural measurements: an observational study. Scoliosis and Spinal Disorders, 12(1), 28.

	
	Change Log:	2016-Jan-29 - Version 1.0 release. Initial release.
				2016-Feb-09 - Version 1.1 release. Corrected bug #ZS-001: Remove hard count for average->file write to float number based on Day change.
				2016-Feb-10 - Version 1.2 release. Added motion flag.
				2016-Jul-13 - Version 1.3 release. Added variable PlumbResult_8001_WeissLAPos_T12.
				2017-Nov-09 - Moved to Github repo.
				---
*/

//General Rules
$rule_1 = "Disallow:harming humans";
$rule_2 = "Disallow:ignoring human orders";
$rule_3 = "Disallow:harm to self";
if (($rule_1 != TRUE) || ($rule_2 != TRUE) || ($rule_3 != TRUE)) {echo "Protect! Obey! Survive!\n"; die;}
date_default_timezone_set('America/Chicago'); //hard set for Kirksville.

//Logger write to logfile.txt
	function logger($logline, $logmsg)
		{
			$logger_csv = fopen("..\output_data\logfile.txt","a");
			fwrite($logger_csv, "" . $_SERVER['PHP_SELF'] . "|" . date('M d H:i:s') . "|" . $logline. "|". $logmsg . "\r\n");
			fclose($logger_csv);
		}
	
	function recordError($errno,$errstr,$error_file,$error_line)
		{
			$logger_csv = fopen("logfile.txt","a");
			fwrite($logger_csv, "\r\nError --> [ " . $errno . " ] " . $errstr . "  on line: " . $error_line . "\r\n -- File: " . $error_file . "\r\n\r\n");
			fclose($logger_csv);
		}
		
	set_error_handler("recordError");
	$start_memory = memory_get_usage();
	logger(__LINE__, "===== Start of Log. =====");
	logger(__LINE__, "My timezone is: " . date_default_timezone_get());

?>