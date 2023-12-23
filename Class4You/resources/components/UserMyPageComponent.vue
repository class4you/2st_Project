<template>
    <div class="wrapper">
        <div class="my_page_main">
            <div class="my_page_main_tap_uis">
                <div @click="handleTabClick(1)" class="my_page_main_tap_ui">대시보드</div>
                <div @click="handleTabClick(2)" class="my_page_main_tap_ui">계정정보</div>
                <div @click="handleTabClick(3)" class="my_page_main_tap_ui">나의학습</div>
                <!-- <div @click="handleTabClick(4)" class="my_page_main_tap_ui">강의노트</div> -->
                <div @click="handleTabClick(5)" class="my_page_main_tap_ui">작성 게시글</div>
                <div @click="handleTabClick(6)" class="my_page_main_tap_ui">구매내역</div>
                <!-- <div class="my_page_main_tap_ui" onclick="showDashboardContent('공란')">공란</div> -->
            </div>

            <div v-if="$store.state.myPageClickFlgTab === 1" class="my_page_dashboard_box">
                <div class="my_page_dashboard_box_cover">
                    <div class="dashboard_recent_learning_class">
                        <div class="dashboard_recent_learning_class_title">
                            <p>최근 학습 강의</p>
                        </div>
                        <div class="dashboard_recent_learning_class_box">
                            <div class="recent_learning_class_title_cover">
                                <div class="recent_learning_class_title">
                                    <a>강의명 : 스스로 배우는 php 뭐시기뭐시기</a>
                                </div>
                            </div>
                            <div class="recent_learning_class_content_cover">
                                <div class="recent_learning_class_content">
                                    <p>강의내용 : 스스로 배우는 php 뭐시기뭐시기</p>
                                </div>
                            </div>
                            <div class="recent_learning_class_progress_cover">
                                <div class="recent_learning_class_progress">
                                    <span>진도율 :</span>
                                    <span>2강</span>
                                    <span>/</span>
                                    <span>19강</span>
                                    <span>(10.47%)</span>
                                </div>
                                <p>며칠전</p>
                            </div>
                            <div class="recent_learning_class_progress_bar_cover">
                                <div role="progressbar" aria-valuemax="100" aria-valuemin="0" aria-valuenow="10.53" aria-label="진도율" class="recent_learning_class_progress_bar"></div>
                            </div>
                            <div class="recent_learning_class_button_cover">
                                <div class="recent_learning_class_button">
                                    <button>바로 학습</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard_weekly_study_class">
                        <div class="dashboard_weekly_study_class_title">
                            <p>주간 학습 정보</p>
                        </div>
                        <div class="dashboard_weekly_study_class_box">
                            <div class="weekly_study_class_title_cover">
                                <div class="weekly_study_class_title">
                                    <button class="weekly_study_class_title_button">&lt;</button>
                                    <div class="weekly_study_class_title_input_cover">
                                        <div class="weekly_study_class_title_input_label">
                                            <label for="">주차선택</label>
                                        </div>
                                        <div class="weekly_study_class_title_input_label_button">
                                            <button style="display: none;">2023. 12. 05</button>
                                        </div>
                                        <p>23년 12월 1주차</p>
                                    </div>
                                    <input type="hidden" value="">
                                    <button class="weekly_study_class_title_button">></button>
                                </div>
                            </div>
                            <div class="weekly_study_class_data_cover">
                                <div class="weekly_study_class_data">
                                    <span>월요일 :</span>
                                    <span>학습시간</span>
                                    <span>(20분)</span>
                                    <span>학습강의</span>
                                    <span>(2개)</span>
                                </div>
                                <div class="weekly_study_class_data">
                                    <span>화요일 :</span>
                                    <span>학습시간</span>
                                    <span>(20분)</span>
                                    <span>학습강의</span>
                                    <span>(2개)</span>
                                </div>
                                <div class="weekly_study_class_data">
                                    <span>수요일 :</span>
                                    <span>학습시간</span>
                                    <span>(20분)</span>
                                    <span>학습강의</span>
                                    <span>(2개)</span>
                                </div>
                                <div class="weekly_study_class_data">
                                    <span>목요일 :</span>
                                    <span>학습시간</span>
                                    <span>(20분)</span>
                                    <span>학습강의</span>
                                    <span>(2개)</span>
                                </div>
                                <div class="weekly_study_class_data">
                                    <span>금요일 :</span>
                                    <span>학습시간</span>
                                    <span>(20분)</span>
                                    <span>학습강의</span>
                                    <span>(2개)</span>
                                </div>
                                <div class="weekly_study_class_data">
                                    <span>토요일 :</span>
                                    <span>학습시간</span>
                                    <span>(20분)</span>
                                    <span>학습강의</span>
                                    <span>(2개)</span>
                                </div>
                                <div class="weekly_study_class_data">
                                    <span>일요일 :</span>
                                    <span>학습시간</span>
                                    <span>(20분)</span>
                                    <span>학습강의</span>
                                    <span>(2개)</span>
                                </div>
                            </div>
                            <div class="weekly_study_class_total_cover">
                                <div class="weekly_study_class_total">
                                    <span>총 학습시간 :</span>
                                    <span>총 학습강의 :</span>
                                    <span>1</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard_annual_study_class">
                        <div class="dashboard_annual_study_class_title">
                            <p>연간 학습 정보</p>
                        </div>
                        <div class="dashboard_annual_study_class_box">
                            <div class="weekly_study_class_title_cover">
                                <div class="weekly_study_class_title">
                                    <button class="weekly_study_class_title_button">&lt;</button>
                                    <div class="weekly_study_class_title_input_cover">
                                        <div class="weekly_study_class_title_input_label">
                                            <label for="">주차선택</label>
                                        </div>
                                        <div class="weekly_study_class_title_input_label_button">
                                            <button style="display: none;">2023. 12. 05</button>
                                        </div>
                                        <p>2023년</p>
                                    </div>
                                    <input type="hidden" value="">
                                    <button class="weekly_study_class_title_button">></button>
                                </div>
                            </div>
                            <div class="weekly_study_class_data_cover">
                                <div class="weekly_study_class_data">
                                    <span>1월 :</span>
                                    <span>학습시간</span>
                                    <span>(20분)</span>
                                    <span>학습강의</span>
                                    <span>(2개)</span>
                                </div>
                                <div class="weekly_study_class_data">
                                    <span>2월 :</span>
                                    <span>학습시간</span>
                                    <span>(20분)</span>
                                    <span>학습강의</span>
                                    <span>(2개)</span>
                                </div>
                                <div class="weekly_study_class_data">
                                    <span>3월 :</span>
                                    <span>학습시간</span>
                                    <span>(20분)</span>
                                    <span>학습강의</span>
                                    <span>(2개)</span>
                                </div>
                                <div class="weekly_study_class_data">
                                    <span>3월 :</span>
                                    <span>학습시간</span>
                                    <span>(20분)</span>
                                    <span>학습강의</span>
                                    <span>(2개)</span>
                                </div>
                                <div class="weekly_study_class_data">
                                    <span>4월 :</span>
                                    <span>학습시간</span>
                                    <span>(20분)</span>
                                    <span>학습강의</span>
                                    <span>(2개)</span>
                                </div>
                                <div class="weekly_study_class_data">
                                    <span>5월 :</span>
                                    <span>학습시간</span>
                                    <span>(20분)</span>
                                    <span>학습강의</span>
                                    <span>(2개)</span>
                                </div>
                                <div class="weekly_study_class_data">
                                    <span>6월 :</span>
                                    <span>학습시간</span>
                                    <span>(20분)</span>
                                    <span>학습강의</span>
                                    <span>(2개)</span>
                                </div>
                                <div class="weekly_study_class_data">
                                    <span>7월 :</span>
                                    <span>학습시간</span>
                                    <span>(20분)</span>
                                    <span>학습강의</span>
                                    <span>(2개)</span>
                                </div>
                                <div class="weekly_study_class_data">
                                    <span>8월 :</span>
                                    <span>학습시간</span>
                                    <span>(20분)</span>
                                    <span>학습강의</span>
                                    <span>(2개)</span>
                                </div>
                                <div class="weekly_study_class_data">
                                    <span>9월 :</span>
                                    <span>학습시간</span>
                                    <span>(20분)</span>
                                    <span>학습강의</span>
                                    <span>(2개)</span>
                                </div>
                                <div class="weekly_study_class_data">
                                    <span>10월 :</span>
                                    <span>학습시간</span>
                                    <span>(20분)</span>
                                    <span>학습강의</span>
                                    <span>(2개)</span>
                                </div>
                                <div class="weekly_study_class_data">
                                    <span>11월 :</span>
                                    <span>학습시간</span>
                                    <span>(20분)</span>
                                    <span>학습강의</span>
                                    <span>(2개)</span>
                                </div>
                                <div class="weekly_study_class_data">
                                    <span>12월 :</span>
                                    <span>학습시간</span>
                                    <span>(20분)</span>
                                    <span>학습강의</span>
                                    <span>(2개)</span>
                                </div>
                            </div>
                            <div class="weekly_study_class_total_cover">
                                <div class="weekly_study_class_total">
                                    <span>총 학습시간 :</span>
                                    <span>총 학습강의 :</span>
                                    <span>1</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div v-if="$store.state.myPageClickFlgTab === 2" class="my_page_users_box">
                <div class="my_page_users_box_cover">
                    <div class="users_basic_information">
                        <div class="users_basic_information_title">
                            <p>기본 정보</p>
                        </div>
                        <div class="users_basic_information_box">
                            <div class="users_basic_information_cover">
                                <div class="users_basic_information_title_name">
                                    <a>이름</a>
                                </div>
                                <div class="users_basic_information_content_cover">
                                    <div>
                                        <p>{{ newUserInfoItems.UserName }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="users_basic_information_cover">
                                <div class="users_basic_information_title_name">
                                    <a>생년월일</a>
                                </div>
                                <div class="users_basic_information_content_cover">
                                    <div>
                                        <p>{{ newUserInfoItems.UserBirthDate }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="users_basic_information_cover">
                                <div class="users_basic_information_title_name">
                                    <a>전화번호</a>
                                </div>
                                <div class="users_basic_information_content_cover">
                                    <div>
                                        <input type="text" name="" id="" :value="newUserInfoItems.UserPhoneNumber">
                                    </div>
                                </div>
                            </div>
                            <div class="users_basic_information_button_cover">
                                <div class="users_basic_information_button">
                                    <button>전화번호 수정 하기</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="users_basic_information">
                        <div class="users_basic_information_title">
                            <p>주소 정보</p>
                        </div>
                        <div class="users_basic_information_box">
                            <div class="users_basic_information_cover">
                                <div class="users_basic_address_cover">
                                    <div class="users_basic_information_title_name">
                                        <a>우편 번호</a>
                                    </div>
                                    <div class="users_basic_information_title_name">
                                        <button type="button" class="user_address_button">주소 찾기</button>
                                    </div>
                                </div>
                                <div class="users_basic_information_content_cover">
                                    <div>
                                        <input type="text" :value="newUserInfoItems.UserPostcode">
                                    </div>
                                </div>
                            </div>
                            <div class="users_basic_information_cover">
                                <div class="users_basic_information_title_name">
                                    <a>도로명 주소</a>
                                </div>
                                <div class="users_basic_information_content_cover">
                                    <div>
                                        <input type="text" :value="newUserInfoItems.UserRoadAddress">
                                    </div>
                                </div>
                            </div>
                            <div class="users_basic_information_cover">
                                <div class="users_basic_information_title_name">
                                    <a>상세 주소</a>
                                </div>
                                <div class="users_basic_information_content_cover">
                                    <div>
                                        <input type="text" :value="newUserInfoItems.UserDetailedAddress">
                                        <!-- <p>대구광역시 중구 공평로 105, 노마즈하우스 1528호</p> -->
                                    </div>
                                </div>
                            </div>
                            <div class="users_basic_information_button_cover">
                                <div class="users_basic_information_button">
                                    <button>주소 수정 하기</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="users_basic_information">
                        <div class="users_basic_information_title">
                            <p>계정 정보</p>
                        </div>
                        <div class="users_basic_information_box">
                            <div class="users_basic_information_cover">
                                <div class="users_basic_information_title_name">
                                    <a>이메일</a>
                                </div>
                                <div class="users_basic_information_content_cover">
                                    <div>
                                        <p>{{ newUserInfoItems.UserEmail }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="users_basic_information_cover" style="margin-bottom: 12px;">
                                <div class="users_basic_information_title_name">
                                    <a>비밀번호</a>
                                </div>
                                <div class="users_basic_information_content_cover">
                                    <div>
                                        <input type="password">
                                    </div>
                                </div>
                            </div>
                            <div class="users_basic_information_cover" style="margin-bottom: 12px;">
                                <div class="users_basic_information_content_cover">
                                    <div>
                                        <input type="password" placeholder="변경할 비밀번호를 입력해주세요.">
                                        <!-- <p>대구광역시 중구 공평로 105, 노마즈하우스 1528호</p> -->
                                    </div>
                                </div>
                            </div>
                            <div class="users_basic_information_cover">
                                <div class="users_basic_information_content_cover">
                                    <div>
                                        <input type="password" placeholder="변경할 비밀번호를 확인을 입력해주세요.">
                                        <!-- <p>대구광역시 중구 공평로 105, 노마즈하우스 1528호</p> -->
                                    </div>
                                </div>
                            </div>
                            <div class="users_basic_information_button_cover">
                                <div class="users_basic_information_button">
                                    <button>비밀번호 수정 하기</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="users_basic_information_password_cover">
                        <div class="users_basic_information_title">
                            <p>탈퇴 확인</p>
                        </div>
                        <div class="users_basic_password_box">
                            <div class="users_basic_password_cover">
                                <div class="users_basic_password_title">
                                    <span class="users_password_titel">비밀번호</span>
                                    <input class="users_password_input" type="password" placeholder="비밀번호를 입력하세요">
                                    <span class="users_password_titel">비밀번호 확인</span>
                                    <input class="users_password_input" type="password" placeholder="비밀번호를 입력하세요">
                                </div>
                            </div>
                        </div>
                        <button type="button" class="users_password_button" style="margin-right: 50px;">비밀번호 확인</button>         
                        <button type="button" class="users_password_button">탈퇴하기</button>
                    </div>
                </div>
            </div>



            <div v-if="$store.state.myPageClickFlgTab === 3" class="my_page_class_box">
                <div class="my_page_class_box_cover">
                    <div class="class_basic_information">
                        <div class="class_basic_information_title">
                            <p>수강 정보</p>
                        </div>
                    </div>
    
                    <div class="my_page_container_new_box">
                        <ul class="my_page_container_new">
                            <a v-for="item in newUserClassInfoItem" :href="'/classboarddetail/' + item.ClassID">
                                <li class="my_page_container_new_card">
                                    <div class="my_page_container_new_card_img">
                                        <img :src="'/' + item.ClassImg" alt="">
                                    </div>
                                </li>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>


            <div v-if="$store.state.myPageClickFlgTab === 4" class="my_page_class_box">
                <div class="my_page_class_box_cover">
                    <div class="class_basic_information">
                        <div class="class_basic_information_title">
                            <p>강의 노트</p>
                        </div>
                    </div>

                    <div class="users_class_note_full_cover">
                        <div class="users_class_note_box">
                            <div class="users_class_note_cover">
                                <div class="users_class_note_content_box">
                                    <span class="users_class_note_content">강의명</span>
                                    <span class="users_class_note_content">챕터명</span>
                                    <span class="users_class_note_content">노트내용</span>
                                    <button class="users_class_note_button">강의 이동</button>
                                </div>
                            </div>
                        </div>

                        <div class="users_class_note_box">
                            <div class="users_class_note_cover">
                                <div class="users_class_note_content_box">
                                    <span class="users_class_note_content">강의명</span>
                                    <span class="users_class_note_content">챕터명</span>
                                    <span class="users_class_note_content">노트내용</span>
                                    <button class="users_class_note_button">강의 이동</button>
                                </div>
                            </div>
                        </div>

                        
                        <div class="users_class_note_box">
                            <div class="users_class_note_cover">
                                <div class="users_class_note_content_box">
                                    <span class="users_class_note_content">강의명</span>
                                    <span class="users_class_note_content">챕터명</span>
                                    <span class="users_class_note_content">노트내용</span>
                                    <button class="users_class_note_button">강의 이동</button>
                                </div>
                            </div>
                        </div>

                        
                        <div class="users_class_note_box">
                            <div class="users_class_note_cover">
                                <div class="users_class_note_content_box">
                                    <span class="users_class_note_content">강의명</span>
                                    <span class="users_class_note_content">챕터명</span>
                                    <span class="users_class_note_content">노트내용</span>
                                    <button class="users_class_note_button">강의 이동</button>
                                </div>
                            </div>
                        </div>

                        
                        <div class="users_class_note_box">
                            <div class="users_class_note_cover">
                                <div class="users_class_note_content_box">
                                    <span class="users_class_note_content">강의명</span>
                                    <span class="users_class_note_content">챕터명</span>
                                    <span class="users_class_note_content">노트내용</span>
                                    <button class="users_class_note_button">강의 이동</button>
                                </div>
                            </div>
                        </div>

                        
                        <div class="users_class_note_box">
                            <div class="users_class_note_cover">
                                <div class="users_class_note_content_box">
                                    <span class="users_class_note_content">강의명</span>
                                    <span class="users_class_note_content">챕터명</span>
                                    <span class="users_class_note_content">노트내용</span>
                                    <button class="users_class_note_button">강의 이동</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div v-if="$store.state.myPageClickFlgTab === 5" class="my_page_class_box">
                <div class="my_page_class_box_cover">
                    <div class="class_basic_information">
                        <div class="class_basic_information_title">
                            <p>작성 게시글</p>
                        </div>
                    </div>

                    <div v-for="item in newUserBoardInfoItem" class="users_class_thread_full_cover">
                        <div class="users_class_thread_box">
                            <div class="users_class_thread_cover">
                                <div class="users_class_thread_content_box">
                                    <span class="users_class_thread_content">{{ item.created_at }}</span>
                                    <span class="users_class_thread_content">{{ item.BoardFlg === '0' ? '미해결' : '해결' }}</span>
                                    <span class="users_class_thread_content">{{ item.BoardTitle }}</span>
                                    <a :href="'/boardDetail/' + item.BoardID" class="users_class_thread_button">게시판 이동</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div v-if="$store.state.myPageClickFlgTab === 6" class="my_page_class_box">
                <div class="my_page_class_box_cover">
                    <div class="class_basic_information">
                        <div class="class_basic_information_title">
                            <p>구매 내역</p>
                        </div>
                    </div>

                    <div class="users_class_thread_full_cover">
                        <div class="users_class_thread_box">
                            <div class="users_class_thread_cover">
                                <div class="users_class_thread_content_box">
                                    <span class="users_class_thread_content">구매일자</span>
                                    <span class="users_class_thread_content">강의진행률</span>
                                    <span class="users_class_thread_content">강의제목</span>
                                    <button class="users_class_thread_button">강의 이동</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="users_class_thread_full_cover">
                        <div class="users_class_thread_box">
                            <div class="users_class_thread_cover">
                                <div class="users_class_thread_content_box">
                                    <span class="users_class_thread_content">구매일자</span>
                                    <span class="users_class_thread_content">강의진행률</span>
                                    <span class="users_class_thread_content">강의제목</span>
                                    <button class="users_class_thread_button">강의 이동</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="users_class_thread_full_cover">
                        <div class="users_class_thread_box">
                            <div class="users_class_thread_cover">
                                <div class="users_class_thread_content_box">
                                    <span class="users_class_thread_content">구매일자</span>
                                    <span class="users_class_thread_content">강의진행률</span>
                                    <span class="users_class_thread_content">강의제목</span>
                                    <button class="users_class_thread_button">강의 이동</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="users_class_thread_full_cover">
                        <div class="users_class_thread_box">
                            <div class="users_class_thread_cover">
                                <div class="users_class_thread_content_box">
                                    <span class="users_class_thread_content">구매일자</span>
                                    <span class="users_class_thread_content">강의진행률</span>
                                    <span class="users_class_thread_content">강의제목</span>
                                    <button class="users_class_thread_button">강의 이동</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="users_class_thread_full_cover">
                        <div class="users_class_thread_box">
                            <div class="users_class_thread_cover">
                                <div class="users_class_thread_content_box">
                                    <span class="users_class_thread_content">구매일자</span>
                                    <span class="users_class_thread_content">강의진행률</span>
                                    <span class="users_class_thread_content">강의제목</span>
                                    <button class="users_class_thread_button">강의 이동</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="users_class_thread_full_cover">
                        <div class="users_class_thread_box">
                            <div class="users_class_thread_cover">
                                <div class="users_class_thread_content_box">
                                    <span class="users_class_thread_content">구매일자</span>
                                    <span class="users_class_thread_content">강의진행률</span>
                                    <span class="users_class_thread_content">강의제목</span>
                                    <button class="users_class_thread_button">강의 이동</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</template>
<script>
export default {
    name: 'UserMyPageComponent',

    data() {
        return {
            newUserInfoItems: [],
            newUserClassInfoItem: [],
            newUserBoardInfoItem: [],
        }
    },

    mounted() {
        this.fetchData();
    },

    methods: {
        fetchData() {
        axios.get('/getmypagedashboard')
            .then(response => {
                console.log(response.data);
                // console.log(response.data.userData);
                // console.log(response.data.ClassData);
                this.newUserInfoItems = response.data.userData;
                this.newUserClassInfoItem = response.data.classData;
                this.newUserBoardInfoItem = response.data.boardData;
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
        },
        handleTabClick(tabNumber) {
            this.$store.commit('setMyPageTab', tabNumber);
        },
    }
}
</script>
<style>
    
</style>