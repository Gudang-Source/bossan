<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use xj\bootbox\BootboxAsset;
use yii\bootstrap\Modal;
use yii\web\Controller;
?>
<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?php 
    echo GridView::widget([
        'dataProvider' => $data,
        //'filterModel' => $searchModel,
        // 'export' => true, 
        'responsive'=>true,
        'hover'=>true,     
        'resizableColumns'=>false,
        'panel'=>['type'=>'primary', 'heading'=> $heading],
        'responsiveWrap' => false,        
        'toolbar' => [
            '{toggleData}',
            '{export}',
            [
                'content' =>    Html::a('<i class="glyphicon glyphicon-print"></i> Cetak', ['cetak', 'Laporan' => [
                                    'Kd_Laporan' => $getparam['Laporan']['Kd_Laporan'], 
                                    'Kd_Sumber' => $getparam['Laporan']['Kd_Sumber'],
                                    'Tgl_1' => $getparam['Laporan']['Tgl_1'],
                                    'Tgl_2' => $getparam['Laporan']['Tgl_2'],
                                    'Tgl_Laporan' => $getparam['Laporan']['Tgl_Laporan'],
                                    'perubahan_id' => $getparam['Laporan']['perubahan_id']
                                ] ], [
                                    'class' => 'btn btn btn-default pull-right',
                                    'onClick' => "return !window.open(this.href, 'SPH', 'width=1024,height=600,scrollbars=1')"
                                        ]) 
            ],
        ],       
        'pager' => [
            'firstPageLabel' => 'Awal',
            'lastPageLabel'  => 'Akhir'
        ],
        'pjax'=>true,
        'pjaxSettings'=>[
            'options' => ['id' => 'laporan1-pjax', 'timeout' => 5000],
        ],
        'showPageSummary'=>true,         
        'columns' => [
            [
                'label' => 'Kode',
                'width'=>'3%',
                'value' =>function($model){
                    return $model['komponen_id'];
                },
                // 'group'=>true,  // enable grouping,
                // 'groupedRow'=>true,                    // move grouped column to a single grouped row
                // 'groupOddCssClass'=>'kv-grouped-row',  // configure odd group cell css class
                // 'groupEvenCssClass'=>'kv-grouped-row', // configure even group cell css class
            ],            
            [
                'label' => 'Komponen',
                'width'=>'20%',
                'value' =>function($model){
                    return $model['komponen'];
                },
                // 'group'=>true,  // enable grouping,
                // 'groupedRow'=>true,                    // move grouped column to a single grouped row
                // 'groupOddCssClass'=>'kv-grouped-row',  // configure odd group cell css class
                // 'groupEvenCssClass'=>'kv-grouped-row', // configure even group cell css class
            ],
            [
                'attribute'=>'anggaran',
                'width'=>'5%',
                'noWrap' => true,
                'hAlign'=>'right',
                'format'=>['decimal', 0],
                'pageSummary'=>true
            ],
        ],
    ]); 
?>
