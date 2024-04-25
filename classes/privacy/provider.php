<?php

// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Defines the privacy policy for the sqlquestion question type plugin.
 *
 * This plugin does not store any personal data, thus it implements the null_provider
 * to indicate it complies with Moodle's privacy API without storing user data.
 *
 * @package     qtype_sqlquestion
 * @copyright   2024 Nikolay <nikolaypn2002@gmail.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace qtype_sqlquestion\privacy;

use \core_privacy\local\metadata\null_provider;

defined('MOODLE_INTERNAL') || die();

/**
 * The provider class for the sqlquestion question type plugin.
 *
 * This class indicates that the sqlquestion question type does not store any personal data,
 * by implementing Moodle's privacy API interfaces. It acts as a 'null provider' to declare
 * that no user-specific data is handled by this plugin.
 */
class provider implements
    \core_privacy\local\metadata\provider,
    \core_privacy\local\request\user_preference_provider
{
    /**
     * Provides a description for the reason this plugin does not store any personal data.
     *
     * This method returns a localized string identifier explaining why the plugin does not
     * store any personal data. This description is part of the plugin's privacy policy.
     *
     * @return string The localized string identifier.
     */
    public static function get_reason(): string
    {
        return 'privacy:metadata';
    }
}
