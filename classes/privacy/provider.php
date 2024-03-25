<?php

/**
 * Plugin strings are defined here.
 *
 * @package     qtype_sqlquestion
 * @copyright   2024 Nikolay <nikolaypn2002@gmail.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace qtype_sqlquestion\privacy;

use \core_privacy\local\metadata\null_provider;

defined('MOODLE_INTERNAL') || die();

class provider implements
    // This component has data.
    // We need to return default options that have been set a user preferences.
    \core_privacy\local\metadata\provider,
    \core_privacy\local\request\user_preference_provider
{

    public static function get_reason(): string
    {
        return 'privacy:metadata';
    }
}
