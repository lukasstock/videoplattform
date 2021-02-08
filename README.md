
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Info

Zum Starten des Projekts zuerst composer.json ausführen danach mit dem Terminal in das Projektverzeichnis navigieren und folgende Befehle ausführen:

-  ggf. Datenbankeinstellungen in der .env Datei anpassen (DB_DATABASE leer lassen)
- "php artisan mysql:createdb videoplattform" ausführen ( DB_DATABASE in der .env Datei MUSS leer sein! )
-  DB_DATABASE in der .env Datei ergänzen ( DB_DATABASE=videoplattform )
- "php artisan migrate" (Erstellt Tabellen)
- "php artisan serve"   (Server starten)

Hiernach 127.0.0.1:8000 im Browser aufrufen
