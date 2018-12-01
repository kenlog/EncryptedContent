<?php

namespace Kanboard\Plugin\EncryptedContent\Controller;

use Kanboard\Controller\BaseController;
use Kanboard\Plugin\EncryptedContent\Model\EncryptedContentModel;

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

        $metadata = $this->encryptedContentModel->getAll($task['id']);

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
        
        if ($this->request->isHTTPS()) {
            $encrypt = $this->helper->EncryptedContentHelper->EncryptedValue($values['value']);
            $this->encryptedContentModel->save($task['id'], [$encrypt]);
            $this->flash->success(t('Content created successfully'));
        } else {
            $this->flash->failure(t('Error required the use of HTTPS'));
        }

        return $this->response->redirect($this->helper->url->to('EncryptedContentController', 'task', ['plugin' => 'encryptedContent', 'task_id' => $task['id'], 'project_id' => $task['project_id']]), true);
    }

    public function updateTask()
    {
        $task = $this->getTask();
        $values = $this->request->getValues();

        if ($this->request->isHTTPS()) {
            $encrypt = $this->helper->EncryptedContentHelper->EncryptedValue($values['value']);
            $this->encryptedContentModel->save($task['id'], [$values['name'] => $encrypt]);
            $this->flash->success(t('Content updated successfully'));
        } else {
            $this->flash->failure(t('Error required the use of HTTPS'));
        }

        return $this->response->redirect($this->helper->url->to('EncryptedContentController', 'task', ['plugin' => 'encryptedContent', 'task_id' => $task['id'], 'project_id' => $task['project_id']]), true);
    }

    public function editTask()
    {
        $project = $this->getProject();
        $task = $this->getTask();
        $name = $this->request->getStringParam('name');
        $metadata = $this->encryptedContentModel->get($task['id'], $name);

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

        if ($this->encryptedContentModel->remove($task['id'], $name)) {
            $this->flash->success(t('Content removed successfully'));
        } else {
            $this->flash->failure(t('Unable to remove'));
        }

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

    public function removeAllTask()
    {
        $task = $this->getTask();

        if ($this->encryptedContentModel->removeAll($task['id'])) {
            $this->flash->success(t('Content removed successfully'));
        } else {
            $this->flash->failure(t('Unable to remove'));
        }

        return $this->response->redirect($this->helper->url->to('EncryptedContentController', 'task', ['plugin' => 'encryptedContent', 'task_id' => $task['id'], 'project_id' => $task['project_id']]), true);
    }

    public function confirmAllTask()
    {
        $project = $this->getProject();
        $task = $this->getTask();

        $this->response->html($this->template->render('encryptedContent:task/removeall', 
                [
                    'task'    => $task,
                    'project' => $project,
                ]
            )
        );
    }

    public function randomKey()
    {
        $project = $this->getProject();
        $task = $this->getTask();

        $this->response->html($this->template->render('encryptedContent:task/randomkey', 
                [
                    'task'    => $task,
                    'project' => $project,
                ]
            )
        );
    }

}