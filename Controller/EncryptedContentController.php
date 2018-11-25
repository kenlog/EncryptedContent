<?php

namespace Kanboard\Plugin\EncryptedContent\Controller;

use Kanboard\Controller\BaseController;

/**
 * 
 * @author  Valentino Pesce
 * 
 */
class EncryptedContentController extends BaseController
{

    public function task()
    {
        $project = $this->getProject();
        $task = $this->getTask();

        $metadata = $this->taskMetadataModel->getAll($task['id']);

        $this->response->html($this->helper->layout->task('EncryptedContent:task/metadata', 
                ['title' => t('Encrypted Content'),
                    'task' => $task,
                    'add_form' => true,
                    'project' => $project,
                    'metadata' => $metadata, 
                ]
            )
        );
    }

    public function saveTask()
    {
        $task = $this->getTask();
        $values = $this->request->getValues();
        
        $encrypt = $this->helper->EncryptedContentHelper->EncryptedValue($values['value']);

        $this->taskMetadataModel->save($task['id'], [$values['name'] => $encrypt]);

        return $this->response->redirect($this->helper->url->to('EncryptedContentController', 'task', ['plugin' => 'encryptedContent', 'task_id' => $task['id'], 'project_id' => $task['project_id']]), true);
    }

    public function editTask()
    {
        $project = $this->getProject();
        $task = $this->getTask();
        $name = $this->request->getStringParam('name');
        $metadata = $this->taskMetadataModel->get($task['id'], $name);

        $this->response->html($this->template->render('encryptedContent:task/form', 
                [
                    'project'       => $project,
                    'task'          => $task,
                    'form_headline' => t('Edit Encrypted Content'),
                    'values'        => ['name' => $name, 'value' => $metadata],
                ]
            )
        );
    }

    public function removeTask()
    {
        $task = $this->getTask();
        $name = $this->request->getStringParam('name');

        $this->taskMetadataModel->remove($task['id'], $name);

        return $this->response->redirect($this->helper->url->to('EncryptedContentController', 'task', ['plugin' => 'encryptedContent', 'task_id' => $task['id'], 'project_id' => $task['project_id']]), true);
    }

    public function confirmTask()
    {
        $project = $this->getProject();
        $task = $this->getTask();
        $name = $this->request->getStringParam('name');

        $this->response->html($this->template->render('encryptedContent:task/remove', 
                [
                    'task'    => $task,
                    'project' => $project,
                    'name'    => $name,
                ]
            )
        );
    }
    
}