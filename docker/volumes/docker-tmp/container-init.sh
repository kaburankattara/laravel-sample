if [ ! -e '/check' ]; then
    touch /check
    # 初回起動時に実行させたいコマンドをここに書く
    echo "セットアップ"

    echo setup httpd
    cp /docker-tmp/httpd/conf/httpd.conf /etc/httpd/conf/httpd.conf
    systemctl restart httpd

    echo "セットアップ完了"
else
    # 2回目以降
    echo "セットアップ済"
fi
