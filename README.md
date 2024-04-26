# SQLab question

## Instalation of the plugin sqlquestion

The plugin needs to be installed by putting the contents of this directory to

    {your/moodle/dirroot}/question/type/

Afterwards, log in to your Moodle site as an admin and go to \_Site administration >
\_Notifications to complete the installation.

## Instalation of the personalized quiz module

This plugin should replace the existing quiz plugin in your Moodle installation directory.
The location is:

    {your/moodle/dirroot}/mod/quiz

Download it from:

    <https://github.com/NikolayP12/quiz.git>

Moodle will not detect any changes because only an id field will have been added
in the questionnaire configuration section.

## License

2024 Nikolay <nikolaypn2002@gmail.com>

This program is free software: you can redistribute it and/or modify it under
the terms of the GNU General Public License as published by the Free Software
Foundation, either version 3 of the License, or (at your option) any later
version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY
WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program.
If not, see <https://www.gnu.org/licenses/>.

## Purpose

The purpose of this "question type" plugin is to be used to create a bank of questions for the "SQLab" plugin.
These questions will be retrieved by the "SQLab" plugin from the id of the questionnaire to which
the created questions are associated.
In order to know the id of the questionnaires it is necessary to follow the steps of installation
of the custom questionnaire module, as explained above. The id of the questionnaire can be identified
in the configuration section of the created quiz, under the field that contains the quiz name,
the field can be found as "Quiz id".

## Configuration and Usage

Once the plugin is installed, you can start creating a SQLab question from the question bank.
Go to your _Course > Question bank_ and select the option to create a new question.
Choose 'SQLab question' from the list of question types.

Once you have started creating a new question you will have to enter information at least within the fields
specified as mandatory, the mandatory fields are marked and all have a help element with additional information
on what their purpose is.

When creating a SQLab question, you'll encounter the following fields:

- **Related Concepts**: In this field can be written those concepts to which the exercise is closely related, and that have been previously defined in the Moodle Database modules.

- **Relational Schema**: In this field is stored the schema that contextualize the database for the question.

- **Data**: In this field you can attach the code that must be previously executed for the contextualization of the database for the correct execution of the exercise.

- **SQL check**: In this field you can attach the code that prepares the database environment for testing the trigger. It includes any setups or data necessary to activate the trigger created by the student, such as specific insertions or updates that are expected to be controlled by the trigger.

- **SQL check run**: In this field you can attach the code that executes test operations to evaluate the performance of the trigger created by the student. It should include queries or SQL commands that test the logic of the trigger, ensuring that the system response to these operations is appropriate and as expected.

- **Code**: In this field can be written hints that can be consulted by the students in order to solve the exercise.

- **Result Data**: In this field you must attach the code that will generate the expected tables as a solution, as a sql script.

- **Subjective Difficulty**: In this field is described the subjective difficulty that the teacher has considered for the exercise.

- **Objective Difficulty**: In this field is described the objective difficulty of the exercise.

- **Decrease Attempt**: This field defines the reduction that will be applied to the maximum grade obtainable by the student in a question, each time the student executes a statement.

- **Min Grade**: This field defines the grade from which the reduction per attempt will not continue to be subtracted from the student, for each executed sentence.

- **Solution**: In this field you must attach the solution in code form, as a sql script. It has to be added as a SQL script.

## Support

For questions or issues regarding the SQLab question type, please send an email to the plugin maintainer at nikolaypn2002@gmail.com.
