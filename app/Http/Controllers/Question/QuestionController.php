<?php

namespace App\Http\Controllers\Question;

use App\Http\Controllers\Controller;
use App\Http\Requests\Question\QuestionRequest;
use App\Repositories\Admin\Question\QuestionRepository;
use App\Repositories\Admin\Category\CategoryRepository;
use App\Repositories\Admin\Answer\AnswerRepository;

class QuestionController extends Controller
{
    protected $questionRepository;
    protected $categoryRepository;
    protected $answerRepository;


    public function __construct(QuestionRepository $questionRepository, CategoryRepository $categoryRepository, AnswerRepository $answerRepository)
    {
        $this->questionRepository = $questionRepository;
        $this->categoryRepository = $categoryRepository;
        $this->answerRepository = $answerRepository;
    }

    public function index()
    {
        return view('admin.question.index', [
            'questions' => $this->questionRepository->paginate(),
        ]);
    }

    public function create()
    {
        return view('admin.question.form', [
            'categories' => $this->categoryRepository->getAll(),
        ]);
    }

    public function store(QuestionRequest $request)
    {
        $data = $request->validated();
        $question = $this->questionRepository->save($data);
        for ($i = 0; $i < count($data['answers']); $i++) {
            $answers[] = [
                'content' => $data['answers'][$i],
                'question_id' => $question->id,
            ];
        }
        foreach ($answers as $answer) {
            $this->answerRepository->save($answer);
        }

        return redirect()->route('question.index', $question->id)->with(
            'success',
            'Creation completed successfully.'
        );
    }

    public function show($id)
    {
        if (! $question = $this->questionRepository->findById($id)) {
            abort(404);
        }

        dd($question->answers);

        return view('admin.question.form', [
            'question' => $question,
            'show' => 'show',
            'answer' => $answer,
            'categories' => $this->categoryRepository->getAll(),
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(QuestionRequest $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
