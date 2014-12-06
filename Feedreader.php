<?php

/**
 * @copyright Copyright &copy; Klaus Mergen, 2014
 * @package yii2-widgets
 * @version 1.1.0
 */

namespace kmergen\feadreader;

use yii\helpers\Html;



/**
 * Feedreader provides an RSS and Atom Reader.
 *
 * @author Klaus Mergen <klaus.mergen@web.de>
 * @since 1.0
 */

class Feedreader extends yii\widgets\Widget
{
    
      
    public function init()
    {
     
    }

    public function run()
    {

        $this->registerClientScript();
    }

    /**
     * Register CSS and Script.
     */
    protected function registerClientScript()
    {
        //Now we create the js for the counter
        $js = <<<JS
               
JS;
       
        $this->view->registerJs($js);
    }

}
