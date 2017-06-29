<?php

use backend\models\PoItemSearch;
use kartik\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="po-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Po', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showPageSummary' => true,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
            [
                'class' => 'kartik\grid\ExpandRowColumn',
                'detail' => function($model, $key, $index, $column) {
                    $searchModel = new PoItemSearch();
                    $searchModel->po_id = $model->id;
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                    return Yii::$app->controller->renderPartial('_poitems', [
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel,
                    ]);
                },
                'value' => function($model, $key, $index, $column) {
                    return GridView::ROW_COLLAPSED;
                },
                // 'expandOneOnly' => true,
            ],
            'id',
            'po_no',
            'description:ntext',
            [
                'attribute' => 'total',
                // 'format' => 'currency',
                'format' => 'decimal',
                'hAlign' => 'right',
                'pageSummary' => true,
            ],
            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>
</div>
