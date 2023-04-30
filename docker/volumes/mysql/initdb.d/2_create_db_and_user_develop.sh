#!/bin/bash
set -e

mysql=( mysql --protocol=socket -uroot -p"${MYSQL_ROOT_PASSWORD}" )

"${mysql[@]}" <<-EOSQL

  -- データベースを作成
  CREATE DATABASE ${DEVELOP_DATABASE_NAME};
  ALTER DATABASE ${DEVELOP_DATABASE_NAME} CHARACTER SET utf8 COLLATE utf8_general_ci;

  -- データベース専用のユーザーを作成
  CREATE USER '${DEVELOP_USER_NAME}'@'%' IDENTIFIED BY '${DEVELOP_USER_PASSWORD}';
  GRANT ALL PRIVILEGES ON ${DEVELOP_DATABASE_NAME}.* TO '${DEVELOP_USER_NAME}'@'%';
  -- 変更を反映するために、FLUSH PRIVILEGESコマンドを実行
  FLUSH PRIVILEGES;

EOSQL
