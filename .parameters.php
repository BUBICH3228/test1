<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arTemplateParameters = [
    "DISPLAY_DATE" => [
        "NAME" => "Показывать дату",
        "TYPE" => "CHECKBOX",
        "DEFAULT" => "Y",
    ],
    "DISPLAY_NAME" => [
        "NAME" => "Показывать название",
        "TYPE" => "CHECKBOX", 
        "DEFAULT" => "Y",
    ],
    "DISPLAY_PICTURE" => [
        "NAME" => "Показывать изображение",
        "TYPE" => "CHECKBOX",
        "DEFAULT" => "Y",
    ],
    "DISPLAY_PREVIEW_TEXT" => [
        "NAME" => "Показывать текст анонса", 
        "TYPE" => "CHECKBOX",
        "DEFAULT" => "Y",
    ],
];