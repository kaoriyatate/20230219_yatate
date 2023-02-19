<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;



class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contact');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function confirm(Request $request)
    {
        
        
        $request->validate= [
            'fullname' => 'required',
            'gender' => 'required ',
            'email' => 'required | email',
            'postcode' => 'required',
            'address' => 'required',
            'opinion' => 'required',

        ];

        $input = $request->input();

        if (isset($input['postcode']))
            $input['postcode'] = mb_convert_kana($input['postcode'], 'a');
        


        return view('confirm', ['input' => $input ]);       
        
    }

    public function store(Request $request)
    {
        $contact = new Contact();
        $form = $request->all();
        unset($form['_token']);
        $contact->fill($form,)->save();

        return view('thanks');   
    }

    public function thanks(Request $request)
    {
        //$input = $request->session()->get('input');

        
        if ($request->has('back') == true) {
            return redirect('/')->withInput();
        }

        
        //if (!$input) {
        //    return redirect()->route('contact.index');
        //}
        $contact = new Contact();
        $form = $request->all();
        unset($form['_token']);
        $contact->fill($form,)->save();

        

        return view('thanks');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function management_system(Request $request)
    {
        
        $query = Contact::query();

        if ($keyword = $request->fullname) {
            $query->where('fullname', 'like', "%{$keyword}%");
        }

        if ($keyword = $request->gender) {
            $query->where('gender', 'like', "%{$keyword}%");
        }

        if ($keywprd = $request->created_at) {
            $query->where('created_at', 'like', "%{$keyword}%");
        }

        if ($keyword = $request->email) {
            $query->where('email', 'like', "%{$keyword}%");
        }

        $contacts = $query->paginate(10)->withQueryString();

        return view('management_system', compact('contacts'));
    
    }    

    


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Contact::find($request->id)->delete();


        return redirect('/search');
    }
}
