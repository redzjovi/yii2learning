<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BranchesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Branches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branches-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php // Html::a('Create Branches', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::button('Create Branches', [
            'class' => 'btn btn-success',
            'id' => 'modalButton',
            'value' => Url::to('index.php?r=branches/create'),
        ]); ?>
    </p>

    <?php Modal::begin([
        'header' => '<h4>Branches</h4>',
        'id' => 'modal',
        'size' => 'modal-lg',
    ]);
    echo '<div id="modalContent"></div>';
    Modal::end(); ?>

    <?php $gridColumns = [
        'branch_name',
        'branch_address',
        'branch_created_date',
        'branch_status',
    ];
    echo ExportMenu::widget([
        'columns' => $gridColumns,
        'dataProvider' => $dataProvider,
    ]);
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'responsiveWrap' => true,
        'rowOptions' => function ($model) {
            if ($model->branch_status == 'active') {
                return ['class' => 'success'];
            } else if ($model->branch_status == 'inactive') {
                return ['class' => 'danger'];
            }
        },
        'pjax' => true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'companies_company_id',
                'value' => 'companiesCompany.company_name',
            ],
            [
                'attribute' => 'branch_name',
                'class' => 'kartik\grid\EditableColumn',
            ],
            'branch_name',
            'branch_address',
            'branch_created_date',
            // 'branch_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
