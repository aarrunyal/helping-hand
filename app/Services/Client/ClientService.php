<?php


namespace App\Services\Client;


use App\Models\Client\Client;
use App\Services\Service;

class ClientService extends Service
{

    protected $uploadPath = "uploads/client";
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function paginate($limit)
    {
        $clients = $this->client->orderBy('id', 'DESC')->paginate($limit);
        return $clients;
    }

    public function findByColumn($column, $value)
    {
        $clients = $this->client->where($column, $value)->first();
        return $clients;
    }

    public function store($data)
    {
        try {
            if (isset($data['image'])) {
                $data['image'] = $this->upload($data['image'], null, null, $this->uploadPath);
            }
            $data['is_active'] = (isset($data['is_active']) && $data['is_active'] == "on") ? 1 : 0;
            return $this->client->create($data);
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function update($id, $data)
    {
        try {
            $client = $this->findByColumn('id', $id);
            if (isset($data['image'])) {
                if (!empty($blog->image)) {
                    $this->deleteUploadedImage($blog->image, $this->uploadPath);
                }
                $data['image'] = $this->upload($data['image'], null, null, $this->uploadPath);
            }
            $data['is_active'] = (isset($data['is_active']) && $data['is_active'] == "on") ? 1 : 0;
            return $client->update($data);
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function delete($id)
    {
        try {
            $client = $this->findByColumn('id', $id);
            if (!empty($blog->image)) {
                $this->deleteUploadedImage($blog->image, $this->uploadPath);
            }
            return $client->delete();
        } catch (\Exception $ex) {
            return false;
        }
    }
}
