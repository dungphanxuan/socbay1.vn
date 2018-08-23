<?php

namespace backend\modules\chart\controllers;

use backend\controllers\BackendController;
use common\models\WebLog;

/**
 * WebLogController implements the CRUD actions for WebLog model.
 */
class StatisticController extends BackendController
{

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;

        return parent::beforeAction($action);
    }


    /*
     * Log request
     * */
    public function actionRequest($type = 1)
    {
        $tmpFromDate = $fromDate = (isset($_POST['date_start'])) ? (int)($_POST['date_start']) : strtotime('-6 day');
        $toDate = (isset($_POST['date_end'])) ? (int)($_POST['date_end']) : time();

        $i = 0;
        $niu = [];
        $total = 0;

        while ($tmpFromDate <= $toDate) {
            $tsStartOfDay = strtotime("midnight", $tmpFromDate);
            $cacheKey = [
                'weblog' . $type,
                $tsStartOfDay
            ];

            $totalInDay = 0;
            if (date('Ymd') == date('Ymd', $tsStartOfDay)) {
                $totalInDay = WebLog::find()
                    ->andWhere(['type' => $type])
                    ->andWhere(
                        ['between', 'time', $tsStartOfDay, $tsStartOfDay + 3600 * 24])
                    ->count();
            } else {
                /*Load data from cache*/
                $totalInDay = dataCache()->get($cacheKey);
                if ($totalInDay === false) {
                    $totalInDay = WebLog::find()
                        ->andWhere(['type' => $type])
                        ->andWhere(
                            ['between', 'time', $tsStartOfDay, $tsStartOfDay + 3600 * 24])
                        ->count();
                    /*Set cache in 30 day*/
                    if ((int)$totalInDay > 0) {
                        dataCache()->set($cacheKey, $totalInDay, 60 * 60 * 24 * 30);
                    }
                }
            }

            $niu[$i] = (int)$totalInDay;
            $total += $niu[$i];
            $arrDay[] = date('Y-m-d', $tmpFromDate);
            $i++;
            $tmpFromDate = strtotime("+1 day", $tmpFromDate);
        }
        $series[] = array('name' => 'Lượt truy cập', 'data' => $niu);

        return $this->render("log", compact(
            "series",
            "fromDate",
            "toDate",
            "arrDay",
            "total"
        ));
    }

}
