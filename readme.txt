詳しくはこちらのブログの記事を参考に。著作権はhosimituに帰属するかも。
http://www.hosimitu.com/2009/08/2923-1332.php

それぞれの機能の説明のために機能を小分けしています。
使う時はbase.phpとかにコピペでまとめて貰えればと思います。
質問等は上記のブログのコメントか、http://twitter.com/hosimitu　までどうぞ。
回答できるかはわからないですが　:(；ﾞﾟ'ωﾟ'):

パーミッションの一例
phpは644 or 755
txtは606

2010.4.2 改良
OAuthに対応。API呼び出し部分をIDとパスワードではなく、OAuthで呼び出すようにした。
OAuthに必要な『Consumer Key』などを『setting.php』に書くようにした。

2010.4.30
twitter本家で『Consumer Key』などを取得出来るようになりました。
それに伴いOAuth関係を最新版に更新しました。
『Consumer Key』の取得に関しては『http://www.hosimitu.com/2010/04/2920-1456.php』を参考にして貰えれば楽に出来ると思います。
取得した値はsetting.phpに書き加えてください。

This uses "abraham's twitteroauth at master".
URL: http://github.com/abraham/twitteroauth