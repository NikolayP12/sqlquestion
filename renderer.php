<?php

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

        // Displays the data section, typically containing SQL code.
        $output .= html_writer::tag('h3', get_string('statement_data', 'qtype_sqlquestion'), array('class' => 'sqlquestion_heading'));
        // Use of <pre> to preserve formatting of the code.
        $output .= html_writer::tag('pre', s($question->data), array('class' => 'sqlquestion_data'));

        // Displays the hint for solving the question.
        $output .= html_writer::tag('h3', get_string('statement_hint', 'qtype_sqlquestion'), array('class' => 'sqlquestion_heading'));
        $output .= html_writer::tag('div', format_text($question->hint), array('class' => 'sqlquestion_hint'));

        // Displays the resultdata for solving the question.
        $output .= html_writer::tag('h3', get_string('statement_resultdata', 'qtype_sqlquestion'), array('class' => 'sqlquestion_heading'));
        $output .= html_writer::tag('div', format_text($question->resultdata), array('class' => 'sqlquestion_resultdata'));

        // Displays the subjectivedifficulty for solving the question.
        $output .= html_writer::tag('h3', get_string('statement_subjectivedifficulty', 'qtype_sqlquestion'), array('class' => 'sqlquestion_heading'));
        $output .= html_writer::tag('div', format_text($question->subjectivedifficulty), array('class' => 'sqlquestion_subjectivedifficulty'));

        // Displays the objectivedifficulty for solving the question.
        $output .= html_writer::tag('h3', get_string('statement_objectivedifficulty', 'qtype_sqlquestion'), array('class' => 'sqlquestion_heading'));
        $output .= html_writer::tag('div', format_text($question->objectivedifficulty), array('class' => 'sqlquestion_objectivedifficulty'));

        // Displays the solution.
        $output .= html_writer::tag('h3', get_string('statement_solution', 'qtype_sqlquestion'), array('class' => 'sqlquestion_heading'));
        $output .= html_writer::tag('div', format_text($question->solution), array('class' => 'sqlquestion_solution'));

        return $output;
    }
}
