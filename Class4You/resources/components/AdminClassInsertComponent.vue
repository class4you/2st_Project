<template>
    <!-- Page Wrapper -->
    <loading-component v-if="loading" />
    <div v-if="!loading" id="page-top">
        <div id="wrapper">
            
            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                
                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/adminmain">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-laugh-wink"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">Class 4 You</div>
                    
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="/adminmain">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>대시보드</span></a>
                    </li>
                    
                <li  v-if="adminChk === 'true'" class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>유저 관리</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header admin-main-h6-font-size">유저 정보 관리</h6>
                            <a class="collapse-item" href="/adminuserdata">유저 정보 리스트</a>
                            <a class="collapse-item" href="/adminuserclassdata">유저 강의 리스트</a>
                            <a class="collapse-item" href="/adminuserstatedata">유저 상태 리스트</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                        aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>게시글 관리</span>
                    </a>
                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header admin-main-h6-font-size">게시글 정보 관리</h6>
                            <a class="collapse-item" href="/adminboardquestiondata">강의 질문 게시글 리스트</a>
                            <a class="collapse-item" href="/adminboardcommunitydata">커뮤니티 게시글 리스트</a>
                            <a class="collapse-item" href="/adminboardreportdata">신고 게시글 리스트</a>
                            <!-- <a class="collapse-item" href="utilities-animation.html">Animations</a>
                            <a class="collapse-item" href="utilities-other.html">Other</a> -->
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                        aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>강의 관리</span>
                    </a>
                    <div id="collapsePages" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header admin-main-h6-font-size ">강의 정보 수정</h6>
                            <a class="collapse-item active" href="/adminclassinsert">강의 관리</a>
                        </div>
                    </div>
                </li>
<!-- 
                <li class="nav-item">
                    <a class="nav-link" href="/admininformation">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>관리자 ㆍ 강사 정보 관리</span></a>
                </li> -->

                <li class="nav-item">
                    <a class="nav-link" href="/adminregistration">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>강사 회원 가입</span></a>
                </li>
                

                <hr class="sidebar-divider">

                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

                <!-- Sidebar Message -->
                <!-- <div class="sidebar-card d-none d-lg-flex">
                    <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                    <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                    <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
                </div> -->

            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" style="display: flex; justify-content: flex-end;">

                        <div class="admin_logout_btn_container" id="admin_container">
                            <button @click="instructorlogout()" class="admin_logout_btn">
                                <span class="admin_circle" aria-hidden="true">
                                    <span class="admin_icon admin_arrow"></span>
                                </span>
                                <span class="admin_logout_button_text">Logout</span>
                            </button>
                        </div>

                    <!-- <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <form
                            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                    aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                       <ul class="navbar-nav ml-auto">

                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    신고게시글 알람 모달
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">신고 게시글 관리로 이동</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    해당 관리자 게시글 질문
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">질문 게시글 관리로 이동</a>
                            </div>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <button type="button" @click="instructorlogout">로그아웃</button>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">현희 최</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    프로필
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    프로필 수정
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    활동 로그
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul> -->

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800">Class</h1>
                        <p class="mb-4">강의를 업로드 하는 공간입니다. 원하는 강의를 선택하면 해당 강의의 챕터로 이동합니다.</p>

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div style="display: flex; align-items: center; justify-content: space-between;" class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">강의 정보 테이블</h6>
                            <form style="margin: 0px !important; border: 1px solid #ebebeb; border-radius: 8px;" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                <div class="input-group">
                                    <input v-model="searchQuery" type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                        aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button @click="fetchData(1, searchQuery)" class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" style="text-align: center;" id="dataTable" width="100%" cellspacing="0">
                                    <colgroup>
                                        <col style="width: 5%;">
                                        <col style="width: 5%;">
                                        <col style="width: 5%;">
                                        <col style="width: 20%;">
                                        <col style="width: 5%;">
                                        <col style="width: 5%;">
                                        <col style="width: 5%;">
                                        <col style="width: 5%;">
                                        <col style="width: 5%;">
                                        <!-- <col style="width: 5%;">
                                        <col style="width: 5%;"> -->
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th>강의번호</th>
                                            <th>카테고리</th>
                                            <th>강의난이도</th>
                                            <th>강의제목</th>
                                            <th>가격</th>
                                            <th>챕터 수</th>
                                            <th>레슨 수</th>
                                            <th>수강생 수</th>
                                            <th>수강생 수</th>
                                            <!-- <th>수정</th>
                                            <th>삭제</th> -->
                                        </tr>
                                    </thead>
                                    <!-- <tfoot>
                                        <tr>
                                            <th>유저번호</th>
                                            <th>이메일</th>
                                            <th>이름</th>
                                            <th>주소</th>
                                            <th>생년월일</th>
                                            <th>생성날짜</th>
                                            <th>계정상태</th>
                                        </tr>
                                    </tfoot> -->
                                    <tbody>
                                        <tr v-for="datas in classData">
                                            
                                            <th>{{ datas.ClassID }}</th>
                                            <th>{{ datas.CategoryID }}</th>
                                            <th>{{ datas.ClassDifficultyID }}</th>
                                            <th style="text-align: left; color: #000;"><a :href="'/adminchapterinsert/' + datas.ClassID">{{ datas.ClassTitle }}</a></th>
                                            <th style="text-align: right;">{{ datas.ClassPrice }}원</th>
                                            <th>{{ datas.chapter_count }}개</th>
                                            <th>{{ datas.lesson_count }}개</th>
                                            <th>{{ datas.enrollment_count }}명</th>
                                            <th><button @click="adminClassUserDataIsOpenModal(page = 1, datas.ClassID)" type="button" style="padding: 0px 10px; border-radius: 3px; background-color: rgb(255, 95, 127); color: #fff; border: none;">수강생 보기</button></th>
                                            <!-- <th><button type="button" style="padding: 0px 10px; border-radius: 3px; background-color: rgb(255, 95, 127); color: #fff; border: none;">삭제</button></th> -->
                                        </tr>
                                    </tbody>
                                </table>
                                <table style="display: flex; justify-content: center; gap: 8px;">
                                    <tbody v-for="(page, index) in pagination" :key="index">
                                        <template v-if="page.url !== null">
											<a class="qustuon_list_page_a" :class="{'page_on': page.label == pageChk}" @click.prevent="fetchData(page.label)" href="#">{{ replaceString(page.label) }}</a>
										</template>
										<template v-else>
											<span>{{ replaceString(page.label) }}</span>
                                        </template>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>

                        </div>
                        <!-- /.container-fluid -->

                        </div>
                        <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2021</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div v-if="adminClassUserDataIsOpen" class="admin_class_user_data_modal">
                <div class="admin_class_user_data_modal-container">
                    <div class="admin_class_user_data_modal-container-header">
                        <h5 class="admin_class_user_data_modal-container-title">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" aria-hidden="true">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path fill="currentColor" d="M14 9V4H5v16h6.056c.328.417.724.785 1.18 1.085l1.39.915H3.993A.993.993 0 0 1 3 21.008V2.992C3 2.455 3.449 2 4.002 2h10.995L21 8v1h-7zm-2 2h9v5.949c0 .99-.501 1.916-1.336 2.465L16.5 21.498l-3.164-2.084A2.953 2.953 0 0 1 12 16.95V11zm2 5.949c0 .316.162.614.436.795l2.064 1.36 2.064-1.36a.954.954 0 0 0 .436-.795V13h-5v3.949z" />
                        </svg>
                        수강생 정보 보기
                        </h5>
                        <button @click="adminClassUserDataIsCloseModal"  class="admin_class_user_data_icon-button">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path fill="currentColor" d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z" />
                        </svg>
                        </button>
                    </div>
                    <section class="admin_class_user_data_modal-container-body admin_class_user_data_rtf">
                        <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" style="text-align: center;" id="dataTable" width="100%" cellspacing="0">
                                    <colgroup>
                                        <col style="width: 15%;">
                                        <col style="width: 15%;">
                                        <col style="width: 15%;">
                                        <col style="width: 15%;">
                                        <col style="width: 15%;">
                                        <col style="width: 15%;">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th>유저 번호</th>
                                            <th>유저 이메일</th>
                                            <th>유저 이름</th>
                                            <th>유저 전화번호</th>
                                            <th>유저 생년월일</th>
                                            <th>유저 가입일</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="datas in userEnrollmentData">
                                            <th>{{datas.UserID}}</th>
                                            <th>{{datas.UserEmail}}</th>
                                            <th>{{datas.UserName}}</th>
                                            <th>{{datas.UserPhoneNumber}}</th>
                                            <th>{{datas.UserBirthDate}}</th>
                                            <th>{{datas.created_at}}</th>
                                        </tr>
                                    </tbody>
                                </table>
                                <table style="display: flex; justify-content: center; gap: 8px;">
                                    <tbody v-for="(page, index) in enrollmentDataPagination" :key="index">
                                        <template v-if="page.url !== null">
											<a class="qustuon_list_page_a" :class="{'page_on': page.label == enrollmentDataPageChk}" @click.prevent="adminClassUserDataIsOpenModal(page.label, modalClassID)" href="#">{{ replaceString(page.label) }}</a>
										</template>
										<template v-else>
											<span>{{ replaceString(page.label) }}</span>
                                        </template>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                    </section>
                    <div class="admin_class_user_data_modal-container-footer">
                        <button @click="adminClassUserDataIsCloseModal"  class="admin_class_user_data_button admin_class_user_data_is-primary">닫기</button>
                    </div>
                </div>
            </div>
    </div>


</template>
<script>
import axios from 'axios';
import LoadingComponent from './LoadingComponent.vue';
import Swal from 'sweetalert2';
export default {
    name: 'AdminClassInsertComponent',

    data() {
        return {
            loading: true, // 로딩 상태를 나타내는 데이터
            InstructorID : null,
            adminChk: false,
            classData: {},
            pagination: {},
			page: {},
			pageChk: {},
            searchQuery: '',
            adminClassUserDataIsOpen: false,
            userEnrollmentData: {},

            enrollmentDataPagination: {},
            enrollmentDataPage: {},
            enrollmentDataPageChk: {},

            modalClassID: {},
        };
    },

    methods: {
        fetchData(page = 1) {
            axios.get(`/instructorclassinsertdata?page=${page}&search=${this.searchQuery}`)
            .then(response => {
                // console.log('오냐');
                // console.log(response.data.userData.data)
                this.classData = response.data.ClassData.data;
                this.pagination = response.data.ClassData.links;
                this.page = response.data.ClassData.current_page;
                this.pageChk = response.data.ClassData.current_page;
            })
            .catch(error => {
                // console.error('Error fetching data:', error);
            });
        },
        
        instructorlogout() {
            axios.get('/instructorlogout')
            .then(res => {
                // console.log(res);
                localStorage.clear();
                
                Swal.fire({
                    icon: 'success',
                    title: '로그아웃 성공',
                    text: '로그아웃에 성공했습니다.',
                    confirmButtonText: '확인'
                }).then(() => {
                    // 확인 버튼을 눌렀을 때 실행할 코드
                    location.reload();
                });
            })
            .catch(err => {
                // console.log(err.response.data);
            });
        },
        replaceString(str) {
			const arrList = {
				'&laquo;': '≪',
				'&raquo;': '≫'
			}
			//  &laquo; 이전
			//  다음 &raquo;
			str = str.replace('&laquo;', '<');
			str = str.replace('&raquo;', '>');
			// console.log(str);
			return str;
		},
        adminClassUserDataIsOpenModal(page = 1, data) {
            this.modalClassID = data;
            const ClassID = data;
            // console.log(ClassID);
            axios.get(`/modalclassuserdata?page=${page}&ClassID=${ClassID}`, {
            })
            .then(res => {
                // console.log(res.data);
                this.userEnrollmentData = res.data.userEnrollmentData.data
                this.enrollmentDataPagination = res.data.userEnrollmentData.links;
                this.enrollmentDataPage = res.data.userEnrollmentData.current_page;
                this.enrollmentDataPageChk = res.data.userEnrollmentData.current_page;
            })
            .catch(err => {
                
            })
            this.adminClassUserDataIsOpen = true;
        },
        adminClassUserDataIsCloseModal() {
            this.adminClassUserDataIsOpen = false;
        },
    },

    beforeCreate() {
        // 스타일시트를 동적으로 로드한 후 로딩 상태 변경
        const styleLink = document.createElement('link');
        styleLink.rel = 'stylesheet';
        styleLink.href = '/css/sb-admin-2.css';
        document.head.appendChild(styleLink);

        // const minStyleLink = document.createElement('link');
        // minStyleLink.rel = 'stylesheet';
        // minStyleLink.href = '/css/sb-admin-2.min.css';
        // document.head.appendChild(minStyleLink);

        const allMinStyleLink = document.createElement('link');
        allMinStyleLink.rel = 'stylesheet';
        allMinStyleLink.href = '/vendor/fontawesome-free/css/all.min.css';
        document.head.appendChild(allMinStyleLink);
        

        // 스타일시트 로드 완료 후 로딩 상태 변경
        const checkLoad = () => {
        if (styleLink.sheet && allMinStyleLink.sheet) {
            // 스타일시트가 로드되었음을 확인하면 로딩 상태 변경
            this.loading = false;
        } else {
            // 스타일시트가 아직 로드되지 않았으면 재귀적으로 체크
            setTimeout(checkLoad, 10);
        }
        };

        checkLoad();
    },

    mounted() {
        this.InstructorID = localStorage.getItem('InstructorID');
        this.adminChk = localStorage.getItem('adminChk');
        // console.log(localStorage.getItem('adminChk'));

        this.fetchData();
    },

    updated() {

    },

    components: {
        LoadingComponent,
    },
}
</script>
<style scoped>

</style>