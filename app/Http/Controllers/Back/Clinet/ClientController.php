<?php


namespace App\Http\Controllers\Back\Clinet;


use App\Http\Requests\Back\Client\ClientRequest;
use App\Services\Client\ClientService;

class ClientController
{

    public $client;


    public function __construct(ClientService $client)
    {
        $this->client = $client;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = $this->client->paginate(25);
        return view('back.client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        $data = $request->all();
        if ($this->client->store($data))
            return redirect()->route('client.index');
        return redirect()->route('client.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = $this->client->findByColumn('id', $id);
        return view('back.client.edit', compact( 'client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, $id)
    {
        $data = $request->all();
        if ($this->client->update($id, $data))
            return redirect()->route('client.index');
        return redirect()->route('client.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->client->delete($id))
            return redirect()->route('client.index');
        return redirect()->route('client.index');
    }
}
