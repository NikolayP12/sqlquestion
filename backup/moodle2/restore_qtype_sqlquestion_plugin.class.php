<?php

defined('MOODLE_INTERNAL') || die();

/**
 * Handles the restore process for the sqlquestion question type.
 *
 * This class extends the generic restore question type plugin class and specifies
 * how the sqlquestion type data should be restored from the backup files.
 */
class restore_qtype_sqlquestion_plugin extends restore_qtype_plugin
{

    /**
     * Defines the restore structure for the sqlquestion question type.
     *
     * This method specifies the paths to be handled during the restore process
     * and what to do when processing those paths. It effectively maps the XML paths
     * in the backup files to the corresponding process functions.
     *
     * @return array The array of restore_path_element objects.
     */
    protected function define_question_plugin_structure()
    {
        return array(
            new restore_path_element('sqlquestion', $this->get_pathfor('/sqlquestion'))
        );
    }

    /**
     * Process an sqlquestion element during the restore.
     *
     * This method is called when the restore_path_element defined in
     * define_question_plugin_structure() is being processed. It handles the
     * restoration of the sqlquestion question type specific settings from the
     * backup files to the database.
     *
     * @param mixed $data The data obtained from the backup file.
     */
    public function process_sqlquestion($data)
    {
        global $DB;

        $data = (object)$data;
        $oldid = $data->id;

        // Ensures that 'data', 'hint', and 'solution' fields have default values if they are null or not set.
        $data->data = $data->data ?? get_string('data_no_present', 'qtype_sqlquestion');
        $data->hint = $data->hint ?? get_string('hint_no_present', 'qtype_sqlquestion');
        $data->solution = $data->solution ?? get_string('solution_no_present', 'qtype_sqlquestion');

        // Checks whether the question was created or mapped during restoration.
        $questioncreated = $this->get_mappingid('question_created', $this->get_old_parentid('question')) ? true : false;

        // If the question was created during restoration, its corresponding record in
        // qtype_sqlquestion_options also needs to be created.
        if ($questioncreated) {
            $data->questionid = $this->get_new_parentid('question');
            $newitemid = $DB->insert_record('qtype_sqlquestion_options', $data);
            $this->set_mapping('qtype_sqlquestion', $oldid, $newitemid);
        }
    }

    /**
     * Defines the contents that should be decoded from the backup format.
     *
     * If the question type stored text that might contain links to files
     * (e.g., images or media), this is where you'd specify how to handle them.
     * For the sqlquestion type, this is not necessary unless it stores such content.
     *
     * @return array The array of decode_content objects.
     */
    public static function define_decode_contents()
    {
        return array();
    }

    /**
     * Custom operations after the question has been restored.
     *
     * This method can be used if the question type has default options or settings
     * that need to be applied to restored questions that don't include explicit details
     * of those options.
     */
    protected function after_execute_question()
    {
        // Implement any post-restore actions here.
    }
}
