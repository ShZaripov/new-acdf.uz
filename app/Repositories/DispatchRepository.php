<?php 

namespace App\Repositories;

use App\Models\News;
use App\Models\NewsSubject;
use App\Repositories\ImagesRepository;
use App\Components\Filter;
use App\Models\Subscriber;
use App\Models\Option;
use Illuminate\Support\Facades\Mail;
use App\Mail\Dispatch;

class DispatchRepository{


	public function send($request)
	{
		$data = $request->except('_token');
		$subscribers = $this->getSubscribers();
		$data = $this->formatEmail($data);
		if ($data && $subscribers) {
			Mail::bcc($subscribers)->send(new Dispatch($data));		
			if( count(Mail::failures()) > 0 ) {
				return false;
			}
		}
		return true;
	}

	public function formatEmail($data)
	{
		if (isset($data['subject']) && isset($data['content'])) {
			return $data;
		}
		return false;
	}

	public function getSubscribers()
	{
		$model = Subscriber::all();
		$arr = [];
		if ($model) {
			foreach ($model as $item) {
				$arr[] = $item->email;
			}
		}
		return $arr;
	}

	public function getSubscribersCount()
	{
		return Subscriber::count();
	}

	public function getListSubscribers($limit = 50)
	{
		$data = Subscriber::orderBy('id', 'desc')->paginate($limit);
		return $data;
	}

}