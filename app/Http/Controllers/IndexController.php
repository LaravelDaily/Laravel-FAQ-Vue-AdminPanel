<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use App\Models\Tag;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $categories = Category::with('questions')->get();

        return view('index', compact('categories'));
    }

    public function show($id)
    {
        $question = Question::findOrFail($id);

        return view('question', compact('question'));
    }

    public function search()
    {
        if (request('category_id')) {
            $category = Category::find(request('category_id'));
            $pageTitle = $category->name;
            $questions = Question::where('category_id', request('category_id'))->get();
        } else {
            $tag = Tag::find(request('tag_id'));
            $pageTitle = $tag->name;
            $questions = Question::whereHas('tags', function($q) {
                $q->where('id', request('tag_id'));
            })->get();
        }

        return view('search-results', compact('questions', 'pageTitle'));
    }
}
