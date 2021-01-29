<?php 

namespace Hospital\Controller;

use Hospital\Form\HospitalForm;
use Hospital\Model\Hospital;
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
        $form = new HospitalForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();

        if(! $request->isPost()){
            return ['form' => $form];
        }

        $hospital = new Hospital();
        $form->setInputFilter($hospital->getInputFilter());
        $form->setData($request->getPost());

        if(! $form->isValid()){
            return ['form' => $form];
        }

        $hospital->exangeArray($form->getData());
        $this->table->saveHospital($hospital);
        return $this->redirect()->toRoute('hospital');

    }

    public function editAction()
    {

    }

    public function deleteAction()
    {

    }
}