<?php

namespace Abaydullah\GooglePlayScraper;
/**
 * @author MD Mim Abaydullah <abaydullah786@gmail.com>
 */
class Categories
{

    public static function type($category)
    {
        $type = match ($category) {
            'ART_AND_DESIGN' => 'app',
            'AUTO_AND_VEHICLES' => 'app',
            'BEAUTY' => 'app',
            'BOOKS_AND_REFERENCE' => 'app',
            'BUSINESS' => 'app',
            'COMICS' => 'app',
            'COMMUNICATION' => 'app',
            'DATING' => 'app',
            'EDUCATION' => 'app',
            'ENTERTAINMENT' => 'app',
            'EVENTS' => 'app',
            'FINANCE' => 'app',
            'FOOD_AND_DRINK' => 'app',
            'HEALTH_AND_FITNESS' => 'app',
            'HOUSE_AND_HOME' => 'app',
            'LIFESTYLE' => 'app',
            'MAPS_AND_NAVIGATION' => 'app',
            'MEDICAL' => 'app',
            'MUSIC_AND_AUDIO' => 'app',
            'NEWS_AND_MAGAZINES' => 'app',
            'PARENTING' => 'app',
            'PERSONALIZATION' => 'app',
            'PHOTOGRAPHY' => 'app',
            'PRODUCTIVITY' => 'app',
            'SHOPPING' => 'app',
            'SOCIAL' => 'app',
            'SPORTS' => 'app',
            'TOOLS' => 'app',
            'TRAVEL_AND_LOCAL' => 'app',
            'VIDEO_PLAYERS' => 'app',
            'WEATHER' => 'app',
            'LIBRARIES_AND_DEMO' => 'app',
            'GAME_ARCADE' => 'game',
            'GAME_PUZZLE' => 'game',
            'GAME_CARD' => 'game',
            'GAME_CASUAL' => 'game',
            'GAME_RACING' => 'game',
            'GAME_SPORTS' => 'game',
            'GAME_ACTION' => 'game',
            'GAME_ADVENTURE' => 'game',
            'GAME_BOARD' => 'game',
            'GAME_CASINO' => 'game',
            'GAME_EDUCATIONAL' => 'game',
            'GAME_MUSIC' => 'game',
            'GAME_ROLE_PLAYING' => 'game',
            'GAME_SIMULATION' => 'game',
            'GAME_STRATEGY' => 'game',
            'GAME_TRIVIA' => 'game',
            'GAME_WORD' => 'game',
            'FAMILY' => 'game',
            'FAMILY_ACTION' => 'game',
            'FAMILY_BRAINGAMES' => 'game',
            'FAMILY_CREATE' => 'game',
            'FAMILY_EDUCATION' => 'game',
            'FAMILY_MUSICVIDEO' => 'game',
            'FAMILY_PRETEND' => 'game',
            default => 'app'
        };

        return $type;
    }



}

