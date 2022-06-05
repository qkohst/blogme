<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Faq;
use App\Kategory;
use App\NotifikasiMember;
use App\Team;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        $title = 'Home';
        if (Auth::check()) {
            $data_notifikasi = NotifikasiMember::where('to_user_id', Auth::user()->id)->where('status', '0')->orderBy('id', 'desc')->get();
        } else {
            $data_notifikasi = null;
        }

        $contact = Contact::first();
        $teams = Team::all();
        $faqs = Faq::all();

        // Seet session 
        session([
            'link_telegram' => $contact->link_telegram,
            'link_twitter' => $contact->link_twitter,
            'link_facebook' => $contact->link_facebook,
            'link_instagram' => $contact->link_instagram,
            'link_youtube' => $contact->link_youtube,
        ]);

        $count_member = User::where('role', 2)->count();

        return view('home', compact(
            'title',
            'data_notifikasi',
            'contact',
            'teams',
            'faqs',
            'count_member'
        ));
    }


    public function academy()
    {
        $title = 'Academy';
        if (Auth::check()) {
            $data_notifikasi = NotifikasiMember::where('to_user_id', Auth::user()->id)->where('status', '0')->orderBy('id', 'desc')->get();
        } else {
            $data_notifikasi = null;
        }

        $kategories = Kategory::where('status', 'on')->paginate(6);
        return view('academy.index', compact(
            'title',
            'data_notifikasi',
            'kategories'
        ));
    }

    public function forum_qa()
    {
        $title = 'Forum Q&A';
        if (Auth::check()) {
            $data_notifikasi = NotifikasiMember::where('to_user_id', Auth::user()->id)->where('status', '0')->orderBy('id', 'desc')->get();
        } else {
            $data_notifikasi = null;
        }
        return view('forum-qa.index', compact(
            'title',
            'data_notifikasi'
        ));
    }

    public function blog()
    {
        $title = 'Blog';
        if (Auth::check()) {
            $data_notifikasi = NotifikasiMember::where('to_user_id', Auth::user()->id)->where('status', '0')->orderBy('id', 'desc')->get();
        } else {
            $data_notifikasi = null;
        }
        return view('blog.index', compact(
            'title',
            'data_notifikasi'
        ));
    }

    public function job()
    {
        $title = 'Job';
        if (Auth::check()) {
            $data_notifikasi = NotifikasiMember::where('to_user_id', Auth::user()->id)->where('status', '0')->orderBy('id', 'desc')->get();
        } else {
            $data_notifikasi = null;
        }
        return view('job.index', compact(
            'title',
            'data_notifikasi'
        ));
    }

    public function event()
    {
        $title = 'Event';
        if (Auth::check()) {
            $data_notifikasi = NotifikasiMember::where('to_user_id', Auth::user()->id)->where('status', '0')->orderBy('id', 'desc')->get();
        } else {
            $data_notifikasi = null;
        }
        return view('event.index', compact(
            'title',
            'data_notifikasi'
        ));
    }

    public function partnership()
    {
        $title = 'Partnership';
        if (Auth::check()) {
            $data_notifikasi = NotifikasiMember::where('to_user_id', Auth::user()->id)->where('status', '0')->orderBy('id', 'desc')->get();
        } else {
            $data_notifikasi = null;
        }
        return view('partnership.index', compact(
            'title',
            'data_notifikasi'
        ));
    }
}
