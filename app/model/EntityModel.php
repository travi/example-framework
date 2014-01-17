<?php

use travi\framework\model\CrudModel;

class EntityModel extends CrudModel {

    private $entities;

    function __construct()
    {
        $entity1 = new Entity();
        $entity1->setId(1);
        $entity1->setTitle('Example Entity');
        $entity1->setContent(
            "<p> well, do you have anything to say for yourself? this is the ak-47 assault rifle, the preferred weapon
            of your enemy; and it makes a distinctive sound when fired at you, so remember it. i did the same thing to
            gandhi, he didn't eat for three weeks. cities fall but they are rebuilt. heroes die but they are remembered.
            rehabilitated? well, now let me see. you know, i don't have any idea what that means. man's gotta know his
            limitations. bruce... i'm god. you want a guarantee, buy a toaster. let me tell you something my friend.
            hope is a dangerous thing. hope can drive a man insane. when a naked man's chasing a woman through an alley
            with a butcher knife and a hard-on, i figure he's not out collecting for the red cross. you measure yourself
            by the people who measure themselves by you. this is my gun, clyde! </p>"
        );

        $entity2 = new Entity();
        $entity2->setId(2);
        $entity2->setTitle('Another Example');
        $entity2->setContent(
            "<p> no, this is mount everest. you should flip on the discovery channel from time to time. but i guess you
            can't now, being dead and all. boxing is about respect. getting it for yourself, and taking it away from the
            other guy. don't p!ss down my back and tell me it's raining. i don't think they tried to market it to the
            billionaire, spelunking, base-jumping crowd. what you have to ask yourself is, do i feel lucky. well do ya'
            punk? dyin' ain't much of a livin', boy. that tall drink of water with the silver spoon up his ass. i now
            issue a new commandment: thou shalt do the dance. you see, in this world there's two kinds of people, my
            friend: those with loaded guns and those who dig. you dig. are you feeling lucky punk circumstances have
            taught me that a man's ethics are the only possessions he will take beyond the grave. here. put that in your
            report!' and 'i may have found a way out of here. </p>"
        );

        $this->entities = array(
            $entity1,
            $entity2
        );
    }


    function add($entity)
    {
        // TODO: Implement add() method.
    }

    function getById($id)
    {
        return $this->entities[$id - 1];
    }

    function updateById($id, $entity)
    {
        // TODO: Implement updateById() method.
    }

    function getList($filters = array())
    {
        return $this->entities;
    }

    function deleteById($id)
    {
        // TODO: Implement deleteById() method.
    }
}