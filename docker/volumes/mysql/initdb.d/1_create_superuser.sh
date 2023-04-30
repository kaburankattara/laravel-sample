#!/bin/bash
set -e

mysql=( mysql --protocol=socket -uroot -p"${MYSQL_ROOT_PASSWORD}" )

"${mysql[@]}" <<-EOSQL

  -- スーパーユーザーを作成

  CREATE USER '${SUPERUSER_NAME}'@'%' IDENTIFIED BY '${SUPERUSER_PASSWORD}';
  GRANT ALL PRIVILEGES ON *.* TO '${SUPERUSER_NAME}'@'%' WITH GRANT OPTION;
  FLUSH PRIVILEGES;

EOSQL
