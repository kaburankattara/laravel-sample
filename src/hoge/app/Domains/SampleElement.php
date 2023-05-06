<?php

namespace App\Domains;

/**
 * サンプル要素
 */
class SampleElement
{
    /**
     * 空のインスタンスを生成
     */
    public static function createEmptyInstance()
    {
        return new SampleElement(null);
    }
    
    /**
     * インスタンスを生成
     */
    public static function createInstance($sampleModel)
    {
        return new SampleElement($sampleModel);
    }
    
    /**
     * サンプル要素ID
     */
    public $id;
    /**
     * タイプ
     */
    public $type;
    /**
     * ステータス
     */
    public $status;

    /**
     * コンストラクタ
     */
    function __construct($sampleModel) {
        $this->id = $sampleModel->sample_element_id;
        $this->type = $sampleModel->type;
        $this->status = $sampleModel->status;
    }

    /**
     * ステータスが完了か判定
     */
    public function isFin()
    {
        return $this->status == 1;
    }

    /**
     * タイプの名称を取得
     */
    public function getTypeName()
    {
        if ($this->type == 1) {
            return "種類1";
        }

        if ($this->type == 2) {
            return "種類2";
        }

        if ($this->type == 3) {
            return "種類3";
        }

        return "不明";
    }

    /**
     * ステータス名を取得
     */
    public function getStatusName()
    {
        return self::isFin() ? "済" : "";
    }
}
