@REM	GNU General Public License v3.0
@REM  See file "LICENSE" for details.
@REM
@REM	Principle Investigator:		Brian Degenhardt, DO
@REM	Instrumentation:			Zane Starks, MS
@REM	Code by:					Geoffroey-Allen S. Franklin, MBA, BS, AAS, AdeC, MCP
@REM	Cite As:					Geoffroey-Allen Franklin. (2019, July 30). 4D Postural Extraction Code [Computer software]. (Version 2.0.0). Zenodo. https://doi.org/10.5281/zenodo.1407282
@REM
@REM	Created: 2016-Jan-14
@REM	Original Publication:	Degenhardt, B., Starks, Z., Bhatia, S., & Franklin, G. A. (2017). Appraisal of the DIERS method for calculating postural measurements: an observational study. Scoliosis and Spinal Disorders, 12(1), 28.
@REM	---

@ECHO OFF
setlocal enabledelayedexpansion
echo Start of command: !time!

ECHO Delete old data: !time!.
del /F /Q res_filelist.txt
del /F /Q remarks_filelist.txt

ECHO Building file list: !time!.
dir /A-D /B /OD /S "PATH:\TO\THE\DATA\FILE\STORE\*age.avr" | findstr /v "\Repository" | findstr /v "Pedoscan" >> res_filelist.txt
dir /A-D /B /OD /S "PATH:\TO\THE\DATA\FILE\STORE\Remarks.ini" | findstr /v "\Repository" >> remarks_filelist.txt

ECHO Extracting Data: !time!.
php extract_system_results.php

ECHO Cleanup: !time!.
del /F /Q res_filelist.txt
del /F /Q remarks_filelist.txt

echo End of commands: !time!
