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
 * Question definition class for sqlquestion.
 *
 * @package     qtype_sqlquestion
 * @copyright   2024 Nikolay <nikolaypn2002@gmail.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Represents an SQL question.
 *
 * This class provides necessary methods to manage SQL questions, including rendering,
 * response processing, and grading.
 */
class qtype_sqlquestion_question extends question_graded_automatically
{

    public $responseformat;
    public $relatedconcepts;
    public $relationalschema;
    public $data;
    public $sqlcheck;
    public $sqlcheckrun;
    public $code;
    public $resultdata;
    public $subjectivedifficulty;
    public $objectivedifficulty;
    public $decreaseattempt;
    public $mingrade;
    public $solution;

    public function get_format_renderer(moodle_page $page)
    {
        return $page->get_renderer('qtype_sqlquestion');
    }

    /**
     * Returns the data expected by this question type.
     *
     * For questions not expecting user input, returns an empty array.
     *
     * @return array The expected data.
     */
    public function get_expected_data()
    {
        return array();
    }

    /**
     * Returns the correct response for this question.
     *
     * Returns null for questions without a predefined correct response.
     *
     * @return array|null The correct response or null.
     */
    public function get_correct_response()
    {
        return null;
    }

    /**
     * Checks if the given response is complete.
     *
     * Always returns true as this question type does not expect user responses.
     *
     * @param array $response The response to check.
     * @return bool True if the response is considered complete.
     */
    public function is_complete_response(array $response)
    {
        return true;
    }

    /**
     * Determines if the response is gradable.
     *
     * Returns false for this question type as it does not process responses.
     *
     * @param array $response The response to check.
     * @return bool True if the response can be graded.
     */
    public function is_gradable_response(array $response)
    {
        return false;
    }

    /**
     * Grades the given response.
     *
     * For non-automatically graded questions, this implementation is trivial.
     *
     * @param array $response The response to grade.
     * @return array The grade fraction and the state of the question.
     */
    public function grade_response(array $response)
    {
        return array(1, question_state::$gradedright);
    }

    /**
     * Provides a validation error message for an invalid response.
     *
     * Always returns an empty string as this question type does not validate responses.
     *
     * @param array $response The response to validate.
     * @return string An error message or an empty string.
     */
    public function get_validation_error(array $response)
    {
        return '';
    }

    /**
     * Checks if two responses are the same.
     *
     * Always returns false as this question type does not compare responses.
     *
     * @param array $response1 The first response.
     * @param array $response2 The second response.
     * @return bool True if the responses are considered the same.
     */
    public function is_same_response(array $response1, array $response2)
    {
        return false;
    }

    /**
     * Summarises a response for reporting purposes.
     *
     * Returns an empty string or a static summary as this question type does not process responses.
     *
     * @param array $response The response to summarise.
     * @return string The summary of the response.
     */
    public function summarise_response(array $response)
    {
        return '';
    }
}
