<?php
declare(strict_types=1);

# use UploadFilesFormComponentService;
use Nette\Http\FileUpload;

/**
 * Class UploadFilesFormComponentFacade
 * @copyright (c) 2022 Rývová
 * @package Fio\Components\UploadFilesForm\Model\Facades
 */
class UploadFilesFormComponentFacade
{
    /**
     * Zavolá metodu servisy pro uložení souboru
     *
     * @param string     $dir
     * @param FileUpload $fileUpload
     *
     * @return void
     */
    public static function saveFile(string $dir, FileUpload $fileUpload): void
    {
      UploadFilesFormComponentService::saveFile($dir, $fileUpload);
    } // saveFile()

    /**
     * Zavolá metodu servisy pro načtení csv souboru do pole
     *
     * @param string $dir
     * @param string $filename
     *
     * @return array
     */
    public static function getCsvFileData(string $dir, string $filename): array
    {
      return UploadFilesFormComponentService::getCsvFileData($dir, $filename);
    } // getCsvFileData()
} // UploadFilesFormComponentFacade
