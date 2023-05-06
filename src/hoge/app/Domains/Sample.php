<?php

namespace App\Domains;

use App\Domains\SampleElement;

/**
 * サンプル
 */
class Sample
{
    /**
     * 空のインスタンスを生成
     */
    public static function createEmptyInstance()
    {
        return new Sample(null);
    }
    
    /**
     * インスタンスを生成
     */
    public static function createInstance($sampleModelList)
    {
        return new Sample($sampleModelList);
    }
    
    /**
     * サンプルID
     */
    public $id;
    /**
     * サンプル番号
     */
    public $sampleNo;
    /**
     * サンプル要素リスト
     */
    public $sampleElementList;

    /**
     * コンストラクタ
     */
    private function __construct($sampleModelList) {

        // 引数が空なら処理しない
        if ($sampleModelList == null) {
            $this->sampleElementList = array();
            return;
        }

        // サンプルID、サンプル番号を設定
        $this->id = $sampleModelList[0]->sample_id;
        $this->sampleNo = $sampleModelList[0]->sample_no;

        // サンプル要素データをリスト化し、設定
        $sampleElementList = array();
        foreach ($sampleModelList as $sampleModel) {
            $sampleElementList[] = SampleElement::createInstance($sampleModel);
        }
        $this->sampleElementList = $sampleElementList;
    }

    /**
     * ステータスを取得
     */
    public function getStatus()
    {
        // サンプル要素リストの要素数を取得し、分母とする
        $bumbo = count($this->sampleElementList);

        // サンプル要素リスト内の完了ステータスの要素数を分子とする
        $bunshi = 0;
        foreach ($this->sampleElementList as $sampleElement) {
            if ($sampleElement->isFin()) {
                $bunshi++;
            }
        }

        // 「分子/分母」形式で返す
        return $bunshi."/".$bumbo;
    }
}
