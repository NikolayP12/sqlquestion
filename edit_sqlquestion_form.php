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

class qtype_sqlquestion_edit_form extends question_edit_form
{

    protected function definition_inner($mform)
    {
        // Agrega el campo para los Conceptos relacionados con el ejercicio.
        $mform->addElement('textarea', 'relatedconcepts', get_string('relatedconcepts', 'qtype_sqlquestion'), array('rows' => 3, 'cols' => 80));
        $mform->setType('relatedconcepts', PARAM_TEXT); // Es más seguro y generalmente suficiente.

        // Agrega el campo Data para código SQL.
        $mform->addElement('textarea', 'data', get_string('data', 'qtype_sqlquestion'), array('rows' => 15, 'cols' => 80));
        $mform->setType('data', PARAM_RAW); // Permite contenido HTML, asegúrate de sanitizar al mostrar.

        // Agrega el campo para las Instrucciones del ejercicio.
        $mform->addElement('textarea', 'instructions', get_string('instructions', 'qtype_sqlquestion'), array('rows' => 15, 'cols' => 80));
        $mform->setType('instructions', PARAM_TEXT);

        // Agrega el campo para la Solución al ejercicio.
        $mform->addElement('textarea', 'solution', get_string('solution', 'qtype_sqlquestion'), array('rows' => 15, 'cols' => 80));
        $mform->setType('solution', PARAM_TEXT);
    }

    protected function data_preprocessing($question)
    {
        $question = parent::data_preprocessing($question);

        // Verifica si hay opciones previamente guardadas para la pregunta.
        if (empty($question->options)) {
            return $question;
        }

        // Preprocesa 'relatedconcepts' si existe.
        if (isset($question->options->relatedconcepts)) {
            $question->relatedconcepts = $question->options->relatedconcepts;
        }

        // Preprocesa 'data' si existe.
        if (isset($question->options->data)) {
            $question->data = $question->options->data;
        }

        // Preprocesa 'instructions' si existe.
        if (isset($question->options->instructions)) {
            $question->instructions = $question->options->instructions;
        }

        // Preprocesa 'solution' si existe.
        if (isset($question->options->solution)) {
            $question->solution = $question->options->solution;
        }

        return $question;
    }



    public function validation($data, $files)
    {
        $errors = parent::validation($data, $files);

        // Validación para 'data' (código SQL).
        // Validación para asegurarnos de que hay un generador de script.
        if (trim($data['data']) == '') {
            //$errors['data'] = get_string('error_data', 'error_data_empty');
            $errors['data'] = get_string('error_data_empty', 'qtype_sqlquestion');
        }

        // Validación para 'instructions'.
        if (trim($data['instructions']) == '') {
            $errors['instructions'] = get_string('error_instructions_empty', 'qtype_sqlquestion');
        }
        // Validación para 'solution'.
        if (trim($data['solution']) == '') {
            $errors['solution'] = get_string('error_solution_empty', 'qtype_sqlquestion');
        }

        // Devuelve cualquier error encontrado.
        return $errors;
    }

    public function qtype()
    {
        return 'sqlquestion';
    }
}
