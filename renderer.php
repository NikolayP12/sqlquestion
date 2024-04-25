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
 * Handles the visualization of the question fields
 *
 * @package     qtype_sqlquestion
 * @copyright   2024 Nikolay <nikolaypn2002@gmail.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Renderer class for the sqlquestion question type.
 * 
 * This class is responsible for producing the actual HTML output
 * for questions of type sqlquestion, both during attempts and when reviewing.
 */
class qtype_sqlquestion_renderer extends qtype_renderer
{
    /**
     * Generates the question display and input controls.
     * 
     * This method is called by Moodle to generate the HTML needed to display
     * the question to the user, including the question text, any related concepts,
     * the data (usually SQL code), hint for solving the question, and the solution.
     *
     * @param question_attempt $qa The question attempt object.
     * @param question_display_options $options Display options that affect the output.
     * @return string The HTML to output.
     */
    public function formulation_and_controls(question_attempt $qa, question_display_options $options)
    {
        $question = $qa->get_question();
        $output = '';

        // Displays the question statement.
        $output .= html_writer::tag('h3', get_string('statement_title', 'qtype_sqlquestion'), array('class' => 'sqlquestion_heading'));
        $output .= html_writer::tag('div', $question->format_questiontext($qa), array('class' => 'qtext'));

        // If there are related concepts, displays them.
        if (!empty($question->relatedconcepts)) {
            $output .= html_writer::tag('h3', get_string('statement_concepts', 'qtype_sqlquestion'), array('class' => 'sqlquestion_heading'));
            $output .= html_writer::tag('div', format_text($question->relatedconcepts), array('class' => 'sqlquestion_relatedconcepts'));
        }

        if (!empty($question->relationalschema)) {
            // Displays the relationalschema section, typically containing SQL code.
            $output .= html_writer::tag('h3', get_string('statement_relationalschema', 'qtype_sqlquestion'), array('class' => 'sqlquestion_heading'));
            // Use of <pre> to preserve formatting of the code.
            $output .= html_writer::tag('pre', s($question->relationalschema), array('class' => 'sqlquestion_relationalschema'));
        }

        if (!empty($question->data)) {
            // Displays the data section, typically containing SQL code.
            $output .= html_writer::tag('h3', get_string('statement_data', 'qtype_sqlquestion'), array('class' => 'sqlquestion_heading'));
            // Use of <pre> to preserve formatting of the code.
            $output .= html_writer::tag('pre', s($question->data), array('class' => 'sqlquestion_data'));
        }

        if (!empty($question->sqlcheck)) {
            // Displays the sqlcheck section, typically containing SQL code.
            $output .= html_writer::tag('h3', get_string('statement_sqlcheck', 'qtype_sqlquestion'), array('class' => 'sqlquestion_heading'));
            // Use of <pre> to preserve formatting of the code.
            $output .= html_writer::tag('pre', s($question->sqlcheck), array('class' => 'sqlquestion_sqlcheck'));
        }

        if (!empty($question->sqlcheckrun)) {
            // Displays the sqlcheckrun section, typically containing SQL code.
            $output .= html_writer::tag('h3', get_string('statement_sqlcheckrun', 'qtype_sqlquestion'), array('class' => 'sqlquestion_heading'));
            // Use of <pre> to preserve formatting of the code.
            $output .= html_writer::tag('pre', s($question->sqlcheckrun), array('class' => 'sqlquestion_sqlcheckrun'));
        }

        if (!empty($question->hint)) {
            // Displays the hint for solving the question.
            $output .= html_writer::tag('h3', get_string('statement_hint', 'qtype_sqlquestion'), array('class' => 'sqlquestion_heading'));
            $output .= html_writer::tag('div', format_text($question->hint), array('class' => 'sqlquestion_hint'));
        }

        // Displays the resultdata for solving the question.
        $output .= html_writer::tag('h3', get_string('statement_resultdata', 'qtype_sqlquestion'), array('class' => 'sqlquestion_heading'));
        $output .= html_writer::tag('pre', s($question->resultdata), array('class' => 'sqlquestion_resultdata'));

        // Displays the subjectivedifficulty for solving the question.
        $output .= html_writer::tag('h3', get_string('statement_subjectivedifficulty', 'qtype_sqlquestion'), array('class' => 'sqlquestion_heading'));
        $output .= html_writer::tag('div', format_text($question->subjectivedifficulty), array('class' => 'sqlquestion_subjectivedifficulty'));

        // Displays the objectivedifficulty for solving the question.
        $output .= html_writer::tag('h3', get_string('statement_objectivedifficulty', 'qtype_sqlquestion'), array('class' => 'sqlquestion_heading'));
        $output .= html_writer::tag('div', format_text($question->objectivedifficulty), array('class' => 'sqlquestion_objectivedifficulty'));

        // Displays the decreaseattempt that delimit the decrease of every attempt.
        $output .= html_writer::tag('h3', get_string('statement_decreaseattempt', 'qtype_sqlquestion'), array('class' => 'sqlquestion_heading'));
        $output .= html_writer::tag('div', format_text($question->decreaseattempt), array('class' => 'sqlquestion_decreaseattempt'));

        // Displays the mingrade set the limit of decreasing
        $output .= html_writer::tag('h3', get_string('statement_mingrade', 'qtype_sqlquestion'), array('class' => 'sqlquestion_heading'));
        $output .= html_writer::tag('div', format_text($question->mingrade), array('class' => 'sqlquestion_mingrade'));

        // Displays the solution.
        $output .= html_writer::tag('h3', get_string('statement_solution', 'qtype_sqlquestion'), array('class' => 'sqlquestion_heading'));
        $output .= html_writer::tag('pre', s($question->solution), array('class' => 'sqlquestion_solution'));

        return $output;
    }
}
