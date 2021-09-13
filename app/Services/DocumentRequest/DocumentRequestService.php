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
        $documentRequests = $this->documentRequest->orderBy('id', 'DESC')->paginate($limit);
        return $documentRequests;
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

    public function findByColumns($data, $all = false)
    {
        $response = $this->documentRequest->where(function ($qry) use ($data) {
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

    public function getData($limit)
    {
        if(auth()->user()->user_type == 'admin') {
           return $this->paginate($limit);
        }else {
            return $this->findByColumns(['user_id' => auth()->user()->id], true);
        }
    }
}

