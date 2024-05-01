<?php


use Abaydullah\GooglePlayScraper\Scraper;
use PHPUnit\Framework\TestCase;

/**
 * @author MD Mim Abaydullah <abaydullah786@gmail.com>
 */
class DeveloperAppsScraperTest extends TestCase
{
    /** @test */
    function it_scrape_developer_apps()
    {
        $developer = (new Scraper())->getDeveloperApps('WhatsApp+LLC');

        $this->assertCount('5', $developer[0]);
        $developer = (new Scraper())->getDeveloperApps('6720847872553662727');
        $this->assertCount('5', $developer[0]);
    }
}