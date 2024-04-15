<?php


use Abaydullah\GooglePlayScraper\Scraper;
use PHPUnit\Framework\TestCase;

/**
 * @author MD Mim Abaydullah <abaydullah786@gmail.com>
 */
class SearchAppsTest extends TestCase
{
    /** @test */
    function it_search_and_scrape_apps()
    {
        $search = Scraper::getSearchApps('video editor');

        $this->assertCount(5, $search[0]);
    }

}