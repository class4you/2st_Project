<template>
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
                    <div id="collapseUtilities" class="collapse show" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header admin-main-h6-font-size">게시글 정보 관리</h6>
                            <a class="collapse-item active" href="/adminboardquestiondata">강의 질문 게시글 리스트</a>
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
                    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header admin-main-h6-font-size">강의 정보 수정</h6>
                            <a class="collapse-item" href="/adminclassinsert">강의 관리</a>
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

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

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
                    <h1 class="h3 mb-2 text-gray-800">게시물 정보</h1>
                    <p class="mb-4">해당 정보는 해당 강사의 강의에 질문을 남긴 게시글에 대한 정보를 출력합니다. </p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div style="display: flex; align-items: center; justify-content: space-between;" class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">강의질문 게시글 테이블</h6>
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
                                        <col style="width: 4%;">
                                        <col style="width: 5%;">
                                        <col style="width: 4%;">
                                        <col style="width: 15%;">
                                        <col style="width: 25%;">
                                        <col style="width: 7%;">
                                        <col style="width: 5%;">
                                        <col style="width: 5%;">
                                        <col style="width: 5%;">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th>강의번호</th>
                                            <th>게시글번호</th>
                                            <th>유저번호</th>
                                            <th>제목</th>
                                            <th>내용</th>
                                            <th>생성날짜</th>
                                            <th>해결유무</th>
                                            <th>게시물상태</th>
                                            <th>답변하기</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="datas in boardQuestionData">
                                            <th>{{ datas.ClassID }}</th>
                                            <th>{{ datas.BoardID }}</th>
                                            <th>{{ datas.UserID }}</th>
                                            <th style="text-align: left;">{{ datas.BoardTitle }}</th>
                                            <th style="text-align: left;">{{ datas.BoardComment }}</th>
                                            <th>{{ datas.created_at }}</th>
                                            <th>{{ datas.BoardFlg == 0 ? '미해결' : datas.BoardFlg == 1 ? '해결' : '상태를 확인할 수 없음' }}</th>
                                            <th>{{ datas.deleted_at == null ? '미삭제' : datas.deleted_at !== null ? '삭제' : '상태를 확인할 수 없음' }}</th>
                                            <th><button type="button" @click="handleModalClick(datas.BoardID)" style="padding: 0px 8px; border-radius: 3px; background-color: rgb(255, 95, 127); color: #fff; border: none;">답변하기</button></th>
                                        </tr>
                                    </tbody>
                                    
                                
                                </table>
                            
                                <div id="admin_modal_container" class="admin_modal_container" :class="{ 'admin_modal_show': showModal }">
                                    <!-- 모달 내용 -->
                                    <form>
                                        <div class="admin_modal_content">
                                            <div class="admin_modal_content_label_span">
                                                <div class="admin_modal_content_label">
                                                    <label for="">답변하기</label>
                                                </div>
                                                <div>
                                                    <span @click="showModal = false" class="admin_answer_modal_close">❌</span>
                                                </div>
                                            </div>
                                            
                                            <div class="admin_modal_content_text">
                                            
                                                    <textarea v-model="questionAnswerData.CommentContent"></textarea>
                                                    <!-- <textarea></textarea> -->
                                                    <div class="admin_modal_content_text_btn" style="text-align: end;">
                                                        <button type="button" @click="submitAnswer()">전송</button>
                                                        <!-- <button>전송</button> -->
                                                    </div>
                                                
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            
                                <table style="display: flex; justify-content: center; font-size: 15px; gap: 8px;">
                                    <tbody v-for="(page, index) in pagination" :key="index">
                                        <template v-if="page.url !== null">
											<a class="admin_qustuon_list_page_a" :class="{'admin_page_on': page.label == pageChk}" @click.prevent="fetchData(page.label)" href="#">{{ replaceString(page.label) }}</a>
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
                            <span>Copyright &copy; Your Website 2020</span>
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

    </div>
</template>
<script>
import axios from 'axios';
import LoadingComponent from './LoadingComponent.vue';

export default {
    name: 'AdminBoardDataComponent',

    data() {
        return {
            loading: true, // 로딩 상태를 나타내는 데이터
            boardQuestionData: {},
            pagination: {},
			page: {},
			pageChk: {},
            searchQuery: '',
            adminChk: false,
            showModal: false,
            questionAnswerData: {
                CommentContent: '',
                InstructorID: this.InstructorID,
                BoardID: this.BoardID,
                UserID: this.$store.state.UserID
            },
            // questionAnswerItems: [],
            // questionAnswerData: {},
            amdinID: null,
            commentBoardID: null,
        };
    },

    methods: {
        fetchData(page = 1) {
            axios.get(`/instructoruserboardquestion?page=${page}&search=${this.searchQuery}`)
            .then(response => {
                console.log(response.data)
                console.log(response.data.boardData.data)
                this.boardQuestionData = response.data.boardData.data;
                this.pagination = response.data.boardData.links;
                this.page = response.data.boardData.current_page;
                this.pageChk = response.data.boardData.current_page;
            })
            .catch(error => {
                // console.error('Error fetching data:', error);
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
        handleModalClick(data) {
            console.log(data);
            console.log("버튼 클릭됨");

            this.commentBoardID = data;

            this.showModal = true;
            // console.log(this.showModal);
            
        },
        submitAnswer() {
            // console.log("모달 상태:", this.showModal);
            // console.log("데이터값:", this.boardData);
            // console.log("데이터값1:", this.boardQuestionData);
            // console.log("데이터값2:", this.questionAnswerData);

            const url = '/adminboardquestiondata';
            const header = {
            headers: {
                "Content-Type": 'multipart/form-data',
                // 'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
                },
            };

            let frm = new FormData();

            frm.append('CommentContent', this.questionAnswerData.CommentContent);
            frm.append('BoardID', this.commentBoardID);
            frm.append('InstructorID', this.adminID);

            // console.log("데이터값:", this.questionAnswerData);
            // console.log("데이터값:", this.boardQuestionData);
            // console.log(frm);

            axios.post(url, frm, header)
                .then(res => {
                    console.log("questionAnswerData",res);
                })
                .catch(err => {

                });

        },
        instructorlogout() {
            axios.get('/instructorlogout')
            .then(res => {
                console.log(res);
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

    },

    mounted() {
        this.fetchData();

        this.adminChk = localStorage.getItem('adminChk');
        this.adminID = localStorage.getItem('InstructorID');
    },

    beforeCreate() {
        // 스타일시트를 동적으로 로드한 후 로딩 상태 변경
        const styleLink = document.createElement('link');
        styleLink.rel = 'stylesheet';
        styleLink.href = '/css/sb-admin-2.css';
        document.head.appendChild(styleLink);

        const minStyleLink = document.createElement('link');
        minStyleLink.rel = 'stylesheet';
        minStyleLink.href = '/css/sb-admin-2.min.css';
        document.head.appendChild(minStyleLink);

        const allMinStyleLink = document.createElement('link');
        allMinStyleLink.rel = 'stylesheet';
        allMinStyleLink.href = '/vendor/fontawesome-free/css/all.min.css';
        document.head.appendChild(allMinStyleLink);

        // 스타일시트 로드 완료 후 로딩 상태 변경
        const checkLoad = () => {
        if (styleLink.sheet && minStyleLink.sheet && allMinStyleLink.sheet) {
            // 스타일시트가 로드되었음을 확인하면 로딩 상태 변경
            this.loading = false;
        } else {
            // 스타일시트가 아직 로드되지 않았으면 재귀적으로 체크
            setTimeout(checkLoad, 10);
        }
        };

        checkLoad();
    },

    components: {
        LoadingComponent,
    },
}
</script>
<style>
/* 모달 스타일 */
.admin_modal_container {
    display: none;
    /* position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    z-index: 100;
    opacity: 0.5; */
    background-color: rgba(255,255,255,0.5);
    /* opacity: 0.5; */
}

.admin_modal_container.admin_modal_show {
    /* display: inline-block;
    position: relative;
    bottom: 50vh;
    left: 50vh;
    background-color: #ededed; */
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    z-index: 100;
}

.admin_modal_show {
    display: block;
}

.admin_modal_content_label_span{
    display: flex;
    flex-direction: row;
    /* gap: 50px; */
    justify-content: space-between;
    align-items: center;
}

.admin_modal_content {
    display: flex; 
    flex-direction: column;
    flex-wrap: wrap;
    width: 50%;
    margin-left: 25%;
    margin-top: 15%;
}

.admin_modal_content_label {
    font-weight: 700;
    color: #4d4c4c;
}

.admin_modal_content_text {
  border: 1px solid rgba(89 90 91 / 30%);
  border-radius: 5px;
  height: 30vh;
  padding: 10px;
  background-color: rgba(89 90 91 / 30%);
  display: flex;
    flex-direction: column;
}

.admin_modal_content_text_btn>button {
    border: none;
    padding: 5px 10px;
    margin-top: 5px;
    border-radius: 5px;
    font-size: 13px;
}

.admin_modal_content_text>textarea {
    background-color: #fff;
    border: none;
    resize: none;
    padding: 10px;
    width: 100%;
    height: 100%;
    overflow: hidden;
  /* position: relative;
    top: 50%;
    right: 50%; */
}

.admin_answer_modal_close {
    cursor: pointer;
}
</style>