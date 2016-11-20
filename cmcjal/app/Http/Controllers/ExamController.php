<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Question;
use App\EventCalendar;

class ExamController extends Controller
{
	public function create($event_id)
	{
		$questions 	= EventCalendar::find($event_id)->questions()->get();
		$exam 		= EventCalendar::find($event_id)->exam;

		return view('exam.details', [
				'event_id' 	=> $event_id,
				'question' 	=> $questions,
				'exam' 		=> $exam
			]);
	}

	public function store($event_id, Request $request)
	{
		$event 		= EventCalendar::find($event_id);

		$event->exam = $request->input('exam');
		$event->save();

		return redirect()->route('events.show', ['id' => $event_id]);
	}

	public function storeQuestion(Request $request)
	{
		$event_id 	= $request->input('event_id');
		$title 		= $request->input('title');
		$options 	= $request->input('options');
		$correct 	= $request->input('correct');

		$question  	= new Question;

		$question->event_id 	= $event_id;
		$question->title 		= $title;
		$question->options 		= $options;
		$question->correct 		= $correct;

		$question->save();

		return $question->id;
	}

	public function showQuestion($id)
	{
		$question = Question::find($id);

		return response()->json($question->toArray());
	}

	public function updateQuestion($id, Request $request)
	{
		$question = Question::find($id);
		$question->fill($request->all());

		$question->save();

		return $question->id;
	}

	public function deleteQuestion($id)
	{
		Question::destroy($id);

		return 'Se eliminó la pregunta correctamente';
	}
}
