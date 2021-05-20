Lives
====

あなたの周辺の今日のライブを検索できます。

[Lives](https://lives.buzz/)
[![lives_top](https://user-images.githubusercontent.com/61921814/93006567-b80e4b00-f598-11ea-9825-9dea874e3468.png)
](https://lives.buzz/)

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
    + GoogleMapsAPI / docker / docker-compose / colorlib. / SSL対応
## 主な機能
### 位置情報を利用した検索機能
* 現在地取得
* 現在地から半径5km以内のライブ情報を取得し、リスト表示させるとともに、地図上にピンをドロップ
* ピンをクリックすることにより、ライブ詳細画面へ遷移可能
* 詳細検索により、位置情報に加えフリーワード、日にち及びカテゴリーによるフィルターが可能
### 権限による切り替え機能
* 管理者、ライブ主催者、一般ユーザーの３つの権限を用意し、それぞれで表示できるメニューや使える機能の出し分け
* 通常の画面上からのユーザー登録では、一般ユーザーとして登録する仕様
    + 管理者 Email : admin@gmail.com Password : 12345678
    + 主催者 Email : host1@gmail.com Password : 12345678
    + ゲストユーザー Email : guest@guest.com Password : guestpass （簡単ログインでボタン一つでログイン）
### 「行ったライブ」機能
* 自分の行ったライブを登録することができる
* 行ったライブをカレンダーに表示することができ、いつ何のライブに行ったかが分かる
* カレンダーの表示をクリックすることで、ライブ詳細画面へ遷移可能

<!-- #### ※レビューしていただくときは -->
<!-- * 本サービスは、現在地の半径5kmしか検索できないため、登録されているライブが半径5km以内に存在しないときは、検索してもなにもヒットしません。 -->
<!--   大変お手数おかけしますが、adminユーザーでログインして、5km以内の場所にlive情報を作ったあとに、検索していただくことにより、上記機能を確認していただけます。 -->
    
## 作成にあたって
### なぜこのアプリを作ったのか
　私自身、暇なときに「近所で音楽のイベント（ライブなど）やってないかな」と思い、探してみるが、情報が個別で管理されていて探しづらい。

　周辺で行っているライブの情報を一括して、検索できるwebアプリがあれば便利だと思い作成しました。

### 製作期間及び苦労した点
① 発案(8月10日)

　ライブ情報は、チケットサイトやライブハウスまたはアーティストのHPかSNSごとに管理されていて、一括検索ができなく不便でした。

　なので、私は周辺で行っているライブの情報を一括して、検索できるwebアプリがあれば便利だと考えました。

② 企画(〜8月11日)

　このWebアプリを作成するにあたり、何を大切にするかを考えたときに、このアプリを使うユーザーを思い描きました。

　このアプリを使うユーザーは、ライブ好きな人であるのと同時に、このアプリを使い、チケットを前もって取るほどそのアーティストのことを好きでない、または、初見のアーティストを検索することになると考えました。（自分が本当に好きなアーティストならば、前もってライブのチケットを取っているはずだから）

　そうしたときに、このWebアプリに求められることは「簡単」「おしゃれ」「シンプル」であると考えました。
なので、
 * 面倒な会員登録なしに、このアプリのほとんどの機能を使うことができること
 * ボタン一つで周辺のライブを検索できること
 * おしゃれなデザイン

この3つは外せなかったです。

③ 計画（〜8月12日）

　本格的なWebアプリを作ることは初めてだったため、仮定として30日で作成する目標を立てました。
技術選定調査(3日)、実装(24日)、検証(3日)

④ 技術選定・調査（〜8月15日）

何を用いてこのアプリを作成するか考えました。
 * HTML / CSS
 * PHP / Laravel
 * JavaScript
 * GoogleMapsAPI
 * Colorlib
 * AWS
 * Docker
 
 　マップを用いた開発をしたことがなかったため、まず、Qiitaで似たような機能がないか探し、どのように実装していくか及びどのような知識が必要かを調べました。
 
 すると,JavaScriptとGoogleMapsAPIの知識が必要とわかりました。
 
 その必要な知識をQiitaやdotinstallなどのサイトで学び、下記の工程にて実装することに決めました。
 
 　1.GoogleMapsAPIを用いて、自分の位置情報（緯度経度）を取得。
 
 　2.その位置情報を用いて自分の周囲、東西南北5km範囲内の緯度経度を算出
 
 　3.その範囲内にあるライブ情報を取得し、$livesに格納して、bladeへ渡す
 
 　4.Controllerから渡された$livesをループで回して、ひとつひとつピンを作成
 
 　また、AWSとDockerについては、興味があり、挑戦してみたかったため、取り入れてみました。
 
 　デザインについては、サーバーサイドエンジニアの業務は、デザイナーさんが考えたデザインに沿って見た目を実装していくものだと仮定し、HTMLテンプレートの「Colorlib.」を導入しました。
 

⑤ 実装(〜9月16日)

　実装するにあたり、やはり、GoogleMapsAPIとの連携に苦労しました。しかし、エラー文を読み、検索することで少しずつ進めていきました。

　また、管理者権限と主催者権限と一般ユーザーの3つの権限を用いて、機能や項目の出し分けをする必要がありました。これまた、検索しつつ、route.phpにて権限を分けました。

　そして、追加の機能として「自分が過去に行ったライブがすぐにわかればもっと利用頻度があがる」と思い、「行ったライブ機能」も実装しました。
その「行ったライブ機能」ではライブ詳細がわかり、そのライブのセットリスト（ライブで行った曲リスト）もわかるように実装しました。
（このアプリを使うユーザーを考えたときに、あとから振り返ってセットリストがわかれば、便利と考えたため）


⑥ 検証(〜9月28日)

　ひととおり完成後、より「簡単」「おしゃれ」「シンプル」にするため、見直しを行いました。
その過程でユーザーが見やすいようにフォントカラーの変更やユーザーの利便性を高めるために、「会場の住所」もDBに保存し、表示させました。

　また、ライブ情報を入力する際の、金額の箇所を半角数字のみ受け付けるように、バリデーションの変更など、想定外にも対応したバリデーションを実装しました。

　最後に、私が所属しているエンジニアサークル「ヒラマサ」にて、エンジニアの方々にレビューをしていただき、以下の指摘をもらった。
 * このアプリを作成した背景を知りたい→本READMEに作成にあたり思ったこと、工程を記述。
 * ローディング時間が長いこと→無駄なローディングがあったため、それを削除することにより、ローディング時間の短縮を図りました。
 * ライブ作成時に必須項目がわかりづらくて戸惑う→必須項目には（必須）と記述し、placeholderを使い入力しやすくしました　等

以上を用いて、検証及びブラッシュアップを行った。


## 構成図

![Configuration ](https://user-images.githubusercontent.com/61921814/93011683-38ea3880-f5d3-11ea-8f69-3ff2d27cb15b.png)

## レスポンシブ対応（スマホ画面）
![collage](https://user-images.githubusercontent.com/61921814/94375156-9abaae80-014c-11eb-8e23-3595757c24a0.png)

