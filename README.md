# php-skeleton

Eclipse/Che 上で使用する PHP プロジェクトのスケルトンです。

## 環境構築

Docker上に、Eclipse/Che のコンテナを追加して、 PHP のワークスペースを作成する。

Eclipse/Che のワークスペース上に、リポジトリを取得する。

ワークスペース上の Terminal から、次のコマンドを実行する。

 $ composer config -g repos.packagist composer https://packagist.jp
 
 $ composer global require hirak/prestissimo
 
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


## ツール

* phing

ビルドツール。各種コマンドをまとめておくために便利。

* PHPUnit

テストフレームワーク

* PHPMD

コードチェッカー。PHPのダメなコードを探してくれるツール。

* PHPCPD

コピペ検出ツール。重複コードを探してくれるツール。

* PHP_CodeSniffer

コーディング規約チェッカー。
 