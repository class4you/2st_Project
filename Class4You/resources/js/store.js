import { createStore } from 'vuex';
import axios from 'axios';
import router from "./router.js"
import VueCookies from "vue-cookies";

const store = createStore({
    // state() : 데이터를 저장하는 영역
    state() {
        return {
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
        }
    },

    // mutations : 데이터 수정용 함수 저장 영역
    // 초기 데이터 세팅 (라라벨에서 받은)
    mutations: {
        setRegistrationErrorMessage(state, error) {
            state.RegistrationErrorMessage = error;
        },
    },

    // actions : ajax로 서버에 데이터를 요청할 때나 시간 함수등 비동기 처리는 actions에 정의
    actions: {
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
            const url = '/web/login'
            
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
                    router.push('/'); 
                    // window.location.href = '/';
                } else {
                    console.log(err.response.data.errors)
                }
            })
            .catch(err => {
                console.log(err.response.data)
                // context.commit('setErrorData', err.response.data.errors)
            })
        },
    }, 
});

export default store;
