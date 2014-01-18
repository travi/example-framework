<?php

use travi\framework\model\CrudModel;

/**
 * Class EntityModel
 * @PdInject db method:setDb
 * @PdInject new:EntityMapper method:setMapper
 */
class EntityModel extends CrudModel
{
    /** @var  EntityMapper */
    protected $mapper;

    /**
     * @param $entity Entity
     * @return string
     */
    function add($entity)
    {
        $stmt = $this->db->prepare(
            "INSERT INTO
                entities
            SET
                title = :title,
                content = :content"
        );

        $stmt->execute(
            array(
                ':title' => $entity->getTitle(),
                ':content' => $entity->getContent()
            )
        );

        return $this->db->lastInsertId();
    }

    function getById($id)
    {
        $query = "
            SELECT
                id,
                title,
                content
            FROM
                entities
            WHERE
                id = :id";

        $stmt = $this->db->prepare($query);

        $stmt->execute(
            array(
                ':id' => $id
            )
        );

        return $this->mapper->mapFromDb($stmt->fetch());
    }

    /**
     * @param $id
     * @param $entity Entity
     */
    function updateById($id, $entity)
    {
        $query = "
            UPDATE
                entities
            SET
                title = :title,
                content = :content
            WHERE
                id = :id";

        $stmt = $this->db->prepare($query);

        $stmt->execute(
            array(
                ':id' => $id,
                ':title' => $entity->getTitle(),
                ':content' => $entity->getContent()
            )
        );
    }

    function getList($filters = array())
    {
        $query = "
            SELECT
                id,
                title,
                content
            FROM
                entities";

        $stmt = $this->db->prepare($query);

        $stmt->execute();

        return $this->mapper->mapListFromDb($stmt->fetchAll());

    }

    function deleteById($id)
    {
        // TODO: Implement deleteById() method.
    }
}