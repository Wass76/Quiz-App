<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Resources\Question as QuestionResource;
use Validator;

class QuestionController extends BaseController
{
    public function index()
    {
        // DB::table('task')->whereDate('endDate', '<', now())->update(['status' => 'expired']);

        $questions = Question::orderby('rank' , 'ASC')->get();
        // $questions = Question::all();
        return $this->sendResponse(QuestionResource::collection($questions) , 'products retrieved Successfully!');
    }

    public function store(Request $request)
    {
        $questions= Question::all();
        if($questions->count() >=100)
        {
            return $this->sendError('you can\'t add new question because there are enough questions');
        }
        else
        {
            $input = $request->all();
            $validator = Validator::make($input ,[
                'name' => 'required',
                'answer1' => 'required',
                'answer2' => 'required',
                'answer3' => 'required',
                'answer4' => 'required',
            ]);

            if($validator->fails()){
                return $this->sendError('please validate your data' , $validator->errors());
            }

            // $input[]

            $question = Question::create( $input);
            return $this->sendResponse($question, 'adding question done successfully');
        }
    }

    public function show($id)
    {
        $question = Question::find($id);
        if(is_null($question))
        {
            return $this->sendError('question not found');
        }
        return $this->sendResponce( new QuestionResource($question) ,'question found successfully' );
    }

    public function update(Request $request ,Question $question)
    {
         $input= $request->all();
        $validator = Validator::make($input ,[
            'name' => 'required',
            'answer1' => 'required',
            'answer2' => 'required',
            'answer3' => 'required',
            'answer4' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validate your data' , $validator->errors());
        }

        $question->name = $input['name'];
        $question->answer1 = $input['answer1'];
        $question->answer2 = $input['answer2'];
        $question->answer3 = $input['answer3'];
        $question->answer4 = $input['answer4'];

        if($request->has('answer5')){
            $question->answer5 = $input['answer5'];
            if($request->has('answer6')){
                $question->answer6 = $input['answer6'];
                if($request->has('answer7')){
                    $question->answer7 = $input['answer7'];
                    if($request->has('answer8')){
                        $question->answer8 = $input['answer8'];
                        if($request->has('answer9')){
                            $question->answer9 = $input['answer9'];
                            if($request->has('answer10')){
                                $question->answer10 = $input['answer10'];
                            }
                        }
                    }
                }
            }
        }
            $question->save();
            return $this->sendResponse($question, 'adding new question done successfully');
    }

    public function destroy(Question $question )
    {
        $questions = Question::all();
        if($questions->count() <= 100){
            return $this->sendError('You can\'t delete this question , Validate number of Questions');
        }
        else {
            $question->delete();
            return $this->sendResponse(QuestionResource::collection($question) , 'this question is deleted successfully');
        }
    }

    // public function softCreate(Request $request ,Question $question)
    // {
    //     $question ->delete();

    //     $input = $request->all();
    //         $validator = Validator::make($input ,[
    //             'name' => 'required',
    //             'answer1' => 'required',
    //             'answer2' => 'required',
    //             'answer3' => 'required',
    //             'answer4' => 'required',
    //         ]);

    //         if($validator->fails()){
    //             return $this->sendError('please validate your data' , $validator->errors());
    //         }

    //         $question = Question::create( $input);

    //         return $this->sendResponse($question, 'adding question done successfully');
    // }
}
