@extends('classBoard')
<!-- 상속받음 -->
@section('classBoardMain')
<!-- section: 아래의 코드 출력 -->
<div id="wrap">

	<div class="class_container_main">
		<main class="class_contents">
			<div class="class_main_mrap">
				<div class="class_main_visual">
					<img src="" alt="">
				</div>

				<hr>

				<div class="class_main_new_text">
					<h3>아직 방향성을 찾지 못한 분들을 위한 1단계</h3>
					<div class="class_main_viewall_text">
						<p>
							@foreach ($classInfo1 as $item)
								<a href="{{route('classboardall',['ClassDifficulty' => $item->ClassDifficulty])}}">전체보기</a>
								@break
							@endforeach	
						</p>
					</div>
				</div>

				<div class="main_container_new_box">
					<ul class="class_main_container_new">

					@forelse($classInfo1 as $item)
						@if ($loop->iteration <= 4)

						<a href="{{ route('classboarddetail', ['ClassID' => $item->ClassID]) }}">
						<li class="class_main_container_new_card">
							<div class="class_main_container_new_card_img">
								<img src="/{{$item->ClassImg}}" alt="">
							</div>
							<div class="class_main_container_new_card_title">
								<h4>{{$item->ClassTitle}}</h4>
							</div>
							<div class="class_main_container_new_card_content">
								<p>{{$item->ClassDescription}}</p>
							</div>

							
							<ul class="class_main_container_new_card_tag"> 
						@forelse($item->languages as $language)
								<li>{{$language->ClassLanguageName}}</li>
							@empty
						@endforelse
							</ul>
							
						</li>
						</a>

						@endif
					@empty
					@endforelse

					</ul>
				</div>

				
				<div class="class_main_new_text">
				@foreach ($classInfo2 as $item)
					<h3>{{$msg2}}</h3>
				<div class="class_main_viewall_text">
						<p>
							<a href="{{route('classboardall',['ClassDifficulty' => $item->ClassDifficulty])}}">전체보기</a>	
						</p>
				</div>
					@break
				@endforeach
				</div>
					

				<div class="class_main_container_new_box">
					<ul class="class_main_container_new">

					@forelse($classInfo2 as $item)
						@if ($loop->iteration <= 4)

						<a href="{{ route('classboarddetail', ['ClassID' => $item->ClassID]) }}">
						<li class="class_main_container_new_card">
							<div class="class_main_container_new_card_img">
								<img src="/{{$item->ClassImg}}" alt="">
							</div>
							<div class="class_main_container_new_card_title">
								<h4>{{$item->ClassTitle}}</h4>
							</div>
							<div class="class_main_container_new_card_content">
								<p>{{$item->ClassDescription}}</p>
							</div>
							<ul class="class_main_container_new_card_tag"> 
							@forelse($item->languages as $language)
								<li>{{$language->ClassLanguageName}}</li>
								@empty
							@endforelse
							</ul>
						</li>
						</a>

						@endif
					@empty
					@endforelse

					</ul>
				</div>

				<div class="class_main_new_text">
					<h3>1단계와 2단계를 완강한 당신을 위한 3단계</h3>
					<div class="class_main_viewall_text">
						<p>
							@foreach ($classInfo3 as $item)
								<a href="{{route('classboardall',['ClassDifficulty' => $item->ClassDifficulty])}}">전체보기</a>
								@break
							@endforeach
						</p>
					</div>
				</div>

				<div class="class_main_container_new_box">
					<ul class="class_main_container_new">

					@forelse($classInfo3 as $item)
						@if ($loop->iteration <= 4)

						<a href="{{ route('classboarddetail', ['ClassID' => $item->ClassID]) }}">
						<li class="class_main_container_new_card">
							<div class="class_main_container_new_card_img">
								<img src="/{{$item->ClassImg}}" alt="">
							</div>
							<div class="class_main_container_new_card_title">
								<h4>{{$item->ClassTitle}}</h4>
							</div>
							<div class="class_main_container_new_card_content">
								<p>{{$item->ClassDescription}}</p>
							</div>
							<ul class="class_main_container_new_card_tag"> 
							@forelse($item->languages as $language)
								<li>{{$language->ClassLanguageName}}</li>
							@empty
						@endforelse
							</ul>
						</li>
						</a>

						@endif
					@empty
					@endforelse

					</ul>
				</div>

				<div class="class_main_new_text">
					<h3>3단계까지 완강한 당신 이제 현업 기술을 위한 4단계</h3>
					<div class="class_main_viewall_text">
						<p>
							@foreach ($classInfo4 as $item)
								<a href="{{route('classboardall',['ClassDifficulty' => $item->ClassDifficulty])}}">전체보기</a>
								@break
							@endforeach
						</p>
					</div>
				</div>

				<div class="class_main_container_new_box">
					<ul class="class_main_container_new">

					@forelse($classInfo4 as $item)
						@if ($loop->iteration <= 4)

						<a href="{{ route('classboarddetail', ['ClassID' => $item->ClassID]) }}">
						<li class="class_main_container_new_card">
							<div class="class_main_container_new_card_img">
								<img src="/{{$item->ClassImg}}" alt="">
							</div>
							<div class="class_main_container_new_card_title">
								<h4>{{$item->ClassTitle}}</h4>
							</div>
							<div class="class_main_container_new_card_content">
								<p>{{$item->ClassDescription}}</p>
							</div>
							<ul class="class_main_container_new_card_tag"> 
							@forelse($item->languages as $language)
								<li>{{$language->ClassLanguageName}}</li>
							@empty
						@endforelse
							</ul>
						</li>
						</a>

						@endif
					@empty
					@endforelse

					</ul>
				</div>

				<hr>

				<div class="main_new_text">
					<h3>학습 가이드</h3>
					<a href="#">원하는 키워드를 눌러보세요</a>
				</div>

				<div class="main_container_keyword_box">
					<ul class="main_container_keyword">

						<a href="">
							<li class="main_container_keyword_card">
								<div class="main_container_keyword_card_img">
									<img src="./img/img-2.png" alt="">
								</div>
							</li>
						</a>

					</ul>
				</div>

			</div>
		</main>
	</div>
	
</div>

@endsection