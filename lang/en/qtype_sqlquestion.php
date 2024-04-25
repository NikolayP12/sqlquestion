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
 * Plugin strings are defined here.
 *
 * @package     qtype_sqlquestion
 * @category    string
 * @copyright   2024 Nikolay <nikolaypn2002@gmail.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// Name strings
$string['relatedconcepts'] = 'Related Concepts';
$string['relationalschema'] = 'Relational Schema';
$string['data'] = 'Data';
$string['sqlcheck'] = 'SQL check';
$string['sqlcheckrun'] = 'SQL check run';
$string['code'] = 'Code code for solving the exercise';
$string['solution'] = 'Solution';
$string['resultdata'] = 'Result Data';
$string['subjectivedifficulty'] = 'Subjective Difficulty';
$string['objectivedifficulty'] = 'Objective Difficulty';
$string['decreaseattempt'] = 'Decrease per attempt';
$string['mingrade'] = 'Minimum grade';

// Helpful strings
$string['relatedconcepts_help'] = 'In this field can be written those concepts to which the exercise is closely related, and that have been previously defined in the Moodle Database module.';
$string['relationalschema_help'] = 'In this field is stored the schema that contextualize the database for the question.';
$string['data_help'] = 'In this field you can attach the code that must be previously executed for the contextualization of the database for the correct execution of the exercise. For example: INSERT INTO Books (ID_Book, Title, Autor) VALUES...';
$string['sqlcheck_help'] = 'Field to trigger the trigger created by the student and check that it works.';
$string['sqlcheckrun_help'] = 'Field that contains the function that verifies that the trigger created by the student works.';
$string['code_help'] = 'In this field can be written codes that can be consulted by the students in order to solve the exercise.';
$string['resultdata_help'] = 'In this field you must attach the code that will generate the expected tables as a solution, as a sql script. For example: SELECT * FROM cars.';
$string['subjectivedifficulty_help'] = 'In this field is described the subjective difficulty that the teacher has considered for the exercise.';
$string['objectivedifficulty_help'] = 'In this field is described the objective difficulty of the exercise.';
$string['decreaseattempt_help'] = 'This field defines the reduction that will be applied to the maximum grade obtainable by the student in a question, each time the student executes a statement.';
$string['mingrade_help'] = 'This field defines the grade from which the reduction per attempt will not continue to be subtracted from the student, for each executed sentence. 
For example: If a reduction per attempt of 0.25 has been defined, and a minimum grade of 3 is obtained, the grade can not be reduced any further even if sentences continue to be executed.';
$string['solution_help'] = 'In this field you must attach the solution in code form, as a sql script. For example: SELECT * FROM cars.';

// Error strings
//$string['error_relationalschema_empty'] = 'Relational Schema field can not be empty.';
//$string['error_sqlcheck_empty'] = 'SQL check field can not be empty.';
//$string['error_sqlcheckrun_empty'] = 'SQL check run field can not be empty.';
$string['error_resultdata_empty'] = 'Result data field can not be empty.';
$string['error_subjectivedifficulty_empty'] = 'Subjective difficulty field can not be empty.';
$string['error_objectivedifficulty_empty'] = 'Objective difficulty field can not be empty.';
$string['error_decreaseattempt_empty'] = 'The decrease field can not be empty.';
$string['error_mingrade_empty'] = 'Minimun grade field can not be empty.';
$string['error_solution_empty'] = 'Solution field can not be empty.';

// Statement strings
$string['statement_title'] = 'Statement of the exercise:';
$string['statement_concepts'] = 'Related concepts with the exercise:';
$string['statement_relationalschema'] = 'Relational Schema of the exercise:';
$string['statement_data'] = 'Script that generates the data base:';
$string['statement_sqlcheck'] = 'SQL Check:';
$string['statement_sqlcheckrun'] = 'SQL Check Run:';
$string['statement_code'] = 'code for solving the exercise:';
$string['statement_resultdata'] = 'Result Data for solving the exercise:';
$string['statement_subjectivedifficulty'] = 'Subjective difficulty of the exercise:';
$string['statement_objectivedifficulty'] = 'Objective difficulty of the exercise:';
$string['statement_decreaseattempt'] = 'Decrease of the exercise:';
$string['statement_mingrade'] = 'Minimun grade of the exercise:';
$string['statement_solution'] = 'Solution of the exercise:';

// Strings for restoring information
$string['relatedconcepts_no_present'] = 'Related Concepts no present.';
$string['relationalschema_no_present'] = 'Relational Schema no present.';
$string['data_no_present'] = 'Script no present.';
$string['sqlcheck_no_present'] = 'SQL check no present.';
$string['sqlcheckrun_no_present'] = 'SQL check run no present.';
$string['code_no_present'] = 'code no present.';
$string['resultdata_no_present'] = 'Resultdata no present.';
$string['subjectivedifficulty_no_present'] = 'Subjective difficulty no present.';
$string['objectivedifficulty_no_present'] = 'Objective difficulty no present.';
$string['solution_no_present'] = 'Solution no present.';

// Plugin information strings
$string['privacy:metadata'] = 'The SQL question type plugin does not store any personal data.';
$string['pluginname'] = 'SQL question';
$string['pluginname_help'] = 'SQL questions that store information to perform SQLab activities.';
$string['pluginname_link'] = 'question/type/sqlquestion.';
$string['pluginnameadding'] = 'Adding a SQL question.';
$string['pluginnameediting'] = 'Editing a SQL question.';
$string['pluginnamesummary'] = 'In this question will be attached the necessary elements for the SQLab plugin';
$string['privacy:metadata'] = 'The SQL question type plugin does not use or store student information because it does not need it.';
