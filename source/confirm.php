<?php
//セッションを開始
session_start(); 
 
//エスケープ処理やデータチェックを行う関数のファイルの読み込み
require 'libs/functions.php'; 
 
//POST されたデータをチェック
$_POST = checkInput( $_POST );
 
//固定トークンを確認（CSRF対策）
if ( isset( $_POST[ 'ticket' ], $_SESSION[ 'ticket' ] ) ) {
  $ticket = $_POST[ 'ticket' ];
  if ( $ticket !== $_SESSION[ 'ticket' ] ) {
    //トークンが一致しない場合は処理を中止
    die( 'Access Denied!' );  
  }
} else {
  //トークンが存在しない場合は処理を中止（直接このページにアクセスするとエラーになる）
  die( 'Access Denied（直接このページにはアクセスできません）' );
}
 
//POSTされたデータを変数に代入
$name = isset( $_POST[ 'name' ] ) ? $_POST[ 'name' ] : NULL;
$email = isset( $_POST[ 'email' ] ) ? $_POST[ 'email' ] : NULL;
$body = isset( $_POST[ 'body' ] ) ? $_POST[ 'body' ] : NULL;
 
//POSTされたデータを整形（前後にあるホワイトスペースを削除）
$name = trim( $name );
$email = trim( $email );
$body = trim( $body );
 
//エラーメッセージを保存する配列の初期化
$error = array();
 
//値の検証（入力内容が条件を満たさない場合はエラーメッセージを配列 $error に設定）
if ( $name == '' ) {
  $error['name'] = '*お名前は必須項目です。';
  //制御文字でないことと文字数をチェック
} else if ( preg_match( '/\A[[:^cntrl:]]{1,50}\z/u', $name ) == 0 ) {
  $error['name'] = '*お名前は50文字以内でお願いします。';
}
if ( $email == '' ) {
  $error['email'] = '*メールアドレスは必須です。';
} else { //メールアドレスを正規表現でチェック
  $pattern = '/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/uiD';
  if ( !preg_match( $pattern, $email ) ) {
    $error['email'] = '*メールアドレスの形式が正しくありません。';
  }
}

if ( $body == '' ) {
  $error['body'] = '*内容は必須項目です。';
  //制御文字（タブ、復帰、改行を除く）でないことと文字数をチェック
} else if ( preg_match( '/\A[\r\n\t[:^cntrl:]]{1,1050}\z/u', $body ) == 0 ) {
  $error['body'] = '*内容は1000文字以内でお願いします。';
}
 
//POSTされたデータとエラーの配列をセッション変数に保存
$_SESSION[ 'name' ] = $name;
$_SESSION[ 'email' ] = $email;
$_SESSION[ 'body' ] = $body;
$_SESSION[ 'error' ] = $error;
 
//チェックの結果にエラーがある場合は入力フォームに戻す
if ( count( $error ) > 0 ) {
  //エラーがある場合
  $dirname = dirname( $_SERVER[ 'SCRIPT_NAME' ] );
  $dirname = $dirname == DIRECTORY_SEPARATOR ? '' : $dirname;
  $url = ( empty( $_SERVER[ 'HTTPS' ] ) ? 'http://' : 'https://' ) . $_SERVER[ 'SERVER_NAME' ] . $dirname . '/index.php#contact';
  header( 'HTTP/1.1 303 See Other' );
  header( 'location: ' . $url );
  exit;
}

if(isset($_POST['cansel'])){

}

?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>コンタクトフォーム（確認）</title>
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>
    <div class="wrap">
      <div id="confirm" class="bg">
        <div class="section">
          <h1 class="title">Confirm</h1>
          <p class="confirm_caption">以下の内容でよろしければ「送信」をクリックしてください。<br>
          内容を変更する場合は「キャンセル」をクリックして入力画面にお戻りください。</p>
          <div class="confirm_content">
            <table>
              <tr>
                <th>お名前:</th>
                <td><?php echo h($name); ?></td>
              </tr>
              <tr>
                <th>メールアドレス:</th>
                <td><?php echo h($email); ?></td>
              </tr>
              <tr>
                <th>メッセージ:</th>
                <td><?php echo h($body); ?></td>
              </tr>
            </table>
            <div class="btn_wrap">
              <form action="complete.php" method="post" class="confirm">
                <!-- 完了ページへ渡すトークンの隠しフィールド -->
                <input type="hidden" name="ticket" value="<?php echo h($ticket); ?>">
                <button id="submit" type="submit" class="btn">送信</button>
              </form>
              <form action="index.php" method="post" class="confirm">
                <button id="cansel" type="submit"  class="btn">キャンセル</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>