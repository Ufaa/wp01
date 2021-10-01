<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、インストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さずにこのファイルを "wp-config.php" という名前でコピーして
 * 直接編集して値を入力してもかまいません。
 *
 * このファイルは、以下の設定を含みます。
 *
 * * MySQL 設定
 * * 秘密鍵
 * * データベーステーブル接頭辞
 * * ABSPATH
 *
 * @link https://ja.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// 注意:
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.osdn.jp/%E7%94%A8%E8%AA%9E%E9%9B%86#.E3.83.86.E3.82.AD.E3.82.B9.E3.83.88.E3.82.A8.E3.83.87.E3.82.A3.E3.82.BF 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define( 'DB_NAME', 'wp01db' );

/** MySQL データベースのユーザー名 */
define( 'DB_USER', 'root' );

/** MySQL データベースのパスワード */
define( 'DB_PASSWORD', 'root' );

/** MySQL のホスト名 */
define( 'DB_HOST', 'localhost' );

/** データベースのテーブルを作成する際のデータベースの文字セット */
define( 'DB_CHARSET', 'utf8mb4' );

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define( 'DB_COLLATE', '' );

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '%&:cV$dJkK!#lf;5l}>.v(C??p|UHo7ha#eI8;%*!`rM_?82Q2-8`RX&0Fy%X)Rj' );
define( 'SECURE_AUTH_KEY',  'QP6+!b#[M&DpYd#kokQ]sM;hEqm`[B&sr<-?W=5h81;0^jSV|%pwK6bOttJ@oMQ+' );
define( 'LOGGED_IN_KEY',    '/-Eih29Whnqy7v|W*I<=QA- Vvj 8St=5Q.y^QJfNRf)1^#v!jw--u?6}NrGqb^t' );
define( 'NONCE_KEY',        '9uuZ`neu* I4*Hl0]XL?2C&eH+KtnYrQX^J)Npm60Ce<b:CFKw4yaRq3WWqUyM>/' );
define( 'AUTH_SALT',        'h8N@B>Y`tACg(feuOT~]b{-4@Fd<-AZ1hg8{- i{RR?G@ua4h}Z>oLL_zVLCoqD1' );
define( 'SECURE_AUTH_SALT', '3v24{ueS?UDY6A:eUm_z/09r{sw5xYA16F[<y4^IRCJME0{ 7OrNuE_ FeKd.%j]' );
define( 'LOGGED_IN_SALT',   'XcL^An7CHi)R[hQb[gd`Sy6[/+0`kfXY] $Fe|Ja2`m;Dch3FZzF.2Hc2*8L/pa7' );
define( 'NONCE_SALT',       '8>u:4q Mx$GLB?)`G@Q2x&qUF;>(`$:+6VF)y}kA<_ebv+rh{>`-2?Rl?Oe++ga1' );

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix = 'wp_';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 *
 * その他のデバッグに利用できる定数についてはドキュメンテーションをご覧ください。
 *
 * @link https://ja.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* カスタム値は、この行と「編集が必要なのはここまでです」の行の間に追加してください。 */



/* 編集が必要なのはここまでです ! WordPress でのパブリッシングをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
