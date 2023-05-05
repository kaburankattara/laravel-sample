-- サンプルテーブルの作成
CREATE TABLE sample (
  id INT(11) NOT NULL AUTO_INCREMENT,
  sample_no INT(11) NOT NULL,
  order_no INT(11) NOT NULL,
  PRIMARY KEY (id)
);

-- サンプル要素テーブルの作成
CREATE TABLE sample_element (
  id INT(11) NOT NULL AUTO_INCREMENT,
  sample_no INT(11) NOT NULL,
  type INT(1) NOT NULL,
  status TINYINT(1) NOT NULL,
  PRIMARY KEY (id)
);
