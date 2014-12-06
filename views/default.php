<?php

use yii\helpers\Html;

?>
<div class="feed-default">
    <div class="feed-provider">
        <?=Html::encode($data['title'])?>
    </div>
    
    
    <?php foreach($data['entries'] as $entry): ?>
    <h2><?=Html::a($entry['title'], $entry['link'])?></h2>
        <?=$entry['description']?>
    <?php endforeach; ?>
</div>

