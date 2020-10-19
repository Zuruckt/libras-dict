<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileHelper
{
    /**
     * Saves a uploaded file into storage
     * @param Illuminate\Http\UploadedFile $file
     * @param string $folder
     * @return string|false $path
     */
    public function store(UploadedFile $file, string $folder)
    {
        if (!$path = $file->store($folder))
        {
            return abort(500, 'Não foi possível salvar o arquivo.');
        }

        return $path;
    }
    /**
     * Deletes the specified file and saves a new one
     * @param Illuminate\Http\UploadedFile $file
     * @param string $currentPath
     * @return string $path
     */
    public function update(UploadedFile $file, $currentPath)
    {

        if (!Storage::exists($currentPath))
        {
            abort(404, 'Impossível atualizar, nenhum arquivo encontrado.');
        }

        $this->delete($currentPath);
        $path = $this->store($file, 'public/gifs');

        return $path;
    }

    /**
     * Delete the specified file
     * @param string $path
     * @return void
     */
    public function delete($path)
    {
        if (!Storage::delete($path))
        {
            abort(500, 'Não foi possível deletar o arquivo.');
        }
    }
}
