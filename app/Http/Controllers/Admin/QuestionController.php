<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\QuestionRequest;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\SettingsHelper;
use Session;
use File;
class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::orderBy('created_at', 'desc')->get();
        //dd($notices);
        return view('admin.question.index',compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.question.create');    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {
        $userData=$request->all();
        $i=0;
        if ($request->hasFile('question_url')) {
            $i+=1;
            $uploadPath = SettingsHelper::makeFilePath("upload/questions");
            $extension = $request->file('question_url')->getClientOriginalExtension();
            $fileName = $this->makeIdentity($request->ip()).$this->makeVerificationCode($request->ip()).$i.'.' . $extension;
            $request->file('question_url')->move($uploadPath, $fileName);
            $userData['question_url'] = $uploadPath.'/'.$fileName;

        }
        if ($request->hasFile('listening_url')) {
            $i+=1;
            $uploadPath = SettingsHelper::makeFilePath("upload/questions");
            $extension = $request->file('listening_url')->getClientOriginalExtension();
            $fileName = $this->makeIdentity($request->ip()).$this->makeVerificationCode($request->ip()).$i.'.' . $extension;
            $request->file('listening_url')->move($uploadPath, $fileName);
            $userData['listening_url'] = $uploadPath.'/'.$fileName;

        }
        if ($request->hasFile('answer_url')) {
            $i+=1;
            $uploadPath = SettingsHelper::makeFilePath("upload/questions");
            $extension = $request->file('answer_url')->getClientOriginalExtension();
            $fileName = $this->makeIdentity($request->ip()).$this->makeVerificationCode($request->ip()).$i.'.' . $extension;
            $request->file('answer_url')->move($uploadPath, $fileName);
            $userData['answer_url'] = $uploadPath.'/'.$fileName;

        }

        Question::create($userData);

        $notification = array(
            'message' => 'Question Answer has been  successfully created!',
            'alert-type' => 'success'
        );
        Session::flash('notification',$notification);
        return redirect('/admin/question');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //questions
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::findOrFail($id);
        return view('admin.question.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionRequest $request, $id)
    {
        $requestData = $request->all();
        $question = Question::findOrFail($id);
$i=0;

        if ($request->hasFile('question_url')) {
            $i+=1;
            $uploadPath = SettingsHelper::makeFilePath("upload/questions");
            $extension = $request->file('question_url')->getClientOriginalExtension();
            $fileName = $this->makeIdentity($request->ip()).$this->makeVerificationCode($request->ip()).$i.'.' . $extension;
            $request->file('question_url')->move($uploadPath, $fileName);
            $requestData['question_url'] = $uploadPath.'/'.$fileName;
            if ($question->question_url != null) {
                $existingPath = $question->question_url;
                if (file_exists( $existingPath)) {
                    unlink(public_path($existingPath));
                }
            }
        }
        if ($request->hasFile('listening_url')) {
            $i+=1;
            $uploadPath = SettingsHelper::makeFilePath("upload/questions");
            $extension = $request->file('listening_url')->getClientOriginalExtension();
            $fileName = $this->makeIdentity($request->ip()).$this->makeVerificationCode($request->ip()).$i.'.' . $extension;
            $request->file('listening_url')->move($uploadPath, $fileName);
            $requestData['listening_url'] = $uploadPath.'/'.$fileName;
            if ($question->listening_url != null) {
                $existingPath = $question->listening_url;
                if (file_exists( $existingPath)) {
                    unlink(public_path($existingPath));
                }
            }
        }
        if ($request->hasFile('answer_url')) {
            $i+=1;
            $uploadPath = SettingsHelper::makeFilePath("upload/questions");
            $extension = $request->file('answer_url')->getClientOriginalExtension();
            $fileName = $this->makeIdentity($request->ip()).$this->makeVerificationCode($request->ip()).$i.'.' . $extension;
            $request->file('answer_url')->move($uploadPath, $fileName);
            $requestData['answer_url'] = $uploadPath.'/'.$fileName;
            if ($question->answer_url != null) {
                $existingPath = $question->answer_url;
                if (file_exists( $existingPath)) {
                    unlink(public_path($existingPath));
                }
            }
        }
        $question->update($requestData);
        $notification = array(
            'message' => 'Question Answer has been  successfully updated',
            'alert-type' => 'success'
        );
        Session::flash('notification',$notification);
        return redirect(Config("authorization.route-prefix") . '/question');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        Question::destroy($id);
        if ($question->question_url != null) {
            $existingPath = $question->question_url;
            if (file_exists($existingPath)) {
                unlink(public_path($existingPath));
            }
        }
        if ($question->listening_url != null) {
            $existingPath = $question->listening_url;
            if (file_exists($existingPath)) {
                unlink(public_path($existingPath));
            }
        }
        if ($question->answer_url != null) {
            $existingPath = $question->answer_url;
            if (file_exists($existingPath)) {
                unlink(public_path($existingPath));
            }
        }
        $notification = array(
            'message' => 'Question Answer has been  successfully deleted',
            'alert-type' => 'success'
        );
        Session::flash('notification',$notification);
        return redirect(Config("authorization.route-prefix") . '/question');
    }


    public function makeVerificationCode($ip){
        $time = time();
        $ipd=$this->removeDot($ip);
        return $time.$ipd;
    }

    public function makeIdentity($ip){
        $time = time();
        $ipd=$this->removeDot($ip);
        return $ipd.$time.$ipd;
    }
    public function removeDot($ip){
        return str_replace(".","",$ip);
    }
}
