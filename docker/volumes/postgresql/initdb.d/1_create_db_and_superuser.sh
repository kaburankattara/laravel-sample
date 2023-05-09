#!/bin/bash
set -e

psql -v ON_ERROR_STOP=1 --username "$POSTGRES_USER" <<-EOSQL

  -- データベース作成
  CREATE DATABASE "$STAGING_DB_NAME" WITH OWNER = "$POSTGRES_USER" ENCODING = 'UTF8' LC_COLLATE = 'C' LC_CTYPE = 'C' CONNECTION LIMIT = -1 TEMPLATE template0;

  GRANT ALL ON DATABASE "$STAGING_DB_NAME" TO "$POSTGRES_USER";
  GRANT TEMPORARY, CONNECT ON DATABASE "$STAGING_DB_NAME" TO PUBLIC;

  -- ロールを作成
  -- システム用スーパーユーザー
  -- 　1.スーパーユーザー、ロール作成権限を付与
  CREATE ROLE "$SUPERUSER_ROLE_NAME" WITH superuser LOGIN PASSWORD '$SUPERUSER_ROLE_PASSWORD';
  -- GRANT rds_superuser TO "$SUPERUSER_ROLE_NAME";
  ALTER ROLE "$SUPERUSER_ROLE_NAME" WITH CREATEROLE;
  -- 　2.データベースへの権限をシステム用スーパーユーザーロールに付与する
  GRANT ALL ON DATABASE "$STAGING_DB_NAME" TO "$SUPERUSER_ROLE_NAME";

EOSQL