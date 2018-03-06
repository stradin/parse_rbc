<?php

class MyHelper{

    public function ParseRBC(){
        $html = '';
        $i = 0;
        $parse_url = 'http://static.feed.rbc.ru/rbc/logical/footer/news.rss';

        $context = stream_context_create(array('http' => array('timeout' => 6400)));

        if ($parse_url){
            $results_page = file_get_contents($parse_url, false, $context);
        } else {
            return 'Error: Get context';
        }

        $xmlObject = new SimpleXMLElement($results_page);
        $xmlObject = $xmlObject->channel;
        $html = "\r\n Link:".$xmlObject->link;
        $html = "\r\n PubDate:".$xmlObject->pubDate;

        foreach ($xmlObject->item as $key=>$item){
            if ($i == 10) {
                break;
            }

            $html .= "\r\n--------------------------------------------------- \r\n";
            $html .= "\r\n Title:".$item->title;
            $html .= "\r\n Link:".$item->link;
            $i++;
        }
        return $html;



    }

}