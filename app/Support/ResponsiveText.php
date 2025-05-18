<?php
namespace App\Support;

/**
 * Class ResponsiveText
 *
 * This class provides a method to break a string into segments for responsive design.
 * It adds HTML line breaks and spans to control visibility based on screen size.
 */
class ResponsiveText {
    public static function heroMainNameBreak(string $text): string {
        $words  = explode(' ', $text);
        $parts  = array_chunk($words, 2);
        $output = '';

        foreach ($parts as $index => $group) {
            $segment = implode(' ', $group);

            if ($index === 0) {
                $segment .= '<br class="block md:hidden"><span class="hidden md:inline-block">&nbsp;</span>';
            } elseif ($index === 1) {
                $segment .= '<br class="block md:hidden xl:block"><span class="hidden md:inline-block xl:hidden">&nbsp;</span>';
            }

            $output .= $segment;
        }

        return $output;
    }
}
