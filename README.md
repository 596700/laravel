# laravel

<h1>使用技術</h1>
PHP 7.4.16<br />
Laravel Framework 6.20.19<br />
mysql  Ver 8.0.23<br />
nginx 1.18<br />
docker-compose version 1.29.0<br />
Docker version 19.03.13-ce<br />

<h1>ER図</h1>

![image](https://user-images.githubusercontent.com/70248415/115553334-4180bb00-a2e8-11eb-8155-8524c8d61bf2.png)

<h1>構成図</h1>

![image](https://user-images.githubusercontent.com/70248415/115552841-b3a4d000-a2e7-11eb-8c10-83b8d80b098f.png)


<h1>機能</h1>
下記の機能に関する共通事項としては、登録はアカウントアクティベーション後可能<br />
編集、削除は登録者または管理者のみ可能<br />
また、いずれにおいてもページネーション、バリデーション実装済み<br />

<h2>1.製品に関する機能</h2>
製品を登録、表示、編集、削除<br />
製品の名称で検索<br />

<h2>2.バージョンに関する機能</h2>
バージョンを登録、表示、編集、削除<br />
バージョンの名称で検索<br />

<h2>3.製品/バージョンに関する機能</h2>
登録済みの1.製品、2.バージョンを紐づけ登録、表示、編集、削除<br />
製品、バージョンで検索<br />

<h2>4.CVE(脆弱性)に関する機能</h2>
CVEを登録、表示、編集、削除<br />
登録の際は製品/バージョンを紐付け<br />
CVE ID、脆弱性の種類、概要で検索<br />

<h2>5.ウォッチリストに関する機能</h2>
ユーザ毎に3.製品/バージョンをウォッチリスト登録、表示、削除<br />
ウォッチリスト登録中の製品/バージョンに関連する新たなCVEが作成された時のメールによる通知機能<br />
