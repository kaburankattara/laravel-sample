<?php

namespace App\Domains;

use App\Domains\Sample;

/**
 * サンプルリスト
 */
class Samples
{
    /**
     * 空のインスタンスを生成
     */
    public static function createEmptyInstance()
    {
        return new Samples(null);
    }
    
    /**
     * インスタンスを生成
     */
    public static function createInstance($sampleModelList)
    {
        return new Samples($sampleModelList);
    }

    /**
     * インスタンスを生成した時のタイムスタンプ
     */
    public $timeStamp;
    /**
     * サンプルリスト
     */
    public $sampleList;

    /**
     * コンストラクタ
     */
    function __construct($sampleModelList) {

        // タイムスタンプを設定
        $this->timeStamp = new \DateTime();

        // 引数が空なら処理しない
        if (count($sampleModelList) == 0) {
            $this->sampleList = array();
            return;
        }

        // サンプルデータをサンプルID別にリスト化
        $bundleResultList = array();
        $bundleList = array();
        foreach ($sampleModelList as $sampleModel) {
            // 初回ループ以外で、かつサンプルIDが変われば、
            // サンプルID別にまとめたリストからSampleを生成して結果リストに詰める。
            // 結果リストに詰めたら、リストを初期化する
            if (count($bundleList) != 0 
                && $bundleList[0]->sample_id != $sampleModel->sample_id) {
                $bundleResultList[] = Sample::createInstance($bundleList);
                $bundleList = array();
            }

            // サンプルID別にサンプルデータをまとめる
            $bundleList[] = $sampleModel;
        }
        // ループを抜けた後、リストに残ってるサンプルデータからSampleを生成
        $bundleResultList[] = Sample::createInstance($bundleList);

        // サンプルリストに纏めた結果を設定
        $this->sampleList = $bundleResultList;
    }
    
    /**
     * タイムスタンプから日時を取得
     */
    public function getDateTime()
    {
        return $this->timeStamp->format('Y-m-d H:i:s');
    }

    /**
     * 最初の要素を取得
     */
    public function getFirst()
    {
        if (self::isEmpty()) {
            return Sample::createEmptyInstance();
        }

        return $this->sampleList[0];
    }

    /**
     * 空か判定
     */
    public function isEmpty()
    {
        return count($this->sampleList) == 0;
    }
}
