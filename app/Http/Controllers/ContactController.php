<?php

namespace App\Http\Controllers;

use App\Contact;
use App\User;
use Illuminate\Http\Request;
use App\Exports\ContactExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::latest()->paginate(5);

        return view('contacts.index', compact('contacts'))->with(request()->input('page'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->hasRole('admin')){
            return view('contacts.create');
        }
        else{
            //abort(403, 'You dont have access to this page!');
            return redirect()->route('contacts.index')->with('success', 'You dont have access to this command!');
            //return response()->make('Error');
            //return response()->json(User::all());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->hasRole('admin')){
            // validate the input
            $request->validate([
                'name' => 'required',
                'number' =>'required'
            ]);

            // create a new contact in the database
            Contact::create($request->all());

            // redirect the user and send friendly message
            return redirect()->route('contacts.index')->with('success','Contact created successfully');
        }
        else{
            //abort(403, 'You dont have access to this page!');
            return redirect()->route('contacts.index')->with('success', 'You dont have access to this command!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact=Contact::find($id);
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->hasRole('admin')){
            $contact=Contact::find($id);
            return view('contacts.edit', compact('contact'));
        }
        else{
            //abort(403, 'You dont have access to this page!');
            return redirect()->route('contacts.index')->with('success', 'You dont have access to this command!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->hasRole('admin')){
            // validate the input
            $contact=Contact::find($id);
            $request->validate([
                'name' => 'required',
                'number' =>'required'
            ]);

            // create a new contact in the database
            $contact->update($request->all());

            // redirect the user and send friendly message
            return redirect()->route('contacts.index')->with('success','Contact updated successfully');
        }
        else{
            //abort(403, 'You dont have access to this page!');
            return redirect()->route('contacts.index')->with('success', 'You dont have access to this command!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->hasRole('admin')){
            //delete the contact
            $contact=Contact::find($id);
            $contact->delete();

            //redirect the user and display message
            return redirect()->route('contacts.index')->with('success','Contact deleted successfully');
        }
        else{
            //abort(403, 'You dont have access to this page!');
            return redirect()->route('contacts.index')->with('success', 'You dont have access to this command!');
        }
    }

    public function export()
    {
        return Excel::download(new ContactExport, 'contacts.xlsx');
    }

}
