<?php

use Phalcon\Tag,
    Phalcon\Mvc\Model\Criteria,
    Phalcon\Paginator\Adapter\Model as Paginator;

class WaypointsController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for waypoints
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Waypoints", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
            if ($numberPage <= 0) {
                $numberPage = 1;
            }
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "id";

        $waypoints = Waypoints::find($parameters);
        if (count($waypoints) == 0) {
            $this->flash->notice("The search did not find any waypoints");
            return $this->dispatcher->forward(array(
                "controller" => "waypoints",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $waypoints,
            "limit"=> 10,
            "page" => $numberPage
        ));

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displayes the creation form
     */
    public function newAction()
    {

    }

    /**
     * Edits a waypoint
     *
     * @param string $id
     */
    public function editAction($id)
    {

        if (!$this->request->isPost()) {

            $waypoint = Waypoints::findFirstById($id);
            if (!$waypoint) {
                $this->flash->error("waypoint was not found");
                return $this->dispatcher->forward(array(
                    "controller" => "waypoints",
                    "action" => "index"
                ));
            }

            $this->view->id = $waypoint->id;

            Tag::setDefault("id", $waypoint->id);
            Tag::setDefault("name", $waypoint->name);
            Tag::setDefault("location", $waypoint->location);
            Tag::setDefault("latitude", $waypoint->latitude);
            Tag::setDefault("longitude", $waypoint->longitude);
            Tag::setDefault("deliveryMap", $waypoint->deliveryMap);
            Tag::setDefault("serviceTime", $waypoint->serviceTime);
            Tag::setDefault("timeWindows", $waypoint->timeWindows);
            Tag::setDefault("priority", $waypoint->priority);
            Tag::setDefault("status", $waypoint->status);
            Tag::setDefault("created", $waypoint->created);
            Tag::setDefault("modified", $waypoint->modified);
            
        }
    }

    /**
     * Creates a new waypoint
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "waypoints",
                "action" => "index"
            ));
        }

        $waypoint = new Waypoints();

        $waypoint->id = $this->request->getPost("id");
        $waypoint->name = $this->request->getPost("name");
        $waypoint->location = $this->request->getPost("location");
        $waypoint->latitude = $this->request->getPost("latitude");
        $waypoint->longitude = $this->request->getPost("longitude");
        $waypoint->deliveryMap = $this->request->getPost("deliveryMap");
        $waypoint->serviceTime = $this->request->getPost("serviceTime");
        $waypoint->timeWindows = $this->request->getPost("timeWindows");
        $waypoint->priority = $this->request->getPost("priority");
        $waypoint->status = $this->request->getPost("status");
        $waypoint->created = $this->request->getPost("created");
        $waypoint->modified = $this->request->getPost("modified");
        

        if (!$waypoint->save()) {
            foreach ($waypoint->getMessages() as $message) {
                $this->flash->error($message);
            }
            return $this->dispatcher->forward(array(
                "controller" => "waypoints",
                "action" => "new"
            ));
        }

        $this->flash->success("waypoint was created successfully");
        return $this->dispatcher->forward(array(
            "controller" => "waypoints",
            "action" => "index"
        ));

    }

    /**
     * Saves a waypoint edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "waypoints",
                "action" => "index"
            ));
        }

        $id = $this->request->getPost("id");

        $waypoint = Waypoints::findFirstByid($id);
        if (!$waypoint) {
            $this->flash->error("waypoint does not exist " . $id);
            return $this->dispatcher->forward(array(
                "controller" => "waypoints",
                "action" => "index"
            ));
        }

        $waypoint->id = $this->request->getPost("id");
        $waypoint->name = $this->request->getPost("name");
        $waypoint->location = $this->request->getPost("location");
        $waypoint->latitude = $this->request->getPost("latitude");
        $waypoint->longitude = $this->request->getPost("longitude");
        $waypoint->deliveryMap = $this->request->getPost("deliveryMap");
        $waypoint->serviceTime = $this->request->getPost("serviceTime");
        $waypoint->timeWindows = $this->request->getPost("timeWindows");
        $waypoint->priority = $this->request->getPost("priority");
        $waypoint->status = $this->request->getPost("status");
        $waypoint->created = $this->request->getPost("created");
        $waypoint->modified = $this->request->getPost("modified");
        

        if (!$waypoint->save()) {

            foreach ($waypoint->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "waypoints",
                "action" => "edit",
                "params" => array($waypoint->id)
            ));
        }

        $this->flash->success("waypoint was updated successfully");
        return $this->dispatcher->forward(array(
            "controller" => "waypoints",
            "action" => "index"
        ));

    }

    /**
     * Deletes a waypoint
     *
     * @param string $id
     */
    public function deleteAction($id)
    {

        $waypoint = Waypoints::findFirstByid($id);
        if (!$waypoint) {
            $this->flash->error("waypoint was not found");
            return $this->dispatcher->forward(array(
                "controller" => "waypoints",
                "action" => "index"
            ));
        }

        if (!$waypoint->delete()) {

            foreach ($waypoint->getMessages() as $message){
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "waypoints",
                "action" => "search"
            ));
        }

        $this->flash->success("waypoint was deleted successfully");
        return $this->dispatcher->forward(array(
            "controller" => "waypoints",
            "action" => "index"
        ));
    }

}
