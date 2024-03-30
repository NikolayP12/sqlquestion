<?php

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
