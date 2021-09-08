<?php

namespace App\Services\DocumnetFile;

use App\Models\DocumentFile\DocumentFile;

class DocumentFileServie
{
    protected $uploadPath = "uploads/documentFile";
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
            return $this->documentFile->create($data);
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
