<?php
//セッションを開始
session_start();
 
//セッションIDを更新して変更（セッションハイジャック対策）
session_regenerate_id( TRUE );
 
//エスケープ処理やデータチェックを行う関数のファイルの読み込み
require 'libs/functions.php';
 
//初回以外ですでにセッション変数に値が代入されていれば、その値を。そうでなければNULLで初期化
$name = isset( $_SESSION[ 'name' ] ) ? $_SESSION[ 'name' ] : NULL;
$email = isset( $_SESSION[ 'email' ] ) ? $_SESSION[ 'email' ] : NULL;
$body = isset( $_SESSION[ 'body' ] ) ? $_SESSION[ 'body' ] : NULL;
$error = isset( $_SESSION[ 'error' ] ) ? $_SESSION[ 'error' ] : NULL;
 
//個々のエラーを初期化（$error は定義されていれば配列）
$error_name = isset( $error['name'] ) ? $error['name'] : NULL;
$error_email = isset( $error['email'] ) ? $error['email'] : NULL;
$error_body = isset( $error['body'] ) ? $error['body'] : NULL;
 
//CSRF対策の固定トークンを生成
if ( !isset( $_SESSION[ 'ticket' ] ) ) {
  //セッション変数にトークンを代入
  $_SESSION[ 'ticket' ] = sha1( uniqid( mt_rand(), TRUE ) );
}
 
//トークンを変数に代入
$ticket = $_SESSION[ 'ticket' ];
?>
<!doctype html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>Aki's_Portfolio_Site</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slick-theme.css">
    <link rel="stylesheet" href="css/simpletextrotator.css">
    <link rel="stylesheet" href="css/lightbox.css">
    <link rel="stylesheet" href="css/featherlight.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/lightbox.js" type="text/javascript"></script>
    <script src="js/featherlight.js" type="text/javascript"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/jquery.simple-text-rotator.js"></script>
    <script src="js/main.js"></script>
  </head>

  <body>
    <div class="wrap">
      <div id="index" class="bg">
        <header>
          <h2 class="main_logo">
            <a href="#index">
              <img src="img/logo/logo_b.png" alt="headerロゴ">
            </a>
          </h2>
          <div id="nav_drawer">
            <input id="nav_input" name="check" type="checkbox" class="nav_unshown" value="1">
            <label id="nav_open" for="nav_input">Menu</label>
            <label class="nav_unshown" id="nav_close" for="nav_input">Close</label>
            <nav id="nav_content" class="nav_menu">
              <ul>
                <li><a href="#works">Works</a></li>
                <li><a href="#skill">Skill</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
              </ul>
            </nav>
          </div>
        </header>
        
<!--        index-->
        <div class="section">
          <h1 class="index_title">
            <img src="img/index/main_img.png" alt="メインタイトル">
          </h1>
          <p class="change_text">
            <span class="rotate">
              ポートフォリオサイトです。,コーディングの仕事をしたいです！,コーダー職に就職したいです！,Adobeソフトでのデザインも学習してます。,趣味はキャンプです。,火打石で焼肉を食べるのが好きです。
            </span>
          </p>
          <ul class="slick">
            <li class="border_btn">
              <a href="img/index/Photoshop/ps1.jpg" data-lightbox="photoshop" data-title="&lt;span class='lightbox_caption'&gt;PayAppサイト&lt;/span&gt;">
                <div class="slick_caption">Photoshop</div>
                <div class="img_box">
                  <img src="img/index/slick/slick_img1.png" alt="制作物1">
                </div>
                <div class="mask">
                  <div class="mask_caption">作品画像へ
                    <div class="mask_img">
                      <img src="img/icon/click.svg" alt="クリックアイコン">
                    </div>
                  </div>
                </div>
              </a>
              <a href="img/index/Photoshop/ps2.png" data-lightbox="photoshop" data-title="&lt;span class='lightbox_caption'&gt;MoGoサイト&lt;/span&gt;"></a>
              <a href="img/index/Photoshop/ps3.png" data-lightbox="photoshop" data-title="&lt;span class='lightbox_caption'&gt;沖縄旅行バナー&lt;/span&gt;"></a>
              <a href="img/index/Photoshop/ps4.png" data-lightbox="photoshop" data-title="&lt;span class='lightbox_caption'&gt;簡易掲示板&lt;/span&gt;"></a>
            </li>
            <li class="border_btn">
              <a href="img/index/Illustrator/ai1.jpg" data-lightbox="illustrator" data-title="&lt;span class='lightbox_caption'&gt;集合イラスト&lt;/span&gt;">
                <div class="slick_caption">Illustrator</div>
                <div class="img_box">
                  <img src="img/index/slick/slick_img2.png" alt="制作物2">
                </div>
                <div class="mask">
                  <div class="mask_caption">作品画像へ
                    <div class="mask_img">
                      <img src="img/icon/click.svg" alt="クリックアイコン">
                    </div>
                  </div>
                </div>
              </a>
              <a href="img/index/Illustrator/ai2.jpg" data-lightbox="illustrator" data-title="&lt;span class='lightbox_caption'&gt;路線・地図&lt;/span&gt;"></a>
              <a href="img/index/Illustrator/ai3.jpg" data-lightbox="illustrator" data-title="&lt;span class='lightbox_caption'&gt;コマ割りサイト1&lt;/span&gt;"></a>
              <a href="img/index/Illustrator/ai4.jpg" data-lightbox="illustrator" data-title="&lt;span class='lightbox_caption'&gt;コマ割りサイト2&lt;/span&gt;"></a>
            </li>
            <li class="border_btn">
              <a href="img/index/arduino/arduino1.jpg" data-lightbox="arduino" data-title="&lt;span class='lightbox_caption'&gt;LED点灯&lt;/span&gt;">
                <div class="slick_caption">Arduino</div>
                <div class="img_box">
                  <img src="img/index/slick/slick_img3.png" alt="制作物3">
                </div>
                <div class="mask">
                  <div class="mask_caption">
                    作品画像へ
                    <div class="mask_img">
                      <img src="img/icon/click.svg" alt="クリックアイコン">
                    </div>
                  </div>
                </div>
              </a>
              <a href="img/index/arduino/arduino2.jpg" data-lightbox="arduino" data-title="&lt;span class='lightbox_caption'&gt;ON・OFFスイッチ&lt;/span&gt;"></a>
              <a href="img/index/arduino/arduino3.jpg" data-lightbox="arduino" data-title="&lt;span class='lightbox_caption'&gt;DCモーターリレー&lt;/span&gt;"></a>
              <a href="img/index/arduino/arduino4.jpg" data-lightbox="arduino" data-title="&lt;span class='lightbox_caption'&gt;ステッピングモーター&lt;/span&gt;"></a>
            </li>
            <li class="border_btn">
              <a href="img/index/camp/camp1.jpg" data-lightbox="camp" data-title="&lt;span class='lightbox_caption'&gt;デイキャンプ&lt;/span&gt;">
                <div class="slick_caption">Camp</div>
                <div class="img_box">
                  <img src="img/index/slick/slick_img4.png" alt="制作物4">
                </div>
                <div class="mask">
                  <div class="mask_caption">
                    キャンプ画像へ
                    <div class="mask_img">
                      <img src="img/icon/click.svg" alt="クリックアイコン">
                    </div>
                  </div>
                </div>
              </a>
              <a href="img/index/camp/camp2.jpg" data-lightbox="camp" data-title="&lt;span class='lightbox_caption'&gt;タープ設営&lt;/span&gt;"></a>
              <a href="img/index/camp/camp3.jpg" data-lightbox="camp" data-title="&lt;span class='lightbox_caption'&gt;深夜タープ設営&lt;/span&gt;"></a>
              <a href="img/index/camp/camp4.jpg" data-lightbox="camp" data-title="&lt;span class='lightbox_caption'&gt;能古島キャンプ場&lt;/span&gt;"></a>
              <a href="img/index/camp/camp5.jpg" data-lightbox="camp" data-title="&lt;span class='lightbox_caption'&gt;オイルランタン&lt;/span&gt;"></a>
            </li>
            <li class="border_btn">
              <a href="img/index/electro/electro1.jpg" data-lightbox="electro" data-title="&lt;span class='lightbox_caption'&gt;ELEKIT電子ピアノ&lt;/span&gt;">
                <div class="slick_caption">Electronic</div>
                <div class="img_box">
                  <img src="img/index/slick/slick_img5.png" alt="制作物5">
                </div>
                <div class="mask">
                  <div class="mask_caption">
                    電子工作画像へ
                    <div class="mask_img">
                      <img src="img/icon/click.svg" alt="クリックアイコン">
                    </div>
                  </div>
                </div>
              </a>
              <a href="img/index/electro/electro2.jpg" data-lightbox="electro" data-title="&lt;span class='lightbox_caption'&gt;ペットボトルスピーカー&lt;/span&gt;"></a>
              <a href="img/index/electro/electro3.jpg" data-lightbox="electro" data-title="&lt;span class='lightbox_caption'&gt;ELEKITとげ丸&lt;/span&gt;"></a>
              <a href="img/index/electro/electro4.jpg" data-lightbox="electro" data-title="&lt;span class='lightbox_caption'&gt;AV出力基盤&lt;/span&gt;"></a>
              <a href="img/index/electro/electro5.jpg" data-lightbox="electro" data-title="&lt;span class='lightbox_caption'&gt;疑似ステレオ基盤表&lt;/span&gt;"></a>
              <a href="img/index/electro/electro6.jpg" data-lightbox="electro" data-title="&lt;span class='lightbox_caption'&gt;疑似ステレオ基盤裏&lt;/span&gt;"></a>
            </li>
          </ul>
        </div>
      </div>      
      
<!--      works-->
      <div id="works" class="bg">
        <div class="section">
          <h1 class="title">Works</h1>
          <ul class="tabs">
            <li class="tab"><div class="tab_btn tab_active">all</div></li>
            <li class="tab"><div class="tab_btn">earnest</div></li>
            <li class="tab"><div class="tab_btn">self</div></li>
          </ul>
          <div class="tab_content">
            <ul class="work_contents show">
              <li class="border_btn">
                <a href="" data-featherlight="#inner_1">
                  <div class="img_box">
                    <img src="img/portfolio/earnest/p1.png" alt="制作物1">
                  </div>
                  <div class="mask">
                    <div class="mask_caption">
                      作品詳細へ
                      <div class="mask_img">
                        <img src="img/icon/click.svg" alt="クリックアイコン">
                      </div>
                    </div>
                  </div>
                </a>
              </li>             
              <li class="border_btn">
                <a href="" data-featherlight="#inner_2">
                  <div class="img_box">
                    <img src="img/portfolio/earnest/p2.png" alt="制作物2">
                  </div>
                  <div class="mask">
                    <div class="mask_caption">
                      作品詳細へ
                      <div class="mask_img">
                        <img src="img/icon/click.svg" alt="クリックアイコン">
                      </div>
                    </div>
                  </div>
                </a>
              </li>
              <li class="border_btn">
                <a href="" data-featherlight="#inner_3">
                  <div class="img_box">
                    <img src="img/portfolio/earnest/p3.png" alt="制作物3">
                  </div>
                  <div class="mask">
                    <div class="mask_caption">
                      作品詳細へ
                      <div class="mask_img">
                        <img src="img/icon/click.svg" alt="クリックアイコン">
                      </div>
                    </div>
                  </div>
                </a>
              </li>
              <li class="border_btn">
                <a href="" data-featherlight="#inner_4">
                  <div class="img_box">
                    <img src="img/portfolio/earnest/p4.png" alt="制作物4">
                  </div>
                  <div class="mask">
                    <div class="mask_caption">
                      作品詳細へ
                      <div class="mask_img">
                        <img src="img/icon/click.svg" alt="クリックアイコン">
                      </div>
                    </div>
                  </div>
                </a>
              </li>            
              <li class="border_btn">
                <a href="" data-featherlight="#inner_5">
                  <div class="img_box">
                    <img src="img/portfolio/self/s1.png" alt="制作物5">
                  </div>
                  <div class="mask">
                    <div class="mask_caption">
                      作品詳細へ
                      <div class="mask_img">
                        <img src="img/icon/click.svg" alt="クリックアイコン">
                      </div>
                    </div>
                  </div>
                </a>
              </li>             
              <li class="border_btn">
                <a href="" data-featherlight="#inner_6">
                  <div class="img_box">
                    <img src="img/portfolio/self/s2.png" alt="制作物6">
                  </div>
                  <div class="mask">
                    <div class="mask_caption">
                      作品詳細へ
                      <div class="mask_img">
                        <img src="img/icon/click.svg" alt="クリックアイコン">
                      </div>
                    </div>
                  </div>
                </a>
              </li> 
              <li class="border_btn">
                <a href="" data-featherlight="#inner_7">
                  <div class="img_box">
                    <img src="img/portfolio/self/s3.png" alt="制作物7">
                  </div>
                  <div class="mask">
                    <div class="mask_caption">
                      作品詳細へ
                      <div class="mask_img">
                        <img src="img/icon/click.svg" alt="クリックアイコン">
                      </div>
                    </div>
                  </div>
                </a>
              </li>    
              <li class="border_btn">
                <a href="" data-featherlight="#inner_8">
                  <div class="img_box">
                    <img src="img/portfolio/self/s4.png" alt="制作物8">
                  </div>
                  <div class="mask">
                    <div class="mask_caption">
                      作品詳細へ
                      <div class="mask_img">
                        <img src="img/icon/click.svg" alt="クリックアイコン">
                      </div>
                    </div>
                  </div>
                </a>
              </li>              
            </ul>   
            <div class="featherlight-sample" id="inner_1">
                <div class="featherlight_content">
                  <div class="feather_img border_btn">
                    <a href="http://greatspirit.sakura.ne.jp/NK/a_ichiboji/php/board/index.php" target="_blank">
                      <img src="img/portfolio/earnest/p1.png" alt="制作物1">
                      <div class="mask">
                        <div class="mask_caption">
                          制作サイトへGO!
                          <div class="mask_img">
                            <img src="img/icon/click.svg" alt="クリックアイコン">
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                  <ul class="btn_wrap">
                    <li class="link">
                      <a href="http://greatspirit.sakura.ne.jp/NK/a_ichiboji/php/board/index.php" target="_blank">
                        簡易掲示板
                        <span class="btn_icon">
                          <img src="img/icon/link.png" alt="linkアイコン">
                          <img src="img/icon/link_w.png" alt="linkアイコンhover" class="active">
                        </span>
                      </a>
                    </li>
                    <li class="github">
                      <a href="https://github.com/ak-portfolio/Board" target="_blank">
                        GitHub
                        <span class="btn_icon">     
                          <img src="img/icon/github.png" alt="githubアイコン">
                          <img src="img/icon/github_w.png" alt="githubアイコンhover" class="active">
                        </span>
                      </a>
                    </li>
                  </ul>
                  <div class="feather_skill">
                    <p><span>使用スキル</span><br>
                    要件定義 /ワイヤーフレーム/<br class="br_sp">
                    デザインカンプ/HTML/CSS/<br class="br_sp">
                    JavaScript/PHP/MySQL
                    </p>
                  </div>
                  <div class="feather_caption">
                    <p><span>詳細説明</span><br>
                    PHPとMySQLを使用し、基本投稿と管理者による編集等の投稿機能を重視した作品です。
                    JavaScriptでの投稿を防ぐサニタイムズ化やセッションを用いて、表示名とメッセージの投稿の簡易化、管理者以外は管理画面に入れないよう、システム面を重視しました。初めて計画、デザイン、コーディング、デバッグを実践し、要件定義を丁寧に作成しないと作業中の手戻りが発生し、上流工程の計画やUI,UXの大切さを身を持って学びました。<br>
                    管理者用パスワード:「z4udGTgf」
                    </p>
                  </div>
                </div>
              </div>
              <div class="featherlight-sample" id="inner_2">
                <div class="featherlight_content">
                  <div class="feather_img border_btn">
                    <a href="http://greatspirit.sakura.ne.jp/NK/a_ichiboji/Dw/MoGo/" target="_blank">
                      <img src="img/portfolio/earnest/p2.png" alt="制作物2">
                      <div class="mask">
                        <div class="mask_caption">
                          制作サイトへGO!
                          <div class="mask_img">
                            <img src="img/icon/click.svg" alt="クリックアイコン">
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                  <ul class="btn_wrap">
                    <li class="link">
                      <a href="http://greatspirit.sakura.ne.jp/NK/a_ichiboji/Dw/MoGo/" target="_blank">
                        MoGo
                        <span class="btn_icon">
                          <img src="img/icon/link.png" alt="linkアイコン">
                          <img src="img/icon/link_w.png" alt="linkアイコンhover" class="active">
                        </span>
                      </a>
                    </li>
                    <li class="github">
                      <a href="https://github.com/ak-portfolio/MoGo" target="_blank">
                        GitHub
                        <span class="btn_icon">     
                          <img src="img/icon/github.png" alt="githubアイコン">
                          <img src="img/icon/github_w.png" alt="githubアイコンhover" class="active">
                        </span>
                      </a>
                    </li>
                  </ul>
                  <div class="feather_skill">
                    <p><span>使用スキル</span><br>
                    ワイヤーフレーム/デザインカンプ/HTML/CSS/JavaScript
                    </p>
                  </div>
                  <div class="feather_caption">
                    <p><span>詳細説明</span><br>
                    デザインをPhotoshopで模写し、DreamWeaverを使用して、ランディングページを作成しました。Flexboxを使用せず、クラスの命名規則や、インデント整理、見出しの重要度等、基礎的な部分を意識しながらコーディングを心掛けました。
                    </p>
                  </div>
                </div>
              </div>      
              <div class="featherlight-sample" id="inner_3">
                <div class="featherlight_content">
                  <div class="feather_img border_btn">
                    <a href="http://greatspirit.sakura.ne.jp/NK/a_ichiboji/Dw/payApp/" target="_blank">
                      <img src="img/portfolio/earnest/p3.png" alt="制作物3">
                      <div class="mask">
                        <div class="mask_caption">
                          制作サイトへGO!
                          <div class="mask_img">
                            <img src="img/icon/click.svg" alt="クリックアイコン">
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                  <ul class="btn_wrap">
                    <li class="link">
                      <a href="http://greatspirit.sakura.ne.jp/NK/a_ichiboji/Dw/payApp/" target="_blank">
                        payApp
                        <span class="btn_icon">
                          <img src="img/icon/link.png" alt="linkアイコン">
                          <img src="img/icon/link_w.png" alt="linkアイコンhover" class="active">
                        </span>
                      </a>
                    </li>
                    <li class="github">
                      <a href="https://github.com/ak-portfolio/payApp" target="_blank">
                        GitHub
                        <span class="btn_icon">     
                          <img src="img/icon/github.png" alt="githubアイコン">
                          <img src="img/icon/github_w.png" alt="githubアイコンhover" class="active">
                        </span>
                      </a>
                    </li>
                  </ul>
                  <div class="feather_skill">
                    <p><span>使用スキル</span><br>
                     ワイヤーフレーム/デザインカンプ/HTML/CSS/JavaScript
                    </p>
                  </div>
                  <div class="feather_caption">
                    <p><span>詳細説明</span><br>
                  教材の画像ファイルをphotoshopで模写し、flexを使用せずCSS詳細設計を意識しながら、コーディングを行いました。slickのボタン設定や文字の段ズレが起きないように調整しながら、横並びすることができました。
                    </p>
                  </div>
                </div>
              </div>
              <div class="featherlight-sample" id="inner_4">
                <div class="featherlight_content">
                  <div class="feather_img border_btn">
                    <a href="http://greatspirit.sakura.ne.jp/NK/a_ichiboji/design/wp06db/" target="_blank">
                      <img src="img/portfolio/earnest/p4.png" alt="制作物4">
                      <div class="mask">
                        <div class="mask_caption">
                          制作サイトへGO!
                          <div class="mask_img">
                            <img src="img/icon/click.svg" alt="クリックアイコン">
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                  <ul class="btn_wrap">
                    <li class="link">
                      <a href="http://greatspirit.sakura.ne.jp/NK/a_ichiboji/design/wp06db/" target="_blank">
                        Maverick Coffee
                        <span class="btn_icon">
                          <img src="img/icon/link.png" alt="linkアイコン">
                          <img src="img/icon/link_w.png" alt="linkアイコンhover" class="active">
                        </span>
                      </a>
                    </li>
                    <li class="github">
                      <a href="https://github.com/ak-portfolio/Maverick_Coffee" target="_blank">
                        GitHub
                        <span class="btn_icon">     
                          <img src="img/icon/github.png" alt="githubアイコン">
                          <img src="img/icon/github_w.png" alt="githubアイコンhover" class="active">
                        </span>
                      </a>
                    </li>
                  </ul>
                  <div class="feather_skill">
                    <p><span>使用スキル</span><br>
                    Wordpress/PHP</p>
                  </div>
                  <div class="feather_caption">
                    <p><span>詳細説明</span><br>
                    Wordpress入門書を参考にPHPを使用して、ホームページ作成を行いました。
                    サーバーへのインストールからテーマ設定・投稿等の基本操作や各コンテンツの設定。プラグインを使用し、ローカルからリモートへの移行する方法を学びました。
                    </p>
                  </div>
                </div>
              </div>
              <div class="featherlight-sample" id="inner_5">
                <div class="featherlight_content">
                  <div class="feather_img border_btn">
                    <a href="https://ak-portfolio.github.io/isara/" target="_blank">
                      <img src="img/portfolio/self/s1.png" alt="制作物5">
                      <div class="mask">
                        <div class="mask_caption">
                          制作サイトへGO!
                          <div class="mask_img">
                            <img src="img/icon/click.svg" alt="クリックアイコン">
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                  <ul class="btn_wrap">
                    <li class="link">
                      <a href="https://ak-portfolio.github.io/isara/" target="_blank">
                        iSara
                        <span class="btn_icon">
                          <img src="img/icon/link.png" alt="linkアイコン">
                          <img src="img/icon/link_w.png" alt="linkアイコンhover" class="active">
                        </span>
                      </a>
                    </li>
                    <li class="github">
                      <a href="https://github.com/ak-portfolio/isara" target="_blank">
                        GitHub
                        <span class="btn_icon">     
                          <img src="img/icon/github.png" alt="githubアイコン">
                          <img src="img/icon/github_w.png" alt="githubアイコンhover" class="active">
                        </span>
                      </a>
                    </li>
                  </ul>
                  <div class="feather_skill">
                    <p><span>使用スキル</span><br>
                    HTML/CSS
                    </p>
                  </div> 
                  <div class="feather_link">
                    <p><span>制作元サイト</span></p>
                    <a href="https://isara.life/" target="_blank">iSARAバンコクのノマドエンジニア育成講座</a>
                  </div>
                  <div class="feather_caption">
                    <p><span>詳細説明</span><br>
                      初めての模写コーディングでLPサイトを作成しました。インプットとアウトプットの違いを知り、コーディングに苦労しましたが、独学で調べながら作成していき、制作元サイトのデザインを再現することができました。
                    </p>
                  </div>
                </div>
              </div>
              <div class="featherlight-sample" id="inner_6">
                <div class="featherlight_content">
                  <div class="feather_img border_btn">
                    <a href="https://ak-portfolio.github.io/airbnb1/" target="_blank">
                      <img src="img/portfolio/self/s2.png" alt="制作物6">
                      <div class="mask">
                        <div class="mask_caption">
                          制作サイトへGO!
                          <div class="mask_img">
                            <img src="img/icon/click.svg" alt="クリックアイコン">
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                  <ul class="btn_wrap">
                    <li class="link">
                      <a href="https://ak-portfolio.github.io/airbnb1/" target="_blank">
                        Airbnb1
                        <span class="btn_icon">
                          <img src="img/icon/link.png" alt="linkアイコン">
                          <img src="img/icon/link_w.png" alt="linkアイコンhover" class="active">
                        </span>
                      </a>
                    </li>
                    <li class="github">
                      <a href="https://github.com/ak-portfolio/airbnb1" target="_blank">
                        GitHub
                        <span class="btn_icon">     
                          <img src="img/icon/github.png" alt="githubアイコン">
                          <img src="img/icon/github_w.png" alt="githubアイコンhover" class="active">
                        </span>
                      </a>
                    </li>
                  </ul>
                  <div class="feather_skill">
                    <p><span>使用スキル</span><br>
                    HTML/CSS/JavaScript
                    </p>
                  </div>
                  <div class="feather_link">
                    <p><span>制作元サイト</span></p>
                    <a href="https://web.archive.org/web/20190404074617/https://www.airbnb.jp/gift" target="_blank">現地の人から借りる家、体験＆スポット – Airbnb</a>
                  </div>
                  <div class="feather_caption">
                    <p><span>詳細説明</span><br>
                    ２回目の模写コーディングで初めてjQueryを実装しました。
                    メニュー画面のモーダル作成、ログイン画面でのメールアドレスの確認等のエラーチェックも実装し、制作元サイトのアニメーションを再現しました。
                    </p>
                  </div>
                </div>
              </div>
              <div class="featherlight-sample" id="inner_7">
                <div class="featherlight_content">
                  <div class="feather_img border_btn">
                    <a href="https://ak-portfolio.github.io/airbnb2/" target="_blank">
                      <img src="img/portfolio/self/s3.png" alt="制作物7">
                      <div class="mask">
                        <div class="mask_caption">
                          制作サイトへGO!
                          <div class="mask_img">
                            <img src="img/icon/click.svg" alt="クリックアイコン">
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                  <ul class="btn_wrap">
                    <li class="link">
                      <a href="https://ak-portfolio.github.io/airbnb2/" target="_blank">
                        Airbnb2
                        <span class="btn_icon">
                          <img src="img/icon/link.png" alt="linkアイコン">
                          <img src="img/icon/link_w.png" alt="linkアイコンhover" class="active">
                        </span>
                      </a>
                    </li>
                    <li class="github">
                      <a href="https://github.com/ak-portfolio/airbnb2" target="_blank">
                        GitHub
                        <span class="btn_icon">     
                          <img src="img/icon/github.png" alt="githubアイコン">
                          <img src="img/icon/github_w.png" alt="githubアイコンhover" class="active">
                        </span>
                      </a>
                    </li>
                  </ul>
                  <div class="feather_skill">
                    <p><span>使用スキル</span><br>
                    HTML/CSS/JavaScript
                    </p>
                  </div>
                  <div class="feather_link">
                    <p><span>制作元サイト</span></p>
                    <a href="https://web.archive.org/web/20200517141156/https://ja.airbnb.com/host/homes" target="_blank">Airbnbでお家、アパート、お部屋をシェアしよう</a>
                  </div>
                  <div class="feather_caption">
                    <p><span>詳細説明</span><br>
                    header箇所にBootStrapを実装し、レスポンシブでのハンバーガーメニューを作成しました。jQueryを使用し、TOPページテキストボックスでの表示やドロップダウンメニューでのテキストの変更に注力しました。
                    </p>
                  </div>
                </div>
              </div>
              <div class="featherlight-sample" id="inner_8">
                <div class="featherlight_content"> 
                  <div class="feather_img border_btn">
                    <a href="http://greatspirit.sakura.ne.jp/NK/a_ichiboji/old_portfolio/index.php" target="_blank">
                      <img src="img/portfolio/self/s4.png" alt="制作物8">
                      <div class="mask">
                        <div class="mask_caption">
                          制作サイトへGO!
                          <div class="mask_img">
                            <img src="img/icon/click.svg" alt="クリックアイコン">
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                  <ul class="btn_wrap">
                    <li class="link">
                      <a href="http://greatspirit.sakura.ne.jp/NK/a_ichiboji/old_portfolio/index.php" target="_blank">
                        old_portfolio
                        <span class="btn_icon">
                          <img src="img/icon/link.png" alt="linkアイコン">
                          <img src="img/icon/link_w.png" alt="linkアイコンhover" class="active">
                        </span>
                      </a>
                    </li>
                    <li class="github">
                      <a href="https://github.com/ak-portfolio/old_portfolio" target="_blank">
                        GitHub
                        <span class="btn_icon">     
                          <img src="img/icon/github.png" alt="githubアイコン">
                          <img src="img/icon/github_w.png" alt="githubアイコンhover" class="active">
                        </span>
                      </a>
                    </li>
                  </ul>
                  <div class="feather_skill">
                    <p><span>使用スキル</span><br>
                    HTML/CSS/JavaScript/PHP
                    </p>
                  </div>
                  <div class="feather_caption">
                    <p><span>詳細説明</span><br>
                    独学で制作したポートフォリオです。海をテーマに
                    jQueryアニメーションを活用して、動的なLPサイトを意識して作成しました。
                    お問い合わせ画面はCyberduckを使用し、ローカル環境開発やリモートサイトのデバッグを学びました。
                    </p>
                  </div>
                </div>
              </div>
              
            <ul class="work_contents">
              <li class="border_btn">
                <a href="" data-featherlight="#inner_1">
                  <div class="img_box">
                    <img src="img/portfolio/earnest/p1.png" alt="制作物1">
                  </div>
                  <div class="mask">
                    <div class="mask_caption">
                      作品詳細へ
                      <div class="mask_img">
                        <img src="img/icon/click.svg" alt="クリックアイコン">
                      </div>
                    </div>
                  </div>
                </a>
              </li>             
              <li class="border_btn">
                <a href="" data-featherlight="#inner_2">
                  <div class="img_box">
                    <img src="img/portfolio/earnest/p2.png" alt="制作物2">
                  </div>
                  <div class="mask">
                    <div class="mask_caption">
                      作品詳細へ
                      <div class="mask_img">
                        <img src="img/icon/click.svg" alt="クリックアイコン">
                      </div>
                    </div>
                  </div>
                </a>
              </li>
              <li class="border_btn">
                <a href="" data-featherlight="#inner_3">
                  <div class="img_box">
                    <img src="img/portfolio/earnest/p3.png" alt="制作物3">
                  </div>
                  <div class="mask">
                    <div class="mask_caption">
                      作品詳細へ
                      <div class="mask_img">
                        <img src="img/icon/click.svg" alt="クリックアイコン">
                      </div>
                    </div>
                  </div>
                </a>
              </li>
              <li class="border_btn">
                <a href="" data-featherlight="#inner_4">
                  <div class="img_box">
                    <img src="img/portfolio/earnest/p4.png" alt="制作物4">
                  </div>
                  <div class="mask">
                    <div class="mask_caption">
                      作品詳細へ
                      <div class="mask_img">
                        <img src="img/icon/click.svg" alt="クリックアイコン">
                      </div>
                    </div>
                  </div>
                </a>
              </li>                     
            </ul>
            <ul class="work_contents">
              <li class="border_btn">
                <a href="" data-featherlight="#inner_5">
                  <div class="img_box">
                    <img src="img/portfolio/self/s1.png" alt="制作物5">
                  </div>
                  <div class="mask">
                    <div class="mask_caption">
                      作品詳細へ
                      <div class="mask_img">
                        <img src="img/icon/click.svg" alt="クリックアイコン">
                      </div>
                    </div>
                  </div>
                </a>
              </li>             
              <li class="border_btn">
                <a href="" data-featherlight="#inner_6">
                  <div class="img_box">
                    <img src="img/portfolio/self/s2.png" alt="制作物6">
                  </div>
                  <div class="mask">
                    <div class="mask_caption">
                      作品詳細へ
                      <div class="mask_img">
                        <img src="img/icon/click.svg" alt="クリックアイコン">
                      </div>
                    </div>
                  </div>
                </a>
              </li> 
              <li class="border_btn">
                <a href="" data-featherlight="#inner_7">
                  <div class="img_box">
                    <img src="img/portfolio/self/s3.png" alt="制作物7">
                  </div>
                  <div class="mask">
                    <div class="mask_caption">
                      作品詳細へ
                      <div class="mask_img">
                        <img src="img/icon/click.svg" alt="クリックアイコン">
                      </div>
                    </div>
                  </div>
                </a>
              </li>    
              <li class="border_btn">
                <a href="" data-featherlight="#inner_8">
                  <div class="img_box">
                    <img src="img/portfolio/self/s4.png" alt="制作物8">
                  </div>
                  <div class="mask">
                    <div class="mask_caption">
                      作品詳細へ
                      <div class="mask_img">
                        <img src="img/icon/click.svg" alt="クリックアイコン">
                      </div>
                    </div>
                  </div>
                </a>
              </li>             
            </ul>
          </div>
        </div>
      </div>
      
<!--      skill-->
      <div id="skill" class="bg">
        <div class="section">
          <h1 class="title">Skill</h1>
          <div class="skill_type">
            <input id="check1" type="checkbox" class="check" value="">
            <label for="check1" class="skill_type_title">code</label>
            <ul class="skill_contents">
              <li>
                <div class="skill_item">
                  <div class="skill_img">
                    <img src="img/skill/HTML5.png" alt="HTML/cssアイコン">
                  </div>
                  <div class="skill_name">HTML5/CSS3</div>
                  <div class="learning_time">学習期間：6ヶ月</div>
                  <p>基本的なコーディングやレスポンシブ、Bootstrap、CSS設計思想を学習し、LPを作成した経験があります。使用エディタはBraket、Dreamweaverです。</p>
                </div>
              </li>
              <li>
                <div class="skill_item">
                  <div class="skill_img">
                    <img src="img/skill/jquery.png" alt="jQueryアイコン">
                  </div>
                  <div class="skill_name">jQuery</div>
                  <div class="learning_time">学習期間：2ヶ月</div>
                  <p>ライブラリの実装やスムーススクロール、slick、LightBoxなどのアニメーション機能は問題なく実装できます。</p>
                </div>
              </li>
              <li>
                <div class="skill_item">
                  <div class="skill_img">
                    <img src="img/skill/php.png" alt="PHPアイコン">
                  </div>
                  <div class="skill_name">PHP</div>
                  <div class="learning_time">学習期間：1ヶ月</div>
                  <p>メール転送・PDOでのデータベース接続・テーブル操作、ローカル環境開発・リモート移行とデバッグ処理を学習しております。</p>
                </div>
              </li>
            </ul>
            <input id="check2" type="checkbox" class="check" value="">
            <label for="check2" class="skill_type_title">design</label>
              <ul class="skill_contents">
                <li>
                  <div class="skill_item">
                    <div class="skill_img">
                      <img src="img/skill/photoshop.png" alt="Photoshopアイコン">
                    </div>
                    <div class="skill_name">Photoshop</div>
                    <div class="learning_time">学習期間：3ヶ月</div>
                    <p>基本的な操作やマスク処理による合成が可能です。LP(ランディングページ)のデザインカンプ 作成の経験があります。</p>
                  </div>
                </li>
                <li>
                  <div class="skill_item">
                    <div class="skill_img">
                      <img src="img/skill/illustrator.png" alt="llustratorアイコン">
                    </div>
                    <div class="skill_name">llustrator</div>
                    <div class="learning_time">学習期間：3ヶ月</div>
                    <p>ベジェ曲線でイラスト作成やホームページデザインを作成した経験があります。ロゴ作成や、地図・旅行チケットの作成もできます。</p>
                  </div>
                </li>
                <li>
                  <div class="skill_item">
                    <div class="skill_img">
                      <img src="img/skill/xd.png" alt="XDアイコン">
                    </div>
                    <div class="skill_name">XD</div>
                    <div class="learning_time">学習期間：1ヶ月</div>
                    <p>現在、基本操作を独学しております。今回のポートフォリオのワイヤーフレーム、デザインカンプ はXDで作成しております。</p>
                  </div>
                </li>
              </ul>
            <input id="check3" type="checkbox" class="check" value="">
            <label for="check3" class="skill_type_title">other</label>
            <ul class="skill_contents">
              <li>
                <div class="skill_item">
                  <div class="skill_img"> 
                    <img src="img/skill/wordpress.png" alt="Wordpressアイコン">
                  </div>
                  <div class="skill_name">Wordpress</div>
                  <div class="learning_time">学習期間：2ヶ月</div>
                  <p>サーバーへのインストールからテーマ設定・投稿などの基本操作が可能です。
                  PHPによるテーマ作成やローカル開発からリモートへの移行を経験しております。</p>
                </div>
              </li>
              <li>
                <div class="skill_item">
                  <div class="skill_img">
                    <img src="img/skill/mysql.png" alt="MySQLアイコン">
                  </div>
                  <div class="skill_name">MySQL</div>
                  <div class="learning_time">学習期間：2ヶ月</div>
                  <p>テーブルの追加・修正・削除などの基本的な操作を学習したことがあります。PDOやMysqliを使用して、テーブル操作を行なった経験があります。</p>
                </div>
              </li>
              <li>
                <div class="skill_item">
                  <div class="skill_img">
                    <img src="img/skill/arduino.png" alt="Arduinoアイコン">
                  </div>
                  <div class="skill_name">Arduino</div>
                  <div class="learning_time">学習期間：1ヶ月</div>
                  <p>Arduinoの基礎知識を独学しております。
                  サーボモーターやLCDディスプレイなどの基本的な操作や配線・動作確認を行えます。Scrattino3での経験もあります。</p>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      
<!--      about-->
      <div id="about" class="bg">
        <div class="section">
          <h1 class="title">About</h1>
          <ul class="about_content">
            <li>
              <div class="hexagon">
                <div class="hexagon__inner--1">
                  <div class="hexagon__inner--2">
                    <div class="hexagon__inner--3">
                      <div class="hexagon__inner-4">
                        <img src="img/about/photo.jpg" alt="アバウト写真">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <div class="about_description">
                <div class="about_description_title">【自己紹介】</div>
                <p class="about_caption">
                現在、WEBコーダー職を志望しております。事務職に従事していた際、自発的にVBAを独学し、業務改善をした経験があります。 その際にコーディングで業務改善できた喜びを知り、プログラミングに興味を抱いたのがきっかけです。現在は就労移行支援アーネストキャリアに入所し、業務でも活かせるコーディング（CSS詳細設計）やWEBデザインの基礎を学んでおります。
                </p>
              </div>
            </li>
          </ul>
          <div class="about_sub_description">
            <p><span>【最終学歴】</span><br class="br_sp br_tab">専修学校コンピューター教育学院<br class="br_sp">情報システム工学科<br class="br_sp">2012年3月卒業<br>
              <span>【言語】</span><br class="br_sp br_tab">HTML/CSS/JavaScript/<br class="br_sp">PHP/MySQL/Arduino<br>
              <span>【デザイン】</span><br class="br_sp br_tab">Photoshop/Illustrator/XD<br>
              <span>【趣味】</span><br class="br_sp br_tab">キャンプ/電子工作/囲碁<br>
              <span>【GitHub】</span><br class="br_sp br_tab"><a href="https://github.com/ak-portfolio/New_portfolio" target="_blank">ポートフォリオサイトのGitHub</a>
            </p>
          </div>
        </div>
      </div>
<!--      contact-->
      <div id="contact" class="bg">
        <div class="section">
          <h1 class="title">Contact</h1>
          <form id="main_contact" method="post" action="confirm.php">
            <ul class="contact_content">
              <li>
                <div class="name">
                  <label for="name">お名前</label>
                  <span class="required">必須</span>
                  <input id="name" class="validate max50 required_text" type="text" name="name" placeholder="お名前" value=
                  "<?php echo h($name); ?>">
                  <p class="error">
                    <?php echo h( $error_name ); ?>
                  </p>
                </div>
                <div class="mail">
                  <label for="mail">メール</label>
                  <span class="required">必須</span>
                  <input id="mail" class="validate max100 required_text" type="text" name="email" placeholder="メールアドレス" value=
                  "<?php echo h($email); ?>" >
                  <p class="error">
                    <?php echo h( $error_email ); ?>
                  </p>
                </div>
              </li>
              <li>
                <div class="message">
                  <label for="body">メッセージ</label>
                  <span class="required">必須</span>
                  <span id="count"></span>
                  <textarea id="body"  class="validate max1000 required_text" name="body" cols="30" rows="5" tabindex="1" accesskey="A" 
                  placeholder="お問い合わせ内容（1000文字まで）をお書きください"><?php echo h($body); ?></textarea>
                  <p class="error">
                    <?php echo h( $error_body ); ?>
                  </p>
                </div>
              </li>
            </ul>
            <button class="btn" type="submit" name="submit" tabindex="1" accesskey="B">
              送信
            </button>
            <input type="hidden" name="ticket" value="<?php echo h($ticket); ?>">
          </form>
        </div>
      </div>
      
<!--      footer-->
      <footer>
        <h2 class="main_logo">
          <a href="#index">
            <img src="img/logo/logo_w.png" alt="footerロゴ">
            <img src="img/logo/logo_o.png" alt="footerロゴ" class="active">
          </a>
        </h2>
        <nav class="nav_menu">
          <ul>
            <li><a href="#works">Works</a></li>
            <li><a href="#skill">Skill</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </nav>
      </footer>
    </div>
  </body>
</html>
