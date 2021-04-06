<?php
/**
 * Created by PhpStorm.
 * User: aarrunyal
 * Date: 5/5/20
 * Time: 10:53 PM
 */

namespace App\Services\Contact;


use App\Models\Contact\ContactUs;
use App\Services\Service;

class ContactService extends Service
{
    protected $contact;

    public function __construct(ContactUs $contact)
    {
        $this->contact = $contact;
    }

    public function paginate($limit)
    {
        $contacts = $this->contact->orderBy('id', 'DESC')->paginate($limit);
        return $contacts;
    }

    public function findByColumn($column, $value)
    {
        $contacts = $this->contact->where($column, $value)->first();
        return $contacts;
    }

    public function store($data)
    {
        try {
            $data['is_active'] = (isset($data['is_active']) && $data['is_active'] == "on") ? 1 : 0;
            return $this->contact->create($data);
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function update($slug, $data)
    {
        try {
            $contact = $this->findByColumn('slug', $slug);
            $data['is_active'] = (isset($data['is_active']) && $data['is_active'] == "on") ? 1 : 0;
            return $contact->update($data);
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function delete($slug)
    {
        try {
            $contact = $this->findByColumn('slug', $slug);
            return $contact->delete();
        } catch (\Exception $ex) {
            return false;
        }
    }
}
