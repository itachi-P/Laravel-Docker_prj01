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
- 2019/09/20〜23
  - Docker利用法の選択肢
    - ~~Amazon Elastic Container Service(ECS)~~　**次回利用予定**
    - ~~Elastic Beanstalk Docker (Single Container)~~ *Multiの方が柔軟に対応可能*
    - **Elastic Beanstalk Multi-Container Docker 今回はこれに決定**
  - CircleCI連動（設定段階）※実装優先度低（後でよい）
    - [（公式）CircleCI を設定する](https://circleci.com/docs/ja/2.0/configuration-reference/)
    - [（公式）2.0 config.yml の設定例](https://circleci.com/docs/ja/2.0/sample-config/)
    - [実践で学ぶ、Laravelをローカルから本番環境にデプロイするまで](https://logmi.jp/tech/articles/321252)
      - .circleci/config.ymlの設定(今ここ)→CircleCIのWebサイトに行って設定→start building
  - Amazon CloudFormationによりここまでの構築環境をスタックとして記録
  - Amazon CloudWatchによる監視利用開始
    - Amazon CloudWatch(Logs)利用→S3にログ保存
    - Amazon Simple Notification Service(SNS)利用→重大な影響が発生した際にメール通知する設定を有効化

---

### (以後の予定)

- AWSマネージドサービスのうち今回利用する選定済み各サービスについての理解及び設計思想強化
  - [AWS Well-Architected Training (Japanese) (AWS による優れた設計トレーニング)](https://www.aws.training/Details/Curriculum?id=12033)
    - 7個のオンライントレーニング＋**評価テスト**
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
- Amazon CloudWatch(Logs)利用
  - 監視→アラート（Eメール、SMS等）| 設定に基づく何らかのアクション
    - スケールアウト（パフォーマンス向上）
    - スケールイン（コスト削減）
    - イベント発生→自己トリガーにより自動アクション設定
    - 一定時間ごとのバッチ処理　など
- :認証にAmazon Cognito利用を検討
  - サーバレスアーキテクチャにより一切コードを書かずに認証（サインアップ・サインイン）機能実装も可能
  - [プログラミングせずにCognitoで新規ユーザー登録＆サインインを試してみる](https://dev.classmethod.jp/cloud/aws/sign-up-and-sign-in-by-cognito-with-awscli/)
- 肝心のポートフォリオの中身の作成
  - 上記をDockerイメージと共に、または上記も含めたカスタムイメージをAWSにデプロイ
  - CircleCI連動で自動ビルド、テスト、デプロイ確認
    - GitHubの該当リポジトリ上でPR（プルリク）が作成されたら自動的にビルド・テストを実行
    - masterブランチにPRがmergeされたら `eb deploy`コマンドを実行し、自動でデプロイ
- :new: Dockerイメージを公開リポジトリではなくプライベートリポジトリに置くよう変更
  - [Amazon S3をDockerプライベートレポジトリにしてAWS ElasticBeanstalk環境にデプロイ](https://aws.typepad.com/sajp/2014/06/eb-docker-private-repo.html)
- 更に余裕ができればECSへの理解を深め、Elastic Beanstalk → (ECR &) ECSに移行
- :horse: 更に更にECS → （Kubernetesについて学習した上で）EKS？
- *いずれにせよ、今後k8s(やGCPやGolang)にも対応していくが、まずはLaravel & AWS & Dockerにある程度習熟する*

(その他)
- **継続的デリバリー/継続的インテグレーション**
  - ツールとしてのCircleCIの利用だけでなく、アプリ開発及び運用、機能追加、リファクタリング等全般においてCI/CD及びその最適ツールの運用を検討する。
- サーバレス・イベントドリブン化
  - CloudWatchにより複数のメトリクス監視→何かしらのイベント（アクセス数・パフォーマンス変化や定時実行イベント等）・障害等の発生→*Lambda*によりAPI起動→タスク、スケジュール、バッチ処理、障害対応、スケールアウト（パフォーマンス向上）、スケールイン（コスト削減）を実行
- MySQL → Amazon Database Aurora（MySQL5.6互換）の利用
  - データベースもAmazon RDS/Aurora等のマネージドサービスを利用し、インフラ導入及び運用のコストカット、インフラ層（レイヤー）の管理をAmazonに運用委任して最上位のアプリケーション開発だけに集中する選択肢も選べるように

---


<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>
