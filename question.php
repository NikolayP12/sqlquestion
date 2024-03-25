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

// For a complete list of base question classes please examine the file
// /question/type/questionbase.php.
//
// Make sure to implement all the abstract methods of the base class.

/**
 * Class that represents a sqlquestion question.
 */
class qtype_sqlquestion_question extends question_graded_automatically
{

    public $responseformat;
    public $relatedconcepts;
    public $data;
    public $solution;

    public function get_format_renderer(moodle_page $page)
    {
        return $page->get_renderer('qtype_sqlquestion');
    }

    public function get_expected_data()
    {
        // Este método debe retornar un array describiendo los datos que espera tu pregunta.
        // Por ejemplo, si tu pregunta no espera entrada del usuario (como parece ser el caso),
        // este array puede estar vacío.
        return array();
    }

    public function get_correct_response()
    {
        // Este método debe retornar la respuesta correcta a la pregunta, si es que hay una.
        // Si tu tipo de pregunta no tiene una "respuesta correcta" (como podría ser el caso aquí),
        // puedes simplemente retornar null.
        return null;
    }

    public function is_complete_response(array $response)
    {
        // Este método debe verificar si una respuesta dada a la pregunta está completa.
        // Para un tipo de pregunta que no recoge respuestas, puedes considerar que todas las 
        // "respuestas" están completas, o adaptar la lógica según sea necesario.
        return true;
    }

    public function is_gradable_response(array $response)
    {
        // Similar a is_complete_response, pero para verificar si la respuesta dada
        // puede ser calificada. Para preguntas sin respuesta, puedes retornar false o adaptar.
        return false;
    }

    public function grade_response(array $response)
    {
        // Este método debe retornar una matriz con dos elementos: la fracción (entre 0 y 1)
        // de la nota obtenida, y el estado de la pregunta (por ejemplo, question_state::$gradedright).
        // Para preguntas que no se califican automáticamente, la implementación podría ser trivial.
        return array(0, question_state::$gradedright);
    }

    public function get_validation_error(array $response)
    {
        // Este método debe retornar un string explicando por qué la respuesta dada es inválida,
        // o un string vacío si la respuesta es válida. Para preguntas sin respuestas de usuarios,
        // podría siempre retornar un string vacío.
        return '';
    }
}
