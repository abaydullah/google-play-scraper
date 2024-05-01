<?php

namespace Abaydullah\GooglePlayScraper;

use Abaydullah\GooglePlayScraper\Models\AppScraper;
use Abaydullah\GooglePlayScraper\Models\CategoryAppScraper;
use Abaydullah\GooglePlayScraper\Models\DeveloperAppScraper;
use Abaydullah\GooglePlayScraper\Models\DeveloperScraper;
use Abaydullah\GooglePlayScraper\Models\SearchAppScraper;

/**
 * @author MD Mim Abaydullah <abaydullah786@gmail.com>
 */
class Scraper
{
    use Client;

    public function getApp($appId, $lang = null, $country = null)
    {
        $lang = $lang === null ? $this->getDefaultLang() : $lang;
        $country = $country === null ? $this->getDefaultCountry() : $country;
        return (new AppScraper)->scrapeAppById($appId, $lang, $country);

    }

    public function getCategoryApps($category, $lang = null, $country = null)
    {
        $lang = $lang === null ? $this->getDefaultLang() : $lang;
        $country = $country === null ? $this->getDefaultCountry() : $country;
        $apps = (new CategoryAppScraper())->scrapeCategoryAppsByCategory($category, $lang, $country);
        foreach ($apps as $key => $item) {
            if ($item['app_url'] == '') {
                unset($apps[$key]);
            }
        }
        sort($apps);
        return $apps;
    }

    public function getDeveloper($developerId)
    {
        return (new DeveloperScraper())->scrapeDeveloper($developerId);
    }
    public function getDeveloperApps($developerId)
    {
        return (new DeveloperAppScraper())->scrapeAppsByDeveloperId($developerId);
    }

    public function getSearchApps($search)
    {
        return (new SearchAppScraper())->scrapeAppsBySearch($search);
    }
}