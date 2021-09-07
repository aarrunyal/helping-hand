<?php

namespace App\Services\Document;

use App\Models\Document\Document;
use App\Services\Service;

class DocumentService extends Service
{
    protected $document;

    public function __construct(Document $document)
    {
        $this->document = $document;
    }

    public function paginate($limit)
    {
        $documents = $this->document->orderBy('id', 'DESC')->paginate($limit);
        return $documents;
    }

    public function findByColumn($column, $value)
    {
        $documents = $this->document->where($column, $value)->first();
        return $documents;
    }

    public function store($data)
    {
        try {
            $data['downloadable'] = (isset($data['downloadable']) && $data['downloadable'] == "on") ? 1 : 0;
            $data['viewable'] = (isset($data['viewable']) && $data['viewable'] == "on") ? 1 : 0;
            $data['is_active'] = (isset($data['is_active']) && $data['is_active'] == "on") ? 1 : 0;
            return $this->document->create($data);
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function update($id, $data)
    {
        try {
            $document = $this->findByColumn('id', $id);
            $data['downloadable'] = (isset($data['downloadable']) && $data['downloadable'] == "on") ? 1 : 0;
            $data['viewable'] = (isset($data['viewable']) && $data['viewable'] == "on") ? 1 : 0;
            $data['is_active'] = (isset($data['is_active']) && $data['is_active'] == "on") ? 1 : 0;
            return $document->update($data);
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function delete($id)
    {
        try {
            $document = $this->findByColumn('id', $id);
            return $document->delete();
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function findByColumns($data, $all = false)
    {
        $response = $this->document->where(function ($qry) use ($data) {
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
