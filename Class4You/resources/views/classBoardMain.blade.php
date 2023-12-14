@extends('classBoard')

@section('classBoardMain')

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
							<a href="#">전체보기</a>
						</p>
					</div>
				</div>

				<div class="main_container_new_box">
					<ul class="class_main_container_new">

					@forelse($data as $item)
						@if ($loop->iteration <= 4)

						<a href="{{route('classboardall', ['ClassDifficulty' => $item->ClassDifficulty])}}">
						<li class="class_main_container_new_card">
							<div class="class_main_container_new_card_img">
								<img src="./img/img-1.png" alt="">
							</div>
							<div class="class_main_container_new_card_title">
								<h4>{{$item->ClassTitle}}</h4>
							</div>
							<div class="class_main_container_new_card_content">
								<p>{{$item->ClassDescription}}</p>
							</div>
							<ul class="class_main_container_new_card_tag"> 
								<li>html</li>
								<li>css</li>
								<li>php</li>
								<li>java</li>
							</ul>
						</li>
						</a>

						@endif
					@empty
					@endforelse

					</ul>
				</div>

				<div class="class_main_new_text">
					<h3>이제 첫발을 뗀 당신을 위한 2단계</h3>
					<div class="class_main_viewall_text">
						<p>
							<a href="#">전체보기</a>
						</p>
					</div>
				</div>

				<div class="class_main_container_new_box">
					<ul class="class_main_container_new">
						<a href="">
						<li class="class_main_container_new_card">
							<div class="class_main_container_new_card_img">
								<img src="./img/img-1.png" alt="">
							</div>
							<div class="class_main_container_new_card_title">
								<h4>실무까지 한 번에 끝내는 DevOps를 위한 Docker & Kubernetes feat.</h4>
							</div>
							<div class="class_main_container_new_card_content">
								<p>130시간 이상의 커리큘럼을 통해 온프레미스 환경 & AWS EKS 환경까지 실무 환경을 그대로</p>
							</div>
							<ul class="class_main_container_new_card_tag"> 
								<li>html</li>
								<li>css</li>
								<li>php</li>
								<li>java</li>
							</ul>
						</li>
						</a>

					</ul>
				</div>

				<div class="class_main_new_text">
					<h3>1단계와 2단계를 완강한 당신을 위한 3단계</h3>
					<div class="class_main_viewall_text">
						<p>
							<a href="#">전체보기</a>
						</p>
					</div>
				</div>

				<div class="class_main_container_new_box">
					<ul class="class_main_container_new">

						<a href="">
						<li class="class_main_container_new_card">
							<div class="class_main_container_new_card_img">
								<img src="./img/img-1.png" alt="">
							</div>
							<div class="class_main_container_new_card_title">
								<h4>실무까지 한 번에 끝내는 DevOps를 위한 Docker & Kubernetes feat.</h4>
							</div>
							<div class="class_main_container_new_card_content">
								<p>130시간 이상의 커리큘럼을 통해 온프레미스 환경 & AWS EKS 환경까지 실무 환경을 그대로</p>
							</div>
							<ul class="class_main_container_new_card_tag"> 
								<li>html</li>
								<li>css</li>
								<li>php</li>
								<li>java</li>
							</ul>
						</li>
						</a>

					</ul>
				</div>

				<div class="class_main_new_text">
					<h3>3단계까지 완강한 당신 이제 현업 기술을 위한 4단계</h3>
					<div class="class_main_viewall_text">
						<p>
							<a href="#">전체보기</a>
						</p>
					</div>
				</div>

				<div class="class_main_container_new_box">
					<ul class="class_main_container_new">

						<a href="">
						<li class="class_main_container_new_card">
							<div class="class_main_container_new_card_img">
								<img src="./img/img-1.png" alt="">
							</div>
							<div class="class_main_container_new_card_title">
								<h4>실무까지 한 번에 끝내는 DevOps를 위한 Docker & Kubernetes feat.</h4>
							</div>
							<div class="class_main_container_new_card_content">
								<p>130시간 이상의 커리큘럼을 통해 온프레미스 환경 & AWS EKS 환경까지 실무 환경을 그대로</p>
							</div>
							<ul class="class_main_container_new_card_tag"> 
								<li>html</li>
								<li>css</li>
								<li>php</li>
								<li>java</li>
							</ul>
						</li>
						</a>

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