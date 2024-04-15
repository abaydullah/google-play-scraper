<?php

namespace Abaydullah\GooglePlayScraper\Models;

use Abaydullah\GooglePlayScraper\Client;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\DomCrawler\Crawler;

/**
 * @author MD Mim Abaydullah <abaydullah786@gmail.com>
 */
class DeveloperAppScraper
{
    use Client;

    public function scrapeAppsByDeveloperId($developerId)
    {
        try {
            $app_url = $this->rootUrl . '/store/apps/developer?id=' . $developerId;
            $response = $this->webClient->get($app_url);
            $content = $response->getBody()->getContents();
            $crawler = new Crawler($content);
            return $crawler->filter('div[role="listitem"]')->each(function (Crawler $node, $i) {
                $apps = [];

                $apps['app_url'] = $this->hasData($node->filter('div > div > div > a')) != false ?
                    $this->rootUrl . $node->filter('div > div > div > a')->attr('href') : '';
                $apps['app_id'] = explode('id=', $apps['app_url'])[1];

                $apps['title'] = $this->hasData($node->filter('div > div > div > a > div > div > div')) != false ?
                    $node->filter('div > div > div > a  > div > div > div')->text() : '';

                $apps['icon'] = $this->hasData($node->filter('div > div > div > a > div > img')) != false ?
                    str_replace(' 2x', '', $node->filter('div > div > div > a  > div > img')->attr('srcset')) : '';

                $apps['rating'] = $this->hasData($node->filter('span[class="w2kbF"]')) != false ?
                    str_replace('star', '', $node->filter('span[class="w2kbF"]')->text()) : '';
                return $apps;
            });
        } catch (GuzzleException $exception) {
            return $exception->getCode();
        }
    }

}