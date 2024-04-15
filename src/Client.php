<?php

namespace Abaydullah\GooglePlayScraper;
/**
 * @author MD Mim Abaydullah <abaydullah786@gmail.com>
 */
trait Client
{
    private $rootUrl = 'https://play.google.com';
    public $locate = [
        'lang' => 'en',
        'country' => 'us'
    ];
    private $webClient;

    private function setLocate($lang = 'en', $country = 'us')
    {
        $this->locate['lang'] = $lang;
        $this->locate['country'] = $country;
    }

    public function __construct()
    {
        $this->webClient = new \GuzzleHttp\Client(
            array(
                'headers' => array('User-Agent' => mt_rand(1111111111, 9999999999))
            )
        );
    }

    private function hasData($nodeFilter)
    {
        if ($nodeFilter->count() > 0) {
            return $nodeFilter;
        }

        return false;
    }

    private function filterNumber($number)
    {
        return filter_var($number, FILTER_SANITIZE_NUMBER_INT);
    }
}