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
 * Question type class for sqlquestion is defined here.
 *
 * @package     qtype_sqlquestion
 * @copyright   2024 Nikolay <nikolaypn2002@gmail.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir . '/questionlib.php');

/**
 * The qtype_sqlquestion class represents the SQL question type.
 *
 * This class is responsible for loading, saving, and deleting SQL question
 * types from the database. It also supports question editing and can handle
 * import/export in various formats.
 */
class qtype_sqlquestion extends question_type
{

    /**
     * Loads the question options from the database.
     *
     * This function is called to load the question options for
     * the SQL question type when editing or attempting questions.
     *
     * @param object $question The question object.
     */

    public function get_question_options($question)
    {
        global $DB;

        // Ensure the question object has an options property.
        if (!property_exists($question, 'options')) {
            $question->options = new stdClass();
        }

        // Retrieve specific question data from the database.
        $options = $DB->get_record('qtype_sqlquestion_options', array('questionid' => $question->id), '*', MUST_EXIST);

        // Assign the retrieved data to the question object's "options" property.
        $question->options->relatedconcepts = $options->relatedconcepts;
        $question->options->data = $options->data;
        $question->options->hint = $options->hint;
        $question->options->solution = $options->solution;

        parent::get_question_options($question);
    }

    /**
     * Saves the question options in the database.
     *
     * This function is responsible for either inserting new question options
     * or updating existing ones in the database.
     *
     * @param object $question The question data being saved.
     */
    public function save_question_options($question)
    {
        global $DB;

        // Prepare the data for database insertion or update.
        $options = new stdClass();
        $options->questionid = $question->id;
        $options->relatedconcepts = $question->relatedconcepts;
        $options->data = $question->data;
        $options->hint = $question->hint;
        $options->solution = $question->solution;

        // Check if options already exist for this question.
        $existing = $DB->get_record('qtype_sqlquestion_options', array('questionid' => $question->id));

        if ($existing) {
            // If they exist, update the entry.
            $options->id = $existing->id;
            $DB->update_record('qtype_sqlquestion_options', $options);
        } else {
            // Otherwise, insert a new entry.
            $DB->insert_record('qtype_sqlquestion_options', $options);
        }
    }

    /**
     * Initializes the question instance with specific question data.
     *
     * Called to load question data into the question instance for an attempt or
     * preview, ensuring all necessary properties are set.
     *
     * @param question_definition $question The question definition being initialized.
     * @param object $questiondata The specific question data.
     */
    protected function initialise_question_instance(question_definition $question, $questiondata)
    {
        parent::initialise_question_instance($question, $questiondata);

        $question->relatedconcepts = $questiondata->options->relatedconcepts;
        $question->data = $questiondata->options->data;
        $question->hint = $questiondata->options->hint;
        $question->solution = $questiondata->options->solution;
    }

    /**
     * Deletes question options from the database.
     *
     * Called when a question of this type is deleted to ensure all
     * associated data is removed from the database.
     *
     * @param int $questionid The ID of the question being deleted.
     * @param int $contextid The context ID where the question is stored.
     */
    public function delete_question($questionid, $contextid)
    {
        global $DB;

        $DB->delete_records('qtype_sqlquestion_options', array('questionid' => $questionid));
        parent::delete_question($questionid, $contextid);
    }
}
