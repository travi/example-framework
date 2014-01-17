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

    function add($entity)
    {
        // TODO: Implement add() method.
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

    function updateById($id, $entity)
    {
        // TODO: Implement updateById() method.
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