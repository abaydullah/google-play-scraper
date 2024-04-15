<?php

use Abaydullah\GooglePlayScraper\Scraper;
use PHPUnit\Framework\TestCase;

/**
 * @author MD Mim Abaydullah <abaydullah786@gmail.com>
 */
class ScraperTest extends TestCase
{
    protected string $appId = 'com.facebook.lite';

    /** @test */
    function it_scrape_a_single_app_title()
    {
        $app = Scraper::getApp($this->appId);
        self::assertStringContainsString('Facebook Lite', $app['title']);
    }

    /** @test */
    function it_scrape_a_single_app_icon()
    {
        $app = Scraper::getApp($this->appId);
        $this->assertNotEmpty($app['icon']);
        $this->assertNotEmpty($app['icon_original']);
    }

    /** @test */
    function it_scrape_a_single_app_developer()
    {
        $app = Scraper::getApp($this->appId);
        $this->assertNotEmpty($app['developer_name']);
        $this->assertNotEmpty($app['developer_url']);
    }

    /** @test */
    function it_scrape_a_single_app_rating_and_review()
    {
        $app = Scraper::getApp($this->appId);
        $this->assertNotEmpty($app['rating']);
        $this->assertNotEmpty($app['review']);
    }

    /** @test */
    function it_scrape_a_single_app_histograms()
    {
        $app = Scraper::getApp($this->appId);
        $this->assertCount(5, $app['histograms']);
    }

    /** @test */
    function it_scrape_a_single_app_downloads()
    {
        $app = Scraper::getApp($this->appId);
        $this->assertNotEmpty($app['downloads']);
    }

    /** @test */
    function it_scrape_a_single_app_paid()
    {
        $app = Scraper::getApp($this->appId);
        $this->assertIsBool($app['paid']);
    }

    /** @test */
    function it_scrape_a_single_app_updated()
    {
        $app = Scraper::getApp($this->appId);
        $this->assertNotEmpty($app['updated']);
    }

    /** @test */
    function it_scrape_a_single_app_category()
    {
        $app = Scraper::getApp($this->appId);
        $this->assertNotEmpty($app['category_name']);
        $this->assertNotEmpty($app['category_url']);
        $this->assertNotEmpty($app['category_slug']);
    }

    /** @test */
    function it_scrape_a_single_app_screenshots()
    {
        $app = Scraper::getApp($this->appId);
        $this->assertNotEmpty($app['screenshots']);
        $this->assertTrue(0 < $app['screenshots']);

    }

    /** @test */
    function it_scrape_a_single_app_description()
    {
        $app = Scraper::getApp($this->appId);
        $this->assertNotEmpty($app['description']);
        $this->assertNotEmpty($app['meta_description']);

    }

    /** @test */
    function it_scrape_a_single_app_type()
    {
        $app = Scraper::getApp($this->appId);
        $this->assertMatchesRegularExpression('/app|game/i', $app['type']);

    }
}