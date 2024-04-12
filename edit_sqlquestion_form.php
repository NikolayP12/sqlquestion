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
 * The editing form for sqlquestion question type is defined here.
 *
 * @package     qtype_sqlquestion
 * @copyright   2024 Nikolay <nikolaypn2002@gmail.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Defines the editing form for the 'sqlquestion' question type.
 * Extends the question_edit_form to customize specific fields for this question type.
 */
class qtype_sqlquestion_edit_form extends question_edit_form
{
    /**
     * Adds specific fields to the question editing form.
     * 
     * Defines and sets up the additional fields required,
     * such as related concepts, data (script in SQL), hint, and the question's solution.
     *
     * @param MoodleQuickForm $mform The form being built.
     */
    protected function definition_inner($mform)
    {
        // Field for entering related concepts for the question.
        $mform->addElement('textarea', 'relatedconcepts', get_string('relatedconcepts', 'qtype_sqlquestion'), array('rows' => 3, 'cols' => 80));
        $mform->setType('relatedconcepts', PARAM_TEXT);

        // Field for entering the SQL code needed for the question.
        $mform->addElement('textarea', 'data', get_string('data', 'qtype_sqlquestion'), array('rows' => 15, 'cols' => 80));
        $mform->setType('data', PARAM_RAW);

        // Field for entering hint for students.
        $mform->addElement('textarea', 'hint', get_string('hint', 'qtype_sqlquestion'), array('rows' => 15, 'cols' => 80));
        $mform->setType('hint', PARAM_TEXT);

        // Field for entering the sript code that generates the result data for the question.
        $mform->addElement('textarea', 'resultdata', get_string('resultdata', 'qtype_sqlquestion'), array('rows' => 15, 'cols' => 80));
        $mform->setType('data', PARAM_RAW);

        // Field for entering the SQL code subjetive difficulty.
        $mform->addElement('textarea', 'subjectivedifficulty', get_string('subjectivedifficulty', 'qtype_sqlquestion'), array('rows' => 2, 'cols' => 10));
        $mform->setType('data', PARAM_TEXT);

        // Field for entering the SQL code objective difficulty.
        $mform->addElement('textarea', 'objectivedifficulty', get_string('objectivedifficulty', 'qtype_sqlquestion'), array('rows' => 2, 'cols' => 10));
        $mform->setType('data', PARAM_TEXT);

        // Field for entering the decrease amount per attempt
        $mform->addElement('text', 'decreaseattempt', get_string('decreaseattempt', 'qtype_sqlquestion'));
        $mform->setType('decreaseattempt', PARAM_FLOAT);
        $mform->addRule('decreaseattempt', null, 'numeric', null, 'client');
        $mform->setDefault('decreaseattempt', 0.00);

        // Field for entering the minimum grade limit
        $mform->addElement('text', 'mingrade', get_string('mingrade', 'qtype_sqlquestion'));
        $mform->setType('mingrade', PARAM_FLOAT);
        $mform->addRule('mingrade', null, 'numeric', null, 'client');
        $mform->setDefault('mingrade', 0.00);

        // Field for the expected solution of the question.
        $mform->addElement('textarea', 'solution', get_string('solution', 'qtype_sqlquestion'), array('rows' => 15, 'cols' => 80));
        $mform->setType('solution', PARAM_RAW);
    }

    /**
     * Preprocesses the question data before showing it in the form.
     * 
     * Loads previously saved values into the form fields, facilitating the editing
     * of existing questions.
     *
     * @param stdClass $question Existing question data.
     * @return stdClass Preprocessed question data.
     */
    protected function data_preprocessing($question)
    {
        $question = parent::data_preprocessing($question);

        // Load existing data into form fields, if it's available.
        if (!empty($question->options)) {
            foreach (['relatedconcepts', 'data', 'hint', 'resultdata', 'subjectivedifficulty', 'objectivedifficulty', 'decreaseattempt', 'mingrade', 'solution'] as $field) {
                if (isset($question->options->$field)) {
                    $question->$field = $question->options->$field;
                }
            }
        }

        return $question;
    }

    /**
     * Validates the data submitted from the form.
     * 
     * Checks that all required fields are filled and meet specific validation criteria,
     * such as ensuring the presence of SQL data.
     *
     * @param array $data The data submitted from the form.
     * @param array $files Files submitted with the form.
     * @return array Associative array of errors, keyed by field name.
     */
    public function validation($data, $files)
    {
        $errors = parent::validation($data, $files);

        if (trim($data['resultdata']) === '') {
            $errors['resultdata'] = get_string('error_resultdata_empty', 'qtype_sqlquestion');
        }
        if (trim($data['subjectivedifficulty']) === '') {
            $errors['subjectivedifficulty'] = get_string('error_subjectivedifficulty_empty', 'qtype_sqlquestion');
        }
        if (trim($data['objectivedifficulty']) === '') {
            $errors['objectivedifficulty'] = get_string('error_objectivedifficulty_empty', 'qtype_sqlquestion');
        }
        if (trim($data['decreaseattempt']) === '') {
            $errors['decreaseattempt'] = get_string('error_decreaseattempt_empty', 'qtype_sqlquestion');
        }
        if (trim($data['mingrade']) === '') {
            $errors['mingrade'] = get_string('error_mingrade_empty', 'qtype_sqlquestion');
        }
        if (trim($data['solution']) === '') {
            $errors['solution'] = get_string('error_solution_empty', 'qtype_sqlquestion');
        }

        return $errors;
    }

    /**
     * Returns the type of question managed by this form.
     * 
     * @return string The question type.
     */
    public function qtype()
    {
        return 'sqlquestion';
    }
}
