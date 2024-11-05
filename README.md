# 概要
DockerとViteを使用したWordPressの開発環境を簡単に構築できます。
viteのHMR(Hot Module Replacement)と、vite-plugin-live-reloadを使用しており、scss、typescript、PHPファイルの変更検知と高速な自動リロードを実現しています。
また環境構築が簡単なので、複数デバイス間での All in one WP Migration を使用した同期にも使用できます。


# 目的
本プロジェクトの目的は、wordpressとその初期セットアップを用意し、開発速度・開発体験を最大限高めることです。
DockerとViteを利用し初期開発環境を整えることで、主に以下のような効果が期待できます。
・WordPressの高速なインストール：Dockerの5分でできるwordpressのセットアップを、テンプレートを既に用意しておくことで2分で終わらせることができます。
・Viteとプラグインによる光速なホットリロード：viteとvite-plugin-live-reloadを使用することでscss, typescript, PHPファイルの変更を検知、即座にブラウザをリロードします。
・初期設定の時間短縮：FLOCSSの雛形やテーマとして必要なPHPファイル群を用意しておくことで、WordPress 構築後ただちに開発に取り掛かれます。


# 使い方
## 基本的な使い方
### 1. Docker Desktopのインストール
Docker公式より、お使いのOSにあったDocker Desktopアプリをインストールしてください。

### 2. "npm install"の実行
既にpackage.jsonとpackage-lock.jsonが準備してあります。プロジェクトルートディレクトリ（vite.config.tsがあるディレクトリ）にて、"npm install"コマンドを実行してnode_modulesの作成を確認してください。

### 3. mySQLパスワード等変更（推奨）
ルートディレクトリにあるdocker-compose.ymlファイル内の、「状況に応じて変更」と記載してある項目の値を変更してください。
特に、外部に公開する予定のサイトである場合推測されにくいパスワード、任意のユーザー名に変更することを強く推奨します。

### 4. "docker-compose up --build" (起動二回目以降の場合は"docker-compose up -d") の実行
起動初回（wordpress:latestイメージ, mySQL:5.7イメージが存在しない場合）は"docker-compose up --build"を、それ以外は"docker-compose up -d"を実行しdockerを起動します。
この段階でwordpressとroot/dbが作成されます。

### 5. wordpressのセットアップ
ブラウザのURL欄に "http://localhost:8000" と入力・エンターを押し、指示に従ってwordpressのインストールを行ってください。

### 6. "npm run dev"の実行
WordPressのインストールが終わったら、ルートディレクトリにて"npm run dev"コマンドを実行してviteを起動してください。
これで開発環境の構築は終わりです。viteとvite-plugin-live-reloadによるホットリロードを使用できます。

## 他使い方
ビルド時にはルートディレクトリにて"npm run build"を実行してください。/wp/src/にmain.cssとmain.jsが入ったdistディレクトリが作成されます。
