<?php
namespace Module\Sitemap;
use DOMDocument;

class SeoAnalyzer {

    const CURL_OPTIONS = [
        CURLOPT_RETURNTRANSFER  => true,
        CURLOPT_HEADER          => false, 
        CURLOPT_FOLLOWLOCATION  => true, 
        CURLOPT_MAXREDIRS       => 99999,
        CURLOPT_AUTOREFERER     => true,
        CURLOPT_CONNECTTIMEOUT  => 5000, 
        CURLOPT_TIMEOUT         => 200,
        CURLOPT_SSL_VERIFYPEER  => false
    ];

    public static function analyze($url, $t_url=[]) {
        set_time_limit(0);
        $c = curl_init($url);
        curl_setopt_array($c, self::CURL_OPTIONS);

        $html = curl_exec($c);

        if (curl_error($c)) die(curl_error($c));
        $status = curl_getinfo($c, CURLINFO_HTTP_CODE);
        $nbRedirect = curl_getinfo($c, CURLINFO_REDIRECT_COUNT );

        $doc = new DOMDocument();
        libxml_use_internal_errors(true);
        $doc->loadHTML($html);
        libxml_clear_errors();

        $links = $doc->getElementsByTagName('a');
        if($links->length > 0) {
            foreach ($links as $link) {
                $t_url[$link->getAttribute("href")] = $link->getAttribute("href");
                $t_res = SeoAnalyzer::analyze(URL_SITE.'/'.$link->getAttribute("href"), $t_url);
                // var_dump($t_res);
                if(!empty($t_res)) {
                    foreach ($t_res as $res) {
                        $t_url[$res] = $res;
                    }
                }
            }
        }      
        
        curl_close($c);
        return $t_url;
    }
}