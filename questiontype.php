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
 * Class that represents a sqlquestion question type.
 *
 * The class loads, saves and deletes questions of the type sqlquestion
 * to and from the database and provides methods to help with editing questions
 * of this type. It can also provide the implementation for import and export
 * in various formats.
 */
class qtype_sqlquestion extends question_type
{

    // Override functions as necessary from the parent class located at
    // /question/type/questiontype.php.

    public function get_question_options($question)
    {
        global $DB;

        // Asegura que el objeto de la pregunta tenga una propiedad 'options'.
        if (!property_exists($question, 'options')) {
            $question->options = new stdClass();
        }

        // Recupera los datos específicos de la pregunta de la base de datos.
        $options = $DB->get_record('qtype_sqlquestion_options', array('questionid' => $question->id), '*', MUST_EXIST);

        // Asigna los datos recuperados a la propiedad 'options' del objeto de la pregunta.
        $question->options->relatedconcepts = $options->relatedconcepts;
        $question->options->data = $options->data;
        $question->options->instructions = $options->instructions;
        $question->options->solution = $options->solution;

        parent::get_question_options($question);
    }

    // Metodo para el almacenamiento en la base de datos.
    public function save_question_options($question)
    {
        global $DB;

        // Prepara los datos para ser insertados o actualizados.
        $options = new stdClass();
        $options->questionid = $question->id;
        $options->relatedconcepts = $question->relatedconcepts;
        $options->data = $question->data;
        $options->instructions = $options->instructions;
        $options->solution = $question->solution;

        // Verifica si ya existen opciones para esta pregunta.
        $existing = $DB->get_record('qtype_sqlquestion_options', array('questionid' => $question->id));

        if ($existing) {
            // Si existen, actualiza la entrada.
            $options->id = $existing->id;
            $DB->update_record('qtype_sqlquestion_options', $options);
        } else {
            // De lo contrario, inserta una nueva entrada.
            $DB->insert_record('qtype_sqlquestion_options', $options);
        }
    }

    protected function initialise_question_instance(question_definition $question, $questiondata)
    {
        parent::initialise_question_instance($question, $questiondata);

        $question->relatedconcepts = $questiondata->options->relatedconcepts;
        $question->data = $questiondata->options->data;
        $question->instructions = $questiondata->options->instructions;
        $question->solution = $questiondata->options->solution;
    }

    // Copiado directamente del essay
    public function delete_question($questionid, $contextid)
    {
        global $DB;

        $DB->delete_records('qtype_sqlquestion_options', array('questionid' => $questionid));
        parent::delete_question($questionid, $contextid);
    }
}
