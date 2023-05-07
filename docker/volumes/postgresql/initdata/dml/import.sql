-- クライアントエンコーディンの文字列をUTF-8に変更しておく
set client_encoding to 'utf8';

-- インポート
 \COPY sample FROM '/initdata/dml/csv/sample.csv' WITH CSV DELIMITER ',' encoding 'UTF8';
 \COPY sample_element FROM '/initdata/dml/csv/sample_element.csv' WITH CSV DELIMITER ',' encoding 'UTF8';
