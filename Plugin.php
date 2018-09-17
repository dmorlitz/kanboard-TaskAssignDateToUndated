<?php
namespace Kanboard\Plugin\TaskAssignDateToUndated;
use Kanboard\Core\Plugin\Base;
use Kanboard\Plugin\TaskAssignDateToUndated\Action\TaskAssignDateToUndated;
class Plugin extends Base
{
    public function initialize()
    {
        $this->actionManager->register(new TaskAssignDateToUndated($this->container));
    }
    public function getPluginName()
    {
        return 'TaskAssignDateToUndated';
    }

    public function getPluginDescription()
    {
        return t('Automatically add a due date to undated tasks - to force them to appear on calendar');
    }

    public function getPluginAuthor()
    {
        return 'David Morlitz';
    }

    public function getPluginVersion()
    {
        return '1.0.0';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/dmorlitz/kanboard-TaskAssignDateToUndated';
    }

    public function getCompatibleVersion()
    {
        return '>=1.0.44';
    }
}
