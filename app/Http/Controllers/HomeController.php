<?php

namespace App\Http\Controllers;

use App\Faq;
use App\Team;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $title = 'Home';
        $teams = Team::all();
        $faqs = Faq::all();
        return view('home', compact(
            'title',
            'teams',
            'faqs'
        ));
    }


    public function academy()
    {
        $title = 'Academy';
        return view('academy.index', compact(
            'title',
        ));
    }

    public function forum_qa()
    {
        $title = 'Forum Q&A';
        return view('forum-qa.index', compact(
            'title',
        ));
    }

    public function blog()
    {
        $title = 'Blog';
        return view('blog.index', compact(
            'title',
        ));
    }

    public function job()
    {
        $title = 'Job';
        return view('job.index', compact(
            'title',
        ));
    }

    public function event()
    {
        $title = 'Event';
        return view('event.index', compact(
            'title',
        ));
    }

    public function partnership()
    {
        $title = 'Partnership';
        return view('partnership.index', compact(
            'title',
        ));
    }
}
