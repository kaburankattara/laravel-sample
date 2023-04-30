#!/bin/bash
set -e

# DDLの実行
mysql -u ${DEVELOP_USER_NAME} -p${DEVELOP_USER_PASSWORD} ${DEVELOP_DATABASE_NAME} < /initdata/ddl/ddl.sql
