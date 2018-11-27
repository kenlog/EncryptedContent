<?php

namespace Kanboard\Plugin\EncryptedContent\Model;

use Kanboard\Core\Base;

/**
 * 
 * EncryptedContent model
 * @author  Valentino Pesce
 *
 */
class EncryptedContentModel extends Base 
{
 
    /**
     * Get the table
     *
     * @abstract
     * @access protected
     * @return string
     */
    protected function getTable()
    {
        return 'task_has_encrypted_content';
    }

    /**
     * Define the entity key
     *
     * @access protected
     * @return string
     */
    protected function getEntityKey()
    {
        return 'task_id';
    }

    /**
     * Get all metadata for the entity
     *
     * @access public
     * @param  integer  $entity_id
     * @return array
     */
    public function getAll($entity_id)
    {
        return $this->db
            ->hashtable($this->getTable())
            ->eq($this->getEntityKey(), $entity_id)
            ->asc('name')
            ->getAll('name', 'value');
    }

    /**
     * Get a metadata for the given entity
     *
     * @access public
     * @param  integer  $entity_id
     * @param  string   $name
     * @param  string   $default
     * @return mixed
     */
    public function get($entity_id, $name, $default = '')
    {
        return $this->db
            ->table($this->getTable())
            ->eq($this->getEntityKey(), $entity_id)
            ->eq('name', $name)
            ->findOneColumn('value') ?: $default;
    }

    /**
     * Return true if a metadata exists
     *
     * @access public
     * @param  integer  $entity_id
     * @param  string   $name
     * @return boolean
     */
    public function exists($entity_id, $name)
    {
        return $this->db
            ->table($this->getTable())
            ->eq($this->getEntityKey(), $entity_id)
            ->eq('name', $name)
            ->exists();
    }

    /**
     * Update or insert new metadata
     *
     * @access public
     * @param  integer  $entity_id
     * @param  array    $values
     * @return boolean
     */
    public function save($entity_id, array $values)
    {
        $results = array();
        $user_id = $this->userSession->getId();
        $timestamp = time();

        $this->db->startTransaction();

        foreach ($values as $key => $value) {
            if ($this->exists($entity_id, $key)) {
                $results[] = $this->db->table($this->getTable())
                    ->eq($this->getEntityKey(), $entity_id)
                    ->eq('name', $key)
                    ->update(array(
                        'value' => $value,
                        'changed_on' => $timestamp,
                        'changed_by' => $user_id,
                    ));
            } else {
                $results[] = $this->db->table($this->getTable())->insert(array(
                    'name' => $key,
                    'value' => $value,
                    $this->getEntityKey() => $entity_id,
                    'changed_on' => $timestamp,
                    'changed_by' => $user_id,
                ));
            }
        }

        $this->db->closeTransaction();
        return ! in_array(false, $results, true);
    }

    /**
     * Remove a metadata
     *
     * @access public
     * @param  integer $entity_id
     * @param  string  $name
     * @return bool
     */
    public function remove($entity_id, $name)
    {
        return $this->db->table($this->getTable())
            ->eq($this->getEntityKey(), $entity_id)
            ->eq('name', $name)
            ->remove();
    }
}