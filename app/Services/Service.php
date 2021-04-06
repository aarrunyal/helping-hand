<?php

namespace App\Services;

use App\Modules\Services\Storage\DigitalOceanSpaces;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Class Service
 *
 * @package App\Services
 */
abstract class Service
{

    protected $uploadPath = '/uploads';

    public function upload(UploadedFile $file, $width = 1170, $height = 559, $uploadPath)
    {
        if (!is_dir('uploads'))
            mkdir('uploads');

        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0775, true);
        }

        $destination = $uploadPath;
        if ($file->isValid()) {
            $fileName = $file->getClientOriginalName();
            $file_type = $file->getClientOriginalExtension();
            $newFileName = sprintf("%s.%s", sha1($fileName . time()), $file_type);
            try {
                $image = $file->move($destination, $newFileName);
                if (substr($file->getClientMimeType(), 0, 5) == 'image')
                    $this->createThumb($image, 320, 320);
                return $image->getFilename();
            } catch (Exception $e) {
                return $e->getMessage();
                $this->logger->error(sprintf('File could not be uploaded : %s', $e->getMessage()));
            }

            return false;

        }

        return false;
    }

    public function createThumb(File $image, $width = 320, $height = 320)
    {
        try {
            $img = Image::make($image->getPathname());
            $img->fit($width, $height);
            $path = sprintf('%s/thumb/%s', $image->getPath(), $image->getFilename());
            $directory = sprintf('%s/thumb', $image->getPath());
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            return $img->save($path);
        } catch (\Exception $e) {
            return '';
        }

    }

    /**
     * Delete Image
     *
     * @param $image
     * @return bool
     */


    public function deleteMultipleImages($images, $uploadPath)
    {
        $path = $uploadPath;
        try {
            foreach ($images as $image) {
                $large = $path . '/' . $image;
                unlink($large);
                $thumb = sprintf('%s/thumb/%s', $path, $image);
                unlink($thumb);
            }
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function uploadFromAjax(UploadedFile $file, $width = 320, $height = 320)
    {
        if (!is_dir('uploads'))
            mkdir('uploads');

        if (!is_dir($this->uploadPath))
            mkdir($this->uploadPath, 0755, true);

        $destination = $this->uploadPath;
        if ($file->isValid()) {
            $fileName = $file->getClientOriginalName();
            $file_type = $file->extension();
            $newFileName = sprintf("%s.%s", sha1($fileName . time()), $file_type);
            try {
                $image = $file->move($destination, $newFileName);
                if (substr($file->getClientMimeType(), 0, 5) == 'image')
                    $this->createThumb1($image, $width, $height);
                return $image->getFilename();
            } catch (Exception $e) {
                return $e->getMessage();

            }

            return false;

        }

        return false;
    }

    public function uploadExcel(UploadedFile $file, $width = 320, $height = 320)
    {
        if (!is_dir('uploads'))
            mkdir('uploads');

        if (!is_dir($this->uploadPath))
            mkdir($this->uploadPath, 0755, true);

        $destination = $this->uploadPath;
        if ($file->isValid()) {
            $fileName = $file->getClientOriginalName();
            $file_type = $file->getClientOriginalExtension();
            $newFileName = sprintf("%s.%s", sha1($fileName . time()), $file_type);
//            try {
//                $image = $file->move($destination, $newFileName);
//                return $image->getFilename();
//            } catch (Exception $e) {
//                return $e->getMessage();
//                $this->logger->error(sprintf('File could not be uploaded : %s', $e->getMessage()));
//            }
//
//            return $image->getFilename();
            try {
                $image = $file->move($destination, $newFileName);
//                if (substr($file->getClientMimeType(), 0, 5) == 'image')
                $this->createThumb($image, $width, $height);
                return $image->getFilename();
            } catch (Exception $e) {
                return $e->getMessage();

            }


        }

        return false;

    }

    public function customPaginate($items, $perPage = 15, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function uploadBlobImage($imageData, $path)
    {
        if (!is_dir($path))
            mkdir($path, 0755, true);
        $data = $imageData;
        list($type, $data) = explode(';', $data);
        list(, $data) = explode(',', $data);
        $data = base64_decode($imageData);
        $image_name = time() . '_' . rand(100, 999) . '.png';
        $path = public_path($path . '/' . $image_name);
        file_put_contents($path, $data);
    }


    public function fileUpload($file, $path){
        if(!is_dir($path))
            mkdir($path);

        $destination = $path;
        if ($file->isValid()) {
            $fileName = $file->getClientOriginalName();
            $file_type = $file->getClientOriginalExtension();
            $newFileName = sprintf("%s.%s", sha1($fileName . time()), $file_type);
            try {
                $image = $file->move($destination, $newFileName);
                return $image->getFilename();
            } catch (Exception $e) {
                return $e->getMessage();
                $this->logger->error(sprintf('File could not be uploaded : %s', $e->getMessage()));
            }

            return false;

        }

        return false;

    }

    public function fileDelete($file, $path)
    {
        try {
            $file = $path . '/' . $file;
            unlink($file);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }


    public function deleteUploadedImage($imageName, $path)
    {
            $parentPath = $path . '/' . $imageName;
            $thumbPath = $path . '/thumb/' . $imageName;
            if (is_file($parentPath)) {
                unlink($parentPath);
                if (is_file($thumbPath))
                    unlink($thumbPath);
                return true;
            }
            return true;
    }

}
