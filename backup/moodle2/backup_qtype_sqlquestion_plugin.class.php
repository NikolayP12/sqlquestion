<?php

defined('MOODLE_INTERNAL') || die();

class backup_qtype_sqlquestion_plugin extends backup_qtype_plugin
{

    /**
     * Returns the qtype information to attach to question element.
     */
    protected function define_question_plugin_structure()
    {

        // Define el elemento virtual del plugin con la condición a cumplir.
        $plugin = $this->get_plugin_element(null, '../../qtype', 'sqlquestion');

        // Crea un elemento del plugin con nombre estándar (el contenedor visible).
        $pluginwrapper = new backup_nested_element($this->get_recommended_name());

        // Conecta el contenedor visible lo antes posible.
        $plugin->add_child($pluginwrapper);

        // Ahora crea las estructuras propias del qtype.
        $sqlquestion = new backup_nested_element('sqlquestion', array('id'), array(
            'relatedconcepts', 'data', 'instructions', 'solution'
        ));

        // Ahora el árbol propio del qtype.
        $pluginwrapper->add_child($sqlquestion);

        // Establece la fuente para poblar los datos.
        $sqlquestion->set_source_table(
            'qtype_sqlquestion_options',
            array('questionid' => backup::VAR_PARENTID)
        );

        return $plugin;
    }

    /**
     * Si tu tipo de pregunta maneja archivos específicos, necesitarías definir aquí las áreas de archivo.
     */
    public static function get_qtype_fileareas()
    {
        return array();
    }
}
