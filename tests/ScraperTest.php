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
        $scrape = new Scraper();

        $app = $scrape->getApp($this->appId);
        self::assertStringContainsString('Facebook Lite', $app['title']);
    }

    /** @test */
    function it_scrape_a_single_app_icon()
    {
        $app = (new Scraper())->getApp($this->appId);
        $this->assertNotEmpty($app['icon']);
        $this->assertNotEmpty($app['icon_original']);
    }

    /** @test */
    function it_scrape_a_single_app_developer()
    {
        $app = (new Scraper())->getApp($this->appId);
        $this->assertNotEmpty($app['developer_name']);
        $this->assertNotEmpty($app['developer_url']);
    }

    /** @test */
    function it_scrape_a_single_app_rating_and_review()
    {
        $app = (new Scraper())->getApp($this->appId);
        $this->assertNotEmpty($app['rating']);
        $this->assertNotEmpty($app['review']);
    }

    /** @test */
    function it_scrape_a_single_app_histograms()
    {
        $app = (new Scraper())->getApp($this->appId);
        $this->assertCount(5, $app['histograms']);
    }

    /** @test */
    function it_scrape_a_single_app_downloads()
    {
        $app = (new Scraper())->getApp($this->appId);
        $this->assertNotEmpty($app['downloads']);
    }

    /** @test */
    function it_scrape_a_single_app_paid()
    {
        $app = (new Scraper())->getApp($this->appId);
        $this->assertIsBool($app['paid']);
    }

    /** @test */
    function it_scrape_a_single_app_updated()
    {
        $app = (new Scraper())->getApp($this->appId);
        $this->assertNotEmpty($app['updated']);
    }

    /** @test */
    function it_scrape_a_single_app_category()
    {
        $app = (new Scraper())->getApp($this->appId);
        $this->assertNotEmpty($app['category_name']);
        $this->assertNotEmpty($app['category_url']);
        $this->assertNotEmpty($app['category_slug']);
    }

    /** @test */
    function it_scrape_a_single_app_screenshots()
    {
        $app = (new Scraper())->getApp($this->appId);
        $this->assertNotEmpty($app['screenshots']);
        $this->assertTrue(0 < $app['screenshots']);

    }

    /** @test */
    function it_scrape_a_single_app_description()
    {
        $app = (new Scraper())->getApp($this->appId);
        $this->assertNotEmpty($app['description']);
        $this->assertNotEmpty($app['meta_description']);

    }

    /** @test */
    function it_scrape_a_single_app_type()
    {
        $app = (new Scraper())->getApp($this->appId);
        $this->assertMatchesRegularExpression('/app|game/i', $app['type']);

    }
}