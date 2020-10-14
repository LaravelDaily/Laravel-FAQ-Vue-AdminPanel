<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Http\Resources\Admin\QuestionResource;
use App\Models\Category;
use App\Models\Question;
use App\Models\Tag;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuestionsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('question_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new QuestionResource(Question::with(['category', 'tags'])->advancedFilter());
    }

    public function store(StoreQuestionRequest $request)
    {
        $question = Question::create($request->validated());
        $question->tags()->sync($request->input('tags.*.id', []));

        return (new QuestionResource($question))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(Question $question)
    {
        abort_if(Gate::denies('question_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'category' => Category::get(['id', 'name']),
                'tags'     => Tag::get(['id', 'name']),
            ],
        ]);
    }

    public function show(Question $question)
    {
        abort_if(Gate::denies('question_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new QuestionResource($question->load(['category', 'tags']));
    }

    public function update(UpdateQuestionRequest $request, Question $question)
    {
        $question->update($request->validated());
        $question->tags()->sync($request->input('tags.*.id', []));

        return (new QuestionResource($question))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Question $question)
    {
        abort_if(Gate::denies('question_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new QuestionResource($question->load(['category', 'tags'])),
            'meta' => [
                'category' => Category::get(['id', 'name']),
                'tags'     => Tag::get(['id', 'name']),
            ],
        ]);
    }

    public function destroy(Question $question)
    {
        abort_if(Gate::denies('question_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $question->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
