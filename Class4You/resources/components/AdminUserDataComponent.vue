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
                    <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header admin-main-h6-font-size">유저 정보 관리</h6>
                            <a class="collapse-item active" href="/adminuserdata">유저 정보 리스트</a>
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
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

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
                    <h1 class="h3 mb-2 text-gray-800">유저 정보</h1>
                    <p class="mb-4">해당 강사의 강의를 수강 중인 유저에 대한 정보를 출력합니다.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div style="display: flex; align-items: center; justify-content: space-between;" class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">유저 정보 테이블</h6>
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
                                        <col style="width: 10%;">
                                        <col style="width: 10%;">
                                        <col style="width: 5%;">
                                        <col style="width: 30%;">
                                        <col style="width: 8%;">
                                        <col style="width: 8%;">
                                        <col style="width: 5%;">
                                        <col style="width: 5%;">
                                        <col style="width: 10%;">
                                        <col style="width: 10%;">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th>유저번호</th>
                                            <th>이메일</th>
                                            <th>이름</th>
                                            <th>주소</th>
                                            <th>생년월일</th>
                                            <th>생성날짜</th>
                                            <th>탈퇴여부</th>
                                            <th>계정상태</th>
                                            <th>임시정지</th>
                                            <th>영구정지</th>
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
                                        <tr v-for="datas in userData">
                                            <th>{{ datas.UserID }}</th>
                                            <th>{{ datas.UserEmail }}</th>
                                            <th>{{ datas.UserName }}</th>
                                            <th v-if="datas.UserPostcode && datas.UserRoadAddress && datas.UserDetailedAddress">({{ datas.UserPostcode }}) {{ datas.UserRoadAddress }} {{ datas.UserDetailedAddress }}</th>
                                            <th v-else>주소 값이 없습니다.</th>
                                            <th>{{ datas.UserBirthDate }}</th>
                                            <th>{{ datas.created_at }}</th>
                                            <th>{{ datas.deleted_at === null ? 'X' : datas.deleted_at !== null ? 'O' : '?' }}</th>
                                            <th>{{ datas.UserState === null || datas.UserState === '0' ? '정상' : datas.UserState === '1' ? '임시 정지' : datas.UserState === '2' ? '영구 정지' : '상태를 확인할 수 없음'}}</th>
                                            <th><button @click="userStateButton1(datas.UserID)" type="button" style="padding: 0px 10px; border-radius: 3px; background-color: rgb(255, 95, 127); color: #fff; border: none;">임시 정지</button></th>
                                            <th><button @click="userStateButton2(datas.UserID)" type="button" style="padding: 0px 10px; border-radius: 3px; background-color: rgb(255, 95, 127); color: #fff; border: none;">영구 정지</button></th>
                                        </tr>
                                    </tbody>
                                </table>
                                

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

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
            </div>
    </div>
</template>
<script>
import LoadingComponent from './LoadingComponent.vue';
import Swal from 'sweetalert2';

export default {
    name: 'AdminUserDataComponent',

    data() {
        return {
            loading: true, // 로딩 상태를 나타내는 데이터
            userData: {},
            pagination: {},
			page: {},
			pageChk: {},
            searchQuery: '',
            adminChk: false,
        };
    },

    methods: {
        fetchData(page = 1) {
            axios.get(`/instructoruserdata?page=${page}&search=${this.searchQuery}`)
            .then(response => {
                console.log(response.data)
                // console.log(response.data.userData.data)
                this.userData = response.data.userData.data;
                this.pagination = response.data.userData.links;
                this.page = response.data.userData.current_page;
                this.pageChk = response.data.userData.current_page;
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
        userStateButton1(data) {
            Swal.fire({
                icon: 'question', // 추가: 아이콘 설정
                title: '계정 정지',
                input: 'date',
                inputLabel: '원하는 정지일(YY-MM-DD)을 입력해주세요.',
                inputPlaceholder: '원하는 정지 날짜를 입력해주세요.',
                showCancelButton: true,
                cancelButtonText: '취소',
                confirmButtonText: '정지',
                showLoaderOnConfirm: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    const selectedDate = result.value;
                    const UserID = data;
                    if (selectedDate) {
                        console.log('사용자가 선택한 날짜:', selectedDate);
                        axios.post(`/instructoruserstate`,{
                            UserID: UserID,
                            Date: selectedDate,
                        }).then(response => {
                            // console.log(this.userData);
                            console.log(response.data);
                            const updatedUser = response.data.userStateData;
                            // this.userData에서 UserID에 해당하는 사용자를 찾아서 인덱스를 가져옴
                            const userIndex = this.userData.findIndex(user => user.UserID === updatedUser.UserID);
                            // UserID에 해당하는 사용자가 이미 존재하면 업데이트
                            if (userIndex !== -1) {
                                // 기존 사용자의 데이터를 업데이트
                                this.userData[userIndex].UserState = updatedUser.UserState;
                            }
                            // this.userData = response.data;
                        }).catch(error => {
                            // 에러 처리
                            console.error(error);
                        });
                    }
                }
            });
        },
        userStateButton2(data) {
            Swal.fire({
                title: '영구 정지',
                text: '정말로 영구 정지시키시겠습니까?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '변경',
                cancelButtonText: '취소'
            }).then((result) => {
                if (result.isConfirmed) {
                    const UserID = data;

                        axios.post(`/instructoruserstate`,{
                            UserID: UserID,
                            ban: 'ban',
                        }).then(response => {
                            // console.log(this.userData);
                            console.log(response.data);
                            const updatedUser = response.data.userStateData;
                            // this.userData에서 UserID에 해당하는 사용자를 찾아서 인덱스를 가져옴
                            console.log(updatedUser);
                            const userIndex = this.userData.findIndex(user => user.UserID === updatedUser.UserID);
                            console.log(userIndex);
                            // UserID에 해당하는 사용자가 이미 존재하면 업데이트
                            if (userIndex !== -1) {
                                // 기존 사용자의 데이터를 업데이트
                                this.userData[userIndex].UserState = updatedUser.UserState;
                            }
                            // this.userData = response.data;
                        }).catch(error => {
                            // 에러 처리
                            console.error(error);
                        });
                    
                }
            });
        }

    },

    mounted() {
        this.fetchData();

        this.adminChk = localStorage.getItem('adminChk');
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
<style scoped>

</style>