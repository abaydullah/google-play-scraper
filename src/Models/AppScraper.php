<?php

namespace Abaydullah\GooglePlayScraper\Models;

use Abaydullah\GooglePlayScraper\Client;
use Abaydullah\GooglePlayScraper\Categories;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\DomCrawler\Crawler;

/**
 * @author MD Mim Abaydullah <abaydullah786@gmail.com>
 */
class AppScraper
{
    use Client;

    public function scrapeAppById($appId, $lang, $country)
    {
        try {
            $appData = [];
            $app_url = $this->rootUrl . '/store/apps/details?id=' . $appId . '&hl=' . $lang . '&gl=' . $country;
            $response = $this->webClient->get($app_url);
            $content = $response->getBody()->getContents();
            $crawler = new Crawler($content);
            $appData['url'] = $app_url;
            $appData['app_id'] = $appId;

            $appData['title'] = $this->hasData($crawler->filter('h1[itemprop="name"]')) != false ?
                $crawler->filter('h1[itemprop="name"]')->text() : '';
            $appData['icon'] = $this->hasData($crawler->filter('img[itemprop="image"]')) != false ?
                $crawler->filter('img[itemprop="image"]')->attr('src') : '';
            $appData['icon_original'] = explode('=', $appData['icon'])[0];
            $appData['cover_image'] = $this->hasData($crawler->filter('img[class="oiEt0d"]')) != false ?
                $crawler->filter('img[class="oiEt0d"]')->attr('src') : '';
            $appData['developer_name'] = $this->hasData($crawler->filter('div[class="Vbfug auoIOc"] > a > span')) != false ?
                $crawler->filter('div[class="Vbfug auoIOc"] > a > span')->text() : '';
            $appData['developer_url'] = $this->hasData($crawler->filter('div[class="Vbfug auoIOc"] > a')) != false ?
                $this->rootUrl . $crawler->filter('div[class="Vbfug auoIOc"] > a')->attr('href') : '';
            $appData['rating'] = $this->hasData($crawler->filter('div[class="jILTFe"]')) != false ?
                $crawler->filter('div[class="jILTFe"]')->text() : '';

            foreach ($crawler->filter('div[class="JzwBgb"]')->each(fn(Crawler $node) => $this->filterNumber($node->filter('div[class="JzwBgb"]')->attr('aria-label'))) as $key => $histogram) {
                $appData['histograms'][5 - $key] = $histogram;
            }

            $appData['review'] = $this->hasData($crawler->filter('div[class="EHUI5b"]')) != false ?
                explode(' ', $crawler->filter('div[class="EHUI5b"]')->text())[0] : '';
            $appData['downloads'] = $this->hasData($crawler->filter('div[class="ClM7O"]')->eq(1)) != false ?
                $crawler->filter('div[class="ClM7O"]')->eq(1)->text() : '';
            $appData['paid'] = $this->hasData($crawler->filter('meta[itemprop="price"]')) != false ?
                ($crawler->filter('meta[itemprop="price"]')->attr('content') > 0 ? true : false) : '';
            $appData['updated'] = $this->hasData($crawler->filter('div[class="xg1aie"]')) != false ?
                $crawler->filter('div[class="xg1aie"]')->text() : '';

            $appData['category_name'] = $this->hasData($crawler->filter('a[class="WpHeLc VfPpkd-mRLv6 VfPpkd-RLmnJb"]')) != false ?
                $crawler->filter('a[class="WpHeLc VfPpkd-mRLv6 VfPpkd-RLmnJb"]')->attr('aria-label') : '';

            $appData['category_url'] = $this->hasData($crawler->filter('a[class="WpHeLc VfPpkd-mRLv6 VfPpkd-RLmnJb"]')) != false ?
                $this->rootUrl . $crawler->filter('a[class="WpHeLc VfPpkd-mRLv6 VfPpkd-RLmnJb"]')->attr('href') : '';
            $appData['category_slug'] = explode('category/', $appData['category_url'])[1];
            $appData['trailer'] = $this->hasData($crawler->filter('div[class="kuvzJc atwQXd"] > button')) != false ?
                $crawler->filter('div[class="kuvzJc atwQXd"] > button')->attr('data-trailer-url') : '';
            $appData['type'] = Categories::type($appData['category_slug']);
            $appData['screenshots'] = $crawler->filter('div[class="ULeU3b Utde2e"]')->each(function (Crawler $node, $i) {
                return str_replace(" 2x", "", $node->filter('img')->attr('srcset'));;
            });

            $appData['whats_new'] = $this->hasData($crawler->filter('div[itemprop="description"]')) != false ?
                $crawler->filter('div[itemprop="description"]')->text() : '';

            $appData['meta_description'] = $this->hasData($crawler->filter('meta[itemprop="description"]')) != false ?
                $crawler->filter('meta[itemprop="description"]')->attr('content') : '';
            $appData['description'] = $this->hasData($crawler->filter('div[class="bARER"]')) != false ?
                $crawler->filter('div[class="bARER"]')->html() : '';

            return $appData;
        } catch (GuzzleException $exception) {
            return $exception->getCode();
        }

    }

}