<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
?>

<div class="po-item-index">
    <?php Pjax::begin([
        'enablePushState' => false
    ]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'po_item_no',
            'quantity',
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
