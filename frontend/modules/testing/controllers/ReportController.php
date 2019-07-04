<?php

namespace frontend\modules\testing\controllers;

use common\helpers\PhoneNumber;
use common\helpers\PHPReports;
use common\models\Article;
use common\models\property\Project;
use yii\db\Query;
use yii\web\Controller;
use Yii;
use kartik\report\Report;

/**
 * Report controller for the `testing` module
 */
class ReportController extends Controller
{
    public function actionIndex()
    {
        $report = Yii::$app->report;

// set your template identifier (override global defaults)
        $report->templateId = 1119;

// If you want to override the output file name, uncomment line below
// $report->outputFileName = 'My_Generated_Report.pdf';

// If you want to override the output file type, uncomment line below
// $report->outputFileType = Report::OUTPUT_DOCX;

// If you want to override the output file action, uncomment line below
        // $report->outputFileAction = Report::ACTION_GET_DOWNLOAD_URL;
        //   $report->outputAction = Report::ACTION_GET_DOWNLOAD_URL;

// Configure your report data. Each of the keys must match the template
// variables set in your MS Word template and each value will be the
// evaluated to replace the Word template variable. If the value is an
// array, it will treated as tabular data.
        $report->templateVariables = [
            'client_name' => 'Socbay Ads',
            'client_title' => 'Rao vặt số 1 Socbay',
            'company' => 'Real Estate',

        ];

// lastly generate the report
        $a = $report->generateReport();
        dd($a);

        return $this->render('index');
    }

    public function actionJssor()
    {
        return $this->render('jssor');
    }

    public function actionView()
    {
        $pr = new PHPReports('nzmiaxpjkzjj7hdpns2isn35');
        $pr->setTemplateId(1118);
        $pr->setOutputFileType(PHPReports::OUTPUT_PDF);
        $pr->setOutputAction(PHPReports::ACTION_GET_DOWNLOAD_URL);
        $pr->setOutputFileName('My_Generated_Report.pdf');
        $pr->setTemplateVariables(
            array(
                'company' => 'Armut Inc.',
                'client_name' => 'Armut Inc.',
                'email_address' => 'murat.cileli@gmail.com',
                'products' => array('Computer', 'Smart Phone', 'Book')
            ));

        $pr->generateReport();
        dd($pr);
    }
}
