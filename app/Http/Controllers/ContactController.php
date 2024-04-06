<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;


use App\Contact;
class ContactController extends Controller
{
    public function index()
    {
        $contacts=Contact::paginate(15);
        return view('contacts.index', compact('contacts'));
    }

    public function save(Request $request)
    {
      
        $contact= new Contact;
        $contact->name=$request->input('name');
        $contact->email=$request->input('email');
        $contact->sdt=$request->input('sdt');
        $contact->message=$request->input('message');

        
        $contact->save();
          return redirect()->back();


    }

     public function destroy($id)
    {
        
        $contact=Contact::findOrFail($id);
       
        $contact->delete();
          return redirect()->back();


    }
 
}
