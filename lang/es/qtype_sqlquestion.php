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
 * Plugin strings are defined here.
 *
 * @package     qtype_sqlquestion
 * @category    string
 * @copyright   2024 Nikolay <nikolaypn2002@gmail.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// Name strings
$string['relatedconcepts'] = 'Conceptos Relacionados';
$string['relationalschema'] = 'Relational Schema';
$string['data'] = 'Data';
$string['sqlcheck'] = 'SQL check';
$string['sqlcheckrun'] = 'SQL check run';
$string['code'] = 'Code: Pistas para resolver el ejercicio';
$string['solution'] = 'Solución';
$string['resultdata'] = 'Result Data';
$string['subjectivedifficulty'] = 'Dificultad subjetiva';
$string['objectivedifficulty'] = 'Dificultad objetiva';
$string['decreaseattempt'] = 'Reducción por intento';
$string['mingrade'] = 'Nota mínima obtenible';

// Helpful strings
$string['relatedconcepts_help'] = 'En este campo deben escribirse aquellos conceptos con los que está estrechamente relacionado el ejercicio, y que previamente han sido definidos en el módulo de Base de Datos de Moodle.';
$string['relationalschema_help'] = 'En este campo se almacena el esquema que contextualiza la base de datos para la pregunta. Por ejemplo: CREATE TABLE Libros (...);';
$string['data_help'] = 'En este campo se debe adjuntar el código que debe ser previamente ejecutado para la contextualización de la base de datos para la correcta realización del ejercicio. Por ejemplo: INSERT INTO Libros (ID_Libro, Titulo, Autor) VALUES...';
$string['sqlcheck_help'] = 'Este campo contiene el código que prepara el entorno de la base de datos para probar disparadores. Incluye cualquier configuración o datos necesarios que activen el disparador creado por el alumno, como inserciones o actualizaciones específicas que esperan ser controladas por el disparador.';
$string['sqlcheckrun_help'] = 'Este campo contiene el código que ejecuta las operaciones de prueba para evaluar el funcionamiento del disparador creado por el alumno. Debe incluir consultas o comandos SQL que prueban la lógica del disparador, asegurando que la respuesta del sistema a estas operaciones sea la adecuada y conforme a lo esperado.';
$string['code_help'] = 'En este campo se pueden escribir pistas que pueden consultar los alumnos para poder resolver el ejercicio.';
$string['resultdata_help'] = 'En este campo se debe adjuntar el código que generará las tablas esperadas como solución, como un script sql.  Por ejemplo: SELECT * FROM coches.';
$string['subjectivedifficulty_help'] = 'En este campo se describe la dificultad subjetiva que ha considerado el profesor para el ejercicio.';
$string['objectivedifficulty_help'] = 'En este campo se describe la dificultad objetiva del ejercicio.';
$string['decreaseattempt_help'] = 'Este campo define la reducción que se aplicará a la nota máxima obtenible por el alumno en la pregunta cada vez que ejecute una sentencia.';
$string['mingrade_help'] = 'Este campo define la nota a partir de la cual no se continuará restando al alumno la reducción por intento, por cada sentencia ejecutada. 
Por ejemplo: Si se ha definido una reducción por intento de 0.25, y la nota mínima obtenible es de 3, la nota no podrá reducirse más aunque sigan ejecutandose sentencias.';
$string['solution_help'] = 'En este campo se debe adjuntar la solución en forma de código, como un script sql. Por ejemplo: SELECT * FROM coches.';

// Error strings
$string['error_resultdata_empty'] = 'El campo result data no puede estar vacío.';
$string['error_subjectivedifficulty_empty'] = 'El campo dificultad subjetiva no puede estar vacío.';
$string['error_objectivedifficulty_empty'] = 'El campo dificultad objetiva no puede estar vacío.';
$string['error_decreaseattempt_empty'] = 'El campo de reducción no puede estar vacío.';
$string['error_mingrade_empty'] = 'El campo de nota mínima obtenible no puede estar vacío.';
$string['error_solution_empty'] = 'El campo solución no puede estar vacío.';

// Statement strings
$string['statement_title'] = 'Enunciando del ejercicio:';
$string['statement_concepts'] = 'Conceptos relacionados con el ejercicio:';
$string['statement_relationalschema'] = 'Relational Schema para el ejercicio:';
$string['statement_data'] = 'Script que genera la base de datos:';
$string['statement_sqlcheck'] = 'SQL Check:';
$string['statement_sqlcheckrun'] = 'SQL Check Run:';
$string['statement_code'] = 'Pistas para resolver el ejercicio:';
$string['statement_resultdata'] = 'Result Data para resolver el ejercicio:';
$string['statement_subjectivedifficulty'] = 'Dificultad subjetiva del ejercicio:';
$string['statement_objectivedifficulty'] = 'Dificultad objetiva del ejercicio:';
$string['statement_decreaseattempt'] = 'Reducción por intento del ejercicio:';
$string['statement_mingrade'] = 'Nota mínima obtenible en el ejercicio:';
$string['statement_solution'] = 'Solución del ejercicio:';

// Strings for restoring information
$string['relatedconcepts_no_present'] = 'Conceptos Relacionados no presentes';
$string['relationalschema_no_present'] = 'Relational Schema no presente.';
$string['data_no_present'] = 'Script no presente.';
$string['sqlcheck_no_present'] = 'SQL check no presente.';
$string['sqlcheckrun_no_present'] = 'SQL check run no presente.';
$string['code_no_present'] = 'Pistas no presentes.';
$string['resultdata_no_present'] = 'Result data no presente.';
$string['subjectivedifficulty_no_present'] = 'Dificultad subjetiva no presente.';
$string['objectivedifficulty_no_present'] = 'Dificultad objetiva no presente.';
$string['solution_no_present'] = 'Solución no presente.';

// Plugin information strings
$string['privacy:metadata'] = 'El plugin del tipo de pregunta SQL no almacena ningún dato personal.';
$string['pluginname'] = 'Pregunta SQL';
$string['pluginname_help'] = 'Preguntas SQL que almacenan información para realizar actividades de SQLab.';
$string['pluginname_link'] = 'question/type/sqlquestion.';
$string['pluginnameadding'] = 'Añadir una pregunta SQL.';
$string['pluginnameediting'] = 'Editar una pregunta SQL.';
$string['pluginnamesummary'] = 'En esta pregunta se adjuntarán los elementos necesarios para el plugin SQLab.';
$string['privacy:metadata'] =  'El plugin de tipo de pregunta SQL no utiliza ni almacena información de los alumnos debido a que no la necesita.';
