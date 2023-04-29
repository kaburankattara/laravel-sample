echo 作業ディレクトリに移動
cd ~/workspace/laravel-sample/docker/

echo dockerを起動
docker-compose -f docker-compose.yml -p laravel-sample up --build -d
echo 初回起動用スクリプトを実行
docker container exec -it laravel-app sh /docker-tmp/container-init.sh
