<?php

namespace Abaydullah\GooglePlayScraper;

use Abaydullah\GooglePlayScraper\Models\AppScraper;
use Abaydullah\GooglePlayScraper\Models\CategoryAppScraper;
use Abaydullah\GooglePlayScraper\Models\DeveloperAppScraper;
use Abaydullah\GooglePlayScraper\Models\SearchAppScraper;

/**
 * @author MD Mim Abaydullah <abaydullah786@gmail.com>
 */
class Scraper
{
    public static function getApp($appId)
    {
        return (new AppScraper)->scrapeAppById($appId);

    }

    public static function getCategoryApps($category)
    {
        $apps = (new CategoryAppScraper())->scrapeCategoryAppsByCategory($category);
        foreach ($apps as $key => $item) {

            if ($item['app_url'] == '') {
                unset($apps[$key]);
            }
        }
        sort($apps);
        return $apps;
    }

    public static function getDeveloperApps($developerId)
    {
        return (new DeveloperAppScraper())->scrapeAppsByDeveloperId($developerId);
    }

    public static function getSearchApps($search)
    {
        return (new SearchAppScraper())->scrapeAppsBySearch($search);
    }
}