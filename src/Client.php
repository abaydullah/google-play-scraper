<?php

namespace Abaydullah\GooglePlayScraper;
/**
 * @author MD Mim Abaydullah <abaydullah786@gmail.com>
 */
trait Client
{
    private $rootUrl = 'https://play.google.com';
    private $webClient;
    protected string $lang = 'en';
    protected string $country = 'us';

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
        return str_replace(',', '', strtok($number, ' '));
    }

    public function setDefaultLang($lang)
    {
        $this->lang = $lang;
    }

    public function getDefaultLang()
    {
        return $this->lang;
    }

    public function setDefaultCountry($country)
    {
        $this->country = $country;
    }

    public function getDefaultCountry()
    {
        return $this->country;
    }
}