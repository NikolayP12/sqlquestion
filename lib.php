<?php

defined('MOODLE_INTERNAL') || die();

function qtype_sqlquestion_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload, array $options = array())
{
    global $CFG;
    require_once($CFG->libdir . '/questionlib.php');
    question_pluginfile($course, $context, 'qtype_sqlquestion', $filearea, $args, $forcedownload, $options);
}
