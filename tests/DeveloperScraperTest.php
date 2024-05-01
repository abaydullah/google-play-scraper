<?php


use Abaydullah\GooglePlayScraper\Scraper;
use PHPUnit\Framework\TestCase;

/**
 * @author MD Mim Abaydullah <abaydullah786@gmail.com>
 */
class DeveloperScraperTest extends TestCase
{
    /** @test */
    function it_scrape_developer()
    {
        $developer = (new Scraper())->getDeveloper('6720847872553662727');
       $this->assertEquals('Microsoft Corporation', $developer['name']);
    }
}