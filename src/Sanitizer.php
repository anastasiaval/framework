<?php

namespace src;

/**
 * Class Sanitizer for string converting operations
 */
class Sanitizer {

    /**
     * Regular Expressions
     *
     * RegExp Cheat sheet -> pdf (OverAPI.com)
     * preg_replace -> замену по правилу
     * preg_match -> равен ли правилу
     */

    /**
     * Clear string from unused characters
     * @return string
     */
    public static function clearString($value) {
        return false;
    }

    /**
     * Clear string into integer value
     * @param $value
     * @return int
     */
    public static function integer($value) {
        $pattern = "/[\D]/";
        $content = preg_replace($pattern, '', $value);

        return intval($content);
    }

    /**
     * Clear string into float value
     * @return float
     */
    public static function float($value) {
        return false;
    }

    /**
     * Clear string into boolean value
     * @return bool
     */
    public static function boolean($value) {
        return false;
    }

    /**
     * Clear string by E-Mail rules
     * @return int
     */
    public static function email($value) {
        $pattern = "/[^A-z0-9_@]/";

        if (Sanitizer::isEmail($value)) {
            return $value;
        } else {
            $content = preg_replace(
                $pattern,
                '',
                $value
            );
        }

        return $content;
    }

    /**
     * Clear string into URL slug
     * @return int
     */
    public static function url($value) {
        return false;
    }

    /**
     * Check value with E-Mail rules
     * @return bool
     */
    public static function isEmail($value) {
        $pattern = "/\w+@[A-z_]+?\.[A-z]{2,15}/";

        if (preg_match($pattern, $value)) {
            return true;
        } else {
            return false;
        }
    }

}

