<?php

namespace backend\modules\report\controllers;

use kartik\mpdf\Pdf;
use yii\filters\VerbFilter;

class PreviewController extends \yii\web\Controller
{

    public function behaviors()
    {
        return \yii\helpers\ArrayHelper::merge(parent::behaviors(), [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ]);
    }

    public function actionIndex()
    {
        $this->layout = '@backend/views/layouts/preview';
        return $this->render('index');
    }

    public function actionTemplate()
    {
        $this->layout = '@backend/views/layouts/preview';
        return $this->render('template');
    }

    public function actionIndex1()
    {
        $this->layout = '@backend/views/layouts/preview';
        return $this->render('index_1');
    }

    public function actionInvoice21()
    {
        $this->layout = '@backend/views/layouts/preview';
        return $this->render('invoice/invoice21');
    }

    public function actionReport()
    {
        // get your HTML raw content without any layouts or scripts
        // get your HTML raw content without any layouts or scripts
        //$content = $this->renderPartial('invoice/invoice21');
        $content = $this->renderPartial('invoice_21');

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            //'mode' => Pdf::MODE_ASIAN,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            // 'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            //'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            //'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/style.css',
            //'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/invoice21.css',
            'cssFile' => '@backend/web/@backend/views/layouts/preview/css/invoice21.css',
            //'cssFile' => '@backend/web/@backend/views/layouts/preview/invoice/invoice21.css',
            // any css to be embedded if required
            // 'cssInline' => '.kv-heading-1{font-size:18px}',
            // set mPDF properties on the fly
            'options' => ['title' => 'Krajee Report Title'],
            // call mPDF methods on the fly
            'methods' => [
                'SetHeader' => ['Report Header'],
                'SetFooter' => ['{PAGENO}'],
            ]
        ]);

        // return the pdf output as per the destination setting
        return $pdf->render();
    }

    public function actionReport1()
    {
        // get your HTML raw content without any layouts or scripts
        // get your HTML raw content without any layouts or scripts
        //$content = $this->renderPartial('invoice/invoice21');
        $content = $this->renderPartial('invoice/invoice21');

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            //'mode' => Pdf::MODE_ASIAN,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            // 'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            //'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            //'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/style.css',
            //'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/invoice21.css',
            //'cssFile' => '@backend/web/@backend/views/layouts/preview/css/invoice21.css',
            'cssFile' => '@backend/web/@backend/views/layouts/preview/invoice/invoice21.css',
            // any css to be embedded if required
            // 'cssInline' => '.kv-heading-1{font-size:18px}',
            // set mPDF properties on the fly
            'options' => ['title' => 'Krajee Report Title'],
            // call mPDF methods on the fly
            'methods' => [
                'SetHeader' => ['Report Header'],
                'SetFooter' => ['{PAGENO}'],
            ]
        ]);

        // return the pdf output as per the destination setting
        return $pdf->render();
    }

    public function actionPdf()
    {
        $mpdf = new Pdf();
        $mpdf->content = 'SSS';
        $mpdf->Output('MyPDF.pdf', 'D');
        exit;
    }

    public function actionCreate()
    {
        return $this->render('create');
    }

    public function actionDelete()
    {
        return $this->render('delete');
    }


    public function actionUpdate()
    {
        return $this->render('update');
    }

    public function actionView()
    {
        return $this->render('view');
    }

    public function actionTicket()
    {
        $this->layout = '@backend/views/layouts/preview';
        return $this->render('gara/ticket');
    }

    public function actionTicket1()
    {
        $this->layout = '@backend/views/layouts/preview';
        return $this->render('gara/ticket1');
    }

    public function actionTicket2()
    {
        $this->layout = '@backend/views/layouts/preview';
        return $this->render('gara/ticket2');
    }

    public function actionTicket3()
    {
        $this->layout = '@backend/views/layouts/preview';
        return $this->render('gara/ticket3');
    }

    public function actionTicket4()
    {
        $this->layout = '@backend/views/layouts/preview';
        return $this->render('gara/ticket4');
    }

    public function actionTicket5()
    {
        $this->layout = '@backend/views/layouts/preview';
        return $this->render('gara/ticket5');
    }

    public function actionTicket6()
    {
        $this->layout = '@backend/views/layouts/preview';
        return $this->render('gara/ticket6');
    }

    public function actionTicket7()
    {
        $this->layout = '@backend/views/layouts/preview';
        return $this->render('gara/ticket7');
    }

    public function actionTicket8()
    {
        $this->layout = '@backend/views/layouts/preview';
        return $this->render('gara/ticket8');
    }

    public function actionTicket9()
    {
        $this->layout = '@backend/views/layouts/preview';
        return $this->render('gara/ticket9');
    }

    public function actionForm()
    {
        return $this->render('form/company');
    }

    /*
     * Xem trước báo giá
     * */
    public function actionInvoice()
    {
        $this->layout = '@backend/views/layouts/preview';
        return $this->render('gara/invoice');
    }

    public function actionRepair()
    {
        $this->layout = '@backend/views/layouts/preview';
        return $this->render('gara/repair');
    }

}
