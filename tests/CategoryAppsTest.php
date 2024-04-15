<?php


use Abaydullah\GooglePlayScraper\Scraper;
use PHPUnit\Framework\TestCase;

/**
 * @author MD Mim Abaydullah <abaydullah786@gmail.com>
 */
class CategoryAppsTest extends TestCase
{
    /** @test */
    function it_scrape_category_apps()
    {
        $category = (new Scraper())->getCategoryApps('COMMUNICATION');
        $this->assertCount('6', $category[0]);
    }
}