<?php

namespace Abaydullah\GooglePlayScraper\Models;

use Abaydullah\GooglePlayScraper\Client;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\DomCrawler\Crawler;

/**
 * @author MD Mim Abaydullah <abaydullah786@gmail.com>
 */
class DeveloperScraper
{
    use Client;

    public function scrapeDeveloper($developerId)
    {
        try {
            $app_url = $this->rootUrl . '/store/apps/dev?id=' . $developerId;
            $response = $this->webClient->get($app_url);
            $content = $response->getBody()->getContents();
            $crawler = new Crawler($content);
            $developer = [];
            $developer['cover'] = $this->hasData($crawler->filter('div[class="kFwPee"] > div > img')) !== false ?
                $crawler->filter('div[class="kFwPee"] > div > img ')->attr('src') : '';

            $developer['icon'] = $this->hasData($crawler->filter('div[class="kFwPee"] > div > div > div > div > img')) !== false ?
                $crawler->filter('div[class="kFwPee"] > div > div > div > div > img')->attr('src') : '';

            $developer['name'] = $this->hasData($crawler->filter('div[class="kFwPee"] > div > div > div > div > div > h1 > div ')) !== false ?
                $crawler->filter('div[class="kFwPee"] > div > div > div > div > div > h1 > div ')->text() : '';

            $developer['des'] = $this->hasData($crawler->filter('div[class="ik0Upe"]')) !== false ?
                $crawler->filter('div[class="ik0Upe"]')->text() : '';
            return $developer;

        } catch (GuzzleException $exception) {
            return $exception->getCode();
        }
    }

}