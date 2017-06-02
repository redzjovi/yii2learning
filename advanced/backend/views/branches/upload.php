<?php
use yii\helpers\Url;
?>

<?= \kato\DropZone::widget([
   'options' => [
       'maxFilesize' => '2',
       'url' => Url::toRoute('branches/upload'),
   ],
   'clientEvents' => [
       'complete' => "function(file){console.log(file)}",
       'removedfile' => "function(file){alert(file.name + ' is removed')}"
   ],
]); ?>