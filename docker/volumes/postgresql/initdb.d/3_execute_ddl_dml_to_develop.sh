#!/bin/bash
set -e

# DDLの実行
psql -v ON_ERROR_STOP=1 --username "$SUPERUSER_ROLE_NAME" --dbname "$STAGING_DB_NAME" -c "set search_path to $DEVELOP_SCHEMA_NAME;" -f /initdata/ddl/ddl.sql

# DMLの実行
psql -v ON_ERROR_STOP=1 --username "$SUPERUSER_ROLE_NAME" --dbname "$STAGING_DB_NAME" -c "set search_path to $DEVELOP_SCHEMA_NAME;" -f /initdata/dml/import.sql

# functionを生成
# psql -v ON_ERROR_STOP=1 --username "$SUPERUSER_ROLE_NAME" --dbname "$STAGING_DB_NAME" -c "set search_path to $DEVELOP_SCHEMA_NAME;" -f /initdata/function/function.sql

# ロールにテーブルへの権限を設定
psql -v ON_ERROR_STOP=1 --username "$SUPERUSER_ROLE_NAME" --dbname "$STAGING_DB_NAME" <<-EOSQL
  set search_path to "$DEVELOP_SCHEMA_NAME";

  -- developスキーマ用のユーザーを作成
  GRANT ALL ON ALL TABLES IN SCHEMA "$DEVELOP_SCHEMA_NAME" TO "$DEVELOP_SCHEMA_ROLE_NAME";
  REVOKE RULE, REFERENCES, TRIGGER ON ALL TABLES IN SCHEMA "$DEVELOP_SCHEMA_NAME" FROM "$DEVELOP_SCHEMA_ROLE_NAME";
  -- シーケンスがある場合
  -- GRANT USAGE, SELECT ON SEQUENCE seq_name TO "$DEVELOP_SCHEMA_ROLE_NAME";

EOSQL
