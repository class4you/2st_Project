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
            },
            userLoginChk: null,
            shouldShowCarousel: false,










            







            // 최현희
            // 라라벨 데이터 저장용
            laravelData: [],
            // 수강평 데이터 저장용
            classReviewData: [],










            






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
            // state.userData.userCheck = data.sessionDataCheck
            // state.userData.userName = data.sessionCheckUserName
            // state.userData.userEmail = data.sessionCheckUserEmail
            localStorage.setItem('userCheck', data.sessionDataCheck);
            localStorage.setItem('userName', data.sessionCheckUserName);
            localStorage.setItem('userEmail', data.sessionCheckUserEmail);
            // state.userData.userCheck = localStorage.getItem('userCheck');
        },
        setUserLoginChk(state, userLoginChk) {
            state.userLoginChk = userLoginChk;
        },
        setShowCarousel(state, value) {
            state.shouldShowCarousel = value;
        },
        









            












        // 최현희
        // 라라벨에서 받은 초기데이터 셋팅
        setLaravelData(state, data) {
			state.laravelData = data;
		},
        // 작성된 글 삽입용 
		setUnshiftReviewData(state, data) {
			// unshift() : js 의 배열 메소드.
			// 배열의 맨 앞에 하나 이상의 요소를 추가해줌.
			state.classReviewData.unshift(data);
		},
		














        






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
            const url = '/api/registration'
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

            data.UserAddress = data.UserAddress + ' ' + data.detailedAddress;

            frm.append('UserEmail',data.UserEmail);
            frm.append('UserPassword',data.UserPassword);
            frm.append('UserPasswordChk',data.UserPasswordChk);
            frm.append('UserName',data.UserName);
            frm.append('UserPhoneNumber',UserPhoneNumber);
            frm.append('UserBirthDate',data.UserBirthDate);
            frm.append('UserAddress',data.UserAddress);
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
                console.log(res);
                if (res.data.success) {
                    context.commit('setSaveToLocalStorage', res.data);
                    context.commit('setUserLoginChk', res.data.sessionDataCheck);
                    console.log(res.data.sessionDataCheck)
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
        









            








        // 최현희
        actionClassReviewAdd() {
            
        }









        






        // 김민정
    }, 
});

export default store;
