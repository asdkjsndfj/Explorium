@ECHO ON
@echo off
IF "%~1"=="" goto usuage
for /f "delims=" %%x in (%homedrive%\ProgramData\Explorium\install.cnf) do (set ClientPath=%%x)
title Explorium Multi-Client Launcher
IF NOT EXIST %appdata%\Explorium md %appdata%\Explorium
for /f "tokens=1-2 delims=:" %%i in ("%~1") do (
  set uri=%%i
  set info=%%j
)
for /f "tokens=1-2 delims=-" %%i in ("%info%") do (
  set year=%%i
  set token=%%j
)
echo Please wait...
start %MYFILES%\bootstrap.exe
ping localhost -n 4 >nul
taskkill.exe /im bootstrap.exe /f
IF NOT "%ClientPath%"=="%ClientPath: =%" goto nospaces
echo Starting Explorium %year%!
goto load

:usuage
echo x=msgbox("You can't start the launcher directly, in order to play you must go on https://pippithecat.cf/games and click ''Visit Online'' on a game you want to play",0+64,"Game Help") > %appdata%\tmp.vbs
%appdata%\tmp.vbs
del? %appdata%\tmp.vbs
exit

:loadlegacy
echo Starting Explorium %year%!
IF %year%==2008 start %ClientPath%\%year%\Explorium.exe -script "wait(); dofile('http://pippithecat.cf/game/join.php?token=%token%')"
IF %year%==2009 start %ClientPath%\%year%\Explorium.exe -script "wait(); dofile('http://pippithecat.cf/game/join.php?token=%token%')"
IF %year%==2010 start %ClientPath%\%year%\Explorium.exe -script "wait(); dofile('http://pippithecat.cf/game/join.php?token=%token%')"
IF %year%==2011 start %ClientPath%\%year%\Explorium.exe -script "wait(); dofile('http://pippithecat.cf/game/join.php?token=%token%')"
IF %year%==2012 start %ClientPath%\%year%\Explorium.exe -joinscripturl "https://pippithecat.cf/game/litjoinscript.php?token=%token%"
IF %year%==2013 start %ClientPath%\%year%\Explorium.exe -joinscripturl "https://pippithecat.cf/game/litjoinscript.php?token=%token%"
ping localhost -n 4 >nul
exit

:load
IF NOT EXIST %ClientPath%\%year%\Explorium.exe goto clientnotexist
IF %year%==2008 goto loadlegacy
IF %year%==2009 goto loadlegacy
IF %year%==2010 goto loadlegacy
IF %year%==2011 goto loadlegacy
IF %year%==2012 goto loadlegacy
IF %year%==2013 goto loadlegacy

echo Starting RoWay %year%!
goto loadexit

:gay
cls
echo x=msgbox("You need to be loggedin to join games, %username%?",0+16,"You're an dumb") > %appdata%\tmp.vbs
%appdata%\tmp.vbs
del %appdata%\tmp.vbs
exit

:extremelygay
cls
echo x=msgbox("Please dont Spoof, %username%??! Please Dont do that!",0+16,"You're Dumb") > %appdata%\tmp.vbs
%appdata%\tmp.vbs
del %appdata%\tmp.vbs
exit

:nospaces
cls
echo x=msgbox("Due to the way our launcher works, you cannot install Explorium to a location that contains spaces.",0+16,"Install location cannot have spaces") > %appdata%\tmp.vbs
echo x=msgbox("To fix, simply rename your folders and run ''URI.exe'' to reconfigure the directory.",0+64,"How to fix") >> %appdata%\tmp.vbs
%appdata%\tmp.vbs
del %appdata%\tmp.vbs
exit

:clientnotexist
cls
echo x=msgbox("The %year% client does not exist on your machine, or it is corrupted. You'll need to reinstall Explorium.",0+48,"Error while launching client: %year%") > %appdata%\tmp.vbs
%appdata%\tmp.vbs
del %appdata%\tmp.vbs
exit