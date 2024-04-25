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
 * Handles essential functions for the operation and integration of the question type within the Moodle system
 *
 * @package     qtype_sqlquestion
 * @copyright   2024 Nikolay <nikolaypn2002@gmail.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


defined('MOODLE_INTERNAL') || die();

/**
 * Serves the files from the sqlquestion question type file areas.
 * 
 * This function is called to output files related to the sqlquestion question type,
 * such as images or media files embedded in the question text, feedback, or
 * anywhere else where the plugin might allow file embedding. It delegates the
 * file serving to Moodle's question_pluginfile function after performing necessary
 * access checks specific to the sqlquestion context.
 *
 * @param stdClass $course The course object.
 * @param stdClass $cm The course module object.
 * @param stdClass $context The context.
 * @param string $filearea The name of the file area.
 * @param array $args Additional arguments.
 * @param bool $forcedownload Whether to force the download of the file.
 * @param array $options Additional options affecting the file serving.
 */
function qtype_sqlquestion_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload, array $options = array())
{
    global $CFG;
    require_once($CFG->libdir . '/questionlib.php');

    // Delegates the file serving to Moodle's standard function for question types.
    // This includes performing necessary access control checks.
    question_pluginfile($course, $context, 'qtype_sqlquestion', $filearea, $args, $forcedownload, $options);
}
