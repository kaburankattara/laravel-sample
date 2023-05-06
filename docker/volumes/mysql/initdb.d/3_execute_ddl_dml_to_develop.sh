#!/bin/bash
set -e

# DDLの実行
mysql -u ${DEVELOP_USER_NAME} -p${DEVELOP_USER_PASSWORD} ${DEVELOP_DATABASE_NAME} < /initdata/ddl/ddl.sql

# DMLの実行
mysql -u root -p${MYSQL_ROOT_PASSWORD} ${DEVELOP_DATABASE_NAME} < /initdata/dml/dml.sql

