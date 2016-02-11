<?php

use yii\helpers\Html;
?>  

<div class="<?=$this->context->wrapperClass?>">

    <?php foreach ($data['entries'] as $entry):?>
        <h3><?=Html::a($entry['title'], $entry['link'])?></h3>
        <?=$entry['description']?>
    <?php endforeach;?>


    <div class="feed-provider">
        <?=Html::encode($data['title'])?>
    </div>

</div>

