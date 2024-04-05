<?php

defined('MOODLE_INTERNAL') || die();

/**
 * Handles the backup process for the sqlquestion question type.
 *
 * This class extends the generic backup question type plugin class and specifies
 * how the sqlquestion type data should be included in the backup files.
 */
class backup_qtype_sqlquestion_plugin extends backup_qtype_plugin
{

    /**
     * Defines the backup structure for the sqlquestion question type.
     *
     * This method specifies the XML structure to be used for backing up
     * question-specific settings and user data associated with this question type.
     * It includes information such as related concepts, data, hint, and solution.
     *
     * @return backup_plugin_element The root element of the question type plugin structure.
     */
    protected function define_question_plugin_structure()
    {

        // Defines the root element representing this question type in the backup file.
        $plugin = $this->get_plugin_element(null, '../../qtype', 'sqlquestion');

        // Defines a wrapper element as a visible container for the question type settings.
        $pluginwrapper = new backup_nested_element($this->get_recommended_name());

        // Connects the wrapper element to the plugin root element.
        $plugin->add_child($pluginwrapper);

        // Defines the nested element for the sqlquestion settings, specifying which fields to include.
        $sqlquestion = new backup_nested_element('sqlquestion', array('id'), array(
            'relatedconcepts', 'data', 'hint', 'resultdata', 'subjectivedifficulty', 'objectivedifficulty', 'solution'
        ));

        // Attaches the sqlquestion element to the wrapper.
        $pluginwrapper->add_child($sqlquestion);

        // Sets the data source for the sqlquestion settings, using the question id to find the corresponding data.
        $sqlquestion->set_source_table(
            'qtype_sqlquestion_options',
            array('questionid' => backup::VAR_PARENTID)
        );

        // Returns the root element of the plugin structure to be added to the backup file.
        return $plugin;
    }

    /**
     * Defines the file areas related to the sqlquestion question type.
     *
     * If your question type includes file areas (e.g., for storing images or other files),
     * you should list them here. This example does not define any file areas.
     *
     * @return array The list of file areas.
     */
    public static function get_qtype_fileareas()
    {
        return array();
    }
}
