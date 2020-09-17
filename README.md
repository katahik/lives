Lives
====

あなたの周辺の今日のライブを検索できます。

[Lives](https://google.com)
[![lives_top](https://user-images.githubusercontent.com/61921814/93006567-b80e4b00-f598-11ea-9825-9dea874e3468.png)
](https://google.com)

## 主な機能
### 位置情報利用した検索機能
* 現在地取得
* 現在地から半径5km以内のライブ情報を取得し、リスト表示させるとともに、地図上にピンをドロップ
* ピンをクリックすることにより、ライブ詳細画面へ遷移可能
* 詳細検索により、位置情報に加えフリーワード、日にち及びカテゴリーによるフィルターが可能
### 権限による切り替え機能
* 管理者、ライブ主催者、一般ユーザーの３つの権限を用意し、それぞれで表示できるメニューや使える機能の出し分け
* 通常の画面上からのユーザー登録では、一般ユーザーとして登録する仕様
    + 管理者 Email : admin@gmail.com Password : 00000000
    + 主催者 Email : host1@gmail.com Password : 00000000
    + 一般ユーザー Email : kotakatahira@gmail.com Password : 00000000
### 「行ったライブ」機能
* 自分の行ったライブを登録することができる。
* 行ったライブをカレンダーに表示することができ、いつどのライブに行ったかが分かる
* カレンダーの表示をクリックすることで、ライブ詳細画面へ遷移可能

## 主な使用技術・言語
* インフラ
    + AWS(VPC,EC2,Route53,RDS,S3)
* フロントエンド
    + HTML / CSS / SCSS / JavaScript / jQuery
* バックエンド
    + PHP 7.3.17 / Laravel 6.18.40
* データベース
    + mysql 8.0.21
* その他
    + docker/docker-compose/colorlib./SSL対応
## 構成図

![Configuration ](https://user-images.githubusercontent.com/61921814/93011683-38ea3880-f5d3-11ea-8f69-3ff2d27cb15b.png)


