<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Question;
use App\EventCalendar;

use Auth;

class ExamController extends Controller
{
	public function create($event_id)
	{
		$questions 	= EventCalendar::find($event_id)->questions()->get()->toArray();
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

	public function show($event_id)
	{
		$event 	= EventCalendar::find($event_id);

		$title 		= $event->exam;
		$questions 	= $event->questions()->get();

		return view('exam.show', [
			'title' => $title, 
			'questions' => $questions, 
			'number' => 1,
			'event_id' => $event_id]);
	}

	public function evaluate(Request $request)
	{
		$event_id 	= 	$request->input('event_id');
		$answer 	= 	$request->input('answer');
		$user_id 	= 	Auth::user()->id;
		$event 	=	EventCalendar::find($event_id);

		$result  	= 	$event->questions()->get();
		$correct 	= 	array();

		foreach ($result as $r) {
			$correct[] = $r->correct;
		}


		// Exam logic variables
		$G = ['A', 'B', 'C', 'D'];
		$hits = 0;
		$total = count($answer);
		$min_qualification = 70; 

		for($i = 0; $i < count($answer); $i++)
			$hits += $G[$answer[$i + 1]] == $correct[$i];
				
		$qualification = ($hits * 100) / $total;

		if($qualification > $min_qualification) {
			// Mark assistance in assistance table as 'Exam';
			DB::table('assistance')->insert([
				'user_id' 	=> $user_id,
				'event_id' 	=> $event_id,
				'modality' 	=> 1,
				'credits' 	=> $event->credits
				]);

			DB::table('users')->where('id', $user_id)->increment('credits', $event->credits);

			// Return withput error.
			return redirect()->route('events.show', ['id' => $event_id]);
		}
		else
		{
			// return w/ error. 
			return redirect()->route('events.show', ['id' => $event_id]);
		}
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
