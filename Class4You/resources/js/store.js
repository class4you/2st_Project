import { createStore } from 'vuex';
import axios from 'axios';
import router from "./router.js"
import VueCookies from "vue-cookies";

const store = createStore({
    
    // state() : 데이터를 저장하는 영역
    state() {
        return {
            // 정명호
            RegistrationErrorMessage: {
                UserEmail: '',
                UserPassword: '',
                UserPasswordChk: '',
                UserName: '',
                UserPhoneNumber1: '',
                UserPhoneNumber2: '',
                UserPhoneNumber3: '',
                UserBirthDate: '',
                UserAddress: '',
                UserTermsofUse: '',
                UserPrivacy: '',
            },
            loginShowModal: false,

            userData: {
                userCheck: '',
                userName: '',
                userEmail: '',
                UserID: null,
            },
            userLoginChk: null,
            UserID: null,
            shouldShowCarousel: false,
            myPageClickFlgTab: 1,










            







            // 최현희
            // 라라벨 데이터 저장용
            laravelData: [],
            // 수강평 데이터 저장용
            // classReviewData: [],










            






            // 김민정
        }
    },

    // mutations : 데이터 수정용 함수 저장 영역
    // 초기 데이터 세팅 (라라벨에서 받은)
    mutations: {
        setRegistrationErrorMessage(state, error) {
            state.RegistrationErrorMessage = error;
        },
        setOpenLoginModal(state) {
            state.loginShowModal = true;
        },
        setCloseLoginModal(state) {
            state.loginShowModal = false;
        },
        setSaveToLocalStorage(state, data) {
            state.userData.userCheck = data.sessionDataCheck;
            state.userData.UserID = data.UserID;
            localStorage.setItem('UserID', data.userId);
            localStorage.setItem('userCheck', data.sessionDataCheck);
            // console.log(data);
            // localStorage.setItem('UserID', {value:data.userId, expire: Date.now() + 7200000});
            // localStorage.setItem('userCheck', {value:data.sessionDataCheck, expire: Date.now() + 7200000});
            // console.log(Date.now() + 7200000);
            // console.log(data);
            // console.log(localStorage.getItem('UserID'));
            // console.log(data);
            // state.userData.userName = data.sessionCheckUserName
            // state.userData.userEmail = data.sessionCheckUserEmail
            // localStorage.setItem('userName', data.sessionCheckUserName);
            // localStorage.setItem('userEmail', data.sessionCheckUserEmail);
            // state.userData.userCheck = localStorage.getItem('userCheck');
        },
        setUserLoginChk(state, userLoginChk) {
            state.userLoginChk = userLoginChk;
        },
        setUserID(state, UserID) {
            state.UserID = UserID;
        },
        setShowCarousel(state, value) {
            state.shouldShowCarousel = value;
        },
        setMyPageTab(state, tab) {
            state.myPageClickFlgTab = tab;
        },
        









            












        // 최현희
        // 라라벨에서 받은 초기데이터 셋팅
        setLaravelData(state, data) {
			state.laravelData = data;
		},
        // 작성된 글 삽입용 
		// setUnshiftReviewData(state, data) {
		// 	// unshift() : js 의 배열 메소드.
		// 	// 배열의 맨 앞에 하나 이상의 요소를 추가해줌.
		// 	state.classReviewData.unshift(data);
		// },
		














        






        // 김민정
    },

    // actions : ajax로 서버에 데이터를 요청할 때나 시간 함수등 비동기 처리는 actions에 정의
    actions: {
        openLoginModal({ commit }) {
            commit('setOpenLoginModal');
        },
        closeLoginModal({ commit }) {
            commit('setCloseLoginModal');
        },
        submitUserData(context, data) {
            const url = '/registration'
            const header = {
                headers: {
                    "Content-Type": 'multipart/form-data',
                    'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
                },
            }
            let frm = new FormData();
            const UserPhoneNumber = data.UserPhoneNumber1 + data.UserPhoneNumber2 + data.UserPhoneNumber3

            data.UserTermsofUse = data.UserTermsofUse ? 1 : 0;

            data.UserPrivacy = data.UserPrivacy ? 1 : 0;

            frm.append('UserEmail',data.UserEmail);
            frm.append('UserPassword',data.UserPassword);
            frm.append('UserPasswordChk',data.UserPasswordChk);
            frm.append('UserName',data.UserName);
            frm.append('UserPhoneNumber',UserPhoneNumber);
            frm.append('UserBirthDate',data.UserBirthDate);
            frm.append('UserPostcode',data.UserPostcode);
            frm.append('UserRoadAddress',data.UserRoadAddress);
            frm.append('UserDetailedAddress',data.UserDetailedAddress);
            frm.append('UserTermsofUse',data.UserTermsofUse);
            frm.append('UserPrivacy',data.UserPrivacy);


            axios.post(url, frm, header)
            .then(res => { 
                console.log(res.data);
                router.push('/'); 
            })
            .catch(err => {
                console.log(err.response.data.errors)
                context.commit('setRegistrationErrorMessage', err.response.data.errors);
            })
        },
        submitUserLoginData(context, data) {
            const url = '/login'
            
            const header = {
                headers: {
                    "Content-Type": 'application/json',
                    'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
                },
            }
            const requestData = {
                UserEmail: data.UserEmail,
                UserPassword: data.UserPassword,
            };

            axios.post(url, requestData, header)
            .then(res => { 
                // console.log(res);
                if (res.data.success) {
                    context.commit('setSaveToLocalStorage', res.data);
                    context.commit('setUserLoginChk', res.data.sessionDataCheck);
                    context.commit('setUserID', res.data.userId);
                    // context.commit('setUserLoginChk', {sessionDataCheck:res.data.sessionDataCheck, UserID:res.data.userId});
                    // console.log(res.data.sessionDataCheck)
                    // console.log(res.data)
                    // router.push('/'); 
                } else {
                    console.log(err.response.data.errors)
                }
            })
            .catch(err => {
                console.log(err.response.data)
                // context.commit('setErrorData', err.response.data.errors)
            })
            .finally(() => {
                context.dispatch('closeLoginModal');
            })
        },
        logout(context, data) {
            const url = '/logout'
            const header = {
                headers: {
                    "Content-Type": 'application/json',
                    // 'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
                },
            }
            axios.get(url, header)
            .then(res => {
                // 쿠키 삭제
                console.log(res.data)
                context.commit('setUserLoginChk', res.data.sessionDataCheck);
                localStorage.clear();
                router.push('/'); 
                // window.location.href = '/';
            })
            .catch(err => console.log(err.response.data))
        },
        checkWindowWidth(context) {
            // 특정 크기 이상이면 캐러셀을 표시
            if (window.innerWidth <= 770) {
                context.commit('setShowCarousel', true);
            } else {
                context.commit('setShowCarousel', false);
            }
        },
        






















        // 김민정
        // 댓글 작성 함수
        submitCommentData(context, data) {
            const url = '/comments'
            const header = {
                headers: {
                    "Content-Type": 'multipart/form-data',
                    'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
                },
            }
            let frm = new FormData();
            console.log(data);

            frm.append('BoardID',data.BoardID);
            frm.append('UserID',data.UserID);
            frm.append('CommentContent',data.CommentContent);

            // console.log(frm);

            axios.post(url, frm, header)
            .then(res => {
                console.log(res.data);
                window.location.reload();

            })
            .catch(err => {
                console.log(err.response.data.errors)
                context.commit('setRegistrationErrorMessage', err.response.data.errors);
            })
        }, 

        // 댓글 삭제 함수
        deleteCommentData(context, data) {
            const url = '/comments/' + data
            const header = {
                headers: {
                    "Content-Type": 'multipart/form-data',
                    'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
                },
            }

            // let frm = new FormData();
            const requestData = {
                CommentID: data.CommentID,
            };

            // console.log(data);

            axios.delete(url, requestData, header)
            .then(res => { 
                console.log(res.data);
                // 해당 처리가 끝나면 리로드함
                window.location.reload();
                
            })
            .catch(err => {
                console.log(err.response.data.errors)
                context.commit('setRegistrationErrorMessage', err.response.data.errors);
            })
        },

        // 게시판 삭제 함수
        delBoardData(context, data) {
            const url = '/boarddetail/' + data
            const header = {
                headers: {
                    "Content-Type": 'multipart/form-data',
                    'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
                },
            }

            // let frm = new FormData();
            const requestData = {
                BoardID: data.BoardID,
            };

            // console.log(data);

            axios.delete(url, requestData, header)
            .then(res => { 
                console.log(res.data);
                // 해당 처리가 끝나면 리로드함
                // window.location.reload();
                router.push('/board'); 
            })
            .catch(err => {
                console.log(err.response.data.errors)
                context.commit('setRegistrationErrorMessage', err.response.data.errors);
            })
        },
























            








        // 최현희
        // 수강평 작성 함수
        // addClassReview(context, data) {
        //     const url = '/classboarddetailreview'
        //     const header = {
        //         headers: {
        //             "Content-Type": 'multipart/form-data',
        //             'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
        //         },
        //     }
        //     let frm = new FormData();

        //     console.log(data);

        //     frm.append('ClassID',data.ClassID);
        //     frm.append('UserID',data.UserID);
        //     frm.append('ReviewComment',data.ReviewComment);
        //     frm.append('ReviewRating',data.ReviewRating);

        //     // console.log(frm);

        //     axios.post(url, frm, header)
        //     .then(res => { 
        //         console.log(res.data);

        //         // 해당 처리가 끝나면 리로드함
        //         // window.location.reload();
        //         // router.push('/classBoardDetail/' + this.ClassID); 
        //         // router.push('/classboarddetailreview/' + data.ClassID);
        //         // router.push('/classboarddetail/' + this.ClassID); 

        //         //
		// 		// context.commit(data.clickFlgTab , 1);
        //     })
        //     .catch(err => {
        //         console.log(err.response.data.errors)
        //         context.commit('setRegistrationErrorMessage', err.response.data.errors);
        //     })
        // },

        // 수강평 수정 함수
        // putClassReview(context, data) {
        //     const url = '/classboarddetailreview'
        //     const header = {
        //         headers: {
        //             "Content-Type": 'multipart/form-data',
        //             'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
        //         },
        //     }
        //     let frm = new FormData();

        //     console.log(data);

        //     frm.append('ClassID',data.ClassID);
        //     frm.append('UserID',data.UserID);
        //     frm.append('ReviewComment',data.ReviewComment);
        //     frm.append('ReviewRating',data.ReviewRating);
        //     frm.append('ReviewID',data.ReviewID);

        //     // console.log(frm);

        //     axios.put(url, frm, header)
        //     .then(res => { 
        //         console.log(res.data);
        //         // router.push('/classBoardDetail/' + this.ClassID); 
        //         // router.push('/classBoardDetail/' + data.ClassID); 

        //         //
		// 		// context.commit(data.clickFlgTab , 1);
        //     })
        //     .catch(err => {
        //         console.log(err.response.data.errors)
        //         context.commit('setRegistrationErrorMessage', err.response.data.errors);
        //     })
        // },

        // 수강평 삭제
        // deleteClassReview(context, data) {
        //     const url = '/classboarddetailreview'
            
        
        //     const header = {
        //         headers: {
        //             "Content-Type": 'multipart/form-data',
        //             'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
        //         },
        //     }
        //     let frm = new FormData();

        //     console.log(data);

        //     frm.append('ClassID',data.ClassID);
        //     frm.append('ClassID',data.ClassID);
        //     frm.append('ReviewComment',data.ReviewComment);
        //     frm.append('ReviewRating',data.ReviewRating);

        //     // console.log(frm);

        //     axios.delete(url, frm, header)
        //     .then(res => { 
        //         console.log(res.data);
        //         // router.push('/classBoardDetail/' + this.ClassID); 
        //         // router.push('/classBoardDetail/' + data.ClassID); 
        //         const index = this.$store.commit(data => data.ReviewID === todoToDelete.id)
        //         this.todos.splice(index, 1)

        //         //
		// 		// context.commit(data.clickFlgTab , 1);
        //     })
        //     .catch(err => {
        //         console.log(err.response.data.errors)
        //         context.commit('setRegistrationErrorMessage', err.response.data.errors);
        //     })
        // },
        // 수강평 삭제
        // deleteClassReview(context, data) {
        //     const url = '/classboarddetailreview/' + data
        //     const header = {
        //         headers: {
        //             "Content-Type": 'multipart/form-data',
        //             'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
        //         },
        //     }

        //     // let frm = new FormData();
        //     const requestData = {
        //         ReviewID: data.ReviewID,
        //     };

        //     console.log(data);

        //     axios.delete(url, requestData, header)
        //     .then(res => { 
        //         console.log(res.data);
        //         // 해당 처리가 끝나면 리로드함
        //         window.location.reload();
        //         // localStorage.clear();
        //         // router.push('/classBoardDetail/' + this.ClassID); 
        //         // router.push('/classboarddetailreview'); 
        //         //
		// 		// context.commit(data.clickFlgTab , 1);
        //     })
        //     .catch(err => {
        //         console.log(err.response.data.errors)
        //         context.commit('setRegistrationErrorMessage', err.response.data.errors);
        //     })
        // },
            









        // 커뮤니티 작성











        // 수강 신청
        postClassEnrollApp(context, data) {
            const url = '/classEnrollAppPost'
            const header = {
                headers: {
                    "Content-Type": 'multipart/form-data',
                    'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
                },
            }
            let frm = new FormData();

            console.log(data);

            frm.append('ClassID',data.ClassID);
            frm.append('UserID',data.UserID);

            axios.post(url, frm, header)
            .then(res => { 
                console.log(res.data);
                window.location.reload();
            })
            .catch(err => {
                console.log(err.response.data.errors)
                // context.commit('setRegistrationErrorMessage', err.response.data.errors);
            })
        },



















        









        // 김민정
        submitBoardData(context, data) {
            const url = '/boardInsert'
            const header = {
                headers: {
                    "Content-Type": 'multipart/form-data',
                    'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
                },
            }
            let frm = new FormData();

            frm.append('BoardCategoryID',data.BoardCategoryID);
            frm.append('UserID',data.UserID);
            frm.append('BoardTitle',data.BoardTitle);
            frm.append('BoardComment',data.BoardComment);

            console.log(frm);

            axios.post(url, frm, header)
            .then(res => { 
                // console.log(res.data);
                router.push('/board'); 
            })
            .catch(err => {
                console.log(err.response.data.errors)
                context.commit('setRegistrationErrorMessage', err.response.data.errors);
            })
        },




    }, 
});

export default store;
