<?php

defined('MOODLE_INTERNAL') || die();

class restore_qtype_sqlquestion_plugin extends restore_qtype_plugin
{

    protected function define_question_plugin_structure()
    {
        return array(
            new restore_path_element('sqlquestion', $this->get_pathfor('/sqlquestion'))
        );
    }

    public function process_sqlquestion($data)
    {
        global $DB;

        $data = (object)$data;
        $oldid = $data->id;

        // Asegura que los campos 'data', instructions y 'solution' tengan valores por defecto si son nulos o no están definidos.
        if (!isset($data->data) || is_null($data->data)) {
            $data->data = get_string('data_no_present', 'qtype_sqlquestion'); // Establece un valor predeterminado adecuado para 'data'.
        }
        if (!isset($data->instructions) || is_null($data->instructions)) {
            $data->instructions = get_string('intructions_no_present', 'qtype_sqlquestion'); // Establece un valor predeterminado adecuado para 'instructions'.
        }
        if (!isset($data->solution) || is_null($data->solution)) {
            $data->solution = get_string('solution_no_present', 'qtype_sqlquestion');; // Establece un valor predeterminado adecuado para 'solution'.
        }

        // Detecta si la pregunta fue creada o mapeada durante la restauración.
        $questioncreated = $this->get_mappingid('question_created', $this->get_old_parentid('question')) ? true : false;

        // Si la pregunta fue creada durante la restauración, necesitamos crear
        // su correspondiente registro en qtype_sqlquestion_options también.
        if ($questioncreated) {
            $data->questionid = $this->get_new_parentid('question');
            $newitemid = $DB->insert_record('qtype_sqlquestion_options', $data);
            $this->set_mapping('qtype_sqlquestion', $oldid, $newitemid);
        }
    }

    public static function define_decode_contents()
    {
        return array(

            // Si tuvieramos almacenamiento de texto que podría contener enlaces a archivos se tendria que desarrollar.
        );
    }

    protected function after_execute_question()
    {
        global $DB;

        // Este método podría ser necesario si el tipo de pregunta tiene opciones o configuraciones
        // predeterminadas que deben aplicarse a preguntas restauradas que no incluyen detalles explícitos
        // de esas opciones.
    }
}
