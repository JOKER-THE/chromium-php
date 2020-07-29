<?php

require(__DIR__ . '/vendor/autoload.php');

/**
 * URL, страницы которого будут сохранены.
 */
define('URL', 'https://www.google.com/');

/**
 * Название сохраняемых файлов.
 */
define('FILENAME', time());

/**
 * Подключаем библиотеку Chrome PHP.
 */
use HeadlessChromium\BrowserFactory;

/**
 * Инициализация браузера.
 */
$browserFactory = new BrowserFactory('chromium-browser');
$browser = $browserFactory->createBrowser();

/**
 * Создание страницы браузера
 * и навигация по URL.
 */
$page = $browser->createPage();
$page->navigate(URL)->waitForNavigation();
    
/**
 * Сохранение скриншота страницы
 * в каталог 'img'
 */
$page->screenshot()->saveToFile('img/' . FILENAME . '.png');
    
/**
 * Сохранение страницы в PDF
 * в каталог 'pdf'
 */
$page->pdf(['printBackground'=>false])->saveToFile('pdf/' . FILENAME . '.pdf');
    
/**
 * Закрытие объекта браузера.
 */
$browser->close();
