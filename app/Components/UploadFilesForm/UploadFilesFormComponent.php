<?php
declare(strict_types=1);

use App\Presenters\HomepagePresenter;
use Nette\Application\UI\Control;
use Nette\Application\UI\Form;
use Nette\Http\FileUpload;

/**
 * Class UploadFilesFormComponentFactory
 * @copyright (c) 2022 Rývová
 */
class UploadFilesFormComponent extends Control
{
    /**
     *  Uloží soubory uploadnuté ve formuláři
     *
     * @var
     */
    public $onSave;

    /**
     * Fasáda pro komponentu
     *
     * @var UploadFilesFormComponentFacade
     */
    private UploadFilesFormComponentFacade $uploadFilesFormComponentFacade;

    public function __construct(UploadFilesFormComponentFacade $uploadFilesFormComponentFacade)
    {
        $this->uploadFilesFormComponentFacade = $uploadFilesFormComponentFacade;
    } // __construct()

    /**
     * Vykreslí formulář
     */
    public function render(): void
    {
        $this->template->setFile(__DIR__ . '/templates/default.latte');
        $this->template->render();
    } // render()

    /**
     * Načte uploadnuté soubory
     *
     * @param Form $form
     * @param array{'files': array{0: FileUpload, 1: FileUpload}} $values
     *
     * @return void
     */
    public function saveFiles(Form $form, array $values): void
    {
        $uploadDir = $this->getPresenter()->uploadDir;

        foreach ($values['files'] as $fileUpload)
        {
            // kontrola úspěšného nahrání souboru a že nám tam někdo místo csvéčka nepodstrčil něco jiného
            if (($fileUpload->error !== 0)  || ($fileUpload->size === 0) || ($fileUpload->contentType !== 'text/csv'))
            {
               continue;
            }

            if ($fileUpload->name === 'oscar_age_male.csv')
            {
                $this->uploadFilesFormComponentFacade::saveFile($uploadDir, $fileUpload);
            }

            if ($fileUpload->name === 'oscar_age_female.csv')
            {
              $this->uploadFilesFormComponentFacade::saveFile($uploadDir, $fileUpload);
            }
        }

        $this->onSave($this, $values);
  }

  public function actionShowData(): void
  {
      $uploadDir = $this->getPresenter()->appDir . '/../upload/';
      $csvData = [];
      $csvData['male'] =
          $this->uploadFilesFormComponentFacade::getCsvFileData(
              $uploadDir,
              'oscar_age_male.csv'
          );


      $this->template->setFile(__DIR__ . '/templates/showData.latte');
      $this->template->setParameters( $csvData);
      $this->template->render();
  }


  public function renderShowData(): void
  {
      $uploadDir = $this->getPresenter()->appDir . '/../upload/';
      $csvData = [];
      $csvData['male'] =
          $this->uploadFilesFormComponentFacade::getCsvFileData(
              $uploadDir,
              'oscar_age_male.csv'
          );

      $this->template->setFile(__DIR__ . '/templates/showData.latte');
      $this->template->setParameters( $csvData);
      $this->template->render();
  }

    /**
     * Vytvoří komponentu formuláře
     *
     * @return Form
     */
    protected function createComponentUploadFilesForm(): Form
    {
        $form = new Form();

        // přidáme prvky do formuláře
        $form
            ->addMultiUpload('files', 'Vyberte 2 csv soubory:')
            ->setHtmlAttribute('class', 'form-control')
            ->addRule($form::MIN_LENGTH, 'Musíte nahrát %d soubory', 2)
            ->addRule(Form::MIME_TYPE, 'Dokumentz musí být ve formátu csv', ['text/csv']);

        $form
            ->addSubmit('send', 'Nahrát')
            ->setHtmlAttribute('class', 'btn btn-primary mb-3');

        $form->onSuccess[] = [$this, 'saveFiles'];
        $form->addProtection('');

        return $form;
    } // createComponentUploadFilesForm()
} // UploadFilesFormComponent
