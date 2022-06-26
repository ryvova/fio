<?php
declare(strict_types=1);

/**
 * Interface IUploadFilesFormComponent
 * @copyright (c) 2022 Rývová
 */
interface IUploadFilesFormComponentFactory
{
    public function create(): UploadFilesFormComponent;
} // IUploadFilesFormComponentFactory
