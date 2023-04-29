echo 作業ディレクトリに移動
cd ~/workspace/laravel-sample/docker/

echo mysqlのデータディレクトリを削除
#rm -rf volumes/mysql/datadir

echo dockerを起動
docker-compose -f docker-compose.yml -p laravel-sample up --build -d
