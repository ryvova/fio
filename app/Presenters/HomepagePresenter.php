<?php

declare(strict_types=1);

namespace App\Presenters;

use Data\Oscars;
use IUploadFilesFormComponentFactory;
use UploadFilesFormComponent;
use Nette;
use UploadFilesFormComponentFacade;

/**
 * Class HomepagePresenter
 * @copyright (c) 2022 Rývová
 * @package App\Presenters
 */
class HomepagePresenter extends Nette\Application\UI\Presenter
{
    /**
     * Adresář, kam se uploadnou soubory
     *
     * @var String
     */
    public string $uploadDir;

    /**
     * Továrna pro vytvoření komponenty formuláře pro nahrání souborů
     *
     * @var IUploadFilesFormComponentFactory
     */
    private IUploadFilesFormComponentFactory $uploadFilesFormComponentFactory;

    /**
     * Vytvoří novou instanci presenteru
     */
    public function __construct(String $uploadDir, IUploadFilesFormComponentFactory $uploadFilesFormComponentFactory)
    {
        parent::__construct();

        $this->uploadDir = $uploadDir;
        $this->uploadFilesFormComponentFactory = $uploadFilesFormComponentFactory;
    } // __construct()

    /**
     * Vytvoří komponentu s formulářem pro načtení souborů
     *
     * @return UploadFilesFormComponent
     */
    protected function createComponentUploadFilesForm(): UploadFilesFormComponent
    {
        $component = $this->uploadFilesFormComponentFactory->create();

        $component->onSave[] = function (UploadFilesFormComponent $component, $data) {
            $this->redirect('showData');
        };

        return $component;
    } // createComponentUploadFilesForm

    public function actionShowData()
    {
     //   $uploadDir = $this->appDir . '/../upload/';

       /* $csvData =
            [
                'male' => UploadFilesFormComponentFacade::getCsvFileData($uploadDir, 'oscar-age-male.csv'),
                'female' => UploadFilesFormComponentFacade::getCsvFileData($uploadDir, 'oscar-age-female.csv')
            ]; */

     //   dump($csvData);

        $maleOscars = UploadFilesFormComponentFacade::getCsvFileData($this->uploadDir, 'oscar-age-male.csv');
        $femaleOscars = UploadFilesFormComponentFacade::getCsvFileData($this->uploadDir, 'oscar-age-female.csv');

        $oscars = new Oscars($maleOscars, $femaleOscars);

        $this->template->setFile(__DIR__ . '/templates/Homepage/showData.latte');
        $this->template->oscars = $oscars;
    }
}
