<?php

namespace App\Services\DocumentRequest;

use App\Models\DocumentRequest\DocumentRequest;

class DocumentRequestService
{
    protected $documentRequest;

    public function __construct(DocumentRequest $documentRequest)
    {
        $this->documentRequest = $documentRequest;
    }

    public function paginate($limit)
    {
        return $this->documentRequest->orderBy('id', 'DESC')->paginate($limit);
    }

    public function findByColumn($column, $value)
    {
        $documentRequests = $this->documentRequest->where($column, $value)->first();
        return $documentRequests;
    }

    public function store($data)
    {
        // try {
            return $this->documentRequest->create($data);
        // } catch (\Exception $ex) {
        //     return false;
        // }
    }

    public function update($id, $data)
    {
        try {
            $documentRequest = $this->findByColumn('id', $id);
            return $documentRequest->update($data);
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function delete($id)
    {
        try {
            $documentRequest = $this->findByColumn('id', $id);
            return $documentRequest->delete();
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function findByColumns($data, $all = false, $limit = null)
    {
        $response = $this->documentRequest->where(function ($qry) use ($data) {
            if (sizeof($data) > 0) {
                foreach ($data as $k => $d) {
                    $qry->where($k, $data[$k]);
                }
            }
        });
        if ($all) {
            if (!empty($limit))
                $response = $response->take($limit);
            $response = $response->orderBy('id', "DESC")->get();
        } else
            $response = $response->first();
        return $response;
    }

    public function getDocumentRequest()
    {
        if(auth()->user()->user_type == 'admin') {
            return $this->findByColumns([], true, 5);
        }else {
            return $this->findByColumns(['user_id' => auth()->user()->id], true, 5);
        }
    }
}

