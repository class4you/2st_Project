@extends('classBoard')

@section('classBoardMain')

<div id="wrap">
        <div class="class_detail_visual">
            <div class="class_detail_container_box">
                <div class="class_detail_container">
                    <div class="class_detail_container_lr">
                        <div class="class_detail_container_l">
                            <div class="class_detail_container_l_img_cover">
                                <img src="./img/img-2.png" alt="">
                            </div>
                        </div>

                        <div class="class_detail_container_r">
                            <div class="class_detail_container_r_banner">
                                <div class="class_detail_container_r_banner_label">
                                    <span>NEW</span>
                                </div>
                                <span>게임 개발</span>
                            </div>
                            <div class="class_detail_container_r_title_box">
                                <h2 class="class_detail_container_r_title">
                                    김영한의 자바 입문 - 코드로 시작하는 자바 첫걸음일수도 있고
                                </h2>
                            </div>
                            <div class="class_detail_container_r_content_box">
                                <p class="class_detail_container_r_content">
                                    강의에 대한 간단 내용 강의에 대한 간단 내용강의에 대한 간단 내용 강의에 대한 간단 내용강의에 대한 간단 내용 강의에 대한 간단 내용강의에 대한 간단 내용 강의에 대한 간단 내용강의에 대한 간단 내용 강의에 대한 간단 내용
                                </p>
                            </div>
                            <div class="class_detail_container_r_info_box">
                                <span class="class_detail_container_r_info_star_box">
                                    <div class="class_detail_container_r_info_star">
                                        <div class="class_detail_container_r_info_star_inr">
                                            <span>☆</span>
                                            <span>☆</span>
                                            <span>☆</span>
                                            <span>☆</span>
                                            <span>☆</span>
                                        </div>
                                    </div>
                                    <span>(5.0)</span>
                                </span>
                                <span>수강생 수</span>
                            </div>
                            <div class="class_detail_container_r_language">
                                <span class="class_detail_container_r_language_icon">#</span>
                                <span>HTML</span>
                                <span>CSS</span>
                                <span>JS</span>
                                <span>PHP</span>
                            </div>
                            <div class="class_detail_container_r_payment_box">
                                <div class="class_detail_container_r_payment_price">
                                    <span>가격: 122312312원</span>
                                </div>
                                <div class="class_detail_container_r_payment_classes">
                                    <button>수강 신청</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="class_container">

            <ul class="class_tabs">
                <li class="class_tab_link current" data-tab="class_tab1"><a href="#">강의 소개</a></li>
                <li class="class_tab_link" data-tab="class_tab2"><a href="">수강평</a></li>
                <li class="class_tab_link" data-tab="class_tab3"><a href="">커뮤니티</a></li>
                <li class="class_tab_link" data-tab="class_tab4"><a href="">공지사항</a></li>
            </ul>
            
            <div id="class_tab1" class="class_tab_content class_current">
                <p>tab content1</p>
                <p>동해물과백두산이마르고닳도록하느님이보우하사우리나라만세</p>
                <p>동해물과백두산이마르고닳도록하느님이보우하사우리나라만세</p>
                <p>동해물과백두산이마르고닳도록하느님이보우하사우리나라만세</p>
                <p>동해물과백두산이마르고닳도록하느님이보우하사우리나라만세</p>
                <p>동해물과백두산이마르고닳도록하느님이보우하사우리나라만세</p>
                <p>동해물과백두산이마르고닳도록하느님이보우하사우리나라만세</p>
            </div>
            
            <div class="class_tab_content_title">
                <p>기초 설명</p>
            </div>
            <div id="class_tab1" class="class_tab_content">
                <p>무궁화삼천리화려강산대한사람대한으로길이보전하세</p>
                <p>무궁화삼천리화려강산대한사람대한으로길이보전하세</p>
                <p>무궁화삼천리화려강산대한사람대한으로길이보전하세</p>
            </div>

            <div class="class_tab_content_title">
                <p>커리큘럼</p>
            </div>
            <div id="class_tab1" class="class_tab_content">
                <p>커리큘럼</p>
            </div>

            <div class="class_tab_content_title">
                <p>강의 특징</p>
            </div>
            <div id="class_tab1" class="class_tab_content">
                <p>강의 특징</p>
            </div>

            <div class="class_tab_content_title">
                <p>강사 설명</p>
            </div>
            <div id="class_tab1" class="class_tab_content">
                <p>강사 설명</p>
            </div>
        
        </div>

</div>

@endsection