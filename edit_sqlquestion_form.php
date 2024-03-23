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
        $mform->addElement('textarea', 'relatedconcepts', get_string('relatedconcepts', 'qtype_sqlquestion'));
        $mform->setType('relatedconcepts', PARAM_TEXT); // No limpiar HTML ya que es contenido que puede incluir código.

        // Agrega el campo para subir un Esquema Relacional (imagen).
        $mform->addElement(
            'filepicker',
            'relationschema',
            get_string('relationschema', 'qtype_sqlquestion'),
            null,
            array('accepted_types' => 'image')
        );

        // Agrega el campo Data para código SQL.
        $mform->addElement('textarea', 'data', get_string('data', 'qtype_sqlquestion'), array('rows' => 15, 'cols' => 80));
        $mform->setType('data', PARAM_RAW); // No limpiar HTML.
        $mform->setDefault('data', ' '); // Establece un valor vacio predeterminado.

        // Agregar el campo para la Solución al ejercicio.
        $mform->addElement('textarea', 'solution', get_string('solution', 'qtype_sqlquestion'), array('rows' => 15, 'cols' => 80));
        $mform->setType('solution', PARAM_RAW); // No limpiar HTML.
        $mform->setDefault('solution', ' '); // Establece un valor vacio predeterminado.

    }


    protected function get_more_choices_string()
    {
    }

    protected function data_preprocessing($question)
    {
    }

    public function validation($data, $files)
    {
    }

    public function qtype()
    {
        return 'sqlquestion';
    }
}
