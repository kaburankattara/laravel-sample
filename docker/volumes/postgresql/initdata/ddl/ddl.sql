-- サンプルテーブルの作成
CREATE TABLE sample (
  id SERIAL PRIMARY KEY,
  sample_no INTEGER NOT NULL,
  order_no INTEGER NOT NULL
);

-- サンプル要素テーブルの作成
CREATE TABLE sample_element (
  id SERIAL PRIMARY KEY,
  sample_no INTEGER NOT NULL,
  type INTEGER NOT NULL,
  status SMALLINT NOT NULL
);
