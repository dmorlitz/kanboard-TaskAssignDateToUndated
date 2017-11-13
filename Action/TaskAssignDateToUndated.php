<?php

namespace Kanboard\Plugin\TaskAssignDateToUndated\Action;

use Kanboard\Model\TaskModel;
use Kanboard\Action\Base;

/**
 * Assign a color to a priority
 *
 * @package Kanboard\Action
 * @author  Julien Buratto
 */
class TaskAssignDateToUndated extends Base
{
    /**
     * Get action description
     *
     * @access public
     * @return string
     */
    public function getDescription()
    {
        return t('Automatically add a due date to undated items - to force them to appear on the calendar view');
    }

    /**
     * Get the list of compatible events
     *
     * @access public
     * @return array
     */
    public function getCompatibleEvents()
    {
        return array(
            TaskModel::EVENT_DAILY_CRONJOB,
        );
    }

    /**
     * Get the required parameter for the action
     *
     * @access public
     * @return array
     */
    public function getActionRequiredParameters()
    {
        return array(
        );
    }

    /**
     * Get all tasks
     *
     * @access public
     * @return array
     */

    public function getEventRequiredParameters()
    {
        return array('tasks');
    }

    /**
     * Execute the action (change the task color)
     *
     * @access public
     * @param  array   $data   Event data dictionary
     * @return bool            True if the action was executed or false when not executed
     */
    public function doAction(array $data)
    {
        $results = array();

        foreach ($data['tasks'] as $task) {
            if ( ($task["date_due"] == "0") || ($task["date_due"] == "") || !isset($task["date_due"]) ) {
                $values = array(
                    'id'       => $task['id'],
                    'date_due' => strtotime('now'),
                );
                $results[] = $this->taskModificationModel->update($values, false);
            }
        }

        return in_array(true, $results, true);
    }

    /**
     * Check if the event data meet the action condition
     *
     * @access public
     * @param  array   $data   Event data dictionary
     * @return bool
     */
    public function hasRequiredCondition(array $data)
    {
        return count($data['tasks']) > 0;
    }
}
