<?php

// Composerのオートローダーを読み込む
require 'vendor/autoload.php';

if ($argc != 4) {
    echo "Usage: php FileConverter.php markdown inputfile outputfile\n";
    exit(1);
}

$command = $argv[1];
$inputFile = $argv[2];

$outputFile = $argv[3];

if ($command !== 'markdown') {
    echo "Invalid command. Please use 'markdown' command.\n";
    exit(1);
}

// Markdown ファイルを読み込み
$markdownContent = file_get_contents($inputFile);

// Parsedownクラスのインスタンスを作成
$parsedown = new Parsedown();

// マークダウンをHTMLに変換
$htmlContent = $parsedown->text($markdownContent);


// HTML を出力ファイルに書き出し
file_put_contents($outputFile, $htmlContent);

echo "Conversion completed successfully.\n";

exit(0);