<?php
declare(strict_types=1);

use Data\Oscar;
use Nette\Http\FileUpload;

/**
 * Class UploadFilesFormComponentService
 * @copyright (c) 2022 Rývová
 */
class UploadFilesFormComponentService
{
    /**
     * Uloží soubor ve $fileUpload do adresáře $dir
     *
     * @param string      $dir       Upload adresář, kam se uloží csv soubor
     * @param FileUpload $fileUpload CSV souboru uploadnutý z formuláře
     *
     * @return void
     */
    public static function saveFile(string $dir, FileUpload $fileUpload): void
    {
        $filename = $dir . $fileUpload->getSanitizedName();
        $fileUpload->move($filename);
    } // saveFile()

  /**
   * Načte csv soubor $filename v adresáři $dir
   *
   * @param string $dir      Upload adresář, ve kterém je soubor uložen
   * @param string $filename Název csv souboru
   *
   * @return array<Oscar> Seznam všech oscarů z daného souboru
   */
    public static function getCsvFileData(string $dir, string $filename): array
    {
      $oscars = [];
      $fullFilename = $dir . $filename;

      $row = 1;
      if (($handle = fopen($fullFilename, 'rb')) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
          $numCols = count($data);

          // hlavička nás nezajímá
          if (($row == 1) || ($numCols !== 5))
          {
              $row++;
              continue;
          }

           $oscars[] = new Oscar((int) $data[1], $data[4], $data[3], (int) $data[2]);

          $row++;
        }
        fclose($handle);
      }

      return $oscars;
    } // getCsvFileData()
} // UploadFilesFormComponentService
