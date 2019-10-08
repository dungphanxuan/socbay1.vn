<?php

namespace backend\modules\chart\controllers;

use backend\controllers\BackendController;
use Yii;
use yii\db\ActiveRecord;

/**
 * Stat controller for the `chart` module
 */
class StatController extends BackendController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex($type = 'Article', $nm = 'common\models', $id = null, $field = 'created_at', $time_type = 1)
    {
        $dateRange = Yii::$app->request->get('date_range', date('Y-m-d', strtotime('-7 day')) . '-' . date('Y-m-d'));
        $fromDate = strtotime(substr($dateRange, 0, 10));
        $toDate = strtotime(substr($dateRange, 11));
        $arrLabel = [];
        $dataDate = [];

        while ($fromDate <= $toDate) {

            $modelClass = $nm . '\\' . $type;

            $timeData = $this->getDateRange($fromDate, $time_type);

            /** @var ActiveRecord $modelClass */
            $modelInday = $modelClass::find()
                ->andWhere(['between', $field, $timeData['start'], $timeData['end']]);
            if ($id) {
                $modelInday->andWhere(['id' => $id]);
            }

            $totalInDay = $modelInday->count();
            $arrLabel[] = getFormat()->asDate($fromDate);
            $dataDate[] = $totalInDay;
            //Increment 1 day
            $fromDate = strtotime("+1 day", $fromDate);
        }
        $arrDataset[] = [
            'label' => 'Vote Stat',
            'backgroundColor' => "rgba(255,99,132,0.2)",
            'borderColor' => "rgba(255,99,132,1)",
            'pointBackgroundColor' => "rgba(255,99,132,1)",
            'fill' => false,
            'data' => $dataDate,
        ];

        return $this->render('index', [
            'dateRange' => $dateRange,
            'arrLabel' => $arrLabel,
            'arrDataset' => $arrDataset,
            'type' => $type,
            'id' => $id,
            'field' => $field,
            'time_type' => $time_type,
        ]);
    }

    protected function getDateRange($time, $type)
    {
        $beginStr = '';
        $endStr = '';

        if ($type == 1) {
            $beginStr = $beginOfDay = strtotime("midnight", $time);
            $endStr = strtotime("tomorrow", $beginOfDay) - 1;
        } else {
            $dtNow = new \DateTime();
            $dtNow->setTimezone(new \DateTimeZone(\Yii::$app->getTimeZone()));
            $dtNow->setTimestamp($time);

            $beginOfDay = clone $dtNow;

            $beginOfDay->modify('today');

            $endOfDay = clone $beginOfDay;
            $endOfDay->modify('tomorrow');
            $endOfDay->modify('1 second ago');

            $beginStr = $beginOfDay->format('Y-m-d H:i:s e');
            $endStr = $endOfDay->format('Y-m-d H:i:s e');
        }

        return ['start' => $beginStr, 'end' => $endStr];


    }
}
