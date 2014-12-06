<?php
/**
 * @copyright Copyright &copy; Klaus Mergen, 2014
 * @package yii2-widgets
 * @version 1.1.0
 */

namespace kmergen\feed;

use yii\helpers\Html;
use Zend\Feed\Reader\Reader;

/**
 * Feedreader widget provides an RSS and Atom Reader.
 *
 * @author Klaus Mergen <klaus.mergen@web.de>
 * @since 1.0
 */
class Feedreader extends \yii\base\Widget
{
    
    /**
     * @var string the feed Url.
     */
    public $feedUrl;
    
    /**
     * @var string the template file. This is the view that is rendered by the widget to show the feeds.
     */
    public $templateFile = 'default';
        
    public function init()
    {
        //At the moment we can only use http protocol
        $this->feedUrl = str_replace('https', 'http', $this->feedUrl);
    }

    public function run()
    {
        $feed = Reader::import($this->feedUrl);

        $data = array(
            'title' => $feed->getTitle(),
            'link' => $feed->getLink(),
            'dateModified' => $feed->getDateModified(),
            'description' => $feed->getDescription(),
            'language' => $feed->getLanguage(),
            'entries' => array(),
        );

        foreach ($feed as $entry) {
            $edata = array(
                'title' => $entry->getTitle(),
                'description' => $entry->getDescription(),
                'dateModified' => $entry->getDateModified(),
                'authors' => $entry->getAuthors(),
                'link' => $entry->getLink(),
                'content' => $entry->getContent(),
            );
            $data['entries'][] = $edata;
        }
        
        echo $this->render('default', ['data' => $data]);
    
        // $this->registerClientScript();
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
