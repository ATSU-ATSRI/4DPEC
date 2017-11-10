@REM	MIT License
@REM
@REM	Copyright (c) 2017 Geoffroey-Allen Franklin
@REM
@REM	Permission is hereby granted, free of charge, to any person obtaining a copy
@REM	of this software and associated documentation files (the "Software"), to deal
@REM	in the Software without restriction, including without limitation the rights
@REM	to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
@REM	copies of the Software, and to permit persons to whom the Software is
@REM	furnished to do so, subject to the following conditions:
@REM
@REM	The above copyright notice and this permission notice shall be included in all
@REM	copies or substantial portions of the Software.
@REM
@REM	THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
@REM	IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
@REM	FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
@REM	AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
@REM	LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
@REM	OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
@REM	SOFTWARE.
@REM
@REM	Principle Investigator:		Brian Degenhardt, DO
@REM	Instrumentation:			Zane Starks, MS
@REM	Code by:					Geoffroey-Allen S. Franklin, MBA, BS, AAS, AdeC, MCP
@REM	Cite As:					Franklin, G. A.. (2016). 4D Postural Extraction Code [Computer software]. Kirksville, MO: Still Research Institute at A.T. Still University.
@REM	
@REM	
@REM	Created: 2016-Jan-14
@REM	Original Publication:	Degenhardt, B., Starks, Z., Bhatia, S., & Franklin, G. A. (2017). Appraisal of the DIERS method for calculating postural measurements: an observational study. Scoliosis and Spinal Disorders, 12(1), 28.
@REM
@REM	
@REM	Change Log:	2016-Jan-29 - Version 1.0 release. Initial release.
@REM				2016-Feb-09 - Version 1.1 release. Corrected bug #ZS-001: Remove hard count for average->file write to float number based on Day change.
@REM				2016-Feb-10 - Version 1.2 release. Added motion flag.
@REM				2016-Jul-13 - Version 1.3 release. Added variable PlumbResult_8001_WeissLAPos_T12.
@REM				2017-Nov-09 - Moved to Github repo.
@REM				---

@ECHO OFF
setlocal enabledelayedexpansion
echo Start of command: !time!

ECHO Delete old data: !time!.
del /F /Q res_filelist.txt

ECHO Building file list: !time!.
@REM This is for local data source...
dir /A-D /B /OD /S "..\raw_data\Cleaned Study Data\*.Res.ini" >> res_filelist.txt

ECHO Extracting Data: !time!.
php extract_averages.php

ECHO Cleanup: !time!.
del /F /Q res_filelist.txt

echo End of commands: !time!
