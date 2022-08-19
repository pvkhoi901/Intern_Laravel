<?php

namespace App\Http\Controllers\Question;

use App\Http\Controllers\Controller;
use App\Http\Requests\Question\QuestionRequest;
use App\Repositories\Admin\Question\QuestionRepository;
use App\Repositories\Admin\Category\CategoryRepository;
use App\Repositories\Admin\Answer\AnswerRepository;
use Illuminate\Support\Facades\DB;

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

        DB::beginTransaction();
        try {
            $question = $this->questionRepository->save($data);

            foreach ($data['answers']['content'] as $key => $answer) {
                $question->answers()->create([
                'content' => $answer,
                'correct' => $key == $data['radio-answer']['correct'],
            ]);
            }

            DB::commit();

            return redirect()->route('question.index', $question->id)->with(
                'success',
                'Creation completed successfully.'
            );
        } catch (\Exception) {
            DB::rollback();

            return redirect()->back()->with(
                'error',
                'Exception Occured. Please try again later.'
            );
        }
    }

    public function show($id)
    {
        if (! $question = $this->questionRepository->findById($id)) {
            abort(404);
        }

        return view('admin.question.form', [
            'question' => $question,
            'show' => 'show',
            'categories' => $this->categoryRepository->getAll(),
        ]);
    }

    public function edit($id)
    {
        if (! $question = $this->questionRepository->findById($id)) {
            abort(404);
        }

        return view('admin.question.form', [
            'question' => $question,
            'categories' => $this->categoryRepository->getAll(),
        ]);
    }

    public function update(QuestionRequest $request, $id)
    {
        $data = $request->validated();

        DB::beginTransaction();

        try {
            $question = $this->questionRepository->save($data, ['id' => $id]);
            $answers = $question->answers;
            foreach ($answers as $key => $answer) {
                $answer->content = $data['answers']['content'][$key];
                $answer->correct = $key == $data['radio-answer']['correct'];
            }
            $question->push();

            DB::commit();

            return redirect()->route('question.index')->with(
                'success',
                'Updated completed successfully.'
            );
            ;
        } catch (\Exception) {
            DB::rollback();

            return redirect()->back()->with(
                'error',
                'Exception Occured. Please try again later.'
            );
        }
    }

    public function destroy($id)
    {
        $this->questionRepository->deleteById($id);

        return redirect()->route('question.index')->with(
            'success',
            'Deleted successfully'
        );
    }
}
