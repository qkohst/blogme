<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Http\Controllers\Controller;
use App\NotifikasiAdmin;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Contact';
        $data_notifikasi = NotifikasiAdmin::where('status', '0')->orderBy('id', 'desc')->get();
        $contact = Contact::first();

        return view('admin.contact.index', compact(
            'title',
            'data_notifikasi',
            'contact',
        ));
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
        $contact = Contact::findorfail($id);
        $request->validate([
            'alamat' => 'required|min:10|max:255',
            'email' => 'required|email:dns|min:5|max:100',
            'nomor_telpon' => 'required|numeric|digits_between:11,15',
            'embed_google_maps' => 'required|min:20',
            'link_telegram' => 'required|min:5|max:255',
            'link_twitter' => 'required|min:5|max:255',
            'link_facebook' => 'required|min:5|max:255',
            'link_instagram' => 'required|min:5|max:255',
            'link_youtube' => 'required|min:5|max:255',
        ]);
        $data = [
            'alamat' => $request->alamat,
            'email' => $request->email,
            'nomor_telpon' => $request->nomor_telpon,
            'embed_google_maps' => $request->embed_google_maps,
            'link_telegram' => $request->link_telegram,
            'link_twitter' => $request->link_twitter,
            'link_facebook' => $request->link_facebook,
            'link_instagram' => $request->link_instagram,
            'link_youtube' => $request->link_youtube,
        ];
        $contact->update($data);
        return redirect('admin/contact')->with('toast_success', 'Berhasil diedit.');
    }

}
