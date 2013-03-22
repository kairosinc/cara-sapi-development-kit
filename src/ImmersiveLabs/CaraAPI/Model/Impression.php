<?php

namespace ImmersiveLabs\CaraAPI\Model;

class Impression
{
    const IMPRESSION_AGE_UNKNOWN = 'unknown';
    const IMPRESSION_AGE_CHILD = 'child';
    const IMPRESSION_AGE_YOUNG_ADULT = 'young adult';
    const IMPRESSION_AGE_ADULT = 'adult';
    const IMPRESSION_AGE_SENIOR = 'senior';

    public static $validAgeGroups = array(
        self::IMPRESSION_AGE_UNKNOWN => 0,
        self::IMPRESSION_AGE_CHILD => 1,
        self::IMPRESSION_AGE_YOUNG_ADULT => 2,
        self::IMPRESSION_AGE_ADULT => 3,
        self::IMPRESSION_AGE_SENIOR => 4
    );

    const IMPRESSION_GENDER_UNKNOWN = 'unknown';
    const IMPRESSION_GENDER_MALE = 'male';
    const IMPRESSION_GENDER_FEMALE = 'female';

    public static $validGenders = array(
        self::IMPRESSION_GENDER_UNKNOWN => 0,
        self::IMPRESSION_GENDER_MALE => 1,
        self::IMPRESSION_GENDER_FEMALE => 2
    );

}