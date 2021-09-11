<?php

namespace App\Services\DocumnetFile;

use App\Models\DocumentFile\DocumentFile;
use App\Services\Service;

class DocumentFileServie extends Service
{
    protected $uploadPath = "uploads/document-file";
    protected $documentFile;

    public function __construct(DocumentFile $documentFile)
    {
        $this->documentFile = $documentFile;
    }

    public function paginate($limit)
    {
        $documents = $this->documentFile->orderBy('id', 'DESC')->paginate($limit);
        return $documents;
    }

    public function findByColumn($column, $value)
    {
        $documents = $this->documentFile->where($column, $value)->first();
        return $documents;
    }

    public function store($data)
    {
        try {
            if (isset($data['files'])) {
                for ($i=0; $i < count($data['files']); $i++) {
                    $file = [];
                    $file['document_id'] = $data['document_id'];
                    $file['file_path'] = $this->fileUpload($data['files'][$i], $this->uploadPath);
                    $file['name'] = substr($data['files'][0]->getClientOriginalName(), 0, strpos($data['files'][0]->getClientOriginalName(), "."));
                    $file['type'] = $data['files'][$i]->getClientOriginalExtension();
                    $this->documentFile->create($file);
                }
            }
            return true;
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function update($id, $data)
    {
        try {
            $documentFile = $this->findByColumn('id', $id);
            return $documentFile->update($data);
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function delete($id)
    {
        try {
            $documentFile = $this->findByColumn('id', $id);
            // dd($documentFile->file_path);
            if (!empty($documentFile->file_path)) {
                $this->fileDelete($documentFile->file_path, $this->uploadPath);
            }
            return $documentFile->delete();
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function findByColumns($data, $all = false)
    {
        $response = $this->documentFile->where(function ($qry) use ($data) {
            if (sizeof($data) > 0) {
                foreach ($data as $k => $d) {
                    $qry->where($k, $data[$k]);
                }
            }
        });
        if ($all)
            return $response->get();
        return $response->first();
    }
}
