@extends('classBoard')

@section('classBoardMain')

<div id="wrap">

	<div class="class_main_visual">
		<img src="" alt="">
	</div>

	<hr>

	<div class="class_container_main">
		<main class="class_contents">
			<div class="class_main_mrap">
				
				<div class="class_main_new_text">
					<h3>{{$msg}}</h3>
				</div>
				
				<div class="main_container_new_box">
					<ul class="class_main_container_new">
					@forelse($data as $item)
						<a href="{{ route('classboarddetail', ['ClassID' => $item->ClassID]) }}">
						<li class="class_main_container_new_card">
							<div class="class_main_container_new_card_img">
								<img src="{{ asset($item->ClassImg) }}" alt="">
							</div>
							<div class="class_main_container_new_card_title">
								<h4>{{$item->ClassTitle}}</h4>
							</div>
							<div class="class_main_container_new_card_content">
								<p>{{$item->ClassDescription}}</p>
							</div>

							<ul class="class_main_container_new_card_tag"> 
						@forelse($item->languages as $language)			
								<li>{{ $language->ClassLanguageName }}</li>
							@empty	
						@endforelse		
							</ul>
						</li>
						</a>
					@empty
					@endforelse

					</ul>
				</div>
	
			</div>
		</main>
	</div>


</div>

@endsection