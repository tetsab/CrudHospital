<?php 

namespace Hospital\Controller;

use Hospital\Form\HospitalForm;
use Hospital\MOdel\Hospital;
use Hospital\Model\HospitalTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class HospitalController extends AbstractActionController
{
    private $table;

    public function __construct(HospitalTable $table)
    {
        $this->table = $table;
    }

    public function indexAction()
    {
        return new ViewModel([
            'hospitals' => $this->table->fetchAll(),
        ]);
    }

    public function addAction()
    {

    }

    public function editAction()
    {

    }

    public function deleteAction()
    {

    }
}