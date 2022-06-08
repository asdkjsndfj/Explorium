@ECHO OFF
REM BFCPEOPTIONSTART
REM Advanced BAT to EXE Converter www.BatToExeConverter.com
REM BFCPEEXE=C:\Explorium\Launcher.exe
REM BFCPEICON=C:\Explorium\roblox.ico
REM BFCPEICONINDEX=-1
REM BFCPEEMBEDDISPLAY=0
REM BFCPEEMBEDDELETE=1
REM BFCPEADMINEXE=1
REM BFCPEINVISEXE=0
REM BFCPEVERINCLUDE=1
REM BFCPEVERVERSION=1.0.0.0
REM BFCPEVERPRODUCT=URI Installer
REM BFCPEVERDESC=Installs Explorium Protocol URIs
REM BFCPEVERCOMPANY=xxxman360's tools
REM BFCPEVERCOPYRIGHT=Copyright (C) 2016-2018
REM BFCPEEMBED=J:\WINDOWS\system32\reg.exe
REM BFCPEEMBED=C:\Explorium\ExploriumURI.reg
REM BFCPEOPTIONEND
@ECHO ON
@echo off
IF NOT EXIST %homedrive%\ProgramData\Explorium md %homedrive%\ProgramData\Explorium
IF EXIST JoinSelf.exe move /y JoinSelf.exe %homedrive%\ProgramData\Explorium
echo %cd%>%homedrive%\ProgramData\Explorium\install2.cnf
%MYFILES%\reg.exe IMPORT %MYFILES%\ExploriumURI.reg
cls
title Finishing Explorium Setup
echo Installing URI.
ping localhost -n 2 >nul
cls
echo Installing URI..
ping localhost -n 2 >nul
cls
echo Installing URI...
ping localhost -n 2 >nul
echo Explorium is installed to %cd%
echo Finished, press any key to exit. . .
pause >nul
exit

