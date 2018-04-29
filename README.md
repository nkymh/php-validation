# php-skeleton

Eclipse/Che 上で使用する PHP プロジェクトのスケルトンです。

## 環境構築

Docker上に、Eclipse/Che のコンテナを追加して、 PHP のワークスペースを作成する。

Eclipse/Che のワークスペース上に、リポジトリを取得する。

ワークスペース上の Terminal から、次のコマンドを実行する。

 $ composer install
 
 $ sudo apt-get install -y php-xdebug

以上で、環境構築できた。


## フォルダー構成

/project/php-skeleton/

~/build/

~/docs/

~/log/

~/src/

~/tests/

~/vendor/


## UnitTest

 $ phpunit

テスト結果は、
　　build/logs/coverage/clover.xml

カバレッジ結果は、
　　build/logs/coverage/html/index.html

に出力する。
 