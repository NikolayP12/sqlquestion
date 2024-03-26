<?php

defined('MOODLE_INTERNAL') || die();

class qtype_sqlquestion_renderer extends qtype_renderer
{

    public function formulation_and_controls(question_attempt $qa, question_display_options $options)
    {

        $question = $qa->get_question();
        $output = '';
        // Para la presentación del enunciado en la visualización de las preguntas del ejercicio.
        $output .= html_writer::tag('h3', 'Enunciado del ejercicio:', array('class' => 'sqlquestion_heading'));
        $output .= html_writer::tag('div', $question->format_questiontext($qa), array('class' => 'qtext'));
        if (!empty($question->relatedconcepts)) {
            $output .= html_writer::tag('h3', 'Conceptos relacionados:', array('class' => 'sqlquestion_heading'));
            $output .= html_writer::tag('div', format_text($question->relatedconcepts), array('class' => 'sqlquestion_relatedconcepts'));
        }

        $output .= html_writer::tag('h3', 'Script de creación de la base de datos:', array('class' => 'sqlquestion_heading'));
        // El uso de pre es para conservar la forma del codigo.
        // El uso de s() en lugar de formmat asegura que cualquier carácter especial en el script (como < o >) se escape correctamente y no se interprete como HTML.
        $output .= html_writer::tag('pre', s($question->data), array('class' => 'sqlquestion_data'));
        $output .= html_writer::tag('h3', 'Solución del ejercicio:', array('class' => 'sqlquestion_heading'));
        $output .= html_writer::tag('div', format_text($question->solution), array('class' => 'sqlquestion_solution'));

        return $output;
    }
}
