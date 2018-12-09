<?php

namespace StudyMage\Swapi\Controller\Adminhtml\Film;

class Delete extends \Magento\Backend\App\Action
{  
    const ADMIN_RESOURCE = 'StudyMage_Swapi::edit';
    
    /**
     * @var \StudyMage\Swapi\Model\FilmRepository
     */
    protected $objectRepository;

    /**
     * Delete constructor.
     * @param \StudyMage\Swapi\Model\FilmRepository $objectRepository
     * @param \Magento\Backend\App\Action\Context $context
     */
    public function __construct(
        \StudyMage\Swapi\Model\FilmRepository $objectRepository,
        \Magento\Backend\App\Action\Context $context
    ) {
        $this->objectRepository = $objectRepository;

        parent::__construct($context);
    }
          
    public function execute()
    {
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('film_id');
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id) {
            try {
                // delete model
                $this->objectRepository->deleteById($id);
                // display success message
                $this->messageManager->addSuccess(__('You have deleted the object.'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addError($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['film_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addError(__('We can not find an object to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
        
    }    
    
}
