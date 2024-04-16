# <center>بِسْمِ اللهِ الرَّحْمٰنِ الرَّحِيْمِ</center>
Google Play Scraper For PHP 
===================


About
A PHP Package To Scrape Android Apps Data From The Google Play Store.

Installation
------------

Add `abaydullah/google-play-scraper` as a require dependency in your `composer.json` file:

```sh
$ composer require abaydullah/google-play-scraper
```

Usage
-----

First create a `Scraper` instance.

```php
use Abaydullah\GooglePlayScraper\Scraper;
 $scraper = new Scraper();

```


### Default 
```php
$lang = 'en';
$country = 'us'
```
##### There are several methods to configure the default behavior:
* `setDefaultLang($lang)`: Sets the default language for all requests. `$lang` must be an [ISO_639-1](https://en.wikipedia.org/wiki/ISO_639-1) two letter language code. If not set, the default language is `en`.
* `setDefaultCountry($country)`: Sets the default country for all requests. `$country` must be an [ISO_3166-1](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2) two letter country code. If not set, the default country is `us`.
##### Example 
```php
$scraper->setDefaultLang('bn');
$scraper->setDefaultCountry('BD');
```


### getApp

Gets app information given its ID.

#### Parameters

* `$id`: Google Play app ID.
* `$lang`: (optional, defaults to `null`): Overrides the default language.
* `$country`: (optional, defaults to `null`): Overrides the default country.

#### Example

```php
$app = $scraper->getApp('com.facebook.katana');
```

Returns:

```php
{
    "url": "https://play.google.com/store/apps/details?id=com.facebook.katana&hl=en&gl=us",
    "app_id": "com.facebook.katana",
    "title": "Facebook",
    "icon": "https://play-lh.googleusercontent.com/KCMTYuiTrKom4Vyf0G4foetVOwhKWzNbHWumV73IXexAIy5TTgZipL52WTt8ICL-oIo=w240-h480",
    "icon_original": "https://play-lh.googleusercontent.com/KCMTYuiTrKom4Vyf0G4foetVOwhKWzNbHWumV73IXexAIy5TTgZipL52WTt8ICL-oIo",
    "cover_image": "",
    "developer_name": "Meta Platforms, Inc.",
    "developer_url": "https://play.google.com/store/apps/developer?id=Meta+Platforms,+Inc.",
    "rating": "3.7",
    "histograms": {
        "1": "335787671",
        "2": "54119072",
        "3": "74328363",
        "4": "115914304",
        "5": "769691055"
    },
    "review": "135M",
    "downloads": "5B+",
    "paid": false,
    "updated": "Apr 15, 2024",
    "category_name": "Social",
    "category_url": "https://play.google.com/store/apps/category/SOCIAL",
    "category_slug": "SOCIAL",
    "trailer": "",
    "type": "app",
    "screenshots": [
        "https://play-lh.googleusercontent.com/W_Y8ucZDrPOv9fBnDMF_s8y1e7NEsuw5_X3J3kE2dneQrzIB-K4Q4hv4bxcFuPnkhg=w1052-h592",
        "https://play-lh.googleusercontent.com/PTAbVSQOLpXQeVrzjQDNDUjPUp8C2Kr6PnO_Jh-p7s9eScuwZ4Y3x1U1W39rBeHieEg=w1052-h592",
        "https://play-lh.googleusercontent.com/xL67taOKGP0WLg28H6s3Jf2xDL3F4_Tj4O4a9Exs7u19muZFcFzuChk2zgMqec7umA=w1052-h592",
        "https://play-lh.googleusercontent.com/kvvzjEmtQU0wDB3hUHyBuu0N2QRshAWu3RBTKEPZOisYgGBa3P3UxU71rYzLPHcqals=w1052-h592",
        "https://play-lh.googleusercontent.com/xxpLCl7SsEBouBCJLLsvDaKP9cMszUysS2S7U0hWMX7PA0TkvCNjg-NAsE-h-IpkGysJ=w1052-h592"
    ],
    "whats_new": "",
    "meta_description": "Explore the things you love",
    "description": "Whether you’re looking for a spark of inspiration with reels or want to dive deeper into something you already love with Marketplace or in groups, you can discover ideas, experiences and people that fuel your interests and help you make progress on the things that matter to you on Facebook.<br><br>Explore and expand your interests:<br>* Shop for affordable and uncommon stuff on Marketplace and take your hobbies to the next level<br>* Personalize your Feed to see more of what you like, less of what you don’t<br>* Watch reels for quick entertainment that sparks inspiration<br>* Discover creators, small businesses and communities who can help you dive deeper into the things you care about<br><br>Connect with people and communities:<br>* Join groups to learn tips and tricks from real people who’ve been there, done that<br>* Catch up with friends, family and influencers through Feed and stories<br><br>Share your world:<br>* Effortlessly create reels from trending templates, or let your creativity shine with a full suite of editing tools<br>* Customize your profile to choose how you show up and who you share your posts with<br>* Turn your hobby into a side hustle by becoming a creator or selling things on Marketplace<br>* Celebrate everyday, candid moments with stories, which disappear in 24 hours<br><br>Consumer Health Privacy Policy: https://www.facebook.com/privacy/policies/health"
}

```


### getCategoryApps

Gets multiple apps given Category Slug.

#### Parameters

* `$category`: Category Slug.
* `$lang`: (optional, defaults to `null`): Overrides the default language.
* `$country`: (optional, defaults to `null`): Overrides the default country.

#### Example

```php
$apps = $scraper->getCategoryApps('COMMUNICATION');
```
Return All Apps Related With This Category

Returns:

```php
array (
    {
        "app_url": "https://play.google.com/store/apps/details?id=com.alohamobile.browser.lite",
        "app_id": "com.alohamobile.browser.lite",
        "title": "Aloha Browser Lite - Fast VPN",
        "icon": "https://play-lh.googleusercontent.com/HdFVWGWkOtASTeDTqs1jdTDuT9PSOsiXivSCRpF8n46b6S-5bucEHBH17v-tkCTSVL4_=s512",
        "rating": "4.3",
        "type": "app"
    },
    {
        "app_url": "https://play.google.com/store/apps/details?id=com.alohamobile.browser.lite",
        "app_id": "com.alohamobile.browser.lite",
        "title": "Aloha Browser Lite - Fast VPN",
        "icon": "https://play-lh.googleusercontent.com/HdFVWGWkOtASTeDTqs1jdTDuT9PSOsiXivSCRpF8n46b6S-5bucEHBH17v-tkCTSVL4_=s512",
        "rating": "4.3",
        "type": "app"
    },
    {
        "app_url": "https://play.google.com/store/apps/details?id=com.androidbull.incognito.browser",
        "app_id": "com.androidbull.incognito.browser",
        "title": "Incognito Browser - Go Private",
        "icon": "https://play-lh.googleusercontent.com/qX1wOYfB1l4zR3WKIiZf54Rfj50ntBMeuBubfj8K0nYo4p0-AYjRd63DsgJ6itLn6g=s512",
        "rating": "4.3",
        "type": "app"
    },
    {
        "app_url": "https://play.google.com/store/apps/details?id=com.androidbull.incognito.browser",
        "app_id": "com.androidbull.incognito.browser",
        "title": "Incognito Browser - Go Private",
        "icon": "https://play-lh.googleusercontent.com/qX1wOYfB1l4zR3WKIiZf54Rfj50ntBMeuBubfj8K0nYo4p0-AYjRd63DsgJ6itLn6g=s512",
        "rating": "4.3",
        "type": "app"
    },
    {
        "app_url": "https://play.google.com/store/apps/details?id=com.ayoba.ayoba",
        "app_id": "com.ayoba.ayoba",
        "title": "Ayoba chat.games.news.music",
        "icon": "https://play-lh.googleusercontent.com/Jf-XEGdn7L1oK6YMvRBUu2ybkT_hDNgyAqEVh_oa1of_jcE8ADE0o2HYArpeFzmGHX8=s512",
        "rating": "4.3",
        "type": "app"
    },
    {
        "app_url": "https://play.google.com/store/apps/details?id=com.azarlive.android",
        "app_id": "com.azarlive.android",
        "title": "Azar - video chat & livestream",
        "icon": "https://play-lh.googleusercontent.com/Gv4fpcy-Wi5jXHdfd3YXgCzrojWIylcfYs_nC8cY0adOunZjawr3S9Xznjx7_mza4RI=s512",
        "rating": "3.9",
        "type": "app"
    }
)
```

### getDeveloperApps

Returns an array with the existing Developer Apps From Google Play.

#### Example

```php
$apps = $scraper->getDeveloperApps('Meta+Platforms,+Inc.');
```
Returns:

```php
array (
 {
        "app_url": "https://play.google.com/store/apps/details?id=com.facebook.orca",
        "app_id": "com.facebook.orca",
        "title": "Messenger",
        "icon": "https://play-lh.googleusercontent.com/kBtGTjKuAMwshWKj9USE93mA-iaERBKoLY1i2I0M-5adZwPlx8izXR8tgK3uc4GTdt6O=w832-h470",
        "rating": "4.2"
    },
    {
        "app_url": "https://play.google.com/store/apps/details?id=com.facebook.lite",
        "app_id": "com.facebook.lite",
        "title": "Facebook Lite",
        "icon": "https://play-lh.googleusercontent.com/2jRTJ3cnljrAs1WSXVrg5DrW-xMUIIMUh1f8boOxQBRZhb2iAM-3QlYBC31vtdIeZ2JD=w832-h470",
        "rating": "4.1"
    },
    {
        "app_url": "https://play.google.com/store/apps/details?id=com.facebook.katana",
        "app_id": "com.facebook.katana",
        "title": "Facebook",
        "icon": "https://play-lh.googleusercontent.com/IPiYhMAw_Y0WmQ7hpKkU_XE4QK5q9X_hECm649kDavLbVkSEnDGAjav_KisF3URVeHXu=w832-h470",
        "rating": "4.4"
    },
    {
        "app_url": "https://play.google.com/store/apps/details?id=com.facebook.pages.app",
        "app_id": "com.facebook.pages.app",
        "title": "Meta Business Suite",
        "icon": "https://play-lh.googleusercontent.com/rDkO_W0YLooPkw0_ZL_6EWkl0kepE9xrVePqI_Ve_iLk-J2KGN8dpNeecwYwcnyg9n8d=w832-h470",
        "rating": "4.5"
    },
    {
        "app_url": "https://play.google.com/store/apps/details?id=com.facebook.adsmanager",
        "app_id": "com.facebook.adsmanager",
        "title": "Meta Ads Manager",
        "icon": "https://play-lh.googleusercontent.com/QJTcnngy553as-l-f0n3LFuvVwXKwpMrwAUZZEElem6PkGKPHocTM-k1cGzXKXlylw=w832-h470",
        "rating": "4.7"
    },
    {
        "app_url": "https://play.google.com/store/apps/details?id=com.facebook.talk",
        "app_id": "com.facebook.talk",
        "title": "Messenger Kids – The Messaging",
        "icon": "https://play-lh.googleusercontent.com/qMYPWHJis5DVg34TGkv4Qrbx28HYd_titGJCO8LPHogXQlqYfyWpbkRofULQtDlpv2s=w832-h470",
        "rating": "3.7"
    },
    {
        "app_url": "https://play.google.com/store/apps/details?id=com.facebook.work",
        "app_id": "com.facebook.work",
        "title": "Workplace from Meta",
        "icon": "https://play-lh.googleusercontent.com/vNthkJ079wVUiXWvd9GFEsNC4fyXSvvIKLKGO3fQhL18n67EUyEl-BD0chezk77kGeQ=w832-h470",
        "rating": "4.7"
    },
    {
        "app_url": "https://play.google.com/store/apps/details?id=com.facebook.workchat",
        "app_id": "com.facebook.workchat",
        "title": "Workplace Chat from Meta",
        "icon": "https://play-lh.googleusercontent.com/E0PebXhly1rJDEAhhJihUCKKNeh2CfiXJzo6g-aewD_id6RTc4CxpX5rrqUDfe0BA94=w832-h470",
        "rating": "4.6"
    },
    {
        "app_url": "https://play.google.com/store/apps/details?id=com.discoverapp",
        "app_id": "com.discoverapp",
        "title": "Discover from Facebook",
        "icon": "https://play-lh.googleusercontent.com/Cu8JWdClO0GT0yOHlKDmDbDTPm_qvIAYU3DDxmImIZWUelk4KrvqxL9C0_MZD1nyT5g=w832-h470",
        "rating": "4.0"
    },
    {
        "app_url": "https://play.google.com/store/apps/details?id=com.facebook.stella",
        "app_id": "com.facebook.stella",
        "title": "Meta View",
        "icon": "https://play-lh.googleusercontent.com/CFG9W4ijXgOFSqAGBbmW-dQTp6SNqX9VX7nXSIEFnmLK9QTHf63jA0giLDhv9JpQrwR7=w832-h470",
        "rating": "3.8"
    },
    {
        "app_url": "https://play.google.com/store/apps/details?id=com.facebook.viewpoints",
        "app_id": "com.facebook.viewpoints",
        "title": "Viewpoints",
        "icon": "https://play-lh.googleusercontent.com/-uS41IcOhk2xtx_21RTwJlx4w4y-C73mAPnhr-ilY7GjQm62B9DIwz02rERnmNFAkNo=w832-h470",
        "rating": "3.6"
    },
    {
        "app_url": "https://play.google.com/store/apps/details?id=com.freebasics",
        "app_id": "com.freebasics",
        "title": "Free Basics by Facebook",
        "icon": "https://play-lh.googleusercontent.com/iH9tFPDt5CWy-EMMRl6ZGdYHMBxlXgCgC7uMugumjZM8vo5tJwdqeYEhi7ZfAvBN_iC5=w832-h470",
        "rating": "3.9"
    },
    {
        "app_url": "https://play.google.com/store/apps/details?id=com.facebook.arstudio.player",
        "app_id": "com.facebook.arstudio.player",
        "title": "Meta Spark Player",
        "icon": "https://play-lh.googleusercontent.com/BDuoGjyLjQDLm2_O6Dk7CBX92oi2vJ5BtZqJiv5f90Gk13ePcSgQOneHlW_2odYBDac=w832-h470",
        "rating": "4.1"
    }
)
```

### getSearchApps

You Can Search With Any Keyword For Get Apps in Array.

#### Example

```php
$apps = $scraper->getSearchApps('new Apps');
```

Returns:

```php
array (
    {
        "app_url": "https://play.google.com/store/apps/details?id=com.imo.android.imoim",
        "app_id": "com.imo.android.imoim",
        "title": "imo-International Calls & Chat",
        "icon": "https://play-lh.googleusercontent.com/9T3EIiVRyvqMRnuHEFvPtHNRfcXj4WBVDpnSN5qj0t3-fSZhZaNj9ZHx55jLj3yXgGw=w832-h470",
        "rating": "4.2"
    },
    {
        "app_url": "https://play.google.com/store/apps/details?id=com.google.android.googlequicksearchbox",
        "app_id": "com.google.android.googlequicksearchbox",
        "title": "Google",
        "icon": "https://play-lh.googleusercontent.com/U8zDyTkJcCQFtKDeu4x8M2_-zIcVuF53fzipTAqZ4nY-ojbAjTNYhS_Z8SVNNysE5A=w832-h470",
        "rating": "4.4"
    },
    {
        "app_url": "https://play.google.com/store/apps/details?id=com.google.android.gm",
        "app_id": "com.google.android.gm",
        "title": "Gmail",
        "icon": "https://play-lh.googleusercontent.com/bfpdXys_ABrZGPvu8M94gI9yGV7hvFFP11_-6bt6DSHlpowhdtCitbNrYoCECI3LCsE=w832-h470",
        "rating": "4.5"
    },
    {
        "app_url": "https://play.google.com/store/apps/details?id=com.google.android.apps.maps",
        "app_id": "com.google.android.apps.maps",
        "title": "Google Maps",
        "icon": "https://play-lh.googleusercontent.com/FQx43QTaAqeOtoTLylK3WIs7ySKuGS8AurXNA1Kj34m6w6CjavF4Oj3s5DB6xZZ7DS63=w832-h470",
        "rating": "4.4"
    },
    {
        "app_url": "https://play.google.com/store/apps/details?id=com.google.android.youtube",
        "app_id": "com.google.android.youtube",
        "title": "YouTube",
        "icon": "",
        "rating": "4.1"
    },
)
```
# <center>Thanks You </center>

