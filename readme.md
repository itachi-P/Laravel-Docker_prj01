http://itachi-p.com
# itachi-P's GitHub repository
##### ※ブラウザからアクセスされた方向けのメッセージ

ごめんなさい、このページはまだ**工事中**です。

<a href="http://test.itachi-p.com">テストページ</a>

---

### 履歴

- 2019/09/17
  - Amazon Virtual Private Cloud (VPC)にてアップロード領域確保
  - Amazon Elastic Compute Cloud (EC2)インスタンス生成（リージョン：東京ではなく北米西海岸オレゴンを選択）
  - Amazon Identity and Access Management(IAM)にて権限を制限したユーザー作成
- 2019/09/18
  - Amazon Route 53 にて独自ドメイン取得、ルーティング
  - Amazon EC2上にSSH接続で「工事中」ページをファイルアップロード
  - http://test.itachi-p.com のアドレスで仮公開
- 2019/09/19
  - http://itachi-p.com/ のアドレスにてGitHubの当リポジトリを紐付け、連動（仮）公開
- 2019/09/20
  - Docker利用法の選択肢
    - ~~Amazon Elastic Container Service(ECS)~~
    - ~~Elastic Beanstalk Docker (Single Container)~~
    - **Elastic Beanstalk Multi-Container Dockerに決定**
  - CircleCI連動（設定段階）※実装優先度低（後でよい）
    - [（公式）CircleCI を設定する](https://circleci.com/docs/ja/2.0/configuration-reference/)
    - [（公式）2.0 config.yml の設定例](https://circleci.com/docs/ja/2.0/sample-config/)
    - [実践で学ぶ、Laravelをローカルから本番環境にデプロイするまで](https://logmi.jp/tech/articles/321252)
  - Amazon CloudFormationによりここまでの構築環境をスタックとして記録
  - Amazon CloudWatchによる監視利用開始
    - Amazon CloudWatch(Logs)利用→S3にログ保存
    - Amazon Simple Notification Service(SNS)利用→重大な影響が発生した際にメール通知する設定を有効化

---

### (以後の予定)

- Dockerrun.aws.jsonファイルの記述（バージョン１ - シングルコンテナ、バージョン２ - マルチコンテナ）
  - シングルコンテナの場合のみDockerfileによるカスタムイメージ使用可能、マルチコンテナはDockerrun.aws.jsonのみ
  - Amazon Elastic Container Registry(Amazon ECR、後述)にイメージを保存する場合はカスタムイメージ保存制限なし
- [（公式）Elastic Beanstalk への Laravel アプリケーションのデプロイ](https://docs.aws.amazon.com/ja_jp/elasticbeanstalk/latest/dg/php-laravel-tutorial.html)
  - [（公式）単一コンテナのDocker設定](https://docs.aws.amazon.com/ja_jp/elasticbeanstalk/latest/dg/single-container-docker-configuration.html)
  - [（公式）複数コンテナのDocker設定](https://docs.aws.amazon.com/ja_jp/elasticbeanstalk/latest/dg/create_deploy_docker_v2config.html#create_deploy_docker_v2config_dockerrun)
  - [入門Docker](https://y-ohgi.com/introduction-docker/)
- Amazon Elastic Container Registry (Amazon ECR)を使用して(有料)AWS にカスタムDockerイメージを保存するか、それともDockerHubから'docker login'するか(ECRを使わない場合は認証情報のS3への保存が必要）要検討
- Amazon Simple Storage Service (S3)に静的ファイル配置
- Amazon Relational Database Service(RDS)連動
- Amazon CloudWatch(Logs)も利用検討
  - 監視→アラート（Eメール、SMS等）| 設定に基づく何らかのアクション
    - スケールアウト（パフォーマンス向上）
    - スケールイン（コスト削減）
    - イベント発生→自己トリガーにより自動アクション設定
    - 一定時間ごとのバッチ処理　など


---


<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>
